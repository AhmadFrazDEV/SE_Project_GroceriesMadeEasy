<?php
include("header.php");

$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}
?>

<script type="text/javascript">

    var status = "<?php echo $status; ?>";
    if(status==1)
    {
        swal({
            title: "Congratulations!",
            text: "You Successfully Login ",
            //   text: "Please Complete 2nd Step !",

            timer: 3000,
            showConfirmButton: true
        showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://www.oppdripp.com/admin/dashboard.php';
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

<section >

    <div class="row match-height">

        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img
                         src="app-assets/images/elements/decore-left.png"
                         class="congratulations-img-left"
                         alt="card-img-left"
                         />
                    <img
                         src="app-assets/images/elements/decore-right.png"
                         class="congratulations-img-right"
                         alt="card-img-right"
                         />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i class=" mdi mdi-trophy-award font-large-1 "></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Welcome <span class="text-uppercase"><?php echo $user_data['user_name'];?></span></h1>
                        <p class="card-text m-auto w-75">
                            <!--              You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.-->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Greetings Card ends -->
    </div>

    <?php

    //getting all user except where role = admin
    //$query = "SELECT * from user_login where !(role='admin')";
    $query = "SELECT * from user_login where role!='admin'";
    $users = db::getRecords($query);
    //print_r($users);
    if($user_role=='1'){

        $query = "SELECT * from user_login ";
        $total_users = db::getRecords($query);

        $query = "SELECT * from user_login where status='0'";
        $active_users = db::getRecords($query);

        $query = "SELECT * from user_login where status='1'";
        $blocked_users = db::getRecords($query);



        if($total_users!=null)
        {
            $total_users_size=sizeof($total_users);
        }
        else{
            $total_users_size=0;
        }

        if($active_users!=null)
        {
            $active_users_size=sizeof($active_users);
        }
        else{
            $active_users_size=0;
        }

        if($blocked_users!=null)
        {
            $blocked_users_size=sizeof($blocked_users);
        }
        else{
            $blocked_users_size=0;
        }



    ?>
    <!-- Stats Horizontal Card -->
    <!--<div class="row mb-3">-->
    <!--    <div class="col-sm-12">-->
    <!--        <div class="card bg-info bg-darken-2 bg-gradient-info">-->
    <!--            <div class="card-body text-center">-->
    <!--                <h2 class="font-weight-bolder mb-0 text-primary text-center">Users</h2>-->

    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-4 col-sm-6 col-12">-->
    <!--        <div class="card bg-light-primary">-->
    <!--            <div class="card-header">-->
    <!--                <div>-->
    <!--                    <h2 class="font-weight-bolder mb-0"><?php echo $total_users_size; ?></h2>-->
    <!--                    <p class="card-text">Total Users</p>-->
    <!--                </div>-->
    <!--                <div class="avatar bg-light-primary p-50 m-0">-->
    <!--                    <div class="avatar-content">-->
    <!--                        <i class=" fas fa-users font-medium-5"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-4 col-sm-4 col-12">-->
    <!--        <div class="card bg-light-success">-->
    <!--            <div class="card-header">-->
    <!--                <div>-->
    <!--                    <h2 class="font-weight-bolder mb-0"><?php echo $active_users_size; ?></h2>-->
    <!--                    <p class="card-text">Active Users</p>-->
    <!--                </div>-->
    <!--                <div class="avatar bg-light-success p-50 m-0">-->
    <!--                    <div class="avatar-content">-->
    <!--                        <i class="fas fa-user-shield font-medium-5"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-lg-4 col-sm-4 col-12">-->
    <!--        <div class="card bg-light-danger">-->
    <!--            <div class="card-header">-->
    <!--                <div>-->
    <!--                    <h2 class="font-weight-bolder mb-0"><?php echo $blocked_users_size; ?></h2>-->
    <!--                    <p class="card-text">Blocked Users</p>-->
    <!--                </div>-->
    <!--                <div class="avatar bg-light-danger p-50 m-0">-->
    <!--                    <div class="avatar-content">-->
    <!--                        <i class="fas fa-user-slash font-medium-5"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--</div>-->
    <!--/ Stats Horizontal Card -->


    <?php
    }

    $query = "SELECT * from users ";
    $total_customers = db::getRecords($query);

    $query = "SELECT * from users where status='0'";
    $active_customers = db::getRecords($query);

    $query = "SELECT * from users where status='1'";
    $blocked_customers = db::getRecords($query);



    $query = "SELECT * from banner";
    $banners = db::getRecords($query);



    $query = "SELECT * from category ";
    $categories = db::getRecords($query);



    $query = "SELECT * from sub_category ";
    $sub_categories = db::getRecords($query);



    $query = "SELECT * from product ";
    $products = db::getRecords($query);

    $query = "SELECT * from product where featured='1'";
    $featured_products = db::getRecords($query);

    $query = "SELECT * from product where sale='1'";
    $sale_products = db::getRecords($query);

    $query = "SELECT * from product where stock='1'";
    $outofstock_products = db::getRecords($query);

    $query = "SELECT * from product where stock='0'";
    $stock_products = db::getRecords($query);

    $query = "SELECT * from product where exclusive='1'";
    $exclusive_products = db::getRecords($query);

    $query = "SELECT * from product where limited='1'";
    $limited_products = db::getRecords($query);

    $query = "SELECT * from product where hot='1'";
    $hot_products = db::getRecords($query);



    $query = "SELECT * from video ";
    $videos = db::getRecords($query);



    $query = "SELECT * from coupon ";
    $coupons = db::getRecords($query);

    $query = "SELECT * from coupon where status='1'";
    $inactive_coupons = db::getRecords($query);

    $query = "SELECT * from coupon where status='0'";
    $active_coupons = db::getRecords($query);



    $query = "SELECT * from orders";
    $orders = db::getRecords($query);

    $query = "SELECT * from orders where payment_status='unpaid'";
    $pending_orders = db::getRecords($query);

    $query = "SELECT * from orders where payment_status='paid'";
    $paid_orders = db::getRecords($query);

    $query = "SELECT * from orders where payment_status='complete'";
    $completed_orders = db::getRecords($query);



    $query = "SELECT * from donation";
    $donations = db::getRecords($query);

    $query = "SELECT * from donation where payment_status='unpaid'";
    $pending_donations = db::getRecords($query);

    $query = "SELECT * from donation where payment_status='paid'";
    $paid_donations = db::getRecords($query);



    if($total_customers!=null)
    {
        $total_customers_size=sizeof($total_customers);
    }
    else{
        $total_customers_size=0;
    }

    if($active_customers!=null)
    {
        $active_customers_size=sizeof($active_customers);
    }
    else{
        $active_customers_size=0;
    }

    if($blocked_customers!=null)
    {
        $blocked_customers_size=sizeof($blocked_customers);
    }
    else{
        $blocked_customers_size=0;
    }



    if($banners!=null)
    {
        $banners_size=sizeof($banners);
    }
    else{
        $banners_size=0;
    }




    if($categories!=null)
    {
        $categories_size=sizeof($categories);
    }
    else{
        $categories_size=0;
    }




    if($sub_categories!=null)
    {
        $sub_categories_size=sizeof($sub_categories);
    }
    else{
        $sub_categories_size=0;
    }




    if($products!=null)
    {
        $products_size=sizeof($products);
    }
    else{
        $products_size=0;
    }

    if($featured_products!=null)
    {
        $featured_products_size=sizeof($featured_products);
    }
    else{
        $featured_products_size=0;
    }
    if($sale_products!=null)
    {
        $sale_products_size=sizeof($sale_products);
    }
    else{
        $sale_products_size=0;
    }
    if($stock_products!=null)
    {
        $stock_products_size=sizeof($stock_products);
    }
    else{
        $stock_products_size=0;
    }
    if($outofstock_products!=null)
    {
        $outofstock_products_size=sizeof($outofstock_products);
    }
    else{
        $outofstock_products_size=0;
    }
    if($exclusive_products!=null)
    {
        $exclusive_products_size=sizeof($exclusive_products);
    }
    else{
        $exclusive_products_size=0;
    }
    if($limited_products!=null)
    {
        $limited_products_size=sizeof($limited_products);
    }
    else{
        $limited_products_size=0;
    }
    if($hot_products!=null)
    {
        $hot_products_size=sizeof($hot_products);
    }
    else{
        $hot_products_size=0;
    }






    if($videos!=null)
    {
        $videos_size=sizeof($videos);
    }
    else{
        $videos_size=0;
    }





    if($coupons!=null)
    {
        $coupons_size=sizeof($coupons);
    }
    else{
        $coupons_size=0;
    }


    if($inactive_coupons!=null)
    {
        $inactive_coupons_size=sizeof($inactive_coupons);
    }
    else{
        $inactive_coupons_size=0;
    }


    if($active_coupons!=null)
    {
        $active_coupons_size=sizeof($active_coupons);
    }
    else{
        $active_coupons_size=0;
    }





    if($orders!=null)
    {
        $orders_size=sizeof($orders);
    }
    else{
        $orders_size=0;
    }


    if($pending_orders!=null)
    {
        $pending_orders_size=sizeof($pending_orders);
    }
    else{
        $pending_orders_size=0;
    }

    if($paid_orders!=null)
    {
        $paid_orders_size=sizeof($paid_orders);
    }
    else{
        $paid_orders_size=0;
    }

    if($completed_orders!=null)
    {
        $completed_orders_size=sizeof($completed_orders);
    }
    else{
        $completed_orders_size=0;
    }



    if($donations!=null)
    {
        $donations_size=sizeof($donations);
    }
    else{
        $donations_size=0;
    }


    if($pending_donations!=null)
    {
        $pending_donations_size=sizeof($pending_donations);
    }
    else{
        $pending_donations_size=0;
    }

    if($paid_donations!=null)
    {
        $paid_donations_size=sizeof($paid_donations);
    }
    else{
        $paid_donations_size=0;
    }





    ?>


    <!-- Stats Horizontal Card -->
    <div class="row my-3 ">
        <div class="col-sm-12 ">
            <div class="card bg-dark ">
                <div class="card-body text-center bg-light-info bg-darken-2 bg-gradient-info">
                    <h2 class="font-weight-bolder mb-0 text-center text-white">Customers</h2>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card bg-light-primary">
                <div class="card-header">
                    <div>
                        <h2 class="font-weight-bolder mb-0"><?php echo $total_customers_size; ?></h2>
                        <p class="card-text">Total Customers</p>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas fa-users font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card bg-light-success">
                <div class="card-header">
                    <div>
                        <h2 class="font-weight-bolder mb-0"><?php echo $active_customers_size; ?></h2>
                        <p class="card-text">Active Customers</p>
                    </div>
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-user-shield font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card bg-light-danger">
                <div class="card-header">
                    <div>
                        <h2 class="font-weight-bolder mb-0"><?php echo $blocked_customers_size; ?></h2>
                        <p class="card-text">Blocked Customers</p>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-user-slash font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--/ Stats Horizontal Card -->





    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-info bg-darken-2 bg-gradient-info">
                <div class="card-body text-center">
                    <h2 class="font-weight-bolder mb-0 text-center text-primary">Banners</h2>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card">

                <div class="card-body">
                    <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators" >
                            <?php

                            if($banners!=null){

                                $count=0;


                                foreach($banners as $banner)
                                {
                                    if($count==0)
                                    {
                            ?>
                            <li data-target="#carousel-example-caption" data-slide-to="<?php echo $count;?>" class="active"></li>
                            <?php

                                    }
                                    else{

                            ?>

                            <li data-target="#carousel-example-caption" data-slide-to="<?php echo $count;?>"></li>
                            <?php
                                    }
                                    $count++;
                                }

                            }
                            ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <?php

                            if($banners!=null){

                                $count=0;


                                foreach($banners as $banner)
                                {

                                    if($count == 0){
                            ?>
                            <div class="carousel-item active">
                                <img class="img-fluid w-100" src="<?php echo "files/banners/".$banner['image_name']; ?>" alt="slide" style="height:70vh;"  />
                                <div class="carousel-caption" style="background-color:#04040457;border-radius:50px;">
                                    <h3 class="text-white"><?php echo $banner['title'];?></h3>
                                    <p class="text-white">
                                        <?php echo $banner['description'];?>
                                    </p>
                                </div>
                            </div>
                            <?php

                                    }
                                    else{

                            ?>

                            <div class="carousel-item">
                                <img class="img-fluid w-100" src="<?php echo "files/banners/".$banner['image_name']; ?>" alt="slide" style="height:70vh;" />
                                <div class="carousel-caption" style="background-color:#04040457;border-radius:50px;">
                                    <h3 class="text-white"><?php echo $banner['title'];?></h3>
                                    <p class="text-white">
                                        <?php echo $banner['description'];?>
                                    </p>
                                </div>
                            </div>
                            <?php
                                    }

                                    $count++;
                                }

                            }
                            ?>




                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-3 py-4">
        <!--
<div class="col-sm-12">
<div class="card bg-info bg-darken-2 bg-gradient-info">
<div class="card-body text-center">
<h2 class="font-weight-bolder mb-0 text-center text-primary">Customers</h2>

</div>
</div>
</div>
-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-primary">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-images font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-primary mt-2"><?php echo $banners_size;?></h2>
                    <h4 class="card-text text-primary">Banners</h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-success">
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-windows font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-success mt-2"> <?php echo $categories_size;?></h2>
                    <h4 class="card-text text-success ">Merchants</h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-warning">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-window font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-warning mt-2"><?php echo $sub_categories_size;?></h2>
                    <h4 class="card-text text-warning">Categories</h4>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-secondary ">
                    <div class="avatar bg-light-secondary p-50 m-0">
                        <div class="avatar-content">
                            <i class="lni lni-video font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-dark mt-2"><?php echo $videos_size;?></h2>
                    <h4 class="card-text text-dark ">Videos</h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-primary bg-darken-2">
                    <div class="avatar bg-info p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas bx bx-grid-alt  font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder  text-info mt-2"><?php echo $products_size;?></h2>
                    <h4 class="card-text  text-info ">Products</h4>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-danger bg-darken-1">
                    <div class="avatar bg-danger bg-darken-4 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-collection font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $featured_products_size;?></h2>
                    <h4 class="card-text text-white ">Featured Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-warning bg-darken-2">
                    <div class="avatar bg-warning bg-darken-4 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas fa-dolly font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $sale_products_size;?></h2>
                    <h4 class="card-text text-white ">On sale Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-danger bg-lighten-1">
                    <div class="avatar bg-danger bg-darken-2 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-coin-stack font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $stock_products_size;?></h2>
                    <h4 class="card-text text-white ">Stocked Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-warning bg-lighten-1">
                    <div class="avatar bg-warning bg-darken-2 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" bx bx-coin font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $outofstock_products_size;?></h2>
                    <h4 class="card-text text-white ">Out Of Stocked Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-success bg-darken-4">
                    <div class="avatar bg-dark p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas fa-star font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $exclusive_products_size;?></h2>
                    <h4 class="card-text text-white ">Exclusive Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-info bg-darken-4">
                    <div class="avatar bg-info bg-darken-1 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas fa-gem font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $limited_products_size;?></h2>
                    <h4 class="card-text text-white ">Limited Products</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-info bg-darken-1">
                    <div class="avatar bg-info bg-darken-4 p-50 m-0">
                        <div class="avatar-content">
                            <i class=" fas fa-fire font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $hot_products_size;?></h2>
                    <h4 class="card-text text-white ">Hot Products</h4>
                </div>
            </div>
        </div>




        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center bg-light-info bg-darken-1">
                <div class="card-body bg-light-info">
                    <div class="avatar bg-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="ion ion-md-cube font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-primary mt-2"><?php echo $orders_size;?></h2>
                    <h4 class="card-text text-primary ">Total Orders</h4>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-warning bg-lighten-4">
                    <div class="avatar bg-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="mdi mdi-cart-off font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $pending_orders_size;?></h2>
                    <h4 class="card-text text-white ">Pending Orders</h4>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center bg-success bg-darken-1">
                <div class="card-body ">
                    <div class="avatar bg-success bg-darken-4 p-50 m-0">
                        <div class="avatar-content">
                            <i class="ion ion-md-cart  font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $paid_orders_size;?></h2>
                    <h4 class="card-text text-white ">Active Orders</h4>

                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-primary bg-darken-2">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-cart-arrow-down  font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-primary mt-2"><?php echo $completed_orders_size;?></h2>
                    <h4 class="card-text text-primary ">Completed orders</h4>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="bg-dark">
            <div class="card text-center bg-light-primary">
                <div class="card-body bg-light-primary">
                    <div class="avatar  p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-donate text-dark font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $donations_size;?></h2>
                    <h4 class="card-text text-white ">Total Donations</h4>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="bg-warning">
            <div class="card text-center bg-light-danger">
                <div class="card-body bg-light-danger">
                    <div class="avatar bg-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-hand-holding text-white font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $pending_donations_size;?></h2>
                    <h4 class="card-text text-white ">Pending Donations</h4>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="bg-danger">
            <div class="card text-center bg-light-warning bg-darken-5">
                <div class="card-body bg-light-warning">
                    <div class="avatar bg-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-hand-holding-heart text-white font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-white mt-2"><?php echo $paid_donations_size;?></h2>
                    <h4 class="card-text text-white ">Paid Donations</h4>
                </div>
            </div>
            </div>
        </div>




        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-warning">
                    <div class="avatar bg-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="bx bx-credit-card  font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-warning mt-2"><?php echo $coupons_size;?></h2>
                    <h4 class="card-text text-warning ">Total Coupons</h4>
                </div>
            </div>
        </div>


               <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body bg-light-danger">
                    <div class="avatar bg-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fas fa-gift text-white font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-danger mt-2"><?php echo $active_coupons_size;?></h2>
                    <h4 class="card-text text-danger ">Active Coupons</h4>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="bg-light">
            <div class="card text-center bg-light-primary">
                <div class="card-body bg-light-primary">
                    <div class="avatar bg-light-primary  p-50 m-0">
                        <div class="avatar-content">
                            <i class="ion ion-md-gift text-dark font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder text-dark mt-2"><?php echo $inactive_coupons_size;?></h2>
                    <h4 class="card-text text-dark ">Inactive Coupons</h4>
                </div>
            </div>
            </div>
        </div>



    </div>



</section>
<!-- Dashboard Analytics end -->

<!--
<button type="button" class="btn btn-outline-primary waves-effect" data-toggle="popover" data-content="Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes chocolate cake gummies." data-trigger="hover" data-original-title="Hover Triggered">
              On Hover Trigger
            </button>
-->


<?php

include("footer.php");

?>

