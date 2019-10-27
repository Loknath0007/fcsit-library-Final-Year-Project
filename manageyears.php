<?php
/* Template Name: ManageYears Page */
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
      <li class="active">Manage Years</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-12 box box-default" ng-controller="saveYearsCtrl">
        <div class="box-header with-border">
        </div>
        <div class="box-body" style="">
          <div class="row">
            <div class="col-md-12 colxs-12">
              <div class="col-md-6 pull-left">
                <form class="form-inline" id="addYearsForm">
                  <table class="table table-condensed" style="margin-bottom: 3px;">
                    <tbody>
                    <tr>
                      <td class="col-md-10 col-xs-10"><input type="text" ng-model="inlineFormYear"
                                                             name="inlineFormYear"
                                                             class="form-control fix_radius"
                                                             id="inlineFormYear" style="width:100%;"
                                                             placeholder="Year Eg: 1st Year" required>
                        <input type="hidden" name="action" value="manageYearForm">
                        <input type="hidden" name="todo" value="add"></td>
                      <td class="col-md-2 col-xs-2">
                        <button ng-click="addYearsbtn()" style="width:100%;"
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
                  <th class="">Years</th>
                  <th class="">Action</th>
                </tr>
                </thead>
                <tbody id="tblBodyYear">

                </tbody>
              </table>


              <div class="modal fade" id="edtModalForm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-body">
                      <input type="text" class="form-control fix_radius" ng-model="edit_year">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary fix_radius pmd-ripple-effect"
                              data-dismiss="modal">Close
                      </button>
                      <button type="button" class="btn btn-primary fix_radius pmd-ripple-effect"
                              ng-click="updatebtn()">Save changes
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
    </div>
  </section>
</div>


<?php
get_footer();
?>	


