<?php
/* Template Name: ManageCategories Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>

<?php
get_sidebar();
?>

<?php get_template_part('navbar'); ?>

<div class="dash-container">
  <div class="row row_start_tbl">
    <div class="wrapper-profile" style="width: 74%;">
      <div class="" style="padding: 10px;">
        <form class="form-inline">
          <div class="input-group col-md-4">
            <input type="text" class="form-control fix_radius" id="inlineFormCatName"
                   placeholder="Category Name">
          </div>
          <div class="input-group col-md-6">
            <input type="text" class="form-control fix_radius" id="inlineFormCatDesc"
                   placeholder="Category Description">
          </div>
          <button type="submit" class="btn btn-primary fix_radius">Save</button>
        </form>
      </div>
      <table class="table table-bordered table-striped"
             style="font-size: small; margin-bottom: 0px;   padding: 10px;">
        <thead>
        <tr>
          <th style="display:none;">?</th>
          <th class="">Category Name</th>
          <th class="">Category Description</th>
          <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td style="display:none;">1</td>
          <td class="text-align:left;">Information Technology</td>
          <td style="text-align:left;" class="">IT Computers</td>
          <td style="text-align:left;">
            <button class="btn btn-danger fix_radius" contenteditable="false">Edit</button>
            <button class="btn btn-danger fix_radius" contenteditable="false">Delete</button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
get_footer();
?>	