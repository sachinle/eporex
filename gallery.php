<?php include 'maintop.php'?>

    <body>

    

       <?php include 'header.php'?>

        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/w2.jpg');">
            <!--<div class="mask-shape">
                <img class="img-fluid" src="assets/img/mask-shape.png" alt="shape-img">
            </div>-->
            <div class="container">
                <div class="page-heading">
                    <h1>Our Gallery</h1>
                    <ul class="breadcrumb-items">
                        <li>
                            <a href="index.php">
                            Home
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            Our Gallery
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Gallery Section Start -->
        <div class="gallery-section container py-5">
            <div class="gallery-wrapper">
                <div class="row g-4">
							<div class="col-lg-4">
								<div class="gallery-image-2">
                                    <img class="img-fluid" src="assets/img/gallery/1.jpg" alt="gallery-img">
                                    <a href="assets/img/gallery/1.jpg" class="icon img-popup">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-2">
									<img class="img-fluid" src="assets/img/gallery/2.jpg" alt="gallery-img">
                                    <a href="assets/img/gallery/2.jpg" class="icon img-popup">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-2">
									<img class="img-fluid" src="assets/img/gallery/3.jpg" alt="gallery-img">
                                    <a href="assets/img/gallery/3.jpg" class="icon img-popup">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </div>
                            </div>
                    <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/4.jpg" alt="gallery-img">
                            <a href="assets/img/gallery/4.jpg" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/5.jpg" alt="gallery-img">
                            <a href="assets/img/gallery/5.jpg" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/6.jpg" alt="gallery-img">
                            <a href="assets/img/gallery/6.jpg" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
					 <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/7.jpg" alt="gallery-img">
                            <a href="assets/img/gallery/7.jpg" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/8.png" alt="gallery-img">
                            <a href="assets/img/gallery/8.png" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="gallery-image-2">
							<img class="img-fluid" src="assets/img/gallery/9.png" alt="gallery-img">
                            <a href="assets/img/gallery/9.png" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
				
                </div>

                <?php
                /* Product gallery — every pack shot in assets/img/eporex-products
                   appears here automatically with a lightbox. */
                $__gdir   = 'assets/img/eporex-products';
                $__gfiles = glob($__gdir . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG}', GLOB_BRACE);
                sort($__gfiles);
                if (!empty($__gfiles)):
                ?>
                <div class="epx-gallery-heading">
                    <h2>Our Products</h2>
                </div>
                <div class="row g-4">
                    <?php foreach ($__gfiles as $__gf):
                        $__gname = ucwords(str_replace('-', ' ', preg_replace('/^eporex-|-[12]$/', '', pathinfo($__gf, PATHINFO_FILENAME))));
                    ?>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="gallery-image-2 epx-shot">
                            <img class="img-fluid" src="<?php echo htmlspecialchars($__gf); ?>" alt="EPOREX <?php echo htmlspecialchars($__gname); ?>" loading="lazy">
                            <a href="<?php echo htmlspecialchars($__gf); ?>" class="icon img-popup">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php include 'footer.php'?>

        <?php include 'mainbot.php'?>
    </body>
</html>