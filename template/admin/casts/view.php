<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 15-07-2021
 * Time: 16:49
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
                    <div class="card-header">
                        <div class="card-title">Basic Example</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="cast_view" class="table custom-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($CASTS->get_all())): ?>
                                        <?php foreach ($CASTS->get_all() as $cast): ?>
                                            <tr>
                                                <td><?= $cast['id'] ?></td>
                                                <td><?= $cast['name'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $cast['description'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
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
    <div class="app-footer">© Uni Pro Admin 2021</div>
    <!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->