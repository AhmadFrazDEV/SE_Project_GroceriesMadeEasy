<?php
include("header.php");

$query = "SELECT * from mini_category";
$mini_categories =db::getRecords($query);

$query = "SELECT * from sub_category";
$sub_categories =db::getRecords($query);

$query = "SELECT * from category";
$categories =db::getRecords($query);

$query = "SELECT * from article";
$articles =db::getRecords($query);

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>


<!--
These Links are Used For Bootsrtrap InputTags!!
Use It In same Order!
-->
<link rel="stylesheet" href="dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/app.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/app.js"></script>
<script src="assets/app_bs3.js"></script>



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
            const nextURL = 'https://dev.single-solution.com/gme/admin/article.php';
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
            const nextURL = 'https://dev.single-solution.com/gme/admin/article.php';
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
    if(status==5)
    {
        swal({
            title: "Access Successfully Updated!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/article.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if(status==6)
    {
        swal({
            title: "Shared Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/article.php';
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Articles</a></li>
                            </ol>
                        </nav>
                        <?php
                        if($user_role=='1'){


                        ?>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 px-5" data-toggle="modal" data-target="#add"><i class="bx bx-image-add mr-1"></i>Add Article</button>
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
<h2 class="mb-0 text-center h1 text-primary uppercase">Active Articles</h2>
<hr>
<div class="row">
    <?php
    if ($articles != NULL) {
        foreach ($articles as $article) {
            $article_id          = $article['id'];
            $query               = "SELECT * from article_file where article_id='$article_id' ";
            $article_images      = db::getRecords($query);
    ?>
    <div class="col-12 col-lg-6 col-xl-4" >
        <div class="card" style="height:580px;" >

            <div class="card-body">
                <div id="slider<?php echo $article['id']; ?>"  class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php

            if($article_images!=null){

                $count=0;


                foreach($article_images as $article_image)
                {
                    if($count==0)
                    {
                        ?>
                        <li data-target="#slider<?php echo $article['id']; ?>" data-slide-to="<?php echo $count;?>" class="active"></li>
                        <?php

                    }
                    else{

                        ?>

                        <li data-target="#slider<?php echo $article['id']; ?>" data-slide-to="<?php echo $count;?>"></li>
                        <?php
                    }
                    $count++;
                }

            }
                        ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php

            if($article_images!=null){

                $count=0;


                foreach($article_images as $article_image)
                {

                    if($count == 0){
                        ?>
                        <div class="carousel-item active">
                            <img class="img-fluid w-100" style="height:280px;" src="<?php echo "files/articles/primary_images/".$article_image['file_name']; ?>" alt="slide" />
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <?php

                    }
                    else{

                        ?>

                        <div class="carousel-item">
                            <img class="img-fluid w-100" style="height:280px;" src="<?php echo "files/articles/primary_images/".$article_image['file_name']; ?>" alt="slide" />
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <?php
                    }

                    $count++;
                }

            }
                        ?>




                    </div>
                    <a class="carousel-control-prev" href="#slider<?php echo $article['id']; ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider<?php echo $article['id']; ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
                <h3 class="text-Info"><?php echo $article['name'];?></h3>
                <span class="text-Info "><?php
            $status = $article['status'];
            if($status==0){
                    ?>
                    <div class=" badge badge-glow badge-pill badge-success"><?php echo "Authorized"; ?></div>
                    <?php

            }
            else{
                    ?>
                    <div class=" badge badge-glow badge-pill badge-danger"><?php echo "Revoked"; ?></div>
                    <?php
            }
                    ?></span>

                <?php
            if($user_role=='1'){


                ?>
                <a onclick="get_user(<?php echo $article['id'];?>)" class="btn float-right btn-primary bg-primary  bg-darken-2 "><i class="fa fa-share" ></i></a>



                <a onclick="edit_status('<?php echo $article['id']; ?>','<?php echo $article['status']; ?>')"     class="btn btn-linkedin float-right bg-warning bg-darken-2 mr-1 text-white "><i class=" fas fa-toggle-on"></i></a>


                <?php
            }
                ?>
                <br>
                <br>

                <hr>
                <div class="profile-social mt-3 text-right">
                    <button type="button"  class="btn btn-linkedin text-center bg-success bg-darken-2 mr-1 text-white  float-left" data-toggle="modal"  data-target="#view_modal<?php echo $article['id']; ?>"><i class="fa fa-eye "></i></button>

                    <?php
            if($user_role=='1'){


                    ?>


                    <a   class="btn btn-linkedin " onclick="edit('<?php echo $article['id']; ?>','<?php echo $article['c_id']; ?>','<?php echo $article['sc_id']; ?>','<?php echo $article['mc_id']; ?>','<?php echo $article['name']; ?>','<?php echo $article['date']; ?>','<?php echo $article['description1']; ?>','<?php echo $article['headline']; ?>','<?php echo $article['description2']; ?>','<?php echo $article['description3']; ?>')"><i class="bx bx-edit"></i></a>



                    <a class="btn btn-pinterest " onclick="delete_article('<?php echo $article['id']; ?>')"><i class="bx bx-trash"></i></a>
                    <?php
            }
                    ?>
                </div>

                <!-- Modal -->
                <div class="modal fade text-left" id="view_modal<?php echo $article['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title  my-1" >Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-start">
                                    <?php

            $article_id= $article['id'];
            $query               = "SELECT * from article_file where article_id='$article_id' ";
            $article_images      = db::getRecords($query);
                                    ?>
                                    <div class="col-lg-5 col-md-6 py-4 px-2">
                                        <div id="slide<?php echo $article_id; ?>" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php

            if($article_images!=null){

                $count=0;


                foreach($article_images as $article_image)
                {
                    if($count==0)
                    {
                                                ?>
                                                <li data-target="#slide<?php echo $article_id; ?>" data-slide-to="<?php echo $count;?>" class="active"></li>
                                                <?php

                    }
                    else{

                                                ?>

                                                <li data-target="#slide<?php echo $article_id; ?>" data-slide-to="<?php echo $count;?>"></li>
                                                <?php
                    }
                    $count++;
                }

            }
                                                ?>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <?php

            if($article_images!=null){

                $count=0;


                foreach($article_images as $article_image)
                {

                    if($count == 0){
                                                ?>
                                                <div class="carousel-item active">
                                                    <img class="img-fluid w-100" src="<?php echo "files/articles/primary_images/".$article_image['file_name']; ?>" alt="slide" />
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>
                                                <?php

                    }
                    else{

                                                ?>

                                                <div class="carousel-item">
                                                    <img class="img-fluid w-100" src="<?php echo "files/articles/primary_images/".$article_image['file_name']; ?>" alt="slide" />
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>
                                                <?php
                    }

                    $count++;
                }

            }
                                                ?>




                                            </div>
                                            <a class="carousel-control-prev" href="#slide<?php echo $article_id; ?>" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#slide<?php echo $article_id; ?>" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>

                                        </div>

                                        <?php
            $query               = "SELECT * from article_video where article_id='$article_id' ";
            $article_video      = db::getRecord($query);
                                        ?>

                                        <div class="row">
                                            <?php
            if($article_video!=NULL){
                                            ?>
                                            <!-- VIDEO -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Video</h4>
                                                        <div class="video-player" id="plyr-video-player">
                                                            <video class="w-100" height="240" controls>
                                                                <source src="<?php echo "files/articles/video/".$article_video['video_name']; ?>"  >
                                                            </video>
                                                            <!--                                                            <iframe class="w-100" src="<?php echo "files/articles/video/".$article_video['video_name']; ?>" allowfullscreen  autostart="false" ></iframe>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ VIDEO -->
                                            <?php
            }
                                            ?>


                                        </div>


                                        <?php

            $query               = "SELECT * from article_image where article_id='$article_id' ";
            $article_s_images      = db::getRecords($query);
            if($article_s_images!=null){

                                        ?>
                                        <div class="row justify-content-center">
                                            <?php
                foreach($article_s_images as $article_s_image)
                {
                                            ?>
                                            <div class="col-md-6 py-4 px-2">
                                                <img src="<?php echo "files/articles/secondary_images/".$article_s_image['image_name']; ?>" style="max-width= 300px;"  class="card-img-top" alt="">
                                            </div>

                                            <?php
                }

                                            ?>
                                        </div>
                                        <?php

            }
                                        ?>

                                    </div>



                                    <div class="col-lg-7 col-md-6 py-4 px-2">

                                        <h2 class="text-primary ">Category: </h2>
                                        <h5 class="card-title " >
                                            <?php

            $category_id= $article['c_id'];
            $query               = "SELECT * from category where id='$category_id' ";
            $catgeory      = db::getRecord($query);
            echo $catgeory['c_name'];
                                            ?>
                                        </h5>

                                        <h2 class="text-primary ">Sub Category: </h2>
                                        <h5 class="card-title " >
                                            <?php

            $sub_category_id= $article['sc_id'];
            $query               = "SELECT * from sub_category where id='$sub_category_id' ";
            $sub_catgeory      = db::getRecord($query);
            echo $sub_catgeory['sc_name'];
                                            ?></h5>

                                        <h2 class="text-primary ">Mini Category: </h2>
                                        <h5 class="card-title " >
                                            <?php

            $mini_category_id= $article['mc_id'];
            $query               = "SELECT * from mini_category where id='$mini_category_id' ";
            $mini_catgeory      = db::getRecord($query);
            echo $mini_catgeory['mc_name'];
                                            ?>
                                        </h5>

                                        <h2 class="text-primary ">Article Name: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['name']; ?></h5>

                                        <h2 class="text-primary ">Date: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['date']; ?></h5>

                                        <h2 class="text-primary ">Tags: </h2>
                                        <h5 class="card-title mt-2" >
                                            <?php

            $query="SELECT * FROM article_tag where article_id='$article_id'";
            $article_tags = db::getRecords($query);

            if($article_tags!= NULL)
            {

                $flag=0;

                if($article_tags!=NULL)
                {
                    $flag=1;
                }

                $size=sizeof($article_tags);

                $article_tag=NULL;

                for($i=0;$i<$size;$i++)
                {
                    if($i==($size-1))
                    {
                        //this code concatinates tags name
                        //                          $article=$article.$articles[$i]['name'];

                        //this code only produce one tag
                        $article_tag=$article_tags[$i]['name'];

                                            ?>
                                            <div class=" badge badge-glow badge-pill badge-info mr-1" >
                                                <?php echo $article_tag; ?>   </div>
                                            <?php

                    }
                    else
                    {
                        //this code concatinates tags name
                        //                        $article=$article.$articles[$i]['name'].",";

                        //this code only produce one tag
                        $article_tag=$article_tags[$i]['name'];

                                            ?>
                                            <div class=" badge badge-glow badge-pill badge-info mr-1" >
                                                <?php echo $article_tag; ?>   </div>
                                            <?php
                    }

                }
            }
                                            ?>
                                        </h5>

                                        <!--
<h2 class="text-primary ">Tags: </h2>
<h5 class="card-title " >
<?php

            $query="SELECT * FROM article_tag where article_id='$article_id'";
            $article_tags = db::getRecords($query);



            if($article_tags!= NULL)
            {

                $flag=0;

                if($article_tags!=NULL)
                {
                    $flag=1;
                }

                $size=sizeof($article_tags);

                $article_tag=NULL;

                for($i=0;$i<$size;$i++)
                {
                    if($i==($size-1))
                    {
                        $article_tag=$article_tag.$article_tags[$i]['name'];
                    }
                    else
                    {
                        $article_tag=$article_tag.$article_tags[$i]['name'].", ";
                    }

                }
            }
?>
<div class=" badge badge-glow badge-pill badge-info" >
<?php echo $article_tag; ?>   </div>
</h5>
-->

                                        <h2 class="text-primary ">Top Description: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['description1']; ?></h5>

                                        <h2 class="text-primary ">HeadLine: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['headline']; ?></h5>

                                        <h2 class="text-primary ">Second Description: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['description2']; ?></h5>

                                        <h2 class="text-primary ">Last Description: </h2>
                                        <h5 class="card-title " >
                                            <?php echo $article['description3']; ?></h5>




                                    </div>
                                </div>
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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content radius-30">
            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                <h3 class="text-white m-1">Create Article</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="h4">Upload Images</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="file[]" multiple  class="file-upload" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="h4">Upload Video (If Any)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="video"  class="file-upload" />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="h4">Category Name</label>
                        <select class="form-control form-control-lg" id="c_id" name="c_id" required>
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
                        <label class="h4" >Sub Category</label>
                        <select class="form-control" id="sub_category" name="sc_id" >
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="h4" >Mini Category</label>
                        <select class="form-control" id="mini_category" name="mc_id" >
                        </select>
                    </div>



                    <div class="form-group">
                        <label class="h4">Article Title</label>
                        <input type="text" id="edit_name" name="title"  class="form-control form-control-lg radius-30" required />
                    </div>
                    <div class="form-group">
                        <label class="h4">Date</label>
                        <input type="date" id="edit_date" name="date"  class="form-control form-control-lg radius-30" required />
                    </div>

                    <div class="form-group">
                        <label class="h4">Top Description</label>
                        <textarea type="text" id="edit_description1" name="description" rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">HeadLine</label>
                        <textarea type="text" id="edit_headline" name="headline" rows="3" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>
                    <div class="form-group">
                        <label class="h4">Upload Other Images (Below Headline If Any)</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="image[]" multiple  class="file-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h4">Second Description</label>
                        <textarea type="text" id="edit_description2" name="description_2" rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">Last Description</label>
                        <textarea type="text" id="edit_description3" name="description_3" rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">Tags</label>
                    </div>

                    <div class="example example_markup">
                        <div class="bs-input" >
                            <input type="text" class="input" name="tags[]" id="form-tags" value="" data-role="tagsinput" required multiple />
                        </div>

                        <!--
<div class="bs-example">
<select multiple data-role="tagsinput">
<option value="Amsterdam">Amsterdam</option>
<option value="Washington">Washington</option>
<option value="Sydney">Sydney</option>
<option value="Beijing">Beijing</option>
<option value="Cairo">Cairo</option>
</select>
</div>
-->
                    </div>



                    <hr/>
                    <div class="form-group">
                        <button type="submit" onclick="return validateForm()" class="btn btn-primary float-right radius-30 btn-lg"  name="add_new_article" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="h4">Upload Images</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="file[]" multiple  class="file-upload"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="h4">Upload Video (If Any)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="video"  class="file-upload" />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="h4">Category Name</label>
                        <select class="form-control form-control-lg" onclick="edit_c()" id="edit_c_id" name="c_id" required>

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="h4" >Sub Category</label>
                        <select class="form-control " onclick="edit_sc()" id="edit_sc_id" name="sc_id" >
                            <option value="" >No Sub Category</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="h4" >Mini Category</label>
                        <select class="form-control " id="edit_mc_id" name="mc_id" >
                            <option value="" >No Sub Category </option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label class="h4">Article Title</label>
                        <input type="text" name="title" id="edit_a_name"  class="form-control form-control-lg radius-30" required />
                    </div>
                    <div class="form-group">
                        <label class="h4">Date</label>
                        <input type="date" name="date"  id="edit_a_date"  class="form-control form-control-lg radius-30" required />
                    </div>

                    <div class="form-group">
                        <label class="h4">Top Description</label>
                        <textarea type="text" name="description" id="edit_a_description1"  rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">HeadLine</label>
                        <textarea type="text" name="headline" id="edit_a_headline" rows="3" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>
                    <div class="form-group">
                        <label class="h4">Upload Other Images (Below Headline If Any)</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="image[]" multiple  class="file-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h4">Second Description</label>
                        <textarea type="text" name="description_2" id="edit_a_description2" rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">Last Description</label>
                        <textarea type="text" name="description_3" id="edit_a_description3" rows="5" class="form-control form-control-lg radius-30" required > </textarea>
                    </div>

                    <div class="form-group">
                        <label class="h4">Tags</label>
                    </div>

                    <div class="example example_markup" id="edit_tags">


                        <!--
<div class="bs-example">
<select multiple data-role="tagsinput">
<option value="Amsterdam">Amsterdam</option>
<option value="Washington">Washington</option>
<option value="Sydney">Sydney</option>
<option value="Beijing">Beijing</option>
<option value="Cairo">Cairo</option>
</select>
</div>
-->
                    </div>

                    <input type="text" id="edit_id" name="edit_id"  hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_article">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <button type="submit" name="delete_article" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div id="edit_status_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h4 class="modal-title my-1" >Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form action="action.php" method="post" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="edit_article_access">Update Access</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="share_contest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-30">
            <div class="modal-header bg-info border-bottom-0">
                <h3 class="text-center my-1">Add Users</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="action.php" method="post" enctype="multipart/form-data">


                    <div class="form-group ">
                        <div class="form-group">
                            <label>Select Users</label>
                            <select id="edit_users" class="select2 form-control form-control-lg" name="user_id[]" multiple >

                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="article_id" id="article_id" value="" >
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="share_article">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //This Enables the Confirm Keys of Input which is Enter, space, Comma.
    //By pressing these keys tags were written!!
    $('.input').tagsinput({
        confirmKeys: [13, 32, 44]
    });
</script>

<script>
    //this fuction changes the enterkey function (i.e submit the form) after this fuction enter key don't submits the form!
    $('.bootstrap-tagsinput input').keydown(function (event) {
        debugger;
        if ( event.which == 13) {
            $(this).blur();
            $(this).focus();
            return false;
        }
    });
</script>

<script>
    //this function validates that tags input should not be empty!
    function validateForm()
    {

        var a = document.getElementById("form-tags").value;
        if (a == "" )
        {
            alert("Please Fill The Tags Field");
            return false;
        }

    }
    function validateForm()
    {

        var a = document.getElementById("edit_form-tags").value;
        if (a == "" )
        {
            alert("Please Fill The Tags Field");
            return false;
        }

    }
</script>


<?php
include("footer.php");
?>

<script>
    function view(id)
    {
        document.getElementById("view_id").value=id;
        document.getElementById("myForm").submit();

        //        alert();
        if(status==1){
            document.getElementById("view_status").innerHTML="Inactive";
            //             alert();
        }
        else{
            document.getElementById("view_status").innerHTML="Active";
        }

        $("#view_modal").modal('show');
    }

    function edit(id,c_id,sc_id,mc_id,name,date,description1,headline,description2,description3)
    {

        document.getElementById("edit_id").value=id;
        document.getElementById("edit_a_name").value=name;
        document.getElementById("edit_a_date").value=date;
        document.getElementById("edit_a_description1").value=description1;
        document.getElementById("edit_a_headline").value=headline;
        document.getElementById("edit_a_description2").value=description2;
        document.getElementById("edit_a_description3").value=description3;


        var id = id;
        //        alert(id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "ajax/get_tags.php",
            type: "POST",
            data: "id="+id,
            success: function (response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_tags").html(response);

            },
        });

        var c_id = c_id;
        //        alert(c_id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "ajax/edit/get_categories.php",
            type: "POST",
            data: "c_id="+c_id,
            success: function (response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_c_id").html(response);
            },
        });

        var sc_id = sc_id;
        //        alert(sc_id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "ajax/edit/get_sub_categories.php",
            type: "POST",
            data: {
                c_id: c_id, sc_id: sc_id
            },
            success: function (response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_sc_id").html(response);
            },
        });

        var mc_id = mc_id;
        //        alert(mc_id);

        //starting ajax
        //it calls sub categories against fetched id of Categories!
        $.ajax({
            url: "ajax/edit/get_mini_categories.php",
            type: "POST",
            data: {
                mc_id: mc_id, sc_id: sc_id
            },
            success: function (response) {
                //                    console.log(response);
                //                alert(response);
                $("#edit_mc_id").html(response);
            },
        });


        $("#edit_modal").modal('show');
    }

    function delete_article(id)
    {

        document.getElementById("delete_id").value=id;


        $("#delete_modal").modal('show');
    }


</script>

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

<script>

    function get_user(id)
    {
        document.getElementById("article_id").value=id;
        var article_id=id;

        $.ajax({
            url: "ajax/get_users_data.php",
            type: "POST",
            data: {'article_id':article_id},
            success: function(response){
                //                alert(response);
                $("#edit_users").html(response);
            },
        });

        $("#share_contest").modal('show');

    }
</script>

<script>

    //this function runs HTML Document runs!
    $(document).ready(function(){

        //This function runs when this id value will be change
        $("#c_id").on("change", function(){
            //fetch value
            var c_id = $(this).find("option:selected").val();
            //            alert(c_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "ajax/get_sub_categories.php",
                type: "POST",
                data: "c_id="+c_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#sub_category").html(response);
                },
            });

            //starting ajax
            //it calls mini categories against fetched id of Sub Categories!
            //This function perform nothing but this produces output Select Option!
            //Pathetic Way
            var sc_id = 0;
            //            alert(sc_id);
            $.ajax({
                url: "ajax/get_mini_categories.php",
                type: "POST",
                data: "sc_id="+sc_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#mini_category").html(response);
                },
            });

        });

        //This function runs when this id value will be change
        $("#sub_category").on("change", function(){
            var sc_id = $(this).find("option:selected").val();
            //            alert(sc_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "ajax/get_mini_categories.php",
                type: "POST",
                data: "sc_id="+sc_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#mini_category").html(response);
                },
            });

        });

    });

    function edit_c(){
        //This function runs when this id value will be change
        $("#edit_c_id").on("change", function(){
            //fetch value
            var c_id = $(this).find("option:selected").val();
            //            alert(c_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "ajax/get_sub_categories.php",
                type: "POST",
                data: "c_id="+c_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#edit_sc_id").html(response);
                },
            });

            //starting ajax
            //it calls mini categories against fetched id of Sub Categories!
            //This function perform nothing but this produces output Select Option!
            //Pathetic Way
            var sc_id = 0;
            //            alert(sc_id);
            $.ajax({
                url: "ajax/get_mini_categories.php",
                type: "POST",
                data: "sc_id="+sc_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#edit_mc_id").html(response);
                },
            });

        });
    }

    function edit_sc(){

        //This function runs when this id value will be change
        $("#edit_sc_id").on("change", function(){
            var sc_id = $(this).find("option:selected").val();
            //            alert(sc_id);

            //starting ajax
            //it calls sub categories against fetched id of Categories!
            $.ajax({
                url: "ajax/get_mini_categories.php",
                type: "POST",
                data: "sc_id="+sc_id,
                success: function (response) {
                    //                    console.log(response);
                    //                    alert(response);
                    $("#edit_mc_id").html(response);
                },
            });

        });


    }


</script>
