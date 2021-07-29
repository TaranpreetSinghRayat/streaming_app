<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 28-07-2021
 * Time: 12:43
 */
?>
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
                        <div class="card-title">Tag(s)</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tag_view" class="table custom-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($TAGS->list_all())): ?>
                                    <?php foreach ($TAGS->list_all() as $tag): ?>
                                        <tr>
                                            <td><?= $tag['id'] ?></td>
                                            <td><?= $tag['name'] ?></td>

                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#edit_tag" data-tagid="<?= $tag['id'] ?>" class="btn btn-sm btn-dark btn-outline-info" >Edit</button>
                                                <button data-tagid="<?= $tag['id'] ?>" class="btn btn-sm btn-dark btn-outline-danger delete_tag">Delete</button>
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
<div class="modal fade" id="add_new_tag" tabindex="-1" aria-labelledby="AddNewTag" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewCast">Add New Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_new_tag" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <div class="field-wrapper">
                        <input class="form-control" type="text" name="t_name" required>
                        <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Please enter tag full name.
                        </div>
                    </div>

                    <button type="submit" name="process_add_tag" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit tag Modal -->
<div class="modal fade" id="edit_tag" tabindex="-1" aria-labelledby="EditTag" aria-hidden="true">
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

                    <form id="edit_tag_frm" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="field-wrapper">
                            <input class="form-control" type="text" name="t_name" required>
                            <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please enter tag full name.
                            </div>
                        </div>
                        <input type="hidden" name="tagID" value="">
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
