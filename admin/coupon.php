<?php
include("header.php");

$query = "SELECT * from coupon";
$coupons =db::getRecords($query);

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>


<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Coupons</a></li>
                            </ol>
                        </nav>
                        <?php
                        if($user_role=='1'){


                        ?>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add"><i class="bx bx-image-add mr-1"></i>Add Coupon</button>
                                </div>
                            </div>
                        </nav>
                        <?php
                        }
                        ?>
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
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Coupons</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table  table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="h3 text-center"># </th>
                                        <th class="h3 text-center">Coupon Code</th>
                                        <th class="h3 text-center">Discount</th>
                                        <th class="h3 text-center">Status</th>
                                        <?php
                                        if($user_role=='1'){


                                        ?>
                                        <th class="text-center">Actions</th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($coupons!=NULL)
                                    {
                                        $count=0;
                                        foreach($coupons as $coupon)

                                        {
                                            $count++;

                                    ?>
                                    <tr >
                                        <td class="text-center" > <?php echo $count; ?></td>

                                        <td class="text-center h4  text-capitalize">
                                            <div class=" text-success px-3 py-1">
                                                <?php echo $coupon['code']; ?>
                                            </div>
                                        </td>


                                        <td class="text-center h3  text-capitalize">
                                            <div class="text-primary px-3 py-1">
                                                <?php echo $coupon['value']; ?>
                                            </div>
                                        </td>
                                        <td class="text-center h3  text-capitalize">
                                            <div class="text-info px-3 py-1">
                                                <span class="text-Info "><?php
                                            $status =  $coupon['status'];
                                            if($status==1){
                                                    ?>
                                                    <div class=" badge badge-glow badge-pill badge-danger"><?php echo "Inactive"; ?></div>
                                                    <?php

                                            }else{

                                                    ?>
                                                    <div class=" badge badge-glow badge-pill badge-success"><?php echo "Active"; ?></div>
                                                    <?php

                                            }

                                                    ?></span>


                                            </div>
                                        </td>
                                        <?php
                                            if($user_role=='1'){


                                        ?>
                                        <td class="text-center table-active">
                                            <!--                                            <a onclick="view('<?php echo $category['c_name']; ?>','<?php echo "files/categories/".$category['image_name']; ?>')"  class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></a>-->
                                            <span onclick="edit('<?php echo $coupon['id']; ?>','<?php echo $coupon['code']; ?>','<?php echo $coupon['value']; ?>','<?php echo $coupon['status']; ?>')">
                                            <a  data-toggle="popover"  data-trigger="hover" data-original-title="Edit Coupon" class="btn btn-linkedin " ><i class="bx bx-edit"></i></a>
                                            </span>
                                            <span onclick="delete_modal('<?php echo $coupon['id']; ?>')">
                                            <a data-toggle="popover"  data-trigger="hover" data-original-title="Delete Coupon" class="btn btn-pinterest " ><i class="bx bx-trash"></i></a>
                                            </span>
                                        </td>
                                        <?php
                                            }
                                        ?>

                                    </tr>

                                    <?php
                                        }

                                    }
                                    else{
                                        echo"Data is not Found!!";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Row grouping -->
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Add Coupon</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Coupon Code</label>
                        <input type="text" name="code"  class="form-control form-control-lg radius-30" required />
                    </div>


                    <div class="form-group">
                        <label class="h4">Coupon Discount</label>
                        <input type="text" name="value"  class="form-control form-control-lg radius-30" required />
                    </div>

                    <!--
<div class="form-group">
<label class="h4">Description</label>
<textarea type="text" name="description" rows="4" class="form-control form-control-lg radius-30" > </textarea>
</div>
-->

                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_coupon" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="view_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1" >View Coupon Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 py-4 px-2">
                        <img id="view_image" src="" style="max-width= 500px;"  class="card-img-top" alt=""></div>
                    <div class="col-md-12 px-2">
                        <h2 class="text-primary ">Name: </h2>
                        <h5 class="card-title " id="view_title"></h5>
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
                <h4 class="modal-title my-1" >Edit Coupon Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Coupon Code</label>
                        <input type="text" id="edit_code" name="edit_code" class="form-control form-control-lg radius-30" />
                    </div>

                    <div class="form-group">
                        <label class="h4">Coupon Discount</label>
                        <input type="text" id="edit_value" name="edit_value" class="form-control form-control-lg radius-30" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="check"  name="status">
                            <label class="h4 custom-control-label" for="check">Active</label>
                        </div>
                    </div>

                    <input type="text" id="edit_id" name="edit_id" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_coupon">Update </button>
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
                <h5 class="modal-title" style="color:white;">Delete Coupon</h5>

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
                        <button type="submit" name="delete_coupon" class="btn btn-outline-danger">Delete</button>
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


<script>
    function view(title,image)
    {
        document.getElementById("view_title").innerHTML=title;
        document.getElementById("view_image").src=image;

        //        alert();



        $("#view_modal").modal('show');
    }

    function edit(id,code,value,status)
    {

        document.getElementById("edit_id").value=id;
        document.getElementById("edit_code").value=code;
        document.getElementById("edit_value").value=value;

        if(status==0){
            $( "#check" ).prop( "checked", true );
            //             alert();
        }
        else{
            $( "#check" ).prop( "checked", false );
        }

        $("#edit_modal").modal('show');
    }

    function delete_modal(id)
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
            title: "Successfully Added!",
            text: "  ",
            //   text: "Please Complete 2nd Step !",
            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/coupon.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/coupon.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/coupon.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/coupon.php';
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
