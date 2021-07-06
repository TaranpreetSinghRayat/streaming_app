<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 05-07-2021
 * Time: 13:02
 */

include "./config/config.php";

?>

<!-- Header Section -->
<?php

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
$GENRE = new \App\Genre();


echo $TPL->render('contact/index',[
    'title' => 'Contact',
    'contact_location' => \App\Settings::get_value('contact.location'),
    'contact_phone' => \App\Settings::get_value('contact.phone'),
    'contact_mail' => \App\Settings::get_value('contact.email'),
    'contact_map' => \App\Settings::get_value('contact.map')
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
    $("#contact-form").submit((e) => {
        e.preventDefault();

        var name = $('input[name=first_name]').val();
        var email = $('input[name=your-email]').val();
        var phone = $('input[name=your-Cell-phone]').val();
        var message = $('textarea[name=your-message]').val()

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-contact.php",
            data: {action:'', name, email, phone, message},
            dataType: "html",
            beforeSend: function () {
                $("#gen-loading").css('display', 'flex');
            },
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);

                if(parsed_data.status == 1){
                    Toast.create("Success", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 2500);
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