<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 25-06-2021
 * Time: 12:01
 */
?>
<header id="gen-header" class="gen-header-style-1 gen-has-sticky">
    <div class="gen-bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= BASE_URL ?>home.php">
                            <img class="img-fluid logo" src="<?= $app_logo ?>" alt="streamlab-image">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div id="gen-menu-contain" class="gen-menu-contain">
                                <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                    <?php if(!empty($nav_links)): ?>
                                        <?php foreach ($nav_links as $nav): ?>
                                            <?php if($nav['isLoggedIn'] == 0): ?>
                                                <li class="menu-item">
                                                    <a href="<?= BASE_URL ?>page.php?view=<?= $nav['slug'] ?>" aria-current="page"><?= $nav['title'] ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="gen-header-info-box">
                            <div class="gen-menu-search-block">

                            </div>

                            <div class="gen-btn-container">
                                <a href="register.html" class="gen-button">
                                    <div class="gen-button-block">
                                        <span class="gen-button-line-left"></span>
                                        <span class="gen-button-text">Subscribe</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
