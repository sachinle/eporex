<?php
/* ---------------------------------------------------------------------------
   EPOREX — Product Showcase
   Auto-builds a premium product grid from the images already present in
   assets/img/eporex-products/. Product titles are derived from the existing
   image file names only — no specifications, prices or descriptions are
   invented. Any product image added to that folder later appears automatically.
   --------------------------------------------------------------------------- */
$__pdir  = 'assets/img/eporex-products';
$__files = glob($__pdir . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG}', GLOB_BRACE);
sort($__files);

$__seen     = array();
$__products = array();
$__small    = array('and', 'the', 'of', 'for', 'to', 'a', 'with');
$__acr      = array('ms', 'pu', 'pur', 'cb', 'dji', 'afs', 'epf', 'ej', 'ewt', 'pvc', 'uv');

foreach ($__files as $__f) {
    $__fname = pathinfo($__f, PATHINFO_FILENAME);
    $__base  = preg_replace('/^eporex-/i', '', $__fname);
    $__key   = preg_replace('/-[12]$/', '', $__base); // collapse -1/-2 photo variants
    if (isset($__seen[$__key])) { continue; }
    $__seen[$__key] = true;

    $__tokens = explode('-', $__key);
    foreach ($__tokens as $__i => $__t) {
        if ($__t === '') { continue; }
        if (in_array(strtolower($__t), $__acr, true) || preg_match('/\d/', $__t)) {
            $__tokens[$__i] = strtoupper($__t);
        } elseif (in_array(strtolower($__t), $__small, true) && $__i > 0) {
            $__tokens[$__i] = strtolower($__t);
        } else {
            $__tokens[$__i] = ucfirst($__t);
        }
    }
    $__title = implode(' ', array_filter($__tokens, 'strlen'));
    $__products[] = array('img' => $__f, 'title' => $__title);
}

/* Optional cap set by the including page (e.g. the homepage shows a curated
   strip instead of the full range). */
if (isset($showcase_limit) && $showcase_limit > 0) {
    $__products = array_slice($__products, 0, $showcase_limit);
}

if (!empty($__products)):
?>
<!-- Products Section Start -->
<section class="products-section fix section-padding" id="products">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">OUR PRODUCTS</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Product Range</h2>
        </div>
        <div class="products-scroller mt-3">
            <?php foreach ($__products as $__idx => $__p): ?>
            <article class="product-card wow fadeInUp" data-wow-delay="<?php echo '.' . (($__idx % 4) * 2 + 2) . 's'; ?>">
                <div class="product-card__media">
                    <img src="<?php echo htmlspecialchars($__p['img']); ?>"
                         alt="EPOREX <?php echo htmlspecialchars($__p['title']); ?>"
                         loading="lazy" width="440" height="550">
                </div>
                <div class="product-card__body">
                    <h3 class="product-card__title"><?php echo htmlspecialchars($__p['title']); ?></h3>
                    <a href="#" class="product-card__cta" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enquire <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
