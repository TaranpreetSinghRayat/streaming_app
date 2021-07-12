<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 12-07-2021
 * Time: 14:30
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
                        <h4><?= $app_name ?> Settings</h4>
                    </div>
                    <div class="card-body">

                        <div class="row gutters">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <img src="img/user1.png" class="img-fluid change-img-avatar" alt="Image">
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div id="dropzone-sm" class="mb-4">
                                            <form action="http://bootstrap.gallery/upload" class="dropzone needsclick dz-clickable" id="demo-upload">

                                                <div class="dz-message needsclick">
                                                    <button type="button" class="dz-button">Change Image.</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="Abigail">
                                            <div class="field-placeholder">First  Name</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="Winter">
                                            <div class="field-placeholder">Last  Name</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="abigail.winter786@wmail.com">
                                            <div class="field-placeholder">Email</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="123-456-7890">
                                            <div class="field-placeholder">Phone</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="1980 Walnut Street">
                                            <div class="field-placeholder">Address</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="Mcallen">
                                            <div class="field-placeholder">City</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="New York">
                                            <div class="field-placeholder">State</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="text" class="form-control" placeholder="11789">
                                            <div class="field-placeholder">Zip Code</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <select class="select-single js-states" title="Select Product Category" data-live-search="true">
                                                <option>United States</option>
                                                <option>Australia</option>
                                                <option>Canada</option>
                                                <option>Gremany</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                                <option>England</option>
                                                <option>Brazil</option>
                                            </select>
                                            <div class="field-placeholder">Country</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <!-- Field wrapper start -->
                                        <div class="field-wrapper">
                                            <input type="password" class="form-control" placeholder="Enter Password">
                                            <div class="field-placeholder">Password</div>
                                        </div>
                                        <!-- Field wrapper end -->
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button class="btn btn-primary mb-3">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="account-settings-block">
                                    <div class="table-container light-blue">
                                        <table class="table v-middle m-0">
                                            <h5>Server Information:</h5>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Web server</td>
                                                <td><?= $_SERVER['SERVER_SOFTWARE']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>PHP Version</td>
                                                <td><?= phpversion(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Hostname</td>
                                                <td><?= gethostbyname($_SERVER['REMOTE_ADDR']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Server Admin</td>
                                                <td><?= $_SERVER['SERVER_ADMIN'] ?></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Card end -->

            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

    <!-- App Footer start -->
    <div class="app-footer">$copy; <?= APP_NAME ?> v<?= APP_VER ?> <?= date('Y') ?></div>
    <!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->
