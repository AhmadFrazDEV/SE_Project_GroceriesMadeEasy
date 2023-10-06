<?php
session_start();
include("admin/database.php");

if(isset($_SESSION['customer_email']))
{
    $user_email=$_SESSION['customer_email'];

    $query="SELECT * from users where email='$user_email'";
    $user=db::getRecord($query);
}else{

    $user_email=session_id();
}

$query = "SELECT * from category";
$categories = db::getRecords($query);


$query = "SELECT * from contact_info where id='1'";
$address =db::getRecord($query);

$query = "SELECT * from contact_info where id='2'";
$email_address =db::getRecord($query);

$query = "SELECT * from contact_info where id='3'";
$mobile =db::getRecord($query);

$query = "SELECT * from contact_info where id='4'";
$fax =db::getRecord($query);

$query = "SELECT * from social_link";
$social_links =db::getRecords($query);

?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Grocery Made Easy</title>
        <!-- Favicons -->
        <!--        <link rel="shortcut icon" href="assets/images/favicon.ico">-->


        <!-- Vendor CSS (Icon Font) -->

        <!--
<link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css">
<link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.min.css">
-->

        <!-- Plugins CSS (All Plugins Files) -->

        <!--
<link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
<link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
<link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
<link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />
<link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
<link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" />
-->

        <!-- Main Style CSS -->

        <!--
<link rel="stylesheet" href="assets/css/style.css" />
-->


        <!-- Use the minified version files listed below for better performance and remove the files listed above -->



        <link rel="stylesheet" href="assets/css/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins.min.css">
        <link rel="stylesheet" href="assets/css/style.min.css">


    </head>

    <body>
        <div class="header section">


            <!-- Header Bottom Start -->
            <div class="header-bottom">
                <div class="header-sticky">
                    <div class="container">
                        <div class="row align-items-center">

                            <!-- Header Logo Start -->
                            <div class="col-xl-2 col-6">
                                <div class="header-logo">
                                    <a href="index.php" class="d-none d-md-block"><img src="assets/header_logo-removebg-preview-removebg-preview.png" style="height:120px"  alt="Site Logo" /></a>
                                    <a href="index.php" class="d-block d-md-none"><img src="assets/header_logo-removebg-preview-removebg-preview.png" style="height:120px" alt="Site Logo" /></a>
                                </div>
                            </div>
                            <!-- Header Logo End -->

                            <!-- Header Menu Start -->
                            <div class="col-xl-8 d-none d-xl-block">
                                <div class="main-menu position-relative">
                                    <ul>
                                        <li><a href="index.php"> <span>Home</span></a></li>

                                        <li><a href="about.php"> <span>About Us</span></a></li>


                                        <li class="has-children">
                                            <a href="product.php"><span>Shop</span> <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <?php

                                                if($categories!=null)
                                                {

                                                    foreach($categories as $category){

                                                        $category_id = $category['id'];


                                                ?>
                                                <li><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name']; ?> </a></li>
                                                <?php
                                                    }
                                                }
                                                else
                                                {
                                                    echo "No Results Yet!";
                                                }
                                                ?>
                                            </ul>

                                        </li>


                                        <li><a href="video.php"> <span>Video</span></a></li>
                                        <li><a href="contact.php"> <span>Contact Us</span></a></li>


                                    </ul>
                                </div>
                            </div>
                            <!-- Header Menu End -->

                            <!-- Header Action Start -->
                            <div class="col-xl-2 col-6">
                                <div class="header-actions">



                                    <?php

                                    if(isset($_SESSION['customer_email']))
                                    {

                                    ?>

                                    <a href="my_account.php" title="Dashboard" class="header-action-btn "><i class="pe-7s-user"></i></a>

                                    <?php

                                    }
                                    else
                                    {

                                    ?>

                                    <a href="login.php" title="LogIn" class="header-action-btn "><i class="fa fa-sign-in"></i></a>

                                    <?php

                                    }

                                    ?>

                                    <?php

                                    if(isset($_SESSION['customer_email']))
                                    {

                                    ?>

                                    <a href="admin/action.php?user_logout=1" title="Logout" class="header-action-btn "><i class="fa fa-sign-out"></i></a>

                                    <?php

                                    }
                                    else
                                    {

                                    ?>

                                    <a href="register.php" title="SignUp" class="header-action-btn "><i class="fa fa-user-plus"></i></a>

                                    <?php

                                    }

                                    ?>

                                    <!-- Wishlist Header Action Button Start -->
                                    <a href="wishlist.php" title="Wishlist" class="header-action-btn header-action-btn-wishlist">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <!-- Wishlist Header Action Button End -->

                                    <!-- Shopping Cart Header Action Button Start -->
                                    <a href="javascript:void(0)" title="Cart" class="header-action-btn header-action-btn-cart">
                                        <i class="pe-7s-shopbag"></i>
                                        <span class="header-action-num" id="cart_size"></span>
                                    </a>
                                    <!-- Shopping Cart Header Action Button End -->

                                    <!-- Mobile Menu Hambarger Action Button Start -->
                                    <a href="javascript:void(0)" title="Menu" class="header-action-btn header-action-btn-menu d-xl-none d-lg-block">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <!-- Mobile Menu Hambarger Action Button End -->

                                </div>
                            </div>
                            <!-- Header Action End -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom End -->

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-wrapper">
                <div class="offcanvas-overlay"></div>

                <!-- Mobile Menu Inner Start -->
                <div class="mobile-menu-inner">

                    <!-- Button Close Start -->
                    <div class="offcanvas-btn-close" title="Close Menu">
                        <i class="pe-7s-close"></i>
                    </div>
                    <!-- Button Close End -->

                    <!-- Mobile Menu Start -->
                    <div class="mobile-navigation">
                        <nav>
                            <ul class="mobile-menu">
                                <li><a href="index.php"> <span>Home</span></a></li>
                                <li><a href="about.php"> <span>About Us</span></a></li>
                                <li class="has-children">
                                    <a href="product.php"><span>Shop</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php

                                        if($categories!=null)
                                        {

                                            foreach($categories as $category){

                                                $category_id = $category['id'];


                                        ?>
                                        <li><a href="categorized_product.php?id=<?php echo $category['id'];?>"><?php echo $category['c_name']; ?> </a></li>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Results Yet!";
                                        }
                                        ?>
                                    </ul>

                                </li>
                                <li><a href="video.php"> <span>Video</span></a></li>
                                <li><a href="contact.php"> <span>Contact Us</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Mobile Menu End -->

<!-- Contact Links/Social Links Start -->
                    <div class="mt-auto">

                        <!-- Contact Links Start -->
                        <ul class="contact-links">
                            <li><i class="fa fa-phone"></i><a href="Tel:<?php echo $mobile['description']; ?>"> <?php echo $mobile['description']; ?></a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email_address['description']; ?>"><?php echo $email_address['description']; ?></a></li>
<!--                            <li><i class="fa fa-clock-o"></i> <span>Monday - Sunday 9.00 - 18.00</span> </li>-->
                        </ul>
                        <!-- Contact Links End -->

                        <!-- Social Widget Start -->
                        <div class="widget-social">
                            <?php
                            if($social_links!=NULL)
                            {
                                $count=1;
                                foreach($social_links as $social_link)
                                {
                            ?>
                            <a title="<?php echo $social_link['title']; ?>" href="<?php echo $social_link['link']; ?>" target="_blank"><i class="fa fa-<?php echo $social_link['title']; ?>"></i></a>
                            <?php
                                }
                            }
                            ?>

                        </div>
                        <!-- Social Widget Ende -->
                    </div>
                    <!-- Contact Links/Social Links End -->
                </div>
                <!-- Mobile Menu Inner End -->
            </div>
            <!-- Mobile Menu End -->

            <!-- Cart Offcanvas Start -->
            <div class="cart-offcanvas-wrapper">
                <div class="offcanvas-overlay"></div>

                <!-- Cart Offcanvas Inner Start -->
                <div class="cart-offcanvas-inner">

                    <!-- Button Close Start -->
                    <div class="offcanvas-btn-close" title="Cart Close">
                        <i class="pe-7s-close"></i>
                    </div>
                    <!-- Button Close End -->

                    <!-- Offcanvas Cart Content Start -->
                    <div class="offcanvas-cart-content">
                        <!-- Offcanvas Cart Title Start -->
                        <h2 class="offcanvas-cart-title mb-10">Shopping Cart</h2>
                        <!-- Offcanvas Cart Title End -->
                        <div id="cart_items" ></div>
                    </div>
                    <!-- Offcanvas Cart Content End -->

                </div>
                <!-- Cart Offcanvas Inner End -->
            </div>
            <!-- Cart Offcanvas End -->

        </div>
