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

$quantity =$_POST['quantity'];

$product_id=$_POST['product_id'];

$product_data_id=$_POST['product_data_id'];

$query    = "SELECT * from temp_cart where product_id='$product_id' AND user_id='$user_id' AND product_data_id='$product_data_id' ";
$product = db::getRecord($query);



if($product!=null){
    $cart_quantity = $product['quantity'];

    $new_quantity = $quantity + $cart_quantity;

    $query         = "UPDATE temp_cart SET quantity='$new_quantity' where product_id='$product_id'  AND user_id='$user_id' AND product_data_id='$product_data_id' ";
    $run           = db::query($query);

    echo "Quantity Added To Cart.";
}
else{

$query="INSERT into temp_cart (user_id,product_id,product_data_id,quantity) VALUES ('$user_id','$product_id','$product_data_id','$quantity')";
$insert=db::query($query);
    echo "Product Added To Cart.";
}





?>
