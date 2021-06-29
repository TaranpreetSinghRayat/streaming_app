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
                                                                         <?php
                                                                         $genres = json_decode($f_entity['genre'],true);
                                                                         $max_limit = count($genres);
                                                                         $counter = 1;
                                                                         foreach ($genres as $genre){
                                                                             $gen = $GENRE->get_name_by_id($genre);
                                                                             ?>
                                                                             <a href="<?= BASE_URL ?>entitie.php?genre=<?= $genre ?>">
                                                                                <span><?= $gen; ?></span>
                                                                            </a>

                                                                         <?php
                                                                             if($counter < $max_limit){
                                                                                 echo ', ';
                                                                             }
                                                                             $counter++;
                                                                            }
                                                                         ?>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <strong>Tag :</strong>
                                                                    <span>
                                                                        <?php
                                                                        $tags = json_decode($f_entity['tags'],true);
                                                                        $max_limit = count($tags);
                                                                        $counter = 1;
                                                                        foreach ($tags as $tag){
                                                                            $tag = $TAGS->get_name_by_id($tag);
                                                                            ?>
                                                                            <a href="#">
                                                                                <span><?= $tag; ?></span>
                                                                            </a>

                                                                            <?php
                                                                            if($counter < $max_limit){
                                                                                echo ', ';
                                                                            }
                                                                            $counter++;
                                                                        }
                                                                        ?>
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
        <!-- owl-carousel Videos Section-3 Start -->
        <section class="gen-section-padding-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <h4 class="gen-heading-title"><?= $GENRE->get_name_by_id($g_entity['id']) ?></h4>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                        <div class="gen-movie-action">
                            <div class="gen-btn-container text-right">
                                <a href="<?= BASE_URL ?>entitie.php?genre=<?= $g_entity['id'] ?>" class="gen-button gen-button-flat">
                                    <span class="text">More Videos</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="gen-style-2">
                            <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                                 data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                                 data-loop="false" data-margin="30">

                                <?php foreach ($ENTITIES->get_by_genre($g_entity['id']) as $item): ?>
                                    <div class="item">
                                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="<?= BASE_URL_ASSETS ?>images/background/asset-1.jpg" alt="owl-carousel-video-images">
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                                            type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                                            </div>
                                                            <ul class="menu bottomRight">
                                                                <li class="share top">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    <ul class="submenu">
                                                                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                                        </li>
                                                                        <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                                        </li>
                                                                        <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <div class="movie-actions--link_add-to-playlist dropdown">
                                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                                            class="fa fa-plus"></i></a>
                                                                <div class="dropdown-menu mCustomScrollbar">
                                                                    <div class="mCustomScrollBox">
                                                                        <div class="mCSB_container">
                                                                            <a class="login-link" href="register.html">Sign in to add this movie
                                                                                to a
                                                                                playlist.</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gen-movie-action">
                                                            <a href="single-movie.html" class="gen-button">
                                                                <i class="fa fa-play"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a href="single-movie.html">King of Skull</a></h3>
                                                        </div>
                                                        <div class="gen-movie-meta-holder">
                                                            <ul>
                                                                <li> <i class="fab fa-imdb fa-2x"></i> <b><?= $item['IMDB'] ?></b> </li>
                                                                <li>
                                                                    <a href="<?= BASE_URL ?>entitie.php?genre=<?= $g_entity['id'] ?>"><span><?= $GENRE->get_name_by_id($g_entity['id']) ?></span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #post-## -->
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- owl-carousel Videos Section-3 End -->
    <?php endforeach; ?>
<?php endif; ?>
