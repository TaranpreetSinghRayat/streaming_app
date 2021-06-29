<?php if(\App\Session::exists('isLoggedIn')): ?>
<!-- footer start -->
<footer id="gen-footer">
    <div class="gen-footer-style-1">
        <div class="gen-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="widget">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="<?= $app_logo ?>" class="gen-footer-logo" alt="gen-footer-logo">
                                    <p><?= $app_description ?></p>
                                    <ul class="social-link">
                                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                        <!--li><a href="#" class="facebook"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="widget">
                            <h4 class="footer-title">Explore</h4>
                            <div class="menu-explore-container">
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="index.html" aria-current="page">Home</a>
                                    </li>
                                    <li class="menu-item"><a href="movies-pagination.html">Movies</a></li>
                                    <li class="menu-item"><a href="tv-shows-pagination.html">Tv Shows</a></li>
                                    <li class="menu-item"><a href="video-pagination.html">Videos</a></li>
                                    <li class="menu-item"><a href="#">Actors</a></li>
                                    <li class="menu-item"><a href="#">Basketball</a></li>
                                    <li class="menu-item"><a href="#">Celebrity</a></li>
                                    <li class="menu-item"><a href="#">Cross</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="widget">
                            <h4 class="footer-title">Company</h4>
                            <div class="menu-about-container">
                                <ul class="menu">
                                    <li class="menu-item"><a href="contact-us.html">Company</a>
                                    </li>
                                    <li class="menu-item"><a href="contact-us.html">Privacy
                                            Policy</a></li>
                                    <li class="menu-item"><a href="contact-us.html">Terms Of
                                            Use</a></li>
                                    <li class="menu-item"><a href="contact-us.html">Help
                                            Center</a></li>
                                    <li class="menu-item"><a href="contact-us.html">contact us</a></li>
                                    <li class="menu-item"><a href="pricing-style-1.html">Subscribe</a></li>
                                    <li class="menu-item"><a href="#">Our Team</a></li>
                                    <li class="menu-item"><a href="contact-us.html">Faq</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6">
                        <!--div class="widget">
                            <h4 class="footer-title">Downlaod App</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">
                                        <img src="images/asset-35.png" class="gen-playstore-logo" alt="playstore">
                                    </a>
                                    <a href="#">
                                        <img src="images/asset-36.png" class="gen-appstore-logo" alt="appstore">
                                    </a>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
        <div class="gen-copyright-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                     <span class="gen-copyright"><a target="_blank" href="#"> Copyright <?= date('Y') ?> <?= APP_NAME ?> <?= 'ver '. APP_VER ?> All Rights
                           Reserved.</a>
                         <br />
                         Developed By  <a href="https://tweekersnut.com" target="_blank"> <?= $_ENV['DEV'] ?> </a>
                     </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer End -->
<?php endif; ?>
<!-- Back-to-Top start -->
<div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
</div>
<!-- Back-to-Top end -->
<script>
    var BASE_URL_ASSETS = '<?= BASE_URL_ASSETS ?>'
</script>
<!-- js-min -->
<script src="<?= BASE_URL_ASSETS ?>js/jquery-3.6.0.min.js"></script>
<script src="<?= BASE_URL_ASSETS ?>js/asyncloader.min.js"></script>
<!-- JS bootstrap -->
<script src="<?= BASE_URL_ASSETS ?>js/bootstrap.min.js"></script>
<!-- owl-carousel -->
<script src="<?= BASE_URL_ASSETS ?>js/owl.carousel.min.js"></script>
<!-- counter-js -->
<script src="<?= BASE_URL_ASSETS ?>js/jquery.waypoints.min.js"></script>
<script src="<?= BASE_URL_ASSETS ?>js/jquery.counterup.min.js"></script>
<!-- popper-js -->
<script src="<?= BASE_URL_ASSETS ?>js/popper.min.js"></script>
<script src="<?= BASE_URL_ASSETS ?>js/swiper-bundle.min.js"></script>
<!-- Iscotop -->
<script src="<?= BASE_URL_ASSETS ?>js/isotope.pkgd.min.js"></script>

<script src="<?= BASE_URL_ASSETS ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?= BASE_URL_ASSETS ?>js/slick.min.js"></script>

<!-- Bootstrap Toaster -->
<script src="<?= BASE_URL_ASSETS ?>js/bootstrap-toaster.min.js"></script>
<!-- Toaster Defaults -->
<script>
    Toast.setTheme(TOAST_THEME.DARK);
    Toast.enableTimers(true);
    Toast.setMaxCount(5);
</script>

<script src="<?= BASE_URL_ASSETS ?>js/streamlab-core.js"></script>

<script src="<?= BASE_URL_ASSETS ?>js/script.js"></script>


</body>
</html>