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
    'page_title' => 'Recover Password | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
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
        var user = $('input[name=pms_username_email]').val();

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'process_password_recovery',user},
            dataType: "html",
            beforeSend: function () {
                $("#gen-loading").css('display', 'flex');
            },
            success: function (resp) {
                var parsed_data = JSON.parse(resp);

                if(parsed_data.status == 1){
                    Toast.create('Password Recovery', parsed_data.msg, TOAST_STATUS.SUCCESS, 5000 );
                }else{
                    Toast.create("Password Recovery",parsed_data.msg, TOAST_STATUS.WARNING, 5000);
                }
            },
            error: function (err) {
                console.log(err);
                Toast.create("Something went wrong", "Server unable to process the request.", TOAST_STATUS.DANGER, 5000);
            },
            complete: function () {
                $("#gen-loading").css('display', 'none');
                $("#pms_recover_password_form")[0].reset();
                $("#user_email_txt").html('');
            }
        });
    });

    //check if username or email exists on record on the goo
    $('#pms_recover_password_form input[name=pms_username_email]').keyup(function () {
        var user = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action:'check_username_email_exists',user},
            dataType: "html",
            beforeSend: function () {
                //$("#user_email_txt").html('<p style="color: #1f80e0">Looking up in records</p>');
                $("#pms_recover_password_form input[name=submit]").prop('disabled',true);
            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    $("#pms_recover_password_form input[name=submit]").prop('disabled',false);
                    //$("#user_email_txt").html('<p style="color: green">User found</p>');
                }
            },
            error: function (err) {
                console.log(err);
                Toast.create("Something went wrong", "Server unable to process the request.", TOAST_STATUS.DANGER, 5000);
            }
        });
    })
</script>


