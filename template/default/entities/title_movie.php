<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 30-06-2021
 * Time: 12:03
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

                                <video id="player1" width="100%" height="550px" controls preload="none" poster="<?= BASE_URL . $title_data['thumbnail'] ?>">
                                    <source src="<?= $title_data['filePath'] ?>" <?php if(strpos($title_data['filePath'],'youtu') !== false): ?> <?php else: ?> type="<?= mime_content_type(APP_ROOT . $title_data['filePath']) ?>" <?php endif; ?>>
                                </video>
                            </div>
                            <div class="gen-single-movie-info">
                                <h2 class="gen-title"><?= $title_data['name'] ?></h2>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single movie End -->