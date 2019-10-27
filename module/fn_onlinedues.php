<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 25/05/2018
 * Time: 6:42 PM
 */
add_action('wp_ajax_updatePayment', 'updatePayments');
add_action('wp_ajax_nopriv_updatePayment', 'updatePayments');
function updatePayments()
{
    global $wpdb;
    $TxnId = sanitize_text_field($_POST["TxnId"]);
    $Oid = sanitize_text_field($_POST["Oid"]);
    $PayedAmount = sanitize_text_field($_POST["PayedAmount"]);
    $PaymentStatus = sanitize_text_field($_POST["PaymentStatus"]);
    $BankRefNo = sanitize_text_field($_POST["BankRefNo"]);
    $BookId = sanitize_text_field($_POST["BookId"]);;
    $Tbi = sanitize_text_field($_POST["Tbi"]);
    $UserId = sanitize_text_field($_POST["UserId"]);
    $DateDue = sanitize_text_field($_POST["DateDue"]);
    $IssuedDate = sanitize_text_field($_POST["IssuedDate"]);
    $PayedForDays = sanitize_text_field($_POST["PayedForDays"]);
    $Mode = sanitize_text_field($_POST["Mode"]);
    $sql = "INSERT IGNORE INTO `tblpayments`(`Id`,`Oid`, `TxnId`, `BankRefNo`, `PayedAmount`, `PaymentStatus`, `BookId`, `Tbi`, 
`UserId`, `DateDue`, `IssuedDate`, `PayedForDays`, `PaymentMode`, `CreatedTime`) VALUES (NULL,".$Oid.",'" . $TxnId . "','" . $BankRefNo . "',
" . $PayedAmount . ",'" . $PaymentStatus . "'," . $BookId . "," . $Tbi . "," . $UserId . ",'" . $DateDue . "','" . $IssuedDate . "'," . $PayedForDays . ",
'" . $Mode . "','" . get_cdate() . "');";
    $temp = $wpdb->query($sql);
    if ($temp > 0) {
        return true;
    }
    return false;
}

add_action('wp_ajax_get_all_online_dues_paid', 'get_all_online_dues_paid');
add_action('wp_ajax_nopriv_get_all_online_dues_paid', 'get_all_online_dues_paid');
function get_all_online_dues_paid()
{
    global $wpdb;
    $sql_fire = "select * from tblpayments order by id desc";
    $full_data = $wpdb->get_results($sql_fire);
    echo json_encode(array('success' => true, 'data' => $full_data));
    wp_die();
}

add_action('wp_ajax_updatePaymentApproval', 'updatePaymentApproval');
add_action('wp_ajax_nopriv_updatePaymentApproval', 'updatePaymentApproval');
function updatePaymentApproval()
{
    global $wpdb;
    $sql_fire = "update tblpayments set ApprovedStatus = '" . sanitize_text_field($_REQUEST["ApprovedStatus"]) . "' where id=" . sanitize_text_field($_REQUEST["Id"]);
    $wpdb->query($sql_fire);
    $sql_fire = "select * from tblpayments order by id desc";
    $full_data = $wpdb->get_results($sql_fire);
    return_issued_book_hardcode($_REQUEST["BookId"], $_REQUEST["UserId"], $_REQUEST["DateDue"], $_REQUEST["PayedAmount"], $_REQUEST["PayedForDays"], $_REQUEST["Tbi"]);
    echo json_encode(array('success' => true, 'data' => $full_data, 'msg' => "Book has been returned to us.", 'header' => 'OK', 'color' => "success"));
    wp_die();
}

