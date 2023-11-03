<?php
session_start();
include("../../database.php");

$coupon_code =$_POST['coupon_code'];


$query="SELECT * FROM coupon where code='$coupon_code'";
$coupon=db::getRecord($query);

if($coupon != NULL){
    
    echo "Coupon is Applied!";
}else{

    echo "This Coupon is Not Valid!";
}


?>
 