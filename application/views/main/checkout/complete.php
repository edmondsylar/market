<!-- Start Checkout Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <!-- Start Checkout Payment -->
        <div class="col-lg-9">
        <?php $this->load->view('sections/main/inc/checkout-steps'); ?>
            <h4>Confirming Your Order</h4>
            <hr class="padding-bottom-1x">
            <?php echo form_open('payment-method'); ?>
            
            <div id="pageInfo">
            <script>
            redirect();
            </script>

            </div>

            
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