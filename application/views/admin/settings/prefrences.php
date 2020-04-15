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
            <h4 class="page-title">Webiste Prefrences</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<!-- Let start the form section -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Set up Website</h4>
                <?php
                if($this->session->flashdata('error')):
                    echo $this->session->flashdata('error');
                endif; 
                ?>

                <?php if($this->session->flashdata('setttings', 'updated')): ?>
                <div class="alert alert-success" role="alert" align="center">
                    <i class="mdi mdi-check-all mr-2"></i> Your <strong>Settings</strong> is been updated Successfully!
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="card col-lg-6">
                        <div class="header-title text-center">
                            Website Infomations (S.E.O)
                        </div>
                        <?php echo form_open('admin/updated_settings_1'); ?>

                        <div class="form-group mb-3">
                        <label for="website_name">Website Name</label>
                        <input type="text" name="website_name" value="<?php echo $get_pref_values->website_name; ?>" class="form-control" placeholder="Enter website name">
                        </div>

                        <div class="form-group mb-3">
                        <label for="website_title">Website Title</label>
                        <input type="text" name="website_title" value="<?php echo $get_pref_values->website_title; ?>" class="form-control" placeholder="Enter website title">
                        </div>

                        <div class="form-group mb-3">
                        <label for="website_description">Website Description</label>
                        <textarea class="form-control" name="website_description" rows="3"><?php echo $get_pref_values->website_description; ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                        <label for="website_keyword">Website Deyword</label>
                        <textarea class="form-control" name="website_keyword" rows="3"><?php echo $get_pref_values->website_keyword; ?></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-outline-info btn-block btn-rounded waves-effect waves-light">Update Settings</button>

                        <?php echo form_close(); ?>
                    </div>

                    <div class="card col-lg-6">
                        <div class="header-title text-center">
                            Website Color and Logos
                        </div>
                        <?php echo form_open_multipart('admin/updated_settings_2'); ?>

                        <div class="form-group">
                          <label for="website_logo">Website Logo</label>
                          <input type="file" class="form-control" name="website_logo" id="" placeholder="Upload Webiste Logo" aria-describedby="fileHelpId">
                        </div>

                        <div class="form-group">
                          <label for="website_favicon">Website Favicon</label>
                          <input type="file" class="form-control" name="website_favicon" id="" placeholder="Upload Website Favicon" aria-describedby="fileHelpId">
                        </div>

                        <div class="form-group">
                          <label for="website_currency">Webiste Currency</label>
                          <select class="form-control" name="website_currency" id="" required>
                            <option value="<?php echo $get_pref_values->website_currency; ?>">Select Your Currency</option>
                            <option value="USD">$ USD</option>
                            <option value="EUR">€ EUR</option>
                            <option value="UKP">£ UKP</option>
                            <option value="JPY">¥ JPY</option>
                            <option value="NGN">₦ NGN</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="webiste_status">Maintenance Mode</label>
                          <select class="form-control" name="website_status">
                            <option value="<?php echo $get_pref_values->website_currency; ?>">Select Option</option>
                            <option value="1" <?php if($get_pref_values->website_status == 1) echo " selected"; ?>>On</option>
                            <option value="0" <?php if($get_pref_values->website_status == 0) echo " selected"; ?>>Off</option>
                          </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="website_color">Website Color</label>
                            <input class="form-control" name="website_color" id="example-color" type="color" value="<?php echo $get_pref_values->website_color; ?>">
                        </div>

                        <button type="submit" class="btn btn-outline-success waves-effect vaves-light btn-block btn-rounded">Update Settings</button>
                        <?php echo form_close(); ?>
                    </div>

                    <div class="card col-lg-6">
                        <div class="header-title text-center">
                            Company Address Infomation
                        </div>

                        <?php echo form_open('admin/update_settings_3'); ?>

                        <div class="form-group">
                          <label for="website_email">Company Email</label>
                          <input type="email" name="website_email" value="<?php echo $get_pref_values->website_email; ?>" class="form-control" placeholder="Company Email Address">
                        </div>

                        <div class="form-group">
                          <label for="website_address">Website Address</label>
                          <input type="text" name="website_address" value="<?php echo $get_pref_values->website_address; ?>" class="form-control" placeholder="Company Address">
                        </div>

                        <div class="form-group">
                          <label for="website_number">Website_number</label>
                          <input type="text" name="website_number" value="<?php echo $get_pref_values->website_number; ?>" class="form-control" placeholder="Comapany Phone Number">
                        </div>

                        <button type="submit" name="submit" class="btn btn-outline-primary btn-block btn-rounded waves-effect waves-light">Update Company Info</button>
                        <?php echo form_close(); ?>
                    </div>

                    <div class="card col-lg-6">
                        <div class="header-title text-center">
                            Social Links
                        </div>

                        <?php echo form_open('admin/update_settings_4'); ?>

                        <div class="form-group">
                          <label for="website_facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</label>
                          <input type="url" name="website_facebook" value="<?php echo $get_pref_values->website_facebook; ?>" class="form-control" placeholder="http://facebook.com/company">
                        </div>

                        <div class="form-group">
                          <label for="website_twitter"><i class="fab fa-twitter    "></i> Twitter</label>
                          <input type="url" name="website_twitter" value="<?php echo $get_pref_values->website_twitter; ?>" class="form-control" placeholder="http://twitter.com/company">
                        </div>

                        <div class="form-group">
                          <label for="website_instagram"><i class="fab fa-instagram    "></i> Instagram</label>
                          <input type="url" name="website_instagram" value="<?php echo $get_pref_values->website_instagram; ?>" class="form-control" placeholder="http://instagram.com/company">
                        </div>

                        <button type="submit" name="submit" class="btn btn-outline-primary btn-block btn-rounded waves-effect waves-light">Update Social Networks</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>