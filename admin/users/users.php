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

if($user_role=='1'){


?>


<script>
    function edit_status(id,status)
    {
        document.getElementById("edit_status_id").value=id;

        //        alert();
        if(status==1){
            $( "#check" ).prop( "checked", true );
            //             alert();
        }
        else{
            $( "#check" ).prop( "checked", false );
        }

        $("#edit_status_modal").modal('show');
    }

</script>

<script type="text/javascript">
    var status = "<?php echo $status; ?>";
    if(status==1)
    {
        swal({
            title: "User Already Exists! Try with different email...",
            text: "  ",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/users.php';
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
            title: "User Created Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/users.php';
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
            title: "Access Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

    if(status==5)
    {
        swal({
            title: "Something Went Wrong!",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/category.php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                            </ol>
                        </nav>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add_user"><i class="bx bx-image-add mr-1"></i>Add User</button>
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
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Users</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    if($users!=NULL)
                    {
                        $count=1;
                        foreach($users as $user)
                        {
                                        ?>
                                        <tr >
                                            <td class="text-center" > <?php echo $count; ?> </td>
                                            <td class="text-center"> <?php echo $user['user_name']; ?></td>
                                            <td class="text-center"> <?php echo $user['email']; ?></td>
                                            <td class="text-center"> <?php echo $user['phone']; ?></td>
                                            <?php
                            $role = $user['role'];
                            if($role==1){
                                            ?>
                                            <td class="text-center"><div class=" badge badge-glow badge-pill badge-info"><?php echo "Admin"; ?></div> </td>
                                            <?php

                            }
                            elseif($role==2){
                                            ?>
                                            <td class="text-center "><div class=" badge badge-glow badge-pill badge-primary"><?php echo "Auteur"; ?></div></td>
                                            <?php
                            }
                            elseif($role==3){
                                            ?>
                                            <td class="text-center "><div class=" badge badge-glow badge-pill badge-info"><?php echo "Realisateur"; ?></div></td>
                                            <?php
                            }
                                            ?>
                                            <?php
                            $status = $user['status'];
                            if($status==0){
                                            ?>
                                            <td class="text-center"><div class=" badge badge-glow badge-pill badge-success"><?php echo "Authorized"; ?></div> </td>
                                            <?php

                            }
                            else{
                                            ?>
                                            <td class="text-center "><div class=" badge badge-glow badge-pill badge-danger"><?php echo "Revoked"; ?></div></td>
                                            <?php
                            }
                                            ?>

                                            <td class="text-center ">

                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a onclick="edit_status('<?php echo $user['id']; ?>','<?php echo $user['status']; ?>')"     class="btn btn-linkedin "><i class=" fas fa-user-edit"></i></a>


                                                </div>

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
<div class="modal fade" id="add_user" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Create User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form action="../action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Email</label>
                        <input type="text" name="email"  class="form-control form-control-lg radius-30" required />
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control form-control-lg radius-30"  name="role" required >
                            <option value="1">Admin</option>
                            <option value="2">Auteur</option>
                            <option value="3">Realisateur</option>
                        </select>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_user" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--
Modal
<div class="modal fade text-left" id="view_modal" tabindex="-1" role="dialog" aria-hidden="true" >
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
<div class="modal-content">
<div class="modal-header bg-success">
<h4 class="modal-title  my-1" >Details</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

</div>
</div>
</div>
-->

<!-- Modal -->
<div id="edit_status_modal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form action="../action.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="h4">Access Revoked</label>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-control-success custom-switch mb-3">
                            <input type="checkbox" id="check" value="1" name="status" class="custom-control-input" >
                            <label class="custom-control-label" for="check"></label>
                        </div>
                    </div>
                    <input type="text" id="edit_status_id" name="id" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_user_access">Update Access</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--
Modal
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content  border-0">
<div class="modal-header bg-danger bg-darken-2 border-bottom-0">
<h5 class="modal-title" style="color:white;">Delete</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
</button>
</div>

</div>
</div>
</div>
-->

<?php
                   }
else{

}

include("footer.php");

?>

