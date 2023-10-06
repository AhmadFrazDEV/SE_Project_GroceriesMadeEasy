<?php

include("header.php");

?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Contact Us</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Us Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10">
                <div class="col-12 col-lg-8 mb-10">
                    <!-- Section Title Start -->
                    <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title pb-3">Get In Touch</h2>
                        <span></span>
                        <div class="title-border-bottom"></div>
                    </div>
                    <!-- Section Title End -->
                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <form action="email.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" name="name" class="form-control" required="required" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" name="email" class="form-control required email" required="required" type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_phone" name="phone" class="form-control required phone" required="required" type="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_subject" name="subject" class="form-control required" required="required" type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="comment" class="form-control required" rows="8" required="required" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="submit" name="contact_submit" class="btn btn-lg btn-thm">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Wrapper End -->
                </div>

                <div class="col-12 col-lg-4 mb-10">
                    <!-- Section Title Start -->
                    <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title pb-3">Contact Info</h2>
                        <span></span>
                        <div class="title-border-bottom"></div>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Information Wrapper Start -->
                    <div class="row contact-info-wrapper mb-n6">

                        <!-- Single Contact Information Start -->
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="300">

                            <!-- Single Contact Icon Start -->
                            <div class="single-contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <!-- Single Contact Icon End -->

                            <!-- Single Contact Title Content Start -->
                            <div class="single-contact-title-content">
                                <h4 class="title"> Address</h4>
                                <p class="desc-content"><?php echo $address['description']; ?></p>
                            </div>
                            <!-- Single Contact Title Content End -->

                        </div>
                        <!-- Single Contact Information End -->

                        <!-- Single Contact Information Start -->
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="400">

                            <!-- Single Contact Icon Start -->
                            <div class="single-contact-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <!-- Single Contact Icon End -->

                            <!-- Single Contact Title Content Start -->
                            <div class="single-contact-title-content">
                                <h4 class="title">Contact Us </h4>
                                <p class="desc-content">Mobile: <?php echo $mobile['description']; ?> <br>Fax: <?php echo $fax['description']; ?></p>
                            </div>
                            <!-- Single Contact Title Content End -->

                        </div>
                        <!-- Single Contact Information End -->

                        <!-- Single Contact Information Start -->
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up" data-aos-delay="500">

                            <!-- Single Contact Icon Start -->
                            <div class="single-contact-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- Single Contact Icon End -->

                            <!-- Single Contact Title Content Start -->
                            <div class="single-contact-title-content">
                                <h4 class="title">Support Overall</h4>
                                <p class="desc-content"><a href="mailto:<?php echo $email_address['description']; ?>"><?php echo $email_address['description']; ?></a> </p>
                            </div>
                            <!-- Single Contact Title Content End -->

                        </div>
                        <!-- Single Contact Information End -->

                    </div>
                    <!-- Contact Information Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact us Section End -->




<?php

include("footer.php");


?>
