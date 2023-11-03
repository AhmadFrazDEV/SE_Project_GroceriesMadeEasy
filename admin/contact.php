<?php
include("header.php");

$query = "SELECT * from contact_info";
$contact_infos =db::getRecords($query);

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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Contact Info</a></li>
                            </ol>
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
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Contact Info</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table  table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="text-center"># </th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Detail</th>
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
                                    if($contact_infos!=NULL)
                                    {
                                        $count=0;
                                        foreach($contact_infos as $contact_info)

                                        {
                                            $count++;

                                    ?>
                                    <tr >
                                        <td class="text-center" > <?php echo $count; ?></td>

                                        <td class="text-center h4 table-info text-capitalize">
                                            <div class=" badge d-block badge-pill badge-glow  badge-light-info px-3 py-1">
                                                <?php echo $contact_info['title']; ?>
                                            </div>
                                        </td>


                                        <td class="text-center h3 table-primary text-capitalize">
                                            <div class=" badge d-block badge-pill badge-glow  badge-light-primary h px-3 py-1">
                                                <?php echo $contact_info['description']; ?>
                                            </div>
                                        </td>
                                        <?php
                                            if($user_role=='1'){


                                        ?>
                                        <td class="text-center table-active">
                                            <span onclick="edit('<?php echo $contact_info['id']; ?>','<?php echo $contact_info['title']; ?>','<?php echo $contact_info['description']; ?>')">
                                            <a data-toggle="popover"  data-trigger="hover" data-original-title="Edit Contact Detail" class="btn btn-linkedin " ><i class="bx bx-edit"></i></a>
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
<div id="edit_modal" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Edit Contact Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">

<!--

                    <div class="form-group">
                        <label class="h4">Title</label>
                        <input type="text" id="edit_title" name="edit_title" class="form-control form-control-lg radius-30" />
                    </div>
-->


                    <div class="form-group">
                        <label class="h4">Description</label>
                        <input type="text" id="edit_description" name="edit_description" class="form-control form-control-lg radius-30" />
                    </div>

                    <input type="text" id="edit_id" name="edit_id" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_contact_info">Update </button>
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
                        <button type="submit" name="delete_contact_info" class="btn btn-outline-danger">Delete</button>
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

    function edit(id,title,desc)
    {

        document.getElementById("edit_id").value=id;
//        document.getElementById("edit_title").value=title;
        document.getElementById("edit_description").value=desc;
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/contact.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/contact.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/contact.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/contact.php';
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
