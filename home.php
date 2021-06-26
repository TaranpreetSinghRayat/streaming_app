<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 24-06-2021
 * Time: 19:34
 */

include "./config/config.php";

?>
<!-- Header Section -->
<?php
if(!\App\Session::exists('isLoggedIn')){
    header('Location: login.php');
}

if(isset($_GET['logout'])){
    $user = new \App\Users();
    if($user->logout()){
        header("Refresh:0");
    }
}

$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Home | '. APP_NAME
]);

?>
<!-- // Header Section -->
<!-- Navigation Section -->
<?php
echo $TPL->render('include/nav',[
        'app_name' => \App\Settings::get_value('app.name')
]);
?>
<!-- //Navigation Section -->

<!-- Body Section -->
<?php
$ENTITIES = new \App\Entities();
$data['most_view'] = $ENTITIES->get_most_viewed();
$data['high_raiting'] = $ENTITIES->get_high_raited();
echo $TPL->render('home/index',[
        'data' => $data
]);
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->

<!-- //Custom Script -->