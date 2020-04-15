
</div>
<?php if($this->uri->segment(2) == 'my-orders'): ?>
<?php if($orders): ?>
<?php foreach ($orders as $order_modal): ?>
<!-- Modal -->
<div class="modal fade" id="orderModalCenter-<?php echo $order_modal->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details for Order Number <font color="red"><?php echo $order_modal->order_number; ?></font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Start Checkout Content -->
        <div class="container padding-top-1x padding-bottom-3x">
            <div class="row">
                <!-- Start Checkout Review -->
                <div class="col-lg-8">
                    <h4>Review Your Order</h4>
                    <div class="table-responsive shopping-cart">
                      <?php if($bundles): ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($bundles as $bundle): ?>
                            <?php if($bundle->cob_order_number == $order_modal->order_number): ?>
                            <tr>
                                <td>
                                    <div class="product-item">
                                        <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $bundle->product_slug; ?>"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $bundle->product_show; ?>" alt="Product"></a>
                                        <div class="product-info">
                                            <h4 class="product-title">
                                                <a href="<?php echo base_url(); ?>product/<?php echo $bundle->product_slug; ?>"><?php echo $bundle->product_name; ?><small>x <?php echo $bundle->cob_qty; ?></small></a>
                                            </h4>
                                            <em>Color:</em> <?php echo $bundle->cob_color ? $bundle->cob_color : 'No Specify'; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-lg text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($bundle->cob_qty * $bundle->product_price); ?></td>
                            </tr>
                          <?php endif; ?>
                          <?php endforeach; ?>
                            
                            </tbody>
                        </table>
                      <?php endif; ?>
                    </div>
                    <div class="shopping-cart-footer">
                        <div class="column"></div>
                        <div class="column text-lg">Total: <span class="text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($order_modal->order_total_amount); ?></span></div>
                    </div>
                    <div class="row padding-top-1x mt-3">
                        <div class="col-sm-6">
                            <h5>Shipping to:</h5>
                            <ul class="list-unstyled">
                                <li><span class="text-muted">Company:</span><?php echo $order_modal->order_shipping_company; ?></li>
                                <li><span class="text-muted">Address:</span><?php echo $order_modal->order_shipping_address_1; ?></li>
                                <li><span class="text-muted">Alternative Address:</span><?php echo $order_modal->order_shipping_address_2; ?></li>
                                <li><span class="text-muted">Residence:</span><?php echo $order_modal->order_shipping_state .', '. $order_modal->order_shipping_country; ?></li>
                                <li><span class="text-muted">Zip Code:</span><?php echo $order_modal->order_shipping_zip_code; ?></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h5>Order Generate On:</h5>
                            <ul class="list-unstyled">
                                <li><span class="text-muted"><?php echo $order_modal->order_day.', ' . $order_modal->order_month . ', ' .$order_modal->order_year; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Checkout Review -->
              </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php if($order_modal->order_status == 0): ?>
        <?php echo form_open('checkout/pay/'.$order_modal->order_number); ?>
        <button type="submit" class="btn btn-primary">Pay Now</button>
        <?php echo form_close(); ?>
        <?php else: ?>
        <a name="" id="" class="btn btn-info" href="<?php echo base_url(); ?>order-tracker/<?php echo $order_modal->order_number; ?>" role="button">Track Order</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
<?php endif; ?>
<!-- Start Back To Top -->
<a class="scroll-to-top-btn" href="#">
    <i class="icon-arrow-up"></i>
</a>
<!-- End Back To Top -->
<div class="site-backdrop"></div>

<!-- custom plugins -->
<?php if($website_info->lc_code) echo $website_info->lc_code; ?>
<!-- Modernizr JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/modernizr.min.js"></script>
<!-- JQuery JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/bootstrap.min.js"></script>
<!-- CountDown JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/count.min.js"></script>
<!-- Gmap JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/gmap.min.js"></script>
<!-- ImageLoader JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/imageloader.min.js"></script>
<!-- Isotope JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/isotope.min.js"></script>
<!-- NouiSlider JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/nouislider.min.js"></script>
<!-- OwlCarousel JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/owl.carousel.min.js"></script>
<!-- PhotoSwipe UI JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/photoswipe-ui-default.min.js"></script>
<!-- PhotoSwipe JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/photoswipe.min.js"></script>
<!-- Velocity JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/velocity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/main/assets/js/wow.min.js"></script>
<!-- Main JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/script.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/main/assets/js/custom.js"></script>-->
<script src="<?php echo base_url(); ?>assets/main/assets/js/geodatasource-cr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main/assets/js/Gettext.js"></script>
<script>
new WOW().init();
</script>
<?php
$google_analystics = $this->google_tools->googleTools()->gt_analytics;
if($google_analystics):
?>
<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', '<?php echo $google_analystics; ?>', 'auto');
ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->
<?php endif; ?>
</body>
</html>