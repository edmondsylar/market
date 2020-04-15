<?php if($set_fresh_cat): ?>
<?php if($top_cats): ?>
<section class="container padding-top-3x">
        <h3 class="text-center mb-30"><?php echo $set_fresh_cat->title_name; ?></h3>
        <div class="row">
            <?php foreach($top_cats as $top_cat): ?>
            <div class="col-md-4 col-sm-6 home-cat">
                <div class="card">
                    <a class="card-img-tiles" href="<?php echo base_url(); ?>shop-category/<?php echo $top_cat->main_cat_slug; ?>">
                        <div class="inner">
                            <div class="main-img">
                                <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $top_cat->main_cat_preview1; ?>" alt="Category">
                            </div>
                            <div class="thumblist">
                                <?php if($top_cat->main_cat_preview2 != NULL): ?>
                                <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $top_cat->main_cat_preview2; ?>" alt="Category">
                                <?php endif; ?>

                                <?php if($top_cat->main_cat_preview3 != NULL): ?>
                                <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $top_cat->main_cat_preview3; ?>" alt="Category">
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo $top_cat->main_cat_name; ?></h4>
                        <a class="btn btn-outline-primary btn-sm" href="<?php echo base_url(); ?>shop-category/<?php echo $top_cat->main_cat_slug; ?>">View Products</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>