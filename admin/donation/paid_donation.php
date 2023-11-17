<?php

include("header.php");

$query = "SELECT * from donation where payment_status='paid'";
$donations = db::getRecords($query);



?>


<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Paid Donation</a></li>


                            </ol>

                        </nav>


                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->


<div class="card">
    <div class="card-body">

        <!-- Row grouping -->
        <section id="row-grouping-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-title">
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Paid Donation</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table table-responsive table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($donations!=NULL)
                                    {
                                        foreach($donations as $donation)

                                        {

                                    ?>
                                    <tr >
                                        <td > <?php echo $donation['id']; ?></td>
                                        <td > <?php echo $donation['donate_id']; ?></td>
                                        <td > <?php echo $donation['f_name']; ?>&nbsp;<?php echo $donation['l_name']; ?></td>
                                        <td > <?php echo $donation['phone']; ?></td>
                                        <td > <?php echo $donation['email']; ?></td>
                                        <td > <?php echo $donation['address']; ?></td>
                                        <td > <?php echo $donation['city']; ?></td>


                                        <td > $<?php echo $donation['total_bill']; ?></td>

                                        <?php

                                            $method = $donation['payment_method'];
                                            if($method==1){
                                        ?>
                                        <td > <?php echo "Paypal" ?></td>
                                        <?php

                                            }
                                            else{
                                        ?>
                                        <td > <?php echo "Stripe" ?></td>
                                        <?php
                                            }
                                        ?>


                                        <td class="text-capitalize" > <?php echo $donation['payment_status']; ?></td>

                                        <td>
                                            <div class="col-lg-6 col-12">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <span data-toggle="modal" data-target="#view-details<?php echo $donation['donate_id']; ?>">
                                                    <button data-toggle="popover"  data-trigger="hover" data-original-title="View Paid Donation" type="button" class="btn  btn-success bg-success bg-darken-2"  ><i class="fa fa-eye" ></i></button>
                                                    </span>
                                                    <span  onclick="delete_banner('<?php echo $donation['donate_id']; ?>')">
                                                    <a data-toggle="popover"  data-trigger="hover" data-original-title="Delete Donation" class="btn btn-pinterest"><i class="bx bx-trash"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-size-xl d-inline-block">

<div class="modal fade text-left" id="view-details<?php echo $donation['donate_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title m-1" id="myModalLabel16">Donation # &nbsp;<?php echo $donation['donate_id']; ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">

                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">First Name</label>
                                                <input type="text" id="last-name-column" class="form-control" value="<?php echo $donation['f_name']; ?>" name="lname-column" disabled style="background-color:#fffcolor:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Last Name</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['l_name']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Phone</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['phone']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Email</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['email']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Address</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['address']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">City</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['city']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">State</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['state']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Zip Code</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['zip_code']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Country</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['country']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Donated Amount</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="$<?php echo $donation['total_bill']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Payment_status</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo $donation['payment_status']; ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <?php

                                            $method = $donation['payment_method'];
                                            if($method==1){
                                            ?>
                                            <div class="form-group">
                                                <label for="last-name-column">Payment_method</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo "Paypal" ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                            <?php

                                            }
                                            else{
                                            ?>
                                            <div class="form-group">
                                                <label for="last-name-column">Payment_method</label>
                                                <input
                                                       type="text"
                                                       id="last-name-column"
                                                       class="form-control"
                                                       value="<?php echo "Stripe" ?>"
                                                       name="lname-column"
                                                       disabled style="background-color:#fff color:#222;"
                                                       />
                                            </div>
                                            <?php
                                            }
                                            ?>




                                        </div>



                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Order Note</label>
                                                <input type="text" rows="3"  class="form-control" value="<?php echo $donation['note']; ?>" disabled />

                                            </div>
                                        </div>


                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

                                            </div>

                                        </td>

                                    </tr>



                                    <?php
                                        }

                                    }
                                    else{
                                        echo"Not Found!!";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Row grouping -->


    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="delete_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content  border-0">
            <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                <h5 class="modal-title" style="color:white;">Delete Donation</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../action.php" method="POST">
                    <div class="modal-body">
                        <p class="text-danger" >Are You Sure to Delete This</p>
                    </div>
                    <input type="text" id="delete_id" name="delete_id" hidden>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="donation_delete" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php

include("footer.php");

?>

<script>


    function edit(id)
    {

        document.getElementById("edit_id").value=id;
        $("#edit_modal").modal('show');
    }
    function delete_banner(id)
    {

        document.getElementById("delete_id").value=id;
        $("#delete_modal").modal('show');
    }


</script>
