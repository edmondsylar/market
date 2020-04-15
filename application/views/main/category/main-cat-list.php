<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Shop Categories</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li>Shop Categories</li>
            </ul>
        </div>
    </div>
</div>


<div class="container padding-top-1x padding-bottom-2x">
    <div class="row">
        <div class="col-lg-9 order-lg-2">
            <?php if($list_all_cats): ?>
            <!-- Start Categories -->
            <div class="row">
                <?php foreach($list_all_cats as $cats): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <a class="card-img-tiles" href="<?php echo base_url(); ?>shop-category/<?php echo $cats->main_cat_slug; ?>">
                            <div class="inner">
                                <div class="main-img">
                                    <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cats->main_cat_preview1; ?>" alt="Category">
                                </div>
                                <div class="thumblist">
                                    <?php if($cats->main_cat_preview2 != NULL): ?>
                                    <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cats->main_cat_preview2; ?>" alt="Category">
                                    <?php endif; ?>

                                    <?php if($cats->main_cat_preview3 != NULL): ?>
                                    <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cats->main_cat_preview3; ?>" alt="Category">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title"><?php echo $cats->main_cat_name; ?></h4>
                            <a class="btn btn-outline-primary btn-sm" href="<?php echo base_url(); ?>shop-category/<?php echo $cats->main_cat_slug; ?>">View Products</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- End Categories -->
            <?php else: ?>
            <h2 class="text-center">We do not have any category in stock yet!</h2>
            <?php endif; ?>
            <?php echo $pages; ?>
        </div>

    <!--load the side bar brand list-->
    <?php $this->load->view('sections/main/inc/product-brand-list'); ?>
    </div>
</div>