<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 10-07-2021
 * Time: 12:16
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
                            Search : <?= $title ?>
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
<!-- Page Data -->
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php if(!empty($titles)): ?>
                        <?php foreach ($titles as $title): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <img src="<?= $title['background'] ?>" alt="<?= $title['name'] ?>">
                                    <div class="gen-movie-add">

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

                                    </div>
                                    <div class="gen-movie-action">
                                        <a href="<?= BASE_URL ?>entitie.php?title=<?= $title['id'] ?>" class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a href="<?= BASE_URL ?>entitie.php?title=<?= $title['id'] ?>"><?= $title['name'] ?></a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                        <ul>
                                            <li><?= $title['guidelines'] ?></li>
                                            <li>
                                                <?php
                                                $genres = json_decode($title['genre'],true);
                                                $max_limit = count($genres);
                                                $counter = 1;
                                                foreach ($genres as $genre){
                                                    $gen = $GENRE->get_name_by_id($genre);
                                                    ?>
                                                    <a href="<?= BASE_URL ?>entitie.php?genre=<?= $genre ?>">
                                                        <?= $gen; ?>
                                                    </a>

                                                    <?php
                                                    if($counter < $max_limit){
                                                        echo ', ';
                                                    }
                                                    $counter++;
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
                        <h3>No title(s) found.</h3>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Page Data -->