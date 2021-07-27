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
                        <div class="card-title">Genre(s)</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="genre_view" class="table custom-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($GENRE->list_all())): ?>
                                        <?php foreach ($GENRE->list_all() as $genre): ?>
                                            <tr>
                                                <td><?= $genre['id'] ?></td>
                                                <td><?= $genre['name'] ?></td>

                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#edit_genre" data-genreid="<?= $genre['id'] ?>" class="btn btn-sm btn-dark btn-outline-info" >Edit</button>
                                                    <button data-genreid="<?= $genre['id'] ?>" class="btn btn-sm btn-dark btn-outline-danger delete_genre">Delete</button>
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
<div class="modal fade" id="add_new_genre" tabindex="-1" aria-labelledby="AddNewCast" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewCast">Add New Genre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_new_genre" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <div class="field-wrapper">
                        <input class="form-control" type="text" name="g_name" required>
                        <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Please enter genre full name.
                        </div>
                    </div>

                    <button type="submit" name="process_add_genre" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Cast Modal -->
<div class="modal fade" id="edit_genre" tabindex="-1" aria-labelledby="EditCast" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewCast">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="spinner-border" style="width: 3rem; height: 3rem; display:none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="form-data">

                    <form id="add_new_genre" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="field-wrapper">
                            <input class="form-control" type="text" name="g_name" required>
                            <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please enter casts full name.
                            </div>
                        </div>
                        <input type="hidden" name="genreID" value="">
                        <button type="submit" name="process_add_cast" class="btn btn-primary">Update</button>
                    </form>
            </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal end -->