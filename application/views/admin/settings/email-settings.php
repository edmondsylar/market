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
            <h4 class="page-title">Email Settings</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="card">
    <div class="card-title">
        <h3 class="text-center">Set up Email System</h3>
        <br>
        <p class="text-center">Please use a valid SMTP credential here or else our email sending system will always fail to send email to our customers and user. On instruction how to get your valid smtp details please click here.</p>
    </div>

    <div class="card-body">
    <?php if($this->session->flashdata('error')):
        echo $this->session->flashdata('error');
    endif;
    ?>
        <?php echo form_open('admin/update_smtp_settings'); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="smtp_default_email">Default Email Address</label>
                  <input type="email" name="smtp_default_email" value="<?php echo $get_smtp_settings->smtp_default_email; ?>" id="" class="form-control" placeholder="Default sender email address" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label for="smtp_display_name">Display Name</label>
                  <input type="text" name="smtp_display_name" value="<?php echo $get_smtp_settings->smtp_display_name; ?>" id="" class="form-control" placeholder="Display Sender Name" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label for="smtp_type">SMTP Protocol</label>
                  <select class="form-control" name="smtp_type" id="">
                    <option value="tls" <?php if($get_smtp_settings->smtp_type == 'tls') echo 'selected'; ?>>TLS</option>
                    <option value="ssl" <?php if($get_smtp_settings->smtp_type == 'ssl') echo 'selected'; ?>>SSL</option>
                  </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="smtp_host">SMTP Host</label>
                  <input type="text" name="smtp_host" value="<?php echo $get_smtp_settings->smtp_host; ?>" id="" class="form-control" placeholder="Valid Host" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="smtp_username">SMTP Username</label>
                  <input type="text" name="smtp_username" value="<?php echo $get_smtp_settings->smtp_username; ?>" id="" class="form-control" placeholder="Valid Username" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="smtp_password">SMTP Password</label>
                  <input type="password" name="smtp_password" value="<?php echo $get_smtp_settings->smtp_password; ?>" id="" class="form-control" placeholder="Valid Password" reqired>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="smtp_port">SMTP Port</label>
                  <input type="number" name="smtp_port" value="<?php echo $get_smtp_settings->smtp_port; ?>" id="" class="form-control" placeholder="e.g 465, 25, 586">
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" name="submit" id="" class="btn btn-secondary btn-rounded btn-block">Save Settings</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>