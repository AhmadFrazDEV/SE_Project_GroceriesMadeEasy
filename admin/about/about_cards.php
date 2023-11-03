<?php
include("header.php");

$query = "SELECT * from about_cards";
$about_cards =db::getRecords($query);

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
            title: " Added Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about_cards.php';
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
            title: " Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/about/about_cards.php';
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
            const nextURL = 'http://www.oppdripp.com/about/about_cards.php';
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
            const nextURL = 'http://www.oppdripp.com/about/about_cards.php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">About Cards</a></li>
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
<h2 class="mb-0 text-center h1 text-primary uppercase">About Cards</h2>
<hr>
<div class="row">
    <?php
    if($about_cards!=NULL)
    {
        foreach($about_cards as $about_card)
        {
    ?>
    <div class="col-12 col-lg-6 col-xl-4" >
        <div class="card p-4">
            <h2 class="text-primary ">Card Title: </h2>
            <?php echo $about_card['title']; ?>
            <h5 class="card-title " ></h5>

            <h2 class="text-primary">Card Description:</h2>
            <p class="text-secondary" ><?php echo $about_card['description']; ?></p>

            <div class="card-body">
                <hr>
                <div class="profile-social mt-3 text-right">
                    <span data-toggle="modal" data-target="#edit_card<?php echo $about_card['id']; ?>">
                    <button type="button" data-toggle="popover"  data-trigger="hover" data-original-title="Edit Detail"   class="btn btn-linkedin " ><i class="bx bx-edit"></i></button>
                    </span>
                </div>

                <!-- Modal -->
                <div id="edit_card<?php echo $about_card['id']; ?>" class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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
                                        <label class="h4">Title</label>
                                        <input type="text" id="edit_title" name="edit_title" value="<?php echo $about_card['title']; ?>" class="form-control form-control-lg radius-30" />
                                    </div>

                                    <div class="form-group">
                                        <label class="h4">Description</label>
                                        <textarea rows="8" class="form-control form-control-lg radius-30" id="edit_description" name="edit_description"><?php echo $about_card['description']; ?></textarea>
                                    </div>

                                    <input type="text" id="edit_id" name="edit_id" value="<?php echo $about_card['id']; ?>" hidden>
                                    <hr/>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_about_card">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

<?php
include("footer.php");
$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>
