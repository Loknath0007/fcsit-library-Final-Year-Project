<?php
/* Template Name: PreviewDue Page */
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 22/05/2018
 * Time: 4:01 PM
 */
?>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$hide_lst = array('merchant_param2', 'merchant_param4', 'img_url','working_key',"access_code","merchant_data", 'integration_type', 'merchant_param5', 'redirect_url', 'cancel_url', "order_id", "merchant_param3", "language");
function replace_name($name)
{
    $good_name_lst = array("merchant_id" => "Merchant Id", "currency" => "Currency", "tid" => "Tid", "amount" => "Due to Pay", "merchant_param1" => "Due Reason", "billing_name" => "Billing Name", "billing_address" => "Billing Address", "billing_city" => "Billing City", "billing_country" => "Billing Country", "billing_zip" => "Billing Zip", "billing_tel" => "Billing Tel", "billing_email" => "Billing Email", "billing_state" => "Billing State");
    return isset($good_name_lst[$name]) ? trim($good_name_lst[$name]) : trim($name);
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="padding: 0px;background-color: #f1f1e1;">
        <div style="width:100%;">
          <div class="" style="float: left;width: 20%;padding: 10px;padding-top: 5%;">
            <img src="<?php echo $_POST["img_url"]; ?>" class="img-responsive"/>
          </div>
          <div class="" style="width:80%;float:right;background-color: white;">
            <table class="table table-bordered" style="margin-bottom: 0px;">
              <tbody>
              <tr>
                <td colspan="2"><h3>Due Confirmation</h3></td>
              </tr>
              <form method="post" name="customerData" action="http://www.ricomart.com/test_lib/ccavRequestHandler.php">
                  <?php
                  foreach ($_POST as $key => $value) { ?>
                    <tr <?php if (in_array($key, $hide_lst)) {
                        echo "style='display:none;'";
                    } ?>>
                      <td><?php echo replace_name($key); ?></td>
                      <td><?php echo $value; ?></td>
                    </tr>
                      <?php
                  }
                  ?>
                <tr>
                  <input type="hidden" name="tid" id="tid" value="<?php echo $_POST['tid'] ?>"/>
                  <input type="hidden" name="merchant_id" id="merchant_id" value="<?php echo $_POST['merchant_id'] ?>"/>
                  <input type="hidden" name="order_id" id="order_id" value="<?php echo $_POST['order_id'] ?>"/>
                  <input type="hidden" name="amount" id="amount" value="<?php echo $_POST['amount'] ?>">
                  <input type="hidden" name="currency" id="currency" value="<?php echo $_POST['currency'] ?>"/>
                  <input type="hidden" name="merchant_param1" id="merchant_param1"
                         value="<?php echo $_POST['merchant_param1'] ?>"/>
                  <input type="hidden" name="merchant_param2" id="merchant_param2"
                         value="<?php echo $_POST['merchant_param2'] ?>"/>
                  <input type="hidden" name="merchant_param3" id="merchant_param3"
                         value="<?php echo $_POST['merchant_param3'] ?>"/>
                  <input type="hidden" name="merchant_param4" id="merchant_param4"
                         value="<?php echo $_POST['merchant_param4'] ?>"/>
                  <input type="hidden" name="language" id="language" value="<?php echo $_POST['language'] ?>"/>
                  <input type="hidden" name="integration_type" id="integration_type"
                         value="<?php echo $_POST['integration_type'] ?>"/>
                  <input type="hidden" name="merchant_param5" id="merchant_param5"
                         value="<?php echo $_POST['merchant_param5'] ?>"/>
                  <input type="hidden" name="redirect_url" id="redirect_url"
                         value="<?php echo $_POST['redirect_url'] ?>"/>
                  <input type="hidden" name="cancel_url" id="cancel_url" value="<?php echo $_POST['cancel_url'] ?>"/>
                  <input type="hidden" name="billing_name" id="billing_name"
                         value="<?php echo $_POST['billing_name'] ?>"/>
                  <input type="hidden" name="billing_address" id="billing_address"
                         value="<?php echo $_POST['billing_address'] ?>"/>
                  <input type="hidden" name="billing_city" id="billing_city"
                         value="<?php echo $_POST['billing_city'] ?>"/>
                  <input type="hidden" name="billing_state" id="billing_state"
                         value="<?php echo $_POST['billing_state'] ?>"/>

                  <input type="hidden" name="billing_country" id="billing_country"
                         value="<?php echo $_POST['billing_country'] ?>"/>
                  <input type="hidden" name="billing_zip" id="billing_zip" value="<?php echo $_POST['billing_zip'] ?>"/>
                  <input type="hidden" name="billing_tel" id="billing_tel" value="<?php echo $_POST['billing_tel'] ?>"/>
                  <input type="hidden" name="billing_email" id="billing_email"
                         value="<?php echo $_POST['billing_email'] ?>"/>


                  <input type="hidden" name="working_key" id="working_key" value="<?php echo $_POST['working_key'] ?>"/>
                  <input type="hidden" name="access_code" id="access_code" value="<?php echo $_POST['access_code'] ?>"/>
                  <input type="hidden" name="merchant_data" id="merchant_data"
                         value="<?php echo $_POST['merchant_data'] ?>"/>


                </tr>
                <tr>
                  <td colspan="2">
                    <input type="submit" class="btn btn-primary" name="submit" value="CheckOut"/>
                </tr>
                </tr>
              </form>

              </tbody>
            </table>
          </div>
        </div>


      </div>
      <div class="col-md-2"></div>
    </div>
</body>
</html>