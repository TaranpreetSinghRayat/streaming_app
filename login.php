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
        'page_title' => 'Login | '. APP_NAME,
        'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
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
                            'title' => 'Account Activation',
                            'btn_text' => 'Go Back'
                    ]);
                }
        }elseif ($_GET['p'] == 'recover'){
            //forgot password stuff
            if(isset($_GET['k'])){
                $user = new \App\Users();
                $user_data = $user->find_by_key($_GET['k']);
                if(!empty($user_data)){
                    echo $TPL->render('auth/new_password', [
                        'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo'),
                        'title' => 'Create New Password',
                        'user_id' => $user_data['id']
                    ]);
                }else{
                    echo $TPL->render('auth/key',[
                        'msg' => \App\MSG::AUTH['INV_KEY'],
                        'title' => 'Password Recovery',
                        'btn_text' => 'Go Back'
                    ]);
                }
            }else{
                echo $TPL->render('auth/key',[
                    'msg' => \App\MSG::AUTH['INV_KEY'],
                    'title' => 'Password Recovery',
                    'btn_text' => 'Go Back'
                ]);
            }
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

    $(".pass-reset-form").submit((e) => {
        e.preventDefault();

        var form_data = {
            action:'process_resetPassword',
            password : $('.pass-reset-form input[name=pass1]').val(),
            confirm_password: $('.pass-reset-form input[name=pass2]').val(),
            user : $('.pass-reset-form input[name=user_id]').val()
        }

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: form_data,
            dataType: "html",
            beforeSend: function () {
                $("#gen-loading").css('display', 'flex');
            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);

                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
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
                $(".pass-reset-form")[0].reset();
            }
        });
    });

    //check password complexity on the goo
    $('.pass-reset-form input[name=pass1]').keyup(function () {
        var password = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'check_password_strength', password},
            dataType: "html",
            success: function (resp) {
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    $('#user_pass_txt').html("<p style='color: green'>"+ parsed_data.msg +"</p>");
                    $('.register-form input[name=pms_register]').prop('disabled',false);
                }else{
                    $('#user_pass_txt').html("<p style='color: red'>"+ parsed_data.msg +"</p>");
                    $('.register-form input[name=pms_register]').prop('disabled',true);
                }
            },
            error: function (err) {
                console.log(err)
            },
        });
    })
</script>
<!-- //Custom Script -->

