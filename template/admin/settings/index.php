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

                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="app_settings">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#app_settings_collapse" aria-expanded="true" aria-controls="app_settings_collapse">
                                                Application Settings
                                            </button>
                                        </h2>
                                        <div id="app_settings_collapse" class="accordion-collapse collapse show" aria-labelledby="app_settings" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                    <?php if(!empty(\App\Settings::get_by_type('app.'))): ?>
                                                        <?php foreach (\App\Settings::get_by_type('app.') as $item): ?>
                                                            <?php
                                                            //item name processing
                                                            $item_name = explode('.',$item['name']);
                                                            if(count($item_name) == 3){
                                                                $name = ucfirst($item_name[1] . ' '. $item_name[2]);
                                                            }else{
                                                                $name = ucfirst($item_name[1]);
                                                            }
                                                            ?>
                                                            <div class="field-wrapper">
                                                                <?php switch ($item['type']){
                                                                    case 0:
                                                                        ?>
                                                                        <input disabled="true" type="text" value="<?= $item['value'] ?>"  name="<?= $item['name'] ?>" />
                                                                        <?php
                                                                        break;
                                                                    case 2:
                                                                        ?>
                                                                        <input type="file" name="<?= $item['name'] ?>" id="_key_<?= $item['id'] ?>">
                                                                        <img src="<?= BASE_URL_ASSETS . $item['value'] ?>" class="" width="auto" height="90px">
                                                                    <?php
                                                                        break;
                                                                    case 3:
                                                                        ?>
                                                                        <textarea id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"><?= $item['value'] ?></textarea>
                                                                    <?php
                                                                        break;
                                                                    default:
                                                                        ?>
                                                                        <input type="text" id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"  value="<?= $item['value'] ?>" />
                                                                        <?php
                                                                        break;
                                                                } ?>
                                                                <div class="field-placeholder"><?= $name ?></div>
                                                                <div class="form-text"><?= $item['description'] ?></div>
                                                            </div>
                                                            <?php if($item['type'] != 0): ?>
                                                                <div class="field-wrapper m-0">
                                                                    <button type="button" onclick="update_setting(<?= $item['id'] ?>)" class="btn btn-primary stripes-btn float-right">Save</button>
                                                                </div>
                                                            <?php endif; ?>

                                                            </br>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="mail_settings">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#mail_settings_collapse" aria-expanded="false" aria-controls="mail_settings_collapse">
                                                Mail Settings
                                            </button>
                                        </h2>
                                        <div id="mail_settings_collapse" class="accordion-collapse collapse" aria-labelledby="mail_settings" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <?php if(!empty(\App\Settings::get_by_type('mail.'))): ?>
                                                    <?php foreach (\App\Settings::get_by_type('mail.') as $item): ?>
                                                        <?php
                                                        //item name processing
                                                        $item_name = explode('.',$item['name']);
                                                        if(count($item_name) == 3){
                                                            $name = ucfirst($item_name[1] . ' '. $item_name[2]);
                                                        }else{
                                                            $name = ucfirst($item_name[1]);
                                                        }
                                                        ?>
                                                        <div class="field-wrapper">
                                                            <?php switch ($item['type']){
                                                                case 0:
                                                                    ?>
                                                                    <input disabled="true" type="text" value="<?= $item['value'] ?>"  name="<?= $item['name'] ?>" />
                                                                    <?php
                                                                    break;
                                                                case 2:
                                                                    ?>
                                                                    <input type="file" name="<?= $item['name'] ?>" id="_key_<?= $item['id'] ?>">
                                                                    <img src="<?= BASE_URL_ASSETS . $item['value'] ?>" class="" width="auto" height="90px">
                                                                    <?php
                                                                    break;
                                                                case 3:
                                                                    ?>
                                                                    <textarea id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"><?= $item['value'] ?></textarea>
                                                                    <?php
                                                                    break;
                                                                default:
                                                                    ?>
                                                                    <input type="text" id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"  value="<?= $item['value'] ?>" />
                                                                    <?php
                                                                    break;
                                                            } ?>
                                                            <div class="field-placeholder"><?= $name ?></div>
                                                            <div class="form-text"><?= $item['description'] ?></div>
                                                        </div>
                                                        <?php if($item['type'] != 0): ?>
                                                            <div class="field-wrapper m-0">
                                                                <button type="button" onclick="update_setting(<?= $item['id'] ?>)" class="btn btn-primary stripes-btn float-right">Save</button>
                                                            </div>
                                                        <?php endif; ?>

                                                        </br>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="contact_settings">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#contact_settings_collapse" aria-expanded="false" aria-controls="contact_settings_collapse">
                                                Contact Settings
                                            </button>
                                        </h2>
                                        <div id="contact_settings_collapse" class="accordion-collapse collapse" aria-labelledby="contact_settings" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <?php if(!empty(\App\Settings::get_by_type('contact.'))): ?>
                                                    <?php foreach (\App\Settings::get_by_type('contact.') as $item): ?>
                                                        <?php
                                                        //item name processing
                                                        $item_name = explode('.',$item['name']);
                                                        if(count($item_name) == 3){
                                                            $name = ucfirst($item_name[1] . ' '. $item_name[2]);
                                                        }else{
                                                            $name = ucfirst($item_name[1]);
                                                        }
                                                        ?>
                                                        <div class="field-wrapper">
                                                            <?php switch ($item['type']){
                                                                case 0:
                                                                    ?>
                                                                    <input disabled="true" type="text" value="<?= $item['value'] ?>"  name="<?= $item['name'] ?>" />
                                                                    <?php
                                                                    break;
                                                                case 2:
                                                                    ?>
                                                                    <input type="file" name="<?= $item['name'] ?>" id="_key_<?= $item['id'] ?>">
                                                                    <img src="<?= BASE_URL_ASSETS . $item['value'] ?>" class="" width="auto" height="90px">
                                                                    <?php
                                                                    break;
                                                                case 3:
                                                                    ?>
                                                                    <textarea id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"><?= $item['value'] ?></textarea>
                                                                    <?php
                                                                    break;
                                                                default:
                                                                    ?>
                                                                    <input type="text" id="_key_<?= $item['id'] ?>" name="<?= $item['name'] ?>"  value="<?= $item['value'] ?>" />
                                                                    <?php
                                                                    break;
                                                            } ?>
                                                            <div class="field-placeholder"><?= $name ?></div>
                                                            <div class="form-text"><?= $item['description'] ?></div>
                                                        </div>
                                                        <?php if($item['type'] != 0): ?>
                                                            <div class="field-wrapper m-0">
                                                                <button type="button" onclick="update_setting(<?= $item['id'] ?>)" class="btn btn-primary stripes-btn float-right">Save</button>
                                                            </div>
                                                        <?php endif; ?>

                                                        </br>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
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
                                                <td><?= gethostbyname($_SERVER['REMOTE_ADDR']) ?? 'N/A' ?></td>
                                            </tr>
                                            <tr>
                                                <td>Server Admin</td>
                                                <td><?= $_SERVER['SERVER_ADMIN'] ?? 'N/A'; ?></td>

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
    <div class="app-footer">&copy; <?= APP_NAME ?> v<?= APP_VER ?> <?= date('Y') ?></div>
    <!-- App footer end -->

</div>
<!-- Content wrapper scroll end -->
