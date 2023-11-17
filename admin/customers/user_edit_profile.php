<?php

include("header.php");


$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}

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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User Profile</a></li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->


<h2 class="mb-0 text-center h1 text-primary uppercase">Edit User Profile</h2>
<hr>
<div class="row">

    <div class="col-12 col-lg-12 col-xl-12" >
        <div class="card">

            <div class="card-body">

                <div class="tab-content">
                    <!-- Account Tab starts -->
                    <div class="tab-pane active">
                        <!-- users edit media object start -->

                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form action="../action.php" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" class="form-control text-uppercase" value="<?php echo $user_data['user_name'];?>" name="user_name"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">First Name</label>
                                        <input type="text" class="form-control text-capitalize" value="<?php echo $user_data['f_name'];?>" name="f_name"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Last Name</label>
                                        <input type="text" class="form-control text-capitalize" value="<?php echo $user_data['l_name'];?>" name="l_name"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="email" class="form-control" value="<?php echo $user_data['email'];?>" name="email"/>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Phone</label>
                                        <input type="text" class="form-control text-capitalize" value="<?php echo $user_data['phone'];?>" name="phone"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Country</label>
                                        <input type="text" class="form-control  text-capitalize" value="<?php echo $user_data['country'];?>" name="country"/>
                                        <input type="text" hidden value="<?php echo $user_data['id'];?>" name="id" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="h4">Upload Image</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" name="file"  class="file-upload"  />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-start">
                                <button type="submit" name="edit_user_profile"  class="btn btn-success mx-1 bg-success bg-darken-2 waves-effect waves-float waves-light float-right">
                                    <i class=" fas fa-user-shield mr-2"></i>
                                    <span>Save Details</span>
                                </button>

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





<script type="text/javascript">
    var status = "<?php echo $status; ?>";
    if(status==1)
    {
        swal({
            title: "Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/user_edit_profile.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

    if(status==2)
    {
        swal({
            title: "Something Went Wrong!",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/user_edit_profile.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if(status==3)
    {
        swal({
            title: "Email Already Exists! Try with different email...",
            text: "  ",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/user_edit_profile.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

</script>























<?php

include("footer.php");

?>
