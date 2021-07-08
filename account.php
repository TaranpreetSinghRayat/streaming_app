<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 03-07-2021
 * Time: 15:15
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
    'page_title' => 'Home | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
$PAGES = new \App\Pages();
?>
<!-- // Header Section -->
<!-- Navigation Section -->
<?php
echo $TPL->render('include/nav',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
    'nav_links' => $PAGES->get_pages(($PAGES->get_page_header('navi'))['id'])
]);
?>
<!-- //Navigation Section -->
<!-- Body Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();
$USERS = new \App\Users();

echo $TPL->render('auth/account',[
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'title' => $USERS->find(\App\Session::get('UID'))['username'] . ' Account',
    'user_data' => $USERS->find(\App\Session::get('UID'))

]);
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php

echo $TPL->render('include/footer',[
    'app_description' => \App\Settings::get_value('app.description'),
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
    'gen_list' => $GENRE->list(),
    'company_pages' => $PAGES->get_pages(($PAGES->get_page_header('company'))['id'])
]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->
<script>
    $("#update_account").submit((e) => {
        e.preventDefault();

        var data = {
            action: 'update_account',
            email: $().val(),
        }
    });
</script>
<!-- //Custom Script -->