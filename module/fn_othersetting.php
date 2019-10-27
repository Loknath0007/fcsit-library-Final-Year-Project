<?php
// Function For Saving Other Settings
add_action('wp_ajax_other_settings', 'saveOtherSetting');
add_action('wp_ajax_nopriv_other_settings', 'saveOtherSetting');
function saveOtherSetting()
{
    $limit_issue_book_teachers = sanitize_text_field($_REQUEST["limit_issue_book_teachers"]);
    $message_api_key = sanitize_text_field($_REQUEST["message_api_key"]);
    $people_to_approve = sanitize_text_field($_REQUEST["people_to_approve"]);
    $custom_states = sanitize_text_field($_REQUEST["custom_states"]);
    $custom_css_front_page = sanitize_textarea_field($_REQUEST["custom_css_front_page"]);
    $custom_theme_color = sanitize_text_field($_REQUEST["custom_theme_color"]);
    $nos_of_book_to_show = sanitize_text_field($_REQUEST["nos_of_book_to_show"]);
    $nos_of_menu_to_show = sanitize_text_field($_REQUEST["nos_of_menu_to_show"]);
    $quick_notice = sanitize_text_field($_REQUEST["quick_notice"]);
    $local_currency = sanitize_text_field($_REQUEST["local_currency"]);
    $limit_issue_book = sanitize_text_field($_REQUEST["limit_issue_book"]);
    $hide_wordpress_dashboard = sanitize_text_field($_REQUEST["hide_wordpress_dashboard"]);
    $default_password = sanitize_text_field($_REQUEST["default_password"]);
    $inst_in_cards = sanitize_textarea_field($_REQUEST["inst_in_cards"]);
    $logo_css = sanitize_text_field($_REQUEST["logo_css"]);
    $width_custom_pages = sanitize_text_field($_REQUEST["width_custom_pages"]);
    $payment_page_notice = sanitize_text_field($_REQUEST["payment_page_notice"]);
    $working_key = sanitize_text_field($_REQUEST["working_key"]);
    $access_code = sanitize_text_field($_REQUEST["access_code"]);
    $merchant_code = sanitize_text_field($_REQUEST["merchant_code"]);
    $payment_currency_code = sanitize_text_field($_REQUEST["payment_currency_code"]);
    $fine_rate = sanitize_text_field($_REQUEST["fine_rate"]);
    $email_tmp_issued_book = sanitize_textarea_field($_REQUEST["email_tmp_issued_book"]);
    $email_tmp_returned_book = sanitize_textarea_field($_REQUEST["email_tmp_returned_book"]);
    $do_online_payment = sanitize_textarea_field($_REQUEST["do_online_payment"]);
    $email_sending_process = sanitize_textarea_field($_REQUEST["email_sending_process"]);
    $waiting_approval_msg = sanitize_textarea_field($_REQUEST["waiting_approval_msg"]);
    $front_page_s1 = sanitize_textarea_field($_REQUEST["front_page_s1"]);
    if (get_option("front_page_s1") !== false) {
        update_option('front_page_s1', $front_page_s1);
    } else {
        add_option("front_page_s1", $front_page_s1);
    }
    if (get_option("waiting_approval_msg") !== false) {
        update_option('waiting_approval_msg', $waiting_approval_msg);
    } else {
        add_option("waiting_approval_msg", $waiting_approval_msg);
    }
    if (get_option("do_online_payment") !== false) {
        update_option('do_online_payment', $do_online_payment);
    } else {
        add_option("do_online_payment", $do_online_payment);
    }
    if (get_option("email_sending_process") !== false) {
        update_option('email_sending_process', $email_sending_process);
    } else {
        add_option("email_sending_process", $email_sending_process);
    }
    if (get_option("email_tmp_issued_book") !== false) {
        update_option('email_tmp_issued_book', $email_tmp_issued_book);
    } else {
        add_option("email_tmp_issued_book", $email_tmp_issued_book);
    }
    if (get_option("email_tmp_returned_book") !== false) {
        update_option('email_tmp_returned_book', $email_tmp_returned_book);
    } else {
        add_option("email_tmp_returned_book", $email_tmp_returned_book);
    }
    if (get_option("working_key") !== false) {
        update_option('working_key', $working_key);
    } else {
        add_option("working_key", $working_key);
    }
    if (get_option("merchant_code") !== false) {
        update_option('merchant_code', $merchant_code);
    } else {
        add_option("merchant_code", $merchant_code);
    }
    if (get_option("access_code") !== false) {
        update_option('access_code', $access_code);
    } else {
        add_option("access_code", $access_code);
    }
    if (get_option("payment_currency_code") !== false) {
        update_option('payment_currency_code', $payment_currency_code);
    } else {
        add_option("payment_currency_code", $payment_currency_code);
    }
    if (get_option("payment_page_notice") !== false) {
        update_option('payment_page_notice', $payment_page_notice);
    } else {
        add_option("payment_page_notice", $payment_page_notice);
    }
    if (get_option("fine_rate") !== false) {
        update_option('fine_rate', $fine_rate);
    } else {
        add_option("fine_rate", $fine_rate);
    }
    if (get_option("width_custom_pages") !== false) {
        update_option('width_custom_pages', $width_custom_pages);
    } else {
        add_option("width_custom_pages", $width_custom_pages);
    }
    if (get_option("logo_css") !== false) {
        update_option('logo_css', $logo_css);
    } else {
        add_option("logo_css", $logo_css);
    }
    if (get_option("message_api_key") !== false) {
        update_option('message_api_key', $message_api_key);
    } else {
        add_option("message_api_key", $message_api_key);
    }
    if (get_option("limit_issue_book_teachers") !== false) {
        update_option('limit_issue_book_teachers', $limit_issue_book_teachers);
    } else {
        add_option("limit_issue_book_teachers", $limit_issue_book_teachers);
    }
    if (get_option("people_to_approve") !== false) {
        update_option('people_to_approve', $people_to_approve);
    } else {
        add_option("people_to_approve", $people_to_approve);
    }
    if (get_option("custom_states") !== false) {
        update_option('custom_states', $custom_states);
    } else {
        add_option("custom_states", $custom_states);
    }
    if (get_option("custom_css_front_page") !== false) {
        update_option('custom_css_front_page', $custom_css_front_page);
    } else {
        add_option("custom_css_front_page", $custom_css_front_page);
    }
    if (get_option("custom_theme_color") !== false) {
        update_option('custom_theme_color', $custom_theme_color);
    } else {
        add_option("custom_theme_color", $custom_theme_color);
    }
    if (get_option("nos_of_book_to_show") !== false) {
        update_option('nos_of_book_to_show', $nos_of_book_to_show);
    } else {
        add_option("nos_of_book_to_show", $nos_of_book_to_show);
    }
    if (get_option("nos_of_menu_to_show") !== false) {
        update_option('nos_of_menu_to_show', $nos_of_menu_to_show);
    } else {
        add_option("nos_of_menu_to_show", $nos_of_menu_to_show);
    }
    if (get_option("quick_notice") !== false) {
        update_option('quick_notice', $quick_notice);
    } else {
        add_option("quick_notice", $quick_notice);
    }
    if (get_option("local_currency") !== false) {
        update_option('local_currency', $local_currency);
    } else {
        add_option("local_currency", $local_currency);
    }
    if (get_option("limit_issue_book") !== false) {
        update_option('limit_issue_book', $limit_issue_book);
    } else {
        add_option("limit_issue_book", $limit_issue_book);
    }
    if (get_option("hide_wordpress_dashboard") !== false) {
        update_option('hide_wordpress_dashboard', $hide_wordpress_dashboard);
    } else {
        add_option("hide_wordpress_dashboard", $hide_wordpress_dashboard);
    }
    if (get_option("default_password") !== false) {
        update_option('default_password', $default_password);
    } else {
        add_option("default_password", $default_password);
    }
    if (get_option("inst_in_cards") !== false) {
        update_option('inst_in_cards', $inst_in_cards);
    } else {
        add_option("inst_in_cards", $inst_in_cards);
    }
    echo json_encode(array('success' => true, "msg" => "Setting have been saved.", "header" => "OK", 'color' => 'success'));
    wp_die();
}

?>