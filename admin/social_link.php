<?php
include("header.php");

//getting all user except where role = admin
//$query = "SELECT * from user_login where !(role='admin')";
$query = "SELECT * from user_login where role!='1'";
$users = db::getRecords($query);
//print_r($users);

$status = NULL;

if(isset($_GET['status']))
{
    $status = $_GET['status'];
}



$query = "SELECT * from social_link";
$social_links =db::getRecords($query);

if($user_role=='1'){


?>


<script>
    function edit_status(id,title,link)
    {

        document.getElementById("edit_status_id").value=id;
        document.getElementById("edit_title").value=title;
        document.getElementById("edit_link").value=link;


        $("#edit_status_modal").modal('show');
    }

</script>

<script type="text/javascript">
    var status = "<?php echo $status; ?>";
    if(status==1)
    {
        swal({
            title: "Successfully Added!",
            text: "  ",
            //   text: "Please Complete 2nd Step !",
            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/social_link.php';
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
            title: "Successfully Updated!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/social_link.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/social_link.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/social_link.php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Social Links</a></li>
                            </ol>
                        </nav>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add_modal"><i class="bx bx-image-add mr-1"></i>Add Social Link</button>
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

<div class="card">
    <div class="card-body">
        <!-- Row grouping -->
        <section id="row-grouping-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-title">
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Social Links</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Link</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    if($social_links!=NULL)
                    {
                        $count=1;
                        foreach($social_links as $social_link)
                        {
                                        ?>
                                        <tr >
                                            <td class="text-center" > <?php echo $count; ?> </td>
                                            <td class="text-center text-uppercase"> <?php echo $social_link['title']; ?></td>
                                            <td class="text-center"> <?php echo $social_link['link']; ?></td>
                                            <td class="text-center ">
                                                <span data-toggle="modal" data-target="#edit_status_modal<?php echo $social_link['id']; ?>">
                                                <button type="button" class="btn btn-linkedin "  data-toggle="popover"  data-trigger="hover" data-original-title="Edit Social Link"><i class=" bx bx-edit"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#delete_modal<?php echo $social_link['id']; ?>">
                                                <button data-toggle="popover"  data-trigger="hover" data-original-title="Delete Social Link" type="button"   class="btn btn-pinterest "><i class=" bx bx-trash"></i></button>
                                                </span>

                                                <span class="text-left">


                                                    <!-- Modal -->
                                                    <div id="edit_status_modal<?php echo $social_link['id']; ?>" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content radius-30">
                                                                <div class="modal-header bg-info border-bottom-0">
                                                                    <h4 class="modal-title my-1" >Edit Social Link </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-5">
                                                                    <form action="action.php" method="post" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <label class="h4">Title</label>
                                                                            <select data-placeholder="Select " class=" form-control" id="select2-icons" name="edit_title">

                                                                                <?php
                            $title = $social_link['title'];

                            if($title=="facebook"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" selected>Facebook</option>
                                                                                <option value="twitter" data-icon="twitter">Twitter</option>
                                                                                <option value="google" data-icon="twitter">Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github">Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram">Instagram</option>
                                                                                <?php
                            }
                            elseif($title=="twitter"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" >Facebook</option>
                                                                                <option value="twitter" data-icon="twitter" selected>Twitter</option>
                                                                                <option value="google" data-icon="twitter">Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github">Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram">Instagram</option>
                                                                                <?php
                            }
                            elseif($title=="google"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" >Facebook</option>
                                                                                <option value="twitter" data-icon="twitter">Twitter</option>
                                                                                <option value="google" data-icon="twitter"  selected>Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github">Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram">Instagram</option>
                                                                                <?php
                            }
                            elseif($title=="linkedin"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" >Facebook</option>
                                                                                <option value="twitter" data-icon="twitter">Twitter</option>
                                                                                <option value="google" data-icon="twitter"  >Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin" selected>LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github">Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram">Instagram</option>
                                                                                <?php
                            }
                            elseif($title=="pinterest"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" >Facebook</option>
                                                                                <option value="twitter" data-icon="twitter">Twitter</option>
                                                                                <option value="google" data-icon="twitter"  >Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github" selected>Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram">Instagram</option>
                                                                                <?php
                            }
                            elseif($title=="instagram"){
                                                                                ?>
                                                                                <option value="facebook" data-icon="fa fa-facebook" >Facebook</option>
                                                                                <option value="twitter" data-icon="twitter">Twitter</option>
                                                                                <option value="google" data-icon="twitter"  >Google +</option>
                                                                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                                                                <option value="pinterest" data-icon="github">Pinterest</option>
                                                                                <option value="instagram" data-icon="instagram" selected >Instagram</option>
                                                                                <?php
                            }

                                                                                ?>



                                                                            </select>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="h4" for="role">Link</label>
                                                                            <input type="url" name="edit_link" value="<?php echo $social_link['link']; ?>"  class="form-control form-control-lg radius-30" required />
                                                                        </div>
                                                                        <input type="hidden" id="edit_status_id" value="<?php echo $social_link['id']; ?>" name="edit_id" hidden>
                                                                        <hr/>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_social_link">Update </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" id="delete_modal<?php echo $social_link['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content  border-0">
                                                                <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                                                                    <h5 class="modal-title" style="color:white;">Delete Social Link </h5>

                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="action.php" method="POST">
                                                                        <div class="modal-body">
                                                                            <p class="text-danger" >Are You Sure to Delete This</p>
                                                                        </div>
                                                                        <input type="hidden" value="<?php echo $social_link['id']; ?>" id="delete_id" name="delete_id" hidden>
                                                                        <div class="modal-footer border-top-0">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" name="delete_social_link" class="btn btn-outline-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>

                                            </td>


                                        </tr>
                                        <?php

                            $count++;
                        }

                    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Row grouping -->

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Add Social Link</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form action="action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Title</label>
                        <select data-placeholder="Select " class="select2-icons form-control" id="select2-icons" name="title">
                            <optgroup label="Social Media">
                                <option value="facebook" data-icon="fa fa-facebook" selected>Facebook</option>
                                <option value="twitter" data-icon="twitter">Twitter</option>
                                <option value="google" data-icon="twitter">Google +</option>
                                <option value="linkedin" data-icon="linkedin">LinkedIN</option>
                                <option value="pinterest" data-icon="github">Pinterest</option>
                                <option value="instagram" data-icon="instagram">Instagram</option>
                            </optgroup>
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="h4" for="role">Link</label>
                        <input type="url" name="link"  class="form-control form-control-lg radius-30" required />
                    </div>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_social_link" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
                   }
else{

}

include("footer.php");

?>

