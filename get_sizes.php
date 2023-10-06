<?php
session_start();
require_once("admin/database.php");

$id = $_POST ['id'];

?>
<div class="widget-list mb-10">
                                <h3 class="widget-title mb-4">Sizes</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="sidebar-list">
                                        <?php

                                        $query = "SELECT * from product_data where product_id='$id'";
                                        $categories = db::getRecords($query);


                                        if($categories!=null){

                                            foreach($categories as $category)
                                            {


                                        ?>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="size" id="exampee<?php echo $category['id'];?>" value="<?php echo $category['size'];?>" required >
                                                <label class="form-check-label " for="exampee<?php echo $category['id'];?>">
                                                    <?php 
                                                if($category['size']==1){                                        

                                                    ?>
                                                    Small
                                                    <?php 
                                                }
                                                if($category['size']==2){                                        

                                                    ?>
                                                    Medium
                                                    <?php 
                                                }
                                                if($category['size']==3){                                        

                                                    ?>
                                                    Large
                                                    <?php 
                                                }
                                                if($category['size']==4){                                        

                                                    ?>

                                                    Extra Large
                                                    <?php 
                                                }

                                                    ?>


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