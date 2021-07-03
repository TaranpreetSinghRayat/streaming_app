<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 30-06-2021
 * Time: 12:08
 */

?>

<!-- Single-tv-Shows -->
<section class="position-relative gen-section-padding-3">
    <div class="tv-single-background">
        <img src="<?= $title_data['background'] ?>" alt="stream-lab-image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gen-tv-show-wrapper style-1">
                    <div class="gen-tv-show-top">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="gentech-tv-show-img-holder">
                                    <img src="<?= $title_data['thumbnail'] ?>" alt="stream-lab-image">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="gen-single-tv-show-info">
                                    <h2 class="gen-title"><?= $title_data['name'] ?></h2>
                                    <div class="gen-single-meta-holder">
                                        <ul>
                                            <li><?= $ENTITIES->get_total_seasons($title_data['id']); ?> Seasons</li>
                                            <li><?= $ENTITIES->get_total_episodes($title_data['id']) ?> Episodes</li>
                                            <li>
                                                <?php
                                                $genres = json_decode($title_data['genre'],true);
                                                $max_limit = count($genres);
                                                $counter = 1;
                                                foreach ($genres as $genre){
                                                    $gen = $GENRE->get_name_by_id($genre);
                                                    ?>
                                                    <a href="<?= BASE_URL ?>entitie.php?genre=<?= $genre ?>">
                                                        <span><?= $gen ?></span>
                                                    </a>

                                                    <?php
                                                    if($counter < $max_limit){
                                                        echo ', ';
                                                    }
                                                    $counter++;
                                                }
                                                ?>

                                            </li>
                                            <li>
                                                <i class="fas fa-eye">
                                                </i>
                                                <span><?= $ENTITIES->get_total_views($title_data['id']) ?> Views</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <p><?= $title_data['summary'] ?></p>
                                    <div class="gen-socail-share mt-0">
                                        <h4 class="align-self-center">Social Share :</h4>
                                        <ul class="social-inner">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gen-season-holder">
                        <ul class="nav">
                            <?php foreach ($ENTITIES->get_show_seasons($title_data['id']) as $k => $ses): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($k == 0): ?> active show <?php endif;?>" data-toggle="tab" href="#season_<?= $k ?>">Season <?= $ses['total_session'] ?></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="tab-content">
                            <?php foreach ($ENTITIES->get_show_seasons($title_data['id']) as $k => $ses): ?>
                            <div id="season_<?= $k ?>" class="tab-pane <?php if($k == 0): ?> active show <?php endif;?>">
                                <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                     data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1"
                                     data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                                    <?php
                                        foreach ($ENTITIES->get_show_episodes_by_season($ses['total_session']) as $item):
                                    ?>
                                        <div class="item">
                                            <div class="gen-episode-contain">
                                                <div class="gen-episode-img">
                                                    <img src="<?= $item['background'] ?>" alt="stream-lab-image">
                                                    <div class="gen-movie-action">
                                                        <a href="<?= BASE_URL  ?>entitie.php?title=<?= $title_data['id'] ?>&s=<?= $item['season'] ?>&e=<?= $item['episode'] ?>" class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-episode-info">
                                                        <h3>
                                                            S<?= $item['season'] ?>E<?= $item['episode'] ?> <span>-</span>
                                                            <a href="<?= BASE_URL  ?>entitie.php?title=<?= $title_data['id'] ?>&s=<?= $item['season'] ?>&e=<?= $item['episode'] ?>">
                                                                <?= $item['title'] ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-single-meta-holder">
                                                        <ul>
                                                            <li class="run-time"><?= \App\File::get_duration(APP_ROOT . $item['filePath']) ?></li>
                                                            <li class="release-date">
                                                                <?= date("F jS, Y", strtotime($title_data['releaseDate'])); ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Single-tv-Shows -->