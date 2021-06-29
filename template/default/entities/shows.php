<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 29-06-2021
 * Time: 14:33
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

