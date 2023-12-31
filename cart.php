<?php
include ("header.php");
?>


<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Shopping Cart</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Shopping Cart</li>
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
                                <th class="pro-title">Size</th>
                                <th class="pro-title">Color</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <!-- Table Head End -->

                        <!-- Table Body Start -->
                        <tbody>
                            <?php

                            $total_bill="0";

                            $user_id=NULL;

                            if(isset($_SESSION['customer_email']))
                            {
                                $user_email=$_SESSION['customer_email'];

                                $query="SELECT * from users where email='$user_email'";
                                $user=db::getRecord($query);

                                $user_id=$user_email;

                            }else{

                                $user_id=session_id();
                            }

                            $query="SELECT * FROM temp_cart where user_id='$user_id'";
                            $cart_items=db::getRecords($query);
                            //                                 print_r ($cart_items);


                            if($cart_items != NULL){
                                foreach($cart_items as $cart_item)
                                {
                                    $product_bill="0";
                                    $id = $cart_item['id'];
                                    $product_id = $cart_item['product_id'];
                                    $product_data_id = $cart_item['product_data_id'];

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

                                    $cart_product_quantity = $cart_item['quantity'];
                                    $total_bill= $total_bill + ($product_price * $cart_product_quantity ) ;


                                    //                                    echo $product_price;
                                    //                                    echo $cart_product_quantity;
                                    //                                    echo $total_bill;
                                    //
                                    //                                    exit();

                            ?>


                            <tr>
                                <td class="pro-thumbnail"><a href="productdetail.php?id=<?php echo $product['id'];?>"><img class="img-fluid" src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>" alt="Product" style="height:100px;" /></a></td>
                                <td class="pro-title" ><a  href="productdetail.php?id=<?php echo $product['id'];?>"> <?php echo $product['name']; ?> <br>
                                    <!--<?php
                                    if($product_data['size']==1){
                                        echo "Small";
                                    }elseif($product_data['size']==2){
                                        echo "Medium";
                                    }elseif($product_data['size']==3){
                                        echo "Large";
                                    }elseif($product_data['size']==4){
                                        echo "Extra Large";
                                    }

                                    ?> / <?php echo $product_data['color']; ?>-->
                                    </a></td>
                                <td class="pro-title" ><?php
                                    if($product_data['size']==1){
                                        echo "Small";
                                    }elseif($product_data['size']==2){
                                        echo "Medium";
                                    }elseif($product_data['size']==3){
                                        echo "Large";
                                    }elseif($product_data['size']==4){
                                        echo "Extra Large";
                                    }else{
                                        echo  $product_data['size'];
                                    }

                                    ?> </td>
                                <td class="pro-title "  > <span style="background-color:<?php echo $product_data['color']; ?>;border:1px solid #000;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </td>
                                <td class="pro-price">

                                        <?php
                                    if($product['discount']!=NULL){
                                        ?>
                                        PKR<span class="regular-price"><del><?php echo $product_data['price'];?></del> </span>
                                    <span class="old-price  new" style="color: #C89B3B;">&nbsp;<?php echo $product_price;?></span>
                                    <?php
                                    }else{



                                    ?>
                                    <span class="regular-price">PKR <?php echo $product_data['price'];?></span>


                                    <?php
                                    }

                                        ?>
                                        </td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <?php echo $cart_item['quantity']; ?>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>PKR <?php


                                    $cart_product_quantity = $cart_item['quantity'];
                                    $product_bill= $product_bill + ($product_price * $cart_product_quantity ) ;


                                    echo $product_bill; ?></span></td>
                                <td class="pro-remove"><a onclick="get_data()"  href="admin/action.php?product_id=<?php echo $product['id'];?>&product_data_id=<?php echo $product_data['id']; ?>&user_id=<?php echo $user_id; ?>"><i class="pe-7s-trash"></i></a></td>
                            </tr>

                            <!--
<tr>
<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/products/2.jpg" alt="Product" /></a></td>
<td class="pro-title"><a href="#">Basic Jogging Shorts <br> Blue</a></td>
<td class="pro-price"><span>$75.00</span></td>
<td class="pro-quantity">
<div class="quantity">
<div class="cart-plus-minus">
<input class="cart-plus-minus-box" value="0" type="text">
<div class="dec qtybutton">-</div>
<div class="inc qtybutton">+</div>
<div class="dec qtybutton"><i class="fa fa-minus"></i></div>
<div class="inc qtybutton"><i class="fa fa-plus"></i></div>
</div>
</div>
</td>
<td class="pro-subtotal"><span>$75.00</span></td>
<td class="pro-remove"><a href="#"><i class="pe-7s-trash"></i></a></td>
</tr>
<tr>
<td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/products/10.jpg" alt="Product" /></a></td>
<td class="pro-title"><a href="#">Lust For Life <br> Bulk/S</a></td>
<td class="pro-price"><span>$295.00</span></td>
<td class="pro-quantity">
<div class="quantity">
<div class="cart-plus-minus">
<input class="cart-plus-minus-box" value="0" type="text">
<div class="dec qtybutton">-</div>
<div class="inc qtybutton">+</div>
<div class="dec qtybutton"><i class="fa fa-minus"></i></div>
<div class="inc qtybutton"><i class="fa fa-plus"></i></div>
</div>
</div>
</td>
<td class="pro-subtotal"><span>$295.00</span></td>
<td class="pro-remove"><a href="#"><i class="pe-7s-trash"></i></a></td>
</tr>
-->

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

        <div class="row">
            <div class="col-lg-5 ms-auto col-custom">

                <!-- Cart Calculation Area Start -->
                <div class="cart-calculator-wrapper">

                    <!-- Cart Calculate Items Start -->
                    <div class="cart-calculate-items">

                        <!-- Cart Calculate Items Title Start -->
                        <h3 class="title">Cart Totals</h3>
                        <!-- Cart Calculate Items Title End -->

                        <!-- Responsive Table Start -->
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>PKR <?php echo $total_bill; ?></td>
                                </tr>
<!--
                                <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr>
-->
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">PKR <?php echo $total_bill; ?></td>
                                </tr>
                            </table>
                        </div>
                        <!-- Responsive Table End -->

                    </div>
                    <!-- Cart Calculate Items End -->

                    <!-- Cart Checktout Button Start -->
                    <?php
                        if($cart_items != NULL){
                        ?>
                        <a href="checkout.php" class="btn btn-dark btn-hover-primary rounded-0 w-100">PROCEED TO CHECKOUT</a>
                        <?php
                        }
                        else{
                        ?>
                        <a  class="btn btn-dark btn-hover-primary rounded-0 w-100">PROCEED TO CHECKOUT</a>
                        <?php
                        }


                        ?>
                    <!-- Cart Checktout Button End -->



                </div>
                <!-- Cart Calculation Area End -->

            </div>
        </div>

    </div>
</div>
<!-- Shopping Cart Section End -->

<?php
include ("footer.php");
?>
