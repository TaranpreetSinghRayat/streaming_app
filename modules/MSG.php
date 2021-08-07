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
        'ACC_CRET_CHK_MAIL' => 'Account created success. Please check your email for activation email.',
        'USR_FND' => 'User found.',
        'USR_NT_FND' => 'User not found in record.',
        'ACC_PSS_RCV' => 'Please click the button below and set new password for your account.',
        'ACC_RCV' => 'Account recovery instrctions has been sent to your registered email address. Please follow the instructions.',
        'ERR_ACC_RCV' => 'Something went wrong while sending account recovery instructions.',
        'ACC_ACTV' => 'Account marked activated.',
        'ERR_ACC_ACTV' => "Something went wrong while activating account. <br> Invalid key",
        'INV_KEY' => 'Invalid key unable to process request.',
        'INV_LOG' => 'Invalid request. Unable to process.',
        'SUCC_LOG' => 'Login Success. You will be redirected!',
        'USR_LOG_NF' => 'Invalid user.',
        'USR_LOG_INV_PASS' => 'Invalid Password',
        'USR_LOG_DEC' => 'Account still left for verification. Please check verification mail.',
        'ERR_PASS_RST' => 'Something went wrong while resetting the password. Please try again later.',
        'PASS_RST_SUCC' => 'Password token updated.',
        'PRF_UPDT_SUCC' => 'Profile information updated success.',
        'PRF_UPDT_FAIL' => 'Something went wrong while updating profile. Please try again later',
        'INV_PASS' => 'Provided password is invalid. Please try again',
        'USR_CRET' => 'New user created!',
        'CHK_MAIL' => 'Account activation mail sent.',
        'ERR_MAIL' => 'Something went wrong while sending account activation email. Please check email configuration.',
        'ACC_PSS_RST_SUCC' => 'Password email sent succesfully to the user. Password reset link will be valid for 24 hours only.',
        'ACC_PSS_RST_ERR' => 'Something went wrong while sending password reset email. Please try again later.',
        'ACC_ACT_SCC' => 'Account marked activated and notification email sent to user.',
        'ACC_ACT_FAIL' => 'Something went wrong while marking account active. Please try again later.',
        'ACC_DEACT_SCC' => 'Account marked de-activated and notification email sent to user.',
        'ACC_DEACT_FAIL' => 'Something went wrong while marking account de-activating account. Please try again later.',
        'USR_DEL_SCC' => 'User deleted successfully.',
        'FT_USR_SCC' => 'User data fetched succesfully.',
        'ERR_UPD_DTL' => 'Something went wrong while updating user data. Please try again later.',
        'SCC_UPD_DTL' => 'User data updated successfully.'
    ];

    const MAIL = [
        'ACC_ACTIVE_WLC' => 'Let"s get this started. Please click the button below to activate your account and start streaming.'
    ];

    const CONTACT = [
        'ERR_QRY' => 'Something went wrong while creating query.',
        'QRY_SUCC' => 'Query created success. Our staff will contact back you soon.'
    ];

    const SETTINGS = [
        'ERR_UPDT' => 'Soemthing went wrong while updating setting value.',
        'UPDT_SUCC' => 'New value saved.'
    ];

    const ACTION = [
        'INV_RQT' => 'Invalid request'
    ];

    const CASTS = [
        'ADD_SUCC' => 'New cast member added.',
        'ADD_ERR' => 'Something went wrong while adding new cast. Please try again later.',
        'AVT_UPL' => 'Cast avatar uploaded success.',
        'AVT_ERR' => 'Something went wrong while upadting avatar.',
        'CNF_DLT' => 'Are you sure you would like to delete it?',
        'RMV_SUCC' => 'Cast removed succesfully.',
        'RMV_ERR' => 'Something went wrong while removing the cast. Please try again later.',
        'IN_USE' => 'Cast is in use. Please remove the cast from title it linked with.',
        'UPT_SUCC' => 'Cast data updated.',
        'UPT_ERR' => 'Something went wrong while updating the cast data. Please try again later.'
    ];

    const GENRE = [
        'ADD_SUCC' => 'New genre added.',
        'ADD_ERR' => 'Something went wrong while adding new genre. Please try again later.',
        'CNF_DLT' => 'Are you sure you would like to delete it?',
        'DLT_SCC' => 'Genre removed successfully.',
        'DLT_ERR' => 'Something went wrong while removing genre. Please try again later.',
        'UDT_SCC' => 'Genre name updated.',
        'UDT_ERR' => 'Soemthing went wrong while updating genre name. Please try again later.'
    ];

    const TAGS = [
        'ERR_ADD' => 'Something went wrong while adding new tag. Please try again later.',
        'ADD_SUCC' => 'New tag added successfully.',
        'DLT_SCC' => 'Tag removed successfully.',
        'UDT_ERR' => 'Something went wrong while updating tag. Please try again later.',
        'UDT_SCC' => 'Tag updated!'
    ];

    const NOTIFICATION = [
        'ACC_ACT_AD' => "Your account is marked activated by administrator. You can now login  <a href='". BASE_URL ."login.php'></a>",
        'ACC_DEACT_AD' => 'Your account is marked de-activated by administrator. You not be able to use your account until it marked activated. Please contact adminstrator for more information',
        'ACC_DATA_UPD' => 'User your account has been updated by the administrator. Please contact administrator for more information.'
    ];
}