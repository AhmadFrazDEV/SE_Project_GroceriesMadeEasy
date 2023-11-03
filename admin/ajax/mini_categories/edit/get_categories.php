<?php
session_start();
require_once("../../database.php");

$id = $_POST ['c_id'];

//fetching sub categories

$query = "SELECT * from category where id='$id'";
$cat = db::getRecord($query);


$query = "SELECT * from category";
$categories = db::getRecords($query);

$empty= "Select Option";
$no_result= "No Resluts Found";

if($categories!=NULL)
{   

    foreach($categories as $category)
    {   
        $cat_id = $cat['id'];
        $category_id =$category['id'];
        if($category_id==$cat_id)
        {
            
            echo "<option selected value='".$category['id']."'>".$category['c_name']."</option>";
        }
        else{
            echo "<option  value='".$category['id']."'>".$category['c_name']."</option>";
        }

    }
}

else{
    echo "<option disabled selected  value='' >".$no_result."</option>";
}
?>