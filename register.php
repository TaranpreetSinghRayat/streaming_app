<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 15:46
 */

include "./config/config.php";

?>
<!-- Header Section -->
<?php
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.theme'));
echo $TPL->render('include/header',[
    'page_description' => 'Please login to watch all your favorite shows and movies.',
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'Register | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);

?>
<!-- //Header Section -->

<!-- Body Section -->
<?php
echo $TPL->render('auth/register',[]);
?>
<!-- //Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[]);
?>
<!-- //Footer Section -->
<!-- Custom scripts -->
<script>
    // Register Form Handler
    $(".register-form").submit((e)=>{
        e.preventDefault();

        var form_data = {
            action:'process_registration',
            username: $('.register-form input[name=user_name]').val(),
            email: $('.register-form input[name=user_email]').val(),
            first_name: $('.register-form input[name=first_name]').val(),
            last_name: $('.register-form input[name=last_name]').val(),
            password : $('.register-form input[name=pass1]').val(),
            confirm_password: $('.register-form input[name=pass2]').val(),
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
                $(".register-form")[0].reset();
            }
        });
    });

    //validate email address on the goo
    $('.register-form input[name=user_email]').keyup(function () {
        var email = $(this).val();
        if(email.includes("@", 0)){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>ajax/ajax-auth.php",
                data: {action:'check_email_exists',email},
                dataType: "html",
                beforeSend: function () {

                },
                success: function (resp) {
                    console.log(resp);
                    var parsed_data = JSON.parse(resp);
                    if(parsed_data.status == 1){
                        $('#user_email_txt').html("<p style='color: green'>"+ parsed_data.msg +"</p>");
                        $('.register-form input[name=pms_register]').prop('disabled',false);
                    }else{
                        $('#user_email_txt').html("<p style='color: red'>"+ parsed_data.msg +"</p>");
                        $('.register-form input[name=pms_register]').prop('disabled',true);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    });

    //validate username on the goo
    $('.register-form input[name=user_name]').keyup(function () {
        var username = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'check_username_exists',username},
            dataType: "html",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    $('#user_name_txt').html("<p style='color: green'>"+ parsed_data.msg +"</p>");
                    $('.register-form input[name=pms_register]').prop('disabled',false);
                }else{
                    $('#user_name_txt').html("<p style='color: red'>"+ parsed_data.msg +"</p>");
                    $('.register-form input[name=pms_register]').prop('disabled',true);
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {
                console.log("Task Complete");
            }
        });
    });
    
    //check password complexity on the goo
    $('.register-form input[name=pass1]').keyup(function () {
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
