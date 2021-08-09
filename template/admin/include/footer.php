<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 13:33
 */

?>

</div>
<!-- *************
    ************ Main container end *************
************* -->

</div>
<!-- Page wrapper end -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/jquery.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/modernizr.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/moment.js"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->
<!-- Bootstrap Toaster -->
<script src="<?= BASE_URL_ASSETS ?>js/bootstrap-toaster.min.js"></script>
<!-- Toaster Defaults -->
<script>
    Toast.setTheme(TOAST_THEME.DARK);
    Toast.enableTimers(false);
    Toast.setMaxCount(5);
</script>

<!-- Megamenu JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/megamenu/js/megamenu.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/megamenu/js/custom.js"></script>

<!-- Slimscroll JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/slimscroll/slimscroll.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/slimscroll/custom-scrollbar.js"></script>

<!-- Search Filter JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/search-filter/search-filter.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/search-filter/custom-search-filter.js"></script>

<!-- Apex Charts -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/apex/apexcharts.min.js"></script>

<!-- Circleful Charts -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/circliful/circliful.min.js"></script>

<!-- Data Tables -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/dataTables.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/dataTables.bootstrap.min.js"></script>

<!-- Custom Data tables -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/custom/custom-datatables.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/custom/fixedHeader.js"></script>

<!-- Download / CSV / Copy / Print -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/buttons.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/jszip.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/pdfmake.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/vfs_fonts.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/html5.min.js"></script>
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/datatables/buttons.print.min.js"></script>

<!-- Summernote JS -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>vendor/summernote/summernote-bs4.js"></script>
<script>
    // Summernote
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 210,
            tabsize: 2,
            focus: true,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
    });
</script>


<!-- Main Js Required -->
<script src="<?= ADMIN_BASE_URL_ASSETS ?>js/main.js"></script>

<!-- Common scripts -->
<script>
    $(".setting_nav_details").submit((e) => {
        e.preventDefault();

        var f_name = $('input[name=f_name]').val();
        var l_name = $('input[name=l_name]').val();
        var email = $('input[name=email]').val();
        var user = $('input[name=user]').val();

        $.ajax({
            type: "POST",
            url: "<?= BASE_URL ?>ajax/ajax-auth.php",
            data: {action: "update_account", f_name, l_name, email, user},
            dataType: "html",
            success: function (resp) {
                console.log(resp);
                var parsed_data = JSON.parse(resp);
                if(parsed_data.status == 1){
                    Toast.create("Settings Updated", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
                }else{
                    Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
                }

            },
            error: function (err) {
                alert("Critical Error Contact Developer");
            }
        });
    });

$(".setting_nav_password").submit((e) => {
    e.preventDefault();

    var old = $('input[name=old]').val();
    var password = $('input[name=password]').val();
    var confirm_password = $('input[name=confirm_password]').val();
    var user = $('input[name=user]').val();

    $.ajax({
        type: "POST",
        url: "<?= BASE_URL ?>ajax/ajax-auth.php",
        data: {action: "update_password", old, password, confirm_password, user},
        dataType: "html",
        success: function (resp) {
            console.log(resp);
            var parsed_data = JSON.parse(resp);
            if(parsed_data.status == 1){
                Toast.create("Settings Updated", parsed_data.msg, TOAST_STATUS.SUCCESS, 5000);
            }else{
                Toast.create("Something went wrong", parsed_data.msg, TOAST_STATUS.DANGER, 5000);
            }

        },
        error: function (err) {
            alert("Critical Error Contact Developer");
        }
    });
});
</script>
<!-- //Common scripts -->
</body>

</html>
