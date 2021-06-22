<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 14:57
 */
?>
<!-- Log-in  -->
<section class="position-relative pb-0">
    <div class="gen-login-page-background" style="background-image: url('<?= BASE_URL_ASSETS ?>images/background/asset-54.jpg');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <form name="pms_login" id="pms_login" action="#" method="post">
                        <h4>Sign In</h4>
                        <p class="login-username">
                            <label for="user_login">Username or Email Address</label>
                            <input type="text" name="log" id="user_login" class="input" value="" size="20">
                        </p>
                        <p class="login-password">
                            <label for="user_pass">Password</label>
                            <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
                        </p>
                        <p class="login-remember">
                            <label>
                                <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                Me </label>
                        </p>
                        <p class="login-submit">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                   value="Log In">
                            <input type="hidden" name="redirect_to">
                        </p>
                        <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect"><a
                            href="register.php">Register</a> | <a href="recover-password.php">Lost your
                            password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Log-in  -->
