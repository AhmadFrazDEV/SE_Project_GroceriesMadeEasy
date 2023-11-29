<?php
session_start();
require_once("../admin/database.php");



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

    $total_bill=$total_bill * 100;

    $_SESSION['total_bill']=$total_bill;

    $shoping = "Shoping From OPPPACK";

    $_SESSION['checkout_success']='1';
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



    $total_bill=$total_bill * 100;

    $_SESSION['total_bill']=$total_bill;

    $shoping = "Donation";

    $_SESSION['checkout_success']='2';
}

?>


<?php

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('APIKEY');
$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $shoping,
            ],
            'unit_amount' => $total_bill,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://dev.single-solution.com/gme/stripe/charge.php',
    'cancel_url' => 'https://dev.single-solution.com/gme/index.php',
]);

?>
<html>

<head>

    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    <script>
        var stripe = Stripe('APIKEY');
        stripe.redirectToCheckout({
            sessionId: "<?php echo $session->id; ?>"
        });

    </script>
</body>

</html>
