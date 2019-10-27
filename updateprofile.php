<?php
/* Template Name: UpdateProfile Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>


<?php
global $current_user;
$userID = $current_user->ID;
$user_login = $current_user->user_login;
$fname = get_the_author_meta('lib_fname', $userID);
$lname = get_the_author_meta('lib_lname', $userID);
$phone = get_the_author_meta('phone', $userID);
$email = get_the_author_meta('email', $userID);
$address = get_the_author_meta('address', $userID);
$city = get_the_author_meta('city', $userID);
$state = get_the_author_meta('states', $userID);
$zip = get_the_author_meta('zip', $userID);
$photo_id = get_the_author_meta('pic_id', $userID);
$blood_group = get_the_author_meta('blood_group', $userID);
?>
<?php
get_sidebar();
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update My Profile</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <form id="lib_update_profile_form" enctype="multipart/form-data" method="post">
        <div class="col-sm-3">
          <img id="img_profile_pic_temp"
               ng-src="{{'<?php echo wp_get_attachment_image_src($photo_id, "full")[0]; ?>' || '<?php echo get_template_directory_uri() . '/img/avatar.png'; ?>'}}"
               class="img-responsive" width="100%" style="background-color: white;" alt="Admin Profile"
               width="100%">
          <div style="padding-top: 10px;">
            <input type="file" name="upload_image" id="upload_image" class="form-control">
          </div>
        </div>
        <div class="col-sm-9" ng-controller="changeProfileDataCtrl">
          <div class="tab-content shadow" style="border: 0;padding:0;">
            <div class="tab-pane active">
              <div class="panel panel-custom">
                <div class="panel-heading">
                  <div class="panel-title">
                    <strong>Update Details</strong>
                  </div>
                </div>
                <div class="panel-body form-horizontal">
                  <input type="hidden" name="action" value="update_lib_profile">
                  <div class="form-group mb0 col-sm-6">
                    <label>First Name</label>
                    <input name="fname" id="fname" placeholder="First Name" class="form-control"
                           value="<?php echo $fname; ?>" type="text">
                  </div>


                  <div class="form-group mb0 col-sm-6">
                    <label>Last Name</label>
                    <input name="lname" id="lname" placeholder="Last Name" class="form-control"
                           value="<?php echo $lname; ?>" type="text">
                  </div>

                  <div class="form-group mb0 col-sm-6">
                    <label>Email</label>
                    <input name="email" id="email" placeholder="E-Mail Address"
                           value="<?php echo $email; ?>" class="form-control" type="text"
                           readonly="readonly">
                  </div>


                  <div class="form-group mb0 col-sm-6">
                    <label>Phone</label>
                    <input name="phone" id="phone" placeholder="01XXXXXX" value="<?php echo $phone; ?>"
                           class="form-control" type="text">
                  </div>


                  <div class="form-group mb0 col-sm-6">
                    <label>City</label>
                    <input name="city" id="city" placeholder="City" class="form-control"
                           value="<?php echo $city; ?>" type="text">
                  </div>


                  <div class="form-group mb0 col-sm-6">
                    <label>State</label>
                      <?php set_up_states("state", "state"); ?>
                  </div>


                  <div class="form-group mb0 col-sm-6">
                    <label>Zip</label>
                    <input name="zip" id="zip" placeholder="Zip Code" value="<?php echo $zip; ?>"
                           class="form-control" type="text">
                  </div>

                  <div class="form-group mb0 col-sm-6">
                    <label>Blood Group</label>
                    <input name="blood_group" id="blood_group" placeholder="Blood Group"
                           value="<?php echo $blood_group; ?>"
                           class="form-control" type="text">
                  </div>


                  <div class="form-group mb0 col-sm-12">
                    <label>Address</label>
                    <textarea name="address" id="address" row="3" placeholder="Address"
                              class="form-control"><?php echo $address; ?></textarea>
                  </div>

                  <div class="form-group mb0 col-sm-12">
                    <button ng-click="updateProfile()"
                            class="btn btn-primary fix_radius pull-right pmd-ripple-effect"><span
                          class="fa fa-floppy-o"></span>&nbsp;Save
                    </button>

                  </div>


                </div>
              </div>
            </div>

          </div>

        </div>
      </form>
    </div>
  </section>
</div>


<?php
get_footer();
?>
<!-- Adding Javascript -->
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    $("#state").val("<?php echo $state; ?>");
  });
</script>	