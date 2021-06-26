<!-- owl-carousel Banner Start -->
<section class="pt-0 pb-0">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="gen-banner-movies banner-style-2">
                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                         data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                         data-loop="true" data-margin="0">
                        <?php if(!empty($data['most_view'])): ?>
                            <div class="item" style="background: url('<?= BASE_URL . $data['most_view']['background'] ?>')">
                                <div class="gen-movie-contain-style-2 h-100">
                                    <div class="container h-100">
                                        <div class="row flex-row-reverse align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-front-image">
                                                    <img src="<?= BASE_URL . $data['most_view']['background'] ?>" alt="owl-carousel-banner-image">
                                                    <a href="<?= $data['most_view']['trailer'] ?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
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
                                                    <h3><?= $data['most_view']['name'] ?></h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul class="gen-meta-after-title">
                                                        <li class="gen-sen-rating">
                                             <span><?= $data['most_view']['guidelines'] ?></span>
                                                        </li>
                                                        <li> <img src="<?= BASE_URL_ASSETS ?>images/asset-2.png" alt="rating-image">
                                                            <span>
                                                <?= $data['most_view']['IMDB'] ?></span>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        <?= $data['most_view']['summary'] ?>
                                                    </p>
                                                    <div class="gen-meta-info">
                                                        <ul class="gen-meta-after-excerpt">
                                                            <li>
                                                                <strong>Cast :</strong>
                                                                <?php
                                                                    $casts = json_decode($data['most_view']['cast'],true);
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
                        <?php if(!empty($data['high_raiting'])): ?>
                            <div class="item" style="background: url('<?= BASE_URL_ASSETS ?>images/background/asset-3.jpg')">
                                <div class="gen-movie-contain-style-2 h-100">
                                    <div class="container h-100">
                                        <div class="row flex-row-reverse align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-front-image ">
                                                    <img src="<?= BASE_URL_ASSETS ?>images/background/asset-3.jpg" alt="owl-carousel-banner-image">
                                                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_19_" fill="none" stroke-width="7"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                      points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                            <circle class="circle" id="XMLID_20_" fill="none" stroke-width="7"
                                                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                                    cx="106.8" cy="106.8" r="103.3">
                                                            </circle>
                                          </svg>
                                                        <span>Watch Trailer</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="gen-tag-line"><span>Best Of 2021</span></div>
                                                <div class="gen-movie-info">
                                                    <h3>The Express</h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul class="gen-meta-after-title">
                                                        <li class="gen-sen-rating">
                                             <span>
                                                PG-14</span>
                                                        </li>
                                                        <li> <img src="<?= BASE_URL_ASSETS ?>images/asset-2.png" alt="rating-image">
                                                            <span>
                                                8.5 </span>
                                                        </li>
                                                    </ul>
                                                    <p>Streamlab is a long established fact that a reader will be distracted
                                                        by the readable content of a page when Streamlab at its layout
                                                        Streamlab.
                                                    </p>
                                                    <div class="gen-meta-info">
                                                        <ul class="gen-meta-after-excerpt">
                                                            <li>
                                                                <strong>Cast :</strong>
                                                                Robert Romanson,Anne Good
                                                            </li>
                                                            <li>
                                                                <strong>Genre :</strong>
                                                                <span>
                                                   <a href="action.html">
                                                      Action, </a>
                                                </span>
                                                                <span>
                                                   <a href="adventure.html">
                                                      Adventure, </a>
                                                </span>
                                                                <span>
                                                   <a href="biography.html">
                                                      Biography </a>
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
                                                      King, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      Premieres, </a>
                                                </span>
                                                                <span>
                                                   <a href="#">
                                                      viking </a>
                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <div class="gen-btn-container">
                                                        <a href="single-movie.html" class="gen-button gen-button-dark">
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