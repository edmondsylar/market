<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1><?php echo ucfirst(strtolower($cus_user)); ?>'s Profile</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>My Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start My Profile -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
        <?php $this->load->view('sections/main/inc/profile-sidebar'); ?>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div id="profile-wait"></div>
            <div id="profile-info"></div>
            <?php
                $opt = ['id' => 'profile-edit'];
                echo form_open('profile', $opt);
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" name="ca_firstname" id="account-fn" value="<?php echo $profile_info->ca_firstname; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" name="ca_lastname" id="account-ln" value="<?php echo $profile_info->ca_lastname; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-Mail Address</label>
                        <input class="form-control" type="email" name="ca_email" id="account-email" value="<?php echo $profile_info->ca_email; ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" name="cu_account_phone" id="account-phone" value="<?php echo $profile_info->cu_account_phone; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Country</label>
                        <select name="cu_country" class="form-control gds-cr" country-data-region-id="gds-cr-one" data-language="en" <?php if($profile_info->cu_country) echo 'country-data-default-value="'.$profile_info->cu_country .'"'; ?> required></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Region</label>
                        <select name="cu_region" class="form-control" id="gds-cr-one" <?php if($profile_info->cu_region) echo 'region-data-default-value="'.$profile_info->cu_region .'"'; ?> required></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input class="form-control" type="password" name="ca_password" id="account-pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input class="form-control" type="password" name="con_pass" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox d-block">
                            <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
                            <label class="custom-control-label" for="subscribe_me">Subscribe Me To Newsletter</label>
                        </div>
                        <button class="btn btn-primary margin-right-none" type="submit" id="profile-btn">Save</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php $uopt = ['id' => 'pro-img']; ?>
<?php echo form_open_multipart('upload-profile-picture', $uopt); ?>
<input type="file" name="cu_account_profile_pic" id="input-photo" style="display:none;" accept="image/*">
<?php echo form_close(); ?>
<!-- End My Profile -->
<div id="show" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-message="Your profile has been updated successfuly."></div>
<div id="error" data-toast-icon="icon-circle-check" data-toast-title="Error!" data-toast data-toast-position="topRight" data-toast-type="danger" data-toast-message="Your profile is not updated!."></div>