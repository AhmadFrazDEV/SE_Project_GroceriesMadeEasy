<?php
session_start();
require_once("admin/database.php");

$id = $_POST ['id'];

?>
<div class="widget-list mb-10" >
    <h3 class="widget-title mb-4">Categories</h3>
    <!-- Widget Menu Start -->
    <nav >


        <ul class="sidebar-list">
            <?php

            $query = "SELECT * FROM sub_category where c_id='$id'";
            $categories = db::getRecords($query);

            //                                        print_r($query);
            //                                        print_r($categories);

            if($categories!=null){

                foreach($categories as $category)
                {
                    $c_id = $category['c_id'];
                    $sc_id = $category['id'];

                    $query = "SELECT * FROM product where c_id='$c_id' AND sc_id='$sc_id'";
                    $product = db::getRecord($query);

            ?>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="exampl<?php echo $category['id'];?>" value="<?php echo $category['id'];?>" onclick="show_size('<?php echo $product['id'];?>')"  required >
                    <label class="form-check-label " for="exampl<?php echo $category['id'];?>">
                        <?php echo $category['sc_name'];?>
                    </label>
                </div>
            </li>
            <?php
                }
            }
            else
            {
                echo "No Results Yet!";
            }
            ?>
        </ul>
    </nav>
    <!-- Widget Menu End -->
</div>
<!--
<div id="show_size">
    <div class="widget-list mb-10">
        <h3 class="widget-title mb-4">Sizes</h3>
        
        <nav>
            <p>Select Categories</p>
        </nav>
        
    </div>
</div>
-->