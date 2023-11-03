<?php
session_start();
include("../../database.php");

$product_id=$_POST['product_id'];
$size=$_POST['size'];
$color=$_POST['color'];

$query = "SELECT * from product where id = '$product_id' ";
$product = db::getRecord($query);

$query    = "SELECT * from product_data where product_id='$product_id' AND size='$size' AND color='$color' ";
$product_price = db::getRecord($query);

//print_r( $product_colors);

if($product_price!=NULL){

    //                $discount = $product['discount'];
    if($product['discount']!=NULL){
        $discount = (float)$product_price['price']*((float)($product['discount']/100));
        //                print_r((float)$product_price['price']*((float)($product['discount']/100)));

        $discounted_price = (float)$product_price['price']-((float)$discount);


?>

$<span class="regular-price"><del><?php echo $product_price['price'];?></del> </span>
<span class="old-price  new">&nbsp;$ <?php echo $discounted_price;?></span>
<?php
    }else{



?>
<span class="regular-price">PKR <?php echo $product_price['price'];?></span>

<?php
         }
?>

<input type="hidden" id="product_data_id" value="<?php echo $product_price['id']; ?>" />

<?php
}

?>
