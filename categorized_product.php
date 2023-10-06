<?php
include ("header.php");

$id = $_GET['id'];

$query = "SELECT * from product where c_id = $id ";
$categorized_products = db::getRecords($query);

$query = "SELECT * from category where id = $id ";
$category = db::getRecord($query);

?>



<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Shop</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->


<!-- Shop Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom">



                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_3">

                    <?php

                    if($categorized_products!=null){

                        foreach($categorized_products as $categorized_product)
                        {

                            $categorized_product_id = $categorized_product['id'];
                            $c_id = $categorized_product['c_id'];

                            $query = "SELECT * from category where id = $c_id ";
                            $category = db::getRecord($query);


                            $query = "SELECT * from product_data where product_id = '$categorized_product_id' ";
                            $product_data = db::getRecords($query);

                            $query = "SELECT * from product_image where product_id = '$categorized_product_id' ";
                            $product_images = db::getRecords($query);
                            $size = sizeof($product_images);

                            if(is_array($product_images))
                            {
                                $size=sizeof($product_images);
                            }
                            else{
                                $size = $product_images;
                            }

                    ?>

                    <!-- Single Product Start -->
                    <div class="col-lg-4 col-md-4 col-sm-6 product" data-aos="fade-up" data-aos-delay="200">
                        <?php

                            if($size==1)
                            {

                        ?>
                        <div class="product-inner">
                            <div class="thumb">

                                <a href="productdetail.php?id=<?php echo $categorized_product['id'];?>" class="image">
                                    <img class="first-image"  src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                    <img class="second-image"  src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                </a>
                                <span class="badges">
                                    <?php
                                if($categorized_product['featured']==1){
                                    ?> <span class="featured">Featured</span>
                                    <?php
                                }
                                if($categorized_product['sale']==1){
                                    ?> <span class="sale">On Sale</span>
                                    <?php
                                }
                                if($categorized_product['stock']==1){
                                    ?> <span class="stock">Out Of Stock</span>
                                    <?php
                                }
                                if($categorized_product['exclusive']==1){
                                    ?> <span class="exclusive">Exclusive</span>
                                    <?php
                                }
                                if($categorized_product['limited']==1){
                                    ?><span class="limited">Limted</span>
                                    <?php
                                }
                                if($categorized_product['hot']==1){
                                    ?> <span class="hot">Hot</span>
                                    <?php
                                }

                                    ?>


                                </span>
                                <div class="actions">                  
                                    <a onclick="add_product_to_wishlist('<?php echo $categorized_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                <h5 class="title"><a href="productdetail.php?id=<?php echo $categorized_product['id'];?>"><?php echo $categorized_product['name']; ?></a></h5>

                                <span class="price">
                                    <?php
                                $categorized_product_id = $categorized_product['id'];
                                $query = "SELECT * from product_data where product_id = '$categorized_product_id' ";
                                $product_price = db::getRecord($query);

                                if($product_price!=NULL){

                                    //                $discount = $product['discount'];
                                    if($categorized_product['discount']!=NULL){
                                        $discount = (float)$product_price['price']*((float)($categorized_product['discount']/100));
                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                        $discounted_price = (float)$product_price['price']-((float)$discount);


                                    ?>

                                    $<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
                                    <span class="old-price  new">&nbsp;<?php echo $discounted_price;?></span>
                                    <?php
                                    }else{



                                    ?>
                                    <span class="regular-price">PKR <?php echo $product_price['price'];?></span>

                                    <?php
                                    }

                                }

                                    ?>


                                </span>
                                <a href="productdetail.php?id=<?php echo $categorized_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                            </div>
                        </div>

                        <?php

                            }
                            elseif($size>1){

                        ?>
                        <div class="product-inner">
                            <div class="thumb">

                                <a href="productdetail.php?id=<?php echo $categorized_product['id'];?>" class="image">
                                    <img class="first-image"  src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                    <img class="second-image"  src="<?php echo "admin/files/product/images/".$product_images[1]['image_name']; ?>" alt="Product" />
                                </a>
                                <span class="badges">
                                    <?php
                                if($categorized_product['featured']==1){
                                    ?> <span class="featured">Featured</span>
                                    <?php
                                }
                                if($categorized_product['sale']==1){
                                    ?> <span class="sale">On Sale</span>
                                    <?php
                                }
                                if($categorized_product['stock']==1){
                                    ?> <span class="stock">Out Of Stock</span>
                                    <?php
                                }
                                if($categorized_product['exclusive']==1){
                                    ?> <span class="exclusive">Exclusive</span>
                                    <?php
                                }
                                if($categorized_product['limited']==1){
                                    ?><span class="limited">Limted</span>
                                    <?php
                                }
                                if($categorized_product['hot']==1){
                                    ?> <span class="hot">Hot</span>
                                    <?php
                                }

                                    ?>


                                </span>

                                <div class="actions">                  
                                    <a onclick="add_product_to_wishlist('<?php echo $categorized_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                <h5 class="title"><a href="productdetail.php?id=<?php echo $categorized_product['id'];?>"><?php echo $categorized_product['name']; ?></a></h5>

                                <span class="price">
                                    <?php
                                $categorized_product_id = $categorized_product['id'];
                                $query = "SELECT * from product_data where product_id = '$categorized_product_id' ";
                                $product_price = db::getRecord($query);

                                if($product_price!=NULL){

                                    //                $discount = $product['discount'];
                                    if($categorized_product['discount']!=NULL){
                                        $discount = (float)$product_price['price']*((float)($categorized_product['discount']/100));
                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                        $discounted_price = (float)$product_price['price']-((float)$discount);


                                    ?>

                                    $<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
                                    <span class="old-price  new">&nbsp;<?php echo $discounted_price;?></span>
                                    <?php
                                    }else{



                                    ?>
                                    <span class="regular-price">PKR <?php echo $product_price['price'];?></span>

                                    <?php
                                    }

                                }

                                    ?>


                                </span>
                                <a href="productdetail.php?id=<?php echo $categorized_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                            </div>
                        </div>
                        <?php
                            }

                        ?>
                    </div>
                    <!-- Single Product End -->

                    <?php
                        }
                    }
                    else
                    {
                        echo "No Products Yet!";
                    }


                    ?>

                </div>
                <!-- Shop Wrapper End -->

                <!--shop toolbar start-->


            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget mt-10 mt-lg-0">
                    <div class="widget_inner" data-aos="fade-up" data-aos-delay="200">

                        <div class="widget-list mb-10">
                            <img src="<?php echo "admin/files/categories/".$category['image_name']; ?>" style="width:250px;">

                        </div>
                        <div class="widget-list mb-10">
                            <h3 class="widget-title mb-4">Search</h3>
                            <form action="admin/action.php" method="post">
                                <div class="search-box">

                                    <input type="text" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store" name="search_text">
                                    <button class="btn btn-dark btn-hover-primary" type="submit" name="search">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                            </form>
                        </div>
                        <form action="admin/action.php" method="post">
                            <div class="widget-list mb-10">
                                <h3 class="widget-title mb-4">Merchants</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="sidebar-list">
                                        <?php

                                        $query = "SELECT * from category ";
                                        $categories = db::getRecords($query);


                                        if($categories!=null){

                                            foreach($categories as $category)
                                            {


                                        ?>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="merchant" id="example<?php echo $category['id'];?>" value="<?php echo $category['id'];?>" onclick="show_categories('<?php echo $category['id'];?>')" required >
                                                <label class="form-check-label " for="example<?php echo $category['id'];?>">
                                                    <?php echo $category['c_name'];?>
                                                </label>
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Results Yet!";
                                        }
                                        ?>
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div id="show_categories">

                                <div class="widget-list mb-10" >
                                    <h3 class="widget-title mb-4">Categories</h3>
                                    <!-- Widget Menu Start -->
                                    <nav >
                                        <p>Select Merchant</p>
                                    </nav>
                                    <!-- Widget Menu End -->
                                </div>

                            </div>

                            <div class="widget-list mb-10">
                                <h3 class="widget-title mb-5">Price Range</h3>
                                <!-- Widget Menu Start -->

                                <div id="slider-range"></div>

                                <input class="slider-range-amount" type="text" name="amount" id="amount" />
                                <button class="slider-range-submit" name="filter" type="submit">Filter</button>


                                <!-- Widget Menu End -->
                            </div>

                        </form>

                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->


<?php
include ("footer.php");
?>

<script>
    function show_categories(id)
    {
        var id=id;

        $.ajax({
            url: "get_sub_categories.php",
            type: "POST",
            data: {'id':id},
            success: function(response){

                //                    alert(response);
                $("#show_categories").html(response);
            },
        });

    } 

    function show_size(id)
    {
        var id=id;

        $.ajax({
            url: "get_sizes.php",
            type: "POST",
            data: {'id':id},
            success: function(response){

                //                    alert(response);
                $("#show_size").html(response);
            },
        });

    } 

    function add_product_to_wishlist(id)
    {
        var product_id=id;


        //            alert(product_id);


        $.ajax({
            url: "admin/ajax/product_data/add_product_to_wishlist.php",
            type: "POST",
            data: {'product_id':product_id},
            success: function(response){

                alert(response);

            },
        });


    } 



</script>
