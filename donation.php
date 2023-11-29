<?php
//making user email null
$user_email= NULL;
include ("header.php");

?>


<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Donation</h1>
                <ul>
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li class="active"> Donation</li>
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
                        <h3 class="title">Details</h3>
                        <!-- Checkbox Form Title End -->

                        <div class="row">

                            <!-- Select Country Name Start -->
                            <div class="col-md-12 mb-6">
                                <div class="country-select">
                                    <label>Payment Method <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide rounded-0" name="payment_method" id="payment_method" required>
                                        <option value="1" selected>PayPal</option>
                                        <option value="2">Stripe</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Select Country Name End -->

                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" value="" name="f_name" type="text" required>
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Last Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" value="" name="l_name" type="text" required>
                                </div>
                            </div>
                            <!-- Last Name Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" value="" name="email" type="email" required>
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                            <!-- Phone Number Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" value="" name="phone" required>
                                </div>
                            </div>
                            <!-- Phone Number Input End -->
                            <!-- Company Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Country</label>
                                    <input placeholder="" value="" name="country" type="text" required>
                                </div>
                            </div>
                            <!-- Company Name Input End -->

                            <!-- Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" value="" name="address" type="text" required>
                                </div>
                            </div>
                            <!-- Address Input End -->



                            <!-- Town or City Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" value="" name="city" required>
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- State or Country Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input placeholder="" name="state" value="" type="text" required>
                                </div>
                            </div>
                            <!-- State or Country Input End -->

                            <!-- Postcode or Zip Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="" value="" name="zip" type="text" required>
                                </div>
                            </div>
                            <!-- Postcode or Zip Input End -->



                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Amount you want to donate! <span class="required">*</span></label>
                                    <input type="text" value="" name="total_amount" required>
                                </div>
                            </div>

                        </div>

                        <!-- Different Address Start -->
                        <div class="different-address">


                            <!-- Ship Box Info End -->

                            <!-- Order Notes Textarea Start -->
                            <div class="order-notes mt-3 mb-n2">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Order Notes</label>
                                    <textarea cols="30" rows="10" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
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
                            <input type="hidden" name="item_number" value="123456" />
                            <!------------------------------------------------For paypal-------------------------------------------------->


                        </div>
                        <!-- Different Address End -->

                        <div class="order-button-payment">

                            <button type="submit" onclick="payment_type()" name="final_donate" class="btn btn-dark btn-hover-primary my-4 rounded-0 w-100">Donate</button>
                        </div>
                    </div>

                    <!-- Checkbox Form End -->

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
    function payment_type() {
        var test = $('#payment_method').val();

        if (test == 2) {



            $("#form").submit(function(e) {
                this.action = "Stripe/index.php";
            });
        }

        if (test == 1) {


            $("#form").submit(function(e) {
                this.action = "Paypal/payments.php";
            });
        }

    }

</script>
