<?php
/* Template Name: ManageUsers Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>

<?php
get_sidebar();
?>


<style>
  .ng-camera-overlay {
    display: none;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manage Users</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-default" ng-controller="UserManagementCtrl">
      <div class="box-header with-border">
      </div>
      <div class="box-body" style="">
        <div class="row">
          <div class="col-md-12">
            <div class="" style="padding-bottom:7px;">
              <form class="form-inline">
                <label class="sr-only" for="inlineFormUserID">User ID</label>
                <div class="input-group col-md-2 col-xs-12">
                  <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                          aria-hidden="true"></i>
                  </div>
                  <input type="text" ng-change="onChangeUserId()" ng-model="filter_userId"
                         class="form-control fix_radius" id="inlineFormUserID" placeholder="User ID">
                </div>


                <label class="sr-only" for="inlineFormUserName">Persons Name</label>
                <div class="input-group col-md-3 col-xs-12">
                  <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                          aria-hidden="true"></i>
                  </div>
                  <input type="text" ng-change="onChangeUserName()" class="form-control fix_radius"
                         id="inlineFormUserName" ng-model="filter_userName" placeholder="Persons Name">
                </div>


                <label class="sr-only" for="inlineFormEmailAddress">Email</label>
                <div class="input-group col-md-3 col-xs-12">
                  <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                          aria-hidden="true"></i>
                  </div>
                  <input type="text" ng-change="onChangeEmail()" ng-model="filter_email"
                         class="form-control fix_radius" id="inlineFormEmailAddress"
                         placeholder="Email Address">
                </div>

                <label class="sr-only" for="inlineFormPhone">Phone</label>
                <div class="input-group col-md-3 col-xs-12">
                  <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                          aria-hidden="true"></i>
                  </div>
                  <input type="text" ng-change="onChangePhone()" ng-model="filter_phone"
                         class="form-control fix_radius" id="inlineFormPhone" placeholder="Phone">
                </div>
              </form>

            </div>

            <div style="overflow:auto;">
              <div class="table-responsive">
                <table class="table table-bordered table-striped tbluser mng_stud_tbl"
                       style="font-size: small;margin-bottom: 0px;overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th style="display:none;">?</th>
                    <th style="display:none;">?</th>
                    <th style="width: 46px;">ID</th>
                    <th class="">Name</th>
                    <th style="width: 162px;">Email Address</th>
                    <th class="">Phone</th>
                    <th style="width: 188px;">Street Address</th>
                    <th class="">Course</th>
                    <th class="">Years</th>
                    <th class="">D.A</th>
                    <th class="" style="width: 160px;">Action</th>
                  </tr>
                  </thead>
                  <tbody id="user_container">

                  </tbody>
                </table>
              </div>
            </div>

            <div style="float: right;display: none;">
              <nav>
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <button class="btn btn-default fix_radius" tabindex="-1"
                            ng-click="btn_previous()"><i class="fa fa-chevron-left"
                                                         aria-hidden="true"></i> Previous
                    </button>
                  </li>
                  <li class="page-item">
                    <button class="btn btn-default fix_radius" ng-model="next_btn"
                            ng-click="btn_next()">Next <i class="fa fa-chevron-right"
                                                          aria-hidden="true"></i></button>
                  </li>
                </ul>
              </nav>
            </div>


            <div class="modal fade" id="editUserModel" tabindex="-1" role="dialog"
                 aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog lg-modal edit_user_modal" style="width: 70%;">
                <div class="modal-content fix_radius">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                          aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title" id="lineModalLabel">Edit User</h3>
                  </div>
                  <div class="modal-body" style="padding-top: 10px;    padding-right: 35px;">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="tab-content shadow">
                          <div class="tab-pane active">
                            <div class=" panel panel-custom">
                              <div class="panel-heading">
                                <div class="panel-title">
                                  <strong>Take a pic</strong>
                                </div>
                              </div>
                              <div class="panel-body form-horizontal">
                                <div class="form-group mb0 col-sm-4">
                                  <label>Camera</label>
                                  <ng-camera
                                      output-height="263"
                                      output-width="308"
                                      image-format="jpeg"
                                      jpeg-quality="100"
                                      action-message="Capture"
                                      snapshot="vm.picture"
                                      flash-fallback-url="<?php bloginfo('template_directory'); ?>/js/webcam.swf"
                                      overlay-url="<?php bloginfo('template_directory'); ?>/img/overlay.png"
                                      shutter-url="<?php bloginfo('template_directory'); ?>/js/shutter.mp3"

                                  ></ng-camera>
                                </div>

                                <div class="form-group mb0 col-sm-4">
                                  <label>Old Pic</label>
                                  <img style="width: 100%;height: 229px; margin-top: 15px;" ng-if=" vm.oldpicture"
                                       ng-src="{{vm.oldpicture}}" alt="User Pic"
                                       class="img-responsive">
                                </div>

                                <div class="form-group mb0 col-sm-4">
                                  <label>New Pic will Appear here</label>
                                  <img ng-if="vm.picture" ng-src="{{vm.picture}}"
                                       ng-model="user_pic" alt="User Pic"
                                       class="img-responsive" style="width: 100%;height: 229px; margin-top: 15px;">
                                  <img
                                      ng-src="<?php echo get_template_directory_uri() . '/img/avatar_new.png'; ?>"
                                      ng-show="vm.picture ==''" class="img-responsive"
                                      style="width: 100%;height: 229px; margin-top: 15px;">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12"
                      >
                        <form class="form-horizontal" id="lib_edit_user_profile_form">
                          <div class="tab-content shadow">
                            <div class="tab-pane active">
                              <div class=" panel panel-custom">
                                <div class="panel-heading">
                                  <div class="panel-title">
                                    <strong>Update Details</strong>
                                  </div>
                                </div>
                                <div class="panel-body form-horizontal">
                                  <input type="hidden" name="action" value="updateUserTodb">
                                  <input type="hidden" name="photo_code" id="photo_code">
                                  <input type="hidden" name="old_pic_id" id="old_pic_id">
                                  <input type="hidden" name="user_id" id="user_id">
                                  <div class="form-group mb0 col-sm-6">
                                    <label>First Name</label>

                                    <input name="first_name" id="first_name"
                                           ng-model="first_name" placeholder="First Name"
                                           class="form-control" type="text">


                                  </div>


                                  <div class="form-group mb0 col-sm-6">
                                    <label>Last Name</label>
                                    <input name="last_name" id="last_name"
                                           ng-model="last_name" placeholder="Last Name"
                                           class="form-control" type="text">

                                  </div>


                                  <div class="form-group mb0 col-sm-6">
                                    <label>Email</label>

                                    <input name="email" id="email" ng-model="email"
                                           placeholder="E-Mail Address" class="form-control"
                                           type="text" readonly>

                                  </div>


                                  <div class="form-group mb0 col-sm-6">
                                    <label>Phone</label>

                                    <input name="phone" id="phone" ng-model="phone"
                                           placeholder="9876543210" id="phone"
                                           class="form-control" type="text">

                                  </div>


                                  <div class="form-group mb0 col-sm-6">
                                    <label>Course
                                      Name</label>

                                    <select name="course_name" id="course_name"
                                            ng-model="course_name"
                                            class="form-control selectpicker">
                                      <option value="">------------Select Course
                                        Name------------
                                      </option>
                                        <?php
                                        global $wpdb;
                                        $full_data = $wpdb->get_results("select * from tblcourses");
                                        foreach ($full_data as $obj) {
                                            ?>
                                          <option
                                              value="<?php echo $obj->Id; ?>"><?php echo $obj->CourseName; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                  </div>


                                  <div class="form-group mb0 col-sm-6">
                                    <label>Year Name</label>
                                    <select name="year_name" id="year_name"
                                            ng-model="year_name"
                                            class="form-control selectpicker">
                                      <option value="">------------Select Course
                                        Year------------
                                      </option>
                                        <?php
                                        global $wpdb;
                                        $full_data = $wpdb->get_results("select * from tblyears");
                                        foreach ($full_data as $obj) {
                                            ?>
                                          <option
                                              value="<?php echo $obj->Id; ?>"><?php echo $obj->YearName; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                  </div>

                                  <div class="form-group mb0 col-sm-6">

                                    <label>City</label>


                                    <input name="city" id="city" ng-model="city"
                                           placeholder="City" class="form-control"
                                           type="text">


                                  </div>

                                  <div class="form-group mb0 col-sm-6">

                                    <label>State</label>

                                      <?php set_up_states("state", "state_name"); ?>


                                  </div>

                                  <div class="form-group mb0 col-sm-6">
                                    <label>Zip</label>

                                    <input name="zip" id="zip" ng-model="zip"
                                           placeholder="Zip Code" class="form-control"
                                           type="text">

                                  </div>
                                  <div class="form-group mb0 col-sm-6">
                                    <label>Role </label>
                                    <input type="hidden" name="role" id="role" value="Student">
                                    <select class="form-control selectpicker fix_radius" disabled>
                                      <option value="Student" selected>Student</option>
                                      <option value="Teacher">Teacher</option>
                                    </select>

                                  </div>
                                  <div class="form-group mb0 col-sm-12">
                                    <label>Address</label>
                                    <textarea name="address" id="address" ng-model="address"
                                              class="form-control"></textarea>
                                  </div>


                                  <div class="form-group mb0 col-sm-12">
                                    <label>Note</label>

                                    <textarea class="form-control" id="note_on_user"
                                              rows="2" ng-model="note_on_user"
                                              name="note_on_user"
                                              placeholder="Note"></textarea>

                                  </div>


                                  <div class="form-group mb0 col-sm-12">
                                    <button ng-click="updateUserbtn()"
                                            class="btn btn-danger pull-right fix_radius pmd-ripple-effect">
                                      <span class="fa fa-floppy-o"></span> Save
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

            </div>


            <div class="modal fade" id="printUserIdModal" tabindex="-1" role="dialog"
                 aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog lg-modal" style="width:72%;">
                <div class="modal-content fix_radius">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                          aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title" id="lineModalLabel">Identity Card</h3>
                  </div>
                  <div class="modal-body" style="">

                    <div class="row">
                      <div style="padding-left: 14px;">
                        <div class="panel panel-default" style="font-size: 12px;"
                             id="print_Container">
                          <table id="p_tbl1" class="table table-striped"
                                 style="width: 49%;float: left;table-layout: fixed;border: 1px solid black;height: 330px;">
                            <tbody>
                            <tr>
                              <td id="p_img_td" rowspan="8"
                                  style="width: 186px;border-right: 1px solid lightgrey;">
                                <img
                                    ng-src="{{ printScope.srcPic ||'<?php echo get_template_directory_uri() . '/img/avatar.png'; ?>'}}"
                                    class="img-rounded" alt="User Pic"
                                    style="width: 169px;height: 156px;">
                                <div style="margin-top: 7px;">
                                  <span style="font-size: 15px;font-weight: 700;">STAMP :</span>
                                  <div id="p_stamp"
                                       style="height: 128px;border: 1px solid;"></div>
                                </div>
                              </td>
                              <td style="background-color: beige;padding-bottom: 0px;height: 42px;">
                                <h3 style="text-align:center;font-weight: bold;margin: 2px;margin-bottom: -4px;">
                                  Library Card</h3>

                              </td>
                            </tr>
                            <tr style="padding: 0px;height: 25px;padding-top: 6px;padding-left: 8px;">
                              <td style="font-family: -webkit-body;text-align: center;background-color: aliceblue;text-decoration: underline;text-transform: uppercase;font-weight: bold;"><?php echo get_option('inst_name'); ?></td>
                            </tr>
                            <tr style="padding: 0px;height: 25px;padding-top: 6px;padding-left: 8px;">
                              <td><?php echo get_option('inst_address') ?></td>
                            </tr>
                            <tr>
                              <td>ID : <span style="font-weight: 700;">{{printScope.user_id}}</span>
                              </td>
                            </tr>
                            <tr>
                              <td>Name : {{printScope.name}}</td>
                            </tr>
                            <tr>
                              <td>Phone : {{printScope.phone}}</td>
                            </tr>
                            <tr ng-show="printScope.role=='Student'">
                              <td>Course : {{printScope.course_name}} | Year :
                                {{printScope.year_name}}
                              </td>
                            </tr>
                            <tr ng-show="printScope.role=='Teacher'">
                              <td>Designation : {{printScope.role}}
                              </td>
                            </tr>
                            <tr>
                              <td>YEAR :</td>
                            </tr>
                            </tbody>
                          </table>

                          <table id="p_tbl2" class="table table-striped"
                                 style="width: 50%;float:right;margin-right: 6px;table-layout: fixed;border: 1px solid black;height: 330px;">
                            <tbody>
                            <tr>
                              <td>Email : {{printScope.email}}</td>
                            </tr>
                            <tr>
                              <td>Address : {{printScope.address}}</td>
                            </tr>
                            <tr>
                              <td>
                                <span style="text-align:left;font-weight: 700;">Instruction</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <ul class="list-group" style="margin-bottom: -1px;">
                                    <?php
                                    $instustions_raw = get_option("inst_in_cards", "The holder of this card is register user of FCSIT UNIMAS.,By this registeration the holder agreeds to abide by the Rules and Regulation of the Institute.,The Card is for personal use and it is not transfareble., Finder of the lost card are asked to return them to the Program Admin Office at the above address.,Only 10 books can be borrowed on this card.,RM 10 will be be charged if this card is lost.,Resources will be issued only on presense of this card.");
                                    $lst_inst = explode(",", $instustions_raw);
                                    for ($i = 0; $i < count($lst_inst); $i++) {
                                        ?>
                                      <li class="list-group-item"
                                          style="padding: 2px 15px !important;"><?php echo ($i + 1) . '. ' . $lst_inst[$i]; ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                              </td>
                            </tr>
                            </tbody>
                          </table>


                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pmd-ripple-effect"
                            ng-click="printPreview()">Print
                    </button>
                  </div>
                </div>
              </div>
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