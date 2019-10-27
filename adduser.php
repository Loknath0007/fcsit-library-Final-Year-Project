<?php
/* Template Name: AddUser Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>
<?php
get_sidebar();
?>
  <div class="content-wrapper">
    <style>
      .ng-camera-overlay {
        display: none;
      }
    </style>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <section class="content" ng-controller="userProfileAddCtrl">
      <div class="row">
        <div class="col-sm-3 addStudCamera">

          <ng-camera
              output-height="250"
              output-width="250"
              image-format="jpeg"
              jpeg-quality="100"
              action-message="Capture"
              snapshot="vm.picture"
              flash-fallback-url="<?php bloginfo('template_directory'); ?>/js/webcam.swf"
              overlay-url="<?php bloginfo('template_directory'); ?>/img/overlay.png"
              shutter-url="<?php bloginfo('template_directory'); ?>/js/shutter.mp3"
          ></ng-camera>
          <img ng-if="vm.picture" ng-src="{{vm.picture}}" alt="User Pic" style="margin-top: 10%;"
               class="img-responsive"
          >

        </div>
        <div class="col-sm-9">
          <div class="tab-content shadow" style="border: 0;padding:0;">
            <div class="tab-pane active">
              <div class="panel panel-custom">
                <div class="panel-heading">
                  <div class="panel-title">
                    <strong>Add User</strong>
                  </div>
                </div>
                <form class="form-horizontal" id="lib_add_user_profile_form" method="post">
                  <div class="panel-body form-horizontal">
                    <input type="hidden" name="action" value="addUserTodb">
                    <input type="hidden" name="addingBy" value="admin">
                    <input type="hidden" name="photo_code" id="photo_code">
                    <div class="form-group mb0 col-sm-6">

                      <label>First Name</label>

                      <input name="first_name" id="first_name" placeholder="First Name"
                             class="form-control fix_radius" type="text">


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>Last Name</label>

                      <input name="last_name" id="last_name" placeholder="Last Name"
                             class="form-control fix_radius" type="text">


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>Email</label>

                      <input name="email" id="email" tooltips
                             tooltip-template="Make sure you put a proper email as this will be the username of this person & cannot be changed later."
                             placeholder="E-Mail Address" class="form-control fix_radius" type="text">


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>Course Name</label>


                      <select id="course_name" name="course_name"
                              class="form-control selectpicker fix_radius">
                        <option value="">------------Select Course Name------------</option>
                          <?php
                          global $wpdb;
                          $full_data = $wpdb->get_results("select * from tblcourses");
                          foreach ($full_data as $obj) {
                              ?>
                            <option value="<?php echo $obj->Id; ?>"><?php echo $obj->CourseName; ?></option>
                              <?php
                          }
                          ?>
                      </select>


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>Year</label>

                      <select id="year_name" name="year_name"
                              class="form-control selectpicker fix_radius">
                        <option value="">------------Select Course Year------------</option>
                          <?php
                          global $wpdb;
                          $full_data = $wpdb->get_results("select * from tblyears");
                          foreach ($full_data as $obj) {
                              ?>
                            <option value="<?php echo $obj->Id; ?>"><?php echo $obj->YearName; ?></option>
                              <?php
                          }
                          ?>
                      </select>


                    </div>


                    <div class="form-group mb0 col-sm-6">

                      <label>Phone</label>

                      <input name="phone" tooltips
                             tooltip-template="This will be his default password for login."
                             id="phone" placeholder="01XXXXXXXX" id="phone"
                             class="form-control fix_radius" type="text">


                    </div>

                    <div class="form-group mb0 col-sm-12">

                      <label>Address</label>

                      <textarea class="form-control" name="address" id="address" row="2"></textarea>


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>City</label>


                      <input name="city" id="city" placeholder="City" class="form-control fix_radius"
                             type="text">


                    </div>

                    <div class="form-group mb0 col-sm-6">

                      <label>State</label>

                        <?php set_up_states("state", "state"); ?>


                    </div>


                    <div class="form-group mb0 col-sm-6">
                      <label>Zip </label>

                      <input name="zip" id="zip" placeholder="Zip Code"
                             class="form-control fix_radius" type="text">

                    </div>

                    <!-- Future Scope -->
                    <div class="form-group mb0 col-sm-6">
                      <label tooltips
                             tooltip-template="Will be availabe in future update.">Role </label>
                      <input name="role" id="role" value="Student" type="hidden">
                      <select class="form-control" disabled>
                        <option value="Student" selected>Student</option>
                        <option value="Teacher">Teacher</option>
                      </select>

                    </div>

                    <div class="form-group mb0 col-sm-12">
                      <label>Notes</label>

                      <textarea class="form-control fix_radius" id="note_on_user" name="note_on_user"
                                placeholder="Note"></textarea>

                    </div>
                    <div class="form-group mb0 col-sm-12">
                      <button ng-click="addUserbtn()"
                              class="btn btn-danger pull-right  add_btn_user pmd-ripple-effect"><span
                            class="fa fa-floppy-o"></span> Save
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
  </div>
<?php
get_footer();
?>