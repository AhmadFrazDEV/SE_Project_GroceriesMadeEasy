<?php
session_start();
include("../../database.php");


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

$product_id=$_POST['product_id'];

$query    = "SELECT * from wishlist where product_id='$product_id' AND user_id='$user_id' ";
$product = db::getRecord($query);

if($product!=null){

    echo "You have already added.";
}
else{

    $query="INSERT into wishlist (user_id,product_id) VALUES ('$user_id','$product_id')";
    $insert=db::query($query);
    echo "Product Added To Wishlist.";
}





?>