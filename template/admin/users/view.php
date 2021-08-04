<?php
/**
 * User: Taranpreet Singh Ray
 * Date: 29-07-2021
 * Time: 16:37
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
                        <div class="card-title">User(s)</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users_view" class="table custom-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Joined On</th>
                                    <th>Avatar</th>
                                    <th>Last Login</th>
                                    <th>Subscription</th>
                                    <th>Role</th>
                                    <th>I.P</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($USER->list_all())): ?>
                                        <?php foreach($USER->list_all() as $user): ?>
                                            <tr>
                                                <td><?= $user['id'] ?></td>
                                                <td>
                                                    <?= $user['username'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['email'] ?>
                                                </td>
                                                <td>
                                                    <?= ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']) ?>
                                                </td>
                                                <td>
                                                    <?= date("F j, Y, g:i a",strtotime($user['created_at'])); ?>
                                                </td>
                                                <td>
                                                    <a href="<?= BASE_URL ?><?= $user['avatar'] ?>" target="_blank"><img src="<?= BASE_URL ?><?= $user['avatar'] ?>" class="img-64" /></a>
                                                </td>
                                                <td>
                                                    <?= date("F j, Y, g:i a",strtotime($user['last_login'])); ?>
                                                </td>
                                                <td>
                                                    <?php if($user['is_subscribed'] == 1): ?>
                                                        <b style="color: green">Active</b>
                                                    <?php else: ?>
                                                        <b style="color: red">In-Active</b>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($user['role'] == 0): ?>
                                                        <b style="color: yellow;">Member</b>
                                                    <?php else: ?>
                                                        <b style="color: yellowgreen;">Administrator</b>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $user['ip'] ?>
                                                    <a href="#" class="ip-lookup" data-ip="<?= $user['ip'] ?>">Lookup?</a>
                                                </td>
                                                <td>
                                                    <?php if($user['status'] == 1): ?>
                                                        <b style="color: green">Active</b>
                                                    <?php else: ?>
                                                        <b style="color: red">In-Active</b>
                                                        <br />
                                                        <a href="#" class="send_acc_act_mail" data-userID="<?= $user['id'] ?>">Resent Acc. Activation Mail</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button class="btn-sm btn-info">Edit</button>

                                                    <?= (($user['id'] === \App\Session::get('UID'))) ? '' : '<button class="btn-sm btn-secondary btn-outline-warning">Login As '.$user['username'].'</button>' ?>
                                                    <?= (($user['id'] != \App\Session::get('UID'))) ?  (($user['status'] == 1)) ?  '<button class="btn-warning btn-sm btn-outline-dark">De-Activate Account</button>' : '<button class="btn-success btn-sm btn-outline-warning">Activate Account</button>' : ''?>

                                                    <button class="btn-sm btn-dark btn-outline-success">Send Password Reset Mail</button>
                                                    <?= (($user['id'] == \App\Session::get('UID'))) ? '' : '<button class="btn-outline-danger btn-sm btn-dark">Delete</button>' ?>
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

    <!-- Models -->

    <!-- Add New User Model -->
    <div class="modal fade" id="add_new_user" tabindex="-1" aria-labelledby="add_new_user" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_user_frm" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="field-wrapper">
                            <input class="form-control" type="text" name="user_name" required>
                            <div class="field-placeholder">Username <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please enter username for the user.
                            </div>
                        </div>

                        <div class="field-wrapper">
                            <input class="form-control" type="email" name="email" required>
                            <div class="field-placeholder">E-Mail <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please enter email of the user.
                            </div>
                        </div>

                        <div class="field-wrapper">
                            <input class="form-control" type="password" name="password" required>
                            <div class="field-placeholder">Password <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please enter password of the user.
                            </div>
                            <button type="button" class="btn-sm btn-light gen_password">Generate Password</button>
                        </div>

                        <div class="field-wrapper">
                            <select name="role">
                                <option value="0">Member</option>
                                <option value="1">Administrator</option>
                            </select>
                            <div class="field-placeholder">Role <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please select user role.
                            </div>
                        </div>

                        <div class="field-wrapper">
                            <select name="status">
                                <option value="0">In-Active</option>
                                <option value="1">Active</option>
                            </select>
                            <div class="field-placeholder">Status <span class="text-danger">*</span></div>
                            <div class="form-text">
                                Please select user account status. (In-active : Account activation email will be sent to user to activate account and start using it)
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add New</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- //Add New User Model -->

    <!-- IP Lookup Model -->
    <div class="modal fade" id="ip-lookup" tabindex="-1" aria-labelledby="ip-lookup" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ip-lookup-title">Lookup </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="ip-lookup-data">
                        <b>Type : </b><span class="type"></span>
                        <br />
                        <b>Continent Code : </b><span class="cc"></span>
                        <br />
                        <b>Continent Name : </b><span class="cn"></span>
                        <br />
                        <b>Country Code : </b><span class="ccode"></span>
                        <br />
                        <b>Country Name : </b><span class="cname"></span>
                        <br />
                        <b>Region Code : </b><span class="rc"></span>
                        <br />
                        <b>Region Name : </b><span class="rn"></span>
                        <br />
                        <b>City : </b><span class="city"></span>
                        <br />
                        <b>Zip : </b><span class="zip"></span>
                        <br />
                        <b>Lat, Long : </b><span class="ltll"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- IP Lookup Model -->
</div>
<!-- Content wrapper scroll end -->
