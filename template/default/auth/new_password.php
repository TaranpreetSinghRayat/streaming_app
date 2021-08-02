<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 05-07-2021
 * Time: 16:27
 */
?>
<!-- register -->
<section class="position-relative pb-0">
    <div class="gen-register-page-background" style="background-image: url('<?= BASE_URL_ASSETS ?>images/background/asset-3.jpg');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <form id="pms_register-form" class="pms-form pass-reset-form" method="POST">
                        <h4><?= $title ?></h4>

                        <ul class="pms-form-fields-wrapper pl-0">
                            <li class="pms-field pms-pass1-field">
                                <label for="pms_pass1">Password *</label>
                                <input id="pms_pass1" name="pass1" type="password" required>
                                <small id="user_pass_txt" class="form-text text-muted"></small>
                            </li>
                            <li class="pms-field pms-pass2-field">
                                <label for="pms_pass2">Repeat Password *</label>
                                <input id="pms_pass2" name="pass2" type="password">
                            </li>
                        </ul>
                        <span id="pms-submit-button-loading-placeholder-text" class="d-none">Processing. Please
                                wait...</span>
                        <input name="pms_register" type="submit" value="Reset Password">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <a href="<?= BASE_URL ?>login.php" style="float: right;">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register -->