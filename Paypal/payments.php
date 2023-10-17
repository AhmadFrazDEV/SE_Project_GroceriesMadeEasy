<?php
session_start();
include("conf.php");


if(isset($_POST['final_checkout']))
{

    //generating order id



    $order_id=rand(10,100000);


    $query="SELECT * from orders WHERE order_id='$order_id'";
    $order=db::getRecord($query);





    if($order!=NULL)
    {
        while($order!=NULL)
        {
            $order_id=rand(10,100000);

            $query="SELECT * from orders WHERE order_id='$order_id'";
            $order=db::getRecord($query);
        }
    }

    $_SESSION['order_id']=$order_id;


    $total_bill="0";

    $user_id=NULL;

    if(isset($_SESSION['customer_email']))
    {
        $user_email=$_SESSION['customer_email'];

        $query="SELECT * from users where email='$user_email'";
        $user=db::getRecord($query);

        $user_id=$user_email;

    }else{

        $user_id=session_id();
    }

    $_SESSION['user_id']=$user_id;

    $query="SELECT * FROM temp_cart where user_id='$user_id'";
    $cart_items=db::getRecords($query);

    $size=NULL;

    if(is_array($cart_items))
    {
        $size=sizeof($cart_items);
    }


    $db             = db::open();
    $f_name         = $db->real_escape_string($_POST['f_name']);
    $l_name        = $db->real_escape_string($_POST['l_name']);
    $email         = $db->real_escape_string($_POST['email']);
    $country         = $db->real_escape_string($_POST['country']);
    $address         = $db->real_escape_string($_POST['address']);
    $city         = $db->real_escape_string($_POST['city']);
    $state         = $db->real_escape_string($_POST['state']);
    $zip         = $db->real_escape_string($_POST['zip']);
    $phone         = $db->real_escape_string($_POST['phone']);
    $order_note         = $db->real_escape_string($_POST['order_note']);
    $payment_method = $db->real_escape_string($_POST['payment_method']);
    $total_bill = $_POST['total_amount'];
    $payment_status = "unpaid";

    $total_products=$size;


    if (isset($_POST['discounted_total_amount'])) {
        $total_bill = $_POST['discounted_total_amount'];
    }

    if (isset($_POST['coupon_code'])) {
        $coupon_code = $_POST['coupon_code'];
    } else {
        $coupon_code = NULL;
    }


    if($cart_items != NULL){
        foreach($cart_items as $cart_item)
        {
            $product_bill="0";
            $id = $cart_item['id'];
            $product_id = $cart_item['product_id'];
            $product_data_id = $cart_item['product_data_id'];

            $query="SELECT * from product where id='$product_id'";
            $product=db::getRecord($query);
            $product_name  = $product['name'];

            //                                        print_r ($product);
            //                                        exit();


            $query="SELECT * FROM product_data where id='$product_data_id'";
            $product_data=db::getRecord($query);

            //                                    print_r ($query);
            //                                        exit();



            if($product['discount']!=NULL){

                $discount = (float)$product_data['price']*((float)($product['discount']/100));
                //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                $product_price = (float)$product_data['price']-((float)$discount);
            }
            else{
                $product_price = $product_data['price'];
            }

            //            $cart_product_quantity = $cart_item['quantity'];
            //            $total_bill= $total_bill + ($product_price * $cart_product_quantity ) ;

            $cart_product_quantity = $cart_item['quantity'];
            $product_bill= $product_bill + ($product_price * $cart_product_quantity ) ;



            $query="INSERT into order_detail (order_id,product_id,product_data_id,product_name,quantity,total) VALUES ('$order_id','$product_id','$product_data_id','$product_name','$cart_product_quantity','$product_bill')";

            $insert=db::query($query);


        }
    }

    $query="INSERT into orders (order_id,user_id,f_name,l_name,email,country,address,city,state,zip_code,phone,note,total_products,total_bill,payment_method,payment_status,coupon_used)

           VALUES ('$order_id','$user_id','$f_name','$l_name','$email','$country','$address','$city','$state ','$zip','$phone','$order_note','$total_products','$total_bill','$payment_method','$payment_status','$coupon_code')";

    $insert=db::query($query);



    $_SESSION['total_bill']=$total_bill;
    $_SESSION['checkout_success']='1';




$item_name = 'Shopping';
$item_amount = $total_bill;
    
    
    



}


if(isset($_POST['final_donate']))
{

    //generating order id



    $donate_id=rand(10,100000);


    $query="SELECT * from donation WHERE donate_id='$donate_id'";
    $donation=db::getRecord($query);





    if($donation!=NULL)
    {
        while($donation!=NULL)
        {
            $order_id=rand(10,100000);

            $query="SELECT * from donation WHERE donate_id='$donate_id'";
            $donation=db::getRecord($query);
        }
    }

    $_SESSION['donate_id']=$donate_id;


    $total_bill="0";

    $user_id=NULL;

    if(isset($_SESSION['customer_email']))
    {
        $user_email=$_SESSION['customer_email'];

        $query="SELECT * from users where email='$user_email'";
        $user=db::getRecord($query);

        $user_id=$user_email;

    }else{

        $user_id=session_id();
    }

    $_SESSION['user_id']=$user_id;


    $db             = db::open();
    $f_name         = $db->real_escape_string($_POST['f_name']);
    $l_name        = $db->real_escape_string($_POST['l_name']);
    $email         = $db->real_escape_string($_POST['email']);
    $country         = $db->real_escape_string($_POST['country']);
    $address         = $db->real_escape_string($_POST['address']);
    $city         = $db->real_escape_string($_POST['city']);
    $state         = $db->real_escape_string($_POST['state']);
    $zip         = $db->real_escape_string($_POST['zip']);
    $phone         = $db->real_escape_string($_POST['phone']);
    $order_note         = $db->real_escape_string($_POST['order_note']);
    $payment_method = $db->real_escape_string($_POST['payment_method']);
    $total_bill = $_POST['total_amount'];
    $payment_status = "unpaid";



    $query="INSERT into donation (donate_id,user_id,f_name,l_name,email,country,address,city,state,zip_code,phone,note,total_bill,payment_method,payment_status)

           VALUES ('$donate_id','$user_id','$f_name','$l_name','$email','$country','$address','$city','$state ','$zip','$phone','$order_note','$total_bill','$payment_method','$payment_status')";

    $insert=db::query($query);



    $_SESSION['total_bill']=$total_bill;




$item_name = 'Donation';
$item_amount = $total_bill;

$_SESSION['checkout_success']='2';
}





// Include Functions
include("functions.php");

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
    $querystring = '';

    // Firstly Append paypal to querystring
    $querystring .= "?business=".urlencode($paypal_email)."&";

    // Append amount& currency (£) to quersytring so it cannot be edited in html

    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
    $querystring .= "item_name=".urlencode($item_name)."&";
    $querystring .= "amount=".urlencode($item_amount)."&custom=12&";

    //loop for posted values and append to querystring
    foreach($_POST as $key => $value){
        $value = urlencode(stripslashes($value));
        $querystring .= "$key=$value&";
    }

    // Append paypal return addresses
    $querystring .= "return=".urlencode(stripslashes($return_url))."&";
    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
    $querystring .= "notify_url=".urlencode($notify_url);

    // Append querystring with custom field
    //$querystring .= "&custom=".USERID;

    // Redirect to paypal IPN
    header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
    exit();
} else {
    //Database Connection
    $link = mysql_connect($host, $user, $pass);
    mysql_select_db($db_name);

    // Response from Paypal

    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
        $req .= "&$key=$value";
    }

    // assign posted variables to local variables
    $data['item_name']			= $_POST['item_name'];
    $data['item_number'] 		= $_POST['item_number'];
    $data['payment_status'] 	= $_POST['payment_status'];
    $data['payment_amount'] 	= $_POST['mc_gross'];
    $data['payment_currency']	= $_POST['mc_currency'];
    $data['txn_id']				= $_POST['txn_id'];
    $data['receiver_email'] 	= $_POST['receiver_email'];
    $data['payer_email'] 		= $_POST['payer_email'];
    $data['custom'] 			= $_POST['custom'];

    // post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

    if (!$fp) {
        // HTTP ERROR

    } else {
        fputs($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp($res, "VERIFIED") == 0) {

                // Used for debugging
                // mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));

                // Validate payment (Check unique txnid & correct price)
                $valid_txnid = check_txnid($data['txn_id']);
                $valid_price = check_price($data['payment_amount'], $data['item_number']);
                // PAYMENT VALIDATED & VERIFIED!
                if ($valid_txnid && $valid_price) {

                    $orderid = updatePayments($data);

                    if ($orderid) {

                        // Payment has been made & successfully inserted into the Database
                    } else {

                        // Error inserting into DB
                        // E-mail admin or alert user
                        // mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
                    }
                } else {
                    // Payment made but data has been changed
                    // E-mail admin or alert user
                }

            } else if (strcmp ($res, "INVALID") == 0) {

                // PAYMENT INVALID & INVESTIGATE MANUALY!
                // E-mail admin or alert user

                // Used for debugging
                //@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");

            }
        }
        fclose ($fp);
    }
}
?>
