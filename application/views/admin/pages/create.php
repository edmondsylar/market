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
            <h4 class="page-title">Create New Custorm Pages</h4>
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
    <div class="card-title"><h3 class="text-center">Customize your new Page</h3></div>
    <div class="card-body">
        <?php echo form_open('admin/create_new_page'); ?>
        <div class="form-group">
          <label for="page_title">Page Title</label>
          <input type="text" name="page_title" class="form-control" placeholder="$nter The Page Title" maxlenght="50">
        </div>
        <div class="form-group">
          <label for="">Html Only</label>
          <textarea class="form-control" name="page_content" id="product-description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-info btn-block waves-effect waves-light">Create New Page</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>