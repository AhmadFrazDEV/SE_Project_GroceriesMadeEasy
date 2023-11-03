<?php
session_start();
include("../../database.php");

$product_id=$_POST['product_id'];
$size=$_POST['size'];

$query    = "SELECT * from product_data where product_id='$product_id' AND size='$size' ";
$product_colors = db::getRecords($query);

//print_r( $product_colors);
?>

<?php
if($product_colors!=NULL){

    $i=1;
    foreach($product_colors as $product_color)
    {
        //                    print_r( $product_color);
        if($i==1){
            if($product_color['stock']==0){


?>
<div class="swatch">
    <input type="radio" name="swatch_demo" id="swatch_<?php echo $i;?>" value="<?php echo $product_color['color'];?>" onclick="show_color_price('<?php echo $size;?>','<?php echo $product_id;?>','<?php echo $product_color['color'];?>')" checked />
    <label for="swatch_<?php echo $i;?>" style="background-color: <?php echo $product_color['color'];?>;<?php if($product_color['color']=="#ffffff" || $product_color['color']=="#fff"){ ?> color: #000; <?php }else{ ?> color: #fff; <?php } ?> "><i class="fa fa-check"></i></label>

    <input type="hidden" class="getit" value="<?php echo $product_color['color'];?>">

</div>

<?php
                                          }else{
                $i=0;
?>
<div class="swatch">
    <input type="radio" name="swatch_demo" id="swatch_<?php echo $i;?>" value="<?php echo $product_color['color'];?>" onclick="show_color_price('<?php echo $size;?>','<?php echo $product_id;?>','<?php echo $product_color['color'];?>')" disabled />
    <label for="swatch_<?php echo $i;?>" style="background-color: <?php echo $product_color['color'];?>;<?php if($product_color['color']=="#ffffff" || $product_color['color']=="#fff"){ ?> color: #000; <?php }else{ ?> color: #fff; <?php } ?> "><i class="fa fa-times"></i></label>

</div>

<?php
                                               }
            $i++;

        }
        else{
            if($product_color['stock']==0){

?>
<div class="swatch">
    <input type="radio" name="swatch_demo" id="swatch_<?php echo $i;?>" value="<?php echo $product_color['color'];?>" onclick="show_color_price('<?php echo $size;?>','<?php echo $product_id;?>','<?php echo $product_color['color'];?>')"  />
    <label for="swatch_<?php echo $i;?>" style="background-color: <?php echo $product_color['color'];?>;

                                                <?php
                                           if($product_color['color']=="#ffffff" || $product_color['color']=="#fff"){
                                                ?>
                                                color: #000;
                                                <?php
                                           }else{
                                                ?>
                                                color: #fff;

                                                <?php
                                           }
                                                ?>
                                                "><i class="fa fa-check"></i></label>
</div>


<?php
                                          }else{
?>
<div class="swatch">
    <input type="radio" name="swatch_demo" id="swatch_<?php echo $i;?>" value="<?php echo $product_color['color'];?>" onclick="show_color_price('<?php echo $size;?>','<?php echo $product_id;?>','<?php echo $product_color['color'];?>')" disabled />
    <label for="swatch_<?php echo $i;?>" style="background-color: <?php echo $product_color['color'];?>;<?php if($product_color['color']=="#ffffff" || $product_color['color']=="#fff"){ ?> color: #000; <?php }else{ ?> color: #fff; <?php } ?> "><i class="fa fa-times"></i></label>


</div>

<?php
                                               }
            $i++;
        }
    }
}



?>



