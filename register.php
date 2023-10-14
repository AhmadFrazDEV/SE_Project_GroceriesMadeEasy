<?php
include("header.php");

$status=NULL;

if(isset($_GET['status']))
{
    $status=$_GET['status'];
}

?>

<script>
    var status = <?php echo $status; ?>

    if (status == 1) {
        alert("Passwords do not match.");
    } else if (status == 2) {
        alert("Email or Username is already registered.");
    }

</script>

<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Register</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active">Register</li>
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

        <div class="row mb-n10 d-flex" style="justify-content:center;">
            <div class="col-lg-6 col-md-8 m-auto m-lg-0 pb-10">
                <!-- Register Wrapper Start -->
                <div class="register-wrapper">

                    <!-- Login Title & Content Start -->
                    <div class="section-content text-center mb-5">
                        <h2 class="title mb-2">Create Account</h2>
                        <p class="desc-content">Please Register using account detail bellow.</p>
                    </div>
                    <!-- Login Title & Content End -->

                    <!-- Form Action Start -->
                    <form action="admin/action.php" method="post">

                        <!-- Input First Name Start -->

                        <input class="w-100  mb-3" type="text" name="f_name" placeholder="First Name" required>

                        <!-- Input First Name End -->

                        <!-- Input Last Name Start -->

                        <input class="w-100  mb-3" type="text" name="l_name" placeholder="Last Name" required>

                        <!-- Input Last Name End -->

                        <!-- Input Email Or Username Start -->

                        <input class="w-100  mb-3" type="email" name="email" placeholder="Email" required>

                        <!-- Input Email Or Username End -->

                        <!-- Input Email Or Username Start -->

                        <input class="w-100  mb-3" type="text" name="phone" placeholder="Phone" required>

                        <!-- Input Email Or Username End -->

                        <!-- Input Password Start -->

                        <input class="w-100  mb-3" type="password" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter your Password" required>

                        <!-- Input Password End -->

                        <!-- Input Password Start -->

                        <input class="w-100  mb-3" type="password" name="cpass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter Confirm Password" required>

                        <!-- Input Password End -->

                        <div class="  mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="1" name="newsletter" class="custom-control-input" id="rememberMe-2">
                                        <label class="custom-control-label" for="rememberMe-2">Subscribe Our Newsletter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Register Button Start -->
                        <div class="  mb-3">
                            <button class="btn btn btn-dark btn-hover-primary rounded-0" type="submit" name="user_signup">Register</button>
                        </div>
                        <!-- Register Button End -->

                    </form>
                    <!-- Form Action End -->

                </div>
                <!-- Register Wrapper End -->
            </div>
        </div>

    </div>
</div>
<!-- Login | Register Section End -->


<?php
include("footer.php");

?>
