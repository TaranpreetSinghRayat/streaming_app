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
if(\App\Session::exists('isLoggedIn')){
    header("Location: home.php");
    exit();
}
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
        }elseif ($_GET['p'] == 'recover'){
            //forgot password stuff
        }
}else{
    echo $TPL->render('auth/login',[
            'cookie_user' => $_COOKIE['login_user'] ?? '',
            'cookie_pass' => $_COOKIE['login_pass'] ?? ''
    ]);
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

        var username = $('input[name=log]').val();
        var password = $('input[name=pwd]').val();
        var remember = $('#rememberme').prop("checked");

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'process_login', username, password, remember},
            dataType: "html",
            beforeSend: function () {
                $("#gen-loading").css('display', 'flex');
            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);

                if(parsed_data.status == 1){
                    if(remember){
                        setCookie('login_user', username, 30);
                        setCookie('login_pass', password, 30);
                    }else{
                        setCookie('login_user', '', 1);
                        setCookie('login_pass', '', 1);
                    }
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 2000);
                }else if(parsed_data.status == 2){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.INFO, 5000);
                }else{
                    Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $("#gen-loading").css('display', 'none');
            }
        });

    })
</script>
<!-- //Custom Script -->

