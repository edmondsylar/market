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
            <h4 class="page-title">Products Sub-Categories</h4>
        </div>
    </div>
</div>

<button type="button" class="btn btn-outline-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">
<span class="btn-label">
<i class="mdi mdi-circle-edit-outline"></i>
</span>
Create New Sub-Category
</button>

<div class="card">
    <div class="card-body">
        <div id="show_sub_cat_stat"></div>
        <div id="count_sub_cat_stat"></div>

        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Category Name</th>
                        <th>Main Category</th>
                        <th>Status</th>
                        <th>Category Action</th>
                        <th>Remove Category</th>
                    </tr>
                    </thead>
                    <tbody id="list_all_sub_cat">
                        
                    </tbody>
            </table>
        </div>
        <?php echo $pages; ?>
    </div>
</div>



<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Create New Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="wait"></div>
                <div id="info"></div>
                <?php
                $sub_cat = ['id' => 'set_sub_cat'];
                echo form_open_multipart('admin/create_sub_category', $sub_cat);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="main_cat_name">Category Name:</label>
                        <input type="text" name="sub_cat_name" id="" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" max-length="50">
                        </div>
                    </div>

                    <?php if($this->uri->segment(4)): ?>
                    <input type="hidden" name="main_cat_id" value="<?php echo $selected; ?>">
                    <?php else: ?>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="main_cat_id">Main Category</label>
                          <select class="form-control" name="main_cat_id" id="" required>
                            <option value="">Select Option</option>
                            <?php if($select_main_cat): ?>
                            <?php foreach($select_main_cat as $select): ?>
                            <option value="<?php echo $select->id; ?>"><?php echo $select->main_cat_name; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-<?php if($this->uri->segment(4)): echo 12; else: echo 6; endif; ?>">
                        <div class="form-group">
                          <label for="status">Cateogry Status</label>
                          <select class="form-control" name="sub_cat_status" id="">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                          </select>
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


<!-- let edit out categories sections -->


<?php if($sub_cats): ?>
<?php foreach ($sub_cats as $sub_model_cat): ?>

<!--  Modal content for the above example -->
<div class="modal fade bs-edit-main-cat-modal-center<?php echo $sub_model_cat->sid; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Category: <?php echo $sub_model_cat->sub_cat_name; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="wait<?php echo $sub_model_cat->sid; ?>"></div>
                <div id="info<?php echo $sub_model_cat->sid; ?>"></div>
                <?php
                $edit_sub_cat = ['id' => 'edit_sub_cat'.$sub_model_cat->sid];
                echo form_open_multipart('admin/update_sub_category/'.$sub_model_cat->sid, $edit_sub_cat);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="main_cat_name">Category Name:</label>
                        <input type="text" name="sub_cat_name" value="<?php echo $sub_model_cat->sub_cat_name; ?>" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" max-length="50">
                        </div>
                    </div>

                    <?php if($this->uri->segment(4)): ?>
                    <input type="hidden" name="main_cat_id" value="<?php echo $sub_model_cat->main_cat_id; ?>">
                    <?php else: ?>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="main_cat_id">Main Category</label>
                          <select class="form-control" name="main_cat_id" id="" required>
                            <option value="">Select Option</option>
                            <?php if($select_main_cat): ?>
                            <?php foreach($select_main_cat as $select): ?>
                            <option value="<?php echo $select->id; ?>" <?php if($select->id == $sub_model_cat->main_cat_id) echo "selected"; ?>><?php echo $select->main_cat_name; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-<?php if($this->uri->segment(4)): echo 12; else: echo 6; endif; ?>">
                        <div class="form-group">
                          <label for="status">Cateogry Status</label>
                          <select class="form-control" name="sub_cat_status" id="">
                            <option value="">Select Status</option>
                            <option value="1" <?php if($sub_model_cat->sub_cat_status == 1) echo "selected"; ?>>Active</option>
                            <option value="0" <?php if($sub_model_cat->sub_cat_status == 0) echo "selected"; ?>>Not Active</option>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit-no-btn<?php echo $sub_model_cat->sid; ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Close</button>
                <button type="submit" id="edit-parent-cat-btn<?php echo $sub_model_cat->sid; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Update Category</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- deleting confirmation -->
<div class="modal fade bs-delete-modal-center<?php echo $sub_model_cat->sid; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <?php
        $del_cat_modal = ['id' => 'del_sub_cat_modal'.$sub_model_cat->sid];
        echo form_open_multipart('admin/delete_sub_category/'.$sub_model_cat->sid, $del_cat_modal);
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Are you sure you want to delete <font color="red"><?php echo $sub_model_cat->sub_cat_name; ?></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <center><font color="red"><b>Note:</b></font><b></b> Please take not that if you Delete this Category it will erase all the Product created under it.</center>
            </div>
            <div class="modal-footer">
            <button type="button" id="del-no-btn<?php echo $sub_model_cat->sid; ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure?</button>
            <button type="submit" id="del-parent-cat-btn<?php echo $sub_model_cat->sid; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Yes Delete</button>
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