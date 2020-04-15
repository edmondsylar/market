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
            <h4 class="page-title">What We Have In Store</h4>
        </div>
    </div>
</div>
<style>
#s_find { display:none;}
</style>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <?php echo form_open('search', ['class' => 'form-inline', 'id' => 'let_find']); ?>
                        <div class="form-group">
                            <label for="find-product" class="sr-only">Search</label>
                            <input type="text" name="find-product" class="form-control" id="find-product" placeholder="Search...">
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <a name="" id="" class="btn btn-secondary waves-effect waves-light mr-1" href="<?php echo base_url(); ?>admin/store/featured-product" role="button"><i class="mdi mdi-cards-heart"></i></a>
                        <a href="<?php echo base_url(); ?>admin/store/add-product" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row-->

<?php
if($this->session->flashdata('product_updated')):
    echo $this->session->flashdata('product_updated');
endif;
?>


<?php if($admin_product_lists): ?>

<div id="s_all">
    <div class="row">

        <?php foreach($admin_product_lists as $product): ?>
        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                    <a href="<?php echo base_url(); ?>admin/store/product-detail/<?php echo $product->product_slug; ?>" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Full Details"><i class="mdi mdi-eye"></i></a>
                    <a href="<?php echo base_url(); ?>admin/store/edit-product/<?php echo $product->product_slug; ?>" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0);" id="add_feat<?php echo $product->product_id; ?>" class="btn btn-warning btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Add To Featured Product"><i class="mdi mdi-cards-heart"></i></a>
                    <a href="javascript: void(0);" data-toggle="modal" data-target=".delete-product-<?php echo $product->product_id; ?>" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                </div>

                <div>
                    <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $product->product_show; ?>" class="img-fluid" alt="<?php echo $product->product_name; ?>" />
                </div>

                <div class="product-info">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"><?php echo $product->product_name; ?></a> </h5>
                            <!-- <div class="text-warning mb-2 font-13">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div> -->
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
    <div class="alert alert-warning" align="center"><h2><strong>Sorry!</strong> it look like our store is empty.</h2></div>

    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <?php echo $pages; ?>
        </div> <!-- end col-->
    </div>
    <!-- end row-->
</div>

<div id="s_find">
    <div id="returnSearch"></div>
</div>

<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>

<!-- Warning show up -->
<div id="toastr-two"></div>

<div id="added"></div>