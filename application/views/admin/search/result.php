<?php if($results): ?>
<div class="row">

        <?php foreach($results as $product): ?>
        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                    <a href="<?php echo base_url(); ?>admin/store/product-detail/<?php echo $product->product_slug; ?>" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Full Details"><i class="mdi mdi-eye"></i></a>
                    <a href="<?php echo base_url(); ?>admin/store/edit-product/<?php echo $product->product_slug; ?>" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0);" id="add_feat<?php echo $product->product_id; ?>" class="btn btn-warning btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Add To Featured Product"><i class="mdi mdi-cards-heart"></i></a>
                    <a href="javascript: void(0);" data-toggle="modal" data-target=".delete-product-<?php echo $product->product_id; ?>" class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Remove From Store"><i class="mdi mdi-close"></i></a>
                </div>

                <div>
                    <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product->product_show; ?>" class="img-fluid" alt="<?php echo $product->product_name; ?>" />
                </div>

                <div class="product-info">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"><?php echo $product->product_name; ?></a> </h5>
                            <h5 class="m-0"> <span class="text-muted"> Brand : <font color="blue"><?php echo $product->brand_name; ?></font></span></h5>
                        </div>
                        <div class="col-auto">
                            <div class="product-price-tag">
                                <?php echo $website_info->website_currency_symbol; ?><?php echo $product->product_price; ?>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end product info-->
            </div> <!-- end card-box-->
        </div> <!-- end col-->

        <!-- Deleting section -->

        <div class="modal fade delete-product-<?php echo $product->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myCenterModalLabel">Are you sure you want To Remove From Store?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center"><?php echo $product->product_name; ?></h3>
                    </div>
                    <?php echo form_open('admin/delete_product/'.$product->product_id); ?>
                    <div class="modal-footer">
                        <button type="button" id="" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure?</button>
                        <button type="submit" id="" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Continue!</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php endforeach; ?>

        


    </div>
    <!-- end row-->

<?php else: ?>
<div class="card-body"><h4 class="text-center">No Result Found For "<?php echo $searching; ?>"</h4></div>
<?php endif; ?>