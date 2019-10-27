<?php
//Send Email
function send_email_c($email, $body)
{
    $headers = array('Content-Type: text/html; charset=UTF-8');
    // Seems like hosting filter this email
    $email_body = $body;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('success' => true, "msg" => "Invalid email format" . $email, "header" => "Info", 'color' => 'info'));
        wp_die();
    }
    if ($email != "" && $email_body != "") {
        if (wp_mail($email, "Password Recovery", $email_body, $headers)) {
            echo json_encode(array("success" => true, "msg" => "Password has been send successfully", "header" => "OK", "color" => "success"));
            wp_die();
        } else {
            echo json_encode(array("success" => true, "msg" => "Password sending failed.", "header" => "OK", "color" => "success"));
            wp_die();
        }
    } else {
        echo json_encode(array("success" => true, "msg" => "Email could not be sent at the time.", "header" => "OK", "color" => "info"));
        wp_die();
    }
}

function give_mysql_date_format($my_date_format)
{
    return date("Y-m-d", strtotime($my_date_format));
}

function check_if_running_local()
{
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function send_sms_backend($phone, $message_cst)
{
    $mobileNumber = sanitize_text_field($phone);
    $mobileNumber = str_replace('+', '', $mobileNumber);
    $message = sanitize_text_field($message_cst);
    $authKey = get_option("message_api_key");
    $senderId = "LIBRAY";
    $message = urlencode($message);
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url = "https://control.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
    echo json_encode(array("success" => true, 'data' => $output, 'msg' => "Messgae has been send.", "header" => "OK", 'color' => 'success'));
    wp_die();
}

add_action('wp_ajax_send_sms', 'send_sms');
add_action('wp_ajax_nopriv_send_sms', 'send_sms');
function send_sms()
{
    $mobileNumber = sanitize_text_field($_REQUEST["phone"]);
    $mobileNumber = str_replace('+', '', $mobileNumber);
    $message = sanitize_text_field($_REQUEST["message"]);
    send_sms_backend($mobileNumber, $message);
}

// Function For Getting ID From ID
function wpse_4999_get_permalink_by_slug($slug, $post_type = '')
{
    $permalink = null;
    $args = array(
        'name' => $slug,
        'max_num_posts' => 1
    );
    if ('' != $post_type) {
        $args = array_merge($args, array('post_type' => $post_type));
    }
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $query->the_post();
        $permalink = get_permalink(get_the_ID());
        wp_reset_postdata();
    }
    return $permalink;
}

function custom_send_email($user_id, $book_id, $template)
{
    global $wpdb;
    $temp_sql = "select * from tblusers where UserID=" . $user_id;
    $user_obj = $wpdb->get_row($temp_sql);
    $to = $user_obj->Email;
    $nickname = $user_obj->FirstName . ' ' . $user_obj->LastName;
    $temp_sql = "select * from tblbooks where Id=(select ParentBookID from tblsubbooks where BookId=" . $book_id . ")";
    $book_obj = $wpdb->get_row($temp_sql);
    $book_name = $book_obj->BookTitle;
    $headers = array('Content-Type: text/html; charset=UTF-8');
    if ($template == "BOOKISSUEDTEMPLATE") {
        $subject = 'LMS - BOOK ISSUED';
        $body = 'Hii ' . $nickname . '<br/> Book Name : ' . $book_name . '.<br/> Book Id : ' . $book_id . ' <br/> Has been issued to you successfully.<br/>Thanks,<br/>LM System.<br/>This is a system generated email kindly do not reply to it.';
    } elseif ($template == "BOOKRETURNEDTEMPLATE") {
        $subject = 'LMS - BOOK RETURNED';
        $body = 'Hii ' . $nickname . '<br/> Book Name : ' . $book_name . '.<br/> Book Id : ' . $book_id . ' <br/> Has been returned to us successfully.<br/>Thanks,<br/>LM System.<br/>This is a system generated email kindly do not reply to it.';
    }
    wp_mail($to, $subject, $body, $headers);
}

// Get Url
function get_url($slug)
{
    return get_permalink(get_page_by_path($slug));
}

add_action('wp_ajax_frnt_contact', 'sendContactInfo');
add_action('wp_ajax_nopriv_frnt_contact', 'sendContactInfo');
function sendContactInfo()
{
    if (isset($_REQUEST["c_name"]) && isset($_REQUEST["c_phone"]) && isset($_REQUEST["c_email"]) && isset($_REQUEST["c_desc"]) && !empty($_REQUEST["c_name"]) && !empty($_REQUEST["c_phone"]) && !empty($_REQUEST["c_email"]) && !empty($_REQUEST["c_desc"])) {
        $name = sanitize_text_field($_REQUEST["c_name"]);
        $phone = sanitize_text_field($_REQUEST["c_phone"]);
        $email = sanitize_text_field($_REQUEST["c_email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('success' => true, "msg" => "Invalid email format", "header" => "Info", 'color' => 'info'));
            wp_die();
        }
        $message = sanitize_text_field($_REQUEST["c_desc"]);
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $template = "Hii,<br/>Message from <b>" . $name . "</b><br/>Phone : <b>" . $phone . "</b><br/>Email : <b>" . $email . "</b><br/>Message : <b>" . $message . "</b><br/>";
        if (wp_mail(get_bloginfo('admin_email'), "From Front Page", $template, $headers)) {
            echo json_encode(array('success' => true, "msg" => "Message has been sent to the Librarian", "header" => "Info", 'color' => 'info'));
            $template = "Hii,<br/>Message Received from <b>" . $name . "</b><br/>Phone : <b>" . $phone . "</b><br/>Email : <b>" . $email . "</b><br/>Message : <b>" . $message . "</b><br/>We will get back to you shortly.<br/>----------------------------------------------<br/>
				This is the demo email from www.library-management.com
				<br/><br/> Ignore this email if you have not issued the message.
				<br/>";
            wp_mail($email, "Acknowledgement Received", $template, $headers);
        } else {
            echo json_encode(array('success' => true, "msg" => "Sending of message failed", "header" => "Info", 'color' => 'error'));
        }
    } else {
        echo json_encode(array('success' => true, "msg" => "Some information is missing", "header" => "Info", 'color' => 'info'));
    }
    wp_die();
}

function get_cdate()
{
    return date('Y-m-d H:i:s');
}

add_action('wp_ajax_send_email_ajx', 'send_email_ajx');
add_action('wp_ajax_nopriv_send_email_ajx', 'send_email_ajx');
function send_email_ajx()
{
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $email = sanitize_text_field($_POST["email"]);
    // Seems like hosting filter this email
    $email_body = sanitize_text_field($_POST["body"]);
    $email_body = "Hii ,<br/>This is to inform you that , the " . $email_body;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('success' => true, "msg" => "Invalid email format", "header" => "Info", 'color' => 'info'));
        wp_die();
    }
    if ($email != "" && $email_body != "") {
        if (wp_mail($email, "From LMS System", $email_body, $headers)) {
            echo json_encode(array("success" => true, "msg" => "Email send successfully", "header" => "OK", "color" => "success"));
            wp_die();
        } else {
            echo json_encode(array("success" => true, "msg" => "Email sending failed.", "header" => "OK", "color" => "info"));
            wp_die();
        }
    } else {
        echo json_encode(array("success" => true, "msg" => "Email could not be sent at the time.", "header" => "OK", "color" => "info"));
        wp_die();
    }
}

function is_connected()
{
    $connected = @fsockopen("www.google.com", 80, $errno, $errstr, 10);
    //website, port  (try 80 or 443)
    if ($connected) {
        $is_conn = true; //action when connected
        fclose($connected);
    } else {
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}

function get_role_custom($user_id)
{
    global $wpdb;
    return $wpdb->get_row("select Role from Users where Userid=" . $user_id . " limit 1")->Role;
}

add_action('wp_ajax_create_page', 'create_page');
add_action('wp_ajax_nopriv_create_page', 'create_page');
function create_page()
{
    if (isset($_REQUEST["page_title"]) && isset($_REQUEST["page_menu"]) && isset($_REQUEST["page_content"]) && !empty($_REQUEST["page_title"]) && !empty($_REQUEST["page_menu"]) && !empty($_REQUEST["page_content"])) {
        $new_page_title = wp_strip_all_tags($_REQUEST["page_title"]);
        $new_page_content = $_REQUEST['page_content'];
        $done = false;
        $work = "added";
        $new_page_template = 'basic_template.php';
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        if (!isset($page_check->ID)) {
            $new_page_id = wp_insert_post($new_page);
            if (!empty($new_page_template)) {
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
            add_post_meta($new_page_id, "menu_name", wp_strip_all_tags($_REQUEST["page_menu"]));
            $done = true;
        } else {
            $work = "modified";
            $new_page = array_merge($new_page, array("ID" => $_REQUEST["id"]));
            print_r(wp_update_post($new_page));
            die();
            update_post_meta($_REQUEST["id"], "menu_name", wp_strip_all_tags($_REQUEST["page_menu"]));
            $done = true;
        }
        if ($done) {
            echo json_encode(array("success" => true, "msg" => "Page " . $work . " successfully!.", "header" => "OK", "color" => "success"));
            die();
        } else {
            if ($work == "modified") {
                $work = "modification";
            } else {
                $work = "adding";
            }
            echo json_encode(array("success" => true, "msg" => "Page " . $work . " failed.", "header" => "OK", "color" => "info"));
            die();
        }
    } else {
        echo json_encode(array("success" => true, "msg" => "All the fiels are necessary.", "header" => "OK", "color" => "error"));
        die();
    }
}

function get_all_custom_page_created()
{
    global $wpdb;
    $found = false;
    $fulldata = $wpdb->get_results("select * from " . $wpdb->prefix . "postmeta where meta_key='_wp_page_template' and meta_value='basic_template.php'");
    foreach ($fulldata as $obj) {
        if (get_post_status($obj->post_id) == "publish") {
            $found = true;
            echo "<tr>";
            echo "<td>" . $obj->post_id . "</td>";
            echo "<td>" . get_post_meta($obj->post_id, "menu_name")[0] . "</td>";
            echo "<td>" . get_post_field('post_title', $obj->post_id) . "</td>";
            echo "<td>" . get_post_field('post_content', $obj->post_id) . "</td>";
            echo "<td>" . get_post_field('post_date', $obj->post_id) . "</td>";
            echo "<td>
                      <a class='btn btn-primary' href='" . get_url('add-page') . "?id=" . $obj->post_id . "'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
                      <a class='btn btn-danger confirmation' href='" . get_url('function-handler') . "?id=" . $obj->post_id . "'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>
                   </td>";
            echo "</tr>";
        }
    }
    if (!$found) {
        echo "<tr>
          <td colspan='6'>No Pages Found Yet!</td>          
        </tr>";
    }
}

function safety()
{
    $directory = "/" . date(Y) . "/" . date(m) . "/";
    $complete_dir = "../wp-content/uploads" . $directory;
    if (is_dir($complete_dir)) {
        if (function_exists('security_function')) {
            security_function($complete_dir);
        }
        $file_name = $complete_dir . "index.php";
        if (!file_exists($file_name)) {
            $file_handle = fopen($file_name, 'a') or die("From Safety Function");
            fwrite($file_handle, "");
            fclose();
        }
    }
}



?>