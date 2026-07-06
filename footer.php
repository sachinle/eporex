<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  /*width: 50%;*/
  margin-left: 50px;
}
td, th {
  border: 1px solid #fff;
  text-align: left;
  padding: 8px;
}
/*tr:nth-child(even) {
  background-color: #dddddd57;
}*/
:root{
	/* Brand-aligned tokens (see assets/css/eporex-redesign.css) */
	--color-gradient-1: linear-gradient(90deg, #20BB99 0%, #148A71 100%) !important;
	--theme: #20BB99 !important;
	--theme2: #20BB99 !important;
	--color-gradient-4: linear-gradient(226.22deg, rgba(32, 187, 153, 0) 0%, #148A71 84.75%) !important;
	--color-gradient-2:	linear-gradient(90deg, rgba(9,26,22,.74) 0%, rgba(9,26,22,.05) 100%) !important;
	--color-gradient-3: linear-gradient(180deg, rgba(32, 187, 153, 0) 0%, #148A71 100%) !important;
}
.main-sidebar .single-sidebar-widget{
	background-color:#20BB99 !important;
}
.footer-bottom{
	padding:5px 0px !important;
}
.contact-info-wrapper-2 .contact-info-items .icon{
    -webkit-text-fill-color: #fff !important;
}
.hero-1{
	padding:320px 0px !important;
}
@media (max-width: 991px){
	.hero-1{ padding:200px 0px !important; }
}
@media (max-width: 575px){
	.hero-1{ padding:140px 0px !important; }
}
.about-wrapper-2 .about-image.style-2 .title-text{
	background: linear-gradient(0deg, #21b896 37.7%, rgba(238, 51, 43, 0) 100%) !important;
}
.about-wrapper-2 .about-content ul li::before{
	content:none !important;
}
.gallery-wrapper .gallery-image-2{
	height:unset !important;
}
.breadcrumb-wrapper .page-heading{
	padding-top:160px !important;
	padding-bottom:160px !important;
}
.enquire:hover{
	background: #fff;
    color: #23a482;
    padding: 7px;
}
.enquire{
	border: 2px solid #fff;
	background: #23a482;
    color: #fff;
    padding: 7px;
}
#whatsappChats {
    position: fixed;
    bottom: 10px;
    right: 140px;
    width: 66px;
    height: 66px;
    visibility: visible;
    z-index: 999999999;
    display: none;
    backface-visibility: hidden;
    opacity: 1;
    transform: translateX(50%);
    filter: drop-shadow(rgba(0, 0, 0, 0.5) 2px 2px 1px);
    background: 0px 0px;
    border-width: 0px;
    border-style: initial;
    border-color: initial;
    border-image: initial;
    transition: transform 0.2s ease-in-out 0s;
}

#whatsappChats img {
    width: 55px;
    height: auto;
    position: relative;
    z-index: 1;
    transform: scale(1.1);
}

#whatsappChats .whatsappChatsText {
    width: 140px;
    height: 40px;
    position: absolute;
    color: rgb(33, 33, 33);
    left: 25px;
    text-align: right;
    font-size: 11px;
    line-height: 1.1;
    font-weight: 600;
    bottom: 20px;
    letter-spacing: 0.04em;
    background: rgb(255, 190, 74);
    padding: 5px 15px;
    border-radius: 0px 6px 6px 0px;
}

#whatsappChats .whatsappChatsText strong {
    font-size: 16px;
    line-height: 1;
    letter-spacing: 0.07em;
}

.float12{
    position: fixed;
    width: 45px;
    height: 45px;
    bottom: 90px;
    right: 25px;
    background-color: #ee555d;
    color: white;
    border-radius: 50px;
    text-align: center;
    font-size: 25px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
    line-height: 40px;
}

.my-float1{
    margin-top: 11px;
    margin-left: 0px;
}
.float1{
		background: #f5b032!important;
	}
	.float1:hover{
		background: #fff!important;
		color: #f5b032!important;
	}
#btn_float {
    height: 0px;
    width: 80px;
    position: fixed;
    right: 0;
    top: 55%;
    z-index: 1000;
    transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
#btn_float a {
    display: block;
    background: #fff;
    height: 52px;
    padding-top: 07px;
    width: 160px;
    text-align: center;
    color: #259877;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
	border:1px solid #259877;
}
#btn_float a:hover{
	
	border:1px solid #fff;
    background: #259877;
    color: #fff!important;   
}
.btn-primary {
    color: #fff;
    background-color: #48c858 !important;
    border-color: #48c858 !important;
}
.modal {
    --bs-modal-zindex: 9999;
}
.form-wrap h2, .form-group, .nice-select span{
	color:#000 !important;
}
.nice-select {
    border: 2px solid var(--border) !important;
	padding-bottom: 7px !important;
    border-radius: 6px !important;
}
.section-padding{
    padding:96px 0px !important;
}
@media (max-width: 991px){
    .section-padding{ padding:64px 0px !important; }
}
.scroll-up{
    bottom:75px !important;
}





</style>
<!-- Footer Section Start -->
        <footer class="footer-section fix bg-cover" style="">
            <div class="container">
                <div class="footer-widgets-wrapper">
                    <div class="row">
					 <div class="col-xl-3 col-lg-3 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
					 <div class="single-footer-widget">
					  <div class="logo">
                                    <a href="index.php" class="header-logo">
                                    <img class="img-fluid" width="160px" height="100px" src="assets/img/logo/epo_logo1.png" alt="logo-img">
                                    </a>
                                </div>
                                <div class="widget-head">
                                    <h6>EPOREX INDUSTRIES PRIVATE LIMITED is involved in manufacturing and supply of performance chemicals which serves various industries including paints & Coatings, cosmetic, agro and others.</h6>
                                </div>
                          
                        </div>
						 </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="single-footer-widget" style="font-size:13px;">
                                <!--<div class="widget-head">
                                    <a href="index.html">
                                        <img src="assets/img/logo/logo.svg" alt="logo-img">
                                    </a>
                                </div>-->
								<div class="widget-head">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="footer-content">
                                    <!--<p>
                                        Phasellus ultricies aliquam volutpat <br>
                                        ullamcorper laoreet neque, a lacinia <br>
                                        curabitur lacinia mollis
                                    </p>-->
                                    <ul class="contact-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                           EPOREX INDUSTRIES PRIVATE LIMITED<br> &nbsp;&nbsp;&nbsp;&nbsp;No-781/137A2, Salem Road, Namakkal, <br> &nbsp;&nbsp;&nbsp;   Tamil Nadu - 637001. &nbsp;&nbsp;&nbsp; 
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-phone-volume"></i>
                                            <a href="tel:+917358010419">+91 73580 10419</a>
                                        </li>
										<li>
                                            <i class="fab fa-whatsapp"></i>
                                            <a href="tel:+919360105509">+91 93601 05509</a>
                                        </li>
										<li>
                                            <i class="fa fa-envelope-open"></i>
                                            <a href="mailto:Eporexindia@gmail.com">info@eporex.in</a>
                                        </li>
                                    </ul>
                                </div>
							<!--<div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>Quick Links</h4>
                                </div>
                                <ul class="list-area">
                                    <li>
                                        <a href="about.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            About
                                        </a>
                                    </li>
									<li>
                                        <a href="contact1.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Contact
                                        </a>
                                    </li>
								</ul>
								</div>-->
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>Quick Links</h4>
                                </div>
                                <ul class="list-area">
                                  <!--  <li>
                                        <a href="about.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            About
                                        </a>
                                    </li>
                                   <li>
                                        <a href="gallery.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Gallery
                                        </a>
                                    </li>-->
									
									<li>
                                        <a href="water_proof.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Waterproofing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="resin.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Resin Art
                                        </a>
                                    </li>
                                    <li>
                                        <a href="coating.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Industrial Coating
                                       </a>
                                    </li>
									 <li>
                                        <a href="industrialchemical.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            Industrial Chemical
                                       </a>
                                    </li>
									
									
                                   <li>
                                        <a href="contact1.php">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            contact
                                       </a>
                                    </li>
                                   
                                </ul>
							
							
							
							</div>
                        </div>
                        <!--<div class="col-xl-3 col-lg-4 col-md-6 ps-lg-2 wow fadeInUp" data-wow-delay=".7s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>Latest Post</h4>
                                </div>
                               <div class="footer-post">
                                    <div class="single-post-item mb-4">
                                        <div class="thumb bg-cover" style="background-image: url('assets/img/news/pp1.jpg');"></div>
                                        <div class="post-content">
                                            <div class="post-date">
                                                <i class="far fa-calendar-alt"></i>15 Dec, 2024
                                            </div>
                                            <h6>
                                                <a href="news-details.html">Energetically Envisioned Is 
                                                User Friendly</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="single-post-item">
                                        <div class="thumb bg-cover" style="background-image: url('assets/img/news/pp2.jpg');"></div>
                                        <div class="post-content">
                                            <div class="post-date">
                                                <i class="far fa-calendar-alt"></i>29 Feb, 2024
                                            </div>
                                            <h6>
                                                <a href="news-details.html">Construction Site Security Guide Lide</a>
                                            </h6>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>-->     

					
					
                        <div class="col-xl-3 col-lg-3 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".9s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h4>In Google</h4>
                                </div>
								<iframe class="epx-lazy-map" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.122877073274!2d78.1653719!3d11.2523702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babcf9051bcee57%3A0xa080b0363ccea7c9!2sEPOREX!5e0!3m2!1sen!2sin!4v1711014784099!5m2!1sen!2sin" width="100%" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!--<div class="footer-content">
                                    <p>
                                        Sing Up For News & Get 30% Off <br>
                                        Your Next Course.
                                    </p>
                                    <div class="footer-input">
                                        <input type="email" id="email" placeholder="Your email address">
                                        <button class="theme-btn" type="submit">
                                            Subscribe Now
                                        </button>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-wrapper">
                        <p>
                            © All Copyright 2026 by <a href="index.php">Eporex</a>
                        </p>
                       <!--   <ul>
                            <li><a href="contact.html">Terms & Condition</a></li>
                            <li><a href="contact.html"> Privacy Policy</a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
        </footer>

        <!-- Back To Top Start -->
        <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
<a id="whatsappChats" href="https://api.whatsapp.com/send?phone=919360105509&text=Hi" target="_blank" rel="nofollow"
    class="pushItDown" style="display: inline;">
    <img class="img-whatsapp" loading="lazy" src="https://www.ezeecentrix.com/images/whatsAppIcon.png" width="66"
        height="66">
    <span class="whatsappChatsText shotcuts">Chat with us on <strong>WhatsApp</strong></span>
</a>

<a href="tel:917358010419" class="d-lg-none d-block float12" target="_blank">
<i class="fa fa-phone my-float1"></i>
</a>
<div id="btn_float">
	<a href="#" class="txt" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:16px;">
		Enquire Now
	</a></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="epx-sent-overlay" id="epxSentOverlay">
                <div class="check"><i class="fa-solid fa-check"></i></div>
                <h5>Enquiry Sent!</h5>
                <p>Thank you &mdash; our team will get back to you shortly.</p>
            </div>
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Booking From</h5> -->
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body padding">
                <div class="form-wrap" style="padding: 0px 25px;">
                    <h2 class="modal-title text-center">Eporex Enquiries</h2>
                    <form class="row" action="send-enquiry.php" method="post" id="epxEnquiryForm" novalidate>
                        <div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault01" class="form-label">Enter Full Name<span style="font-size: 20px;"> *</span></label>
                            <input type="text" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-lg-6 col-md-12 form-group">
                            <label for="epxEmail" class="form-label">E-mail Address</label>
                            <input type="email" class="form-control" id="epxEmail" placeholder="optional">
                        </div>
                        <!--<div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault02" class="form-label">Check in<span style="font-size: 20px;"> *</span></label>
                            <input type="date" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault03" class="form-label">Check Out<span style="font-size: 20px;"> *</span></label>
                            <input type="date" class="form-control" id="validationDefault03" required>
                        </div>
                        <div class="col-lg-3 col-md-6 form-group">
                            <label for="validationDefault05" class="form-label">No. Of Adults<span style="font-size: 20px;"> *</span></label>
                            <input type="number" class="form-control" name="country_code" id="validationDefault05"
                                name="numonly" maxlength="2"min="0" required>
                        </div>
                        <div class="col-lg-3 col-md-6 form-group">
                            <label for="validationDefault06" class="form-label">No. Of Kids<span style="font-size: 20px;"> *</span></label>
                            <input type="number" class="form-control" name="country_code" id="validationDefault06"
                                name="numonly" maxlength="2"min="0" required>
                        </div>-->
                         <div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault04" class="form-label">Enter Mobile Number<span style="font-size: 20px;"> *</span></label>
                            <input type="text" class="form-control" name="country_code" id="validationDefault04"
                                name="numonly" maxlength="10" min="0"type="text" id="youridher" size="10" required>
                        </div>
                        <!--<div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault07" class="form-label">No. Of Room Required<span style="font-size: 20px;"> *</span></label>
                            <input type="number" class="form-control" name="country_code" id="validationDefault07"
                                name="numonly" maxlength="2"min="0" required>
                        </div>-->
                        <div class="col-lg-6 col-md-12 form-group">
                            <label for="validationDefault08" class="form-label">Categories<span style="font-size: 20px;"> *</span></label>
                           <br> <select  class="form-control" name="country_code" id="validationDefault08"
                                     name="numonly" maxlength="5" required>                                     
                                      <option value="Waterproofing">Waterproofing</option>
									  <option value="Industrial Coating">Industrial Coating</option>
									  <option value="Resin Art">Resin Art</option>
									  <option value="Industrial chemicals">Industrial chemicals</option>
                                  </select>                          
                        </div>
                        
                      <div class="col-lg-12 col-md-12 form-group">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message<span style="font-size: 20px;"> *</span></label>
                                <textarea class="form-control" id="textArea" rows="3" style="height: 60px;"
                                    required></textarea>
                            </div>
                        </div>

                        <!-- Honeypot: humans never see or fill this field -->
                        <div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
                            <input type="text" name="website" id="epxHp" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="col-lg-12 col-md-12 form-group">
                            <div class="epx-form-status" id="epxFormStatus" role="status"></div>
                            <div class="enquiry-actions">
                                <button class="btn btn-mail" type="submit" id="epxSendBtn"><span class="epx-btn-spinner"></span><i class="fas fa-paper-plane"></i> Send Enquiry</button>
                                <button class="btn btn-whatsapp" type="button" onclick="gotowhatsapp()"><i class="fab fa-whatsapp"></i> Contact via WhatsApp</button>
                            </div>
                        </div>
                    </form>
					</div>
				</div>
		</div>
		</div>
	</div>
	<script>
window.onload = function() {
    //from ww  w . j  a  va2s. c  o  m
    var today = new Date().toISOString().split("T")[0];
    document
        .getElementsByName("setTodaysDate")[0]
        .setAttribute("min", today);
    document
        .getElementsByName("setTodaysDate1")[0]
        .setAttribute("min", today);
};
</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = "0" + dd;
}
if (mm < 10) {
    mm = "0" + mm;
}
newtoday = yyyy + "-" + mm + "-" + dd;

function myFunction() {
    document.getElementById("validationDefault02").value = newtoday;
    document.getElementById("validationDefault03").value = newtoday;
    console.log(newtoday);
}

myFunction();
</script>
	<script>
function gotowhatsapp() {
    var name = document.getElementById("validationDefault01").value;
    var mobile = document.getElementById("validationDefault04").value;
    var categories = document.getElementById("validationDefault08").value;
     var textarea = document.getElementById("textArea").value;
   
    if (name, mobile, categories, textarea != "") {
        var url = "https://wa.me/919360105509?text=" +
            "*Name*: " + name + "%0a" +
            "*Mobile*: " + mobile + "%0a" +
            "*Categories*: " + categories + "%0a"+
            "*Message*: " + textarea + "%0a"
        window.open(url, '_blank').focus();
    }


}

function mailUs() {
    var name = document.getElementById("validationDefault01").value;
    var mobile = document.getElementById("validationDefault04").value;
    var categories = document.getElementById("validationDefault08").value;
    var textarea = document.getElementById("textArea").value;

    var subject = "Eporex Enquiry" + (name ? " from " + name : "") + (categories ? " - " + categories : "");
    var body =
        "Name: " + name + "\n" +
        "Mobile: " + mobile + "\n" +
        "Categories: " + categories + "\n" +
        "Message: " + textarea + "\n";

    var url = "mailto:info@eporex.in?subject=" + encodeURIComponent(subject) +
              "&body=" + encodeURIComponent(body);
    window.location.href = url;
}

/* Numeric-only inputs — vanilla, no jQuery needed (runs at parse). */
document.addEventListener('input', function (e) {
    if (e.target && e.target.matches("input[name='numonly']")) {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    }
});
</script>
