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
            <h4 class="page-title">Products Categories</h4>
        </div>
    </div>
</div>
<button type="button" class="btn btn-outline-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">
<span class="btn-label">
<i class="mdi mdi-circle-edit-outline"></i>
</span>
Create New Category
</button>

<div class="card">
    <div class="card-body">
        <div id="show_cat_stat"></div>

        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Preview</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Sub Cats</th>
                        <th>Action Zone</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody id="list_all_main_cat">
                    </tbody>
            </table>
        </div>
        <?php echo $pages; ?>
    </div>
</div>




<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create New Main Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="wait"></div>
                <div id="info"></div>
                <?php
                $main_cat = ['id' => 'set_main_cat'];
                echo form_open_multipart('admin/create_main_category', $main_cat);
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="main_cat_name">Category Name:</label>
                        <input type="text" name="main_cat_name" id="" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" max-length="50">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="status">Cateogry Status</label>
                          <select class="form-control" name="status" id="">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="previews">Category Previews</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview1" class="dropify" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" required />
                                <p class="text-muted text-center mt-2 mb-0">Required</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview2" class="dropify" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" />
                                <p class="text-muted text-center mt-2 mb-0">Sub Preview</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview3" class="dropify" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" />
                                <p class="text-muted text-center mt-2 mb-0">Sub Preview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="no-btn" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Close</button>
                <button type="submit" id="create-parent-cat-btn" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Create Category</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- let edit our category content-->
<?php if($get_cat_lists): ?>
<?php foreach($get_cat_lists as $cat_modal): ?>
<!--  Modal content for the above example -->
<div class="modal fade bs-edit-main-cat-modal-lg<?php echo $cat_modal->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Let Edit Main Category(<?php echo $cat_modal->main_cat_name; ?>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="wait<?php echo $cat_modal->id; ?>"></div>
                <div id="info<?php echo $cat_modal->id; ?>"></div>
                <?php
                $main_cat_modal = ['id' => 'set_main_cat_modal'.$cat_modal->id];
                echo form_open_multipart('admin/create_main_category', $main_cat_modal);
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="main_cat_name">Category Name:</label>
                        <input type="text" name="main_cat_name" value="<?php echo $cat_modal->main_cat_name; ?>" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" max-length="50">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="status">Cateogry Status</label>
                          <select class="form-control" name="status" id="">
                            <option value="<?php echo $cat_modal->status; ?>"">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                          </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="previews">Category Previews</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview1" class="dropify" data-default-file="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cat_modal->main_cat_preview1 ? $cat_modal->main_cat_preview1 : 'none.png'; ?>" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" />
                                <p class="text-muted text-center mt-2 mb-0">Required</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview2" class="dropify" data-default-file="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cat_modal->main_cat_preview2 ? $cat_modal->main_cat_preview2 : 'none.png'; ?>" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" />
                                <p class="text-muted text-center mt-2 mb-0">Sub Preview</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mt-3">
                                <input type="file" name="main_cat_preview3" class="dropify" data-default-file="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cat_modal->main_cat_preview3 ? $cat_modal->main_cat_preview3 : 'none.png'; ?>" data-max-file-size="3M" accept="image/jpg, image/jpeg, image/x-png" />
                                <p class="text-muted text-center mt-2 mb-0">Sub Preview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="no-btn<?php echo $cat_modal->id; ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Close</button>
                <button type="submit" id="edit-parent-cat-btn<?php echo $cat_modal->id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Update Category</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- deleting confirmation -->
<div class="modal fade bs-delete-modal-center<?php echo $cat_modal->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <?php
        $del_cat_modal = ['id' => 'del_main_cat_modal'.$cat_modal->id];
        echo form_open_multipart('admin/delete_main_category/'.$cat_modal->id, $del_cat_modal);
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Are you sure you want to delete <font color="red"><?php echo $cat_modal->main_cat_name; ?></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <center><font color="red"><b>Note:</b></font><b></b> Please take note that if you Delete this Category it will erase all sub categories under it and all the Product in that sub category.</center>
            </div>
            <div class="modal-footer">
            <button type="button" id="del-no-btn<?php echo $cat_modal->id; ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure?</button>
            <button type="submit" id="del-parent-cat-btn<?php echo $cat_modal->id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Yes Delete</button>
            </div>
        </div><!-- /.modal-content -->
        <?php echo form_close(); ?>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php endforeach; ?>
<?php endif; ?>


<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>