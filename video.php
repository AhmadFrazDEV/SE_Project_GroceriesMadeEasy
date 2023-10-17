<?php
include("header.php");
?>
<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <!--Container-->
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Videos</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Videos</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->


<!-- Blog Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row mb-n8">
            <?php
            $query = "SELECT * from video ";
            $videos = db::getRecords($query);

            if($videos!=null){

                foreach($videos as $video){


            ?>
            <div class="col-md-6 col-lg-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Blog Start -->
                <div class="blog-single-post-wrapper">
                    <div class="blog-thumb">
                        <?php
                    if($video['video_name']!=NULL)
                    {
                        ?>
                         <video class="w-100" height="240" controls>

                                <source  src="<?php echo "admin/files/videos/".$video['video_name']; ?>"  >

                            </video>

                        <?php
                    }
                    if($video['url']!=NULL){
                        ?>

                        <iframe class="w-100" height="240" controls
                                src="<?php echo $video['url']; ?>">
                        </iframe>


                        <?php
                    }
                        ?>

                        </div>
                    </div>

                    <div class="blog-content">
                        <h3 class="title text-center"><?php echo $video['title']; ?></h3>

                    </div>

                <!-- Single Blog End -->
            </div>

            <?php
                }
            }
            ?>

        </div>



    </div>
</div>
<!-- Blog Section End -->


<?php
include("footer.php");

?>
