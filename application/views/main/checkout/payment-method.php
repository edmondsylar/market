<!-- Start Checkout Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <!-- Start Checkout Payment -->
        <div class="col-lg-9">
        <?php $this->load->view('sections/main/inc/checkout-steps'); ?>
            <h4>Choose Payment Method</h4>
            <hr class="padding-bottom-1x">
            <?php echo form_open('payment-method'); ?>
            <div class="accordion" id="accordion" role="tablist">
                <div class="card">
                    <div class="card-header" role="tab">
                        <h6><a href="#card" data-toggle="collapse" data-parent="#accordion"><i class="icon-columns"></i>Pay With Credit Card</a></h6>
                    </div>
                    <div class="collapse show" id="card" role="tabpanel">
                        <div class="card-body">
                            <div class="card-wrapper"></div>
                            <div class="interactive-credit-card row">
                                <div class="row">
                                    <?php if($paypal->pg_is_active == 1): ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <input 
                                                type="radio" name="payment" 
                                                id="paypal" value="paypal" class="input-hidden" required/>
                                                <label for="paypal">
                                                <img 
                                                    src="<?php echo base_url(); ?>statics/payments/paypal/pay.png" 
                                                    alt="I'm sad" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($my_stripe->sg_is_active == 1): ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <input 
                                                type="radio" name="payment" 
                                                id="stripe" value="stripe" class="input-hidden" required/>
                                                <label for="stripe">
                                                <img 
                                                    src="<?php echo base_url(); ?>statics/payments/stripe/pay.png" 
                                                    alt="I'm sad" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($my_paystack->ps_is_active == 1): ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <input 
                                                type="radio" name="payment" 
                                                id="paystack" value="paystack" class="input-hidden" required/>
                                                <label for="paystack">
                                                <img 
                                                    src="<?php echo base_url(); ?>statics/payments/paystack/pay.png" 
                                                    alt="I'm sad" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                
            </div>
            <div class="checkout-footer margin-top-1x">
                <div class="column"><a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>shop-checkout/shipping-address"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back</span></a></div>
                <div class="column"><button type="submit" class="btn btn-primary"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></button></div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- End Checkout Payment -->
        <!-- Start Sidebar -->
        <div class="col-lg-3 order-sum">
            <aside class="sidebar">
                <div class="hidden-lg-up"></div>
                <!-- Start Order Summary Widget -->
                <?php $this->load->view('sections/main/inc/order_summery'); ?>
                <!-- End Order Summary Widget -->
                <!-- Start Recently Viewed Widget -->
                <?php $this->load->view('sections/main/inc/checkout-current-cart'); ?>
                <!-- End Recently Viewed Widget -->
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