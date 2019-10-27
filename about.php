<?php
/* Template Name: AboutSoftware Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>
<?php
if (current_user_can('administrator')) {
    get_sidebar();
} else {
    get_sidebar("user");
}
?>
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Us</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-default" ng-controller="AddBookCtrl">
        <div class="box-header with-border">
        </div>
        <div class="box-body" style="">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-3 update_prof_left" style="min-height: 270px;">
                <div class="img-container abt_img_container">
                  <img src="<?php echo get_template_directory_uri() . '/img/logo_software.png' ?>"
                       class="img-thumbnail" alt="About Software" style="height: 235px;width:100%;">
                </div>
              </div>
              <div class="col-md-9 form_profile update_prof_right">
                <p class="abt_us_p">This software was designed for library purpose only for FCSIT UNIMAS. This system can
                  be able to speed-up the proccess of borrowing of books, searching of books, Availability of FCSIT resources online and 
                  monitoring of due and borrowed books in the FCSIT LIBRARY.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </section>
  </div>
<?php
get_footer();
?>