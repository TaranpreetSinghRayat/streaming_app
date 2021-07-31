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
                                                    <a href="#" data-ip="<?= $user['ip'] ?>">Lookup?</a>
                                                </td>
                                                <td>
                                                    <?php if($user['status'] == 1): ?>
                                                        <b style="color: green">Active</b>
                                                    <?php else: ?>
                                                        <b style="color: red">In-Active</b>
                                                        <br />
                                                        <a href="#" data-userID="<?= $user['id'] ?>">Resent Acc. Activation Mail</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button>Edit</button>
                                                    <button>Login As <?= $user['username'] ?></button>
                                                    <?= (($user['id'] != \App\Session::get('UID'))) ?  (($user['status'] == 1)) ?  '<button>De-Activate Account</button>' : '<button>Activate Account</button>' : ''?>

                                                    <button>Send Password Reset Mail</button>
                                                    <?= (($user['id'] == \App\Session::get('UID'))) ? '' : '<button>Delete</button>' ?>
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
