<?php
session_start();
include("../../database.php");

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

?>

<?php

$total_bill="0";

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




<!-- Cart Product/Price Start -->
<div class="cart-product-wrapper mb-6">

    <!-- Single Cart Product Start -->
    <div class="single-cart-product">
        <div class="cart-product-thumb">
            <a href="productdetail.php?id=<?php echo $product['id'];?>"><img src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>"  alt="Cart Product"></a>
        </div>
        <div class="cart-product-content">
            <h3 class="title" ><a  href="productdetail.php?id=<?php echo $product['id'];?>"><?php echo $product['name']; ?> <strong class="product-quantity" ><?php
        if($product_data['size']==1){
            echo "Small";
        }elseif($product_data['size']==2){
            echo "Medium";
        }elseif($product_data['size']==3){
            echo "Large";
        }elseif($product_data['size']==4){
            echo "Extra Large";
        }else{
            echo $product_data['size'];
        }

                ?> <span style="background-color:<?php echo $product_data['color']; ?>;border:1px solid #000;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> </strong></a></h3>
            <span class="price">
                <?php
        if($product['discount']!=NULL){
                ?>
<!--
                 $<span class="old"><del><?php echo $product_data['price'];?>
                    </del></span>
                <span class="new">&nbsp; <?php echo $product_price;?></span>
-->



                <?php



        }else{
                ?>
<!--
                <span class="new">$
                    <?php echo $product_data['price'];?></span>
-->
                <?php
        }

                ?><?php echo $cart_item['quantity']; ?> Pcs
                <!--
<span class="new">$38.50</span>
<span class="old">$40.00</span>
-->
            </span>
            <span class="price">
                <span class="new">PKR <?php


        $cart_product_quantity = $cart_item['quantity'];
        $product_bill= $product_bill + ($product_price * $cart_product_quantity ) ;


        echo $product_bill; ?></span>
            </span>

        </div>
    </div>
    <!-- Single Cart Product End -->

    <!-- Product Remove Start -->
    <div class="cart-product-remove">
        <a onclick="get_data()"  href="admin/action.php?product_id=<?php echo $product['id'];?>&product_data_id=<?php echo $product_data['id']; ?>&user_id=<?php echo $user_id; ?>"><i class="fa fa-trash"></i></a>
    </div>
    <!-- Product Remove End -->

</div>
<!-- Cart Product/Price End -->
<?php
    }
}
?>



<!-- Cart Product Total Start -->
<div class="cart-product-total">
    <span class="value">Subtotal</span>
    <span class="price">PKR <?php echo $total_bill; ?></span>
</div>
<!-- Cart Product Total End -->

<!-- Cart Product Button Start -->
<div class="cart-product-btn mt-4">
    <a href="cart.php" class="btn btn-dark btn-hover-primary rounded-0 w-100 mb-2">View cart</a>
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

</div>
<!-- Cart Product Button End -->

