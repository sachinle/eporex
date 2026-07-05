<?php
/* ===========================================================================
   EPOREX — Enquiry mail endpoint
   ---------------------------------------------------------------------------
   HOW TO SET UP SMTP (recommended — works on any host):
   1. Set 'enabled' => true under 'smtp' below.
   2. Fill host / port / encryption / username / password from your mail
      provider (e.g. Hostinger: smtp.hostinger.com, 587, tls;
      Gmail: smtp.gmail.com, 587, tls + an App Password).
   3. 'from' should normally be the same mailbox as 'username'.

   If SMTP stays disabled, the script falls back to PHP's mail(), which only
   works when the server has a local mailer configured.
   =========================================================================== */

$EPX_MAIL = array(
    'to'        => 'info@eporex.in',          // where enquiries are delivered
    'from'      => 'website@eporex.in',       // sender mailbox shown to the receiver
    'from_name' => 'EPOREX Website',

    'smtp' => array(
        'enabled'    => false,                // set true after filling the fields below
        'host'       => 'smtp.hostinger.com',
        'port'       => 587,
        'encryption' => 'tls',                // 'tls' (STARTTLS, port 587), 'ssl' (port 465) or ''
        'username'   => '',
        'password'   => '',
    ),
);

/* ------------------------------------------------------------------------ */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array('ok' => false, 'msg' => 'Invalid request method.'));
    exit;
}

function epx_field($key)
{
    $v = isset($_POST[$key]) ? (string) $_POST[$key] : '';
    return trim(str_replace(array("\r", "\n"), ' ', $v)); // header-injection safe
}

/* Honeypot: bots fill the hidden "website" field — pretend success. */
if (epx_field('website') !== '') {
    echo json_encode(array('ok' => true, 'msg' => 'Thank you!'));
    exit;
}

$name     = epx_field('name');
$mobile   = epx_field('mobile');
$email    = epx_field('email');
$category = epx_field('category');
$message  = trim(isset($_POST['message']) ? (string) $_POST['message'] : '');

if ($name === '' || $mobile === '' || $message === '') {
    echo json_encode(array('ok' => false, 'msg' => 'Please fill your name, mobile number and message.'));
    exit;
}
if (!preg_match('/^[0-9+\-\s]{7,15}$/', $mobile)) {
    echo json_encode(array('ok' => false, 'msg' => 'Please enter a valid mobile number.'));
    exit;
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array('ok' => false, 'msg' => 'Please enter a valid e-mail address.'));
    exit;
}

$subject = 'Website Enquiry' . ($category !== '' ? ' - ' . $category : '') . ($name !== '' ? ' from ' . $name : '');
$body    = "New enquiry from the EPOREX website\r\n"
         . "------------------------------------\r\n"
         . 'Name     : ' . $name . "\r\n"
         . 'Mobile   : ' . $mobile . "\r\n"
         . 'E-mail   : ' . ($email !== '' ? $email : '-') . "\r\n"
         . 'Category : ' . ($category !== '' ? $category : '-') . "\r\n"
         . "Message  :\r\n" . $message . "\r\n"
         . "------------------------------------\r\n"
         . 'Sent on  : ' . date('d M Y, h:i A') . "\r\n";

/* --------------------------- minimal SMTP client ------------------------- */

function epx_smtp_send($cfg, $fromName, $from, $to, $replyTo, $subject, $body, &$error)
{
    $error = '';
    $isSsl = ($cfg['encryption'] === 'ssl');
    $addr  = ($isSsl ? 'ssl://' : 'tcp://') . $cfg['host'] . ':' . (int) $cfg['port'];
    $fp    = @stream_socket_client($addr, $errno, $errstr, 15);
    if (!$fp) { $error = 'Connection failed: ' . $errstr; return false; }
    stream_set_timeout($fp, 15);

    $read = function () use ($fp) {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) {
            $data .= $line;
            if (strlen($line) < 4 || $line[3] !== '-') { break; } // last line of reply
        }
        return $data;
    };
    $cmd = function ($command, $okCodes) use ($fp, $read, &$error) {
        if ($command !== null) { fwrite($fp, $command . "\r\n"); }
        $resp = $read();
        $code = (int) substr($resp, 0, 3);
        if (!in_array($code, (array) $okCodes, true)) {
            $error = 'SMTP error (' . trim($resp) . ')';
            return false;
        }
        return true;
    };

    $host = isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] !== '' ? $_SERVER['SERVER_NAME'] : 'localhost';

    if (!$cmd(null, 220)) { fclose($fp); return false; }               // greeting
    if (!$cmd('EHLO ' . $host, 250)) { fclose($fp); return false; }

    if ($cfg['encryption'] === 'tls') {                                 // STARTTLS upgrade
        if (!$cmd('STARTTLS', 220)) { fclose($fp); return false; }
        $crypto = STREAM_CRYPTO_METHOD_TLS_CLIENT;
        if (defined('STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT')) {
            $crypto |= STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT;
        }
        if (!@stream_socket_enable_crypto($fp, true, $crypto)) {
            $error = 'TLS negotiation failed.';
            fclose($fp);
            return false;
        }
        if (!$cmd('EHLO ' . $host, 250)) { fclose($fp); return false; }
    }

    if ($cfg['username'] !== '') {
        if (!$cmd('AUTH LOGIN', 334)) { fclose($fp); return false; }
        if (!$cmd(base64_encode($cfg['username']), 334)) { fclose($fp); return false; }
        if (!$cmd(base64_encode($cfg['password']), 235)) { fclose($fp); return false; }
    }

    if (!$cmd('MAIL FROM:<' . $from . '>', 250)) { fclose($fp); return false; }
    if (!$cmd('RCPT TO:<' . $to . '>', array(250, 251))) { fclose($fp); return false; }
    if (!$cmd('DATA', 354)) { fclose($fp); return false; }

    $headers = 'From: =?UTF-8?B?' . base64_encode($fromName) . "?= <$from>\r\n"
             . ($replyTo !== '' ? "Reply-To: <$replyTo>\r\n" : '')
             . "To: <$to>\r\n"
             . 'Subject: =?UTF-8?B?' . base64_encode($subject) . "?=\r\n"
             . 'Date: ' . date('r') . "\r\n"
             . "MIME-Version: 1.0\r\n"
             . "Content-Type: text/plain; charset=UTF-8\r\n"
             . "Content-Transfer-Encoding: 8bit\r\n";
    $data = $headers . "\r\n" . preg_replace('/^\./m', '..', $body) . "\r\n.";
    if (!$cmd($data, 250)) { fclose($fp); return false; }

    fwrite($fp, "QUIT\r\n");
    fclose($fp);
    return true;
}

/* ------------------------------- dispatch -------------------------------- */

$smtp = $EPX_MAIL['smtp'];
if (!empty($smtp['enabled'])) {
    $err = '';
    $sent = epx_smtp_send($smtp, $EPX_MAIL['from_name'], $EPX_MAIL['from'], $EPX_MAIL['to'], $email, $subject, $body, $err);
    if ($sent) {
        echo json_encode(array('ok' => true, 'msg' => 'Thank you! Your enquiry has been sent.'));
    } else {
        echo json_encode(array('ok' => false, 'msg' => 'Mail could not be sent right now. Please try WhatsApp instead. (' . $err . ')'));
    }
    exit;
}

/* Fallback: PHP mail() — requires a configured local mailer. */
$headers = 'From: ' . $EPX_MAIL['from_name'] . ' <' . $EPX_MAIL['from'] . ">\r\n"
         . ($email !== '' ? 'Reply-To: <' . $email . ">\r\n" : '')
         . "MIME-Version: 1.0\r\n"
         . "Content-Type: text/plain; charset=UTF-8\r\n";

if (@mail($EPX_MAIL['to'], $subject, $body, $headers)) {
    echo json_encode(array('ok' => true, 'msg' => 'Thank you! Your enquiry has been sent.'));
} else {
    echo json_encode(array(
        'ok'  => false,
        'msg' => 'E-mail sending is not configured on this server yet. Please contact us on WhatsApp, or enable SMTP in send-enquiry.php.',
    ));
}
