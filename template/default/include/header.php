<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="<?= $page_description ?? '' ?>" />
    <meta name="author" content="<?= $app_auth ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $page_title ?? APP_NAME ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL_ASSETS ?>images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>css/responsive.css" />
    <!-- Boostrap Toaster -->
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>css/bootstrap-toaster.min.css" />

    <!-- Video Player Stuff -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css">
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>video_player/jump-forward/jump-forward.css">
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>video_player/skip-back/skip-back.css">
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>video_player/speed/speed.css">
    <!-- //Video Player Stuff -->
</head>

<body>

<!--=========== Loader =============-->
<div id="gen-loading">
    <div id="gen-loading-center">
        <img src="<?= $app_logo ?>" alt="loading">
    </div>
</div>
<!--=========== Loader =============-->