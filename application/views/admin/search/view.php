<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Search Products</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li>Search Products</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Page Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <!-- Start Search Content -->
        <div class="col-lg-9">

            <?php if($get_searches): ?>
            <?php foreach($get_searches as $search): ?>
            <div class="card mb-4">
                <div class="card-header"><span class="badge badge-pill badge-primary"><?php echo $search->brand_name; ?></span></div>
                <div class="card-body">
                    <div class="d-flex"><a class="pr-4 hidden-xs-down search-products" href="<?php echo base_url(); ?>product/<?php echo $search->product_slug; ?>">
                        <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $search->product_show; ?>" alt="Product"></a>
                        <div>
                            <h5><a class="navi-link" href="<?php echo base_url(); ?>product/<?php echo $search->product_slug; ?>"><?php echo $search->product_name; ?> </a></h5>
                            <h6>
                                <?php echo $website_info->website_currency_symbol . $search->product_price; ?>
                            </h6>
                            <p><?php echo $search->product_summary; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h4 class="text-center">No Result Found!</h4>
            <?php endif; ?>
            


            <!-- Start Pagination -->
            <?php echo $pages; ?>
            <!-- End Pagination -->
        </div>
        <!-- End Search Content -->
        <!-- Start Sidebar -->
        <?php $this->load->view('sections/main/inc/product-brand-list'); ?>
    </div>
</div>
<!-- End Page Content -->