<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1><?php echo $show_product->product_name; ?></h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li><a href="<?php echo base_url(); ?>shop-category/<?php echo $show_product->main_cat_slug; ?>"><?php echo $show_product->main_cat_name; ?></a></li>
                <li class="separator">&nbsp;</li>
                <li><a href="#"><?php echo $show_product->sub_cat_name; ?></a></li>
                <li class="separator">&nbsp;</li>
                <li><?php echo $show_product->product_name; ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->




<!-- Start Page Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <!-- Start Product Content -->
        <div class="col-lg-9 order-lg-2">
            <div class="row">
                <!-- Start Product Gallery -->
                <div class="col-md-6">
                    <div class="product-gallery"><span class="product-badge text-danger"><?php if($show_product->product_discount) echo $show_product->product_discount . '% OFF'; ?></span>
                        <div class="gallery-wrapper">
                            <div class="gallery-item active"><a href="<?php echo base_url(); ?>statics/shops/products/<?php echo $show_product->product_show; ?>" data-hash="1" data-size="1000x667"></a></div>
                            <?php if($product_previews): ?>
                            <?php $i = 2; ?>
                            <?php foreach($product_previews as $product_preview): ?>
                            <div class="gallery-item"><a href="<?php echo base_url(); ?>statics/shops/products/<?php echo $product_preview->product_preview_name; ?>" data-hash="<?php echo $i++; ?>" data-size="1000x667"></a></div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="product-carousel owl-carousel">
                            <div data-hash="1"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $show_product->product_show; ?>" alt="Product"></div>
                            <?php if($product_previews): ?>
                            <?php $i = 2; ?>
                            <?php foreach($product_previews as $product_preview): ?>
                            <div data-hash="<?php echo $i++; ?>"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product_preview->product_preview_name; ?>" alt="Product"></div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <ul class="product-thumbnails with-sidebar">
                            <li class="active"><a href="#1"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $show_product->product_show; ?>" alt="Product"></a></li>
                            <?php if($product_previews): ?>
                            <?php $i = 2; ?>
                            <?php foreach($product_previews as $product_preview): ?>
                            <li><a href="#<?php echo $i++; ?>"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product_preview->product_preview_name; ?>" alt="Product"></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- End Product Gallery -->
                <!-- Start Product Info -->
                <div class="col-md-6 single-shop">
                    <div class="hidden-md-up"></div>
                    <div class="rating-stars">
                        <?php if($avg_rating == 0): ?>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <?php elseif($avg_rating >= 1 AND $avg_rating < 2): ?>
                        <i class="icon-star filled"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <?php elseif($avg_rating >= 2 AND $avg_rating < 3): ?>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <?php elseif($avg_rating >= 3 AND $avg_rating < 4): ?>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <?php elseif($avg_rating >= 4 AND $avg_rating < 5): ?>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star"></i>
                        <?php elseif($avg_rating >= 5): ?>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <i class="icon-star filled"></i>
                        <?php endif; ?>
                    </div>
                    <span class="text-muted align-middle">&nbsp;&nbsp;<?php echo $avg_rating; ?> | <?php echo number_format($rates_count); ?> Customer Reviews</span>
                    <h2 class="padding-top-1x text-normal with-side"><?php echo $show_product->product_name; ?></h2>
                    <span class="h2 d-block with-side"> <?php echo $website_info->website_currency_symbol; ?><?php echo $show_product->product_price; ?></span>
                    <p><?php echo $show_product->product_summary; ?></p>
                    <div class="row margin-top-1x">
                        <?php if($show_product->product_colors): ?>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color">
                                    <?php foreach($colors as $key => $color): ?>
                                    <option value=""><?php echo $color; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <select class="form-control" id="quantity">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #17685932</div> -->
                    <div class="padding-bottom-1x mb-2">
                        <span class="text-medium">Categories:&nbsp;</span>
                        <a class="navi-link" href="<?php echo base_url(); ?>shop-category/<?php echo $show_product->main_cat_slug; ?>"><?php echo $show_product->main_cat_name; ?>,</a>
                        <a class="navi-link" href="#"> <?php echo $show_product->sub_cat_name; ?>,</a>
                        <a class="navi-link" href="#"> <?php echo $show_product->brand_name; ?></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr class="mt-30 mb-30">
                    <div class="d-flex flex-wrap justify-content-between mb-30">
                        <div class="entry-share">
                            <span class="text-muted">Share:</span>
                            <div class="share-links">
                                <a class="social-button shape-circle sb-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>portfolio/<?php echo $show_product->product_slug; ?>" targer="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="socicon-facebook"></i>
                                </a>
                                <a class="social-button shape-circle sb-twitter" href="https://twitter.com/home?status=<?php echo base_url(); ?>portfolio/<?php echo $show_product->product_slug; ?>" target="_blanl" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="socicon-twitter"></i>
                                </a>
                                <a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                                    <i class="socicon-instagram"></i>
                                </a>
                                <a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google +">
                                    <i class="socicon-googleplus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sp-buttons mt-2 mb-2">
                            <?php if($this->session->userdata('cusLogged')): ?>
                            <?php if($wishlists):
                                foreach($wishlists as $wish):
                                    if($wish->cw_product_id == $show_product->product_id):
                                    $show_product->product_name = 'wsp'.$wish->cw_product_id;
                                    endif;
                                endforeach;
                            endif;
                            ?>
                            <button class="btn btn-outline-secondary btn-sm btn-wishlist<?php if($show_product->product_name == 'wsp'.$show_product->product_id) echo ' active'; ?>" id="wishAdd<?php echo $show_product->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                            <?php else: ?>
                            <button class="btn btn-outline-secondary btn-sm btn-wishlist" id="wishLogin<?php echo $show_product->product_id; ?>" data-toggle="tooltip" title="Whishlist">
                            <?php endif; ?>
                                <i class="icon-heart"></i>
                            </button>
                            <button class="btn btn-primary" id="<?php echo $this->session->userdata('cusLogged') ? 'fresh_add_to_cart' : 'cart_add_login'; ?><?php echo $show_product->product_id; ?>"><i class="icon-bag"></i> Check Out</button>
                        </div>
                    </div>
                </div>

                <!-- End Product Info -->
                <!-- Start Product Tabs -->
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Description</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <?php echo $show_product->product_description; ?>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">

                            <?php if($reviews): ?>
                            <?php foreach($reviews as $review): ?>
                            <!-- Start Review #1 -->
                            <div class="comment">
                                <div class="comment-author-ava"><img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $review->cu_account_profile_pic ? $review->cu_account_profile_pic : "default.jpg"; ?>" alt="Review Author"></div>
                                <div class="comment-body">
                                    <div class="comment-header d-flex flex-wrap justify-content-between">
                                        <h4 class="comment-title"><?php echo $review->pr_rate_title; ?></h4>
                                        <div class="mb-2">
                                            <div class="rating-stars">
                                                <?php if($review->pr_rating == 0): ?>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <?php elseif($review->pr_rating >= 1 AND $review->pr_rating < 2): ?>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <?php elseif($review->pr_rating >= 2 AND $review->pr_rating < 3): ?>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <?php elseif($review->pr_rating >= 3 AND $review->pr_rating < 4): ?>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <?php elseif($review->pr_rating >= 4 AND $review->pr_rating < 5): ?>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star"></i>
                                                <?php elseif($review->pr_rating >= 5): ?>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <i class="icon-star filled"></i>
                                                <?php endif; ?>
                                                <?php if($this->session->userdata('cus_id')): ?>
                                                <?php if($review->ca_id == $this->session->userdata('cus_id')): ?>
                                                <strong><a href="<?php echo base_url(); ?>un-review/<?php echo $review->pr_id; ?>/<?php echo $show_product->product_slug; ?>"><font color="red" siz4="14">&times;</font></a></strong>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="comment-text"><?php echo $review->pr_tate_text; ?></p>
                                    <div class="comment-footer"><span class="comment-meta"><?php echo $review->ca_firstname . ' ' . $review->ca_lastname; ?></span></div>
                                </div>
                            </div>
                            <!-- End Review #1 -->
                            <?php endforeach; ?>
                            <?php else: ?>
                            <h4 class="text-center">No customer Review Yet!</h4>
                            <?php endif; ?>
                            
                            <!-- Start Review Form -->
                            <?php if($this->session->userdata('cus_id')): ?>
                            <?php
                            if($this->session->flashdata('error')):
                                echo $this->session->flashdata('error');
                            endif;
                            ?>
                            <?php if($review_action): ?>
                            <?php if($good_to_review): ?>
                            <h5 class="mb-30 padding-top-1x">Leave Review</h5>
                            <?php
                            $opt = ['class' => 'row'];
                            echo form_open('item-review/'.$show_product->product_id . '/' . $show_product->product_slug, $opt);
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_subject">Review Subject</label>
                                        <input class="form-control form-control-rounded" name="rate_title" type="text" id="review_subject" maxlenght = "100" autocomplete = "off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_rating">Your Rate</label>
                                        <select class="form-control form-control-rounded" name="rating_star" id="review_rating" required>
                                            <option>5 Stars</option>
                                            <option>4 Stars</option>
                                            <option>3 Stars</option>
                                            <option>2 Stars</option>
                                            <option>1 Star</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="review_text">Review </label>
                                        <textarea class="form-control form-control-rounded" name="rate_body" id="review_text" rows="8" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-outline-primary" name="submit" type="submit">Submit Review</button>
                                </div>
                            <?php echo form_close(); ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- End Review Form -->
                        </div>
                    </div>
                </div>
                <!-- End Product Tabs -->
            </div>
        </div>
        <!-- End Product Content -->



        <!-- Start Sidebar -->
        <?php $this->load->view('sections/main/inc/product-brand-list'); ?>
        <!-- End Sidebar -->
    </div>





    <!-- Start Related Products -->
    <h3 class="text-center padding-top-3x mb-30">Releted Products</h3>
    <?php if($get_releteds): ?>
    <div class="owl-carousel" data-owl-carousel='{ "nav": false, "dots": false, "margin": 30, "responsive": {"0":{"items":1},"576":{"items":2},"768":{"items":3},"991":{"items":4},";1200":{"items":4}} }'>
        <!-- Start Product -->
        <?php foreach($get_releteds as $relate): ?>
        <div class="grid-item">
            <div class="product-card">
                <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $relate->product_slug; ?>">
                    <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $relate->product_show; ?>" alt="Product">
                </a>
                <h3 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $relate->product_slug; ?>"><?php echo $relate->product_name; ?></a></h3>
                <h4 class="product-price"><?php echo $website_info->website_currency_symbol; ?><?php echo $relate->product_price; ?></h4>
                <div class="product-buttons">
                    <div class="product-buttons">
                        <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist">
                            <i class="icon-heart"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- End Product -->
    </div>
    <?php else: ?>
    <h3 class="text-center">No Related Product To Show!</h3>
    <?php endif; ?>
    <!-- End Related Products -->
</div>
<!-- End Page Content -->