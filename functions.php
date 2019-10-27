<?php
session_start();
global $wpdb;
$wpdb->suppress_errors = true;
include_once("basic_setups.php");
include_once("module/fn_uploads.php");
include_once("module/fn_login.php");
include_once("module/fn_profile.php");
include_once("module/fn_books.php");
include_once("module/fn_issuebook.php");
include_once("module/fn_inst.php");
include_once("module/fn_year.php");
include_once("module/fn_course.php");
include_once("module/fn_user.php");
include_once("module/fn_dashboard.php");
include_once("module/fn_othersetting.php");
include_once("module/fn_requestbook.php");
include_once("module/fn_fines.php");
include_once("module/fn_slides.php");
include_once("module/fn_common.php");

$_SESSION["ccavenue_manager"] = get_url("payment-response-handler");

$_SESSION["working_key"] = get_option("working_key");
$_SESSION["access_code"] = get_option("access_code");
$_SESSION["merchant_data"] = get_option("merchant_code");

include_once("module/fn_onlinedues.php");
include_once("module/fn_updatemanager.php");


?>