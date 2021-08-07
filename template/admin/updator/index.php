<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 20-07-2021
 * Time: 12:04
 */
?>

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <!-- Card start -->
                <div class="card">
                    <div class="card-header-lg">
                        <h4><?= $app_name ?> Updator</h4>
                    </div>
                    <div class="card-body">
                        <p><b>Current Version : </b><?= \App\Settings::get_value('app.version') ?></p>
                        <p><b>Available Version : </b><span class="avail_version"></span></p>
                        <button class="btn btn-light btn-sm" onclick="check_for_update()">Check</button>
                        <progress style="display: none" id="progress" value="0"></progress>
                        <span id="progress-text"></span>
                        <button id="save-file" class="btn btn-success btn-sm updt_btn" style="display:none">Update <?= \App\Settings::get_value('app.name') ?></button>
                        <button class="btn btn-success btn-sm install_btn" style="display:none">Install </button>
                    </div>

                </div>

            </div>
        </div>
        <p id="updt_msg"></p>
    </div>
</div>