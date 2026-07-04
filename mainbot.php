 <!--<< All JS Plugins >>-->
        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <!--<< Viewport Js >>-->
        <script src="assets/js/viewport.jquery.js"></script>
        <!--<< Bootstrap Js >>-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--<< Nice Select Js >>-->
        <script src="assets/js/jquery.nice-select.min.js"></script>
        <!--<< Waypoints Js >>-->
        <script src="assets/js/jquery.waypoints.js"></script>
        <!--<< Counterup Js >>-->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <!--<< MeanMenu Js >>-->
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!--<< Wow Animation Js >>-->
        <script src="assets/js/wow.min.js"></script>
        <!--<< Main.js >>-->
        <script src="assets/js/main.js"></script>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> 
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

		<!--<< EPOREX subtle scroll-reveal (progressive enhancement) >>-->
		<script>
		(function () {
			var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
			if (reduce || !('IntersectionObserver' in window)) { return; }
			var els = document.querySelectorAll('.wow');
			// Flag support so the CSS pre-hide only applies when we can reveal.
			document.documentElement.classList.add('epx-js');
			var io = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('epx-in');
						io.unobserve(entry.target);
					}
				});
			}, { threshold: 0.1, rootMargin: '0px 0px -6% 0px' });
			els.forEach(function (el) { io.observe(el); });
			// Safety net: reveal anything already in view shortly after load.
			window.addEventListener('load', function () {
				setTimeout(function () {
					document.querySelectorAll('.wow:not(.epx-in)').forEach(function (el) {
						var r = el.getBoundingClientRect();
						if (r.top < window.innerHeight) { el.classList.add('epx-in'); }
					});
				}, 400);
			});
		})();
		</script>