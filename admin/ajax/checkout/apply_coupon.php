<?php
session_start();
include("../../database.php");

$coupon_code =$_POST['coupon_code'];
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


    }
}

$query="SELECT * FROM coupon where code='$coupon_code'";
$coupon=db::getRecord($query);

if($coupon != NULL){
    $coupon_discount = $coupon['value'];

    $discounted_price = (float)$total_bill*((float)($coupon_discount/100));
    //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

    $discounted_total = (float)$total_bill-((float)$discounted_price);

?>
<th class="text-start ps-0">Order Total</th>
<td class="text-end pe-0"><strong><span class="amount" >$ <?php echo $discounted_total; ?></span></strong></td>
<input type="hidden" name="discounted_total_amount"  value="<?php echo $discounted_total; ?>" hidden>
<input type="hidden" name="coupon_code"  value="<?php echo $coupon_code; ?>" hidden>
<?php
    echo "$discounted_total";
}else{

?>
<th class="text-start ps-0">Order Total</th>
<td class="text-end pe-0"><strong><span class="amount" >$ <?php echo $total_bill; ?></span></strong></td>
<input type="hidden" name="discounted_total_amount"  value="<?php echo $total_bill; ?>" hidden>
<input type="hidden" name="coupon_code"  value="<?php echo $coupon_code; ?>" hidden>
<?php
      
     }
?>
