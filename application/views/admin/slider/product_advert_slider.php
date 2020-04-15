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
            <h4 class="page-title">Home Product Slider Show</h4>
        </div>
    </div>
</div>

<a name="" id="" class="btn btn-outline-primary btn-rounded waves-effect waves-light" href="javascript:void(0)" role="button" data-toggle="modal" data-target=".bs-create-slider">Create New Slider</a>


<div class="card">
    <div class="card-body">
        <div id="loadSliderView"></div>
    </div>
</div>




<div class="modal fade bs-create-slider" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Create A New Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?php $opt = ['id' => 'new_product_slider']; ?>
                <?php echo form_open('admin/new_product_slider', $opt); ?>
                <div id="info"></div>
                <div id="wait"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Slider Description</label>
                          <input type="text" name="psa_description" id="" class="form-control" placeholder="Slider Description" autocomplete="off" required>
                          <small id="helpId" class="text-muted"><font color="red">Maximun characters allowed is 50</font></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Text On Button</label>
                          <input type="text" name="psa_button_text" id="" class="form-control" placeholder="Text on Button" autocomplete="off" required>
                          <small id="helpId" class="text-muted"><font color="red">Maximum characters allow is 10</font></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Url Link</label>
                          <input type="url" name="psa_link" id="" class="form-control" placeholder="Url Links" autocomplete="off">
                          <small id="helpId" class="text-muted"><font color="blue">Link to proceed to (Optional)</font></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Slider Image</label>
                          <input type="file" name="psa_image" id="" class="form-control">
                          <small id="helpId" class="text-muted"><font color="blue">Max width: 555 Max height: 440</font></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="new-slider-btn" class="btn btn-outline-success btn-block waves-effect waves-light">Create New Slider</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>