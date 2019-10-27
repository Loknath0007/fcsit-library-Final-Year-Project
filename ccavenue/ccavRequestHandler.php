<?php
/* Template Name: PaymentHandling Page */
/* This file needs to be place on the server where you have registered with ccavenue then paste the direct url path
   in the other setting page option named  */
?>
<html>
<head>
  <title> Ccavenue Payment Page</title>
</head>
<body>
<center>
    <?php include('Crypto.php') ?>
    <?php
    error_reporting(0);
    $working_key = $_POST["working_key"];
    $access_code = $_POST["access_code"];
    $merchant_data = $_POST["merchant_data"];
    unset($_POST['working_key']);
    unset($_POST['access_code']);
    unset($_POST['merchant_data']);
    foreach ($_POST as $key => $value) {
        $merchant_data .= $key . '=' . $value . '&';
    }
    $encrypted_data = encrypt($merchant_data, $working_key); // Method for encrypting the data.
    $production_url = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code;
    ?>
  <iframe src="<?php echo $production_url ?>" id="paymentFrame" width="482" height="450" frameborder="0"
          scrolling="No"></iframe>

  <script type="text/javascript" src="jquery-1.7.2.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      window.addEventListener('message', function (e) {
        $("#paymentFrame").css("height", e.data['newHeight'] + 'px');
      }, false);

    });
  </script>
</center>
</body>
</html>

