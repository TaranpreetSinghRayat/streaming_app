<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 29-06-2021
 * Time: 13:35
 */

include "./config/config.php";

?>

<!-- Header Section -->
<?php
if(!\App\Session::exists('isLoggedIn')){
    header("Location: login.php");
    exit();
}
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Entities | '. APP_NAME
]);

?>
<!-- //Header Section -->
<!-- Navigation Section -->
<?php
echo $TPL->render('include/nav',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
]);
?>
<!-- //Navigation Section -->

<!-- Body Section -->
<?php

?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[
    'app_description' => \App\Settings::get_value('app.description'),
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->
<script>
</script>
<!-- //Custom Scripts -->



