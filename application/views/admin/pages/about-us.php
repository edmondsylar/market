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
            <h4 class="page-title">About Us Page</h4>
        </div>
    </div>
</div>
<?php
if($this->session->flashdata('error'))
{
    echo $this->session->flashdata('error');
}
?>
<div class="card">
    <div class="card-title"><h3 class="text-center">Customize your About us Page</h3></div>
    <div class="card-body">
        <?php echo form_open('admin/update_about_us'); ?>
        <div class="form-group">
          <label for="">Html Only</label>
          <textarea class="form-control" name="about_us" id="product-description" rows="3"><?php echo $about_us; ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-info btn-block waves-effect waves-light">Update Page</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>