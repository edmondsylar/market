<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Contacts & Shipping Address</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Contacts & Shipping Address</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Contacts & Shipping Address -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
    <?php $this->load->view('sections/main/inc/profile-sidebar'); ?>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div id="my-account-wait"></div>
            <div id="my-account-info"></div>
            <h4>Contact Address</h4>
            <hr class="padding-bottom-1x">
            <?php
            $opts = ['id' => 'my-account-form', 'class' => 'row'];
            echo form_open('update-address', $opts);
            ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-company">Company</label>
                        <input class="form-control" type="text" id="account-company" name="cont_company" value="<?php echo $profile_info->cont_company; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-country">Country</label>
                        <select class="form-control gds-cr" name="cont_country" id="account-country" country-data-region-id="gds-cr-one" data-language="en" <?php if($profile_info->cont_country) echo 'country-data-default-value="'.$profile_info->cont_country .'"'; ?>></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-city">City</label>
                        <select class="form-control" name="cont_city" id="gds-cr-one" <?php if($profile_info->cont_city) echo 'region-data-default-value="'.$profile_info->cont_city .'"'; ?>></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-zip">ZIP Code</label>
                        <input class="form-control" type="number" name="cont_zip_code" value="<?php echo $profile_info->cont_zip_code; ?>" id="account-zip" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-address1">Address 1</label>
                        <input class="form-control" type="text" name="cont_address_1" value="<?php echo $profile_info->cont_address_1; ?>" id="account-address1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-address2">Address 2</label>
                        <input class="form-control" type="text" name="cont_address_2" value="<?php echo $profile_info->cont_address_2; ?>" id="account-address2">
                    </div>
                </div>
                <div class="col-12 padding-top-1x">
                    <h4>Shipping Address</h4>
                    <hr class="padding-bottom-1x">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-company">Company</label>
                            <input class="form-control" type="text" name="ship_company" id="account-company" value="<?php echo $profile_info->ship_company; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-country">Country</label>
                            <select class="form-control gds-cr" name="ship_country" id="account-country" country-data-region-id="gds-cr-two" data-language="en" <?php if($profile_info->ship_country) echo 'country-data-default-value="'.$profile_info->ship_country .'"'; ?>></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-city">City</label>
                            <select class="form-control" name="ship_state" id="gds-cr-two" <?php if($profile_info->ship_state) echo 'region-data-default-value="'.$profile_info->ship_state .'"'; ?>></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-zip">ZIP Code</label>
                            <input class="form-control" type="number" name="ship_zip_code" id="account-zip" value="<?php echo $profile_info->ship_zip_code; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-address1">Address 1</label>
                            <input class="form-control" type="text" name="ship_address_1" id="account-address1" value="<?php echo $profile_info->ship_address_1; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-address2">Address 2</label>
                            <input class="form-control" type="text" name="ship_address_2" value="<?php echo $profile_info->ship_address_2; ?>" id="account-address2">
                        </div>
                    </div>
                    </div>
                    <hr class="margin-top-1x margin-bottom-1x">
                    <div class="text-right">
                        <button class="btn btn-primary margin-bottom-none" type="submit" id='my-address-btn'>Save</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    </div>
    <!-- End Contacts & Shipping Address -->
<div id="show" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-message="Your profile has been updated successfuly."></div>
<div id="error" data-toast-icon="icon-circle-check" data-toast-title="Error!" data-toast data-toast-position="topRight" data-toast-type="danger" data-toast-message="Your profile is not updated!."></div>