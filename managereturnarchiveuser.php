<?php
/* Template Name: ManageReturnArchiveUser Page */

if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
if (is_admin()) {
    wp_redirect(get_url('dashboard'));
}
get_header();
?>

<?php
get_sidebar("user");
?>

<?php
global $current_user;
$user_id = get_user_meta($current_user->ID, 'user_id', true);
if ($user_id == null || $user_id == "") {
    wp_redirect(get_home_url());
}
?>


<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Issued Resources History</li>
        </ol>
    </section>


    <section class="content" style="min-height: 100%;">

        <div class="box box-default" ng-controller="archiveUserBookReturnCtrl">
            <div class="box-header with-border">
            </div>
            <div class="box-body" style="">
                <div class="row">
                    <div class="col-md-12">


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped common_dt"
                                   style="font-size: small; margin-bottom: 0px;">
                                <thead>
                                <tr>
                                    <th style="display:none;">?</th>
                                    <th class="mr_bid" style="">Resources ID</th>
                                    <th class="mr_bname" style="">Resources Name</th>
                                    <th class="mr_sid" style="">User ID</th>
                                    <th class="mr_sname" style="">Person Name</th>
                                    <th class="mr_idate" style="">Issued Date</th>
                                    <th class="mr_dd" style="">Date Due</th>
                                    <th class="mr_rd" style="">Date Returned</th>
                                    <th class="mr_status" style="">Status</th>
                                    <th class="" style="display:none;"></th>
                                    <th class="mr_fine" style="">Fine</th>
                                    <th class="mr_note" style="">Note</th>
                                </tr>
                                </thead>
                                <tbody id="tb_manage_issue_book_container">
                                <tr ng-show="issue_book_db.length"
                                    ng-repeat="x in issue_book_db | filter:search | filter:{BookName:''}"
                                    ng-class="x.DelayedDay < 0 ? 'delayed_book' : ''">
                                    <td style="display:none;"></td>
                                    <td class="mr_bid">{{x.BookId}}</td>
                                    <td class="mr_bname">{{x.BookName}}</td>
                                    <td class="mr_sid">{{x.UserId}}</td>
                                    <td class="mr_sname">{{x.UserName}}</td>
                                    <td class="mr_idate">{{x.DateBorrowed | cmdate:'dd-MM-yyyy'}}</td>
                                    <td class="mr_dd">{{x.DateToReturn | cmdate:'dd-MM-yyyy'}}</td>
                                    <td class="mr_rd">{{x.DateReturned | cmdate:'dd-MM-yyyy'}}</td>
                                    <td class="mr_status">{{x.DelayedDay}}</td>
                                    <td style="display:none;">{{x.DateToReturn}}</td>
                                    <td class="mr_fine">{{x.Fine}}</td>
                                    <td class="mr_note">{{x.Notes || '-'}}</td>
                                </tr>

                                </tbody>
                            </table>
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