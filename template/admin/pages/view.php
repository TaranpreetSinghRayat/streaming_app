<?php
/**
 * User: TweekersNut Network
 * Date: 08-08-2021
 * Time: 00:21
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
                        <div class="card-title">Page(s)</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="page_view" class="table custom-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>View Permissions</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($PAGES->list_all())): ?>
                                    <?php foreach ($PAGES->list_all() as $page): ?>
                                        <tr>
                                            <td><?= $page['id'] ?></td>
                                            <td><?= $page['slug'] ?></td>
                                            <td><?= $page['title'] ?></td>
                                            <td><?= ucfirst($PAGES->get_head_name($page['headerID'])) ?></td>
                                            <td><?= ( ($page['isLoggedIn'] == 1) ) ? '<span style="color: #0d6efd">Members</span>' : '<span style="color:seashell">Guest</span>' ?></td>
                                            <td><?= ( ($page['status'] == 1) ) ? '<span style="color:greenyellow">Published</span>' : '<span style="color: darkred">Draft</span>' ?></td>

                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#edit_page" data-pageID="<?= $page['id'] ?>" class="btn btn-sm btn-dark btn-outline-info" >Edit</button>
                                                <?= ( ($page['status'] == 1) ) ? '<button data-pageID="'.$page['id'].'" class="btn btn-sm btn-outline-light draft_page">Draft Page</button>' : '<button data-pageID="'.$page['id'].'" class="btn btn-sm btn-outline-light publish_page">Publish Page</button>' ?>

                                                <button data-pageID="<?= $page['id'] ?>" class="btn btn-sm btn-dark btn-outline-danger delete_page">Delete</button>
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
    <div class="app-footer">&copy; <?= \App\Settings::get_value('app.name') .' | version : '. \App\Settings::get_value('app.version') .' | ' . date('Y') ?> </div>
    <!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->

<!-- Add New Page modal -->
<!-- Modal start -->
<div class="modal fade" id="add_new_page" tabindex="-1" aria-labelledby="AddNewPageTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalExtraLargeTitle">Add New page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="create_new_page" action="<?= $_SERVER['PHP_SELF'] ?>">

                    <div class="field-wrapper">
                        <input name="page_title" class="form-control" type="text" required>
                        <div class="field-placeholder">Title <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Page title.
                        </div>
                    </div>

                    <div class="field-wrapper mb-2">
                        <textarea id="summernote" name="editordata"></textarea>
                        <div class="field-placeholder">Page Content<span class="text-danger">*</span></div>
                    </div>

                    <div class="field-wrapper">
                        <select name="page_header" required>
                            <?php foreach ( $PAGES->list_all_page_headers() as $header):?>
                                <option value="<?= $header['id'] ?>"><?= $header['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="field-placeholder">Display Area <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Select page header where page should be published.
                        </div>
                    </div>

                    <div class="field-wrapper">
                        <select name="page_permissions">
                            <option value="0">Guests</option>
                            <option value="1">Members</option>
                        </select>
                        <div class="field-placeholder">Page Permissions <span class="text-danger">*</span></div>
                        <div class="form-text">
                            Select permissions which group should able to view page.
                        </div>
                    </div>

                    <input type="hidden" name="page_slug" value="">

                    <button class="btn btn-primary" type="submit">Create Page</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- //Add New Page Modal -->

<!-- Edit Page Modal -->
<div class="modal fade" id="edit_page" tabindex="-1" aria-labelledby="AddNewPageTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalExtraLargeTitle">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="spinner-border" style="width: 3rem; height: 3rem; display:none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="form-data">
                    <form method="post" id="edit_page_frm" action="<?= $_SERVER['PHP_SELF'] ?>">

                        <div class="field-wrapper">
                            <input name="page_title" class="form-control" type="text" required>
                            <div class="field-placeholder">Title <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Page title.
                            </div>
                        </div>

                        <div class="field-wrapper mb-2">
                            <textarea id="summernote_edit" name="editordata"></textarea>
                            <div class="field-placeholder">Page Content<span class="text-danger">*</span></div>
                        </div>

                        <div class="field-wrapper">
                            <select name="page_header" required>
                                <?php foreach ( $PAGES->list_all_page_headers() as $header):?>
                                    <option value="<?= $header['id'] ?>"><?= $header['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="field-placeholder">Display Area <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Select page header where page should be published.
                            </div>
                        </div>

                        <div class="field-wrapper">
                            <select name="page_permissions">
                                <option value="0">Guests</option>
                                <option value="1">Members</option>
                            </select>
                            <div class="field-placeholder">Page Permissions <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Select permissions which group should able to view page.
                            </div>
                        </div>

                        <input type="hidden" name="page_slug" value="">
                        <input type="hidden" name="pageID" value="">

                        <button class="btn btn-primary" type="submit">Update Page</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- //Edit Page Modal -->
