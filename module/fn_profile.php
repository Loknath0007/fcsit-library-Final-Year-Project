<?php
// [ Profile Updating Form Saving ]
add_action('wp_ajax_update_lib_profile', 'FuncUpdateProfile');
add_action('wp_ajax_nopriv_update_lib_profile', 'FuncUpdateProfile');
function FuncUpdateProfile()
{
    global $current_user;
    $lib_fname = sanitize_text_field($_REQUEST["fname"]);
    $lib_lname = sanitize_text_field($_REQUEST["lname"]);
    $lib_email = sanitize_text_field($_REQUEST["email"]);
    $lib_phone = sanitize_text_field($_REQUEST["phone"]);
    $lib_address = sanitize_text_field($_REQUEST["address"]);
    $lib_city = sanitize_text_field($_REQUEST["city"]);
    $lib_state = sanitize_text_field($_REQUEST["state"]);
    $lib_zip = sanitize_text_field($_REQUEST["zip"]);
    if (isset($_FILES['upload_image']) && !empty($_FILES['upload_image']['name']) && $_FILES['upload_image']['size'] > 0) {
        update_user_meta($current_user->ID, 'pic_id', upload_image("upload_image", 0));
    }
    $lib_blood_group = sanitize_text_field($_REQUEST["blood_group"]);
    update_user_meta($current_user->ID, 'lib_fname', $lib_fname);
    update_user_meta($current_user->ID, 'lib_lname', $lib_lname);
    update_user_meta($current_user->ID, 'email', $lib_email);
    update_user_meta($current_user->ID, 'phone', $lib_phone);
    update_user_meta($current_user->ID, 'address', $lib_address);
    update_user_meta($current_user->ID, 'city', $lib_city);
    update_user_meta($current_user->ID, 'states', $lib_state);
    update_user_meta($current_user->ID, 'zip', $lib_zip);
    update_user_meta($current_user->ID, 'blood_group', $lib_blood_group);
    echo json_encode(array('success' => true, 'msg' => "Profile has been updated successfully!", "header" => "OK", 'color' => 'success'));
    wp_die();
}

?>