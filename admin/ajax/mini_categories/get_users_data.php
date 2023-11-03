<?php
session_start();
include("../database.php");

$article_id=$_POST['article_id'];

$query="SELECT * from user_login where role!='1'";
$users=db::getRecords($query);

//echo($content_id);
//print_r($producers[2]);

$size=0;

if($users!=NULL)
{
    $size=sizeof($users);
}

$query="SELECT * from article_shared where article_id='$article_id'";
$articles_shared=db::getRecords($query);
//print_r($singers_contest);

foreach($users as $user)
{

    $flag=0;

    for($i=0;$i<$size;$i++)
    {   

        if($user['id'] == $articles_shared[$i]['user_id'])
        {
            $user_id = $user['id'];

            $query="SELECT * from user_login where id='$user_id'";
            $user_data=db::getRecord($query);
            echo "<option value='".$user_data['id']."' selected >".$user_data['f_name'] .$user_data['l_name']."</option>";
            $flag=1;
        }
    }

    if($flag==0)
    {
        $user_id = $user['id'];

        $query="SELECT * from user_login where id='$user_id'";
        $user_data=db::getRecord($query);
        echo "<option value='".$user_data['id']."'>".$user_data['f_name'] .$user_data['l_name']."</option>"; 
    }

}

?>