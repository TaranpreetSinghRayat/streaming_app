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
$type = '';
if(isset($_GET['view'])){
        if($_GET['view'] == 'movies'){
            $type = 'Movies';
        }elseif ($_GET['view'] == 'shows'){
            $type = 'Shows';
        }else{
            $type = '';
        }
    }
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Entities | '. $type  . ' | ' . APP_NAME
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
if(isset($_GET['view'])){
    if($_GET['view'] == 'movies'){

        $ENTITIES = new \App\Entities();
        $GENRE = new \App\Genre();
        $CASTS = new \App\Casts();
        $TAGS = new \App\Tags();
        $movies = $ENTITIES->get_movies();

        echo $TPL->render('entities/movies',[
            'title' => 'Movies',
            'ENTITIES' => $ENTITIES,
            'GENRE' => $GENRE,
            'CASTS' => $CASTS,
            'TAGS' => $TAGS,
            'movies' => $movies
        ]);
    }elseif ($_GET['view'] == 'shows'){
        echo $TPL->render('entities/shows',[
            'title' => 'Shows'
        ]);
    }else{
        //render error.
        echo $TPL->render('errors/404',[]);
    }
}
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



