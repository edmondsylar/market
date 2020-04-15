<section class="container padding-top-3x padding-bottom-3x">
    <?php if($fresh_products): ?>
    <h3 class="text-center mb-30">Fresh In Stock</h3>
    <div class="row">
        <?php foreach($fresh_products as $fresh): ?>
        <!-- Start Product loop -->
        <div class="wow fadeIn col-md-3 col-sm-4 col-6">
            <div class="product-card">
            <div class="offer offer-<?php if($fresh->product_discount): echo 'danger'; else: echo'default'; endif; ?>">
            <?php if($fresh->product_discount): ?>
            <div class="shape">
                <div class="shape-text">
                    <?php echo $fresh->product_discount; ?>%						
                </div>
            </div>
            <?php else: ?>
            <div class="shape">
                <div class="shape-text">					
                </div>
            </div>
            <?php endif; ?>
            <div class="offer-content">
                <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $fresh->product_slug; ?>">
                    <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $fresh->product_show; ?>" alt="Product">
                </a>
                <h3 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $fresh->product_slug; ?>"><?php echo $fresh->product_name; ?></a></h3>
                <h4 class="product-price"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($fresh->product_price); ?><?php echo $fresh->product_discount ? '<small>(<del class="text-muted">'. $website_info->website_currency_symbol . number_format($fresh->product_fix_price) . '</del>)</small>' : '<small>&nbsp;</small>'; ?></h4>
                <div class="product-buttons">
                    <div class="product-buttons">
                        <?php if($this->session->userdata('cusLogged')): ?>
                        <?php if($wishlists):
                            foreach($wishlists as $wish):
                                if($wish->cw_product_id == $fresh->product_id):
                                $fresh->product_name = 'wsp'.$wish->cw_product_id;
                                endif;
                            endforeach;
                        endif;
                        ?>
                        <button class="btn btn-outline-secondary btn-sm btn-wishlist<?php if($fresh->product_name == 'wsp'.$fresh->product_id) echo ' active'; ?>" id="wishAdd<?php echo $fresh->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                        <?php else: ?>
                        <button class="btn btn-outline-secondary btn-sm btn-wishlist" id="wishLogin<?php echo $fresh->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                        <?php endif; ?>
                            <i class="icon-heart"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm" id="<?php echo $this->session->userdata('cusLogged') ? 'fresh_add_to_cart' : 'cart_add_login'; ?><?php echo $fresh->product_id; ?>" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i> Add</button>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
        <!-- End Product loop -->
    <?php endforeach; ?>
        
    </div>
    <?php else: ?>
    <h3 class="text-center">No Result From Stock</h3>
    <?php endif; ?>
</section>