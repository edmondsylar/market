<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="<?php echo base_url(); ?>" class="btn btn-blue btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Return Home">
                    <i class="mdi mdi-home"></i>
                </a>
                <a href="<?php echo base_url(); ?>admin" class="btn btn-blue btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
            </div>
            <h4 class="page-title">Product Details For : <?php echo $product_detail->product_name; ?></h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-xl-5">

                    <div class="tab-content pt-0">
                        <div class="tab-pane active show" id="product-1-item">
                            <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product_detail->product_show; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <?php if($product_previews): ?>
                        <?php $i = 2; ?>
                        <?php foreach ($product_previews as $preview): ?>
                        <div class="tab-pane" id="product-<?php echo $i++; ?>-item">
                            <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $preview->product_preview_name; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a href="#product-1-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb active show">
                                <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product_detail->product_show; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                        <?php if($product_previews): ?>
                        <?php $i = 2; ?>
                        <?php foreach ($product_previews as $preview): ?>
                        <li class="nav-item">
                            <a href="#product-<?php echo $i++; ?>-item" data-toggle="tab" aria-expanded="true" class="nav-link product-thumb">
                                <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $preview->product_preview_name; ?>" alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div> <!-- end col -->
                <div class="col-xl-7">
                    <div class="pl-xl-3 mt-3 mt-xl-0">
                        <a href="#" class="text-primary"><?php echo $main_cat->main_cat_name; ?></a> / 
                        <a href="#" class="text-primary"><?php echo $product_detail->sub_cat_name; ?></a> / 
                        <a href="#" class="text-primary"><?php echo $product_detail->brand_name; ?></a>
                        <h4 class="mb-3"><?php echo $product_detail->product_name; ?></h4>
                        <p class="mb-4"><a href="#" class="text-muted">( 36 Customer Reviews )</a></p>
                        <h4 class="mb-4">Price : <b><?php echo $website_info->website_currency_symbol; ?> <?php echo $product_detail->product_price; ?></b></h4>
                        <?php if($product_detail->product_status == 1): ?>
                        <h4><span class="badge bg-soft-success text-success mb-4">Instock</span></h4>
                        <?php else: ?>
                        <h4><span class="badge bg-soft-danger text-success mb-4">Out of stock</span></h4>
                        <?php endif; ?>
                        <p class="text-muted mb-4"><?php echo $product_detail->product_description; ?></p>

                        <div>
                            <a name="" id="" class="btn btn-info" href="#" role="button">Edit Product</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Delete Product</a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->