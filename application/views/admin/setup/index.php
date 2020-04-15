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
            <h4 class="page-title">Shop List Prefrences Setup</h4>
        </div>
    </div>
</div>
<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div id="info_fresh_cat"></div>
                <div class="card-title"><h4 class="text-center">New Created Main Categories</h4></div>
                <?php $fcu = ['id' => 'fcu'];
                echo form_open('admin/update_fresh_cat'.$fresh_categories->id, $fcu);
                ?>
                <div class="form-group">
                <label for="title_name">Display Name</label>
                <input type="text" name="fresh_cat_setup" value="<?php echo $fresh_categories->title_name; ?>" class="form-control" placeholder="Specify the name to be Visible" aria-describedby="helpId">
                </div>

                <div class="form-group">
                <label for="show_limit">Max Number Visible</label>
                <input type="number" name="fresh_cat_show_limit" value="<?php echo $fresh_categories->show_limit; ?>" class="form-control" placeholder="Maximum Limit" aria-describedby="helpId">
                </div>

                <div class="form-group">
                  <label for="access_id">Visibility</label>
                  <select class="form-control" name="fresh_cat_access_id" id="">
                    <option value="1" <?php if($fresh_categories->access_id == 1) echo "selected"; ?>>Visible</option>
                    <option value="0" <?php if($fresh_categories->access_id == 0) echo "selected"; ?>>Hidden</option>
                  </select>
                </div>

                <button type="submit" id="fresh_cat_btn" class="btn btn-outline-success btn-rounded btn-block waves-effect waves-light">Update Fresh Category Section</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>