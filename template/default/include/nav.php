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
                                    <li class="menu-item">
                                        <a href="<?= BASE_URL ?>home.php" aria-current="page">Home</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?= BASE_URL ?>entitie.php?view=movies">Movies</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?= BASE_URL ?>entitie.php?view=shows">Tv Shows</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="gen-header-info-box">
                            <div class="gen-menu-search-block">
                                <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                <div class="gen-search-form">
                                    <form role="search" method="get" class="search-form" action="#">
                                        <label>
                                            <span class="screen-reader-text"></span>
                                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                                        </label>
                                        <button type="submit" class="search-submit"><span
                                                class="screen-reader-text"></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="gen-account-holder">
                                <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                <div class="gen-account-menu">
                                    <ul class="gen-account-menu">
                                        <!-- Pms Menu -->
                                        <li>
                                            <a href="register.html"><i class="fa fa-user"></i>
                                                Account </a>
                                        </li>
                                        <!-- Library Menu -->
                                        <li>
                                            <a href="library.html">
                                                <i class="fa fa-indent"></i>
                                                Help Center </a>
                                        </li>
                                        <li>
                                            <a href="<?= BASE_URL ?>home.php?logout"><i class="fa fa-list"></i>
                                                Sign out <?= $app_name ?> </a>
                                        </li>
                                    </ul>
                                </div>
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
