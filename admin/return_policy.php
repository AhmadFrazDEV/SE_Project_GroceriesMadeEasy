<?php
include("header.php");

$query = "SELECT * from return_policy";
$return_policy =db::getRecord($query);

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>


<script>
    function view()
    {
//        document.getElementById("view_title").innerHTML=title;

        $("#view_modal").modal('show');
    }

    function edit()
    {

        //        document.getElementById("edit_id").value=id;;
        //        document.getElementById("edit_title").value=title;

        $("#edit_modal").modal('show');
    }

    //    function delete_banner(id)
    //    {
    //
    //        document.getElementById("delete_id").value=id;;
    //
    //
    //        $("#delete_modal").modal('show');
    //    }


</script>


<script type="text/javascript">
    var status = "<?php echo $status; ?>";

    if(status==1)
    {
        swal({
            title: "Video Added Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/return_policy,php';
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
            const nextURL = 'https://www.oppdripp.com/admin/return_policy,php';
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
            const nextURL = 'https://www.oppdripp.com/admin/return_policy,php';
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
            const nextURL = 'https://www.oppdripp.com/admin/return_policy,php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Return Policy</a></li>
                            </ol>
                        </nav>
                        <!--
<nav aria-label="breadcrumb ">
<div class="ml-auto">
<div class="btn-group">
<button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add_banner"><i class="bx bx-image-add mr-1"></i>Add Videos</button>
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
<h2 class="mb-0 text-center h1 text-primary uppercase">Return Policy</h2>
<hr>
<div class="row">
    <?php
    if($return_policy!=NULL)
    {

    ?>
    <div class="col-12 col-lg-12 col-xl-12" >
        <div class="card">

            <div class="card-body">


                <h2 class="text-primary" >Description:</h2>
                <p style="  overflow:hidden;
                          line-height: 2rem;
                          max-height: 8rem;
                          -webkit-box-orient: vertical;
                          display: block;
                          display: -webkit-box;
                          overflow: hidden !important;
                          text-overflow: ellipsis;
                          -webkit-line-clamp: 4;"> <?php echo $return_policy['description']; ?></p>
                <hr>
                <div class="profile-social mt-3 text-right">
                    <span onclick="view()" >
                    <a data-toggle="popover"  data-trigger="hover" data-original-title="View Return Policy"  class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></a>
                    </span>
                    <span onclick="edit()">
                    <a data-toggle="popover"  data-trigger="hover" data-original-title="Edit Return Policy"   class="btn btn-linkedin " ><i class="bx bx-edit"></i></a>
                    </span>
                    <!--

<a class="btn btn-pinterest " onclick="delete_banner('<?php echo $return_policy['id']; ?>')"><i class="bx bx-trash"></i></a>
-->
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


<!-- Modal -->
<!--
<div class="modal fade" id="add_banner" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Add Video</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="h4">Upload Video</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="file"  class="file-upload"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="h1">Or Add</label>

                    </div>

                    <div class="form-group">
                        <label class="h4">Url</label>
                        <input type="url" name="url"  class="form-control form-control-lg radius-30" />
                    </div>


                    <div class="form-group">
                        <label class="h4">Title</label>
                        <input type="text" name="title" required class="form-control form-control-lg radius-30" />
                    </div>


                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_video" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
-->

<!-- Modal -->
<div class="modal fade text-left" id="view_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1" >View Return Ploicy Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 py-4 px-2">

                        <h2 class="text-primary ">Description: </h2>
                        <h5 class="card-title " id="view_title"><?php echo $return_policy['description']; ?></h5>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="edit_modal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Edit Return Policy Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Description</label>
                        <textarea id="edit_title" name="edit_description"  class="form-control form-control-lg radius-30" ><?php echo $return_policy['description']; ?></textarea>
                    </div>

                    <input type="text" id="edit_id" name="edit_id" value="<?php echo $return_policy['id']; ?>" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_returns">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!--
<div class="modal fade" id="delete_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content  border-0">
            <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                <h5 class="modal-title" style="color:white;">Delete</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="action.php" method="POST">
                    <div class="modal-body">
                        <p class="text-danger" >Are You Sure to Delete This</p>
                    </div>
                    <input type="text" id="delete_id" name="delete_id" hidden>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="delete_video" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
-->

<?php
include("footer.php");

?>
<script>
    CKEDITOR.replace( 'edit_title' );
</script>
