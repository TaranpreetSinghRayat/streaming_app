<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 14-07-2021
 * Time: 12:12
 */

?>
<div class="error-screen2">
    <img src="<?= ADMIN_BASE_URL_ASSETS ?>img/error-screen/globe.svg" class="earth" alt="Earth" />
    <img src="<?= ADMIN_BASE_URL_ASSETS ?>img/error-screen/full-moon.png" class="moon" alt="Moon" />
    <img src="<?= ADMIN_BASE_URL_ASSETS ?>img/error-screen/rocket.svg" class="rocket" alt="Rocket" />
    <div class="contents">
        <h1>404</h1>
        <h5>We're sorry but it looks <br>like that page doesn't exist anymore.</h5>
        <a href="<?= BASE_URL_ADMIN ?>" class="btn stripes-btn">Back to Home</a>
    </div>
    <div class="astronaut-container">
        <img class="astronaut" src="<?= ADMIN_BASE_URL_ASSETS ?>img/error-screen/astronaut.png" alt="<?= APP_NAME ?>">
    </div>
</div>
