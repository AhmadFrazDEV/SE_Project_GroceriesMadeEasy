<?php
session_start();
require_once("../../database.php");

$id = $_POST ['sc_id'];
$c_id = $_POST ['c_id'];

//fetching sub categories

$query = "SELECT * from sub_category where id='$id'";
$sub_cat = db::getRecord($query);


$query = "SELECT * from sub_category where c_id='$c_id'";
$sub_categories = db::getRecords($query);

$empty= "Select Option";
$no_result= "No Resluts Found";
$no_sc= "No Sub category";

if($sub_categories!=NULL)
{   
     echo "<option value=''>".$no_sc."</option>";
    foreach($sub_categories as $sub_category)
    {   
        $sub_cat_id = $sub_cat['id'];
        $sub_category_id =$sub_category['id'];
        if($sub_category_id==$sub_cat_id)
        {
            
            echo "<option selected value='".$sub_category['id']."'>".$sub_category['sc_name']."</option>";
        }
        else{
            echo "<option  value='".$sub_category['id']."'>".$sub_category['sc_name']."</option>";
        }

    }
}

else{
    echo "<option disabled selected  value='' >".$no_result."</option>";
}
?>