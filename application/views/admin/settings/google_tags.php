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
            <h4 class="page-title">Set Up Your Google Meta Tags</h4>
        </div>
    </div>
</div>

<?php
if($this->session->flashdata('gt_info'))
{
    echo $this->session->flashdata('gt_info');
}
?>
<div class="card">
    <div class="card-body">
        <?php echo form_open('admin/update_google_tags'); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title text-center">Google Meta Tags Verification Code</h4>
                    <div class="card-body">
                        <div class="form-group">
                          <input type="text" name="google_meta_tags" value="<?php echo $gt->gt_meta_tags; ?>" class="form-control" placeholder="Place only the verification code e.g (goog-verification-xxxxxxx)">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title text-center">Google Analytics Verification Code</h4>
                    <div class="card-body">
                        <div class="form-group">
                          <input type="text" name="google_analystics" value="<?php echo $gt->gt_analytics; ?>" class="form-control" placeholder="Place only the verification code e.g (UA-XXXXX-Y)">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                          <button type="submit" class="btn btn-outline-info btn-block btn-rounded waves-effects waves-effect-light">Update Google Tags</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php echo form_close(); ?>
    </div>
</div>