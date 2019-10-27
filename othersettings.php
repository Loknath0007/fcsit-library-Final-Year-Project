<?php
/* Template Name: OtherSettings Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>


<?php
global $current_user;
$userID = $current_user->ID;
$user_login = $current_user->user_login;
$limit_issue_book_teachers = get_option('limit_issue_book_teachers');
$message_api_key = get_option('message_api_key');
$people_to_approve = get_option('people_to_approve');
$states_custom = get_option('custom_states');
$custom_css_front_page = get_option('custom_css_front_page');
$custom_theme_color = get_option('custom_theme_color');
$nos_of_book_to_show = get_option('nos_of_book_to_show');
$nos_of_menu_to_show = get_option('nos_of_menu_to_show');
$quick_notice = get_option('quick_notice');
$local_currency = get_option('local_currency');
$limit_issue_book = get_option("limit_issue_book");
$hide_wordpress_dashboard = get_option("hide_wordpress_dashboard");
$default_password = get_option("default_password");
$inst_in_cards = get_option("inst_in_cards");
$logo_css = get_option("logo_css");
$width_custom_pages = get_option("width_custom_pages");
$payment_page_notice = get_option("payment_page_notice");
$fine_rate = get_option("fine_rate");
$working_key = get_option("working_key");
$access_code = get_option("access_code");
$merchant_code = get_option("merchant_code");
$payment_currency_code = get_option("payment_currency_code");
$email_tmp_issued_book = get_option("email_tmp_issued_book");
$email_tmp_returned_book = get_option("email_tmp_returned_book");
$do_online_payment = get_option("do_online_payment");
$email_sending_process = get_option("email_sending_process");
$waiting_approval_msg = get_option("waiting_approval_msg");
$front_page_s1 = get_option("front_page_s1");
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
      <li class="active">Other Settings</li>
    </ol>
  </section>


  <section class="content" style="min-height: 100%;">
    <div class="">
      <div class="box-header with-border">

      </div>

      <div class="box-body" style="">
        <div class="row">

          <div class="col-md-12" ng-controller="otherSettingsCtrl">
            <div class="tab-content shadow">
              <div class="tab-pane active">
                <div class=" panel panel-custom">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <strong>Update Details</strong>
                    </div>
                  </div>
                  <div class="panel-body form-horizontal">
                    <form class="form-horizontal" id="lib_manage_other_seting">


                      <input type="hidden" name="action" value="other_settings">


                      <div class="form-group mb0 col-sm-6">
                        <label>[MSG91.com]Message
                          Api Key</label>

                        <input name="message_api_key" id="message_api_key"
                               placeholder="Message Api key [https://msg91.com/]" class="form-control"
                               value="<?php echo $message_api_key; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>[ New
                          Book ]People To Approve</label>

                        <input name="people_to_approve" id="people_to_approve" placeholder="25"
                               class="form-control" value="<?php echo $people_to_approve; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>Nos
                          of Resources to show</label>

                        <input name="nos_of_book_to_show" id="nos_of_book_to_show" tooltips
                               tooltip-template="Nos of books to show for each category in front page"
                               tooltip-side="bottom" placeholder="" class="form-control"
                               value="<?php echo $nos_of_book_to_show; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>Limit Issue Resources for students</label>

                        <input name="limit_issue_book" id="limit_issue_book" tooltips
                               tooltip-template="Limit the nos of books to issed for students."
                               tooltip-side="bottom" placeholder="" class="form-control"
                               value="<?php echo $limit_issue_book; ?>" type="text">

                      </div>
                      <div class="form-group mb0 col-sm-6">
                        <label>Limit Issue Resources for Teachers</label>
                        <input name="limit_issue_book_teachers" id="limit_issue_book_teachers" tooltips
                               tooltip-template="Limit the nos of books to issed for teachers. - For future versions"
                               class="form-control"
                               value="<?php echo "5"; ?>" type="text" readonly>

                      </div>
                      <div class="form-group mb0 col-sm-6">
                        <label>Disable
                          Wordpress DashBoard</label>

                        <input name="hide_wordpress_dashboard" id="hide_wordpress_dashboard" tooltips
                               tooltip-template="Type yes or no." tooltip-side="bottom"
                               placeholder="yes or no" class="form-control"
                               value="<?php echo $hide_wordpress_dashboard; ?>" type="text">

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Currency</label>

                        <input name="local_currency" id="local_currency"
                               placeholder="Enter your local currency" class="form-control"
                               value="<?php echo $local_currency; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>Set a
                          fallback password</label>

                        <input name="default_password" id="default_password" placeholder="123456" tooltips
                               tooltip-template="Set a default password.This password will be used if you are reseting the password.If nothing is set the default password would be '123456'"
                               tooltip-side="bottom" placeholder="" class="form-control"
                               value="<?php echo $default_password; ?>" type="text">

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Nos
                          of menu to show</label>

                        <input name="nos_of_menu_to_show" id="nos_of_menu_to_show" tooltips
                               tooltip-template="Nos of menu to show in the front page before wrapping."
                               tooltip-side="bottom" placeholder="" class="form-control"
                               value="<?php echo $nos_of_menu_to_show; ?>" type="text">

                      </div>
                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Theme Color
                        </label>

                        <input name="custom_theme_color" id="custom_theme_color" class="form-control"
                               value="<?php echo $custom_theme_color; ?>" type="color">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Logo Css
                        </label>

                        <input name="logo_css" id="logo_css" class="form-control"
                               value="<?php echo $logo_css; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Width For Custom Pages
                        </label>
                        <input name="width_custom_pages" id="width_custom_pages" class="form-control"
                               value="<?php echo $width_custom_pages; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Define Fine Rate
                        </label>
                        <input name="fine_rate" id="fine_rate" class="form-control"
                               value="<?php echo $fine_rate; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          CCavenue Merchant Code/Id
                        </label>
                        <input name="merchant_code" id="merchant_code" class="form-control"
                               value="<?php echo $merchant_code; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Payment Page Notice
                        </label>
                        <input name="payment_page_notice" id="payment_page_notice" class="form-control"
                               value="<?php echo $payment_page_notice; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          CCavenue Processing Currency
                        </label>
                        <input name="payment_currency_code" id="payment_currency_code" class="form-control"
                               value="<?php echo $payment_currency_code; ?>" placeholder="MYR | USD | SGD | GBP | EUR" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          CCavenue Working Key
                        </label>
                        <input name="working_key" id="working_key" class="form-control"
                               value="<?php echo $working_key; ?>" type="text">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          CCavenue Access Code
                        </label>
                        <input name="access_code" id="access_code" class="form-control"
                               value="<?php echo $access_code; ?>" type="text">

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Add Main
                          Notice</label>


                        <textarea name="quick_notice" id="quick_notice"
                                  placeholder="Enter your notice to show in the front page."
                                  class="form-control" rows="5"><?php echo $quick_notice; ?></textarea>


                      </div>


                      <div class="form-group mb0 col-sm-6">

                        <label>Add You
                          States {Seperated By Comma}</label>

                        <textarea name="custom_states" id="custom_states" placeholder="Sarawak,Selangor"
                                  class="form-control" rows="5"><?php echo $states_custom; ?></textarea>

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Add
                          Css Style Front Page</label>
                        <textarea name="custom_css_front_page" id="custom_css_front_page" placeholder=""
                                  class="form-control"
                                  rows="5"><?php echo $custom_css_front_page; ?></textarea>

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Instructions
                          for users id card {seperate by comma}</label>

                        <textarea name="inst_in_cards" id="inst_in_cards"
                                  placeholder="Enter the instruction seperated by commas.Only 7 instruction are supported."
                                  class="form-control" rows="5"><?php echo $inst_in_cards; ?></textarea>

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Enable Online Due Payment
                        </label>
                        <input name="do_online_payment" id="do_online_payment" class="form-control"
                               value="<?php echo $do_online_payment; ?>" type="text" placeholder="true or false"
                               tooltips
                               tooltip-template="If you set it to true online due system will start working but make sure you enter your payement gateway details."
                               tooltip-side="bottom">

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>
                          Enable Email Sending
                        </label>
                        <input name="email_sending_process" id="email_sending_process" class="form-control"
                               value="<?php echo $email_sending_process; ?>" type="text" placeholder="true or false"
                               tooltips
                               tooltip-template="If you set it to true email will be send when you issue or return the book."
                               tooltip-side="bottom">

                      </div>


                      <div class="form-group mb0 col-sm-12">
                        <label>
                          Waiting Approval Msg
                        </label>
                        <input name="waiting_approval_msg" id="waiting_approval_msg" class="form-control"
                               value="<?php echo $waiting_approval_msg; ?>" type="text" placeholder=""
                               tooltips
                               tooltip-template="This will be a help notification which the users sees when he completes the payment.Here you could mention any instructions that he needs to follow after the payment process."
                               tooltip-side="bottom">

                      </div>

                      <div class="form-group mb0 col-sm-12">
                        <label>
                         Front Page Statement
                        </label>
                        <input name="front_page_s1" id="front_page_s1" class="form-control"
                               value="<?php echo $front_page_s1; ?>" type="text" placeholder="FCSIT Library Resources"
                               >

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Email Template For Issued Books</label>

                        <textarea name="email_tmp_issued_book" id="email_tmp_issued_book"
                                  placeholder="Hii , {username} &#10;Book Name : {bookname} &#10;Book Id : {bookid} &#10;Has been issued to you successfully.&#10;Thank You"
                                  class="form-control" rows="5"><?php echo $email_tmp_issued_book; ?></textarea>

                      </div>


                      <div class="form-group mb0 col-sm-6">
                        <label>Email Template For Returned Books</label>

                        <textarea name="email_tmp_returned_book" id="email_tmp_returned_book"
                                  placeholder="Hii , {username} &#10;Book Name : {bookname} &#10;Book Id : {bookid} &#10;Has been returned to us successfully.&#10;Thank You"
                                  class="form-control" rows="5"><?php echo $email_tmp_returned_book; ?></textarea>

                      </div>


                      <div class="form-group mb0 col-sm-12">


                        <button ng-click="saveSettings()"
                                class="btn btn-primary fix_radius pull-right pmd-ripple-effect"><span
                              class="fa fa-floppy-o"></span>&nbsp;Save
                        </button>
                      </div>


                    </form>
                  </div>
                </div>
              </div>
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