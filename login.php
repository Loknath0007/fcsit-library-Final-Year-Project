<?php
/* Template Name: Login Page */
//echo is_user_logged_in();
if (is_user_logged_in()) {
    //echo " bhai hello " . get_permalink(get_page_by_path('dashboard'));
    wp_redirect(get_permalink(get_page_by_path('dashboard')));
    exit;
}
?>
<?php get_header(); ?>


  <div class="loginmodal-container pmd-z-depth-4">
    <div style="width: 100%;text-align: -webkit-right;"><a
          style="color: blue;font-size: 15px;text-decoration: underline;"
          href="<?php echo get_site_url(); ?>">Back</a></div>
      <?php
      if (isset($_GET["login"])) {
          $status = $_GET['login'];
          if ($status == 'failed') {
              ?>
            <div style="margin: -13px;
        padding: 11px;
        background-color: #616060;
        color: white;
        font-weight: bold;
        margin-top: 8px;
        margin-bottom: 5px;">
                <?php
                echo "Login Failed.";
                ?>
            </div>
              <?php
          }
      }
      ?>


      <?php
      if (isset($_GET["login"])) {
          $status = $_GET['login'];
          if ($status == 'disabled') {
              ?>
            <div style="margin: -18px;
          padding: 11px;
          background-color: #616060;
          color: white;
          font-weight: bold;
          margin-top: -5px;
          margin-bottom: 5px;">
                <?php
                echo "Login Disabled.";
                ?>
            </div>
              <?php
          }
      }
      ?>


    <h1>FCSIT Library Management</h1><br>

      <?php $args = array(
          'redirect' => get_permalink(get_page_by_path('dashboard')));
      wp_login_form($args);
      ?>

    <div class="login-help">
      <a href="<?php echo get_permalink(get_page_by_path('forgot-password')); ?>">Forgot Password</a>
    </div>
    
  </div>


  </div>
  </body>
  </html>
  