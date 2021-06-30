<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 29-06-2021
 * Time: 14:33
 */

?>
<!-- breadcrumb -->
<div class="gen-breadcrumb" style="background-image: url('<?= BASE_URL_ASSETS ?>images/background/asset-25.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>home.php"><i
                                        class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- Shows -->
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php if(!empty($shows)): ?>
                    <?php foreach ($shows as $show): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="<?= BASE_URL . $show['background'] ?>" alt="video-image">
                                        <div class="gen-movie-add">
                                            <div class="wpulike wpulike-heart">
                                                <div class="wp_ulike_general_class">
                                                    <a href="#" class="sl-button text-white"><i
                                                                class="far fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <ul class="menu bottomRight">
                                                <li class="share top">
                                                    <i class="fa fa-share-alt"></i>
                                                    <ul class="submenu">
                                                        <li><a href="#" class="facebook"><i
                                                                        class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li><a href="#" class="facebook"><i
                                                                        class="fab fa-instagram"></i></a>
                                                        </li>
                                                        <li><a href="#" class="facebook"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="video-actions--link_add-to-playlist dropdown">

                                            </div>
                                        </div>
                                        <div class="gen-movie-action">
                                            <a href="" class="gen-button">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a href=""><?= $show['name'] ?></a></h3>
                                        </div>
                                        <div class="gen-movie-meta-holder">
                                            <ul>
                                                <li> <i class="fab fa-imdb fa-2x"></i> <b><?= $show['IMDB'] ?></b></li>
                                                <li>
                                                    <?php
                                                    $genres = json_decode($show['genre'],true);
                                                    $max_limit = count($genres);
                                                    foreach ($genres as $genre){
                                                        $gen = $GENRE->get_name_by_id($genre);
                                                        ?>
                                                        <a href="<?= BASE_URL ?>entitie.php?genre=<?= $genre ?>">
                                                            <span><?= $gen; ?></span>
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <h4>No shows available.</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shows -->

