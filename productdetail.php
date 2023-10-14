<?php
include ("header.php");

$id = $_GET['id'];
$query = "SELECT * from product where id = $id ";
$product = db::getRecord($query);

?>
<link rel="stylesheet" href="assets/css/radio.css">
<style>
    section {
        margin: 1rem auto;
    }
    h3 {
        font-weight: 700;
        text-transform: uppercase;
        color: #30302e;
    }
    h3 > small {
        font-weight: 200;
        font-size: 0.75em;
        color: #ccc;
    }
    .swatch {
        position: relative;
        margin: 1.5rem;
        width: 30px;
        height: 30px;
        border-radius: 30px;
        line-height: 30px;
        display: inline-block;
    }
    .swatch > [type="radio"], .swatch > [type="checkbox"] {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        opacity: 0;
    }
    .swatch > [type="radio"] + label, .swatch > [type="checkbox"] + label {
        width: 50px;
        height: 50px;
        border-radius: 0px;
        line-height: 50px;
        text-align: center;
        position: absolute;
        background-color: #cd1dbf;
        color: #fff;
        border: 1px solid #000;
        transition: all 0.5s ease-in-out;
    }
    .swatch > [type="radio"] + label i, .swatch > [type="checkbox"] + label i {
        opacity: 0;
        font-size: 1.5rem;
        transition: opacity 0.5s;
    }
    .swatch > [type="radio"]:checked + label i, .swatch > [type="checkbox"]:checked + label i {
        opacity: 1;
    }
    .swatch.orange > [type="radio"] + label, .swatch.orange > [type="checkbox"] + label {
        background-color: #e67e22;
        color: #fff;
    }
    .swatch.red > [type="radio"] + label, .swatch.red > [type="checkbox"] + label {
        background-color: #e74c3c;
        color: #fff;
    }
    .swatch.yellow > [type="radio"] + label, .swatch.yellow > [type="checkbox"] + label {
        background-color: #f1c40f;
        color: #fff;
    }
    .swatch.purple > [type="radio"] + label, .swatch.purple > [type="checkbox"] + label {
        background-color: #9b59b6;
        color: #fff;
    }

    .swatch.blue > [type="radio"] + label, .swatch.blue > [type="checkbox"] + label {
        background-color: #3498db;
        color: #fff;
    }
    .swatch > [type="radio"]:checked + label, .swatch > [type="checkbox"]:checked + label {
        width: 60px;
        height: 60px;
        border-radius: 0px;
        line-height: 60px;
        top: -6px;
        left: -6px;
        transition: all 0.5s ease-in-out;
    }
    .swatch > [type="radio"]:disabled + label, .swatch > [type="checkbox"]:disabled + label {
        width: 50px;
        height: 50px;
        border-radius: 0px;
        line-height: 50px;

        transition: all 0.5s ease-in-out;
    }
    .swatch > [type="radio"]:disabled + label i, .swatch > [type="checkbox"]:disabled + label i {
        opacity: 1;
        transition: opacity 0.5s;
    }
    .swatch > [type="radio"]:checked + label i, .swatch > [type="checkbox"]:checked + label i {
        opacity: 1;
        transition: opacity 0.5s;
    }
    .fa-check{
        padding-top: 8px;
    }
    .fa-times{
        padding-top: 8px;
    }

</style>
<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Single Product</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Single Product</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Single Product Section Start -->
<div class="section section-margin">
    <div class="container">

        <?php
        if($product!=null)
        {

            $product_id = $product['id'];
            $query = "SELECT * from product_image where product_id = $product_id  ";
            $product_images = db::getRecords($query);



        ?>
        <div class="row">

            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">

                <!-- Product Details Image Start -->
                <div class="product-details-img">

                    <!-- Single Product Image Start -->
                    <div class="single-product-img swiper-container gallery-top">
                        <div class="swiper-wrapper popup-gallery">
                            <?php
            foreach($product_images as $product_image)
            {
                            ?>
                            <a class="swiper-slide w-100" href="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>">
                                <img class="w-100" src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>" alt="Product">
                            </a>

                            <?php
            }
                            ?>
                        </div>
                    </div>
                    <!-- Single Product Image End -->

                    <!-- Single Product Thumb Start -->
                    <div class="single-product-thumb swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <?php
            foreach($product_images as $product_image)
            {
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>" alt="Product">
                            </div>

                            <?php
            }
                            ?>
                        </div>

                        <!-- Next Previous Button Start -->
                        <div class="swiper-button-horizental-next  swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                        <div class="swiper-button-horizental-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                        <!-- Next Previous Button End -->

                    </div>
                    <!-- Single Product Thumb End -->

                </div>
                <!-- Product Details Image End -->

            </div>
            <div class="col-lg-7 col-custom">

                <!-- Product Summery Start -->
                <div class="product-summery row">
                    <div class="col-lg-12">
                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title"><?php echo $product['name']; ?></h2>
                        </div>
                    </div>
                    <!-- Product Head End -->
                    <div class="col-lg-12">
                        <span class="badges" >
                            <?php
            if($product['featured']==1){
                            ?> <span class="featured mb-3" style="display:inline-block;">Featured</span>
                            <?php
            }
            if($product['sale']==1){
                            ?> <span class="sale mb-3" style="display:inline-block;">On Sale</span>
                            <?php
            }
            if($product['stock']==1){
                            ?> <span class="stock mb-3" style="display:inline-block;">Out Of Stock</span>
                            <?php
            }
            if($product['exclusive']==1){
                            ?> <span class="exclusive mb-3" style="display:inline-block;">Exclusive</span>
                            <?php
            }
            if($product['limited']==1){
                            ?><span class="limited mb-3" style="display:inline-block;">Limted</span>
                            <?php
            }
            if($product['hot']==1){
                            ?> <span class="hot mb-3" style="display:inline-block;">Hot</span>
                            <?php
            }

                            ?>


                        </span>
                    </div>
                    <!-- Product Meta Start -->
                    <div class="col-lg-12">
                        <div class="product-meta mb-3">
                            <!-- Product Size Start -->
                            <div class="product-size">
                                <span class="mb-2">Size :</span>
                                <div class="hb-colour-options mt-3">
                                    <?php
            if($product['stock']==1){

                $query = "SELECT DISTINCT size from product_data where product_id = '$product_id' ";
                $product_sizes = db::getRecords($query);

                if($product_sizes!=NULL){

                    $i=0;
                    foreach($product_sizes as $product_size)
                    {


                                    ?>
                                    <input type="radio"  onclick="show_color('<?php echo $product_size['size'];?>','<?php echo $product['id'];?>')" id="customRadioInline<?php echo $i; ?>" name="customRadioInline1" class="custom-control-input" disabled >
                                    <label class="custom-control-label" for="customRadioInline<?php echo $i; ?>" data-content="<?php echo $product_size['size'];?>"   ></label>
                                    <?php

                        $i++;
                    }
                }
            }
            else{


                $query = "SELECT DISTINCT size from product_data where product_id = '$product_id' ";
                $product_sizes = db::getRecords($query);

                if($product_sizes!=NULL){

                    $i=0;
                    foreach($product_sizes as $product_size)
                    {


                                    ?>
                                    <input type="radio"  onclick="show_color('<?php echo $product_size['size'];?>','<?php echo $product['id'];?>')" id="customRadioInline<?php echo $i; ?>" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline<?php echo $i; ?>" data-content="<?php echo $product_size['size'];?>"   ></label>
                                    <?php

                        $i++;
                    }
                }
            }
                                    ?>
                                </div>
                            </div>
                            <!-- Product Size End -->
                        </div>
                        <!-- Product Meta End -->
                    </div>

                    <!-- Product Color Variation Start -->
                    <div class="col-lg-12">
                        <div class="product-color-variation ">
                            <h6>Colors:<br></h6>

                            <div style="padding:8px 0px"  id="show_color_data">
                                <h6>Choose Size to show colors!</h6>
                            </div>
                            <!--
<?php
            $query = "SELECT DISTINCT color from product_data where product_id = '$product_id' ";
            $product_colors = db::getRecords($query);

            if($product_colors!=NULL){

                $i=1;
                foreach($product_colors as $product_color)
                {
                    //                    print_r( $product_color);
                    if($i==1){
                        if($product_color['color']=="Green" || $product_color['color']=="green"){
?>
<input type="radio" checked name="radio-group" id="green" value="Green"/>
<label for="green">Green</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="Blue" || $product_color['color']=="blue"){
?>

<input type="radio" checked name="radio-group" id="blue" value="Blue"/>
<label for="blue">Blue</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="White" || $product_color['color']=="white"){
?>
<input type="radio" checked name="radio-group" id="white" value="White"/>
<label for="white">White</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="Black" || $product_color['color']=="black"){
?>
<input type="radio" checked name="radio-group" id="black" value="Black"/>
<label for="black">black</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="Yellow" || $product_color['color']=="yellow"){
?>
<input type="radio" checked name="radio-group" id="yellow" value="Yellow"/>
<label for="yellow">Yellow</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="Orange" || $product_color['color']=="orange"){
?>
<input type="radio" checked name="radio-group" id="orange" value="Orange"/>
<label for="orange">Orange</label>
<?php
                            $i++;
                        }
                        elseif($product_color['color']=="Red" || $product_color['color']=="red"){
?>
<input type="radio" checked name="radio-group" id="red" value="Red"/>
<label for="red">Red</label>

<?php
                            $i++;
                        }
                    }
                    else{
                        if($product_color['color']=="Green" || $product_color['color']=="green"){
?>
<input type="radio" name="radio-group" id="green" value="Green"/>
<label for="green">Green</label>
<?php
                        }
                        elseif($product_color['color']=="Blue" || $product_color['color']=="blue"){
?>

<input type="radio" name="radio-group" id="blue" value="Blue"/>
<label for="blue">Blue</label>
<?php
                        }
                        elseif($product_color['color']=="White" || $product_color['color']=="white"){
?>
<input type="radio" name="radio-group" id="white" value="White"/>
<label for="white">White</label>
<?php
                        }
                        elseif($product_color['color']=="Black" || $product_color['color']=="black"){
?>
<input type="radio" name="radio-group" id="black" value="Black"/>
<label for="black">black</label>
<?php
                        }
                        elseif($product_color['color']=="Yellow" || $product_color['color']=="yellow"){
?>
<input type="radio" name="radio-group" id="yellow" value="Yellow"/>
<label for="yellow">Yellow</label>
<?php
                        }
                        elseif($product_color['color']=="Orange" || $product_color['color']=="orange"){
?>
<input type="radio" name="radio-group" id="orange" value="Orange"/>
<label for="orange">Orange</label>
<?php
                        }
                        elseif($product_color['color']=="Red" || $product_color['color']=="red"){
?>
<input type="radio" name="radio-group" id="red" value="Red"/>
<label for="red">Red</label>

<?php
                        }
                    }
                }

            }

?>
-->
                            <!--
<input type="radio" name="radio-group" id="yellow" value="Yellow"/>
<label for="yellow">Yellow</label>

<input type="radio" name="radio-group" id="orange" value="Orange"/>
<label for="orange">Orange</label>

<input type="radio" name="radio-group" id="red" value="Red"/>
<label for="red">Red</label>

<input type="radio" name="radio-group" id="light-blue" value="light-blue"/>
<label for="light-blue">LightBlue</label>

<input type="radio" name="radio-group" id="light-purple" value="light-purple"/>
<label for="light-purple">LightPurple</label>

<input type="radio" name="radio-group" id="black" value="Black"/>
<label for="black">black</label>

<input type="radio" name="radio-group" id="purple" value="Purple"/>
<label for="purple">Purple</label>

<input type="radio" name="radio-group" id="white" value="White"/>
<label for="white">White</label>

<input type="radio" name="radio-group" id="blue" value="Blue"/>
<label for="blue">Blue</label>
-->

                            <!--

<button type="button" class="btn bg-primary"></button>
<button type="button" class="btn bg-dark"></button>
<button type="button" class="btn bg-success"></button>
-->



                            <!-- <section>
<h6>Select a color</h6>
<div class="swatch">
<input type="radio" name="swatch_demo" id="swatch_2" value="2" />
<label for="swatch_2" style="background-color: #2ecc71;
color: #000;"><i class="fa fa-check"></i></label>
</div>
</section>-->
                        </div>
                        <!-- Product Color Variation End -->
                    </div>

                    <div class="col-lg-12">

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            Price:
                            <br>

                            <div id="show_price_data">
                                Select Size and Color to show Price
                            </div>

                        </div>
                        <!-- Price Box End -->
                    </div>

                    <!-- Quantity Start -->
                    <div class="quantity mb-5">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" id="<?php echo "quantity".$product['id']; ?>" value="1" type="text">
                            <div class="dec qtybutton"></div>
                            <div class="inc qtybutton"></div>
                        </div>
                    </div>
                    <!-- Quantity End -->

                    <!-- Cart & Wishlist Button Start -->
                    <div class="cart-wishlist-btn mb-4">
                        <div class="add-to_cart">

                            <a class="btn btn-outline-dark btn-hover-primary"  onclick="add_product_to_cart('<?php echo $product['id'];?>')" style="display:none"  id="cart_btn" >Add to cart</a>

                            <a class="btn btn-outline-dark btn-hover-primary" id="cart_btn2" onclick="message2()" style="display:none" >Add to cart</a>
                            <a class="btn btn-outline-dark btn-hover-primary" id="msg_btn" onclick="message()" >Add to cart</a>
                        </div>
                        <div class="add-to-wishlist">
                            <a class="btn btn-outline-dark btn-hover-primary" onclick="add_product_to_wishlist('<?php echo $product['id'];?>')">Add to Wishlist</a>
                        </div>
                    </div>
                    <!-- Cart & Wishlist Button End -->

                    <style>
                        .simple_rating .checked {
                            color: #000;
                        }
                        .fa-star{
                            font-size: 22px!important;
                        }
                    </style>
                    <!-- Product Head End -->
                    <div class="col-lg-12">
                        <div class="row my-3">
                            <h2>Ratings</h2>
                        </div>
                        <div class="row">
                            <h4>Average Rating</h4>
                        </div>
                        <div class="row justify-content-around align-items-end   ">
                            <?php

            $query = "SELECT * from product_review where product_id = '$product_id' ";
            $avg_reviews = db::getRecords($query);

            $ttl_rating = 0;
            $avg_rating=0;
            $total_avg_reviews_size = "0";


            if($avg_reviews!=NULL){


                foreach($avg_reviews as $avg_review){

                    if($avg_reviews!=null)
                    {
                        $total_avg_reviews_size=sizeof($avg_reviews);
                    }
                    else{
                        $total_avg_reviews_size=0;
                    }

                    $product_avg_rating = $avg_review['rating'];

                    $ttl_rating = $ttl_rating + $product_avg_rating;

                    $avg_rating = intval($ttl_rating / $total_avg_reviews_size);
                }
            }

                            ?>
                            <div class="col-md-3 col-lg-1">

                                <h2><?php echo $avg_rating; ?>.0</h2></div>
                            <div class="col-md-9 col-lg-11">

                                <!-- Rating Start -->
                                <span class="ratings justify-content-start m-2">
                                    <?php
            if($avg_rating=='1'){
                                    ?>
                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <?php
            }elseif($avg_rating=='2'){
                                    ?>
                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <?php
            }
            if($avg_rating=='3'){
                                    ?>
                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <?php
            }elseif($avg_rating=='4'){
                                    ?>

                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                    </div>
                                    <?php
            }
            if($avg_rating=='5'){
                                    ?>

                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <?php
            }
                                    ?>




                                </span>
                                <!-- Rating End -->

                            </div>
                        </div>
                        <div class="row">
                            <h4>Based on <?php echo $total_avg_reviews_size; ?> Reviews</h4>
                        </div>


                        <?php

            $query = "SELECT * from product_review where product_id = '$product_id' AND rating='1' ";
            $ttl_star_rating1 = db::getRecords($query);


            $query = "SELECT * from product_review where product_id = '$product_id' AND rating='2' ";
            $ttl_star_rating2 = db::getRecords($query);


            $query = "SELECT * from product_review where product_id = '$product_id' AND rating='3' ";
            $ttl_star_rating3 = db::getRecords($query);


            $query = "SELECT * from product_review where product_id = '$product_id' AND rating='4' ";
            $ttl_star_rating4 = db::getRecords($query);


            $query = "SELECT * from product_review where product_id = '$product_id' AND rating='5' ";
            $ttl_star_rating5 = db::getRecords($query);

            if($ttl_star_rating1!=null)
            {
                $ttl_star_rating1_size=sizeof($ttl_star_rating1);
            }
            else{
                $ttl_star_rating1_size=0;
            }
            if($ttl_star_rating2!=null)
            {
                $ttl_star_rating2_size=sizeof($ttl_star_rating2);
            }
            else{
                $ttl_star_rating2_size=0;
            }
            if($ttl_star_rating3!=null)
            {
                $ttl_star_rating3_size=sizeof($ttl_star_rating3);
            }
            else{
                $ttl_star_rating3_size=0;
            }
            if($ttl_star_rating4!=null)
            {
                $ttl_star_rating4_size=sizeof($ttl_star_rating4);
            }
            else{
                $ttl_star_rating4_size=0;
            }
            if($ttl_star_rating5!=null)
            {
                $ttl_star_rating5_size=sizeof($ttl_star_rating5);
            }
            else{
                $ttl_star_rating5_size=0;
            }


                        ?>
                        <div class="row">
                            <!-- Rating Start -->
                            <span class="ratings justify-content-start mb-3">

                                <div class="simple_rating" style="color:#848080">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="m-2">(<?php echo $ttl_star_rating1_size; ?>)</span>
                                </div>
                            </span>
                            <div class="row">
                                <!-- Rating Start -->
                                <span class="ratings justify-content-start mb-3">

                                    <div class="simple_rating" style="color:#848080">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="m-2">(<?php echo $ttl_star_rating2_size; ?>)</span>
                                    </div>
                                </span>
                                <div class="row">
                                    <!-- Rating Start -->
                                    <span class="ratings justify-content-start mb-3">
                                        <div class="simple_rating" style="color:#848080">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="m-2">(<?php echo $ttl_star_rating3_size; ?>)</span>
                                        </div>
                                    </span>
                                    <div class="row">
                                        <!-- Rating Start -->
                                        <span class="ratings justify-content-start mb-3">

                                            <div class="simple_rating" style="color:#848080;">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="m-2">(<?php echo $ttl_star_rating4_size; ?>)</span>
                                            </div>

                                        </span>
                                        <div class="row">
                                            <!-- Rating Start -->
                                            <span class="ratings justify-content-start mb-3">
                                                <div class="simple_rating" style="color:#848080">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="m-2">(<?php echo $ttl_star_rating5_size; ?>)</span>
                                                </div>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <!-- Product Summery End -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section-margin">
            <!-- Single Product Tab Start -->
            <div class="col-lg-12 col-custom single-product-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mb-3">
                        <a class="nav-link active text-uppercase" style="font-weight:700;" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link text-uppercase font-weight-bold" style="font-weight:700;" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link text-uppercase font-weight-bold" style="font-weight:700;" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                    </li>

                </ul>
                <div class="tab-content mb-text" id="myTabContent">
                    <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                        <div class="desc-content border p-3">
                            <p class="mb-3"><?php echo $product['description']; ?></p>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Start Single Content -->
                        <div class="product_tab_content  border p-3">


                            <!-- Start Single Review -->

                            <?php

            $query = "SELECT * from product_review where product_id = '$product_id' ";
            $reviews = db::getRecords($query);


            if($reviews!=NULL){
                foreach($reviews as $review){

                    $review_user_id = $review['user_id'];
                    $product_rating = $review['rating'];


                    $query = "SELECT * from users where email = '$review_user_id'";
                    $user_reviewd = db::getRecord($query);
                            ?>

                            <div class="single-review d-flex mb-4">

                                <!-- Review Thumb Start -->
                                <div class="review_thumb" style="width:5%;">
                                    <img alt="review images" src="admin/app-assets/images/default-user.png">
                                </div>
                                <!-- Review Thumb End -->

                                <!-- Review Details Start -->
                                <div class="review_details" style="width:95%;">
                                    <div class="review_info mb-2">

                                        <!-- Rating Start -->
                                        <span class="ratings justify-content-start mb-3">
                                            <?php
                    if($product_rating=='1'){
                                            ?>
                                            <div class="simple_rating" style="color:#848080">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <?php
                    }elseif($product_rating=='2'){
                                            ?>
                                            <div class="simple_rating" style="color:#848080">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <?php
                    }
                    if($product_rating=='3'){
                                            ?>
                                            <div class="simple_rating" style="color:#848080">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <?php
                    }elseif($product_rating=='4'){
                                            ?>

                                            <div class="simple_rating" style="color:#848080">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                            <?php
                    }
                    if($product_rating=='5'){
                                            ?>

                                            <div class="simple_rating" style="color:#848080">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <?php
                    }
                                            ?>




                                        </span>
                                        <!-- Rating End -->


                                    </div>
                                    <p class=""><?php echo $review['review'];  ?></p>
                                </div>
                                <!-- Review Details End -->

                            </div>
                            <!-- End Single Review -->

                            <?php

                }
            }
                            ?>

                            <style>
                                .rating-box {
                                    display: inline-block;
                                }
                                .rating-box .rating-container {
                                    direction: rtl !important;
                                }
                                .rating-box .rating-container label {
                                    display: inline-block;
                                    margin: 1px 0;
                                    color: #b4b4b4;
                                    cursor: pointer;
                                    font-size: 35px;
                                    transition: color 0.2s;
                                }
                                .rating-box .rating-container input {
                                    display: none;
                                }
                                .rating-box .rating-container label:hover, .rating-box .rating-container label:hover ~ label, .rating-box .rating-container input:checked ~ label {
                                    color: #000;
                                }

                            </style>
                            <!-- Rating Wrap Start -->
                            <div class="rating_wrap">
                                <h5 class="rating-title mb-2">Add a review </h5>
                                <p class="mb-2">Your email address will not be published.</p>
                                <h6 class="rating-sub-title mb-2">Your Rating</h6>



                            </div>
                            <!-- Rating Wrap End -->

                            <!-- Comments ans Replay Start -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12 col-custom">

                                        <!-- Comment form Start -->
                                        <form action="admin/action.php" method="post" class="comment-form-area" onsubmit="return validateForm()" >
                                            <!-- Rating Start -->
                                            <span class="ratings justify-content-start mb-3">
                                                <div class="rating-box">
                                                    <div class="rating-container">
                                                        <input type="radio" onclick="myrating('5')" name="rating" value="5" id="star-5"> <label for="star-5" title="Excellent"><span class="fa fa-star"></span></label>

                                                        <input type="radio"  onclick="myrating('4')"  name="rating" value="4" id="star-4"> <label for="star-4" title="Good"><span class="fa fa-star"></span></label>

                                                        <input type="radio"  onclick="myrating('3')"  name="rating" value="3" id="star-3"> <label for="star-3" title="Average"><span class="fa fa-star"></span></label>

                                                        <input type="radio"  onclick="myrating('2')"  name="rating" value="2" id="star-2"> <label for="star-2" title="Not Good"><span class="fa fa-star"></span></label>

                                                        <input type="radio"  onclick="myrating('1')"  name="rating" value="1" id="star-1"> <label for="star-1" title="Bad"><span class="fa fa-star"></span></label>
                                                    </div>
                                                </div>
                                            </span>
                                            <!-- Rating End -->


                                            <!-- Comment Texarea Start -->
                                            <div class="comment-form-comment mb-3">
                                                <label>Comment</label>
                                                <textarea class="comment-notes" name="review" required="required"></textarea>
                                            </div>
                                            <!-- Comment Texarea End -->

                                            <!-- Comment Submit Button Start -->
                                            <div class="comment-form-submit">
                                                <?php
            $order_review = "";

            $query = "SELECT * from orders where user_id = '$user_email' AND payment_status!='unpaid' ";
            $orders = db::getRecords($query);


            if($orders!=NULL){
                foreach($orders as $order){

                    $order_id = $order['order_id'];


                    $query = "SELECT * from order_detail where order_id = $order_id AND product_id = '$product_id'";
                    $order_review = db::getRecords($query);


                    $test = 0;
                }
            }

            if($order_review!=NULL){
                                                ?>
                                                <div class="row comment-input">

                                                    <input type="hidden" autocomplete="off" id="rating" value="" name="rating">
                                                    <input type="hidden" autocomplete="off" id="rating" value="<?php echo $product['id']; ?>" name="product_id">
                                                    <input type="hidden" autocomplete="off" id="rating" value="<?php echo $user_email; ?>" name="user_id">
                                                </div>
                                                <button class="btn btn-dark btn-hover-primary" type="submit" name="product_review">Submit</button>

                                                <?php

            }else{
                                                ?>
                                                <button class="btn btn-dark btn-hover-primary" type="button" onclick="oderit()">Submit</button>
                                                <?php
            }
                                                ?>

                                            </div>
                                            <!-- Comment Submit Button End -->

                                        </form>
                                        <!-- Comment form End -->

                                    </div>
                                </div>
                            </div>
                            <!-- Comments ans Replay End -->

                        </div>
                        <!-- End Single Content -->
                    </div>

                    <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- Shipping Policy Start -->
                        <div class="shipping-policy mb-n2">
                            <h4 class="title-3 mb-4">Shipping policy for our store</h4>
                            <p class="desc-content mb-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                            <ul class="policy-list mb-2">
                                <li>1-2 business days (Typically by end of day)</li>
                                <li><a href="#">30 days money back guaranty</a></li>
                                <li>24/7 live support</li>
                                <li>odio dignissim qui blandit praesent</li>
                                <li>luptatum zzril delenit augue duis dolore</li>
                                <li>te feugait nulla facilisi.</li>
                            </ul>
                            <p class="desc-content mb-2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                            <p class="desc-content mb-2">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                            <p class="desc-content mb-2">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                        </div>
                        <!-- Shipping Policy End -->
                    </div>

                </div>
            </div>
            <!-- Single Product Tab End -->
        </div>

        <?php
        }
        ?>

    </div>
</div>
<!-- Single Product Section End -->

<script>

    function show_color(size,product_id)
    {
        var size=size;
        var product_id=product_id;

        $.ajax({
            url: "admin/ajax/product_data/get_color.php",
            type: "POST",
            data: {'size':size,'product_id':product_id},
            success: function(response){

                //                    alert(response);
                $("#show_color_data").html(response);

                //alert($(".getit").val());
                var color=($(".getit").val());
                if(color==null){
                    var color = null;
                }
                //alert(color);
                show_color_price(size,product_id,color);
            },
        });


    }

    function show_color_price(size,product_id,color)
    {
        var size=size;
        var product_id=product_id;
        var color=color;
        var res = null;
        //        alert();

        $.ajax({
            url: "admin/ajax/product_data/get_color_price.php",
            'async': false,
            type: "POST",
            data: {'size':size,'product_id':product_id,'color':color},
            success: function(response){

                //                    alert(response);
                $("#show_price_data").html(response);
                res = response;
                // alert(res);
                if(res!=""){
                    //alert(res+"funny");
                    $("#cart_btn").css("display", "block");
                    $("#cart_btn2").css("display", "none");
                    $("#msg_btn").css("display", "none");
                }else{
                    //alert(res+"not funny");
                    $("#cart_btn").css("display", "none");
                    $("#cart_btn2").css("display", "block");
                    $("#msg_btn").css("display", "none");
                }
            },
        });


    }


    function add_product_to_cart(id)
    {
        var product_id=id;
        var quantity = document.getElementById("quantity"+product_id).value;
        var product_data_id = document.getElementById("product_data_id").value;

        //            alert(product_id);
        //            alert(quantity);
        //            alert(product_data_id);


        $.ajax({
            url: "admin/ajax/product_data/add_product_to_cart.php",
            type: "POST",
            data: {'product_id':product_id,'quantity':quantity,'product_data_id':product_data_id},
            success: function(response){

                alert(response);
                //                    $("#show_price_data").html(response);
                get_cart_size();
                get_data();
            },
        });
        //            $.ajax({
        //                url: "admin/add_product_to_cart.php",
        //                type: "POST",
        //                data: {'product_id':product_id,'quantity':quantity},
        //                success: function(response){
        //
        //                    alert(response);
        //                    get_cart_size();
        //                    get_data();
        //                },
        //            });

    }

    function message()
    {
        alert("Please Select Size and Colors!!")

    }
    function message2()
    {
        alert("This is not available!!")

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


    function myrating(id)
    {
        var id=id;
        document.getElementById("rating").value = id;

    }
    function oderit()
    {
        alert("Kindly Purchase this product to submit review!!");

    }

    function validateForm() {
        let x = document.getElementById("rating").value;
        if (x == "") {
            alert("Kindly rate this product to submit review!!");
            return false;
        }
    }
</script>
<?php
include ("footer.php");
?>



