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
                        <div class="card-title">Casts</div>
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
                                                <td>
                                                    <img src="<?= BASE_URL . $cast['avatar']?>" class="img-64" />

                                                </td>
                                                <td>
                                                    <?php if($cast['role'] == 0): ?>
                                                        Actor
                                                    <?php elseif ($cast['role'] == 1): ?>
                                                        Director
                                                    <?php else: ?>
                                                        Producer
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $cast['description'] ?></td>
                                                <td>
                                                    <button data-castid="<?= $cast['id'] ?>" class="btn btn-sm btn-dark btn-outline-info">Edit</button>
                                                    &nbsp;
                                                    <button data-castid="<?= $cast['id'] ?>" class="btn btn-sm btn-dark btn-outline-danger">Delete</button>
                                                </td>
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
    <div class="app-footer">&copy; <?= \App\Settings::get_value('app.name') .' ' . date('Y') ?> </div>
    <!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->

<!-- Modal start -->
<div class="modal fade" id="add_new_cast" tabindex="-1" aria-labelledby="AddNewCast" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewCast">Add New Cast</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_new_cast" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <div class="field-wrapper">
                        <input class="form-control" type="text" name="c_name" required>
                        <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Please enter casts full name.
                        </div>
                    </div>

                    <div class="field-wrapper">
                        <input class="form-control" type="file" id="c_avatar" name="c_avatar" required>
                        <div class="field-placeholder">Avatar <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Please upload casts avatar.
                        </div>
                    </div>

                    <div class="field-wrapper">
                        <select class="form-select" name="c_role" id="cast_type">
                            <option value="0">Actor</option>
                            <option value="1">Director</option>
                            <option value="2">Producer</option>
                        </select>
                        <div class="field-placeholder">Type <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Please select cast Type.
                        </div>
                    </div>

                    <div class="field-wrapper">
                        <textarea class="form-control" name="c_description" required></textarea>
                        <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Little bio about the cast.
                        </div>
                    </div>
                    <button type="submit" name="process_add_cast" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->