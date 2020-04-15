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
            <h4 class="page-title">Products Brands</h4>
        </div>
    </div>
</div>

<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>

<?php $brand_opt = ['id' => 'create_brand']; ?>
<?php echo form_open('admin/create_new_brand', $brand_opt); ?>
<div class="row">
    <div class="col-md-4 col-8">
        <div class="form-group">
          <input type="text" name="brand_name" id="" class="form-control" placeholder="Add New Brand" autocomplete="off">
          <span id="info"></span>
        </div>
    </div>

    <div class="col-md-2 col-4">
        <div class="form-group">
          <button type="submit" id="new-brand-btn" class="btn btn-outline-primary">Create New</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<div class="card">
    <div class="card-body">
        <div class="card-title"><h4 class="text-center">Avaliable Brands</h4></div>
        <div id="list_all_brands_stat"></div>
        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Brand Name</th>
                        <th>Brand Status</th>
                        <th>Products</th>
                        <th>Action</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody id="list_all_brands">
                    </tbody>
            </table>
        </div>
        <?php echo $pages; ?>
    </div>
</div>

<?php if($brand_lists): ?>
<?php foreach($brand_lists as $brand_modal): ?>
<!-- editing section -->
<div class="modal fade bs-example-modal-center<?php echo $brand_modal->brand_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Brand: <?php echo $brand_modal->brand_name; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?php
            $edit_brand_opt = ['id' => 'edit_brand'. $brand_modal->brand_id];
            echo form_open('admin/update_brand', $edit_brand_opt);
            ?>
            <div class="modal-body">
                <div id="edit_info<?php echo $brand_modal->brand_id; ?>"></div>
                <div id="edit_wait<?php echo $brand_modal->brand_id; ?>"></div>
                <div class="form-group">
                  <label for="brand_name">Brand Name</label>
                  <input type="text" name="brand_name" value="<?php echo $brand_modal->brand_name; ?>" class="form-control" placeholder="Brand Name">
                </div>

                <div class="form-group">
                  <label for="brand_status">Brand Status</label>
                  <select class="form-control" name="brand_status" id="">
                    <option value="1" <?php if($brand_modal->brand_status == 1) echo "selected"; ?>>Active</option>
                    <option value="0" <?php if($brand_modal->brand_status == 0) echo "selected"; ?>>Not Active</option>
                  </select>
                </div>

                <div class="modal-footer">
                    <button type="button" id="edit-no-btn<?php echo $brand_modal->brand_id ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Close</button>
                    <button type="submit" id="edit-brand-btn<?php echo $brand_modal->brand_id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Update Brand</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- deleting -->
<div class="modal fade bs-example-modal-sm<?php echo $brand_modal->brand_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="del_info<?php echo $brand_modal->brand_id; ?>"></div>
                <center><b>Are you Sure You Want Delete?</b></center>
            </div>
            <div class="modal-footer">
                <?php
                $del_brand_opt = ['id' => 'del_brand'. $brand_modal->brand_id];
                echo form_open('admin/delete_brand', $del_brand_opt);
                ?>
                <button type="button" id="del-no-btn<?php echo $brand_modal->brand_id ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure</button>
                <button type="submit" id="del-brand-btn<?php echo $brand_modal->brand_id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Confirm</button>
                <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php endforeach; ?>
<?php endif; ?>