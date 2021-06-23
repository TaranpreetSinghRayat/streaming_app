<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 23-06-2021
 * Time: 17:17
 */

include "./config/config.php";

?>
<!-- Header Section -->
<?php
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Recover Password | '. APP_NAME
]);

?>
<!-- //Header Section -->

<!-- Body Section -->
<?php
echo $TPL->render('auth/recover',[]);
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[]);
?>
<!-- //Footer Section -->
<script>
    $('#pms_recover_password_form').submit(function(e){
        e.preventDefault();
        console.log('password recovery form');
    });
</script>


