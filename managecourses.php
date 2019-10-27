<?php
/* Template Name: ManageCourse Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
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
      <li class="active">Manage Courses</li>
    </ol>
  </section>
  <section class="content" style="min-height: 100%;">
    <div class="box box-default" ng-controller="saveCourseCtrl">
      <div class="box-header with-border">
      </div>
      <div class="box-body" style="">
        <div class="row">
          <div class="col-md-12 col-xs-12">

            <div class="col-md-6 pull-left">
              <form class="form-inline" id="addCoursesForm">

                <table class="table table-condensed" style="margin-bottom: 3px;">
                  <tbody>
                  <tr>
                    <td class="col-md-10 col-xs-10"><input type="text" ng-model="inlineFormCourse"
                                                           name="inlineFormCourse"
                                                           class="form-control fix_radius"
                                                           id="inlineFormCourse" style="width:100%;"
                                                           placeholder="Course Eg: SE,MC,NC,CS,IS"
                                                           required>
                      <input type="hidden" name="action" value="manageCourseForm">
                      <input type="hidden" name="todo" value="add"></td>
                    <td class="col-md-2 col-xs-2">
                      <button ng-click="addCoursesbtn()" style="width:100%;"
                              class="btn btn-primary fix_radius">Save
                      </button>
                    </td
                  </tr>
                  </tbody>
                </table>

              </form>
            </div>
            <table class="table table-bordered table-striped"
                   style="font-size: small; margin-bottom: 0px;   padding: 10px;">
              <thead>
              <tr>
                <th class="">Courses</th>
                <th class="">Action</th>
              </tr>
              </thead>
              <tbody id="tblBodyCourse">
              </tbody>
            </table>
            <div class="modal fade" id="edtModalForm" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    <input type="text" class="form-control fix_radius" ng-model="edit_Course">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fix_radius" data-dismiss="modal">
                      Close
                    </button>
                    <button type="button" class="btn btn-primary fix_radius" ng-click="updatebtn()">
                      Save changes
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