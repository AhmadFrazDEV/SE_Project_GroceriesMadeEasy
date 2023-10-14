<?php
include ("header.php");

$id = $_GET['id'];

$query = "SELECT * from orders where id = $id ";
$order = db::getRecord($query);

$order_id = $order['order_id'];

$query = "SELECT * from order_detail where order_id = $order_id ";
$order_details = db::getRecords($query);

?>


<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Order Detail</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active">Order Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <!-- Cart Table Start -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">

                        <!-- Table Head Start -->
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>

                            </tr>
                        </thead>
                        <!-- Table Head End -->

                        <!-- Table Body Start -->
                        <tbody>
                            <?php

                            if($order_details != NULL){
                                $total_bill = 0;
                                $product_bill = 0;
                                foreach($order_details as $order_detail)
                                {
                                    $product_id = $order_detail['product_id'];
                                    $product_data_id = $order_detail['product_data_id'];

                                    $query="SELECT * from product where id='$product_id'";
                                    $product=db::getRecord($query);

                                    //                                        print_r ($product);
                                    //                                        exit();

                                    $query = "SELECT * from product_image where product_id = '$product_id' ";
                                    $product_image = db::getRecord($query);

                                    //                                        print_r ($product_image);
                                    //                                        exit();

                                    $query="SELECT * FROM product_data where id='$product_data_id'";
                                    $product_data=db::getRecord($query);

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

                                    $cart_product_quantity = $order_detail['quantity'];
                                    $total_bill= $total_bill + ($product_price * $cart_product_quantity ) ;


                                    //                                    echo $product_price;
                                    //                                    echo $cart_product_quantity;
                                    //                                    echo $total_bill;
                                    //
                                    //                                    exit();

                            ?>


                            <tr>
                                <td class="pro-thumbnail"><a href="productdetail.php?id=<?php echo $product['id'];?>"><img class="img-fluid" src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>" alt="Product" style="height:100px;" /></a></td>
                                <td class="pro-title"><a  href="productdetail.php?id=<?php echo $product['id'];?>"> <?php echo $product['name']; ?> <br> <?php
                                    if($product_data['size']==1){
                                        echo "Small";
                                    }elseif($product_data['size']==2){
                                        echo "Medium";
                                    }elseif($product_data['size']==3){
                                        echo "Large";
                                    }elseif($product_data['size']==4){
                                        echo "Extra Large";
                                    }

                                    ?> / <?php echo $product_data['color']; ?></a></td>
                                <td class="pro-price">

                                    <?php
                                    if($product['discount']!=NULL){
                                    ?>
                                    $<span class="regular-price"><del><?php echo $product_data['price'];?></del> </span>
                                    <span class="old-price  new" style="color: #C89B3B;">&nbsp;<?php echo $product_price;?></span>
                                    <?php
                                    }else{



                                    ?>
                                    <span class="regular-price">$ <?php echo $product_data['price'];?></span>


                                    <?php
                                    }

                                    ?>
                                </td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <?php echo $order_detail['quantity']; ?>
                                    </div>
                                </td>


                            </tr>


                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <!-- Table Body End -->

                    </table>
                </div>
                <!-- Cart Table End -->



            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->

<?php
include ("footer.php");
?>
