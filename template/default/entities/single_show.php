<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 03-07-2021
 * Time: 15:01
 */
?>

<!-- Single movie Start -->
<section class="gen-section-padding-3 gen-single-movie">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="gen-single-movie-wrapper style-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gen-video-holder">

                                <?php if($title_data['subscribed'] == 1): ?>
                                    <?php if(\App\Session::get('isSubscribed') == true): ?>
                                        <video id="player1" width="100%" height="550px" controls preload="none" poster="<?= BASE_URL . $title_data['thumbnail'] ?>">
                                            <source src="<?= $title_data['filePath'] ?>" <?php if(strpos($title_data['filePath'],'youtu') !== false): ?> <?php else: ?> type="<?= mime_content_type(APP_ROOT . $title_data['filePath']) ?>" <?php endif; ?>>
                                        </video>
                                    <?php else: ?>
                                        <video id="player1" width="100%" height="550px" controls preload="none" poster="<?= BASE_URL . $title_data['thumbnail'] ?>">
                                            <source src="<?= $title_data['trailer'] ?>" <?php if(strpos($title_data['trailer'],'youtu') !== false): ?> <?php else: ?> type="<?= mime_content_type(APP_ROOT . $title_data['trailer']) ?>" <?php endif; ?>>
                                        </video>
                                    <?php endif; ?>
                                <?php elseif($title_data['subscribed'] == 0): ?>
                                    <video id="player1" width="100%" height="550px" controls preload="none" poster="<?= BASE_URL . $title_data['thumbnail'] ?>">
                                        <source src="<?= $title_data['filePath'] ?>" <?php if(strpos($title_data['filePath'],'youtu') !== false): ?> <?php else: ?> type="<?= mime_content_type(APP_ROOT . $title_data['filePath']) ?>" <?php endif; ?>>
                                    </video>
                                <?php endif; ?>
                            </div>
                            <div class="gen-single-movie-info">
                                <?php if($title_data['subscribed'] == 1): ?>
                                    <?php if(\App\Session::get('isSubscribed') == false): ?>
                                        <br />
                                        <div class="alert  alert-danger alert-dismissible">
                                            <strong>Please <a href="#">Subscribe</a> to watch <?= $title_data['name'] ?> & many more titles in premium quality.</strong>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h2 class="gen-title"><?= $title_data['name'] ?> - <?= $title_data['title'] ?> - S<?= $title_data['season'] ?>E<?= $title_data['episode'] ?></h2>
                                <div class="gen-single-meta-holder">
                                    <ul>
                                        <li class="gen-sen-rating"><?= strtoupper($title_data['guidelines']) ?></li>
                                        <li>
                                            <i class="fas fa-eye">
                                            </i>
                                            <span><?= $title_data['views'] ?> Views</span>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    <?= $title_data['summary'] ?>
                                </p>
                                <div class="gen-after-excerpt">
                                    <div class="gen-extra-data">
                                        <ul>
                                            <li>
                                                <span>Language :</span>
                                                <span><?= $title_data['language'] ?></span>
                                            </li>
                                            <!--li>
                                                <span>Subtitles :</span>
                                                <span>English</span>
                                            </li-->
                                            <li>
                                                <span>Audio Languages :</span>
                                                <span><?= $title_data['audio_languages'] ?></span>
                                            </li>
                                            <li><span>Genre :</span>
                                                <?php
                                                $genres = json_decode($title_data['genre'],true);
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
                                                </span>
                                            </li>
                                            <?php if(strpos($title_data['filePath'],'youtu') !== false): ?>
                                            <?php else: ?>
                                                <li><span>Run Time :</span>
                                                    <span><?= \App\File::get_duration(APP_ROOT. $title_data['filePath']); ?></span>
                                                </li>
                                                <li>
                                                    <span>Audio Channels :</span>
                                                    <span><?= \App\File::get_audio_channels(APP_ROOT . $title_data['filePath']) ?></span>
                                                </li>
                                                <li>
                                                    <span>Resolution :</span>
                                                    <span><?= \App\File::get_video_resolution(APP_ROOT . $title_data['filePath']) ?></span>
                                                </li>
                                                <li>
                                                    <span>Framerate :</span>
                                                    <span><?= \App\File::get_video_framerate(APP_ROOT . $title_data['filePath']) ?></span>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <span>Release Date :</span>
                                                <span><?= date("F jS, Y", strtotime($title_data['releaseDate'])); ?></span>
                                            </li>
                                            <li>
                                                <span>Added Date :</span>
                                                <span><?= date("F jS, Y", strtotime($title_data['uploadDate'])); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gen-socail-share">
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
                        <div class="gen-season-holder">
                            <ul class="nav">

                                <?php foreach ($ENTITIES->get_show_seasons($title_data['entityId']) as $k => $ses): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($k == ($_GET['s']-1)): ?> active show <?php endif;?>" data-toggle="tab" href="#season_<?= $k ?>">Season <?= $ses['total_session'] ?></a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                            <div class="tab-content">
                                <?php foreach ($ENTITIES->get_show_seasons($title_data['entityId']) as $k => $ses): ?>
                                    <div id="season_<?= $k ?>" class="tab-pane <?php if($k == ($_GET['s']-1)): ?> active show <?php endif;?>">
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
                                                                <a href="<?= BASE_URL  ?>entitie.php?title=<?= $title_data['entityId'] ?>&s=<?= $item['season'] ?>&e=<?= $item['episode'] ?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-episode-info">
                                                                <h3>
                                                                    S<?= $item['season'] ?>E<?= $item['episode'] ?> <span>-</span>
                                                                    <a href="<?= BASE_URL  ?>entitie.php?title=<?= $title_data['entityId'] ?>&s=<?= $item['season'] ?>&e=<?= $item['episode'] ?>">
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
    </div>
</section>
<!-- Single movie End -->