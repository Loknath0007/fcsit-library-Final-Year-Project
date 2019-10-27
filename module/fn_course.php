<?php

add_action('wp_ajax_manageCourseForm', 'FuncSaveCourseForm');
add_action('wp_ajax_nopriv_manageCourseForm', 'FuncSaveCourseForm');
function FuncSaveCourseForm()
{
    global $wpdb;
    $inlineFormCourse = sanitize_text_field($_REQUEST["inlineFormCourse"]);
    $todo = sanitize_text_field($_REQUEST["todo"]);
    $id = sanitize_text_field($_REQUEST["id"]);
    if ($todo == "add") {
        $wpdb->query("insert into tblcourses (CourseName) values('" . $inlineFormCourse . "');");
        echo json_encode(array('success' => true, 'msg' => " Entry has been added!", "header" => "Success", 'color' => 'success'));
        wp_die();
    }
    if ($todo == "delete") {
        $wpdb->query("delete from tblcourses where Id=" . $id);
        echo json_encode(array('success' => true, 'msg' => " Entry has been deleted!", "header" => "Success", 'color' => 'success'));
        wp_die();
    }
    if ($todo == "update") {
        $wpdb->query("update tblcourses set CourseName = '" . $inlineFormCourse . "' where Id=" . $id);
        echo json_encode(array('success' => true, 'msg' => " Entry has been updated!", "header" => "Success", 'color' => 'success'));
        wp_die();
    }
}

add_action('wp_ajax_loadCourseForm', 'FuncLoadCourseForm');
add_action('wp_ajax_nopriv_loadCourseForm', 'FuncLoadCourseForm');
function FuncLoadCourseForm()
{
    global $wpdb;
    $full_data = $wpdb->get_results("select * from tblcourses");
    $dynamic_html = "";
    foreach ($full_data as $obj) {
        $dynamic_html .= "<tr>";
        $dynamic_html .= '<td class="text-align:left;">' . $obj->CourseName . '</td>';
        $dynamic_html .= '<td style="text-align:left;">';
        $dynamic_html .= '<button class="btn btn-danger fix_radius pmd-ripple-effect" ng-click="editformbtn(' . $obj->Id . ',\'' . $obj->CourseName . '\')" >Edit</button>&nbsp;';
        $dynamic_html .= '<button class="btn btn-danger fix_radius pmd-ripple-effect" ng-click="delbtn(' . $obj->Id . ')" >Delete</button>';
        $dynamic_html .= '</td>';
        $dynamic_html .= '</tr>';
    }
    echo json_encode(array('success' => true, 'dynamic_html' => $dynamic_html, 'data' => $full_data));
    wp_die();
}


function getCourseName($courseid)
{
    global $wpdb;
    $id = $courseid;
    $temp_data = $wpdb->get_var($wpdb->prepare("select CourseName from tblcourses where Id=" . $id . ";"));
    if ($temp_data != "") {
        return $temp_data;
    }
    return "None";
}

?>