<?php
include("../admin/database.php");


// PayPal settings
$paypal_email = "GMAIL";
$return_url = 'https://dev.single-solution.com/gme/Paypal/payment-successful.php';
$cancel_url = 'https://dev.single-solution.com/gme/index.php';
$notify_url = 'https://dev.single-solution.com/gme/Paypal/payments.php';

?>
