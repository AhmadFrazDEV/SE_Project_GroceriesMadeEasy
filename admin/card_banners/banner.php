<?php
include("header.php");

$query = "SELECT * from card_banner";
$banners =db::getRecords($query);

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
            title: "Banner Added Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/banners/banner.php';
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
            title: "Banner Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/banners/banner.php';
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
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/banners/banner.php';
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
            const nextURL = 'https://dev.single-solution.com/kids_clothing/admin/banners/banner.php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Card Banners </a></li>
                            </ol>
                        </nav>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add_banner"><i class="bx bx-image-add mr-1"></i>Add Card Banners</button>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->
<h2 class="mb-0 text-center h1 text-primary uppercase">Active Card Banners </h2>
<hr>
<div class="row">
    <?php
    if($banners!=NULL)
    {
        foreach($banners as $banner)
        {
    ?>
    <div class="col-12 col-lg-3 col-xl-3" >
        <div class="card">
            <img src="<?php echo "../files/banners/".$banner['image_name']; ?>" style="width:80px;" class="card-img-top m-3" alt="">
            <div class="card-body">
                <hr>
                <div class="profile-social mt-3 text-right">
                    <span onclick="view('<?php echo $banner['title']; ?>','<?php echo "../files/banners/".$banner['image_name']; ?>','<?php echo $banner['description']; ?>','<?php echo $banner['status']; ?>')">
                    <a  data-toggle="popover"  data-trigger="hover" data-original-title="View Card Banner Details"  class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></a>
                    </span>
                    <span onclick="edit('<?php echo $banner['id']; ?>','<?php echo $banner['title']; ?>','<?php echo $banner['description']; ?>','<?php echo $banner['status']; ?>')">
                    <a data-toggle="popover"  data-trigger="hover" data-original-title="Edit Card Banner "    class="btn btn-linkedin " ><i class="bx bx-edit"></i></a>
                    </span>
                    <span  onclick="delete_banner('<?php echo $banner['id']; ?>')">
                    <a data-toggle="popover"  data-trigger="hover" data-original-title="Delete Card Banner"  class="btn btn-pinterest "><i class="bx bx-trash"></i></a>
                    </span>
                </div>
            </div>


        </div>
    </div>
    <?php
        }
    }
    else{
        echo "Data is not Found!!";
    }
    ?>
</div>


<!-- Modal -->
<div class="modal fade" id="add_banner" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Add Card Banner</h3>
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
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_c_banner" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="view_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1" >View Card Banner Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 py-4 px-2">
                        <img id="view_image" src="" style="width:80px;"  class="card-img-top" alt="">
                        <h2 class="text-primary ">Banner Title: </h2>
                        <h5 class="card-title " id="view_title"></h5>
                        <h2 class="text-primary ">Status: </h2>
                        <h5 class="card-title " ><div class=" badge badge-glow badge-pill badge-warning" id="view_status1"></div>
                        <div class=" badge badge-glow badge-pill badge-success" id="view_status"></div>
                        </h5>

                        <h2 class="text-primary">Banner Description:</h2>
                        <h2 class="text-secondary" id="view_description"></h2>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Modal -->
<div id="edit_modal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Edit Card Banner </h4>
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
                    <div class="form-group">
                        <label class="h4">Title</label>
                        <input type="text" id="edit_title" name="edit_title" value="<?php echo $banner['title']; ?>" class="form-control form-control-lg radius-30" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="check"  name="status">
                            <label class="h4 custom-control-label" for="check">Active</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="h4">Description</label>
                        <textarea class="form-control form-control-lg radius-30" id="edit_description" name="edit_description" ><?php echo $banner['description']; ?></textarea>
                    </div>

                    <input type="text" id="edit_id" name="edit_id" value="" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_c_banner">Update Card Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="delete_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content  border-0">
            <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                <h5 class="modal-title" style="color:white;">Delete Card Banner</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../action.php" method="POST">
                    <div class="modal-body">
                        <p class="text-danger" >Are You Sure to Delete This</p>
                    </div>
                    <input type="text" id="delete_id" name="delete_id" hidden>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="delete_c_banner" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
include("footer.php");
$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>
