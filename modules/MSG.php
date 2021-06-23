<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 18:47
 */

namespace App;


class MSG
{
    const AUTH = [
        'EMAIL_IN_USE' => 'Please enter another email. Current email is already in use.',
        'EMAIL_VALID' => 'Valid',
        'USR_VALID' => 'Username is valid.',
        'USR_IN_USE' => 'Username already in use.',
        'PASS_VALID' => 'Valid',
        'PASS_ERR' => 'Please create a strong password.',
        'ERR_REGISTER' => 'Something went wrong while registration. Please try again later.',
        'ACC_CRET_ERR_MAIL' => 'Account created success. Something went wrong while sending account activation email. Please contact staff',
        'ACC_CRET_CHK_MAIL' => 'Account created success. Please check your email for activation email.'

    ];

    const MAIL = [
        'ACC_ACTIVE_WLC' => 'Let"s get this started. Please click the button below to activate your account and start streaming.'
    ];
}