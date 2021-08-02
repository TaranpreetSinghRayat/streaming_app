<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 05-07-2021
 * Time: 13:03
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
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- Icon-Box Start -->
<section class="gen-section-padding-3">
    <div class="container container-2">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="gen-icon-box-style-1">
                    <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <div class="gen-icon-box-content">
                        <h3 class="pt-icon-box-title mb-2">
                            <span>Our Location</span>
                        </h3>
                        <p class="gen-icon-box-description"><?= $contact_location ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-4 mt-md-0">
                <div class="gen-icon-box-style-1">
                    <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="fas fa-phone-alt"></i></span>
                    </div>
                    <div class="gen-icon-box-content">
                        <h3 class="pt-icon-box-title mb-2">
                            <span>call us at</span>
                        </h3>
                        <p class="gen-icon-box-description"><?= $contact_phone ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 mt-4 mt-xl-0">
                <div class="gen-icon-box-style-1">
                    <div class="gen-icon-box-icon">
                            <span class="gen-icon-animation">
                                <i class="far fa-envelope"></i></span>
                    </div>
                    <div class="gen-icon-box-content">
                        <h3 class="pt-icon-box-title mb-2">
                            <span>Mail us</span>
                        </h3>
                        <p class="gen-icon-box-description">
                            <a href="mailto:<?= $contact_mail ?>"><?= $contact_mail ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Icon-Box End -->

<!-- Map Start -->
<Section class="gen-section-padding-3 gen-top-border">
    <div class="container container-2">
        <div class="row">
            <div class="col-xl-6">
                <h2 class="mb-5">get in touch</h2>
                <form id="contact-form">
                    <div class="row gt-form">
                        <div class="col-md-6 mb-4"><input type="text" name="first_name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-4"><input type="email" name="your-email" placeholder="Email" required></div>
                        <div class="col-md-12 mb-4"><input type="text" name="your-Cell-phone"
                                                          placeholder="Cell Phone">
                        </div>
                        <div class="col-md-12 mb-4"><textarea name="your-message" rows="6"
                                                              placeholder="Your Message" required></textarea><br>
                            <input type="submit" value="Send" class="mt-4">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-6">
                <div style="width: 100%"><iframe width="100%" height="550" frameborder="0" scrolling="no"
                                                 marginheight="0" marginwidth="0"
                                                 src="<?= $contact_map ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
</Section>
<!-- Map End -->
