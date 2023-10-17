<?php
include("header.php");

//query for about us
$query = "SELECT * from about where id='1'";
$about =db::getRecord($query);

$query = "SELECT * from about where id='2'";
$about_img =db::getRecord($query);


$query = "SELECT * from about_cards";
$about_cards =db::getRecords($query);

?>

<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">About Us</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- About Section Start -->
<div class="section section-margin overflow-hidden">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-lg-6 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                <div class="about_content">
                    <h2 class="title">About Our Store</h2>

                    <p><?php echo $about['description']; ?></p>
                </div>
            </div>
            <div class="col-lg-6 mb-6" data-aos="fade-left" data-aos-delay="600">
                <div class="about_thumb">
                    <img class="fit-image" src="<?php echo "admin/files/banners/".$about_img['image_name']; ?>" alt="About Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Feature Section Start -->
<div class="section about-feature-bg section-padding">
    <div class="container">
        <div class="row mb-n5">
            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="assets/images/icons/feature-icon-2.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Free Shipping</h5>

                    </div>
                </div>
            </div>
            <!-- Feature End -->

            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="400">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="assets/images/icons/feature-icon-3.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Support 24/7</h5>

                    </div>
                </div>
            </div>
            <!-- Feature End -->
            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="500">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="assets/images/icons/feature-icon-4.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Money Return</h5>

                    </div>
                </div>
            </div>
            <!-- Feature End -->

            <!-- Feature Start -->
            <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="600">
                <div class="feature flex-column text-center">
                    <div class="icon w-100 mb-4">
                        <img src="assets/images/icons/feature-icon-1.png" alt="Feature Icon">
                    </div>
                    <div class="content ps-0 w-100">
                        <h5 class="title mb-2">Order Discount</h5>

                    </div>
                </div>
            </div>
            <!-- Feature End -->
        </div>
    </div>
</div>
<!-- Feature Section End -->

<!-- Service Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
            <?php
            if($about_cards!=NULL)
            {
                foreach($about_cards as $about_card)
                {
            ?>
            <div class="col-lg-4 col-md-6 text-center mb-6" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Service Start -->
                <div class="single-service">
                    <h2 class="title"><?php echo $about_card['title']; ?></h2>
                    <p><?php echo $about_card['description']; ?></p>
                </div>
                <!-- Single Service End -->
            </div>
            <?php
                }
            }
            else{
                echo "Data is not Found!!";
            }
            ?>
        </div>
    </div>
</div>
<!-- Service Section End -->


<?php
include("footer.php");

?>
