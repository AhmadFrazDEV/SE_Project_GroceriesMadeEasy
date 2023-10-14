<?php
include("header.php");

$query = "SELECT * from return_policy";
$return_policy =db::getRecord($query);

?>
<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Return Policy</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Return Policy</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->


<!-- Blog Details Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <!-- Blog Main Area Start -->
            <div class="col-lg-9 m-auto overflow-hidden">

                <!-- Single Post Details Start -->
                <div class="blog-details mb-10">

                    <!-- Single Post Details Content Start -->
                    <div class="content" data-aos="fade-up" data-aos-delay="300">


                        <!-- Description Start -->
                        <div class="desc">
                            <?php echo $return_policy['description']; ?>


                        </div>
                        <!-- Description End -->

                    </div>
                    <!-- Single Post Details Content End -->


                </div>
                <!-- Single Post Details End -->





            </div>
            <!-- Blog Main Area End -->
        </div>

    </div>
</div>
<!-- Blog Details Section End -->


<?php
include("footer.php");

?>
