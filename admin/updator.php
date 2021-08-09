<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 20-07-2021
 * Time: 11:53
 */

include 'config.php';
?>

<!-- Header Section -->
<?php
$ENTITIES = new \App\Entities();
$GENRE = new \App\Genre();
$CASTS = new \App\Casts();
$TAGS = new \App\Tags();
$UPD = new \App\Updator();

$TPL = new \App\Template(TEMPLATE.'/'. \App\Settings::get_value('app.admin.theme'));
echo $TPL->render('include/header',[
    'app_auth' => $_ENV['DEV'],
    'page_title' => 'App Updator | '. APP_NAME,
    'app_logo' => BASE_URL_ASSETS . \App\Settings::get_value('app.logo')
]);
?>
<!-- // Header Section -->

<!-- Navigation Section -->
<?php
echo $TPL->render('include/nav',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'USER' => $USER,
    'USR' => $USR_DATA
]);
?>
<!-- //Navigation Section -->

<!-- Body Section -->
<?php
echo $TPL->render('updator/index',[
    'app_name' => \App\Settings::get_value('app.name'),
    'app_logo' => ADMIN_BASE_URL_ASSETS. \App\Settings::get_value('app.logo'),
    'ENTITIES' => $ENTITIES,
    'GENRE' => $GENRE,
    'CASTS' => $CASTS,
    'TAGS' => $TAGS,
    'USER' => $USER,
    'USR' => $USR_DATA,
    'UPD' => $UPD
]);
?>
<!-- // Body Section -->

<!-- Footer Section -->
<?php
echo $TPL->render('include/footer',[
    'app_name' => \App\Settings::get_value('app.name'),
    'USR' => $USR_DATA
]);
?>
<!-- //Footer Section -->

<!-- Custom script -->
<script>
function check_for_update() {
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-updator.php",
        data: {action: "process_check_update"},
        dataType: "html",
        beforeSend: function () {
            $('.avail_version').html('Please wait checking for latest version.');
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);

            if(parsed_data.status == 1){
                $('.avail_version').html('Already running on latest version!');
                if(parsed_data.msg == 1){
                    $('.avail_version').html('Updates available!');
                    $('#updt_msg').html('<?= \App\Session::get('update_msg') ?>');
                    $('.updt_btn').css('display','inline');
                    $('.updt_btn').html('Download Update')
                }
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {

        }
    });
}

$('.updt_btn').click(function () {
    /*$('#progress').css('display','inline');
    $('.updt_btn').attr('disabled',true);

    var request = new XMLHttpRequest();

    var fileName = "<?= \App\Settings::get_value('updator.mirror') ?><?= $UPD->get_latest_ver() ?>.zip";
    request.responseType = 'blob';
    request.open('get', fileName, true);
    request.send();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var obj = window.URL.createObjectURL(this.response);
            var updateFile = blobToFile(obj,"<?= $UPD->get_latest_ver() ?>.zip");
            document.getElementById('save-file').setAttribute('href', obj);

            document.getElementById('save-file').setAttribute('download', fileName);
            setTimeout(function() {
                window.URL.revokeObjectURL(obj);
            }, 60 * 1000);
        }
    };

    var progress = document.getElementById("progress");
    var progressText = document.getElementById("progress-text");

    request.onprogress = function(e) {
        progress.max = e.total;
        progress.value = e.loaded;

        var percent_complete = (e.loaded / e.total) * 100;
        percent_complete = Math.floor(percent_complete);

        progressText.innerHTML = percent_complete + "%";
    };
*/

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-updator.php",
        data: {action: "process_download_update"},
        dataType: "html",
        beforeSend: function () {
            $('.updt_btn').attr('disabled', true);
            $('.updt_btn').html('Downloading ...');
        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);

            if(parsed_data.status == 1){
                $('.updt_btn').css('display', 'none');
                $('.install_btn').css('display', 'inline');
                $('.install_btn').html('Install ver ' + '<?= $UPD->get_latest_ver() ?>')
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {

        }
    });
})

$('.install_btn').click(function () {
    var  ver = "<?= $UPD->get_latest_ver() ?>"
    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-admin-updator.php",
        data: {action: "process_install_update"},
        dataType: "html",
        beforeSend: function () {

        },
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);

            if(parsed_data.status == 1){
                alert(parsed_data.msg)
            }
        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        },
        complete: function () {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>ajax/ajax-admin-updator.php",
                data: {action: "process_clean_update", ver},
                dataType: "html",
                success: function(resp){
                    console.log(resp);
                },
                error: function(err){
                    console.log(err);
                },
                complete: function(){
                    window.location.reload(true)
                }
            });
        }
    });
})

</script>
<!-- //Custom Script -->

