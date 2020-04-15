<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Account Activation</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Activate Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="container padding-top-1x padding-bottom-3x">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <h2>Activate your Account</h2>
            <p>We have send an email containig your activation code to <b><?php echo $user_to_verify->ca_email; ?></b></p>
            <ol class="list-unstyled">
                <li><span class="text-primary text-medium">1. </span>Check your Mail Box</li>
                <li><span class="text-primary text-medium">2. </span>Copy the activation code</li>
                <li><span class="text-primary text-medium">3. </span>Paset the activation code in the field below and click activate button</li>
            </ol>
            <?php 
            $v_opt = ['id' => 'v_id', 'class' => 'card mt-4'];
            echo form_open('account-verify', $v_opt);
            ?>
            <div id="v-info"></div>
            <div id="v-wait"></div>
                <div class="card-body">
                    <input type="hidden" name="user" value="<?php echo $this->uri->segment(2); ?>">
                    <div class="form-group">
                        <input class="form-control" name="activate" type="text" id="email-for-pass" placeholder="Enter your Your Activation Code" autocomplete="off" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="v-button" type="submit">Activate My Account</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
