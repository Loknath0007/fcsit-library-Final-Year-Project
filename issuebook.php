<?php
/* Template Name: IssueBookUsers Page */
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
      <li class="active">Issue Resources</li>
    </ol>
  </section>
  <section class="content" style="min-height: 100%;">
    <div class="" ng-controller="issueBookCtrl">
      <div class="box-header with-border">
      </div>
      <div class="box-body" style="">
        <div class="row">
          <div class="col-sm-3">
            <img ng-src="{{vm.picture || '<?php echo get_template_directory_uri() . '/img/270x358.png'; ?>'}}"
                 style="width: 227px;margin: 0 auto;border: 1px solid;" class="img-responsive"
                 alt="Book Cover">
          </div>
          <div class="col-sm-9">
            <form class="form-horizontal" id="lib_issue_book_form">
              <div class="tab-content shadow">
                <div class="tab-pane active">
                  <div class=" panel panel-custom">
                    <div class="panel-heading">
                      <div class="panel-title">
                        <strong>Issue Resources</strong>
                      </div>
                    </div>
                    <div class="panel-body form-horizontal">
                      <input type="hidden" name="action" value="issue_book">

                      <div class="form-group mb0 col-sm-12">

                        <label>Resources No <a class="book_sht"
                                          style="position: absolute;margin-top: -18px;right: -15px;"
                                          target="_blank" tooltips
                                          tooltip-template="Shortcut Manage Books."
                                          tooltip-side="bottom"
                                          href="<?php echo get_url("manage-books"); ?>"><i
                                class="fa fa-link" aria-hidden="true"></i></a></label>

                        <input name="book_no" tooltips
                               tooltip-template="You can find the book no in the Manage Resources section.In real life scenerio those book nos needs to be written behind the book to uniquely identify each Resources."
                               tooltip-side="bottom" id="book_no" ng-model="book_no"
                               ng-change="onBookNoChange()" placeholder="Type Resources NO . Eg:4321603"
                               class="form-control" type="text">

                      </div>


                      <div class="form-group mb0 col-sm-12">

                        <label>Resources 
                          Title</label>

                        <input name="book_title" id="book_title" ng-model="book_title"
                               placeholder="Resources  Title" class="form-control" type="text" disabled>


                      </div>

                      <div class="form-group mb0 col-sm-12">
                        <table class="table table-bordered" ng-show="qty !=null"
                               style="border: 1px solid lightgrey;">
                          <tbody>
                          <tr>
                            <td style="background: beige;">Total Oty</td>
                            <td>{{qty}}</td>
                            <td style="background: beige;">Current Available</td>
                            <td>{{$eval(qty)-$eval(borrowed)}}</td>
                            <td style="background: beige;">Borrowed</td>
                            <td>{{borrowed}}</td>
                          </tr>
                          <tr>
                            <td style="background: beige;">Price</td>
                            <td><?php echo get_option("local_currency", "MYR"); ?> {{price}}</td>
                            <td style="background: beige;">ISBN</td>
                            <td colspan="3">{{isbn}}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div class="form-group mb0 col-sm-12">
                        <label>User Id</label>
                        <input name="user_id" id="user_id" ng-model="user_id"
                               ng-change="user_idChange()" placeholder="Type User ID. Eg : 1001"
                               class="form-control" type="text">
                      </div>


                      <div class="form-group mb0 col-sm-12">

                        <label>Name</label>

                        <input name="user_name" id="user_name" ng-model="user_name"
                               placeholder="Persons Name" class="form-control" type="text" disabled>


                      </div>

                      <div class="form-group mb0 col-sm-12">
                        <table class="table table-bordered" ng-show="phone !=null"
                               style="border: 1px solid lightgrey;">
                          <tbody>
                          <tr>
                            <td style="width: 23%;" rowspan="2"><img
                                  ng-src="{{vm.studpic || '<?php echo get_template_directory_uri() . '/img/146x146.png' ?>'}}"
                                  class="img-thumbnail" alt="User PIc"></td>
                            <td style="background: beige;">Phone</td>
                            <td>{{phone}}</td>
                            <td style="background: beige;">Email</td>
                            <td>{{email}}</td>
                          </tr>
                          <tr>
                            <td style="background: beige;">Address</td>
                            <td colspan="4">{{address}}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>Date Issued</label>

                        <input name="book_date_borrowed" ng-model="book_date_borrowed"
                               id="book_date_borrowed" class="form-control fix_radius" type="text">


                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>By when to Return</label>

                        <input name="book_date_due" ng-model="book_date_due" id="book_date_due"
                               class="form-control fix_radius" type="text">

                      </div>


                      <div class="form-group mb0 col-sm-12">
                        <button type="button" ng-disabled="btn_issue_status"
                                ng-init="btn_issue_status=true" ng-click="issueBookBtn()"
                                class="btn btn-danger pmd-ripple-effect pull-right">
                          <span class="fa fa-floppy-o"></span> Issue Resources
                        </button>

                      </div>

                    </div>
                  </div>
                </div>

            </form>

          </div>
        </div>
      </div>


    </div>
  </section>
</div>


<?php
get_footer();
?>	