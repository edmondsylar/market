<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>My Wishlist</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>My Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start My Wishlist -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
    <?php $this->load->view('sections/main/inc/profile-sidebar'); ?>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <!-- Wishlist Table-->
            <?php if($wishlists): ?>
            <div id="w-r-info"></div>
            <div class="table-responsive wishlist-table margin-bottom-none">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Empty Wishlist</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($wishlists as $wishlist): ?>
                    <tr>
                        <td>
                            <div class="product-item"><a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $wishlist->product_slug; ?>"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $wishlist->product_show; ?>" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $wishlist->product_slug; ?>"><?php echo $wishlist->product_name; ?></a></h4>
                                    <div class="text-lg text-medium text-muted"><?php echo $website_info->website_currency_symbol; ?><?php echo $wishlist->product_price; ?></div>
                                    <div>Availability:
                                        <?php if($wishlist->product_status == 1): ?>
                                        <div class="d-inline text-success">In Stock</div>
                                        <?php else: ?>
                                        <div class="d-inline text-danger">Out Of Stock</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><a class="remove-from-cart"id="remove-wishlist-<?php echo $wishlist->cw_id; ?>" href="javascript:void(0);" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <h4 class="text-center">Your wishlist is Empty!</h4>
            <?php endif; ?>
            <hr class="mb-4">
        </div>
    </div>
</div>
<!-- End My Wishlist -->