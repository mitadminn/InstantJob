<?php
 

require_once 'vendor/autoload.php';
require_once 'SDK-RazerMS_PHP/src/lib/Payment.php';

 
// use RazerMerchantServices\Client;
use RazerMerchantServices\Payment;
// use RazerMerchantServices\Payment;
 
// Get form input values
$orderid = 'ID78899';
$bill_name =$_POST['Name'];
$amount = $_POST['amount'];
$currency = 'MYR';//$_POST['currency'];
$reference = $_POST['reference'];
 $bill_email = 'jaspreetsingh9088@gmail.com';
 $bill_mobile = '9464533870';
 $bill_desc = '';
// Create the payment request
$payment = new Payment('SB_honestunicorn', '8c4dbcb34f8a43fea669ae0cd8eed6df', 'SB_honestunicorn', 'sandbox');
 
        $paymentUrl = $payment->getPaymentUrl($orderid, $amount, $bill_name, $bill_email, $bill_mobile);

 
try {
    // Generate the payment URL
 

    // Redirect the user to the payment page
    header('Location: ' . $paymentUrl);
    exit;
} catch (Exception $e) {
    // Handle any errors that occurred during payment request generation
    echo 'Error: ' . $e->getMessage();
}
?>
