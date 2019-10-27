<?php
/* Template Name: ForgotPassword Page */
get_header(); ?>

<?php
if (is_user_logged_in()) {
    wp_redirect(get_permalink(2));
}
?>
  <style type="text/css">
    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
      background-color: #fff;
    }
  </style>
  <div class="loginmodal-container" ng-controller="forgotPasswordCtrl">

    <h1> FCSIT Library Management</h1><br>
    <div>
      <span style="font-size: 17px;font-weight: bold;">Change Password</span>
    </div>
    <hr style="border-top: 2px solid #eee;"/>

    <form id="frmForgotPassword">

      <p class="login-username">
        <label for="user_login">Username or Email Address</label>
        <input type="text" name="log" id="user_email" class="form-control fix_radius" value="" size="20"
               ng-model="user_email">
      </p>


      <p class="login-submit">
        <button type="button" ng-click="btn_GetPassword()"
                class="btn btn-primary form-control fix_radius pmd-ripple-effect"><span
              class="fa fa-floppy-o"></span>&nbsp;Send Password
        </button>
      </p>


      <div class="login-help">
        <a href="<?php echo get_home_url(); ?>">Login</a> - <a href="#">Forgot Password</a>
      </div>
  </div>


<?php get_footer(); ?>