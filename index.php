<?php
include("header.php");


$query = "SELECT * from category";
$categories = db::getRecords($query);

$query = "SELECT * from discount_banner where status='0'";
$discounted_banners =db::getRecords($query);

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    .modal-newsletter {
        color: #999;
        font-size: 15px;
        min-width: 300px;
    }

    .modal-newsletter .modal-content {
        padding: 40px;
        border-radius: 0;
        border: none;
    }

    .modal-newsletter .modal-header {
        border-bottom: none;
        position: relative;
        text-align: center;
        border-radius: 5px 5px 0 0;
    }

    .modal-newsletter h4 {
        color: #000;
        text-align: center;
        font-size: 30px;
        margin: 0 0 25px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .modal-newsletter .close {
        background: #c0c3c8;
        position: absolute;
        top: 0;
        right: 0;
        color: #fff;
        text-shadow: none;
        opacity: 0.5;
        width: 30px;
        height: 30px;
        border-radius: 20px;
        font-size: 19px;
        text-align: center;
        padding: 0;
    }

    .modal-newsletter .close span {
        position: relative;
        top: -1px;
    }

    .modal-newsletter .close:hover {
        opacity: 0.8;
    }

    .modal-newsletter .icon-box {
        color: #D9B49A;
        display: inline-block;
        z-index: 9;
        text-align: center;
        position: relative;
        margin-bottom: 10px;
    }

    .modal-newsletter .icon-box i {
        font-size: 110px;
    }

    .modal-newsletter .form-control,
    .modal-newsletter .btn {
        min-height: 46px;
        border-radius: 3px;
    }

    .modal-newsletter .form-control {
        box-shadow: none;
        border-color: #dbdbdb;
    }

    .modal-newsletter .form-control:focus {
        border-color: #D9B49A;
        box-shadow: 0 0 8px rgba(114, 101, 234, 0.5);
    }

    .modal-newsletter .btn {
        color: #fff;
        border-radius: 4px;
        background: #D9B49A;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        padding: 6px 20px;
        min-width: 150px;
        border: none;
    }

    .modal-newsletter .btn:hover,
    .modal-newsletter .btn:focus {
        background: #4e3de4;
        outline: none;
    }

    .modal-newsletter .input-group {
        margin: 30px 0 15px;
    }

    .hint-text {
        margin: 100px auto;
        text-align: center;
    }

</style>

<?php

if(!isset($_SESSION['notice_flag']))
{

?>

<div id="myModal" class="modal modal1 fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-newsletter" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="icon-box mx-auto">
                    <i class="fa fa-envelope-open-o"></i>
                </div>
                <button type="button" class="close" onclick="close_modal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="admin/action.php" method="post">
                <div class="modal-body text-center">
                    <h4>Subscribe to our newsletter</h4>
                    <p>Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p>
                    <h4>Intrests</h4>
                    <div class="align-items-center justify-content-start">


                        <?php
    $count = 0;
    if($categories!=null)
    {

        foreach($categories as $category){
            $count++;

                            ?>

                        <span class="mx-2">
                            <input type="checkbox" class="custom-control-input" id="rememberMe-<?php echo $count;?>" value="<?php echo $category['id']; ?>" name="check[]">
                            <label class="custom-control-label " for="rememberMe-<?php echo $count;?>"><?php echo $category['c_name']; ?></label>
                        </span>
                        <?php
        }
    }
    else
    {
        echo "No Results Yet!";
    }
                            ?>

                    </div>

                    <div class=" d-md-block mt-3">

                        <input type="email" class="form-control my-3" placeholder="Enter your email" required name="email">

                        <button type="submit" class="btn btn-primary my-3" name="sign_newsletter_with_intrest">
                            Subscribe</button>


                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php

    $_SESSION['notice_flag']=1;

}

?>

<?php

$query = "SELECT * from banner";
$banners = db::getRecords($query);

$query = "SELECT * from card_banner LIMIT 4";
$card_banners = db::getRecords($query);

if($banners!=null){

?>
<!-- Hero/Intro Slider Start -->
<div class="section">
    <div class="hero-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <?php
    foreach($banners as $banner)
    {

                ?>
                <!-- Single Hero Slider Item Start -->
                <div class="hero-slide-item-two swiper-slide">

                    <!-- Hero Slider Background Image Start-->
                    <div class="hero-slide-bg">
                        <img src="<?php echo "admin/files/banners/".$banner['image_name']; ?>" alt="" />
                    </div>
                    <!-- Hero Slider Background Image End-->

                    <!-- Hero Slider Container Start -->
                    <div class="container">

                        <div class="row">
                            <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                <h2 class="title">
                                    <?php echo $banner['title']; ?>
                                </h2>
                                <p><?php echo $banner['description']; ?></p>
                                <a href="product.php" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                            </div>
                        </div>

                    </div>
                    <!-- Hero Slider Container End -->

                </div>
                <!-- Single Hero Slider Item End -->

                <?php

    }

                ?>



            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-md-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
            <!-- Swiper Navigation End -->

        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->


<?php
}

if($card_banners!=null){

?>
<!-- Feature Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="feature-wrap">
            <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between mb-n5">

                <?php
    foreach($card_banners as $card_banner)
    {

                ?>
                <!-- Feature Start -->
                <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature">
                        <div class="icon text-primary align-self-center">
                            <img src="<?php echo "admin/files/banners/".$card_banner['image_name']; ?>" alt="Feature Icon">
                        </div>
                        <div class="content">
                            <h5 class="title"><?php echo $card_banner['title']; ?></h5>
                            <p><?php echo $card_banner['description']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Feature End -->
                <?php
}
?>

            </div>
        </div>
    </div>
</div>
<!-- Feature Section End -->
<?php
}
?>
<!-- Banner Section Start -->
<div class="section">
    <div class="container">

        <!-- Banners Start -->
        <div class="row mb-n6 overflow-hidden">
            <?php
if($discounted_banners!=null){
 foreach($discounted_banners as $discounted_banner)
    {
?>
            <!-- Banner Start -->
            <div class="col-md-6 col-12 mb-6">
                <div class="banner" data-aos="fade-right" data-aos-delay="300">
                    <div class="banner-image">
                        <a href="index.php"><img src="<?php echo "admin/files/banners/".$discounted_banner['image_name']; ?>" alt="Banner Image"></a>
                    </div>
                    <div class="info">
                        <div class="small-banner-content">
                            <h4 class="sub-title"><span><?php echo $discounted_banner['title']; ?></span></h4>
                            <h3 class="title"><?php echo $discounted_banner['description']; ?></h3>
                            <a href="product.php" class="btn btn-primary btn-hover-dark btn-sm">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->
            <?php
}
}

?>

        </div>
        <!-- Banners End -->
    </div>
</div>
<!-- Banner Section End -->



<!-- Product Section Start -->
<div class="section section-padding mt-0">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Tab Start -->
            <div class="col-12">
                <ul class="product-tab-nav nav justify-content-center mb-10 title-border-bottom mt-n3">
                    <li class="nav-item" data-aos="fade-up" data-aos-delay="300"><a class="nav-link active mt-3" data-bs-toggle="tab" href="#tab-product-all">New Arrivals</a></li>
                    <li class="nav-item" data-aos="fade-up" data-aos-delay="400"><a class="nav-link mt-3" data-bs-toggle="tab" href="#tab-product-clothings">Featured Products</a></li>

                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <!-- Section Title & Tab End -->

        <!-- Products Tab Start -->
        <div class="row">
            <div class="col">
                <div class="tab-content position-relative">

                    <div class="tab-pane fade show active" id="tab-product-all">
                        <div class="product-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    $query = "SELECT * from product ORDER BY id desc LIMIT 8";
                                    $latest_products = db::getRecords($query);

                                    if($latest_products!=null){
                                        foreach($latest_products as $latest_product)
                                        {
                                            $product_id = $latest_product['id'];
                                            $c_id = $latest_product['c_id'];

                                            $query = "SELECT * from category where id = $c_id ";
                                            $category = db::getRecord($query);


                                            $query = "SELECT * from product_data where product_id = '$product_id' ";
                                            $product_data = db::getRecords($query);

                                            $query = "SELECT * from product_image where product_id = '$product_id' ";
                                            $product_images = db::getRecords($query);


                                            if(is_array($product_images))
                                            {
                                                $size=sizeof($product_images);
                                            }
                                            else{
                                                $size = $product_images;
                                            }

                                    ?>
                                    <!-- Product Start -->
                                    <div class="swiper-slide product-wrapper">

                                        <?php

                                            if($size==1)
                                            {

                                        ?>
                                        <!-- Single Product Start -->
                                        <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                            <div class="thumb">

                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="image">
                                                    <img class="first-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                    <img class="second-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <?php
                                                if($latest_product['featured']==1){
                                                    ?> <span class="featured">Featured</span>
                                                    <?php
                                                }
                                                if($latest_product['sale']==1){
                                                    ?> <span class="sale">On Sale</span>
                                                    <?php
                                                }
                                                if($latest_product['stock']==1){
                                                    ?> <span class="stock">Out Of Stock</span>
                                                    <?php
                                                }
                                                if($latest_product['exclusive']==1){
                                                    ?> <span class="exclusive">Exclusive</span>
                                                    <?php
                                                }
                                                if($latest_product['limited']==1){
                                                    ?><span class="limited">Limted</span>
                                                    <?php
                                                }
                                                if($latest_product['hot']==1){
                                                    ?> <span class="hot">Hot</span>
                                                    <?php
                                                }

                                                    ?>


                                                </span>

                                                <div class="actions">
                                                    <a onclick="add_product_to_wishlist('<?php echo $latest_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                                <h5 class="title"><a href="productdetail.php?id=<?php echo $latest_product['id'];?>"><?php echo $latest_product['name']; ?></a></h5>

                                                <span class="price">
                                                    <?php
                                                $product_id = $latest_product['id'];
                                                $query = "SELECT * from product_data where product_id = '$product_id' ";
                                                $product_price = db::getRecord($query);

                                                if($product_price!=NULL){

                                                    //                $discount = $product['discount'];
                                                    if($latest_product['discount']!=NULL){
                                                        $discount = (float)$product_price['price']*((float)($latest_product['discount']/100));
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
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                        <?php

                                            }
                                            elseif($size>1){

                                        ?>
                                        <!-- Single Product Start -->
                                        <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                            <div class="thumb">
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="image">
                                                    <img class="first-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                    <img class="second-image" src="<?php echo "admin/files/product/images/".$product_images[1]['image_name']; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <?php
                                                if($latest_product['featured']==1){
                                                    ?> <span class="featured">Featured</span>
                                                    <?php
                                                }
                                                if($latest_product['sale']==1){
                                                    ?> <span class="sale">On Sale</span>
                                                    <?php
                                                }
                                                if($latest_product['stock']==1){
                                                    ?> <span class="stock">Out Of Stock</span>
                                                    <?php
                                                }
                                                if($latest_product['exclusive']==1){
                                                    ?> <span class="exclusive">Exclusive</span>
                                                    <?php
                                                }
                                                if($latest_product['limited']==1){
                                                    ?><span class="limited">Limted</span>
                                                    <?php
                                                }
                                                if($latest_product['hot']==1){
                                                    ?> <span class="hot">Hot</span>
                                                    <?php
                                                }

                                                    ?>


                                                </span>


                                                <div class="actions">
                                                    <a onclick="add_product_to_wishlist('<?php echo $latest_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                </div>

                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                                <h5 class="title"><a href="productdetail.php?id=<?php echo $latest_product['id'];?>"><?php echo $latest_product['name']; ?></a></h5>

                                                <span class="price">
                                                    <?php
                                                $product_id = $latest_product['id'];
                                                $query = "SELECT * from product_data where product_id = '$product_id' ";
                                                $product_price = db::getRecord($query);

                                                if($product_price!=NULL){

                                                    //                $discount = $product['discount'];
                                                    if($latest_product['discount']!=NULL){
                                                        $discount = (float)$product_price['price']*((float)($latest_product['discount']/100));
                                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                                        $discounted_price = (float)$product_price['price']-((float)$discount);


                                                    ?>

                                                    PKR<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
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
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                        <?php
                                            }
                                            else
                                            {
                                                echo "No image is found!";
                                            }



                                        ?>

                                    </div>
                                    <!-- Product End -->
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-md-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="tab-product-clothings">
                        <div class="product-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    $query = "SELECT * from product where featured='1' ";
                                    $latest_products = db::getRecords($query);

                                    if($latest_products!=null){
                                        foreach($latest_products as $latest_product)
                                        {
                                            $product_id = $latest_product['id'];
                                            $c_id = $latest_product['c_id'];

                                            $query = "SELECT * from category where id = $c_id ";
                                            $category = db::getRecord($query);


                                            $query = "SELECT * from product_data where product_id = '$product_id' ";
                                            $product_data = db::getRecords($query);

                                            $query = "SELECT * from product_image where product_id = '$product_id' ";
                                            $product_images = db::getRecords($query);


                                            if(is_array($product_images))
                                            {
                                                $size=sizeof($product_images);
                                            }
                                            else{
                                                $size = $product_images;
                                            }

                                    ?>
                                    <!-- Product Start -->
                                    <div class="swiper-slide product-wrapper">

                                        <?php

                                            if($size==1)
                                            {

                                        ?>
                                        <!-- Single Product Start -->
                                        <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                            <div class="thumb">

                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="image">
                                                    <img class="first-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                    <img class="second-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <?php
                                                if($latest_product['featured']==1){
                                                    ?> <span class="featured">Featured</span>
                                                    <?php
                                                }
                                                if($latest_product['sale']==1){
                                                    ?> <span class="sale">On Sale</span>
                                                    <?php
                                                }
                                                if($latest_product['stock']==1){
                                                    ?> <span class="stock">Out Of Stock</span>
                                                    <?php
                                                }
                                                if($latest_product['exclusive']==1){
                                                    ?> <span class="exclusive">Exclusive</span>
                                                    <?php
                                                }
                                                if($latest_product['limited']==1){
                                                    ?><span class="limited">Limted</span>
                                                    <?php
                                                }
                                                if($latest_product['hot']==1){
                                                    ?> <span class="hot">Hot</span>
                                                    <?php
                                                }

                                                    ?>


                                                </span>

                                                <div class="actions">
                                                    <a onclick="add_product_to_wishlist('<?php echo $latest_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                                <h5 class="title"><a href="productdetail.php?id=<?php echo $latest_product['id'];?>"><?php echo $latest_product['name']; ?></a></h5>

                                                <span class="price">
                                                    <?php
                                                $product_id = $latest_product['id'];
                                                $query = "SELECT * from product_data where product_id = '$product_id' ";
                                                $product_price = db::getRecord($query);

                                                if($product_price!=NULL){

                                                    //                $discount = $product['discount'];
                                                    if($latest_product['discount']!=NULL){
                                                        $discount = (float)$product_price['price']*((float)($latest_product['discount']/100));
                                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                                        $discounted_price = (float)$product_price['price']-((float)$discount);


                                                    ?>

                                                    PKR<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
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
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                        <?php

                                            }
                                            elseif($size>1){

                                        ?>
                                        <!-- Single Product Start -->
                                        <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                            <div class="thumb">
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="image">
                                                    <img class="first-image" src="<?php echo "admin/files/product/images/".$product_images[0]['image_name']; ?>" alt="Product" />
                                                    <img class="second-image" src="<?php echo "admin/files/product/images/".$product_images[1]['image_name']; ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
                                                    <?php
                                                if($latest_product['featured']==1){
                                                    ?> <span class="featured">Featured</span>
                                                    <?php
                                                }
                                                if($latest_product['sale']==1){
                                                    ?> <span class="sale">On Sale</span>
                                                    <?php
                                                }
                                                if($latest_product['stock']==1){
                                                    ?> <span class="stock">Out Of Stock</span>
                                                    <?php
                                                }
                                                if($latest_product['exclusive']==1){
                                                    ?> <span class="exclusive">Exclusive</span>
                                                    <?php
                                                }
                                                if($latest_product['limited']==1){
                                                    ?><span class="limited">Limted</span>
                                                    <?php
                                                }
                                                if($latest_product['hot']==1){
                                                    ?> <span class="hot">Hot</span>
                                                    <?php
                                                }

                                                    ?>


                                                </span>

                                                <div class="actions">
                                                    <a onclick="add_product_to_wishlist('<?php echo $latest_product['id'];?>')" title="Wishlist" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h4 class="sub-title"><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name'];?></a></h4>
                                                <h5 class="title"><a href="productdetail.php?id=<?php echo $latest_product['id'];?>"><?php echo $latest_product['name']; ?></a></h5>

                                                <span class="price">
                                                    <?php
                                                $product_id = $latest_product['id'];
                                                $query = "SELECT * from product_data where product_id = '$product_id' ";
                                                $product_price = db::getRecord($query);

                                                if($product_price!=NULL){

                                                    //                $discount = $product['discount'];
                                                    if($latest_product['discount']!=NULL){
                                                        $discount = (float)$product_price['price']*((float)($latest_product['discount']/100));
                                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                                        $discounted_price = (float)$product_price['price']-((float)$discount);


                                                    ?>

                                                    PKR<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
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
                                                <a href="productdetail.php?id=<?php echo $latest_product['id'];?>" class="btn btn-sm btn-outline-dark btn-hover-primary">Buy</a>
                                            </div>
                                        </div>
                                        <!-- Single Product End -->

                                        <?php
                                            }
                                            else
                                            {
                                                echo "No image is found!";
                                            }



                                        ?>

                                    </div>
                                    <!-- Product End -->
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>

                                <!-- Swiper Pagination Start -->
                                <div class="swiper-pagination d-md-none"></div>
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Tab End -->
    </div>
</div>
<!-- Product Section End -->


<?php
include("footer.php");

?>


<script>
    function add_product_to_wishlist(id) {
        var product_id = id;


        //            alert(product_id);


        $.ajax({
            url: "admin/ajax/product_data/add_product_to_wishlist.php",
            type: "POST",
            data: {
                'product_id': product_id
            },
            success: function(response) {

                alert(response);

            },
        });


    }

</script>


<script>
    $(document).ready(function() {
        $("#myModal").modal('show');

    });

    function close_modal() {
        $("#myModal").modal('hide');
    }

</script>
