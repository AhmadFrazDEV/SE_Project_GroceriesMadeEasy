<?php
include("header.php");
?>


<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<!-- Page header -->
<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">View User Profile</a></li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->



<h2 class="mb-0 text-center h1 text-primary uppercase">User Profile</h2>
<hr>
<div class="row">

    <div class="col-12 col-lg-12 col-xl-12" >
        <div class="card">

            <div class="card-body">

                <div class="tab-content">
                    <!-- Account Tab starts -->
                    <div class="tab-pane active">
                        <!-- users edit media object start -->
                        <div class="row justify-content-start">
                            <div class="media mb-2">

                                <?php $user_image = $user_data['image_name'];
                                if($user_image!=null)
                                {
                                ?>
                                <img class="round user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"  height="90" width="90" src="<?php echo "../files/users/profiles/".$user_data['image_name']; ?>">
                                <?php
                                }
                                else{
                                ?>
                                <img class="round user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"  height="90" width="90" src="../app-assets/images/default-user.png" >
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <a href="user_edit_profile.php" class="btn btn-success mr-2 bg-success bg-darken-2 waves-effect waves-float waves-light float-right">
                                <i class=" fas fa-user-edit mr-2"></i>
                                <span>Edit Profile</span>
                            </a>
                            <a href="user_change_password.php" class="btn btn-info mr-2 bg-info bg-darken-2 waves-effect waves-float waves-light float-right">
                                <i class=" fas fa-user-lock mr-2"></i>
                                <span>Change Password</span>
                            </a>

                        </div>

                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form class="form-validate">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">User Name</h3>
                                    <h5 class="text-secondary text-uppercase"><?php echo $user_data['user_name'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">First Name</h3>
                                    <h5 class="text-secondary text-capitalize"><?php echo $user_data['f_name'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">Last Name</h3>
                                    <h5 class="text-secondary text-capitalize"><?php echo $user_data['l_name'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">Email</h3>
                                    <h5 class="text-secondary"><?php echo $user_data['email'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">Phone</h3>
                                    <h5 class="text-secondary"><?php echo $user_data['phone'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">Country</h3>
                                    <h5 class="text-secondary text-uppercase"><?php echo $user_data['country'];?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-primary mt-2">Password</h3>
                                    <input type="password" disabled class="form-control" value="<?php echo $user_data['password'];?>"  id="myInput" />
                                    <input class="mt-2 mr-1" type="checkbox" onclick="myFunction()">Show Password
                                </div>


                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                    <!-- Account Tab ends -->


                </div>
            </div>
        </div>
    </div>
</div>


<?php

include("footer.php");

?>
