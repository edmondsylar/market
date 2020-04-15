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
            <h4 class="page-title">Selected Featured Products</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <?php if($this->session->flashdata('rmv_featured')):
        echo $this->session->flashdata('rmv_featured');
        endif;
        ?>
        <?php if($featureds): ?>

        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>S/N</th>
                        <th>Product Price</th>
                        <th>Product Thumbs</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($featureds as $featured): ?>
                        <tr>
                            <td scope="row">#<?php echo $i++; ?></td>
                            <td><?php echo $website_info->website_currency_symbol; ?><?php echo $featured->product_price; ?></td>
                            <td><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $featured->product_show; ?>" width="70px" alt=""></td>
                            <td><a href="<?php echo base_url(); ?>admin/store/product-detail/<?php echo $featured->product_slug; ?>"><?php echo $featured->product_name; ?></a></td>
                            <td><?php echo $featured->main_cat_name; ?> » <?php echo $featured->sub_cat_name; ?></td>
                            <td><button type="button" class="btn btn-outline-danger btn-rounded btn-sm waves-effect waves-light" data-toggle="modal" data-target=".delete-product-<?php echo $featured->product_id; ?>">Remove</button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>

        <?php foreach($featureds as $modal_featured): ?>
        <div class="modal fade delete-product-<?php echo $modal_featured->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Are you sure you want To Remove From Featured Product?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center"><?php echo $modal_featured->product_name; ?></h3>
                </div>
                <?php echo form_open('admin/remove_featured/'.$modal_featured->fp_id); ?>
                <div class="modal-footer">
                    <button type="button" id="" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure?</button>
                    <button type="submit" id="" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Continue!</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
        <?php endforeach; ?>

        <?php else: ?>
        <div class="alert alert-warning" align="center">
            <h3 class="text-center">We do not have any Featured Files Yet. Please Provide One.</h3>
        </div>
        <?php endif; ?>
    </div>
</div>