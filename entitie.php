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
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();

$type = '';
$title_data = null;
if(isset($_GET['view']) || isset($_GET['genre']) || isset($_GET['title'])){
        if(isset($_GET['view']) && $_GET['view'] == 'movies'){
            $type = 'Movies';
        }elseif (isset($_GET['view']) && $_GET['view'] == 'shows'){
            $type = 'Shows';
        }elseif (isset($_GET['title']) && is_numeric($_GET['title'])){
                $update_views = $ENTITIES->update_views($_GET['title']);
                $title_data = $ENTITIES->get($_GET['title']);
                $page_description = $title_data['summary'];
                $type = $title_data['name'];
        }elseif (isset($_GET['genre']) && is_numeric($_GET['genre'])){
            $type = $GENRE->get_name_by_id($_GET['genre']);
        }
    }
echo $TPL->render('include/header',[
    'page_description' => $page_description ?? \App\Settings::get_value('app.description'),
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Entities | '. $type  . ' | ' . APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
$PAGES = new \App\Pages();
?>
<!-- //Header Section -->
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
if(isset($_GET['view']) || isset($_GET['genre']) || isset($_GET['title'])){
    if(isset($_GET['view']) && $_GET['view'] == 'movies'){
        if(isset($_GET['s'])){
            $search = \App\Security::clean($_GET['s']);
            echo $TPL->render('search/index',[
                'titles' => $ENTITIES->search_movies($search),
                'title' => $search,
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS
            ]);
        }else{
            $movies = $ENTITIES->get_movies();

            echo $TPL->render('entities/movies',[
                'title' => 'Movies',
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS,
                'movies' => $movies
            ]);
        }
    }elseif (isset($_GET['view']) && $_GET['view'] == 'shows'){
        if(isset($_GET['s'])){
            $search = \App\Security::clean($_GET['s']);
            echo $TPL->render('search/index',[
                'titles' => $ENTITIES->search_shows($search),
                'title' => $search,
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS
            ]);
        }else{
            $shows = $ENTITIES->get_shows();

            echo $TPL->render('entities/shows',[
                'title' => 'Shows',
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS,
                'shows' => $shows
            ]);
        }
    }elseif (isset($_GET['genre']) && is_numeric($_GET['genre'])){
        $gen_entities = $ENTITIES->get_by_genre($_GET['genre']);
        echo $TPL->render('entities/genre',[
            'title' => 'Genre '. $GENRE->get_name_by_id($_GET['genre']),
            'ENTITIES' => $ENTITIES,
            'GENRE' => $GENRE,
            'CASTS' => $CASTS,
            'TAGS' => $TAGS,
            'gen_entities' => $gen_entities
        ]);
    }elseif (isset($_GET['title']) && is_numeric($_GET['title'])){
        $title_data ?? ($title_data = $ENTITIES->get($_GET['title']));
        if($title_data['isMovie'] == 1){
            echo $TPL->render('entities/title_movie',[
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS,
                'title_data' => $title_data
            ]);
        }elseif (isset($_GET['title']) && isset($_GET['s']) && is_numeric($_GET['s']) && isset($_GET['e']) && is_numeric($_GET['e'])){
            $title_data = $ENTITIES->get_show($_GET['title'],$_GET['s'],$_GET['e']);
            echo $TPL->render('entities/single_show',[
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS,
                'title_data' => $title_data
            ]);
        }else{
            echo $TPL->render('entities/title_show',[
                'ENTITIES' => $ENTITIES,
                'GENRE' => $GENRE,
                'CASTS' => $CASTS,
                'TAGS' => $TAGS,
                'title_data' => $title_data
            ]);
        }
    } else{
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
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
    'gen_list' => $GENRE->list(),
    'company_pages' => $PAGES->get_pages(($PAGES->get_page_header('company'))['id'])
]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->
<script>
</script>
<!-- //Custom Scripts -->



