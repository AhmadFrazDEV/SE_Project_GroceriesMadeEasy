<?php
include("header.php");
?>

<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Wishlist</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Wishlist Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="wishlist-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-cart">Add to Cart</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
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

                            $query="SELECT * FROM wishlist where user_id='$user_id'";
                            $cart_items=db::getRecords($query);
                            //                                 print_r ($cart_items);


                            if($cart_items != NULL){
                                foreach($cart_items as $cart_item)
                                {   
                                    $product_bill="0";
                                    $id = $cart_item['id'];
                                    $product_id = $cart_item['product_id'];
                                    

                                    $query="SELECT * from product where id='$product_id'";
                                    $product=db::getRecord($query);    

                                    //                                        print_r ($product);
                                    //                                        exit();

                                    $query = "SELECT * from product_image where product_id = '$product_id' ";
                                    $product_image = db::getRecord($query);

                                    //                                        print_r ($product_image);
                                    //                                        exit();


                            ?>

                            <tr>
                                <td class="pro-thumbnail"><a href="productdetail.php?id=<?php echo $product['id'];?>"><img class="img-fluid" style="width:150px;" src="<?php echo "admin/files/product/images/".$product_image['image_name']; ?>" alt="Product" /></a></td>
                                <td class="pro-title"><a href="productdetail.php?id=<?php echo $product['id'];?>"> <?php echo $product['name']; ?> </a></td>
                                <td class="pro-cart"><a href="productdetail.php?id=<?php echo $product['id'];?>" class="btn btn-dark btn-hover-primary rounded-0">Add to Cart</a></td>
                                <td class="pro-remove"><a href="admin/action.php?w_product_id=<?php echo $product['id'];?>&w_user_id=<?php echo $user_id; ?>"><i class="pe-7s-trash"></i></a></td>
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

    </div>
</div>
<!-- Wishlist Section End -->


<?php
include("footer.php");

?>