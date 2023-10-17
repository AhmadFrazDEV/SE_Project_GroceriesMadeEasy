<?php
//include("header.php");
include("header.php");
?>

<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Login</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Login</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Login | Register Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row mb-n10 d-flex justify-content-center" style="justify-content:center;">
            <div class="col-lg-6 col-md-8 m-auto m-lg-0 pb-10">
                <!-- Login Wrapper Start -->
                <div class="login-wrapper">

                    <!-- Login Title & Content Start -->
                    <div class="section-content text-center mb-5">
                        <h2 class="title mb-2">Login</h2>
                        <p class="desc-content">Please login using account detail bellow.</p>
                    </div>
                    <!-- Login Title & Content End -->

                    <!-- Form Action Start -->
                    <form action="admin/action.php" method="post" class="my-5 text-center">

                        <!-- Input Email Start -->
                        
                            <input class="w-100  mb-3" type="email" name="email" placeholder="Email" required>
                        
                        <!-- Input Email End -->

                        <!-- Input Password Start -->
                        
                            <input class="w-100  mb-3" type="password" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter your Password" required>
                        
                        <!-- Input Password End -->


                        <!-- Login Button Start -->
                        <div class="  mb-3">
                            <button type="submit" name="user_login" class="btn btn btn-dark btn-hover-primary rounded-0">Login</button>
                        </div>
                        <!-- Login Button End -->

                        <!-- Lost Password & Creat New Account Start -->
                        <div class="lost-password">
                            <a href="register.php">Creat Account</a>
                        </div>
                        <!-- Lost Password & Creat New Account End -->

                    </form>
                    <!-- Form Action End -->

                </div>
                <!-- Login Wrapper End -->
            </div>

        </div>

    </div>
</div>
<!-- Login | Register Section End -->


<?php
include("footer.php");

?>
