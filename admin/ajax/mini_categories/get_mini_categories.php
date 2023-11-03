<?php
session_start();
require_once("../database.php");

$id = $_POST ['sc_id'];

//fetching mini categories

$query = "SELECT * from mini_category where sc_id='$id'";
$mini_categories = db::getRecords($query);

$empty= "Select Option";
$no_result= "No Resluts Found";

if($mini_categories!=NULL)
{
    echo "<option disabled selected  value=''>".$empty."</option>";
    foreach($mini_categories as $mini_category)
    {
        echo "<option  value='".$mini_category['id']."'>".$mini_category['mc_name']."</option>";
    }
}

else{
    echo "<option disabled selected  value='' >".$no_result."</option>";
}
?>