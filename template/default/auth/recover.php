<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 23-06-2021
 * Time: 17:30
 */
?>
<!-- Recover-Password -->
    <section class="position-relative pb-0">
        <div class="recover-password-page-background" style="background-image:url('<?= BASE_URL_ASSETS ?>images/background/asset-75.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_recover_password_form" class="pms-form" method="post">
                            <h4>Recover Password</h4>
                            <p class="font-weight-bold">Please enter your username or email address.<br>You will receive
                                a link to create a new
password via email.</p>
                            <ul class="pms-form-fields-wrapper pl-0 mb-4">
                                <li class="pms-field">
                                    <label for="pms_username_email">Username or Email</label>
                                    <input id="pms_username_email" name="pms_username_email" type="text" value="">
                                    <small id="user_email_txt" class="form-text text-muted"></small>
                                </li>
                            </ul>
                            <input disabled="true" type="submit" name="submit" value="Reset Password">
                            <a href="<?= BASE_URL ?>login.php" style="float: right;">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recover-Password -->