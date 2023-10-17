<?php
session_start();
require_once('vendor/autoload.php');
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

