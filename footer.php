
<!-- Footer Section Start -->
<footer class="section footer-section">
    <!-- Footer Top Start -->
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row mb-n10">
                <div class="col-12 col-sm-6 col-lg-4 col-xl-4 mb-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-footer-widget">
                        <div class="header-logo">
                            <!--<a href="index.php"><img src="assets/images/logo/log.png" width="280px" alt="Site Logo" /></a>-->
                             <a href="index.php" class="d-none d-md-block"><img src="assets/header_logo-removebg-preview-removebg-preview.png"  alt="Site Logo" /></a>
                        </div>
                        <p class="desc-content">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididun</p>
                        <!-- Contact Address Start -->
                             <!-- Contact Address Start -->
                        <ul class="widget-address">
                            <li><span>Address: </span> <?php echo $address['description']; ?></li>
                            <li><span>Call to: </span> <a href="Tel:<?php echo $mobile['description']; ?>"><?php echo $mobile['description']; ?></a></li>
                            <li><span>Mail to: </span> <a href="mailto:<?php echo $email_address['description']; ?>"><?php echo $email_address['description']; ?></a></li>
                        </ul>
                        <!-- Contact Address End -->

                        <!-- Soclial Link Start -->
                        <div class="widget-social justify-content-start mt-4">
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
                        <!-- Social Link End -->

                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-10" data-aos="fade-up" data-aos-delay="300">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Quick Links</h2>
                        <ul class="widget-list">
                            <li><a href="index.php"> <span>Home</span></a></li>

                            <li><a href="about.php"> <span>About Us</span></a></li>
                            <li><a href="product.php"><span>Shop</span></a></li>
                            <li><a href="terms.php"><span>Terms and Privacy</span></a></li>
                            <li><a href="return_policy.php"><span>Return Policy</span></a></li>
                            <li><a href="contact.php"> <span>Contact Us</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="single-footer-widget aos-init aos-animate">
                        <h2 class="widget-title">Categories</h2>
                        <ul class="widget-list">

                            <?php

                            $query = "SELECT * from category";
                            $categories = db::getRecords($query);

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
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-4 mb-10" data-aos="fade-up" data-aos-delay="500">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Newsletter</h2>
                        <div class="widget-body">
                            <p class="desc-content mb-0">Get E-mail updates about our latest products.</p>

                            <!-- Newsletter Form Start -->
                            <div class="newsletter-form-wrap pt-4">
                                <form action="admin/action.php" method="post">
                                    <input type="email" class="form-control email-box mb-4" placeholder="Enter your email here.." name="email">
                                    <button  class="newsletter-btn btn btn-primary btn-hover-dark" type="submit" name="sign_newsletter">Subscribe</button>
                                </form>

                                <a href="donation.php" class=" mt-4  btn btn-outline-primary btn-hover-dark" > <span>Donation</span></a>

                            </div>
                            <!-- Newsletter Form End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="copyright-content">
                        <div class="copyright"><center>Copyright © <script>document.write(new Date().getFullYear());</script> <a href="https://www.linkedin.com/in/muhammad-usman-bin-farid/">Muhammad Usman Bin Farid.</a> All rights reserved.</center></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>
<!-- Footer Section End -->

<!-- Scroll Top Start -->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fa fa-long-arrow-up"></i>
    <i class="arrow-bottom fa fa-long-arrow-up"></i>
</a>
<!-- Scroll Top End -->



<!-- Scripts -->
<!-- Scripts -->
<!-- Global Vendor, plugins JS -->

<!-- Vendors JS -->

<!--
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
-->

<!-- Plugins JS -->

<!--
<script src="assets/js/plugins/countdown.min.js"></script>
<script src="assets/js/plugins/aos.min.js"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/nice-select.min.js"></script>
<script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/lightgallery-all.min.js"></script>
<script src="assets/js/plugins/thia-sticky-sidebar.min.js"></script>
-->

<!-- Use the minified version files listed below for better performance and remove the files listed above -->


<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/plugins.min.js"></script>



<!--Main JS-->
<script src="assets/js/main.js"></script>

<script>


    function get_cart_size(){

        //        alert();
        $.ajax({
            type: 'POST',
            url: 'admin/ajax/cart/get_cart_size.php',
            success: function(data)
            {

                $("#cart_size").html(data);
                //                $("#cart_size_m").html(data);



            }
        });

        //        $.ajax({
        //            type: 'POST',
        //            url: 'admin/get_cart_size.php',
        //            success: function(data)
        //            {
        //
        //                $("#cart_size").html(data);
        //
        //
        //
        //
        //            }
        //        });
        //
        //        $.ajax({
        //            type: 'POST',
        //            url: 'admin/get_cart_size.php',
        //            success: function(data)
        //            {
        //
        //                $("#cart_size_m").html(data);
        //
        //
        //
        //            }
        //        });
        //

    }

    get_cart_size();
    function get_data(){

        $.ajax({
            url: "admin/ajax/cart/update_cart.php",
            type: "POST",
            data: {},
            success: function(data){
                $("#cart_items").html(data);


            },
        });

    }


    get_data();


    function checkout()
    {
        alert("Your Cart is Empty.");
    }
</script>



</body>


</html>
