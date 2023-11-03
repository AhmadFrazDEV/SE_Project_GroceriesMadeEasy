<?php
session_start();
require_once("../../database.php");

$id = $_POST ['c_id'];

//fetching sub categories

$query = "SELECT * from sub_category where c_id='$id'";
$sub_categories = db::getRecords($query);

$empty= "Select Option";
$no_result= "No Resluts Found";

if($sub_categories!=NULL)
{   
    echo "<option disabled selected  value='' >".$empty."</option>";
    
    foreach($sub_categories as $sub_category)
    { 
        echo "<option  value='".$sub_category['id']."'>".$sub_category['sc_name']."</option>";
    }
}

else{
    echo "<option disabled selected  value='' >".$no_result."</option>";
}
?>