<?php
session_start();

//Include DB configuration file
require_once("../admin/database.php");

$checkout=$_SESSION['checkout_success'];

if($checkout=='1'){


    $user_id=$_SESSION['user_id'];
    $order_id=$_SESSION['order_id'];

    // print_r($user_id);
    // print_r($order_id);
    // print_r(123);
    // exit();

    $query="UPDATE orders SET payment_status='paid' where user_id='$user_id'  AND order_id='$order_id'";
    $run=db::query($query);



    $query="DELETE from temp_cart where user_id='$user_id'";
    $del=db::query($query);

    echo "<script>location='../final_message.php?status=1'</script>";

}elseif($checkout=='2'){



    $user_id=$_SESSION['user_id'];
    $donate_id=$_SESSION['donate_id'];

    // print_r($user_id);
    // print_r($order_id);
    // print_r(123);
    // exit();

    $query="UPDATE donation SET payment_status='paid' where user_id='$user_id'  AND donate_id='$donate_id'";
    $run=db::query($query);



    echo "<script>location='../final_message.php?status=2'</script>";

}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Successful</title>
    </head>
    <body>
        <h1>Thank You</h1>
        <p>Your payment was successful. Thank you.</p>
        <div id="query">
            <?php
            $date=date('Y-m-d');
            //$subscriber=date("Y-m-d",strtotime(date("Y-m-d",strtotime($date))."+".$duration."month"));
            $dateExpired= date('Y/m/d',strtotime('+30 days',strtotime($date))) . PHP_EOL;
            $six_digit_random_number = mt_rand(100000, 999999);
            $_SESSION[SID.'six_digit_random_number'] =$six_digit_random_number;
            $category="subscribe";

            $ab="INSERT into customers (id,email,password,category,joindate,uniquee,expiredate,ipaddress)
    values('','','','$category','$date','$six_digit_random_number','$dateExpired','');
";
            $run=db::query($ab);



            ?>


        </div>
    </body>
</html>
