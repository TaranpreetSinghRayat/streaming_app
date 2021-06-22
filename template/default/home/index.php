<?php
$title_description = null;
$header_data = [
    'page_description' => $title_description ?? \App\Settings::get_value('app.description')
];
print $TPL->render('include/header',$header_data);
?>