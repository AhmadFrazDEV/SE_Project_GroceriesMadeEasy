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


$query="SELECT * FROM temp_cart where user_id='$user_id'";

$cart=db::getRecords($query);

$size=0;

if($cart!=NULL)
{
    $size=sizeof($cart);

    echo $size;
}
else
{
    echo $size;
}


?>