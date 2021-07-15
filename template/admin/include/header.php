<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 13:33
 */
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="<?= APP_NAME ?>">
    <meta name="author" content="<?= $app_auth ?? $_ENV['DEV'] ?>">
    <link rel="shortcut icon" href="<?= ADMIN_BASE_URL_ASSETS ?>img/fav.png">

    <!-- Title -->
    <title><?= $page_title ?? APP_NAME ?></title>


    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>css/bootstrap.min.css">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>fonts/style.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>css/main.css">
    <!-- Boostrap Toaster -->
    <link rel="stylesheet" href="<?= BASE_URL_ASSETS ?>css/bootstrap-toaster.min.css" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/dataTables.bs4-custom.css" />
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/buttons.bs.css" />

    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

    <!-- Mega Menu -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/megamenu/css/megamenu.css">

    <!-- Search Filter JS -->
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/search-filter/search-filter.css">
    <link rel="stylesheet" href="<?= ADMIN_BASE_URL_ASSETS ?>vendor/search-filter/custom-search-filter.css">

</head>
<body>

<!-- Loading wrapper start -->
<div id="loading-wrapper">
    <div class="spinner-border"></div>
    Loading...
</div>
<!-- Loading wrapper end -->

<!-- Page wrapper start -->
<div class="page-wrapper">

