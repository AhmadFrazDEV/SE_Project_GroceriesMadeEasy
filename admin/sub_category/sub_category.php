<?php
include("header.php");

$query = "SELECT * from sub_category";
$sub_categories =db::getRecords($query);

$query = "SELECT * from category";
$categories =db::getRecords($query);

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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
                            </ol>
                        </nav>
                        <?php
                        if($user_role=='1'){


                        ?>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add"><i class="bx bx-image-add mr-1"></i>Add Category</button>
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
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Categories</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table  table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="text-center"># </th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Merchant Name</th>
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
                                    if($sub_categories!=NULL)
                                    {
                                        $count=0;
                                        foreach($sub_categories as $sub_category)

                                        {
                                            $count++;

                                    ?>
                                    <tr >
                                        <td class="text-center" > <?php echo $count; ?></td>

                                        <td class="text-center h4 table-info text-capitalize"> <?php
                                            $category_id    = $sub_category['c_id'];
                                            $query = "SELECT * from category where id='$category_id'";
                                            $categories_record = db::getRecord($query);
                                            ?>
                                            <div class=" badge d-block badge-pill badge-glow  badge-light-info px-3 py-1">
                                                <?php echo $sub_category['sc_name']; ?>
                                            </div>
                                        </td>


                                        <td class="text-center h3 table-primary text-capitalize">
                                            <div class=" badge d-block badge-pill badge-glow  badge-light-primary h px-3 py-1">
                                                <?php echo $categories_record['c_name']; ?>
                                            </div>
                                        </td>
                                        <?php
                                            if($user_role=='1'){


                                        ?>
                                        <td class="text-center table-active">
                                            <!--                                            <a onclick="view('<?php echo $category['c_name']; ?>','<?php echo "files/categories/".$category['image_name']; ?>')"  class="btn btn-linkedin text-center bg-success bg-darken-2  text-white  float-left" ><i class="fa fa-eye "></i></a>-->
                                            <span onclick="edit('<?php echo $sub_category['id']; ?>','<?php echo $sub_category['sc_name']; ?>','<?php echo $categories_record['id']; ?>')">
                                            <a data-toggle="popover"  data-trigger="hover" data-original-title="Edit Category"  class="btn btn-linkedin " ><i class="bx bx-edit"></i></a>
                                            </span>
                                            <span onclick="delete_modal('<?php echo $sub_category['id']; ?>')">
                                            <a data-toggle="popover"  data-trigger="hover" data-original-title="Delete Category" class="btn btn-pinterest " ><i class="bx bx-trash"></i></a>
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
                <h3 class="text-white m-1">Add Category</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Category Name</label>
                        <select class="form-control form-control-lg" name="c_id" required>
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            if($categories!=NULL)
                            {
                                foreach($categories as $category)

                                {

                            ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['c_name']; ?> </option>
                            <?php
                                }
                            }

                            else{

                            ?>
                            <option value="" disabled><?php echo "No Category Found" ; ?> </option>
                            <?php
                            }


                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="h4">Sub Category Name</label>
                        <input type="text" name="sc_name"  class="form-control form-control-lg radius-30" required />
                    </div>
                    <!--
<div class="form-group">
<label class="h4">Description</label>
<textarea type="text" name="description" rows="4" class="form-control form-control-lg radius-30" > </textarea>
</div>
-->

                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_sub_category" >Submit</button>
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
                <h4 class="modal-title  my-1" >View Category Details</h4>
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
                <h4 class="modal-title my-1" >Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="h4">Category Name</label>
                        <select class="form-control form-control-lg" id="selected_category" name="edit_c_id" required>
                            <option value="" disabled>Select Category</option>
                            <?php
                            if($categories!=NULL)
                            {
                                foreach($categories as $category)

                                {

                            ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['c_name']; ?> </option>
                            <?php
                                }
                            }

                            else{

                            ?>
                            <option value="" disabled><?php echo "No Category Found" ; ?> </option>
                            <?php
                            }


                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="h4">Name</label>
                        <input type="text" id="edit_sc_name" name="edit_sc_name" class="form-control form-control-lg radius-30" />
                    </div>

                    <input type="text" id="edit_id" name="edit_id" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_sub_category">Update </button>
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
                <h5 class="modal-title" style="color:white;">Delete Category</h5>

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
                        <button type="submit" name="delete_sub_category" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
include("footer.php");

?>


<script>
    function view(title,image)
    {
        document.getElementById("view_title").innerHTML=title;
        document.getElementById("view_image").src=image;

        //        alert();


        $("#view_modal").modal('show');
    }

    function edit(id,sc_name,c_id)
    {

        document.getElementById("edit_id").value=id;
        document.getElementById("edit_sc_name").value=sc_name;
        document.getElementById("selected_category").value=c_id;
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/sub_category/sub_category.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/sub_category/sub_category.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/sub_category/sub_category.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/sub_category/sub_category.php';
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
