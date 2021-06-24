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
        'page_description' => 'Please login to watch all your favorite shows and movies.',
        'app_auth' => $_ENV['DEV'],
        'page_title' => 'Login | '. APP_NAME
]);

?>
<!-- //Header Section -->

<!-- Body Section -->
<?php
if(isset($_GET['p'])){
        if($_GET['p'] == 'activate'){
            if(isset($_GET['k'])){
                    $user = new \App\Users();
                    if($user->find_by_key($_GET['k'])){
                        if($user->activate($_GET['k'])){
                            echo $TPL->render('auth/key',[
                                    'msg' => \App\MSG::AUTH['ACC_ACTV'],
                                    'btn_text' => 'Login'
                            ]);
                        }
                    }else{
                        echo $TPL->render('auth/key',[
                                'msg' => \App\MSG::AUTH['ERR_ACC_ACTV'],
                                'btn_text' => 'Go Back'
                        ]);
                    }
                }else{
                    echo $TPL->render('auth/key',[
                            'msg' => \App\MSG::AUTH['INV_KEY'],
                            'btn_text' => 'Go Back'
                    ]);
                }
        }
}else{
    echo $TPL->render('auth/login',[]);
}
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[]);
?>
<!-- //Footer Section -->
<!-- Custom Script -->
<script>
    $("#pms_login").submit((e) => {
        e.preventDefault();
        console.log('login requested.');
    })
</script>
<!-- //Custom Script -->

