<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Product From <?php echo $main_cat_info->main_cat_name; ?></h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li><a href="<?php echo base_url(); ?>shop-category">Shop Category</a></li>
                <li class="separator">&nbsp;</li>
                <li><?php echo $main_cat_info->main_cat_name; ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <div class="col-lg-9 order-lg-2">
        <!--product by cat goes here-->
            <div class="shop-toolbar mb-30">
                <div class="column">
                    <div class="shop-view">
                        <a class="grid-view active" href="#" data-toggle="tooltip" data-placement="top" title="Product By Category">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <a class="list-view" href="<?php echo base_url(); ?>stock" data-toggle="tooltip" data-placement="top" title="All Products In Stock">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Toolbar -->
            <?php if($cat_products): ?>

            <!-- Start Products Grid -->
            <div class="row">
                    <!-- Start Product -->
                    <?php foreach($cat_products as $cat_product): ?>
                    <div class="wow fadeIn col-md-4 col-sm-4 col-6">
                        <div class="product-card">
                            <div class="offer offer-<?php if($cat_product->product_discount): echo 'danger'; else: echo 'default'; endif; ?>">
                                <div class="shape">
                                    <div class="shape-text">
                                        <?php if($cat_product->product_discount) echo $cat_product->product_discount . '%'; ?>	
                                    </div>
                                </div>
                                <div class="offer-content">
                                    <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $cat_product->product_slug; ?>">
                                        <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $cat_product->product_show; ?>" alt="Product">
                                    </a>
                                    <h3 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $cat_product->product_slug; ?>"><?php echo $cat_product->product_name; ?></a></h3>
                                    <h4 class="product-price"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($cat_product->product_price); ?><?php echo $cat_product->product_discount ? '<small>(<del class="text-muted">'. $website_info->website_currency_symbol . number_format($cat_product->product_fix_price) . '</del>)</small>' : '<small>&nbsp;</small>'; ?></h4>
                                    <div class="product-buttons">
                                    <?php if($this->session->userdata('cusLogged')): ?>
                                        <?php if($wishlists):
                                            foreach($wishlists as $wish):
                                                if($wish->cw_product_id == $cat_product->product_id):
                                                $cat_product->product_name = 'wsp'.$wish->cw_product_id;
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                        <button class="btn btn-outline-secondary btn-sm btn-wishlist<?php if($cat_product->product_name == 'wsp'.$cat_product->product_id) echo ' active'; ?>" id="wishAddCat<?php echo $cat_product->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                                        <?php else: ?>
                                        <button class="btn btn-outline-secondary btn-sm btn-wishlist" id="wishFeLoginCat<?php echo $cat_product->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                                        <?php endif; ?>
                                            <i class="icon-heart"></i>
                                        </button>
                                        <button class="btn btn-outline-primary btn-sm" id="<?php echo $this->session->userdata('cusLogged') ? 'fresh_add_to_cart_cat' : 'cart_add_login_cat'; ?><?php echo $cat_product->product_id; ?>" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- End Product -->
                    
                    
                    
                    
                </div>

                <?php endif; ?>

                <?php echo $pages; ?>
                <!-- End Pagination -->


        </div>
        <?php $this->load->view('sections/main/inc/product-category-side'); ?>
    </div>
</div>