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
                                    <?php if(!empty($gen_list)): ?>
                                        <?php foreach ($gen_list as $item): ?>
                                            <li class="menu-item"><a href="<?= BASE_URL ?>entitie.php?genre=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="widget">
                            <h4 class="footer-title">Company</h4>
                            <div class="menu-about-container">
                                <ul class="menu">
                                    <?php if(!empty($company_pages)): ?>
                                        <?php foreach ($company_pages as $page): ?>
                                            <li class="menu-item"><a href="<?= BASE_URL ?>page.php?view=<?= $page['slug'] ?>"><?= $page['title'] ?></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <li class="menu-item"><a href="<?= BASE_URL ?>contact.php">Contact us</a></li>
                                    <li class="menu-item"><a href="">Subscribe</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6">
                        <?php if(\App\Session::get('role') == 'Administrator'): ?>
                        <div class="widget">
                            <h4 class="footer-title">Adminstration Options</h4>
                            <div class="menu-about-container">
                                <ul class="menu">
                                    <li class="menu-item"><a target="_blank" href="<?= BASE_URL ?>admin/">Admin. Panel</a></li>

                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
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

<!-- Video Player -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js"></script>
<script src="<?= BASE_URL_ASSETS ?>video_player/jump-forward/jump-forward.js"></script>
<script src="<?= BASE_URL_ASSETS ?>video_player/skip-back/skip-back.js"></script>
<script src="<?= BASE_URL_ASSETS ?>video_player/speed/speed.js"></script>
<script>
    var mediaElements = document.querySelectorAll('video, audio');

    for (var i = 0, total = mediaElements.length; i < total; i++) {

        var features = ['playpause', 'current', 'progress', 'duration', 'volume', 'skipback', 'jumpforward', 'speed', 'fullscreen'];

        new MediaElementPlayer(mediaElements[i], {
            autoRewind: false,
            features: features,
        });
    }
</script>
<!-- //Video Player -->

</body>
</html>