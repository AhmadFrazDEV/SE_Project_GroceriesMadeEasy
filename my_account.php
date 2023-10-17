<?php
include("header.php");

$query = "SELECT * from orders where email='$user_email'";
$orders = db::getRecords($query);
?>

<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">My Account</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> My Account</li>
                </ul>
            </div> 
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- My Account Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                <a href="#account-pass" data-bs-toggle="tab"><i class="fa fa-lock"></i> Change Password</a>
                                <a href="admin/action.php?user_logout=1"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Dashboard</h3>

                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Order ID</th>
                                                        <th>Total Products</th>
                                                        <th>Total Bill</th>
                                                        <th>Coupon Used</th>
                                                        <th>Payment Method</th>
                                                        <th>Payment Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if($orders!=NULL)
                                                    {
                                                        $count = 0;
                                                        foreach($orders as $order)

                                                        {
                                                            $count++;

                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $user_email; ?></td>
                                                        <td> <?php echo $order['order_id']; ?></td>
                                                        <td class="text-center"> <?php echo $order['total_products']; ?></td>
                                                        <td> $<?php echo $order['total_bill']; ?></td>
                                                        <td><?php echo $order['coupon_used']; ?></td>
                                                        <?php

                                                            $method = $order['payment_method'];
                                                            if($method==1){
                                                        ?>
                                                        <td> <?php echo "Paypal" ?></td>
                                                        <?php

                                                            }
                                                            else{
                                                        ?>
                                                        <td> <?php echo "Stripe" ?></td>
                                                        <?php
                                                            }
                                                        ?>


                                                        <td class="text-capitalize"> <?php echo $order['payment_status']; ?></td>
                                                        <td><a href="view_order_detail.php?id=<?php echo $order['id'];?>" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>

                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-pass" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Change Password</h3>
                                        <div class="account-details-form">
                                            <form action="admin/action.php" method="post">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label for="reset-password-new">Old Password</label>
                                                            </div>
                                                            <input type="password" class="form-control" name="old_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="old_password" autofocus required />


                                                        </div>


                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label for="reset-password-new">New Password</label>
                                                            </div>
                                                            <input type="password" class="form-control" name="new_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="new_password" required />

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label for="reset-password-confirm">Confirm Password</label>
                                                            </div>
                                                            <input type="password" class="form-control" name="confirm_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="confirm_password" required />

                                                        </div>

                                                        <!-- Input Email Or Username End -->
                                                        <input type="hidden" value="<?php echo $user['id']; ?>" name="edit_id">

                                                    </div>

                                                </div>
                                                <div class="single-input-item single-item-button">
                                                    <button class="btn btn btn-dark btn-hover-primary rounded-0 mt-5" type="submit" name="edit_customer_password">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->



                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="admin/action.php" method="post">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- Input First Name Start -->

                                                        <input class="w-100  mb-3" type="text" name="f_name" value="<?php echo $user['f_name']; ?>" placeholder="First Name" required>

                                                        <!-- Input First Name End -->

                                                        <!-- Input Last Name Start -->

                                                        <input class="w-100  mb-3" type="text" name="l_name" value="<?php echo $user['l_name']; ?>" placeholder="Last Name" required>

                                                        <!-- Input Last Name End -->

                                                        <!-- Input Email Or Username Start -->

                                                        <input class="w-100  mb-3" type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>

                                                        <!-- Input Email Or Username End -->

                                                        <!-- Input Email Or Username Start -->

                                                        <input class="w-100  mb-3" type="text" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone" required>

                                                        <!-- Input Email Or Username End -->
                                                        <input type="hidden" value="<?php echo $user['id']; ?>" name="edit_id">

                                                    </div>

                                                </div>
                                                <div class="single-input-item single-item-button">
                                                    <button class="btn btn btn-dark btn-hover-primary rounded-0" type="submit" name="save_customer_details">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->





                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div>
                <!-- My Account Page End -->

            </div>
        </div>

    </div>
</div>
<!-- My Account Section End -->


<?php
include("footer.php");

?>
