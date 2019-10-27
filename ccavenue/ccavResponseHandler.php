<?php
/* Template Name: PaymentResponseHandling Page */
?>
<?php include('Crypto.php') ?>
<?php
error_reporting(0);
$workingKey = $_SESSION["working_key"];  //Working Key should be provided here.
$encResponse = $_POST["encResp"];   //This is the response sent by the CCAvenue Server
$rcvdString = decrypt($encResponse, $workingKey);  //Crypto Decryption used as per the specified working key.
$order_id = "";
$tracking_id = "";
$bank_ref_no = "";
$order_status = "";
$failure_message = "";
$payment_mode = "";
$card_name = "";
$status_code = "";
$status_message = "";
$currency = "";
$amount = "";
$billing_name = "";
$billing_address = "";
$billing_city = "";
$billing_state = "";
$billing_zip = "";
$billing_country = "";
$billing_tel = "";
$billing_email = "";
$delivery_name = "";
$delivery_address = "";
$delivery_city = "";
$delivery_state = "";
$delivery_zip = "";
$delivery_country = "";
$delivery_tel = "";
$merchant_param1 = "";
$merchant_param2 = "";
$merchant_param3 = "";
$merchant_param4 = "";
$merchant_param5 = "";
$vault = "";
$offer_type = "";
$offer_code = "";
$discount_value = "";
$mer_amount = "";
$eci_value = "";
$retry = "";
$response_code = "";
$billing_notes = "";
$trans_date = "";
$bin_country = "";
$decryptValues = explode('&', $rcvdString);
$dataSize = sizeof($decryptValues);
for ($i = 0; $i < $dataSize; $i++) {
    $information = explode('=', $decryptValues[$i]);
    print_r($information);
    if ($i == 0) {
        $order_id = $information[1];
    }
    if ($i == 1) {
        $tracking_id = $information[1];
    }
    if ($i == 2) {
        $bank_ref_no = $information[1];
    }
    if ($i == 3) {
        $order_status = $information[1];
    }
    if ($i == 4) {
        $failure_message = $information[1];
    }
    if ($i == 5) {
        $payment_mode = $information[1];
    }
    if ($i == 6) {
        $card_name = $information[1];
    }
    if ($i == 7) {
        $status_code = $information[1];
    }
    if ($i == 8) {
        $status_message = $information[1];
    }
    if ($i == 9) {
        $currency = $information[1];
    }
    if ($i == 10) {
        $amount = $information[1];
    }
    if ($i == 11) {
        $billing_name = $information[1];
    }
    if ($i == 12) {
        $billing_address = $information[1];
    }
    if ($i == 13) {
        $billing_city = $information[1];
    }
    if ($i == 14) {
        $billing_state = $information[1];
    }
    if ($i == 15) {
        $billing_zip = $information[1];
    }
    if ($i == 16) {
        $billing_country = $information[1];
    }
    if ($i == 17) {
        $billing_tel = $information[1];
    }
    if ($i == 18) {
        $billing_email = $information[1];
    }
    if ($i == 19) {
        $delivery_name = $information[1];
    }
    if ($i == 20) {
        $delivery_address = $information[1];
    }
    if ($i == 21) {
        $delivery_city = $information[1];
    }
    if ($i == 22) {
        $delivery_state = $information[1];
    }
    if ($i == 23) {
        $delivery_zip = $information[1];
    }
    if ($i == 24) {
        $delivery_country = $information[1];
    }
    if ($i == 25) {
        $delivery_tel = $information[1];
    }
    if ($i == 26) {
        $merchant_param1 = $information[1];
    }
    if ($i == 27) {
        $merchant_param2 = $information[1];
    }
    if ($i == 28) {
        $merchant_param3 = $information[1];
    }
    if ($i == 29) {
        $merchant_param4 = $information[1];
    }
    if ($i == 30) {
        $merchant_param5 = $information[1];
    }
    if ($i == 31) {
        $vault = $information[1];
    }
    if ($i == 32) {
        $offer_type = $information[1];
    }
    if ($i == 33) {
        $offer_code = $information[1];
    }
    if ($i == 34) {
        $discount_value = $information[1];
    }
    if ($i == 35) {
        $mer_amount = $information[1];
    }
    if ($i == 36) {
        $eci_value = $information[1];
    }
    if ($i == 37) {
        $response_code = $information[1];
    }
    if ($i == 38) {
        $billing_notes = $information[1];
    }
    if ($i == 39) {
        $trans_date = $information[1];
    }
    if ($i == 40) {
        $bin_country = $information[1];
    }
}
$tmp = explode("#", $merchant_param5);
$left_off_url = str_replace("http/", "", $tmp[0]);
$left_off_url = str_replace("https/", "", $left_off_url);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") {
    $left_off_url="https://".$left_off_url;
}else{
    $left_off_url="http://".$left_off_url;
}
$email_id = $tmp[1];
$home_page = str_replace("http/", "", $tmp[2]);
$home_page = str_replace("https/", "", $home_page);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") {
    $home_page="https://".$home_page;
}else{
    $home_page="http://".$home_page;
}
$issued_date = $tmp[3];
$due_date = $tmp[4];
$delayed_day = $tmp[5];
?>
<html>
<head><!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
  >
</head>
<body style="background-color: #e9ecef;">
<?php
if ($order_status === "Success") {
    ?>

  <div class="jumbotron text-xs-center" style="    height: -webkit-fill-available;">
    <h3 class="display-3" style="    font-size: 2.5rem;">Your due has been paid! </h3>
    <p class="lead"><strong>Due Reason : </strong><?php echo $merchant_param1; ?></p>
    <hr>


    <h6> Note down the information for your reference </h6>
    <table class="table table-bordered table-responsive">
      <tbody>
      <tr>
        <td>
          OId :
        </td>
        <td><?php echo $order_id; ?></td>
      </tr>
      <tr>
        <td>
          Bank Ref No :
        </td>
        <td>
            <?php echo $bank_ref_no; ?>
        </td>
      </tr>
      <tr>
        <td>
          Tracking Id :
        </td>
        <td>
            <?php echo $tracking_id; ?>
        </td>
      </tr>
      <tr>
        <td>
          Payment Mode :
        </td>
        <td><?php echo $payment_mode; ?></td>
      </tr>
      <tr>
        <td>
          User ID :
        </td>
        <td><?php echo $merchant_param2; ?></td>
      </tr>
      <tr>
        <td>
          Book ID :
        </td>
        <td><?php echo $merchant_param3; ?></td>
      </tr>
      <tr>
        <td>
          Due Paid :
        </td>
        <td><?php echo $amount; ?></td>
      </tr>
      <tr>
        <td>
          Due Paid By:
        </td>
        <td><?php echo $billing_name; ?></td>
      </tr>
      </tbody>
    </table>


    <p class="lead">
      <a class="btn btn-primary btn-sm" href="<?php echo $left_off_url; ?>" target="_blank">Continue To Left Off</a>
    </p>
  </div>


    <?php
} else if ($order_status === "Aborted") {
    ?>

  <div class="jumbotron text-xs-center" style="    height: -webkit-fill-available;">
    <h1 class="display-3">Transaction has been aborted!</h1>
    <hr>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="<?php echo $home_page; ?>" target="_blank">Continue to homepage</a>
    </p>
  </div>


    <?php
} else if ($order_status === "Failure") {
    ?>

  <div class="jumbotron text-xs-center" style="    height: -webkit-fill-available;">
    <h1 class="display-3">Transaction has been declined </h1>
    <hr>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="<?php echo $home_page; ?>" target="_blank">Continue to homepage</a>
    </p>
  </div>


    <?php
} else {
    ?>
  <div class="jumbotron text-xs-center" style="    height: -webkit-fill-available;">
    <h1 class="display-3">Illegal security data access. </h1>
    <hr>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="<?php echo $home_page; ?>" target="_blank">Continue to homepage</a>
    </p>
  </div>

    <?php
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  <
  script
  src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    var Oid = "<?php echo $order_id;?>";
    var TxnId = "<?php echo $tracking_id;?>";
    var BankRefNo = "<?php echo $bank_ref_no;?>";
    var PayedAmount = "<?php echo $amount;?>";
    var PaymentStatus = "<?php echo $order_status; ?>";
    var BookId = "<?php echo $merchant_param3;?>";
    var Tbi = "<?php echo $merchant_param4; ?>";
    var UserId = "<?php echo $merchant_param2;?>";
    var DateDue = "<?php echo $due_date;?>";
    var IssuedDate = "<?php echo $issued_date;?>";
    var PayedForDays = "<?php echo $delayed_day;?>";
    var Mode = "<?php echo $payment_mode;?>";
    $.ajax({
      type: 'POST',
      url: "<?php echo $home_page . '/wp-admin/admin-ajax.php';?>",
      dataType: 'JSON',
      data: {
        "action": "updatePayment",
        "Oid": Oid,
        "TxnId": TxnId,
        "BankRefNo": BankRefNo,
        "PayedAmount": PayedAmount,
        "PaymentStatus": PaymentStatus,
        "BookId": BookId,
        "Tbi": Tbi,
        "UserId": UserId,
        "DateDue": DateDue,
        "IssuedDate": IssuedDate,
        "PayedForDays": PayedForDays,
        "Mode": Mode
      },
      success: function (res) {
        if (res.success) {
          // Wrote information to the database
        }
      }

    });
  });
</script>
</body>
</html>
