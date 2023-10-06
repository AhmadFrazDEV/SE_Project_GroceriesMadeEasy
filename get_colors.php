<?php
session_start();
require_once("admin/database.php");

$id = $_POST ['id'];

?>

                            <div class="widget-list mb-10">
                                <h3 class="widget-title mb-4">Colors</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="sidebar-list">
                                        <?php

                                        $query = "SELECT DISTINCT color from product_data ";
                                        $categories = db::getRecords($query);


                                        if($categories!=null){

                                            foreach($categories as $category)
                                            {


                                        ?>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="color" id="examplee<?php echo $category['id'];?>" value="<?php echo $category['color'];?>" required >
                                                <label class="form-check-label " for="examplee<?php echo $category['id'];?>">
                                                    <?php echo $category['color'];?>
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