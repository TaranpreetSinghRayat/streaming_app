<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 03-07-2021
 * Time: 15:16
 */

?>
<!-- breadcrumb -->
<div class="gen-breadcrumb" style="background-image: url('<?= BASE_URL_ASSETS ?>images/background/asset-25.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                            <?= $title ?>
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>home.php"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                        <?php if($user_data['is_subscribed'] == 0): ?>
                            <p><b>Subscription : </b> <span style="color: red;">Expired</span></p>
                        <?php else: ?>
                            <p><b>Subscription : </b> <span style="color: green;">Active</span></p>
                        <?php endif;?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<section class="gen-section-padding-3 gen-library">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                    <form id="update_account" method="post">
                        <div class="gen-register-form">
                            <h2><?= $title ?></h2>
                            <label>Email address *</label>
                            <input type="email" name="email" required value="<?= $user_data['email'] ?>">
                            <label>First Name*</label>
                            <input type="text" name="f_name" required value="<?= $user_data['first_name'] ?>">
                            <label>Last Name*</label>
                            <input type="text" name="l_name" required value="<?= $user_data['last_name'] ?>">
                            <input type="hidden" name="user" value="<?= $user_data['id'] ?>">
                            <div class="form-button">
                                <button type="submit" name="update" value="Update">Update</button>
                            </div>
                        </div>
                    </form>

                <form id="update_avatar" enctype="multipart/form-data" method="post" action="<?= $_SERVER['PHP_SELF'] ?>?update=avatar">
                    <div class="gen-register-form">
                        <h2><?= $title ?> Avatar</h2>
                        <label>Change Avatar </label>
                        <input type="file" name="avatar" required>

                        <div class="form-button">
                            <input type="hidden" name="userID" value="<?= $user_data['id'] ?>">
                            <button type="submit" name="update" value="Update">Update Avatar</button>
                        </div>
                    </div>
                </form>

                <form id="update_password" method="post">
                    <div class="gen-register-form">
                        <h2><?= $title ?> Password</h2>
                        <label>Current Password </label>
                        <input type="password" name="old_pass" required value="">
                        <label>New Password </label>
                        <input type="password" name="new_pass" required value="">
                        <small id="user_pass_txt" class="form-text text-muted"></small>
                        <label>Confirm Password </label>
                        <input type="password" name="confirm_pass" required value="">
                        <input type="hidden" name="user" value="<?= $user_data['id'] ?>">
                        <div class="form-button">
                            <button type="submit" name="update" value="Update">Update Password</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>