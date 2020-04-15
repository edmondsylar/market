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
            <h4 class="page-title">Set up Customer Live Chat App</h4>
        </div>
    </div>
</div>     
<!-- end page title -->
<?php
if($this->session->flashdata('infos'))
{
    echo $this->session->flashdata('infos');
}
?>
<div class="card">
    <div class="card-body">
        <h4 class="text-center card-title">How to Set Up?</h4>
        <ol>
            <li>Vist <a href="http://tawk.to">WWW.TAWK.TO</a></li>
            <li>Create an account</li>
            <li>Select your language</li>
            <li>Provide your website linke and name</li>
            <li>Add addition admin if any</li>
            <li>Copy your wiget code and paste it in the box below</li>
        </ol>
        <hr>
        <?php echo form_open('admin/update_livechat'); ?>
        <div class="form-group">
          <label for="wiget">Wiget Code</label>
          <textarea class="form-control" name="code" rows="13"><?php echo $show_code->lc_code; ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Settings</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>