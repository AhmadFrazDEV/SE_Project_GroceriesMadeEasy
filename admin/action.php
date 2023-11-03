<?php
session_start();
require_once("database.php");



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['login'])){
    //getting values from form
    $db = db::open();
    $email=$db->real_escape_string($_POST['username']);
    $password=$db->real_escape_string($_POST['password']);

    //checking credentials in table
    $query="SELECT * from user_login where email='$email' && password='$password' && status='0' ";
    $rec=db::getRecord($query);

    //checking if credentials are correct
    if($rec!=NULL)
    {
        //assigning value
        $role= $rec['role'];

        //assigning value in session
        $_SESSION['user_email']=$email;
        $_SESSION['role']=$role;

        echo "<script>location='dashboard.php?status=1'</script>";
    }
    else
    {
        echo "<script>location='index.php?status=1'</script>";
    }
}

if(isset($_GET['logout'])){
    //    session_destroy();

    //    $value = $_GET['logout'];
    //    echo $value;

    //remove value in session
    unset ($_SESSION["user_email"]);

    echo "<script>location='index.php'</script>";
}

if(isset($_POST['add_new_user'])){
    //getting values from form
    $db = db::open();
    $email=$db->real_escape_string($_POST['email']);
    $role=$db->real_escape_string($_POST['role']);

    //checking if email exists
    $query="SELECT * from user_login where email='$email'";
    $email_rec=db::getRecord($query);

    //it runs if email exists
    if($email_rec!=NULL)
    {
        //        echo "<script>alert('User Already Exists! Try with different email...');</script>";
        echo "<script>location='users/users.php?status=1'</script>";
    }
    else
    {
        //assigning values
        $password = 123;
        $status = 0;

        //assigning value in session
        $created_by=$_SESSION['user_email'];

        //getting current date and time
        $date = time();
        $current_date = date('Y-m-d H:i:s', $date);


        //insert data into table
        $query ="INSERT into user_login (email,role,password,status,created_on,created_by) VALUES ('$email','$role','$password','$status','$current_date','$created_by')";
        $insert= db::query($query);

        //        echo "<script>alert('User Created...');</script>";
        echo "<script>location='users/users.php?status=2'</script>";
    }
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['edit_user_access'])){

    //getting values from form
    $db            = db::open();
    $id            = $_POST['id'];

    //checking if status is checked or =1
    if(isset($_POST['status'])){
        $status = $_POST['status'];
    } else{
        $status = 0;
    }

    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);


    //update data into table
    $query  = "UPDATE user_login SET status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
    $update    = db::query($query);

    //it runs if data is updated
    if($update!=NULL)
    {
        //        echo "<script>alert('Access Updated...');</script>";
        echo "<script>location='users/users.php?status=3'</script>";
    }
    else
    {
        //        echo "<script>alert('Access is not Updated...');</script>";
        echo "<script>location='users/users.php?status=5'</script>";
    }
}

if(isset($_POST['edit_user_profile'])){

    //getting values from form
    $db            = db::open();
    $id            = $_POST['id'];

    $user_name=$db->real_escape_string($_POST['user_name']);
    $email=$db->real_escape_string($_POST['email']);
    $f_name=$db->real_escape_string($_POST['f_name']);
    $l_name=$db->real_escape_string($_POST['l_name']);
    $phone=$db->real_escape_string($_POST['phone']);
    $country=$db->real_escape_string($_POST['country']);

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    $query="SELECT * from user_login where id='$id'";
    $user_data=db::getRecord($query);


    $user_data_id = $user_data['id'];


    $query="SELECT * from user_login  where id!='$user_data_id'";
    $users=db::getRecords($query);
    $count="";

    if($users!=NULL)
    {
        foreach($users as $user)
        {
            $user_email = $user['email'];

            if($user_email==$email)
            {
                $count=1;
                echo "<script>location='users/user_edit_profile.php?status=3'</script>";

            }
        }
    }

    if($count!=1){
        // checking if file is posted
        if($_FILES['file']['name'] != NULL){
            //getting file details from form
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder ="files/users/profiles/";
            $new_size = $file_size/1024;
            $new_file_name = strtolower($file);
            $final_file=str_replace(' ','-',$new_file_name);


            //checking if user exists
            $query="SELECT * from user_login where id='$id'";
            $user_data=db::getRecord($query);

            //it runs if user exists
            if($user_data!=NULL)
            {
                //this function move file to directory
                //then code works if file is moved
                if(move_uploaded_file($file_loc,$folder.$final_file))
                {
                    //getting file name to delete
                    $del_image_query     = "SELECT * from user_login where id='$id'";
                    $del_image_rec       = db::getRecord($del_image_query);

                    //delete old file from directory
                    $data      = $del_image_rec['image_name'];
                    $dir       = "files/users/profiles/";
                    $dirHandle = opendir($dir);
                    while ($file      = readdir($dirHandle)) {
                        if ($file == $data) {
                            unlink($dir . '/' . $file);
                        }
                    }
                    //close directory
                    closedir($dirHandle);

                    //update data in table include file
                    $query="UPDATE user_login SET user_name='$user_name',email='$email',f_name='$f_name',l_name='$l_name',phone='$phone',country='$country',image_name='$final_file',image_type='$file_type',modified_on='$current_date',modified_by='$email' where id='$id'";
                    $update=db::query($query);

                    //assigning value in session
                    $_SESSION['user_email']=$email;

                }
                else
                {
                    //update data in table exclude file
                    $query="UPDATE user_login SET user_name='$user_name',email='$email',f_name='$f_name',l_name='$l_name',phone='$phone',country='$country',modified_on='$current_date',modified_by='$email' where id='$id'";
                    $update=db::query($query);

                    //assigning value in session
                    $_SESSION['user_email']=$email;
                }
            }
        }
        else
        {
            //update data in table exclude file
            $query="UPDATE user_login SET user_name='$user_name',email='$email',f_name='$f_name',l_name='$l_name',phone='$phone',country='$country',modified_on='$current_date',modified_by='$email' where id='$id'";
            $update=db::query($query);

            //assigning value in session
            $_SESSION['user_email']=$email;
        }

    }
    //checking if table is updated
    if($update!=NULL)
    {
        //        echo "<script>alert('Details Updated...');</script>";
        echo "<script>location='users/user_edit_profile.php?status=1'</script>";
    }
    else
    {
        //        echo "<script>alert('Details are not Updated...');</script>";
        echo "<script>location='users/user_edit_profile.php?status=2'</script>";
    }
}

if(isset($_POST['edit_user_password'])){
    //getting values from form
    $db = db::open();
    $old_password=$db->real_escape_string($_POST['old_password']);
    $new_password=$db->real_escape_string($_POST['new_password']);
    $confirm_password=$db->real_escape_string($_POST['confirm_password']);

    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    //checking if old password and email is correct
    $query = "SELECT * from user_login where email='$email' AND password ='$old_password' ";
    $old_password   = db::getRecord($query);

    //it works if credentials are correct
    if($old_password != NULL){

        //checking if new and confirm password are same
        if($new_password == $confirm_password){

            //it works if passwords are matched
            //update data in table
            $query = "UPDATE user_login SET password='$new_password',modified_on='$current_date',modified_by='$email' where email='$email' ";
            $run   = db::query($query);

            //            echo "<script>alert('Updated Password...');</script>";
            echo "<script>location='users/user_change_password.php?status=1'</script>";
        }
        else{
            //it works when passwords are not matched
            //            echo "<script>alert('Password are not matched...');</script>";
            echo "<script>location='users/user_change_password.php?status=2'</script>";
        }
    }
    else
    {
        //it works when old password is not correct
        //        echo "<script>alert('Old Password is not correct...');</script>";
        echo "<script>location='users/user_change_password.php?status=3'</script>";
    }
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_banner'])){

    //    echo "Hello world!<br>";
    //    exit();

    //getting vlaues from form
    $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc      = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_type     = $_FILES['file']['type'];
    $folder        = "files/banners/";
    $new_size      = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file    = str_replace(' ', '-', $new_file_name);

    $db             = db::open();
    $title         = $db->real_escape_string($_POST['title']);
    $description    = $db->real_escape_string($_POST['description']);

    $status=0;

    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    //this function move file to directory
    //then code works if file is moved
    if(move_uploaded_file($file_loc, $folder . $final_file)){

        //Insert data in table include file
        $query ="INSERT into banner (title,description,image_name,image_type,created_on,created_by,status) VALUES ('$title','$description','$final_file','$file_type','$current_date','$email','$status')";
        $insert= db::query($query);
    }
    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Banner Inserted Successfully...');</script>";
        echo "<script>location='banners/banner.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='banners/banner.php?status=4'</script>";
    }

}

if(isset($_POST['edit_banner'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $title         = $db->real_escape_string($_POST['edit_title']);
    $description    = $db->real_escape_string($_POST['edit_description']);

    //checking if status is checked or =1

    //    if(isset($_POST['status'])) {
    //        $status = $_POST['status'];
    //    }else{
    //        $status = 0;
    //    }

    if(isset($_POST['status'])) {
        $status = 0;
    }else{
        $status = 1;
    }


    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/banners/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from banner where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['image_name'];
            $dir       = "files/banners/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE banner SET image_name='$final_file',image_type='$file_type',title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE banner SET title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
        $update   = db::query($query);

    }


    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='banners/banner.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='banners/banner.php?status=4'</script>";
    }
}

if(isset($_POST['delete_banner'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];

    //getting row to delete image
    $query     = "SELECT * from banner where id='$delete_id'";
    $rec       = db::getRecord($query);

    //assigning value to delete image in directory
    $data      = $rec['image_name'];
    $dir       = "files/banners/";
    $dirHandle = opendir($dir);
    while ($file      = readdir($dirHandle)) {
        if ($file == $data) {
            unlink($dir . '/' . $file);
        }
    }
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from banner where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Banner Deleted Successfully...');</script>";
        echo "<script>location='banners/banner.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='banners/banner.php?status=4'</script>";
    }
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_category'])){


    //    echo "Hello world!<br>";
    //    exit();

    //getting vlaues from form
    $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc      = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_type     = $_FILES['file']['type'];
    $folder        = "files/categories/";
    $new_size      = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file    = str_replace(' ', '-', $new_file_name);

    $db             = db::open();
    $c_name         = $db->real_escape_string($_POST['c_name']);

    //this function move file to directory
    //then code works if file is moved
    if(move_uploaded_file($file_loc, $folder . $final_file)){

        //Insert data in table include file
        $query ="INSERT into category (c_name,image_name,image_type) VALUES ('$c_name','$final_file','$file_type')";
        $insert= db::query($query);
    }
    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Category Inserted Successfully...');</script>";
        echo "<script>location='sub_category/category.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/category.php?status=5'</script>";
    }

}

if(isset($_POST['edit_category'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $c_name         = $db->real_escape_string($_POST['edit_c_name']);

    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/categories/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from category where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['image_name'];
            $dir       = "files/categories/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE category SET image_name='$final_file',image_type='$file_type',c_name='$c_name' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE category SET c_name='$c_name' where id='$id'";
        $update   = db::query($query);
    }

    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Category Updated Successfully...');</script>";
        echo "<script>location='sub_category/category.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/category.php?status=5'</script>";
    }
}

if(isset($_POST['delete_category'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];


    $query                = "SELECT * from product  where c_id='$delete_id' ";
    $products        = db::getRecords($query);

    if($products!=NULL){
        foreach($products as $product)
        {
            $id=$product['id'];

            $query                = "SELECT * from product_image  where product_id='$id' ";
            $product_images        = db::getRecords($query);
            //            print_r($product_images);



            foreach($product_images as $product_image) {
                $data      = $product_image['image_name'];
                $dir       = "files/product/images/";
                $dirHandle = opendir($dir);
                while ($file      = readdir($dirHandle)) {
                    if ($file == $data) {
                        unlink($dir . '/' . $file);
                    }
                }

            }

            $query        = "DELETE from product_image  where product_id='$id' ";
            $del        = db::query($query);
            //        print_r($query);
            closedir($dirHandle);


            //deleteing row
            $query = "DELETE from product where id='$id'";
            $del   = db::query($query);

        }
    }

    //deleteing row

    $query        = "DELETE from product_data  where product_id='$id' ";
    $del        = db::query($query);

    $query = "DELETE from sub_category where c_id='$delete_id'";
    $del   = db::query($query);

    //getting row to delete image
    $query     = "SELECT * from category where id='$delete_id'";
    $rec       = db::getRecord($query);

    //assigning value to delete image in directory
    $data      = $rec['image_name'];
    $dir       = "files/categories/";
    $dirHandle = opendir($dir);
    while ($file      = readdir($dirHandle)) {
        if ($file == $data) {
            unlink($dir . '/' . $file);
        }
    }
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from category where id='$delete_id'";
    $del   = db::query($query);



    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='sub_category/category.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/category.php?status=5'</script>";
    }
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_sub_category'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $c_id         = $db->real_escape_string($_POST['c_id']);
    $sc_name         = $db->real_escape_string($_POST['sc_name']);

    //Insert data in table include file
    $query ="INSERT into sub_category (c_id,sc_name) VALUES ('$c_id','$sc_name')";
    $insert= db::query($query);

    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Category Inserted Successfully...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=5'</script>";
    }

}

if(isset($_POST['edit_sub_category'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $sc_name         = $db->real_escape_string($_POST['edit_sc_name']);
    $c_id         = $db->real_escape_string($_POST['edit_c_id']);


    //update data in table exclude file
    $query = "UPDATE sub_category SET c_id='$c_id',sc_name='$sc_name' where id='$id'";
    $update   = db::query($query);

    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Category Updated Successfully...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=5'</script>";
    }
}

if(isset($_POST['delete_sub_category'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];


    $query                = "SELECT * from product  where sc_id='$delete_id' ";
    $products        = db::getRecords($query);

    if($products!=NULL){
        foreach($products as $product)
        {
            $id=$product['id'];

            $query                = "SELECT * from product_image  where product_id='$id' ";
            $product_images        = db::getRecords($query);
            //            print_r($product_images);



            foreach($product_images as $product_image) {
                $data      = $product_image['image_name'];
                $dir       = "files/product/images/";
                $dirHandle = opendir($dir);
                while ($file      = readdir($dirHandle)) {
                    if ($file == $data) {
                        unlink($dir . '/' . $file);
                    }
                }

            }

            $query        = "DELETE from product_image  where product_id='$id' ";
            $del        = db::query($query);
            //        print_r($query);
            closedir($dirHandle);


            //deleteing row
            $query = "DELETE from product where id='$id'";
            $del   = db::query($query);

        }
    }

    //deleteing row

    $query        = "DELETE from product_data  where product_id='$id' ";
    $del        = db::query($query);

    //deleteing row
    $query = "DELETE from sub_category where id='$delete_id'";
    $del   = db::query($query);


    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=5'</script>";
    }
}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_product'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $c_id         = $db->real_escape_string($_POST['c_id']);
    $sc_id         = $db->real_escape_string($_POST['sc_id']);
    $title         = $db->real_escape_string($_POST['name']);
    $discount         = $db->real_escape_string($_POST['discount']);
    $description         = $db->real_escape_string($_POST['description']);

    //checking if status is checked or =1
    if (isset($_POST['status'])) {
        $featured = $_POST['status'];
    } else {
        $featured = 0;
    }

    if (isset($_POST['sale'])) {
        $sale = $_POST['sale'];
    } else {
        $sale = 0;
    }

    if (isset($_POST['stock'])) {
        $stock = $_POST['stock'];
    } else {
        $stock = 0;
    }

    if (isset($_POST['exclusive'])) {
        $exclusive = $_POST['exclusive'];
    } else {
        $exclusive = 0;
    }

    if (isset($_POST['limited'])) {
        $limited = $_POST['limited'];
    } else {
        $limited = 0;
    }

    if (isset($_POST['hot'])) {
        $hot = $_POST['hot'];
    } else {
        $hot = 0;
    }



    //Insert data into table
    $query ="INSERT into product (c_id,sc_id,name,discount,description,featured,sale,stock,exclusive,limited,hot) VALUES ('$c_id','$sc_id','$title','$discount','$description','$featured','$sale','$stock','$exclusive','$limited','$hot')";
    $insert= db::query($query);



    $query = "SELECT MAX(id) from product";
    $rec = db::getRecord($query);
    $id = $rec['MAX(id)'];

    //print_r($query);
    //exit();

    $s = $_POST['size'];
    $c = $_POST['color'];
    $p = $_POST['price'];
    $size_stocks = $_POST['size_stock'];



    $soize = sizeof($s);

    if($soize)
    {
        for($i=0; $i<$soize; $i++)
        {
            $size=$s[$i];
            $price=$p[$i];
            $color=$c[$i];
            $size_stock=$size_stocks[$i];

            $query="INSERT into product_data (product_id , size, color, price, stock)VALUES('$id' , '$size' ,'$color' , '$price', '$size_stock')";
            $insert=db::query($query);
        }
    }


    $images_name = NULL;
    //move multiple files

    if (!empty($_FILES['file'])) {

        foreach ($_FILES['file']['name'] as $i => $name) {
            $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'][$i];
            $file_loc      = $_FILES['file']['tmp_name'][$i];
            $file_size     = $_FILES['file']['size'][$i];
            $file_type     = $_FILES['file']['type'][$i];
            $folder        = "files/product/images/";
            $new_size      = $file_size / 1024;
            $new_file_name = strtolower($file);
            $final_file    = str_replace(' ', '-', $new_file_name);

            if (move_uploaded_file($file_loc, $folder . $final_file)) {
                $images_name = $images_name . $final_file . ",";
            }
        }
    }

    $arr=explode(',',$images_name);

    $size=sizeof($arr);




    for($i=0;$i<$size-1;$i++)
    {
        $img_name=$arr[$i];

        $query="INSERT into product_image (product_id,image_name) VALUES ('$id','$img_name')";

        $insert=db::query($query);
    }





    //    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Category Inserted Successfully...');</script>";
        echo "<script>location='sc_product/product.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sc_product/product.php?status=9'</script>";
    }

}

if(isset($_POST['edit_product'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $id         = $db->real_escape_string($_POST['edit_id']);
    $c_id         = $db->real_escape_string($_POST['c_id']);
    $sc_id         = $db->real_escape_string($_POST['sc_id']);
    $title         = $db->real_escape_string($_POST['name']);
    $discount         = $db->real_escape_string($_POST['discount']);
    $description         = $db->real_escape_string($_POST['description']);

    //checking if status is checked or =1
    if (isset($_POST['status'])) {
        $featured = $_POST['status'];
    } else {
        $featured = 0;
    }

    if (isset($_POST['sale'])) {
        $sale = $_POST['sale'];
    } else {
        $sale = 0;
    }

    if (isset($_POST['stock'])) {
        $stock = $_POST['stock'];
    } else {
        $stock = 0;
    }


    if (isset($_POST['exclusive'])) {
        $exclusive = $_POST['exclusive'];
    } else {
        $exclusive = 0;
    }

    if (isset($_POST['limited'])) {
        $limited = $_POST['limited'];
    } else {
        $limited = 0;
    }

    if (isset($_POST['hot'])) {
        $hot = $_POST['hot'];
    } else {
        $hot = 0;
    }


    //update data in table exclude file
    $query ="UPDATE product SET c_id='$c_id',sc_id='$sc_id',name='$title',description='$description',discount='$discount',featured='$featured',sale='$sale',stock='$stock',exclusive='$exclusive',limited='$limited',hot='$hot' where id='$id'";
    $update   = db::query($query);


    //exit();
    //check if Tags are written in form


    //    if(isset($_POST['edit_tags']))
    //    {
    //        $query="DELETE from article_tag where article_id='$id'";
    //        $del=db::query($query);
    //
    //
    //        $tags=implode(" ",$_POST['edit_tags']);
    //
    //        $tags=explode(",",$tags);
    //
    //        foreach($tags as $tag)
    //        {
    //            if($tag!=NULL)
    //            {
    //                //Insert data into table
    //                $query="INSERT into article_tag (article_id,name) VALUES ('$id','$tag')";
    //                $insert=db::query($query);
    //            }
    //        }
    //
    //
    //    }
    //    //    exit();
    //
    //
    //    //move multiple files
    //

    if (!empty($_FILES['file']['name'][0])) {

        $query                = "SELECT * from product_image  where product_id='$id' ";
        $product_images        = db::getRecords($query);
        //            print_r($product_images);



        foreach($product_images as $product_image) {
            $data      = $product_image['image_name'];
            $dir       = "files/product/images/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }

        }

        $query        = "DELETE from product_image  where product_id='$id' ";
        $del        = db::query($query);
        //        print_r($query);
        closedir($dirHandle);

        $images_name = NULL;
        foreach ($_FILES['file']['name'] as $i => $name) {
            $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'][$i];
            $file_loc      = $_FILES['file']['tmp_name'][$i];
            $file_size     = $_FILES['file']['size'][$i];
            $file_type     = $_FILES['file']['type'][$i];
            $folder        = "files/product/images/";
            $new_size      = $file_size / 1024;
            $new_file_name = strtolower($file);
            $final_file    = str_replace(' ', '-', $new_file_name);

            if (move_uploaded_file($file_loc, $folder . $final_file)) {
                $images_name = $images_name . $final_file . ",";
            }
        }

        $arr=explode(',',$images_name);

        $size=sizeof($arr);

        for($i=0;$i<$size-1;$i++)
        {
            $img_name=$arr[$i];

            $query="INSERT into product_image (product_id,image_name) VALUES ('$id','$img_name')";

            $insert=db::query($query);
            //                print_r($query);
        }
    }



    //    exit();
    echo "<script>location='sc_product/product.php?status=2'</script>";


}

if(isset($_POST['edit_product_data'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $id         = $db->real_escape_string($_POST['edit_id']);
    $s         = $_POST['size'];
    $c        = $_POST['color'];
    $p         = $_POST['price'];
    $size_stocks = $_POST['size_stock'];


    $soize = sizeof($s);

    if($soize)
    {
        $query        = "DELETE from product_data  where product_id='$id' ";
        $del        = db::query($query);

        //        print_r($query);
        //        print_r($del);
        for($i=0; $i<$soize; $i++)
        {
            $size=$s[$i];
            $price=$p[$i];
            $color=$c[$i];
            $size_stock=$size_stocks[$i];

            $query="INSERT into product_data (product_id , size, color, price, stock)VALUES('$id' , '$size' ,'$color' , '$price', '$size_stock')";
            $insert=db::query($query);
        }
    }
    //
    //    print_r($query);
    //    print_r($insert);
    //
    //
    //    exit();


    //    exit();
    echo "<script>location='sc_product/product.php?status=2'</script>";


}

if(isset($_POST['delete_product'])){

    //geeting value from form
    $id            = $_POST['delete_id'];

    $query        = "DELETE from product_data  where product_id='$id' ";
    $del        = db::query($query);

    $query                = "SELECT * from product_image  where product_id='$id' ";
    $product_images        = db::getRecords($query);
    //            print_r($product_images);



    foreach($product_images as $product_image) {
        $data      = $product_image['image_name'];
        $dir       = "files/product/images/";
        $dirHandle = opendir($dir);
        while ($file      = readdir($dirHandle)) {
            if ($file == $data) {
                unlink($dir . '/' . $file);
            }
        }

    }

    $query        = "DELETE from product_image  where product_id='$id' ";
    $del        = db::query($query);
    //        print_r($query);
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from product where id='$id'";
    $del   = db::query($query);



    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='sc_product/product.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sc_product/product.php?status=4'</script>";
    }
}






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_video'])){

    //    echo "Hello world!<br>";
    //    exit();

    //getting vlaues from form
    $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc      = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_type     = $_FILES['file']['type'];
    $folder        = "files/videos/";
    $new_size      = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file    = str_replace(' ', '-', $new_file_name);

    $db             = db::open();
    $title         = $db->real_escape_string($_POST['title']);
    $url         = $db->real_escape_string($_POST['url']);


    //this function move file to directory
    //then code works if file is moved
    if(move_uploaded_file($file_loc, $folder . $final_file)){

        //Insert data in table include file
        $query ="INSERT into video (title,video_name,video_type) VALUES ('$title','$final_file','$file_type')";
        $insert= db::query($query);
    }else{
        $query ="INSERT into video (title,url) VALUES ('$title','$url')";
        $insert= db::query($query);

    }
    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Banner Inserted Successfully...');</script>";
        echo "<script>location='video.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='video.php?status=4'</script>";
    }

}

if(isset($_POST['edit_video'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $title         = $db->real_escape_string($_POST['edit_title']);
    $url         = $db->real_escape_string($_POST['edit_url']);

    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/videos/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from video where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['video_name'];
            $dir       = "files/videos/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE video SET video_name='$final_file',video_type='$file_type',title='$title' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE video SET title='$title',url='$url' where id='$id'";
        $update   = db::query($query);
    }

    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='video.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='video.php?status=4'</script>";
    }
}

if(isset($_POST['delete_video'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];

    //getting row to delete image
    $query     = "SELECT * from video where id='$delete_id'";
    $rec       = db::getRecord($query);

    //assigning value to delete image in directory
    $data      = $rec['video_name'];
    $dir       = "files/videos/";
    $dirHandle = opendir($dir);
    while ($file      = readdir($dirHandle)) {
        if ($file == $data) {
            unlink($dir . '/' . $file);
        }
    }
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from video where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Banner Deleted Successfully...');</script>";
        echo "<script>location='video.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='video.php?status=4'</script>";
    }
}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Delete Cart product
if (isset($_GET['user_id'])) {

    $product_id = $_GET['product_id'];
    $product_data_id = $_GET['product_data_id'];
    $user_id = $_GET['user_id'];


    $query = "SELECT * from temp_cart  where product_id='$product_id' AND product_data_id='$product_data_id' AND user_id='$user_id' ";
    $rec   = db::getRecord($query);



    $query = "DELETE from temp_cart where product_id='$product_id' AND product_data_id='$product_data_id' AND user_id='$user_id' ";
    $del   = db::query($query);



    echo "<script>location='../cart.php?status=1'</script>";
}







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Delete wishlist product
if (isset($_GET['w_user_id'])) {

    $product_id = $_GET['w_product_id'];
    $user_id = $_GET['w_user_id'];


    $query = "SELECT * from wishlist  where product_id='$product_id' AND user_id='$user_id' ";
    $rec   = db::getRecord($query);



    $query = "DELETE from wishlist where product_id='$product_id' AND user_id='$user_id' ";
    $del   = db::query($query);



    echo "<script>location='../wishlist.php?status=1'</script>";
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if(isset($_POST['sign_newsletter_with_intrest'])){
    $db             = db::open();
    $email         = $db->real_escape_string($_POST['email']);
    $checks         = $_POST['check'];

    //print_r($checks);

    if($checks!=NULL){
        foreach ($checks as $check){
            echo $check;
        }
    }

    $query = "SELECT * from users where email='$email'";
    $user =db::getRecord($query);

    if($user!=NULL){

        if($user['verify']=='0'){

            $query ="UPDATE users SET newsletter='1' where email='$email'";
            $update   = db::query($query);

            $query     = "SELECT * from newsletter_intrests where email='$email'";
            $recs       = db::getRecords($query);


            if($recs!=NULL){

                $query = "DELETE from newsletter_intrests where email='$delete_email'";
                $del   = db::query($query);

                //        print_r($query);
                //        print_r($del);

            }
            if($checks!=NULL){
                foreach ($checks as $check){
                    $query = "INSERT  into newsletter_intrests (email,c_id) VALUES ('$email','$check')";
                    $insert   = db::query($query);
                }
            }

            echo "<script>alert('You have Subscribed!!');</script>";

        }else{

            $query     = "SELECT * from newsletter_intrests where email='$email'";
            $recs       = db::getRecords($query);


            if($recs!=NULL){

                $query = "DELETE from newsletter_intrests where email='$delete_email'";
                $del   = db::query($query);

                //        print_r($query);
                //        print_r($del);

            }

            if($checks!=NULL){
                foreach ($checks as $check){
                    $query = "INSERT  into newsletter_intrests (email,c_id) VALUES ('$email','$check')";
                    $insert   = db::query($query);
                }
            }

            echo "<script>alert('You have Subscribed Already...');</script>";

        }


    }else{

        $query = "SELECT * from newsletter where email='$email'";
        $data =db::getRecord($query);


        if($data['email']!=$email){

            $query     = "SELECT * from newsletter_intrests where email='$email'";
            $recs       = db::getRecords($query);


            if($recs!=NULL){

                $query = "DELETE from newsletter_intrests where email='$delete_email'";
                $del   = db::query($query);

                //        print_r($query);
                //        print_r($del);

            }

            $query = "INSERT  into newsletter (email) VALUES ('$email')";
            $insert   = db::query($query);

            if($checks!=NULL){
                foreach ($checks as $check){
                    $query = "INSERT  into newsletter_intrests (email,c_id) VALUES ('$email','$check')";
                    $insert   = db::query($query);
                }
            }


            echo "<script>alert('You have Subscribed!!');</script>";

        }else{

            $query     = "SELECT * from newsletter_intrests where email='$email'";
            $recs       = db::getRecords($query);


            if($recs!=NULL){

                $query = "DELETE from newsletter_intrests where email='$delete_email'";
                $del   = db::query($query);

                //        print_r($query);
                //        print_r($del);

            }

            $query = "INSERT  into newsletter (email) VALUES ('$email')";
            $insert   = db::query($query);

            if($checks!=NULL){
                foreach ($checks as $check){
                    $query = "INSERT  into newsletter_intrests (email,c_id) VALUES ('$email','$check')";
                    $insert   = db::query($query);
                }
            }

            echo "<script>alert('Newsletter Subscription Updated...');</script>";

        }

    }

    echo "<script>location='../index.php'</script>";

}



if(isset($_POST['sign_newsletter'])){
    $db             = db::open();
    $email         = $db->real_escape_string($_POST['email']);


    $query = "SELECT * from users where email='$email'";
    $user =db::getRecord($query);

    if($user!=NULL){

        if($user['verify']=='0'){

            $query ="UPDATE users SET newsletter='1' where email='$email'";
            $update   = db::query($query);

            echo "<script>alert('You have Subscribed!!');</script>";

        }else{

            echo "<script>alert('You have Subscribed Already...');</script>";

        }


    }else{

        $query = "SELECT * from newsletter where email='$email'";
        $data =db::getRecord($query);


        if($data['email']!=$email){

            $query = "INSERT  into newsletter (email) VALUES ('$email')";
            $insert   = db::query($query);


            echo "<script>alert('You have Subscribed!!');</script>";

        }else{


            echo "<script>alert('You have Subscribed Already...');</script>";

        }

    }

    echo "<script>location='../index.php'</script>";

}

if(isset($_POST['send_newsletter_to_users'])){

    $db             = db::open();

    $description         = $db->real_escape_string($_POST['description']);
    $users         = $_POST['users'];

    $addresses=array("");
    $results="";
    $newsletters="";

    $first_user = $users['0'];
   // print_r($users);

    if($first_user == '0'){
        $query = "SELECT * from newsletter";
        $results =db::getRecords($query);

        $query = "SELECT * from users where newsletter='1'";
        $newsletters =db::getRecords($query);


        if($results!=NULL){
            foreach($results as $result)
            {
                   $addresses[] = $result['email'];

            }
        }

        if($newsletters!=NULL){
            foreach($newsletters as $newsletter)
            {
                $addresses[] = $newsletter['email'];

            }
        }
    }else{

    $size = sizeof($users);

    if($size)
    {
        for($i=0; $i<$size; $i++)
        {
            $user_email=$users[$i];

            $addresses[] = $user_email;
        }
    }

    }
    //print_r($addresses);
    if($addresses){
        $to = implode(", ", $addresses);
        $subject = 'PP PACK';
        $message=file_get_contents("newsletter.html");

        $variables= array(



            "{{description}}" => $description

        );

        foreach($variables as $key => $value){
            $message= str_replace($key, $value, $message);
        }

        $headers = NULL;
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        mail($to,$subject,$message,$headers);

    }

    echo "<script>location='newsletter.php?status=2'</script>";

}


if(isset($_POST['send_newsletter'])){

    $db             = db::open();

    $description         = $db->real_escape_string($_POST['description']);
    $intrest         = $db->real_escape_string($_POST['c_id']);

    $addresses=array("");
    $results="";
    $newsletters="";


    if($intrest==0){
        $query = "SELECT * from newsletter";
        $results =db::getRecords($query);

        $query = "SELECT * from users where newsletter='1'";
        $newsletters =db::getRecords($query);


        if($results!=NULL){
            foreach($results as $result)
            {
                   $addresses[] = $result['email'];

            }
        }

        if($newsletters!=NULL){
            foreach($newsletters as $newsletter)
            {
                $addresses[] = $newsletter['email'];

            }
        }
    }else{

        $query = "SELECT * from newsletter_intrests where c_id='$intrest'";
        $results =db::getRecords($query);

        if($results!=NULL){
            foreach($results as $result)
            {
                  $addresses[] = $result['email'];

            }
        }


    }

    if($addresses){
        $to = implode(", ", $addresses);
        $subject = 'PP PACK';
        $message=file_get_contents("newsletter.html");

        $variables= array(



            "{{description}}" => $description

        );

        foreach($variables as $key => $value){
            $message= str_replace($key, $value, $message);
        }

        $headers = NULL;
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        mail($to,$subject,$message,$headers);

    }
    echo "<script>location='newsletter.php?status=2'</script>";

}

if(isset($_POST['delete_newsletter'])){

    $delete_email = $_POST['delete_email'];

    $query     = "SELECT * from newsletter where email='$delete_email'";
    $rec       = db::getRecord($query);

    $query     = "SELECT * from newsletter_intrests where email='$delete_email'";
    $recs       = db::getRecords($query);

    //    print_r($query);
    //    print_r($rec);

    if($recs!=NULL){

        $query = "DELETE from newsletter_intrests where email='$delete_email'";
        $del   = db::query($query);

        //        print_r($query);
        //        print_r($del);

    }
    if($rec!=NULL){

        $query = "DELETE from newsletter where email='$delete_email'";
        $del   = db::query($query);

        //        print_r($query);
        //        print_r($del);

    }

    $query = "SELECT * from users where email='$delete_email'";
    $newsletters =db::getRecord($query);

    //    print_r($query);
    //    print_r($newsletters);

    if($newsletters!=NULL){

        $query ="UPDATE users SET newsletter='0' where email='$delete_email'";
        $update   = db::query($query);
    }


    echo "<script>location='newsletter.php'</script>";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['order_paid'])){

    $order_id            = $_POST['edit_id'];

    $query         = "SELECT * from orders where order_id='$order_id' ";
    $order = db::getRecord($query);


    $query = "UPDATE orders SET payment_status='paid'  where order_id='$order_id' ";
    $run   = db::query($query);

    echo "<script>location='dashboard.php?status=1'</script>";
}

if(isset($_POST['order_complete'])){

    $order_id            = $_POST['edit_id'];

    //    echo "$order_id";

    $query         = "SELECT * from orders where order_id='$order_id' ";
    $order = db::getRecord($query);


    $query = "UPDATE orders SET payment_status='complete'  where order_id='$order_id' ";
    $run   = db::query($query);

    echo "<script>location='dashboard.php?status=0'</script>";
}

if(isset($_POST['order_delete'])){

    $delete_id            = $_POST['delete_id'];

    //echo "$delete_id";
    $query         = "SELECT * from orders where order_id='$delete_id' ";
    $order = db::getRecord($query);

    $query = "DELETE from order_detail where order_id='$delete_id'";
    $del   = db::query($query);
    $query = "DELETE from orders where order_id='$delete_id'";
    $del   = db::query($query);

    echo "<script>location='dashboard.php?status=0'</script>";

}






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['donation_paid'])){

    $order_id            = $_POST['edit_id'];

    $query         = "SELECT * from donation where donate_id='$order_id' ";
    $order = db::getRecord($query);


    $query = "UPDATE donation SET payment_status='paid'  where donate_id='$order_id' ";
    $run   = db::query($query);

    echo "<script>location='dashboard.php?status=2'</script>";
}


if(isset($_POST['donation_delete'])){

    $delete_id            = $_POST['delete_id'];

    //echo "$delete_id";
    $query         = "SELECT * from donation where donate_id='$delete_id' ";
    $order = db::getRecord($query);

    $query = "DELETE from donation where donate_id='$delete_id'";
    $del   = db::query($query);

    echo "<script>location='dashboard.php?status=3'</script>";

}







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['filter'])) {

    $db             = db::open();
    $c_id         = $db->real_escape_string($_POST['merchant']);
    $sc_id        = $db->real_escape_string($_POST['category']);
    $amounts        = $db->real_escape_string($_POST['amount']);

    //    echo "$search";
    //    echo "$search1";
    //    echo "$search2";

    $product_ids ="";
    $id ="";

    //    exit();

    $amount=explode(" - ",$amounts);

    $min = $amount[0] ;
    $max = $amount[1] ;

    $size2 = 0;
    $size1 = 0;

    $query = "SELECT DISTINCT product_id from product_data where  price >='$min' AND price<='$max' ";
    $products_data = db::getRecords($query);
    //        print_r($query);
    //        print_r($products_data);

    $query = "SELECT * from product where  c_id='$c_id' AND  sc_id='$sc_id' ";
    $products = db::getRecords($query);


    //
    //    print_r($amount);
    //        print_r($query);
    //        print_r($products);
    //
    //        exit();

    if(is_array($products_data))
    {
        $size2=sizeof($products_data);
    }
    if(is_array($products))
    {
        $size1=sizeof($products);
    }

    if($size1!=NULL OR $size2!=NULL){
        if($size2>$size1){

            if($products_data!=null){

                foreach($products_data as $product_data){

                    if($products!=null){

                        foreach($products as $product){

                            if($product_data['product_id']==$product['id']){

                                $product_id            = $product['id'];

                                //            $query = "SELECT * from article where id='$article_id'";
                                //            $searched_article = db::getRecord($query);
                                //
                                //            print_r($product_id);

                                $product_ids .=  $product_id."_";
                                //                            echo"br";

                            }


                        }
                    }

                }
            }


        }
        else{

            if($products!=null){

                foreach($products as $product){

                    if($products_data!=null){

                        foreach($products_data as $product_data){

                            if($product_data['product_id']==$product['id']){

                                $product_id            = $product['id'];

                                //            $query = "SELECT * from article where id='$article_id'";
                                //            $searched_article = db::getRecord($query);
                                //
                                //            print_r($product_id);

                                $product_ids .=  $product_id."_";

                                //                             echo"br";
                            }


                        }
                    }

                }
            }

        }
    }else{

        echo "No Products Find!!";
    }




    //    ../articles.php?status=5&id=9


    //    print_r($searched_articles_tags);
    //        print_r($product_ids);

    //    echo "<script>location='../filter.php?status=".$product_ids."'</script>";
    echo "<script>location='../filter.php?status=".$product_ids."&id=".$c_id."'</script>";

?>
<!--
<script>
window.location.href="../articles.php?status=<?php echo $article_ids; ?>&id=<?php echo $ids; ?>";
</script>
-->
<?php

}


if (isset($_POST['search'])) {

    $db             = db::open();
    $search         = $db->real_escape_string($_POST['search_text']);


    //    echo "$search";
    //    echo "$search1";
    //    echo "$search2";

    $product_ids ="";
    $id ="";

    //    exit();

    $query = "SELECT DISTINCT id from product where  name LIKE '%".$search."%'";
    $products = db::getRecords($query);

    //    print_r($amount);
    //    print_r($query);
    //    print_r($products);




    if($products!=null){

        foreach($products as $product){

            $product_id            = $product['id'];

            //            $query = "SELECT * from article where id='$article_id'";
            //            $searched_article = db::getRecord($query);
            //


            $product_ids .=  $product_id."_";

        }
    }





    //    ../articles.php?status=5&id=9


    //    print_r($searched_articles_tags);
    //        print_r($product_ids);

    //    echo "<script>location='../filter.php?status=".$product_ids."'</script>";
    echo "<script>location='../search.php?status=".$product_ids."'</script>";

?>
<!--
<script>
window.location.href="../articles.php?status=<?php echo $article_ids; ?>&id=<?php echo $ids; ?>";
</script>
-->
<?php

}








////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_coupon'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $code         = $db->real_escape_string($_POST['code']);
    $value         = $db->real_escape_string($_POST['value']);
    $status=0;

    //Insert data in table include file
    $query ="INSERT into coupon (code,value,status) VALUES ('$code','$value','$status')";
    $insert= db::query($query);

    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Category Inserted Successfully...');</script>";
        echo "<script>location='coupon.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='coupon.php?status=5'</script>";
    }

}

if(isset($_POST['edit_coupon'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $code         = $db->real_escape_string($_POST['edit_code']);
    $value         = $db->real_escape_string($_POST['edit_value']);

    //checking if status is checked or =1

    //    if(isset($_POST['status'])) {
    //        $status = $_POST['status'];
    //    }else{
    //        $status = 0;
    //    }

    if(isset($_POST['status'])) {
        $status = 0;
    }else{
        $status = 1;
    }

    //update data in table exclude file
    $query = "UPDATE coupon SET code='$code',value='$value',status='$status' where id='$id'";
    $update   = db::query($query);

    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Category Updated Successfully...');</script>";
        echo "<script>location='coupon.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='coupon.php?status=5'</script>";
    }
}

if(isset($_POST['delete_coupon'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];


    $query                = "SELECT * from article  where sc_id='$delete_id' ";
    $articles        = db::getRecords($query);

    if($articles!=NULL){
        foreach($articles as $article)
        {
            $id=$article['id'];
            $query="DELETE from article_tag where article_id='$id'";
            $del=db::query($query);

            $query                = "SELECT * from article_file  where article_id='$id' ";
            $article_images        = db::getRecords($query);

            foreach($article_images as $article_image) {
                $data      = $article_image['file_name'];
                $dir       = "files/articles/primary_images/";
                $dirHandle = opendir($dir);
                while ($file      = readdir($dirHandle)) {
                    if ($file == $data) {
                        unlink($dir . '/' . $file);
                    }
                }
                $query        = "DELETE from article_file where article_id='$id' ";
                $del        = db::query($query);
            }

            closedir($dirHandle);

            $query                = "SELECT * from article_image  where article_id='$id' ";
            $article_images        = db::getRecords($query);

            foreach($article_images as $article_image) {
                $data      = $article_image['image_name'];
                $dir       = "files/articles/secondary_images/";
                $dirHandle = opendir($dir);
                while ($file      = readdir($dirHandle)) {
                    if ($file == $data) {
                        unlink($dir . '/' . $file);
                    }
                }
                $query        = "DELETE from article_image where article_id='$id' ";
                $del        = db::query($query);
            }

            closedir($dirHandle);

            //getting file name to delete
            $del_image_query     = "SELECT * from article_video where article_id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['video_name'];
            $dir       = "files/articles/video/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }

            $query        = "DELETE from article_video where article_id='$id' ";
            $del        = db::query($query);

            closedir($dirHandle);
            //deleteing row
            $query = "DELETE from article where id='$id'";
            $del   = db::query($query);

        }
    }

    //deleteing row
    $query = "DELETE from sub_category where id='$delete_id'";
    $del   = db::query($query);

    $query = "DELETE from mini_category where sc_id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='sub_category/sub_category.php?status=5'</script>";
    }
}









////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if(isset($_POST['product_review'])){
    $db             = db::open();
    $review         = $db->real_escape_string($_POST['review']);
    $rating = $db->real_escape_string($_POST['rating']);
    $user_id = $db->real_escape_string($_POST['user_id']);
    $product_id = $db->real_escape_string($_POST['product_id']);

    $query="INSERT into product_review (user_id,product_id,rating,review) VALUES ('$user_id','$product_id','$rating','$review')";
    $insert=db::query($query);
    //            print_r($query);

    //        exit();
    echo "<script>location='../productdetail.php?id=".$product_id."'</script>";

}






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['edit_terms'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);


    //update data in table exclude file
    $query = "UPDATE terms SET description='$description' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='terms.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='terms.php?status=4'</script>";
    }
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['edit_returns'])){
    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);


    //update data in table exclude file
    $query = "UPDATE return_policy SET description='$description' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='return_policy.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='return_policy.php?status=4'</script>";
    }
}








////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['edit_about'])){
    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);


    //update data in table exclude file
    $query = "UPDATE about SET description='$description' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='about/about.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='about/about.php?status=4'</script>";
    }
}






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['edit_about_footer'])){
    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);


    //update data in table exclude file
    $query = "UPDATE about_footer SET description='$description' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='about_footer.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='about_footer.php?status=4'</script>";
    }
}


if(isset($_POST['edit_about_img'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();


    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/banners/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from about where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['image_name'];
            $dir       = "files/banners/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE about SET image_name='$final_file',image_type='$file_type' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE about SET image_name='$final_file',image_type='$file_type' where id='$id'";
        $update   = db::query($query);
        //        print_r($query);
    }

    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='about/about.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='about/about.php?status=4'</script>";
    }
}



if(isset($_POST['edit_about_card'])){
    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);
    $title    = $db->real_escape_string($_POST['edit_title']);


    //update data in table exclude file
    $query = "UPDATE about_cards SET description='$description', title='$title' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='about/about_cards.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='about/about_cards.php?status=4'</script>";
    }
}






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_c_banner'])){

    //    echo "Hello world!<br>";
    //    exit();

    //getting vlaues from form
    $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc      = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_type     = $_FILES['file']['type'];
    $folder        = "files/banners/";
    $new_size      = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file    = str_replace(' ', '-', $new_file_name);

    $db             = db::open();
    $title         = $db->real_escape_string($_POST['title']);
    $description    = $db->real_escape_string($_POST['description']);

    $status=0;

    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    //this function move file to directory
    //then code works if file is moved
    if(move_uploaded_file($file_loc, $folder . $final_file)){

        //Insert data in table include file
        $query ="INSERT into card_banner (title,description,image_name,image_type,created_on,created_by,status) VALUES ('$title','$description','$final_file','$file_type','$current_date','$email','$status')";
        $insert= db::query($query);
    }
    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Banner Inserted Successfully...');</script>";
        echo "<script>location='card_banners/banner.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='card_banners/banner.php?status=4'</script>";
    }

}

if(isset($_POST['edit_c_banner'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $title         = $db->real_escape_string($_POST['edit_title']);
    $description    = $db->real_escape_string($_POST['edit_description']);

    //checking if status is checked or =1

    //    if(isset($_POST['status'])) {
    //        $status = $_POST['status'];
    //    }else{
    //        $status = 0;
    //    }

    if(isset($_POST['status'])) {
        $status = 0;
    }else{
        $status = 1;
    }


    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/banners/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from card_banner where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['image_name'];
            $dir       = "files/banners/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE card_banner SET image_name='$final_file',image_type='$file_type',title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE card_banner SET title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
        $update   = db::query($query);
        //print_r($query);
    }

    //exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='card_banners/banner.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='card_banners/banner.php?status=4'</script>";
    }
}

if(isset($_POST['delete_c_banner'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];

    //getting row to delete image
    $query     = "SELECT * from card_banner where id='$delete_id'";
    $rec       = db::getRecord($query);

    //assigning value to delete image in directory
    $data      = $rec['image_name'];
    $dir       = "files/banners/";
    $dirHandle = opendir($dir);
    while ($file      = readdir($dirHandle)) {
        if ($file == $data) {
            unlink($dir . '/' . $file);
        }
    }
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from card_banner where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Banner Deleted Successfully...');</script>";
        echo "<script>location='card_banners/banner.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='card_banners/banner.php?status=4'</script>";
    }
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_discount_banner'])){

    //    echo "Hello world!<br>";
    //    exit();

    //getting vlaues from form
    $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc      = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_type     = $_FILES['file']['type'];
    $folder        = "files/banners/";
    $new_size      = $file_size / 1024;
    $new_file_name = strtolower($file);
    $final_file    = str_replace(' ', '-', $new_file_name);

    $db             = db::open();
    $title         = $db->real_escape_string($_POST['title']);
    $description    = $db->real_escape_string($_POST['description']);

    $status=0;

    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    //this function move file to directory
    //then code works if file is moved
    if(move_uploaded_file($file_loc, $folder . $final_file)){

        //Insert data in table include file
        $query ="INSERT into discount_banner (title,description,image_name,image_type,created_on,created_by,status) VALUES ('$title','$description','$final_file','$file_type','$current_date','$email','$status')";
        $insert= db::query($query);
    }
    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Banner Inserted Successfully...');</script>";
        echo "<script>location='discounts/banner.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='discounts/banner.php?status=4'</script>";
    }

}

if(isset($_POST['edit_discount_banner'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $title         = $db->real_escape_string($_POST['edit_title']);
    $description    = $db->real_escape_string($_POST['edit_description']);

    //checking if status is checked or =1

    //    if(isset($_POST['status'])) {
    //        $status = $_POST['status'];
    //    }else{
    //        $status = 0;
    //    }

    if(isset($_POST['status'])) {
        $status = 0;
    }else{
        $status = 1;
    }


    //getting user email by session
    $email=$_SESSION['user_email'];

    //getting current date and time
    $date = time();
    $current_date = date('Y-m-d H:i:s', $date);

    // checking if file is posted
    if($_FILES['file']['name'] != NULL){

        $file          = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc      = $_FILES['file']['tmp_name'];
        $file_size     = $_FILES['file']['size'];
        $file_type     = $_FILES['file']['type'];
        $folder        = "files/banners/";
        $new_size      = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file    = str_replace(' ', '-', $new_file_name);

        //this function move file to directory
        //then code works if file is moved
        if(move_uploaded_file($file_loc, $folder . $final_file)){


            //getting file name to delete
            $del_image_query     = "SELECT * from discount_banner where id='$id'";
            $del_image_rec       = db::getRecord($del_image_query);

            //delete old file from directory
            $data      = $del_image_rec['image_name'];
            $dir       = "files/banners/";
            $dirHandle = opendir($dir);
            while ($file      = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink($dir . '/' . $file);
                }
            }
            closedir($dirHandle);

            //update data in table include file
            $query         = "UPDATE discount_banner SET image_name='$final_file',image_type='$file_type',title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
            $update          = db::query($query);
        }
    }
    else {

        //update data in table exclude file
        $query = "UPDATE discount_banner SET title='$title',description='$description',status='$status',modified_on='$current_date',modified_by='$email' where id='$id'";
        $update   = db::query($query);
        //print_r($query);
    }

    //exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='discounts/banner.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='discounts/banner.php?status=4'</script>";
    }
}

if(isset($_POST['delete_discount_banner'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];

    //getting row to delete image
    $query     = "SELECT * from discount_banner where id='$delete_id'";
    $rec       = db::getRecord($query);

    //assigning value to delete image in directory
    $data      = $rec['image_name'];
    $dir       = "files/banners/";
    $dirHandle = opendir($dir);
    while ($file      = readdir($dirHandle)) {
        if ($file == $data) {
            unlink($dir . '/' . $file);
        }
    }
    closedir($dirHandle);

    //deleteing row
    $query = "DELETE from discount_banner where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Banner Deleted Successfully...');</script>";
        echo "<script>location='discounts/banner.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='discounts/banner.php?status=4'</script>";
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['edit_contact_info'])){
    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $description    = $db->real_escape_string($_POST['edit_description']);


    //update data in table exclude file
    $query = "UPDATE contact_info SET description='$description' where id='$id'";
    $update   = db::query($query);
    //        print_r($query);


    //    exit();
    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Banner Updated Successfully...');</script>";
        echo "<script>location='contact.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='contact.php?status=4'</script>";
    }
}


/*
if(isset($_POST['delete_contact_info'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];


    $query                = "SELECT * from contact_info  where id='$delete_id' ";
    $articles        = db::getRecords($query);


    $query = "DELETE from contact_info where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='contact.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='contact.php?status=5'</script>";
    }
}
*/




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_new_social_link'])){


    //    echo "Hello world!<br>";
    //    exit();

    $db             = db::open();
    $title         = $db->real_escape_string($_POST['title']);
    $link         = $db->real_escape_string($_POST['link']);

    //Insert data in table include file
    $query ="INSERT into social_link (title,link) VALUES ('$title','$link')";
    $insert= db::query($query);

    //checking if data is inserted properly
    if($insert!=null){

        //        echo "<script>alert('Category Inserted Successfully...');</script>";
        echo "<script>location='social_link.php?status=1'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='social_link.php?status=5'</script>";
    }

}

if(isset($_POST['edit_social_link'])){

    //getting vlaues from form
    $id            = $_POST['edit_id'];
    $db             = db::open();
    $title         = $db->real_escape_string($_POST['edit_title']);
    $link         = $db->real_escape_string($_POST['edit_link']);

    //update data in table exclude file
    $query = "UPDATE social_link SET title='$title',link='$link' where id='$id'";
    $update   = db::query($query);

    //checking if table is updated
    if($update!=null){

        //        echo "<script>alert('Category Updated Successfully...');</script>";
        echo "<script>location='social_link.php?status=2'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='social_link.php?status=5'</script>";
    }
}

if(isset($_POST['delete_social_link'])){

    //geeting value from form
    $delete_id            = $_POST['delete_id'];


    $query                = "SELECT * from social_link  where id='$delete_id' ";
    $articles        = db::getRecords($query);


    $query = "DELETE from social_link where id='$delete_id'";
    $del   = db::query($query);

    //checking if row is deleted
    if($del!=null){

        //        echo "<script>alert('Category Deleted Successfully...');</script>";
        echo "<script>location='social_link.php?status=3'</script>";

    }
    else{

        //        echo "<script>alert('Sonething Went Wrong!...');</script>";
        echo "<script>location='social_link.php?status=5'</script>";
    }
}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['user_signup'])){
    $db             = db::open();
    $fname         = $db->real_escape_string($_POST['f_name']);
    $lname = $db->real_escape_string($_POST['l_name']);
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);
    $pass = $db->real_escape_string($_POST['pass']);
    $cpass = $db->real_escape_string($_POST['cpass']);



    if(isset($_POST['newsletter'])) {
        $newsletter = $_POST['newsletter'];
    }else{
        $newsletter = 0;
    }

    $query="SELECT * from users where  email='$email'";
    $rec=db::getRecord($query);
    //    print_r($query);

    if($rec==NULL)
    {
        if($pass==$cpass)
        {
            $code=rand(10,10000);

            $query="SELECT * from verification WHERE code='$code'";
            $code_record=db::getRecord($query);

            if($code_record!=NULL)
            {
                while($code_record!=NULL)
                {
                    $code=rand(10,10000);
                    $query="SELECT * from verification WHERE code='$code'";
                    $code_record=db::getRecord($query);

                }
            }

            $query="INSERT into verification (code,email) VALUES ('$code','$email')";
            $insert=db::query($query);
            //            print_r($query);


            $query="INSERT into users (f_name,l_name,email,phone,password,newsletter) VALUES ('$fname','$lname','$email','$phone','$pass','$newsletter')";
            $insert=db::query($query);
            //            print_r($query);


            $message=file_get_contents("../sign_up.html");

            $variables= array(



                "{{name}}" => $email,
                "{{comment}}" => $code

            );

            foreach($variables as $key => $value){
                $message= str_replace($key, $value, $message);
            }

            $to = "$email";
            $subject = "Verify Your Code!!";

            $headers = NULL;
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "MIME-Version: 1.0\r\n";

            $email=mail($to,$subject,$message,$headers);

            //            exit();
            echo "<script>location='../code.php'</script>";


        }
        else
        {
            //            exit();
            echo "<script>location='../register.php?status=1'</script>";
        }

    }
    else
    {
        //        exit();
        echo "<script>location='../register.php?status=2'</script>";
    }

}

if(isset($_POST['user_verify'])){
    $db = db::open();

    $email=$db->real_escape_string($_POST['email']);
    $code=$db->real_escape_string($_POST['code']);
    $pass=$db->real_escape_string($_POST['pass']);

    $query="SELECT * from users where email='$email' && status='0' && password='$pass'";
    $rec=db::getRecord($query);


    if($rec!=NULL)
    {

        $query="SELECT * from verification where email='$email' && code='$code'";
        $code_rec=db::getRecord($query);

        if($code_rec!=NULL)
        {

            $query         = "UPDATE users SET verify='1' where email='$email'";
            $run           = db::query($query);

            if($run!=NULL)
            {

                $query = "DELETE from verification where email='$email'";
                $del   = db::query($query);

                $query="INSERT into newsletter (email) VALUES ($email')";
                $insert=db::query($query);

                $_SESSION['customer_email']=$email;

                echo "<script>location='../index.php?status=Login_Successfull'</script>";

            }

            echo "<script>alert('Email Doesn't exists!');</script>";
        }

    }
    else
    {
        echo "<script>alert('Email or Password is not correct!');</script>";
    }
}

if(isset($_POST['user_login'])){
    $db = db::open();

    $email=$db->real_escape_string($_POST['email']);
    $password=$db->real_escape_string($_POST['pass']);

    $query="SELECT * from users where email='$email' && password='$password' && status='0' && verify='1'";
    $rec=db::getRecord($query);

    if($rec!=NULL)
    {
        $_SESSION['customer_email']=$email;

        echo "<script>location='../index.php?status=Login_Successful'</script>";
    }
    else
    {
        echo "<script>location='../index.php?status=1'</script>";
    }
}

if(isset($_GET['user_logout'])){

    unset ($_SESSION["customer_email"]);

    echo "<script>location='../index.php'</script>";

}

if(isset($_POST['save_customer_details'])){

    //getting values from form
    $db            = db::open();
    $id            = $_POST['edit_id'];

    $fname         = $db->real_escape_string($_POST['f_name']);
    $lname = $db->real_escape_string($_POST['l_name']);
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);


    //update data into table
    $query  = "UPDATE users SET f_name='$fname', l_name='$lname', email='$email', phone='$phone' where id='$id'";
    $update    = db::query($query);

    //it runs if data is updated
    if($update!=NULL)
    {
        //        echo "<script>alert('Access Updated...');</script>";
        echo "<script>location='../my_account.php?status=3'</script>";
    }
    else
    {
        //        echo "<script>alert('Access is not Updated...');</script>";
        echo "<script>location='../my_account.php?status=5'</script>";
    }
}




if(isset($_POST['edit_customer_access'])){

    //getting values from form
    $db            = db::open();
    $id            = $_POST['id'];

    //checking if status is checked or =1
    if(isset($_POST['status'])){
        $status = $_POST['status'];
    } else{
        $status = 0;
    }


    //update data into table
    $query  = "UPDATE users SET status='$status' where id='$id'";
    $update    = db::query($query);

    //it runs if data is updated
    if($update!=NULL)
    {
        //        echo "<script>alert('Access Updated...');</script>";
        echo "<script>location='customers/users.php?status=3'</script>";
    }
    else
    {
        //        echo "<script>alert('Access is not Updated...');</script>";
        echo "<script>location='customers/users.php?status=5'</script>";
    }
}



if(isset($_POST['edit_customer_password'])){
    //getting values from form
    $db = db::open();
     $id            = $_POST['edit_id'];
    $old_password=$db->real_escape_string($_POST['old_password']);
    $new_password=$db->real_escape_string($_POST['new_password']);
    $confirm_password=$db->real_escape_string($_POST['confirm_password']);



    //checking if old password and email is correct
    $query = "SELECT * from users where id='$id' AND password ='$old_password' ";
    $old_password   = db::getRecord($query);

    //it works if credentials are correct
    if($old_password != NULL){

        //checking if new and confirm password are same
        if($new_password == $confirm_password){

            //it works if passwords are matched
            //update data in table
            $query = "UPDATE users SET password='$new_password' where id='$id' ";
            $run   = db::query($query);

            //            echo "<script>alert('Updated Password...');</script>";
            echo "<script>location='../my_account.php?status=1'</script>";
        }
        else{
            //it works when passwords are not matched
            //            echo "<script>alert('Password are not matched...');</script>";
            echo "<script>location='../my_account.php?status=2'</script>";
        }
    }
    else
    {
        //it works when old password is not correct
        //        echo "<script>alert('Old Password is not correct...');</script>";
        echo "<script>location='../my_account.php?status=3'</script>";
    }
}




?>
