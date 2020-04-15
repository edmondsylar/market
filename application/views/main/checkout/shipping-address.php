    <!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Shipping Address</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator"> </li>
                <li>Shipping Address</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Checkout Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <!-- Start Checkout Address -->
        <div class="col-lg-9">
            <?php $this->load->view('sections/main/inc/checkout-steps'); ?>
            <h4>Shipping Address</h4>
            <hr class="padding-bottom-1x">
            <?php echo form_open('checkout/generate_order'); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-fn">First Name</label>
                        <input class="form-control" type="text" value="<?php echo $get_checkout_address_info->ca_firstname; ?>" id="checkout-fn" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-ln">Last Name</label>
                        <input class="form-control" type="text" value="<?php echo $get_checkout_address_info->ca_lastname; ?>" id="checkout-ln" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-email">E-Mail Address</label>
                        <input class="form-control" type="email" value="<?php echo $get_checkout_address_info->ca_email; ?>" id="checkout-email" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-phone">Phone Number</label>
                        <input class="form-control" type="number" value="<?php echo $get_checkout_address_info->cu_account_phone; ?>" id="checkout-phone" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-company">Company</label>
                        <input class="form-control" type="text" name="order_shipping_company" value="<?php echo $get_checkout_address_info->ship_company; ?>" id="checkout-company">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-country">Country</label>
<select class="form-control gds-cr" name="order_shipping_country" id="account-country" country-data-region-id="gds-cr-two" data-language="en" <?php if($get_checkout_address_info->ship_country): ?>country-data-default-value="<?php echo $get_checkout_address_info->ship_country; ?>"<?php endif; ?>></select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-city">City</label>
<select class="form-control" name="order_shipping_state" id="gds-cr-two" <?php if($get_checkout_address_info->ship_state): ?>region-data-default-value="<?php echo $get_checkout_address_info->ship_state; ?>"<?php endif; ?>></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-zip">ZIP Code</label>
                        <input class="form-control" type="number" name="order_shipping_zip_code" value="<?php echo $get_checkout_address_info->ship_zip_code; ?>" id="checkout-zip">
                    </div>
                </div>
            </div>
            <div class="row padding-bottom-1x">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-address1">Address 1</label>
                        <input class="form-control" type="text" name="order_shipping_address_1" value="<?php echo $get_checkout_address_info->ship_address_1; ?>" id="checkout-address1" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="checkout-address2">Address 2</label>
                        <input class="form-control" type="text" name="order_shipping_address_2" value="<?php echo $get_checkout_address_info->ship_address_2; ?>" id="checkout-address2">
                    </div>
                </div>
            </div>
            
            <div class="checkout-footer">
                <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>stock"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
                <div class="column"><button class="btn btn-primary" type="submit"><span class="hidden-xs-down">Continue </span><i class="icon-arrow-right"></i></button></div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- End Checkout Address -->
        <!-- Start Sidebar -->
        <div class="col-lg-3 order-sum">
            <aside class="sidebar">
                <div class="hidden-lg-up"></div>
                <!-- Start Order Summary Widget -->
                <?php $this->load->view('sections/main/inc/order_summery'); ?>
                <!-- End Order Summary Widget -->
                <?php $this->load->view('sections/main/inc/checkout-current-cart'); ?>
                <!-- Start Promo Banner -->
                <section class="promo-box hidden-md-down site-promo"><span class="overlay-dark site-promo-span"></span>
                    <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                        <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                        <h3 class="text-bold text-light text-shadow">Smartphones</h3><a class="btn btn-outline-white btn-sm" href="shop-grid-1.html">Shop Now</a>
                    </div>
                </section>
                <!-- End Promo Banner -->
            </aside>
        </div>
    </div>
</div>
<!-- End Product Content -->