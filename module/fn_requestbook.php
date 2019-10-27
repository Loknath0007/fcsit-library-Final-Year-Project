<?php

// Function For Saving Other Settings
add_action('wp_ajax_request_book', 'SaveRequestBook');
add_action('wp_ajax_nopriv_request_book', 'SaveRequestBook');
function SaveRequestBook()
{
    global $current_user, $wpdb;
    $book_name = sanitize_text_field($_REQUEST["book_name"]);
    $book_url = sanitize_text_field($_REQUEST["book_url"]);
    $note_on_book = sanitize_text_field($_REQUEST["note_on_book"]);
    $user_id = get_the_author_meta("user_id", $current_user->ID);
    $user_name = get_the_author_meta('user_name', $current_user->ID);


    // $temp_check = $wpdb->get_var($wpdb->prepare("select count(*) as count from tblrequests where BookName like '%".$book_isbn."%'"));
    $sql_fire = "insert into tblrequests (BookName,BookUrl,Notes,UserId,UserName,Likes,Likedby,DateAdded) values('" . $book_name . "','" . $book_url . "','" . $note_on_book . "'," . $user_id . ",'" . $user_name . "',1,'" . $user_id . "',CURDATE())";
    $wpdb->query($sql_fire);
    echo json_encode(array('success' => true, "msg" => "Request has been submitted.", "header" => "OK", 'color' => 'success'));
    wp_die();
}


add_action('wp_ajax_getAllRequestBookNotAppovedCnt', 'getAllRequestBookNotAppovedCnt');
add_action('wp_ajax_nopriv_getAllRequestBookNotAppovedCnt', 'getAllRequestBookNotAppovedCnt');
function getAllRequestBookNotAppovedCnt()
{
    global $wpdb;
    $full_data = $wpdb->get_results("select count(*) as cnt from tblrequests where Approved=0");
    //if($full_data==""){$full_data="0";}
    echo json_encode(array("success" => true, "data" => $full_data));
    wp_die();
}

add_action('wp_ajax_getAllRequestBook', 'getAllRequestBook');
add_action('wp_ajax_nopriv_getAllRequestBook', 'getAllRequestBook');
function getAllRequestBook()
{
    global $wpdb;
    $full_data = $wpdb->get_results("select * from tblrequests");
    //if($full_data==""){$full_data="0";}
    echo json_encode(array("success" => true, "data" => $full_data));
    wp_die();
}

add_action('wp_ajax_manageRequestBook', 'manageRequestBook');
add_action('wp_ajax_nopriv_manageRequestBook', 'manageRequestBook');
function manageRequestBook()
{
    global $wpdb;
    $todo = sanitize_text_field($_REQUEST["todo"]);
    $id = sanitize_text_field($_REQUEST["id"]);
    $sql_fire = "";
    if ($todo == "delete") {
        $sql_fire = "delete from tblrequests where Id =" . $id;
    } elseif ($todo == "approve") {
        $sql_fire = "update tblrequests set Approved=1 where Id=" . $id;
    } else {
        $sql_fire = "update tblrequests set Approved=0 where Id=" . $id;
    }
    $wpdb->query($sql_fire);
    echo json_encode(array('success' => true, "msg" => "Action has been completed.", "header" => "OK", 'color' => 'success'));
    wp_die();
}

add_action('wp_ajax_electRequestBook', 'electRequestBook');
add_action('wp_ajax_nopriv_electRequestBook', 'electRequestBook');
function electRequestBook()
{
    global $current_user, $wpdb;
    $id = sanitize_text_field($_REQUEST["id"]);
    $user_id = get_the_author_meta("user_id", $current_user->ID);
    $temp_sql = "select count(*) as count from tblrequests where Likedby like '%" . $user_id . "%' and Id=" . $id;
    $is_there = $wpdb->get_row($temp_sql);
    if ($is_there->count == 0) {
        $sql_fire = "update tblrequests set Likes=Likes+1,LikedBy=CONCAT(LikedBy,', " . $user_id . "') where Id=" . $id;
        $wpdb->query($sql_fire);
        echo json_encode(array('success' => true, "msg" => "Action has been completed.", "header" => "OK", 'color' => 'success'));
        wp_die();
    } else {
        echo json_encode(array('success' => true, "msg" => "It seems like you have already voted.", "header" => "Info", 'color' => 'info'));
        wp_die();
    }
}


?>