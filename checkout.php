<?php
$user_email= NULL;
include ("header.php");
if(isset($_SESSION['customer_email']))
{
    $user_email=$_SESSION['customer_email'];

    if($user_email){

    $query = "SELECT * from orders where email='$user_email'  ORDER BY id desc";
    $orders = db::getRecords($query);

}
}else{

    $user_email="";
}

?>


<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Checkout</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        <form action="" id="form" method="post">
            <div class="row mb-n4">

                <div class="col-lg-6 col-12 mb-4">

                    <!-- Checkbox Form Start -->

                    <div class="checkbox-form">

                        <!-- Checkbox Form Title Start -->
                        <h3 class="title">Billing Details</h3>
                        <!-- Checkbox Form Title End -->

                        <div class="row">

                            <!-- Select Country Name Start -->
                            <div class="col-md-12 mb-6">
                                <div class="country-select">
                                    <label>Payment Method <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide rounded-0" name="payment_method"  id="payment_method" required>
<!--
                                        <option value="1" selected>PayPal</option>
                                        <option value="2" >Stripe</option>
-->
                                        <option value="3" selected>Cash On Delivery</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Select Country Name End -->

                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['f_name'];
                                                                 }?>" name="f_name" type="text" required>
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Last Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['l_name'];
                                                                 }?>" name="l_name" type="text" required>
                                </div>
                            </div>
                            <!-- Last Name Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['email'];
                                                                 }?>" name="email" type="email" required>
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                            <!-- Company Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Country</label>
                                    <input placeholder="" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['country'];
                                                                 }?>" name="country" type="text" required>
                                </div>
                            </div>
                            <!-- Company Name Input End -->

                            <!-- Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['address'];
                                                                 }?>" name="address" type="text" required>
                                </div>
                            </div>
                            <!-- Address Input End -->



                            <!-- Town or City Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['city'];
                                                                 }?>" name="city" required>
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- State or Country Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input placeholder="" name="state" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['state'];
                                                                 }?>"  type="text" required>
                                </div>
                            </div>
                            <!-- State or Country Input End -->

                            <!-- Postcode or Zip Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['zip_code'];
                                                                 }?>" name="zip" type="text" required>
                                </div>
                            </div>
                            <!-- Postcode or Zip Input End -->



                            <!-- Phone Number Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" value="<?php
                                                                 if($user_email){
                                                                     echo $orders[0]['phone'];
                                                                 }?>" name="phone" required>
                                </div>
                            </div>
                            <!-- Phone Number Input End -->


                        </div>

                        <!-- Different Address Start -->
                        <div class="different-address">


                            <!-- Ship Box Info End -->

                            <!-- Order Notes Textarea Start -->
                            <div class="order-notes mt-3 mb-n2">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Order Notes</label>
                                    <textarea  cols="30" rows="10" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery." ></textarea>
                                </div>
                            </div>
                            <!-- Order Notes Textarea End -->


                            <!------------------------------------------------For paypal-------------------------------------------------->
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="no_note" value="1" />
                            <input type="hidden" name="lc" value="USD" />
                            <input type="hidden" name="currency_code" value="USD" />
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                            <input type="hidden" name="first_name" value="Customer's First Name" />
                            <input type="hidden" name="last_name" value="Customer's Last Name" />
                            <input type="hidden" name="payer_email" value="customer@example.com" />
                            <input type="hidden" name="item_number" value="123456" / >
                            <!------------------------------------------------For paypal-------------------------------------------------->


                        </div>
                        <!-- Different Address End -->
                    </div>

                    <!-- Checkbox Form End -->

                </div>

                <div class="col-lg-6 col-12 mb-4">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Your order</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <th class="cart-product-total text-end">Total</th>
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
                                    <tr class="cart_item">

                                        <td class="cart-product-name text-start ps-0"><a  href="productdetail.php?id=<?php echo $product['id'];?>"> <?php echo $product['name']; ?> <strong class="product-quantity"><?php
                                            if($product_data['size']==1){
                                                echo "Small";
                                            }elseif($product_data['size']==2){
                                                echo "Medium";
                                            }elseif($product_data['size']==3){
                                                echo "Large";
                                            }elseif($product_data['size']==4){
                                                echo "Extra Large";
                                            }

                                            ?> / <?php echo $product_data['color']; ?> </strong>  <?php
                                            if($product['discount']!=NULL){
                                            ?>
                                            $<span class="regular-price"><del><?php echo $product_data['price'];?></del> </span>
                                            <span class="old-price  new" style="color: #C89B3B;">&nbsp;<?php echo $product_price;?></span>

                                            <?php



                                            }else{
                                            ?>
                                            <span>PKR
                                                <?php echo $product_data['price'];?></span>
                                            <?php
                                            }

                                            ?> &nbsp;* <?php echo $cart_item['quantity']; ?></a></td>

                                        <td class="cart-product-total text-end pe-0"><span class="amount">PKR <?php


                                            $cart_product_quantity = $cart_item['quantity'];
                                            $product_bill= $product_bill + ($product_price * $cart_product_quantity ) ;


                                            echo $product_bill; ?></span></td>
                                    </tr>

                                </tbody>
                                <!-- Table Body End -->
                                <?php
                                        }
                                    }
                                ?>
                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Cart Subtotal</th>
                                        <td class="text-end pe-0"><span class="amount" id="sub_total_bill">PKR <?php echo $total_bill; ?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="text-start ps-0">Order Total</th>
                                        <td class="text-end pe-0"><strong><span class="amount" id="total_bill">PKR <?php echo $total_bill; ?></span></strong></td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>
                        <!-- Your Order Table End -->

                        <div class="coupon-accordion">


                            <!-- Title Start -->
                            <h3 class="title">Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <!-- Title End -->

                            <!-- Checkout Coupon Start -->
                            <div id="checkout_coupon" class="coupon-checkout-content" style="display: none;">
                                <div class="coupon-info">
                                    <p class="checkout-coupon d-flex">
                                        <input class="w-100" id="coupon_code" placeholder="Coupon code" type="text">
                                        <button class="w-100 btn btn-dark btn-hover-primary rounded-0" onclick="apply_coupon()" type="button" >Apply Coupon</button>
                                    </p>
                                </div>
                            </div>
                            <!-- Checkout Coupon End -->

                        </div>

                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>

                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>


                                </tbody>

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0 w-100" id="check_coupon"></th>

                                    </tr>
                                    <tr class="order-total" id="discounted_total">

                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>



                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button">

                            <div class="order-button-payment">
                                <input type="text" name="total_amount"  value="<?php echo $total_bill; ?>" hidden>
<!--                                <button type="submit" onclick="payment_type()"  name="final_checkout" class="btn btn-dark btn-hover-primary rounded-0 w-100">Place Order</button>-->
                                <button type="submit" onclick="payment_type()"  name="final_checkout" class="btn btn-dark btn-hover-primary rounded-0 w-100">Place Order</button>
                            </div>
                        </div>
                        <!-- Payment Accordion Order Button End -->
                    </div>
                    <!-- Your Order Area End -->
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Section End -->


<?php
include ("footer.php");
?>
<script>


    function payment_type()
    {
        var test = $('#payment_method').val();

        if(test==2)
        {



            $("#form").submit(function(e){
                this.action = "Stripe/index.php";
            });
        }

        if(test==1)
        {


            $("#form").submit(function(e){
                this.action = "Paypal/payments.php";
            });
        }
        if(test==3)
        {


            $("#form").submit(function(e){
                this.action = "final_message.php?status=1";
            });
        }

    }


    function apply_coupon()
    {
        var coupon_code = document.getElementById("coupon_code").value;


        //        alert(coupon_code);


        $.ajax({
            url: "admin/ajax/checkout/apply_coupon.php",
            type: "POST",
            data: {'coupon_code':coupon_code},
            success: function(response){

                //                alert(response);

                $("#discounted_total").html(response);
                //                $("#sub_total_bill").html(response);

            },
        });


        $.ajax({
            url: "admin/ajax/checkout/check_coupon.php",
            type: "POST",
            data: {'coupon_code':coupon_code},
            success: function(response){

                //                alert(response);
                $("#check_coupon").html(response);

            },
        });


    }



</script>
