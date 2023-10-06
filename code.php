<?php
include ("header.php");

$status=NULL;

if(isset($_GET['status']))
{
    $status=$_GET['status'];
}

?>

<script>

    var status=<?php echo $status; ?>

    if(status==1)
    {
        alert("Password is not matched.");
    }
    else if(status==2)
    {
         alert("Email or Username is already registered.");
    }

</script>


<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Code Verification</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active">Code Verification</li>
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
                        <p class="desc-content">Verify Your Account here!</p>
                    </div>
                    <!-- Login Title & Content End -->

                    <!-- Form Action Start -->
                     <form action="admin/action.php" method="post"  class="my-5 text-center">

                        <!-- Input Email Or Username Start -->
                        <div class="  mb-3">
                            <input type="email" name="email" placeholder="Email or Username" required>
                        </div>
                        <!-- Input Email Or Username End -->

                        <!-- Input Password Start -->
                        <div class="  mb-3">
                            <input type="password" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter your Password" required>
                        </div>
                        <!-- Input Password End -->

                      <!-- Input Password Start -->
                        <div class="  mb-3">
                            <input type="text" name="code" placeholder="Enter Code" required>
                        </div>
                        <!-- Input Password End -->


                        <!-- Register Button Start -->
                        <div class="  mb-3">
                            <button class="btn btn btn-dark btn-hover-primary rounded-0" type="submit" name="user_verify" >Register</button>
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
include ("footer.php");
?>
