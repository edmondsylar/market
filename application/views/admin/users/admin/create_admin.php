<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Main</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Admins</li>
                </ol>
            </div>
            <h4 class="page-title">Create New Admin</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="card">
    <div class="card-body">
    <?php 
    $form_opt = ['id' => 'form_admin'];
    echo form_open_multipart('admin/new_admin', $form_opt);
    ?>
      <div class="row">
        <div class="col-md-3">
        <div class="mt-3">
            <input type="file" name="admin_profile_picture" class="dropify" data-default-file="<?php echo base_url(); ?>assets/avater/default.jpg"  />
            <p class="text-muted text-center mt-2 mb-0">User Display Picture</p>
        </div>
        </div>
        <div class="col-md-9">
          <div id="wait"></div>
          <div id="info"></div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="admin_username">Username</label>
                    <input type="text" name="admin_username" id="" class="form-control" placeholder="Admin Username" required>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                    <label for="admin_email">Email Address</label>
                    <input type="email" name="admin_email" id="" class="form-control" placeholder="Admin Email Address" required>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                    <label for="admin_firstname">Firstname</label>
                    <input type="text" name="admin_firstname" id="" class="form-control" placeholder="Admin Firstname" required>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                    <label for="admin_lastname">Lastname</label>
                    <input type="text" name="admin_lastname" id="" class="form-control" placeholder="Admin Lastname" required>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group">
                    <label for="user_country">Country</label>
                    <select class="form-control crs-country" name="user_country" id="country" data-region-id="one" required>
                    </select>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group">
                    <label for="user_region">Region</label>
                    <select class="form-control" name="user_region" id="one" required>
                    </select>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group">
                    <label for="user_gender">Gender</label>
                    <select class="form-control" name="user_gender" id="" required>
                      <option value="">Select Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="admin_password">Password</label>
                  <input type="password" class="form-control" name="admin_password" id="" placeholder="Create Password" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" id="" placeholder="Confirm Password" required>
                </div>
              </div>

              <div class="col-md-12">
                <button type="submit" id="new_admin" class="btn btn-outline-primary btn-block btn-rounded waves-effect waves-light">Create Account</button>
              </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
</div>

<!-- Use toater as notification -->

<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>