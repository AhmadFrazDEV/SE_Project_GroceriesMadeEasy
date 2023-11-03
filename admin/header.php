<?php
session_start();
require_once("database.php");

if(!isset($_SESSION['user_email']))
{
    echo "<script>location='index.php'</script>";
}
else
{
    $user_email=$_SESSION['user_email'];

    $query="SELECT * from user_login where email='$user_email'";
    $user_data=db::getRecord($query);

    $user_role = $user_data['role'];

}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/plyr.min.css">
    <link rel="stylesheet" href="assets/css/icons-1.css" />
    <link rel="stylesheet" href="assets/css/icons.css" />
    <!-- BEGIN: Vendor CSS-->


    <!--        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">-->
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-ecommerce-details.min.css">
    <!-- BEGIN: Vendor CSS-->
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-media-player.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/animate/animate.min.css">
    <!--
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css">
-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Page CSS-->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <script src="ckeditor/ckeditor.js"></script>


    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light bg-info bg-darken-2 navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="bx bx-menu" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">



                <?php $user_image = $user_data['image_name'];
                    if($user_image!=null)
                    {
                    ?>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"></span><span class="user-status text-uppercase">
                                <?php echo $user_data['user_name'];?>
                            </span></div>
                        <span class="avatar"><img class="round" src="<?php echo "files/users/profiles/".$user_data['image_name']; ?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="users/user_profile.php"><i class="mr-1 fas fa-user-cog"></i>Profile</a>
                        <!--                            <a class="dropdown-item" href="user_profile.php"><i class="mr-1 fas fa-cog"></i>Settings</a>-->
                        <a class="dropdown-item" href="action.php?logout=true"><i class="mr-1  fas fa-sign-in-alt"></i> Logout</a>
                    </div>
                </li>
                <?php
                    }
                    else{
                    ?>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user1" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"></span><span class="user-status text-uppercase">
                                <?php echo $user_data['user_name'];?>
                            </span></div>
                        <span class="avatar"><img class="round" src="app-assets/images/default-user.png" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="users/user_profile.php"><i class="mr-1 fas fa-user-cog"></i>Profile</a>
                        <!--                            <a class="dropdown-item" href="user_profile.php"><i class="mr-1 fas fa-cog"></i>Settings</a>-->
                        <a class="dropdown-item" href="action.php?logout=true"><i class="mr-1  fas fa-sign-in-alt"></i> Logout</a>
                    </div>
                </li>
                <?php
                    }
                    ?>



            </ul>
        </div>
    </nav>
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="dashboard.php">
                        <span class="brand-logo">
                            <img src="../assets/header_logo-removebg-preview-removebg-preview.png" style="max-width: 82px;"></span>

                    </a>
                </li>
                <!--                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>-->
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="dashboard.php"><i class="fa fa-home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Dashboard Items</span><i data-feather="more-horizontal"></i>
                </li>
                <?php
                    if($user_role=='1'){


                    ?>

                <!--<li class=" nav-item"><a class="d-flex align-items-center" href="users/users.php"><i class="fas fa-users"></i><span class="menu-title text-truncate " data-i18n="Email">Users</span></a>-->
                <!--</li>-->
                <?php
                    }
                    else{

                    }


                    ?>
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#"><i class=" lni lni-popup"></i><span class="menu-title text-truncate">About Us</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="about/about.php"><i class=" far fa-hand-point-right" style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Description</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="about/about_cards.php"><i class=" far fa-hand-point-right" style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Cards </span></a>
                        </li>

                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="customers/users.php"><i class="fas fa-users"></i><span class="menu-title text-truncate " data-i18n="Email">Customers</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="banners/banner.php"><i class="bx bx-image"></i><span class="menu-title text-truncate " data-i18n="Email">Banners</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="card_banners/banner.php"><i class="bx bx-star"></i><span class="menu-title text-truncate " data-i18n="Email">Card Banners</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="discounts/banner.php"><i class="bx bx-dollar-circle"></i><span class="menu-title text-truncate " data-i18n="Email">Discount Banners</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="sub_category/category.php"><i class="bx bx-windows"></i><span class="menu-title text-truncate" data-i18n="Todo">Merchants</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="sub_category/sub_category.php"><i class="bx bx-window"></i><span class="menu-title text-truncate" data-i18n="Calendar">Categories</span></a>
                </li>
                <!--
<li class=" nav-item"><a class="d-flex align-items-center" href="mini_category.php"><i class="bx bx-credit-card-front"></i><span class="menu-title text-truncate" data-i18n="Calendar">Mini - Categories</span></a>
</li>
-->
                <!--
<li class=" nav-item"><a class="d-flex align-items-center" href="article.php"><i class="fas fa-book-open mt-1"></i><span class="menu-title text-truncate" data-i18n="Calendar">Articles</span></a>
</li>
-->
                <li class=" nav-item"><a class="d-flex align-items-center" href="sc_product/product.php"><i class="fas bx bx-grid-alt "></i><span class="menu-title text-truncate" data-i18n="Kanban">Products</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="video.php"><i class="bx bx-video "></i><span class="menu-title text-truncate" data-i18n="Kanban">Videos</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="coupon.php"><i class="fas fa-gift "></i><span class="menu-title text-truncate" data-i18n="Kanban">Coupons</span></a>
                </li>



                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#"><i class="ion ion-md-cube"></i><span class="menu-title text-truncate">Orders</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="orders/active_order.php"><i class="ion ion-md-cart " style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Active Orders</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="orders/pending_order.php"><i class="mdi mdi-cart-off" style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Pending Orders</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="orders/complete_order.php"><i class="fas fa-cart-arrow-down " style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Completed Orders</span></a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="newsletter.php"><i class="bx bx-star"></i><span class="menu-title text-truncate " data-i18n="Email">Newsletter</span></a>
                </li>



                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#"><i class="fas fa-donate"></i><span class="menu-title text-truncate">Donations</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="donation/paid_donation.php"><i class="fas fa-hand-holding-heart " style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Paid Donations</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="donation/pending_donation.php"><i class="fas fa-hand-holding" style="font-size:20px;"></i><span class="menu-item text-truncate pt-1">Pending Donations</span></a>
                        </li>

                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="terms.php"><i class="fas fa-file-alt "></i><span class="menu-title text-truncate" data-i18n="Kanban">Terms and Privacy</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="return_policy.php"><i class="far fa-file-alt "></i><span class="menu-title text-truncate" data-i18n="Kanban">Return Policy</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="contact.php"><i class="bx bx-user-pin"></i><span class="menu-title text-truncate" data-i18n="Kanban">Contact Info</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="social_link.php"><i class="bx bx-shape-polygon"></i><span class="menu-title text-truncate" data-i18n="Kanban">Social Links</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="about_footer.php"><i class="bx bxs-news"></i><span class="menu-title text-truncate" data-i18n="Kanban">Footer About</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center"></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center"></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center"></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center"></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center"></a>
                </li>



            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
