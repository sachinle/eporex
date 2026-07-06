/* ===========================================================================
   EPOREX — modern interaction layer
   Progressive enhancement only: every feature checks for its DOM hooks and
   for prefers-reduced-motion, and fails silently if unsupported. No jQuery.
   =========================================================================== */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var finePointer = window.matchMedia &&
    window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  /* ------------------------------------------------------------------
     1. Scroll progress bar
     ------------------------------------------------------------------ */
  var progress = document.createElement('div');
  progress.className = 'epx-progress';
  document.body.appendChild(progress);

  /* ------------------------------------------------------------------
     2. Navbar: hide on scroll down, reveal on scroll up
     ------------------------------------------------------------------ */
  var header = document.getElementById('header-sticky');
  var lastY = window.pageYOffset;

  function onScroll() {
    var y = window.pageYOffset;
    var doc = document.documentElement;
    var max = doc.scrollHeight - window.innerHeight;
    progress.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';

    if (header) {
      // Only auto-hide once the sticky state is active and we're well past top
      if (y > lastY && y > 480) {
        header.classList.add('epx-nav-hidden');
      } else if (y < lastY - 4 || y <= 480) {
        header.classList.remove('epx-nav-hidden');
      }
    }
    lastY = y;
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ------------------------------------------------------------------
     3. Ripple on primary actions
     ------------------------------------------------------------------ */
  if (!reduceMotion) {
    document.addEventListener('click', function (e) {
      var btn = e.target.closest('.theme-btn, .theme-btn-2, .enquire, .btn-primary, .btn-whatsapp, .btn-mail');
      if (!btn) { return; }
      var rect = btn.getBoundingClientRect();
      var size = Math.max(rect.width, rect.height);
      var ripple = document.createElement('span');
      ripple.className = 'epx-ripple';
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
      ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
      btn.appendChild(ripple);
      setTimeout(function () { ripple.remove(); }, 650);
    });
  }

  /* ------------------------------------------------------------------
     4. Subtle magnetic pull on hero-banner CTAs
     ------------------------------------------------------------------ */
  if (finePointer && !reduceMotion) {
    document.querySelectorAll('.epx-banner__actions a').forEach(function (el) {
      el.addEventListener('mousemove', function (e) {
        var r = el.getBoundingClientRect();
        var dx = (e.clientX - r.left - r.width / 2) / (r.width / 2);
        var dy = (e.clientY - r.top - r.height / 2) / (r.height / 2);
        el.style.transform = 'translate(' + (dx * 4) + 'px,' + (dy * 3) + 'px)';
      });
      el.addEventListener('mouseleave', function () {
        el.style.transform = '';
      });
    });
  }

  /* ------------------------------------------------------------------
     5. Typewriter rotator (custom banner)
     Reads the pipe-separated word list from data-words.
     ------------------------------------------------------------------ */
  var rotator = document.querySelector('[data-epx-rotate]');
  if (rotator) {
    var words = (rotator.getAttribute('data-words') || '').split('|').filter(Boolean);
    var target = rotator.querySelector('.epx-word');
    if (words.length && target) {
      if (reduceMotion) {
        target.textContent = words.join(' · ');
      } else {
        var wi = 0, ci = 0, deleting = false;
        (function tick() {
          var word = words[wi];
          ci = deleting ? ci - 1 : ci + 1;
          target.textContent = word.slice(0, ci);
          var delay = deleting ? 34 : 74;
          if (!deleting && ci === word.length) { delay = 2100; deleting = true; }
          else if (deleting && ci === 0) { deleting = false; wi = (wi + 1) % words.length; delay = 340; }
          setTimeout(tick, delay);
        })();
      }
    }
  }

  /* ------------------------------------------------------------------
     6. Banner background slideshow (client image slots)
     ------------------------------------------------------------------ */
  var slides = document.querySelectorAll('.epx-banner__slide');
  if (slides.length > 1) {
    var si = 0;
    setInterval(function () {
      slides[si].classList.remove('is-active');
      si = (si + 1) % slides.length;
      slides[si].classList.add('is-active');
    }, 5200);
  }

  /* ------------------------------------------------------------------
     6b. Mobile hero slider: main.js only initialises the FIRST
     .hero-slider (the desktop one), so the mobile banner never rotated.
     Initialise any instance Swiper skipped — same slides, untouched.
     ------------------------------------------------------------------ */
  if (window.Swiper) {
    document.querySelectorAll('.hero-slider').forEach(function (el) {
      if (el.swiper || el.querySelectorAll('.swiper-slide').length < 2) { return; }
      new Swiper(el, {
        loop: true,
        slidesPerView: 1,
        effect: 'fade',
        speed: 2000,
        autoplay: { delay: 4000, disableOnInteraction: false }
      });
    });
  }

  /* ------------------------------------------------------------------
     7. Card tilt + mouse-follow spotlight
     ------------------------------------------------------------------ */
  if (finePointer && !reduceMotion) {
    // Spotlight glow follows the cursor on service/product cards
    document.querySelectorAll('.service-items-2, .product-card, .epx-quote-card').forEach(function (card) {
      card.classList.add('epx-spot');
      card.addEventListener('mousemove', function (e) {
        var r = card.getBoundingClientRect();
        card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
        card.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100) + '%');
      });
    });

    // Gentle 3D tilt on the home product strip
    document.querySelectorAll('.products-scroller .product-card').forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        var r = card.getBoundingClientRect();
        var dx = (e.clientX - r.left) / r.width - 0.5;
        var dy = (e.clientY - r.top) / r.height - 0.5;
        card.style.setProperty('--ry', (dx * 6) + 'deg');
        card.style.setProperty('--rx', (dy * -6) + 'deg');
      });
      card.addEventListener('mouseleave', function () {
        card.style.setProperty('--ry', '0deg');
        card.style.setProperty('--rx', '0deg');
      });
    });
  }

  /* ------------------------------------------------------------------
     8. Marquee: duplicate the track once so -50% translate loops cleanly
     ------------------------------------------------------------------ */
  document.querySelectorAll('.epx-marquee').forEach(function (track) {
    if (reduceMotion) { return; }
    track.innerHTML += track.innerHTML;
  });

  /* ------------------------------------------------------------------
     9. Read-more expander for clamped product descriptions
     Only adds a toggle when the text actually overflows its clamp.
     ------------------------------------------------------------------ */
  document.querySelectorAll('.epx-desc').forEach(function (desc) {
    if (desc.scrollHeight - desc.clientHeight < 8) { return; }
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'epx-desc-toggle';
    btn.setAttribute('aria-expanded', 'false');
    btn.innerHTML = 'Read more <i class="fa-solid fa-chevron-down"></i>';
    desc.insertAdjacentElement('afterend', btn);
    btn.addEventListener('click', function () {
      var open = desc.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      btn.innerHTML = (open ? 'Read less' : 'Read more') + ' <i class="fa-solid fa-chevron-down"></i>';
    });
  });

  /* ------------------------------------------------------------------
     10. Active page indicator in the nav
     ------------------------------------------------------------------ */
  var page = (location.pathname.split('/').pop() || 'index.php').toLowerCase();
  document.querySelectorAll('#mobile-menu > ul > li').forEach(function (li) {
    var links = li.querySelectorAll('a[href]');
    for (var i = 0; i < links.length; i++) {
      var href = (links[i].getAttribute('href') || '').split('#')[0].toLowerCase();
      if (href && href === page) {
        li.classList.add('epx-active');
        var sub = links[i].closest('.submenu li');
        if (sub) { sub.classList.add('epx-active'); }
        return;
      }
    }
  });

  /* ------------------------------------------------------------------
     11. Smooth in-page anchors + lazy-load safety net
     ------------------------------------------------------------------ */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    var id = a.getAttribute('href');
    if (id.length < 2 || a.hasAttribute('data-bs-toggle')) { return; }
    a.addEventListener('click', function (e) {
      var el = document.querySelector(id);
      if (!el) { return; }
      e.preventDefault();
      el.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
    });
  });

  // Lazy-load every image that sits below the first viewport
  document.querySelectorAll('img:not([loading])').forEach(function (img) {
    if (img.getBoundingClientRect().top > window.innerHeight) {
      img.setAttribute('loading', 'lazy');
    }
  });

  /* ------------------------------------------------------------------
     12. Enquiry form → send-enquiry.php (SMTP pipeline)
     ------------------------------------------------------------------ */
  var enquiryForm = document.getElementById('epxEnquiryForm');
  if (enquiryForm) {
    var statusBox = document.getElementById('epxFormStatus');
    var sendBtn = document.getElementById('epxSendBtn');
    var overlay = document.getElementById('epxSentOverlay');
    var modalEl = document.getElementById('exampleModal');

    var setStatus = function (msg, ok) {
      statusBox.textContent = msg;
      statusBox.className = 'epx-form-status ' + (ok ? 'is-ok' : 'is-err');
    };
    var clearStatus = function () {
      statusBox.textContent = '';
      statusBox.className = 'epx-form-status';
    };
    var fieldVal = function (id) {
      var el = document.getElementById(id);
      return el ? el.value.trim() : '';
    };

    /* Toast — used for server-side results */
    var toast = function (msg, ok) {
      var t = document.createElement('div');
      t.className = 'epx-toast ' + (ok ? 'is-ok' : 'is-err');
      t.innerHTML = '<i class="fa-solid ' + (ok ? 'fa-circle-check' : 'fa-circle-exclamation') + '"></i><span></span>';
      t.querySelector('span').textContent = msg;
      document.body.appendChild(t);
      requestAnimationFrame(function () { t.classList.add('is-in'); });
      setTimeout(function () {
        t.classList.remove('is-in');
        setTimeout(function () { t.remove(); }, 400);
      }, 4500);
    };

    /* Inline per-field validation */
    var markInvalid = function (id, msg) {
      var el = document.getElementById(id);
      if (!el) { return; }
      el.classList.add('epx-invalid');
      if (!el.parentNode.querySelector('.epx-field-err')) {
        var err = document.createElement('small');
        err.className = 'epx-field-err';
        err.textContent = msg;
        el.parentNode.appendChild(err);
      } else {
        el.parentNode.querySelector('.epx-field-err').textContent = msg;
      }
    };
    var clearInvalid = function (el) {
      el.classList.remove('epx-invalid');
      var err = el.parentNode.querySelector('.epx-field-err');
      if (err) { err.remove(); }
    };
    ['validationDefault01', 'validationDefault04', 'epxEmail', 'textArea'].forEach(function (id) {
      var el = document.getElementById(id);
      if (el) { el.addEventListener('input', function () { clearInvalid(el); }); }
    });

    enquiryForm.addEventListener('submit', function (e) {
      e.preventDefault();
      clearStatus();

      var name = fieldVal('validationDefault01');
      var mobile = fieldVal('validationDefault04');
      var email = fieldVal('epxEmail');
      var message = fieldVal('textArea');

      var valid = true;
      if (!name) { markInvalid('validationDefault01', 'Please enter your name.'); valid = false; }
      if (!mobile) { markInvalid('validationDefault04', 'Please enter your mobile number.'); valid = false; }
      else if (!/^[0-9+\-\s]{10,15}$/.test(mobile)) { markInvalid('validationDefault04', 'Enter a valid 10-digit mobile number.'); valid = false; }
      if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { markInvalid('epxEmail', 'This e-mail address looks incorrect.'); valid = false; }
      if (!message) { markInvalid('textArea', 'Please write a short message.'); valid = false; }
      if (!valid) {
        var firstBad = enquiryForm.querySelector('.epx-invalid');
        if (firstBad) { firstBad.focus(); }
        return;
      }

      var data = new FormData();
      data.append('name', name);
      data.append('mobile', mobile);
      data.append('email', email);
      data.append('category', fieldVal('validationDefault08'));
      data.append('message', message);
      data.append('website', fieldVal('epxHp')); // honeypot

      sendBtn.classList.add('is-loading');
      fetch('send-enquiry.php', { method: 'POST', body: data })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          sendBtn.classList.remove('is-loading');
          if (res.ok) {
            enquiryForm.reset();
            clearStatus();
            if (overlay) { overlay.classList.add('is-visible'); }
            toast('Enquiry sent! We will get back to you shortly.', true);
          } else {
            var msg = res.msg || 'Could not send right now. Please use WhatsApp below.';
            setStatus(msg, false);
            toast(msg, false);
          }
        })
        .catch(function () {
          sendBtn.classList.remove('is-loading');
          setStatus('Could not send right now. Please use the WhatsApp button below.', false);
          toast('Could not send right now. Please try the WhatsApp button.', false);
        });
    });

    if (modalEl) {
      modalEl.addEventListener('hidden.bs.modal', function () {
        if (overlay) { overlay.classList.remove('is-visible'); }
        clearStatus();
      });
    }
    if (overlay) {
      overlay.addEventListener('click', function () {
        overlay.classList.remove('is-visible');
      });
    }
  }

  /* ------------------------------------------------------------------
     N. Lazy-load the Google Maps embed only when the footer is near.
     Keeps ~0.5MB of third-party map JS/tiles off the initial load.
     ------------------------------------------------------------------ */
  (function () {
    var maps = document.querySelectorAll('iframe.epx-lazy-map[data-src]');
    if (!maps.length) { return; }
    function load(m) {
      if (m.dataset.src) { m.src = m.dataset.src; m.removeAttribute('data-src'); }
    }
    if (!('IntersectionObserver' in window)) {
      // Fallback: load on first user interaction.
      window.addEventListener('scroll', function once() {
        maps.forEach(load);
        window.removeEventListener('scroll', once);
      }, { passive: true });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { load(e.target); io.unobserve(e.target); }
      });
    }, { rootMargin: '400px 0px' });
    maps.forEach(function (m) { io.observe(m); });
  })();
})();
