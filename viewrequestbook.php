<?php
/* Template Name: ViewRequestBook Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>


<?php
global $current_user;
$userID = $current_user->ID;
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
      <li class="active">Request Resources</li>
    </ol>
  </section>


  <section class="content" style="min-height: 100%;">


    <div class="box box-default">
      <div class="box-header with-border">

      </div>

      <div class="box-body" style="">
        <div class="row">

          <div class="col-md-12" ng-controller="viewrequestBookCtrl">
            <div class="table-responsive">
              <table class="table table-bordered table-striped tbluser tblviewrequestbook"
                     style="font-size: small;margin-bottom: 0px;overflow-x: scroll;">
                <thead>
                <tr>
                  <th style="display:none;">?</th>
                  <th class="vrb_bname">Resources Name</th>
                  <th class="vrb_burl">Resources Url</th>
                  <th class="vrb_bdesc" style="width: 45%;">Resources Desc</th>
                  <th class="vrb_sid">User ID</th>
                  <th class="vrb_sname">Persons Name</th>
                  <th class="vrb_likes">Likes (<?php echo get_option('people_to_approve'); ?>)</th>
                  <th class="vrb_addedon">Added On</th>
                  <th class="vrb_action" style="width: 110px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="x in request_dataset" ng-class="{'approved_book': x.Approved==1}">
                  <td style="display:none;">{{x.Id}}</td>
                  <td class="vrb_bname">{{x.BookName}}</td>
                  <td class="vrb_burl"><a href="{{x.BookUrl}}" target="_blank">Visit</a></td>
                  <td class="vrb_bdesc">{{x.Notes}}</td>
                  <td class="vrb_sid">{{x.UserId}}</td>
                  <td class="vrb_sname">{{x.UserName}}</td>
                  <td class="vrb_likes">{{x.Likes}}</td>
                  <td class="vrb_addedon">{{x.DateAdded}}</td>
                  <td class="vrb_action">
                    <button ng-show="{{x.Approved==0}}" class="btn btn-success"
                            ng-click="approve(x)"><i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                    <button ng-show="{{x.Approved==1}}" class="btn btn-warning"
                            ng-click="dissapprove(x)"><i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger" ng-click="delete(x)"><i class="fa fa-trash"
                                                                           aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr ng-show="request_dataset.length==0">
                  <td colspan="9">No request yet.</td>
                </tr>


                </tbody>
              </table>
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
<!-- Adding Javascript -->
<script type="text/javascript">
  jQuery(document).ready(function ($) {


  });
</script>	