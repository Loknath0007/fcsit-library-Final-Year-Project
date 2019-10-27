<?php /* Template Name: FunctionHandler Page */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: Loknath
 * Date: 01/01/2019
 * Time: 7:57 PM
 */
if (isset($_GET)) {
    if (isset($_GET["id"])) {
        if (is_numeric($_GET["id"])) {
            wp_delete_post($_GET["id"], true);
        }
        $clean_url = explode('?', $_SERVER['HTTP_REFERER'])[0];
        header("Location: " . $clean_url);
        die();
    }
}
?>