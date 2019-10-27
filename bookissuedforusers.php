<?php
/* Template Name: ManagedIssuedBookUsers Page */
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


<div class="content-wrapper" ng-controller="managementofissuedbooksUserCtrl">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">My Issued Resources List</li>
    </ol>
  </section>


  <section class="content" style="min-height: 100%;">

    <div class="box box-default">
      <div class="box-header with-border">

      </div>

      <div class="box-body" style="">
        <div class="row">
          <div class="col-md-12">
              <?php
              global $current_user;
              $user_id = get_user_meta($current_user->ID, 'user_id', true);
              if ($user_id == null || $user_id == "") {
                  wp_redirect(get_home_url());
              }
              ?>
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">

            <table class="table table-bordered table-striped"
                   style="font-size: small; margin-bottom: 0px;   padding: 10px;">
              <thead>
              <tr>
                <th style="display:none;">?</th>
                <th ng-show="<?php echo get_option("do_online_payment"); ?>">Action</th>
                <th style="">Resources ID</th>
                <th style="">Resources Name</th>
                <th style="width: 187px;">Resources Desc</th>
                <th style="">User ID</th>
                <th style="">Person Name</th>
                <th style="">Issued Date</th>
                <th style="">Date Due</th>
                <th style="">Days To Go</th>

              </tr>
              </thead>
              <tbody id="tb_manage_issue_book_container">
              <tr ng-show="issue_book_db.length"
                  ng-repeat="x in issue_book_db | filter:{UserId : AjUserId} | filter:query as results"
                  ng-class="{delayed_book: classMng(x.DateToReturn)}">
                <td style="display:none;"></td>
                <td ng-show="<?php echo get_option("do_online_payment"); ?>">
                  <button ng-show="diffDate(x.DateToReturn) < 0 && x.ApprovedStatus==null && x.PaymentStatus==null"
                          ng-click="openPaymentPage(x)" class="btn btn-primary">
                    Pay Due
                  </button>
                  <span ng-show="diffDate(x.DateToReturn) >= 0">None</span>
                  <span ng-show="x.PaymentStatus=='Success'">Due Paid <br/><span
                        style="font-size: 11px;color: green;font-weight: bold;"
                        ng-show="x.ApprovedStatus=='NotApproved'">Waiting Approval <br/>
                    <i ng-show="x.ApprovedStatus=='NotApproved'" class="fa fa-info-circle" aria-hidden="true" tooltips
                       tooltip-template="<?php echo get_option('waiting_approval_msg'); ?>"
                       tooltip-side="bottom"></i>
                    </span></span>

                  <span ng-show="x.PaymentStatus!='Success' && x.PaymentStatus!=null">Payment failed<br/>
                  <i class="fa fa-info-circle" aria-hidden="true" tooltips
                     tooltip-template="Something is not right.If you have made the payment you can contact the admin for further queries."
                     tooltip-side="bottom"></i>
                  </span>


                </td>
                <td>{{x.BookId}}</td>
                <td>{{x.BookName}}</td>
                <td>{{x.BookDesc}}</td>
                <td>{{x.UserId}}</td>
                <td>{{x.UserName}}</td>
                <td>{{x.DateBorrowed | cmdate:'dd-MM-yyyy'}}</td>
                <td>{{x.DateToReturn | cmdate:'dd-MM-yyyy'}}</td>
                <td>{{diffDate(x.DateToReturn)}}</td>


              </tr>

              <tr ng-show="!results.length">
                <td colspan="9" style="text-align:center;">No Resources has been issued yet!.</td>
              </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="box-footer">
      </div>
    </div>
  </section>


  <div class="modal fade" id="paymentStep1" tabindex="-1" role="dialog"
       aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog lg-modal" style="width:40%;">
      <div class="modal-content fix_radius">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span
                aria-hidden="true">×</span><span class="sr-only">Close</span>
          </button>
          <h3 class="modal-title" id="lineModalLabel">Payment Details</h3>
        </div>
        <div class="modal-body" style="padding-top: 10px;padding-right: 35px;">
          <div class="row">
            <table class="table table-bordered" style="margin: 0 auto; margin-left: 2%;">
              <form method="post" action="<?php echo get_url("preview-due"); ?>" target="_blank">
                <!--          <form method="post" action="http://www.ricomart.com/test_lib/resubmitter.php"-->
                <!--                    target="_blank">-->
                <input type="hidden" id="currency" name="currency"
                       value="<?php echo get_option("payment_currency_code", "INR"); ?>"/>
                <input type="hidden" id="order_id" name="order_id"
                       value="<?php echo str_replace(array(".", ":"), "", $_SERVER['REMOTE_ADDR']); ?>" / >
                <input type="hidden" name="tid" id="tid" value="<?php echo date('Hi'); ?>"/>
                <input type="hidden" id="amount" name="amount" value="1" / >
                <input type="hidden" id="merchant_id" name="merchant_id"
                       value="<?php echo get_option("merchant_code"); ?>"/>
                <input type="hidden" id="merchant_param1" name="merchant_param1" value=""/>
                <input type="hidden" id="merchant_param2" name="merchant_param2" value="" / >
                <input type="hidden" id="merchant_param3" name="merchant_param3" value="" / >
                <input type="hidden" id="merchant_param4" name="merchant_param4" value="" / >
                <input type="hidden" id="language" name="language" value="EN"/>
                  <?php
                  $inst_logo = wp_get_attachment_image_src(get_option('inst_attach_photo_id'), "full")[0];
                  if (empty($inst_logo)) {
                      $inst_logo = get_template_directory_uri() . '/img/default_university.png';
                  }
                  ?>
                <input type="hidden" id="img_url" name="img_url" value="<?php echo $inst_logo; ?>" / >
                <input type="hidden" id="integration_type" name="integration_type" value="iframe_normal"/>

                <input type="hidden" id="working_key" name="working_key" value="<?php echo $_SESSION["working_key"]; ?>"
                / >
                <input type="hidden" id="access_code" name="access_code"
                       value="<?php echo $_SESSION["access_code"]; ?>"/>
                <input type="hidden" id="merchant_data" name="merchant_data"
                       value="<?php echo $_SESSION["merchant_data"]; ?>" / >

                <input type="hidden" id="merchant_param5" name="merchant_param5"
                       value="<?php echo get_url("manage-issued-book-for-users") . '#' . get_option('admin_email') . '#' . get_home_url(); ?>#{{v1}}#{{v2}}#{{v3}}"
                / >
                <input type="hidden" id="redirect_url" name="redirect_url"
                       value="<?php echo $_SESSION["ccavenue_manager"]; ?>"/>
                <input type="hidden" id="redirect_url" name="cancel_url"
                       value="<?php echo $_SESSION["ccavenue_manager"]; ?>"/>
                <tbody>
                <tr>
                  <td>Due to pay</td>
                  <td><?php echo get_option("local_currency", "Rs"); ?>{{due_to_pay}}</td>
                </tr>
                <tr>
                  <td>Mode</td>
                  <td>Online</td>
                </tr>
                <tr>
                  <td>Delayed Days</td>
                  <td>{{delayed_in_days}}</td>
                </tr>
                <tr>
                  <td>Per Day Fine</td>
                  <td><?php echo get_option("local_currency", "Rs"); ?>{{per_day_fine}}</td>
                </tr>
                <tr>
                  <td>Billing Name</td>
                  <td><input type="text" class="form-control" name="billing_name"/></td>
                </tr>
                <tr>
                  <td>Billing Address</td>
                  <td><textarea name="billing_address" class="form-control" rows="3"></textarea></td>
                </tr>
                <tr>
                  <td>City</td>
                  <td><input type="text" class="form-control" name="billing_city"/></td>
                </tr>
                <tr>
                  <td>State</td>
                  <td><input type="text" class="form-control" name="billing_state"/></td>
                </tr>

                <tr>
                <tr>
                  <td>Country</td>
                  <td><input type="text" class="form-control" name="billing_country"/></td>
                </tr>
                <tr>

                  <td>Zip</td>
                  <td><input type="text" class="form-control" name="billing_zip"/></td>
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td><input type="text" class="form-control" name="billing_tel"/></td>
                </tr>
                <tr>
                  <td>Email Id</td>
                  <td><input type="text" class="form-control" name="billing_email"/></td>
                </tr>
                <tr>
                  <td>Note :</td>
                  <td><?php echo get_option("payment_page_notice", "N/A") ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button class="btn btn-primary" type="submit">Pay Now</button>
                  </td>
                </tr>
                </tbody>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>


<?php
get_footer();
?>	