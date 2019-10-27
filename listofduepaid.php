<?php
/* Template Name: ManageOnlineDues Page */
/**
 * Created by PhpStorm.
 * User: Loknath
 * Date: 25/01/2019
 * Time: 6:17 PM
 */
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
        <li class="active">List Of Dues Paid Books</li>
      </ol>
    </section>


    <section class="content" style="min-height: 100%;">


      <div class="box box-default" ng-controller="duepaidCtrl">
        <div class="box-header with-border">

        </div>

        <div class="box-body" style="">
          <div class="row">
            <div class="col-md-12">
              <span><b>Note : </b>This page is used to approve the due payment which the user makes online & only approve the payment if he return the book/s to you.After you approve his/her payment the book gets added back to the system. Note this action is irreversible.</span>
              <div class="table-responsive">
                <table class="table table-bordered mng_dues_cls"
                >
                  <thead>
                  <tr>
                    <th style="display:none;">?</th>
                    <th class="">TxnId</th>
                    <th class="">Bank Ref No</th>
                    <th class="">Payed Amount</th>
                    <th class="">Payment Status</th>
                    <th class="">BookId</th>
                    <th class="">UserId</th>
                    <th class="">Issued Date</th>
                    <th class="">Due Date</th>
                    <th class="">PayedForDays</th>
                    <th class="">Mode</th>
                    <th class="">Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tb_managedue_container">
                  <tr ng-repeat="x in due_lst">
                    <td style="display: none;">{{x.Id}}</td>
                    <td>{{x.TxnId}}</td>
                    <td>{{x.BankRefNo}}</td>
                    <td>{{x.PayedAmount}}</td>
                    <td>{{x.PaymentStatus}}</td>
                    <td>{{x.BookId}}</td>
                    <td>{{x.UserId}}</td>
                    <td>{{x.IssuedDate}}</td>
                    <td>{{x.DateDue}}</td>
                    <td>{{x.PayedForDays}}</td>
                    <td>{{x.PaymentMode}}</td>
                    <td>{{x.CreatedTime}}</td>
                    <td>
                      <button ng-disabled="x.ApprovedStatus=='Approved'" ng-click="updateStatus(x)"
                              class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </td>
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