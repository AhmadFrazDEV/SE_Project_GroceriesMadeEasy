<?php
session_start();
require_once("../../database.php");

$id = $_POST ['mc_id'];
$sc_id = $_POST ['sc_id'];

//fetching sub categories

$query = "SELECT * from mini_category where id='$id'";
$mini_cat = db::getRecord($query);


$query = "SELECT * from mini_category where sc_id='$sc_id'";
$mini_categories = db::getRecords($query);

$empty= "Select Option";
$no_result= "No Resluts Found";
$no_mc= "No mini category";

if($mini_categories!=NULL)
{   
    echo "<option value=''>".$no_mc."</option>";
    foreach($mini_categories as $mini_category)
    {   
        $mini_cat_id = $mini_cat['id'];
        $mini_category_id =$mini_category['id'];
        if($mini_category_id==$mini_cat_id)
        {
            
            echo "<option selected value='".$mini_category['id']."'>".$mini_category['mc_name']."</option>";
        }
        else{
            echo "<option  value='".$mini_category['id']."'>".$mini_category['mc_name']."</option>";
        }

    }
}

else{
    echo "<option disabled selected  value='' >".$no_result."</option>";
}
?>