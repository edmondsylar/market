<?php if($home_featured_products): ?>
<section class="container padding-top-3x padding-bottom-3x">
    <h3 class="text-center mb-30">Featured Products</h3>
    <div class="row">

        <?php foreach($home_featured_products as $featured): ?>
        <!-- Start Product product -->
        <div class="wow fadeIn col-md-3 col-sm-6 col-6">
            <div class="product-card">
                <div class="offer offer-<?php if($featured->product_discount): echo 'danger'; else: echo 'default'; endif; ?>">
                    <div class="shape">
                        <div class="shape-text">
                            <?php if($featured->product_discount) echo $featured->product_discount . '%'; ?>	
                        </div>
                    </div>
                    <div class="offer-content">
                        <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $featured->product_slug; ?>">
                            <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $featured->product_show; ?>" alt="Product">
                        </a>
                        <h3 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $featured->product_slug; ?>"><?php echo $featured->product_name; ?></a></h3>
                        <h4 class="product-price"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($featured->product_price); ?><?php echo $featured->product_discount ? '<small>(<del class="text-muted">'. $website_info->website_currency_symbol . number_format($featured->product_fix_price) . '</del>)</small>' : '<small>&nbsp;</small>'; ?></h4>
                        <div class="product-buttons">
                            <div class="product-buttons">
                            <?php if($this->session->userdata('cusLogged')): ?>
                                <?php if($wishlists):
                                    foreach($wishlists as $wish):
                                        if($wish->cw_product_id == $featured->product_id):
                                        $featured->product_name = 'wsp'.$wish->cw_product_id;
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                                <button class="btn btn-outline-secondary btn-sm btn-wishlist<?php if($featured->product_name == 'wsp'.$featured->product_id) echo ' active'; ?>" id="wishAddFea<?php echo $featured->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                                <?php else: ?>
                                <button class="btn btn-outline-secondary btn-sm btn-wishlist" id="wishFeLogin<?php echo $featured->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                                <?php endif; ?>
                                    <i class="icon-heart"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm" id="<?php echo $this->session->userdata('cusLogged') ? 'fresh_add_to_cart_fe' : 'cart_add_login_fe'; ?><?php echo $featured->product_id; ?>" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-carty" aria-hidden="true"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product featured -->

        <?php endforeach; ?>


    </div>
</section>
<?php endif; ?>