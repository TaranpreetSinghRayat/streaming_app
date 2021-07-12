<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 15:58
 */

include 'config.php';
?>
<?php
if(\App\Session::exists('isLoggedIn') || \App\Session::get('role') == 'Administrator'){
    header('Location: index.php');
}
?>
<!-- Body Section -->
<?php
$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.admin.theme'));
echo $TPL->render('auth/login',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'app_author' => $_ENV['DEV'],
    'page_title' => 'Login'
]);

?>
<!-- //Body Section -->

<!-- Custom Script -->
<script>

$('#admin-login').submit((e) => {
    e.preventDefault();

    var username = $('input[name=log]').val();
    var password = $('input[name=pwd]').val();

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-auth.php",
        data: {action:'process_login', username, password},
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);

            if(parsed_data.status == 1){

                $("#login_result").html("<div class='alert alert-success'>" +
                    parsed_data.msg +
                    "</div>");
                setTimeout(() => {
                    window.location.reload(true);
                }, 2000);
            }else if(parsed_data.status == 2){
                $("#login_result").html("<div class='alert alert-success'>" +
                    parsed_data.msg +
                    "</div>");
            }else{
                $("#login_result").html("<div class='alert alert-danger'>" +
                    parsed_data.msg +
                    "</div>");
            }
        },
        error: function (err) {
            console.log(err)
        },
        complete: function () {

        }
    });

});
</script>
<!-- //Custom Script -->



