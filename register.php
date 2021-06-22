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
    'page_title' => 'Login | '. APP_NAME
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
                        $('.register-form input[name=user_email]').attr('disabled','disabled');
                    }else{
                        console.log('fail')
                    }
                },
                error: function (err) {
                    console.log(err);
                },
                complete: function () {
                    console.log("Task Complete");
                }
            });
        }
    })
</script>
