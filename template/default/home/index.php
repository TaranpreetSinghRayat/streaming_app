<!-- owl-carousel Banner Start -->
<section class="pt-0 pb-0">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="gen-banner-movies banner-style-2">
                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                         data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                         data-loop="true" data-margin="0">
                        <?php if(!empty($ENTITIES->get_featured())): ?>
                            <?php foreach ($ENTITIES->get_featured() as $f_entity): ?>
                                    <div class="item" style="background: url('<?= BASE_URL . $f_entity['background'] ?>')">
                                    <div class="gen-movie-contain-style-2 h-100">
                                        <div class="container h-100">
                                            <div class="row flex-row-reverse align-items-center h-100">
                                                <div class="col-xl-6">
                                                    <div class="gen-front-image">
                                                        <img src="<?= BASE_URL . $f_entity['background'] ?>" alt="owl-carousel-banner-image">
                                                        <a href="<?= $f_entity['trailer'] ?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                                                 height="213.7px" viewBox="0 0 213.7 213.7"
                                                                 enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                      points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                                <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                                        cx="106.8" cy="106.8" r="103.3">
                                                                </circle>
                                          </svg>
                                                            <span>Watch Trailer</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="gen-tag-line"><span>Featured</span></div>
                                                    <div class="gen-movie-info">
                                                        <h3><?= $f_entity['name'] ?></h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul class="gen-meta-after-title">
                                                            <li class="gen-sen-rating">
                                                                <span><?= $f_entity['guidelines'] ?></span>
                                                            </li>
                                                            <li> <img src="<?= BASE_URL_ASSETS ?>images/asset-2.png" alt="rating-image">
                                                                <span>
                                                <?= $f_entity['IMDB'] ?></span>
                                                            </li>
                                                        </ul>
                                                        <p>
                                                            <?= $f_entity['summary'] ?>
                                                        </p>
                                                        <div class="gen-meta-info">
                                                            <ul class="gen-meta-after-excerpt">
                                                                <li>
                                                                    <strong>Cast :</strong>
                                                                    <?php
                                                                    $casts = json_decode($f_entity['cast'],true);
                                                                    $counter = 1;
                                                                    $max_limit = count($casts);
                                                                    $CASTS = new \App\Casts();
                                                                    foreach ($casts as $castID){
                                                                        $cast = $CASTS->get_by_id($castID);
                                                                        echo $cast['name'];
                                                                        if($counter < $max_limit){
                                                                            echo ', ';
                                                                        }
                                                                        $counter++;
                                                                    }
                                                                    ?>
                                                                </li>
                                                                <li>
                                                                    <strong>Genre :</strong>
                                                                    <span>
                                                   <a href="action.html">
                                                      Action, </a>
                                                </span>
                                                                    <span>
                                                   <a href="animation.html">
                                                      Annimation, </a>
                                                </span>
                                                                    <span>
                                                   <a href="#">
                                                      Family </a>
                                                </span>
                                                                </li>
                                                                <li>
                                                                    <strong>Tag :</strong>
                                                                    <span>
                                                   <a href="#">
                                                      4K Ultra, </a>
                                                </span>
                                                                    <span>
                                                   <a href="#">
                                                      Brother, </a>
                                                </span>
                                                                    <span>
                                                   <a href="#">
                                                      Dubbing, </a>
                                                </span>
                                                                    <span>
                                                   <a href="#">
                                                      Premieres </a>
                                                </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <div class="gen-btn-container">
                                                            <a href="single-movie.html" class="gen-button .gen-button-dark">
                                                                <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if(!empty($ENTITIES->get_most_viewed())): ?>
                            <?php $mv_entity = $ENTITIES->get_most_viewed(); ?>
                            <div class="item" style="background: url('<?= BASE_URL . $mv_entity['background'] ?>')">
                                <div class="gen-movie-contain-style-2 h-100">
                                    <div class="container h-100">
                                        <div class="row flex-row-reverse align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-front-image">
                                                    <img src="<?= BASE_URL . $mv_entity['background'] ?>" alt="owl-carousel-banner-image">
                                                    <a href="<?= $mv_entity['trailer'] ?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                      points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                            <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                                    cx="106.8" cy="106.8" r="103.3">
                                                            </circle>
                                          </svg>
                                                        <span>Watch Trailer</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="gen-tag-line"><span>Most Viewed</span></div>
                                                <div class="gen-movie-info">
                                                    <h3><?= $mv_entity['name'] ?></h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul class="gen-meta-after-title">
                                                        <li class="gen-sen-rating">
                                                            <span><?= $mv_entity['guidelines'] ?></span>
                                                        </li>
                                                        <li> <img src="<?= BASE_URL_ASSETS ?>images/asset-2.png" alt="rating-image">
                                                            <span>
                                                <?= $f_entity['IMDB'] ?></span>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        <?= $mv_entity['summary'] ?>
                                                    </p>
                                                    <div class="gen-meta-info">
                                                        <ul class="gen-meta-after-excerpt">
                                                            <li>
                                                                <strong>Cast :</strong>
                                                                <?php
                                                                $casts = json_decode($mv_entity['cast'],true);
                                                                $counter = 1;
                                                                $max_limit = count($casts);
                                                                $CASTS = new \App\Casts();
                                                                foreach ($casts as $castID){
                                                                    $cast = $CASTS->get_by_id($castID);
                                                                    echo $cast['name'];
                                                                    if($counter < $max_limit){
                                                                        echo ', ';
                                                                    }
                                                                    $counter++;
                                                                }
                                                                ?>
                                                            </li>
                                                            <li>
                                                                <strong>Genre :</strong>
                                                                <span>
                                                   <a href="action.html">
                                                      Action, </a>
                                                </span>
                                                                <span>
                                                   <a href="animation.html">
                                                      Annimation, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      Family </a>
                                                </span>
                                                            </li>
                                                            <li>
                                                                <strong>Tag :</strong>
                                                                <span>
                                                   <a href="#">
                                                      4K Ultra, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      Brother, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      Dubbing, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      Premieres </a>
                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <div class="gen-btn-container">
                                                        <a href="single-movie.html" class="gen-button .gen-button-dark">
                                                            <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- owl-carousel Banner End -->

<?php if(!empty($GENRE->get_all_ids())): ?>
    <?php foreach ($GENRE->get_all_ids() as $g_entity): ?>
        <!-- Slick Slider start -->
        <section class="gen-section-padding-2 pt-0 pb-0">
            <div class="container">
                <div class="home-singal-silder">
                    <div class="gen-nav-movies gen-banner-movies">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4><?= $GENRE->get_name_by_id($g_entity['id']) ?></h4>
                                <div class="slider slider-for">
                                    <!-- Slider Items -->
                                    <div class="slider-item" style="background: url('images/background/asset-4.jpg')">
                                        <div class="gen-slick-slider h-100">
                                            <div class="gen-movie-contain h-100">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col-lg-6">
                                                            <div class="gen-movie-info">
                                                                <h3>thieve the bank</h3>
                                                                <p>Streamlab is a long established fact that a reader will be distracted by
                                                                    the readable content of a page when Streamlab at its layout Streamlab.
                                                                </p>

                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <div class="gen-btn-container button-1">
                                                                    <a class="gen-button" href="#" tabindex="0">
                                                                        <i aria-hidden="true" class="ion ion-play"></i>
                                                                        <span class="text">Play Now</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item" style="background: url('images/background/asset-23.jpg')">
                                        <div class="gen-slick-slider h-100">
                                            <div class="gen-movie-contain h-100">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col-lg-6">
                                                            <div class="gen-movie-info">
                                                                <h3>Love your life</h3>
                                                                <p>Streamlab is a long established fact that a reader will be distracted by
                                                                    the readable content of a page when Streamlab at its layout Streamlab.
                                                                </p>

                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <div class="gen-btn-container button-1">
                                                                    <a class="gen-button" href="#" tabindex="0">
                                                                        <i aria-hidden="true" class="ion ion-play"></i>
                                                                        <span class="text">Play Now</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item" style="background: url('images/background/asset-24.jpg')">
                                        <div class="gen-slick-slider h-100">
                                            <div class="gen-movie-contain h-100">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col-lg-6">
                                                            <div class="gen-movie-info">
                                                                <h3>The Last Witness</h3>
                                                                <p>Streamlab is a long established fact that a reader will be distracted by
                                                                    the readable content of a page when Streamlab at its layout Streamlab.
                                                                </p>

                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <div class="gen-btn-container button-1">
                                                                    <a class="gen-button" href="#" tabindex="0">
                                                                        <i aria-hidden="true" class="ion ion-play"></i>
                                                                        <span class="text">Play Now</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item" style="background: url('images/background/asset-25.jpg')">
                                        <div class="gen-slick-slider h-100">
                                            <div class="gen-movie-contain h-100">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col-lg-6">
                                                            <div class="gen-movie-info">
                                                                <h3>Fight For Life</h3>
                                                                <p>Streamlab is a long established fact that a reader will be distracted by
                                                                    the readable content of a page when Streamlab at its layout Streamlab.
                                                                </p>

                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <div class="gen-btn-container button-1">
                                                                    <a class="gen-button" href="#" tabindex="0">
                                                                        <i aria-hidden="true" class="ion ion-play"></i>
                                                                        <span class="text">Play Now</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slider Items -->
                                </div>
                                <div class="slider slider-nav">
                                    <div class="slider-nav-contain">
                                        <div class="gen-nav-img">
                                            <img src="images/background/asset-4.jpg" alt="steamlab-image">
                                        </div>
                                        <div class="movie-info">
                                            <h3>thieve the bank</h3>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>30mins</li>
                                                    <li>
                                                        <a href="action.html">
                                                            Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav-contain">
                                        <div class="gen-nav-img">
                                            <img src="images/background/asset-23.jpg" alt="streamlab-image">
                                        </div>
                                        <div class="movie-info">
                                            <h3>Love your life</h3>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>1hr 46mins</li>
                                                    <li>
                                                        <a href="action.html">
                                                            Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav-contain">
                                        <div class="gen-nav-img">
                                            <img src="images/background/asset-24.jpg" alt="streamlab-image">
                                        </div>
                                        <div class="movie-info">
                                            <h3>The Last Witness</h3>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>1hr 37 mins</li>
                                                    <li>
                                                        <a href="action.html">
                                                            Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav-contain">
                                        <div class="gen-nav-img">
                                            <img src="<?= BASE_URL_ASSETS ?>images/background/asset-25.jpg" alt="streamlab-image">
                                        </div>
                                        <div class="movie-info">
                                            <h3>Fight For Life</h3>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>2hr 25 mins</li>
                                                    <li>
                                                        <a href="action.html">
                                                            Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slick Slider End -->
    <?php endforeach; ?>
<?php endif; ?>
