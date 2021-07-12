<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 15:59
 */
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="<?= $app_description ?? APP_NAME ?>">
    <meta name="author" content="<?= $app_author ?>">
    <link rel="shortcut icon" href="<?= ADMIN_BASE_URL_ASSETS ?>img/fav.png" />

    <!-- Title -->
    <title><?= $page_title ?></title>


    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>css/bootstrap.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>css/main.css">


    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

</head>
<body class="authentication">

<!-- Loading wrapper start -->
<div id="loading-wrapper">
    <div class="spinner-border"></div>
    Loading...
</div>
<!-- Loading wrapper end -->

<!-- *************
    ************ Login container start *************
************* -->
<div class="login-container">

    <div class="container-fluid h-100">

        <!-- Row start -->
        <div class="row g-0 h-100">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="login-about">
                    <div class="slogan">
                        <span>Streaming</span>
                        <span>Made</span>
                        <span>Simple.</span>
                    </div>
                    <div class="about-desc">
                        <p><?= \App\Settings::get_value('app.description'); ?></p>
                    </div>
                    <a href="#" class="know-more">Know More <img src="<?= ADMIN_BASE_URL_ASSETS ?>img/right-arrow.svg" alt="<?= $app_name ?>"></a>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="login-wrapper">
                    <form action="" id="admin-login">
                        <div class="login-screen">
                            <div class="login-body">
                                <a href="#" class="login-logo">
                                    <img src="<?= ADMIN_BASE_URL_ASSETS ?>img/logo-1.png" alt="<?= $app_name ?>">
                                </a>
                                <h6>Welcome back,<br>Please login to your account.</h6>
                                <div id="login_result"></div>
                                <div class="field-wrapper">
                                    <input type="email" name="log" required autofocus>
                                    <div class="field-placeholder">Email ID</div>
                                </div>
                                <div class="field-wrapper mb-3">
                                    <input type="password" required name="pwd">
                                    <div class="field-placeholder">Password</div>
                                </div>
                                <div class="actions">
                                    <a href="#">Forgot password?</a>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                            <div class="login-footer">
                                <!--span class="additional-link">No Account? <a href="signup.html" class="btn btn-light">Sign Up</a></span-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Row end -->


    </div>
</div>
<!-- *************
    ************ Login container end *************
************* -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/jquery.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/modernizr.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/moment.js"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->

<!-- Main Js Required -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/main.js"></script>

</body>

</html>