<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 13:16
 */

include "./config/config.php";

?>
<!-- Header Section -->
<?php
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Login | '. APP_NAME
]);

?>
<!-- //Header Section -->

<!-- Body Section -->
<?php

?>
<!-- //Body Section -->

<!-- Footer Section -->

<!-- //Footer Section -->

