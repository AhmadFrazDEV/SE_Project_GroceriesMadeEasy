<?php
include("header.php");

$query = "SELECT * from sub_category";
$sub_categories =db::getRecords($query);

$query = "SELECT * from category";
$categories =db::getRecords($query);

$query = "SELECT * from product";
$products =db::getRecords($query);

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>


<!--
These Links are Used For Bootsrtrap InputTags!!
Use It In same Order!
-->
<link rel="stylesheet" href="dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/app.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">
    var status = "<?php echo $status; ?>";
    if (status == 1) {
        swal({
            title: "Successfully Added!",
            text: "  ",
            //   text: "Please Complete 2nd Step !",
            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if (status == 2) {
        swal({
            title: "Successfully Updated!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if (status == 3) {
        swal({
            title: "Successfully Deleted!",
            //            text: " Successfully Deleted ",
            //   text: "Please Complete 2nd Step !",
            type: "error",
            icon: "success",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if (status == 4) {
        swal({
            title: "Something Went Wrong!",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if (status == 5) {
        swal({
            title: "Access Successfully Updated!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if (status == 6) {
        swal({
            title: "Shared Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function() {
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/sc_product/product.php';
            const nextTitle = '';
            const nextState = {
                additionalInformation: ''
            };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

</script>
<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
                            </ol>
                        </nav>
                        <?php
                        if($user_role=='1'){


                        ?>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add"><i class="bx bx-image-add mr-1"></i>Add Product</button>
                                </div>
                            </div>
                        </nav>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->
<h2 class="mb-0 text-center h1 text-primary uppercase">Active Products</h2>
<hr>
<div class="row">
    <?php
    if ($products != NULL) {
        foreach ($products as $product) {
            $product_id          = $product['id'];
            $query               = "SELECT * from product_image where product_id='$product_id' ";
            $product_images      = db::getRecords($query);
    ?>
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card">

            <div class="card-body">
                <div id="slider<?php echo $product['id']; ?>" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" style="background-color:#04040457;border-radius:50px;">
                        <?php

            if($product_images!=null){

                $count=0;


                foreach($product_images as $product_image)
                {
                    if($count==0)
                    {
                        ?>
                        <li data-target="#slider<?php echo $product['id']; ?>" data-slide-to="<?php echo $count;?>" class="active"></li>
                        <?php

                    }
                    else{

                        ?>

                        <li data-target="#slider<?php echo $product['id']; ?>" data-slide-to="<?php echo $count;?>"></li>
                        <?php
                    }
                    $count++;
                }

            }
                        ?>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <?php

            if($product_images!=null){

                $count=0;


                foreach($product_images as $product_image)
                {

                    if($count == 0){
                        ?>
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" style="height:280px;" src="<?php echo "../files/product/images/".$product_image['image_name']; ?>" alt="slide" />
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <?php

                    }
                    else{

                        ?>

                        <div class="carousel-item">
                            <img class="img-fluid w-100" style="height:280px;" src="<?php echo "../files/product/images/".$product_image['image_name']; ?>" alt="slide" />
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <?php
                    }

                    $count++;
                }

            }
                        ?>




                    </div>

                    <a class="carousel-control-prev" href="#slider<?php echo $product['id']; ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider<?php echo $product['id']; ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
                <h3 class="text-Info my-2">Merchant: <?php

            $space = 0;
            $category_id= $product['c_id'];
            $query               = "SELECT * from category where id='$category_id' ";
            $catgeory      = db::getRecord($query);
            echo $catgeory['c_name'];
                    ?></h3>

                <h3 class="text-Info my-2">Product Name: <?php echo $product['name'];?></h3>

                <div style="height:70px">
                    <span class="text-Info "><?php
            $status = $product['featured'];
            if($status==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-success mb-1 "><?php echo "Featured"; ?></div>
                        <?php

            }else{


                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }

                        ?>
                    </span>

                    <span class="text-Info "><?php
            $sale = $product['sale'];
            if($sale==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-info mb-1 ml-1"><?php echo "OnSale"; ?></div>
                        <?php

            }else{

                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }

                        ?>
                    </span>

                    <span class="text-Info "><?php
            $stock = $product['stock'];
            if($stock==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-warning mb-1 ml-1"><?php echo "Out Of Stock"; ?></div>
                        <?php

            }else{

                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }

                        ?>
                    </span>

                    <span class="text-Info "><?php
            $exclusive = $product['exclusive'];
            if($exclusive==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-dark mb-1 ml-1"><?php echo "Website Exclusive"; ?></div>
                        <?php

            }else{

                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }
                        ?>
                    </span>

                    <span class="text-Info "><?php
            $limited = $product['limited'];
            if($limited==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-primary mb-1 ml-1"><?php echo "Limited Item"; ?></div>
                        <?php

            }else{

                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }

                        ?>
                    </span>

                    <span class="text-Info "><?php
            $hot = $product['hot'];
            if($hot==1){
                $space = 1;
                        ?>
                        <div class=" badge badge-glow badge-pill badge-danger mb-1 ml-1"><?php echo "Hot"; ?></div>
                        <?php

            }else{

                if($space==1){

                }else{
                    $space = 1;
                    echo "<br>";
                }
            }

                        ?>
                    </span>

                </div>

                <hr>
                <div class="profile-social mt-3 text-right">
                    <span data-toggle="modal" data-target="#view_modal<?php echo $product['id']; ?>">
                        <button data-toggle="popover" data-trigger="hover" data-original-title="View Product Detail" type="button" class="btn btn-linkedin text-center bg-success bg-darken-2 mr-1 text-white  float-left"><i class="fa fa-eye "></i></button>
                    </span>

                    <?php
            if($user_role=='1'){


                    ?>

                    <!--

<a   class="btn btn-linkedin " onclick="edit('<?php echo $product['id']; ?>','<?php echo $product['c_id']; ?>','<?php echo $product['sc_id']; ?>','<?php echo $product['name']; ?>','<?php echo $product['price']; ?>','<?php echo $product['description']; ?>','<?php echo $product['discount']; ?>','<?php echo $product['featured']; ?>')"><i class="bx bx-edit"></i></a>

-->
                    <span data-toggle="modal" data-target="#edit_modal<?php echo $product['id']; ?>">
                        <button data-toggle="popover" data-trigger="hover" data-original-title="Edit Product" type="button" class="btn btn-linkedin text-center mr-1 text-white"><i class="bx bx-edit"></i></button>
                    </span>
                    <span onclick="delete_article('<?php echo $product['id']; ?>')">
                        <a data-toggle="popover" data-trigger="hover" data-original-title="Delete Product" class="btn btn-pinterest "><i class="bx bx-trash"></i></a>
                    </span>
                    <?php
            }
                    ?>
                </div>

                <!-- Modal -->
                <div class="modal fade text-left" data-backdrop="false" id="view_modal<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title  my-1">View Product Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-start">
                                    <?php

            $product_id= $product['id'];
            $query               = "SELECT * from product_image where product_id='$product_id' ";
            $product_images      = db::getRecords($query);
                                    ?>
                                    <div class="col-lg-5 col-md-6 py-4 px-2">
                                        <div class="row justify-content-center">
                                            <div id="slide<?php echo $product_id; ?>" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <?php

            if($product_images!=null){

                $count=0;


                foreach($product_images as $product_image)
                {
                    if($count==0)
                    {
                                                    ?>
                                                    <li data-target="#slide<?php echo $product_id; ?>" data-slide-to="<?php echo $count;?>" class="active"></li>
                                                    <?php

                    }
                    else{

                                                    ?>

                                                    <li data-target="#slide<?php echo $product_id; ?>" data-slide-to="<?php echo $count;?>"></li>
                                                    <?php
                    }
                    $count++;
                }

            }
                                                    ?>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <?php

            if($product_images!=null){

                $count=0;


                foreach($product_images as $product_image)
                {

                    if($count == 0){
                                                    ?>
                                                    <div class="carousel-item active">
                                                        <img class="img-fluid w-100" src="<?php echo "../files/product/images/".$product_image['image_name']; ?>" alt="slide" style="height:60vh;" />
                                                        <div class="carousel-caption">

                                                        </div>
                                                    </div>
                                                    <?php

                    }
                    else{

                                                    ?>

                                                    <div class="carousel-item">
                                                        <img class="img-fluid w-100" src="<?php echo "../files/product/images/".$product_image['image_name']; ?>" alt="slide" style="height:60vh;" />
                                                        <div class="carousel-caption">

                                                        </div>
                                                    </div>
                                                    <?php
                    }

                    $count++;
                }

            }
                                                    ?>




                                                </div>
                                                <a class="carousel-control-prev" href="#slide<?php echo $product_id; ?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#slide<?php echo $product_id; ?>" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>

                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-lg-responsive table-md-responsive table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Size</th>
                                                            <th>Color</th>
                                                            <th>Price</th>
                                                            <th>Out Of Stock</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
            $p_id=$product['id'];
            $query = "SELECT * from product_data where product_id='$p_id'";
            $products_data = db::getRecords($query);



            if($products_data!=NULL)
            {

                foreach($products_data as $product_data)

                {

                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $product_data['size'];

                                                                ?>

                                                            </td>
                                                            <td> <span style="background-color:<?php echo $product_data['color']; ?>;border:1px solid #000;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </td>
                                                            <td> <?php echo $product_data['price']; ?></td>

                                                            <td>
                                                                <div class="custom-control custom-switch mt-2">
                                                                    <?php
                                                            if($product_data['stock']==1)
            {
                                                                ?>
                                                                    <input type="checkbox" class="custom-control-input " value="1" id="edit_size_stock" checked name="size_stock[]" disabled>
                                                                    <label class="h4 custom-control-label d-block" for="edit_size_stock"></label>

                                                                    <?php
                                                            }else{
                                                              ?>
                                                                    <input type="checkbox" class="custom-control-input " value="1" id="edit_size_stock" disabled name="size_stock[]">
                                                                    <label class="h4 custom-control-label d-block" for="edit_size_stock"></label>
                                                                    <?php
                                                            }
                                                                ?>
                                                                </div>
                                                            </td>




                                                        </tr>


                                                        <?php
                }

            }
            else{
                echo"Data is not Found!!";
            }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-7 col-md-6 py-4 px-2">

                                        <h2 class="text-primary ">Merchant: </h2>
                                        <h5 class="card-title ">
                                            <?php

            $category_id= $product['c_id'];
            $query               = "SELECT * from category where id='$category_id' ";
            $catgeory      = db::getRecord($query);
            echo $catgeory['c_name'];
                                            ?>
                                        </h5>

                                        <h2 class="text-primary ">Category: </h2>
                                        <h5 class="card-title ">
                                            <?php

            $sub_category_id= $product['sc_id'];
            $query               = "SELECT * from sub_category where id='$sub_category_id' ";
            $sub_catgeory      = db::getRecord($query);
            echo $sub_catgeory['sc_name'];
                                            ?></h5>


                                        <h2 class="text-primary ">Product Name: </h2>
                                        <h5 class="card-title ">
                                            <?php echo $product['name']; ?></h5>



                                        <h2 class="text-primary ">Discount: </h2>
                                        <h5 class="card-title ">
                                            <?php echo $product['discount']; ?></h5>

                                        <h2 class="text-primary ">Description: </h2>
                                        <h5 class="card-title ">
                                            <?php echo $product['description']; ?></h5>



                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div id="edit_modal<?php echo $product['id']; ?>" data-backdrop="false" class="modal edit_view_modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content radius-30">
                            <div class="modal-header bg-info border-bottom-0">
                                <h4 class="modal-title my-1">Edit Product </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-5">

                                <form action="../action.php" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="h4">Upload Images</label>
                                                <div class="file-upload-wrapper">
                                                    <input type="file" name="file[]" multiple class="file-upload" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Merchant Name</label>
                                        <select class="form-control form-control-lg" onclick="edit_c('<?php echo $product['id']; ?>')" id="edit_c_id<?php echo $product['id']; ?>" name="c_id" required>
                                            <?php $id= $product['c_id'];

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
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Category</label>
                                        <select class="form-control " onclick="edit_sc()" id="edit_sc_id<?php echo $product['id']; ?>" name="sc_id">
                                            <?php

            $id = $product ['sc_id'];
            $c_id = $product ['c_id'];

            //fetching sub categories

            $query = "SELECT * from sub_category where id='$id'";
            $sub_cat = db::getRecord($query);


            $query = "SELECT * from sub_category where c_id='$c_id'";
            $sub_categories = db::getRecords($query);

            $empty= "Select Option";
            $no_result= "No Resluts Found";
            $no_sc= "No category";

            if($sub_categories!=NULL)
            {
                //                echo "<option value=''>".$no_sc."</option>";
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
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Name</label>
                                        <input type="text" name="name" id="edit_a_name" value="<?php echo $product['name']; ?>" class="form-control form-control-lg radius-30" required />
                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Description</label>
                                        <textarea type="text" name="description" id="edit_a_description" rows="5" class="form-control form-control-lg radius-30" required><?php echo $product['description']; ?> </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Discount</label>
                                        <input type="text" name="discount" value="<?php echo $product['discount']; ?>" id="edit_a_discount" class="form-control form-control-lg radius-30" />
                                    </div>


                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $status = $product['featured'];
            if ($status == 1) {
                                        ?>
                                        <input type="checkbox" name="status" value="1" checked class="custom-control-input" id="<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="<?php echo $product['id']; ?>">Featured</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="status" value="1" class="custom-control-input" id="<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="<?php echo $product['id']; ?>">Featured</label>
                                        <?php } ?>
                                    </div>


                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $sale = $product['sale'];
            if ($sale == 1) {
                                        ?>
                                        <input type="checkbox" name="sale" value="1" checked class="custom-control-input" id="sale<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="sale<?php echo $product['id']; ?>">On Sale</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="sale" value="1" class="custom-control-input" id="sale<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="sale<?php echo $product['id']; ?>">On Sale</label>
                                        <?php } ?>
                                    </div>


                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $stock = $product['stock'];
            if ($stock == 1) {
                                        ?>
                                        <input type="checkbox" name="stock" value="1" checked class="custom-control-input" id="stock<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="stock<?php echo $product['id']; ?>">Out Of Stock</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="stock" value="1" class="custom-control-input" id="stock<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="stock<?php echo $product['id']; ?>">Out Of Stock</label>
                                        <?php } ?>
                                    </div>

                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $exclusive = $product['exclusive'];
            if ($exclusive == 1) {
                                        ?>
                                        <input type="checkbox" name="exclusive" value="1" checked class="custom-control-input" id="exclusive<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="exclusive<?php echo $product['id']; ?>">Website Exclusive</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="exclusive" value="1" class="custom-control-input" id="exclusive<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="exclusive<?php echo $product['id']; ?>">Website Exclusive</label>
                                        <?php } ?>
                                    </div>

                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $limited = $product['limited'];
            if ($limited == 1) {
                                        ?>
                                        <input type="checkbox" name="limited" value="1" checked class="custom-control-input" id="limited<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="limited<?php echo $product['id']; ?>">Limited Item</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="limited" value="1" class="custom-control-input" id="limited<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="limited<?php echo $product['id']; ?>">Limited Item</label>
                                        <?php } ?>
                                    </div>

                                    <div class="custom-control custom-control-success custom-switch mb-3">
                                        <?php
            $hot = $product['hot'];
            if ($hot == 1) {
                                        ?>
                                        <input type="checkbox" name="hot" value="1" checked class="custom-control-input" id="hot<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="hot<?php echo $product['id']; ?>">Hot</label>
                                        <?php } else {
                                        ?>
                                        <input type="checkbox" name="hot" value="1" class="custom-control-input" id="hot<?php echo $product['id']; ?>">
                                        <label class="h4 custom-control-label" data-label-off="NO" data-label-on="YES" for="hot<?php echo $product['id']; ?>">Hot</label>
                                        <?php } ?>
                                    </div>



                                    <input type="text" id="edit_id" value="<?php echo $product['id']; ?>" name="edit_id" hidden>
                                    <div class="form-group">
                                        <span onclick="edit_view()" data-dismiss="edit_view" data-toggle="modal" data-target="#view-details<?php echo $product['id']; ?>">
                                            <button data-toggle="popover" data-trigger="hover" data-original-title="Detailed View" type="button" class="btn btn-linkedin"><i class="fa fa-eye"></i></button>
                                        </span>

                                    </div>

                                    <hr />
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_product">Update </button>

                                        <button type="button" class="btn btn-secondary float-right  btn-lg mr-3" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade text-left" data-backdrop="false" id="view-details<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title  my-1">Detailed View</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-start">
                                    <form action="../action.php" method="post" enctype="multipart/form-data">

                                        <div class="col-md-12">
                                            <table id="example" class="table table-lg-responsive table-md-responsive table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Price</th>
                                                        <th>Out Of Stock</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
            $p_id=$product['id'];
            $query = "SELECT * from product_data where product_id='$p_id'";
            $products_data = db::getRecords($query);

            if($products_data!=NULL)
            {

                foreach($products_data as $product_data)

                {

                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" id="s" name="size[]" required value="<?php echo $product_data['size']; ?>">
                                                        </td>
                                                        <td> <input type="color" class="form-control" id="c" name="color[]" required value="<?php echo $product_data['color']; ?>"> </td>
                                                        <td> <input type="text" class="form-control" id="p" name="price[]" value="<?php echo $product_data['price']; ?>" required> </td>
                                                        <td>
                                                            <div class="custom-control custom-switch mt-2">
                                                                <?php
                                                            if($product_data['stock']==1)
            {
                                                                ?>
                                                                <input type="checkbox" class="custom-control-input " value="1" id="edit_size1_stock<?php echo $product_data['id']; ?>" checked name="size_stock[]">
                                                                <label class="h4 custom-control-label d-block" for="edit_size1_stock<?php echo $product_data['id']; ?>"></label>

                                                                <?php
                                                            }else{
                                                              ?>
                                                                <input type="checkbox" class="custom-control-input " value="1" id="edit_size1_stock<?php echo $product_data['id']; ?>" name="size_stock[]">
                                                                <label class="h4 custom-control-label d-block" for="edit_size1_stock<?php echo $product_data['id']; ?>"></label>
                                                                <?php
                                                            }
                                                                ?>
                                                            </div>
                                                        </td>

                                                    </tr>



                                                    <?php
                }

            }
            else{
                echo"Data is not Found!!";
            }
                                                    ?>

                                                </tbody>
                                                <tbody id="edit_fields<?php echo $product['id']; ?>">
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>


                                        <div class="col-md-12">
                                            <input type="text" id="edit_id" value="<?php echo $product['id']; ?>" name="edit_id" hidden>
                                            <div class="form-group mt-3">

                                                <button type="button" class="btn btn-success float-left  btn-lg mr-3" onclick="edit_add_field('<?php echo $product['id']; ?>')">Add</button>
                                                <button type="button" id="edit_remove_btn<?php echo $product['id']; ?>" class="edit_remove_btn btn btn-danger float-left  btn-lg" onclick="edit_remove_field('<?php echo $product['id']; ?>')" style="display:none;">Remove</button>
                                                <button type="submit" class="btn btn-primary float-right radius-30 btn-lg ml-3" name="edit_product_data">Update</button>

                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>




            </div>

        </div>


    </div>

    <?php
        }
    }
    else{
        echo "Data is not Found!!";
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="add" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Add Product</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class="h4">Upload Images</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="file[]" multiple class="file-upload" required />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="h4">Merchant Name</label>
                        <select class="form-control form-control-lg" id="c_id" name="c_id" required>
                            <option value="" selected disabled>Select Merchant</option>
                            <?php
                            if($categories!=NULL)
                            {
                                foreach($categories as $category)

                                {

                            ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['c_name']; ?> </option>
                            <?php
                                }
                            }

                            else{

                            ?>
                            <option value="" disabled><?php echo "No Category Found" ; ?> </option>
                            <?php
                            }


                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="h4">Category</label>
                        <select class="form-control" id="sub_category" name="sc_id">
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="h4">Name</label>
                        <input type="text" name="name" class="form-control form-control-lg radius-30" required />
                    </div>

                    <div class="form-group">
                        <label class="h4">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control form-control-lg radius-30" required> </textarea>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="featured" name="status">
                            <label class="h4 custom-control-label" for="featured">Featured</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="sale" name="sale">
                            <label class="h4 custom-control-label" for="sale">OnSale</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="stock" name="stock">
                            <label class="h4 custom-control-label" for="stock">Out Of Stock</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="exclusive" name="exclusive">
                            <label class="h4 custom-control-label" for="exclusive">Website Exclusive</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="limited" name="limited">
                            <label class="h4 custom-control-label" for="limited">Limited Item</label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" value="1" id="hot" name="hot">
                            <label class="h4 custom-control-label" for="hot">Hot</label>

                        </div>
                    </div>


                    <!--
<div class="form-group">
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="check"  name="status">
<label class="custom-control-label" for="check">Featured</label>
</div>
</div>
-->


                    <div class="form-group">
                        <label class="h4">Discount</label>
                        <input type="text" name="discount" class="form-control form-control-lg radius-30" />
                    </div>


                    <!--
<div class="form-inline">
<label class="h4 mr-1">Quantity</label>

<input type="text" class="form-control" id="s" name="size[]" required  >

<label class="h4 ml-5 mr-1">Price</label>

<input type="text" class="form-control" id="p" name="price[]" required  >
</div>
-->

                    <div class="form-group row">
                        <div class="col-md-6 col-lg-3">
                            <label class="h4 my-1 d-block">Size</label>

                            <input type="text" class="form-control " id="s" name="size[]" required>
                        </div>


                        <div class="col-md-6 col-lg-3">
                            <label class="h4 my-1 d-block">Color</label>

                            <input type="color" class="form-control" id="c" name="color[]" required>

                        </div>


                        <div class="col-md-6 col-lg-3">
                            <label class="h4 my-1 d-block">Price</label>

                            <input type="text" class="form-control" id="p" name="price[]" required>
                        </div>


                        <div class="col-md-6 col-lg-3">
                            <label class="h4 my-1 d-block">Out Of Stock</label>
                            <div class="custom-control custom-switch mt-2">

                                <input type="checkbox" class="custom-control-input " value="1" id="size_stock" name="size_stock[]">
                                <label class="h4 custom-control-label d-block" for="size_stock"></label>


                            </div>
                        </div>





                    </div>

                    <div id="fields">

                    </div>



                    <hr />
                    <label>Click here to Add sizes or colors and their prices!!</label>
                    <div class="form-group mt-3">

                        <button type="button" class="btn btn-success float-left  btn-lg mr-3" onclick="add_field()">Add</button>
                        <button type="button" id="remove_btn" class="btn btn-danger float-left  btn-lg" onclick="remove_field()">Remove</button>
                        <button type="submit" onclick="return validateForm()" class="btn btn-primary float-right radius-30 btn-lg" name="add_new_product">Submit</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!--
<div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content radius-30">
<div class="modal-header bg-info border-bottom-0">
<h4 class="modal-title my-1" >Details</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body p-5">

<form action="action.php" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label class="h4">Upload Images</label>
<div class="file-upload-wrapper">
<input type="file" name="file[]" multiple  class="file-upload"  />
</div>
</div>
</div>

</div>

<div class="form-group">
<label class="h4">Merchant Name</label>
<select class="form-control form-control-lg" onclick="edit_c()" id="edit_c_id" name="c_id" required>

</select>
</div>

<div class="form-group">
<label class="h4" >Category</label>
<select class="form-control " onclick="edit_sc()" id="edit_sc_id" name="sc_id" >
<option value="" >No Category</option>
</select>
</div>

<div class="form-group">
<label class="h4">Name</label>
<input type="text" name="title" id="edit_a_name"  class="form-control form-control-lg radius-30" required />
</div>
<div class="form-group">
<label class="h4">Price</label>
<input type="text" name="date"  id="edit_a_price"  class="form-control form-control-lg radius-30" required />
</div>

<div class="form-group">
<label class="h4">Description</label>
<textarea type="text" name="description" id="edit_a_description"  rows="5" class="form-control form-control-lg radius-30" required > </textarea>
</div>

<div class="form-group">
<label class="h4">Discount</label>
<input type="text" name="date"  id="edit_a_discount"  class="form-control form-control-lg radius-30" required />
</div>


<div class="form-group">
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="check"  name="status">
<label class="custom-control-label" for="check">Featured</label>
</div>
</div>



<input type="text" id="edit_id" name="edit_id"  hidden>
<div class="form-group">
<button type="button" class="btn btn-linkedin"  data-toggle="modal" data-target="#view-details"><i class="fa fa-eye" ></i></button>
</div>

<hr/>
<div class="form-group">
<button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_article">Update </button>
</div>
</form>
</div>
</div>
</div>
</div>

-->

<!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content  border-0">
            <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                <h5 class="modal-title" style="color:white;">Delete Product</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../action.php" method="POST">
                    <div class="modal-body">
                        <p class="text-danger">Are You Sure to Delete This</p>
                    </div>
                    <input type="text" id="delete_id" name="delete_id" hidden>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="delete_product" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
include("footer.php");
$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>

<script>
    function view(id) {
        document.getElementById("view_id").value = id;
        document.getElementById("myForm").submit();

        //        alert();
        if (status == 1) {
            document.getElementById("view_status").innerHTML = "Inactive";
            //             alert();
        } else {
            document.getElementById("view_status").innerHTML = "Active";
        }

        $("#view_modal").modal('show');
    }

    function edit(id, c_id, sc_id, name, price, description, discount, featured) {

        document.getElementById("edit_id").value = id;
        document.getElementById("edit_a_name").value = name;
        document.getElementById("edit_a_price").value = price;
        document.getElementById("edit_a_description").value = description;
        document.getElementById("edit_a_discount").value = discount;
        //        alert();
        if (featured == 1) {
            $("#check").prop("checked", true);
            //             alert();
        } else {
            $("#check").prop("checked", false);
        }

        var id = id;
        //        alert(id);



        var c_id = c_id;
        //        alert(c_id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "../ajax/sub_categories/edit/get_categories.php",
            type: "POST",
            data: "c_id=" + c_id,
            success: function(response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_c_id").html(response);
            },
        });

        var sc_id = sc_id;
        //        alert(sc_id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "../ajax/sub_categories/edit/get_sub_categories.php",
            type: "POST",
            data: {
                c_id: c_id,
                sc_id: sc_id
            },
            success: function(response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_sc_id").html(response);
            },
        });




        //        $("#edit_modal").modal('show');
    }

    function delete_article(id) {

        document.getElementById("delete_id").value = id;


        $("#delete_modal").modal('show');
    }

    function edit_view() {

        //        $(".edit_view_modal").modal('hide');
    }

</script>

<script>
    function edit_status(id, status) {
        document.getElementById("edit_status_id").value = id;

        //        alert();
        if (status == 1) {
            $("#check").prop("checked", true);
            //             alert();
        } else {
            $("#check").prop("checked", false);
        }

        $("#edit_status_modal").modal('show');
    }

</script>

<script>
    function get_user(id) {
        document.getElementById("article_id").value = id;
        var article_id = id;

        $.ajax({
            url: "ajax/get_users_data.php",
            type: "POST",
            data: {
                'article_id': article_id
            },
            success: function(response) {
                //                alert(response);
                $("#edit_users").html(response);
            },
        });

        $("#share_contest").modal('show');

    }

</script>

<script>
    //this function runs HTML Document runs!
    $(document).ready(function() {

        //This function runs when this id value will be change
        $("#c_id").on("change", function() {
            //fetch value
            var c_id = $(this).find("option:selected").val();
            //            alert(c_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "../ajax/sub_categories/get_sub_categories.php",
                type: "POST",
                data: "c_id=" + c_id,
                success: function(response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#sub_category").html(response);
                },
            });

        });



    });

    function edit_c(p_id) {
        //        alert();
        //This function runs when this id value will be change
        $("#edit_c_id" + p_id).on("change", function() {
            //fetch value
            var c_id = $(this).find("option:selected").val();
            //            alert(c_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "../ajax/sub_categories/get_sub_categories.php",
                type: "POST",
                data: "c_id=" + c_id,
                success: function(response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#edit_sc_id" + p_id).html(response);
                },
            });



        });
    }

    function edit_sc() {

        //This function runs when this id value will be change
        $("#edit_sc_id").on("change", function() {
            var sc_id = $(this).find("option:selected").val();
            //            alert(sc_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "ajax/get_mini_categories.php",
                type: "POST",
                data: "sc_id=" + sc_id,
                success: function(response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#edit_mc_id").html(response);
                },
            });

        });


    }

</script>


<script>
    var i = 1;
    $("#remove_btn").css("display", "none");

    function add_field() {

        $("#fields").append('<div id="custom"' + i + ' class="form-group row"><div class="col-md-6 col-lg-3"> <label class="h4 my-1 d-block">Size</label> <input type="text" class="form-control " id="s" name="size[]" required > </div> <div class="col-md-6 col-lg-3"> <label class="h4 my-1 d-block">Color</label> <input type="color" class="form-control" id="c" name="color[]" required > </div> <div class="col-md-6 col-lg-3"> <label class="h4 my-1 d-block">Price</label> <input type="text" class="form-control" id="p" name="price[]" required > </div> <div class="col-md-6 col-lg-3"> <label class="h4 my-1 d-block">Out Of Stock</label> <div class="custom-control custom-switch mt-2"> <input type="checkbox" class="custom-control-input " value="1" id="size_stock' + i + '"  name="size_stock[]"> <label class="h4 custom-control-label d-block" for="size_stock' + i + '"></label> </div> </div></div>');






        $("#remove_btn").css("display", "block");
        i++;
    }


    function remove_field() {

        $("#custom").remove();

        i--;

        if (i == 1) {
            $("#remove_btn").css("display", "none");
        }


    }


    var j = 1;

    function edit_add_field(id) {

        $("#edit_fields" + id).append('<tr id="edit_custom"' + j + '><td><input type="text" class="form-control" required id="s"' + j + ' name="size[]" ></td><td><input type="color" class="form-control" required id="c"' + j + ' name="color[]" ></td><td><input type="text" class="form-control" id="p"' + j + ' name="price[]" required ></td><td > <div class="custom-control custom-switch mt-2"> <?php if($product_data['stock']==1) { ?> <input type="checkbox" class="custom-control-input " value="1" id="edit_size_stock" checked name="size_stock[]"> <label class="h4 custom-control-label d-block" for="edit_size_stock"></label> <?php }else{ ?> <input type="checkbox" class="custom-control-input " value="1" id="edit_size_stock' + j + '" name="size_stock[]"> <label class="h4 custom-control-label d-block" for="edit_size_stock' + j + '"></label> <?php } ?> </div></td></tr>');


        $(".edit_remove_btn").css("display", "block");
        j++;
    }


    function edit_remove_field() {

        $("#edit_custom").remove();

        j--;
        //        alert(j);

        if (j == 1) {
            $(".edit_remove_btn").css("display", "none");
        }


    }

</script>
