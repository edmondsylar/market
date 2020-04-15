<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Main</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            <h4 class="page-title">Value Added Tax (VAT)</h4>
        </div>
    </div>
</div>     
<!-- end page title -->
<?php
if($this->session->flashdata('vat')):
    echo $this->session->flashdata('vat');
endif;
?>
<div class="card">
    <div class="card-title"><h4 class="text-center">Set your Tax Value</h4></div>
    <div class="card-body">
        <?php echo form_open('admin/update_vat'); ?>
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                  <input type="number" name="shop_tax" value="<?php echo $vat; ?>" class="form-control" placeholder="Tax to be charge">
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-outline-secondary btn-block">Set Tax</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>