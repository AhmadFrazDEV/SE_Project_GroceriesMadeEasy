<?php
include("header.php");

$query = "SELECT * from about where id='1'";
$about =db::getRecord($query);

$query = "SELECT * from about where id='2'";
$about_img =db::getRecord($query);

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>


<script>
    function view(title,image,description,status)
    {
        document.getElementById("view_title").innerHTML=title;
        document.getElementById("view_image").src=image;
        document.getElementById("view_description").innerHTML=description;

        //        alert();
        if(status==1){
            document.getElementById("view_status1").innerHTML="Inactive";
            //             alert();
        }
        else{
            document.getElementById("view_status").innerHTML="Active";
        }

        $("#view_modal").modal('show');
    }

    function edit(id,title,description,status)
    {

        document.getElementById("edit_id").value=id;;
        document.getElementById("edit_title").value=title;
        document.getElementById("edit_description").value=description;

        //        alert();
        if(status==0){
            $( "#check" ).prop( "checked", true );
            //             alert();
        }
        else{
            $( "#check" ).prop( "checked", false );
        }

        $("#edit_modal").modal('show');
    }

    function delete_banner(id)
    {

        document.getElementById("delete_id").value=id;;


        $("#delete_modal").modal('show');
    }


</script>


<script type="text/javascript">
    var status = "<?php echo $status; ?>";

    if(status==1)
    {
        swal({
            title: "Added Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about.php';
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
            title: "Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about.php';
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
            title: "Successfully Deleted!",
            //            text: " Successfully Deleted ",
            //   text: "Please Complete 2nd Step !",
            type: "error",
            icon: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if(status==4)
    {
        swal({
            title: "Something Went Wrong!",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about.php';
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

<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">About Us</a></li>
                            </ol>
                        </nav>
                        <!--
<nav aria-label="breadcrumb ">
<div class="ml-auto">
<div class="btn-group">
<button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add_banner"><i class="bx bx-image-add mr-1"></i>Add Banner</button>
</div>
</div>
</nav>
-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->
<h2 class="mb-0 text-center h1 text-primary uppercase">About Us</h2>
<hr>
<div class="row">
    <?php
    if($about!=NULL)
    {

    ?>
    <div class="col-12 col-lg-6 col-xl-6" >
        <div class="card px-2 h-100">
            <h6 class="text-justify mt-4" style="  overflow:hidden;
                                                 line-height: 2rem;
                                                 max-height: 20rem;
                                                 -webkit-box-orient: vertical;
                                                 display: block;
                                                 display: -webkit-box;
                                                 overflow: hidden !important;
                                                 text-overflow: ellipsis;
                                                 -webkit-line-clamp: 11;"><?php echo $about['description']; ?></h6>
            <div class="card-body">
                <hr>
                <div class="profile-social mt-3 text-right">
                    <span data-toggle="modal" data-target="#view">
                    <button type="button" data-toggle="popover"  data-trigger="hover" data-original-title="View Detail"   class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></button>
           </span>
           <span data-toggle="modal" data-target="#edit_modal">
                    <button type="button" data-toggle="popover"  data-trigger="hover" data-original-title="Edit Detail" class="btn btn-linkedin " ><i class="bx bx-edit"></i></button>
             </span>
                </div>
            </div>


        </div>
    </div>
    <?php
    }
    else{
        echo "Data is not Found!!";
    }
    ?>

    <?php
    if($about_img!=NULL)
    {

    ?>
    <div class="col-12 col-lg-6 col-xl-6" >
        <div class="card h-100">
            <img src="<?php echo "../files/banners/".$about_img['image_name']; ?>" height="300"  class="card-img-top" alt="">
            <div class="card-body">
                <hr>
                <div class="profile-social mt-3 text-right">
                    <span data-toggle="modal" data-target="#view1">
                    <button type="button" data-toggle="popover"  data-trigger="hover" data-original-title="View Detail"  class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></button>
                    </span><span data-toggle="modal" data-target="#edit_modal1">
                    <button type="button" data-toggle="popover"  data-trigger="hover" data-original-title="Edit Detail" class="btn btn-linkedin " ><i class="bx bx-edit"></i></button>
                    </span>
                </div>
            </div>


        </div>
    </div>
    <?php
    }
    else{
        echo "Data is not Found!!";
    }
    ?>




</div>



<div id="edit_modal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Edit Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Description</label>
                        <textarea class="form-control form-control-lg radius-30" id="edit_description" name="edit_description" ><?php echo $about['description']; ?></textarea>
                    </div>

                    <input type="text" id="edit_id" name="edit_id" value="1" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_about">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="edit_modal1" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Edit Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Upload Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="file"  class="file-upload"  />
                        </div>
                    </div>

                    <input type="text" id="edit_id" name="edit_id" value="2" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_about_img">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_banner" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Create Banner</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="h4">Upload Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="file"  class="file-upload" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="h4">Title</label>
                        <input type="text" name="title"  class="form-control form-control-lg radius-30" />
                    </div>
                    <div class="form-group">
                        <label class="h4">Description</label>
                        <textarea type="text" name="description" rows="4" class="form-control form-control-lg radius-30" > </textarea>
                    </div>

                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_banner" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="view" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1" >View Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 p-4">

                        <h2 class="text-primary">Description:</h2>
                        <h2 class="text-secondary text-justify" > <?php echo $about['description']; ?></h2>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade text-left" id="view1" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1" >View Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 p-4">

                        <img src="<?php echo "../files/banners/".$about_img['image_name']; ?>"   class="card-img-top" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Modal -->

<?php
include("footer.php");
$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>
<script>
    CKEDITOR.replace('edit_description');
</script>
