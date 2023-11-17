<?php

include("header.php");

$query = "SELECT * from orders where payment_status='unpaid'";
$orders = db::getRecords($query);
// print_r($orders);



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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Active Orders</a></li>


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
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Active Orders</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table table-responsive  table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Total Products</th>
                                        <th>Total Bill</th>
                                        <th>Coupon Used</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($orders!=NULL)
                                    {
                                        foreach($orders as $order)

                                        {

                                    ?>
                                    <tr >
                                        <td > <?php echo $order['id']; ?></td>
                                        <td > <?php echo $order['order_id']; ?></td>
                                        <td > <?php echo $order['f_name']; ?>&nbsp;<?php echo $order['l_name']; ?></td>
                                        <td > <?php echo $order['phone']; ?></td>
                                        <td > <?php echo $order['email']; ?></td>
                                        <td > <?php echo $order['address']; ?></td>
                                        <td > <?php echo $order['city']; ?></td>
                                        <td class="text-center" > <?php echo $order['total_products']; ?></td>
                                        <td > PKR <?php echo $order['total_bill']; ?></td>
                                        <td ><?php echo $order['coupon_used']; ?></td>
                                        <?php

                                            $method = $order['payment_method'];
                                            if($method==1){
                                        ?>
                                        <td > <?php echo "Paypal" ?></td>
                                        <?php

                                            }
                                            else if($method==2){
                                        ?>
                                        <td > <?php echo "Stripe" ?></td>
                                        <?php
                                            
                                            }
                                            else if($method==3){
                                        ?>
                                         <td > <?php echo "Cash on Delivery" ?></td>
                                        <?php
                                            }
                                        ?>


                                        <td class="text-capitalize" > <?php echo $order['payment_status']; ?></td>

                                        <td>
                                            <div class="col-lg-6 col-12">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <span data-toggle="modal" data-target="#view-details<?php echo $order['order_id']; ?>">
                                                    <button data-toggle="popover"  data-trigger="hover" data-original-title="View Order Detail" type="button" class="btn btn-success bg-success bg-darken-2"  ><i class="fa fa-eye" ></i></button>
                                                    </span>
                                                    <span onclick="edit('<?php echo $order['order_id']; ?>')">
                                                    <a  data-toggle="popover"  data-trigger="hover" data-original-title="Complete Order" class="btn btn-linkedin"><i class=" mdi mdi-marker-check"></i></a>
                                                    </span>
                                                    <span onclick="delete_banner('<?php echo $order['order_id']; ?>')">
                                                    <a data-toggle="popover"  data-trigger="hover" data-original-title="Delete Order" class="btn btn-pinterest"><i class="bx bx-trash"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-size-xl d-inline-block">

                                                <div
                                                     class="modal fade text-left"
                                                     id="view-details<?php echo $order['order_id']; ?>"
                                                     tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="myModalLabel16"
                                                     aria-hidden="true"
                                                     >
                                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title m-1" id="myModalLabel16">Order # &nbsp;<?php echo $order['order_id']; ?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h4 class="card-title"></h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <form class="form">
                                                                                    <div class="row">

                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">First Name</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['f_name']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Last Name</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['l_name']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Phone</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['phone']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Email</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['email']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Address</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['address']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">City</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['city']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">State</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['state']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-2 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Zip Code</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['zip_code']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Country</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['country']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Total Bill</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="$<?php echo $order['total_bill']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Payment_status</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo $order['payment_status']; ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-12">
                                                                                            <?php

                                            $method = $order['payment_method'];
                                            if($method==1){
                                                                                            ?>
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Payment_method</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo "Paypal" ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                            <?php

                                            }
                                            else{
                                                                                            ?>
                                                                                            <div class="form-group">
                                                                                                <label for="last-name-column">Payment_method</label>
                                                                                                <input
                                                                                                       type="text"
                                                                                                       id="last-name-column"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo "Stripe" ?>"
                                                                                                       name="lname-column"
                                                                                                       disabled style="background-color:#fff color:#222;"
                                                                                                       />
                                                                                            </div>
                                                                                            <?php
                                            }
                                                                                            ?>




                                                                                        </div>

                                                                                        <div class="col-md-3 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="city-column">Total products</label>
                                                                                                <input type="text" rows="3"  class="form-control" disabled value="<?php echo $order['total_products']; ?>"  />

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="city-column">Order Note</label>
                                                                                                <input type="text" rows="3"  class="form-control" value="<?php echo $order['note']; ?>" disabled />

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">



                                                                                            <div class="card-datatable">
                                                                                                <table id="example" class="table  table-bordered" style="width:100%">
                                                                                                    <thead>
                                                                                                        <tr>

                                                                                                            <th>Merchant Name</th>
                                                                                                            <th>Product Name</th>
                                                                                                            <th>Quantity</th>
                                                                                                            <th>Price</th>


                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php

                                            $order_id = $order['order_id'];


                                            $query = "SELECT * from order_detail where order_id = '$order_id' ";
                                            $order_details = db::getRecords($query);



                                            if ($order_details != NULL) {

                                                foreach ($order_details as $order_detail) {

                                                    $product_data_id = $order_detail['product_data_id'];
                                                    $product_id = $order_detail['product_id'];

                                                    $query="SELECT * FROM product where id='$product_id'";
                                                    $product=db::getRecord($query);

                                                    $query="SELECT * FROM product_data where id='$product_data_id'";
                                                    $product_data=db::getRecord($query);

                                                    $c_id = $product['c_id'];

                                                    $query="SELECT * FROM category where id='$c_id'";
                                                    $category=db::getRecord($query);

                                                    $c_name = $category['c_name'];



                                                    //                                    print_r ($query);
                                                    //                                        exit();



                                                    if($product['discount']!=NULL){

                                                        $discount = (float)$product_data['price']*((float)($product['discount']/100));
                                                        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

                                                        $product_price = (float)$product_data['price']-((float)$discount);
                                                    }
                                                    else{
                                                        $product_price = $product_data['price'];
                                                    }

                                                                                                        ?>
                                                                                                        <tr >
                                                                                                            <td > <?php echo $c_name; ?></td>
                                                                                                            <td > <?php echo $order_detail['product_name'];?>
                                                                                                                <strong class="product-quantity"><?php
                                                    if($product_data['size']==1){
                                                        echo "Small";
                                                    }elseif($product_data['size']==2){
                                                        echo "Medium";
                                                    }elseif($product_data['size']==3){
                                                        echo "Large";
                                                    }elseif($product_data['size']==4){
                                                        echo "Extra Large";
                                                    }?> <span style="background-color:<?php echo $product_data['color']; ?>;border:1px solid #000;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </strong> </td>
                                                                                                            <td > <?php echo $order_detail['quantity']; ?></td>
                                                                                                            <td > <?php echo $order_detail['total']; ?></td>



                                                                                                        </tr>



                                                                                                        <?php
                                                }

                                            }
                                            else{
                                                echo"Data Not Found!!";
                                            }
                                                                                                        ?>
                                                                                                    </tbody>
                                                                                                    <tfoot>

                                                                                                    </tfoot>
                                                                                                </table>
                                                                                            </div>



                                                                                        </div>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>



                                    <?php
                                        }

                                    }
                                    else{
                                        echo"Not Found!!";
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
                <h4 class="modal-title my-1" >Complete Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <form action="../action.php" method="post" enctype="multipart/form-data">
                    <p class="text-primary" >Are You Sure to Complete This</p>
                    <input type="text" id="edit_id" name="edit_id" value="" hidden>
                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right  btn-lg " name="order_complete">Complete Order</button>
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
                <h5 class="modal-title" style="color:white;">Delete order</h5>

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
                        <button type="submit" name="order_delete" class="btn btn-outline-danger">Delete</button>
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


    function edit(id)
    {

        document.getElementById("edit_id").value=id;
        $("#edit_modal").modal('show');
    }
    function delete_banner(id)
    {

        document.getElementById("delete_id").value=id;
        $("#delete_modal").modal('show');
    }


</script>

