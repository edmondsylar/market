<!-- Start Recently Viewed Widget -->
<section class="widget widget-featured-products hidden-md-down">
    <h3 class="widget-title">Your Break Downs</h3>
    <?php if($carts): ?>
    <?php foreach($carts as $br_cart): ?>
    <div class="entry">
        <div class="entry-thumb">
            <a href="<?php echo base_url(); ?>product/<?php echo $br_cart->product_slug; ?>">
                <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $br_cart->product_show; ?>" alt="Product">
            </a>
        </div>
        <div class="entry-content">
            <h4 class="entry-title"><a href="<?php echo $br_cart->product_slug; ?>"><?php echo $br_cart->product_name; ?></a></h4><span class="entry-meta"><?php echo $website_info->website_currency_symbol; ?><?php echo $br_cart->product_price; ?></span>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <h4 class="text-center">Nothing to Show</h4>
    <?php endif; ?>
    
</section>
<!-- End Recently Viewed Widget -->