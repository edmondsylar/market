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
            <h4 class="page-title">Change Password Notification Prefrence</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-title">
    <h3 class="text-center">Present your email</h3>
    <p class="text-center">This field require a basic html knowledge to design you preferd email template. You can also get free email templates from external resources. <br>
    <b>Note:</b> Do no broken the Specific tags written with { and } form example {user_firstname} carries the username of the custormer <b> <a href="<?php echo base_url(); ?>admin/email_template/email-tags"> Click here </a></b> to acess more of the the availabe user tags. <br>
    <strong><font color="red">Only HTML tags is allowed!</font></strong></p>
    </div>
    <div class="card-body">
        <?php
        if($this->session->flashdata('info')):
            echo $this->session->flashdata('info');
        endif;
        ?>
        <?php echo form_open('admin/set_cpn_email'); ?>
        <textarea name="mail_body" id="code" cols="30" rows="10"><?php echo $get_cpn_temps->mail_body; ?></textarea>
        <br>
        <center><button type="submit" name="submit" class="btn btn-secondary">Save Editing</button></center>
        <?php echo form_close(); ?>
    </div>
</div>