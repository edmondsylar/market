<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Main</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Customer</li>
                </ol>
            </div>
            <h4 class="page-title">Welcome New Customer</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="card">
    <div class="card-title">
        <h3 class="text-center">Create New Customer Account</h3>
    </div>
    <div class="card-body">
    <?php 
        $ca_opt = ['id' => 'ca_id'];
        echo form_open('create', $ca_opt); 
    ?>
    <div id="info"></div>
    <div id="wait"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_firstname">Customer First Name</label>
                  <input type="text" name="ca_firstname" id="" class="form-control" placeholder="Enter Firstname" autofocus="on" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_lastname">Customer Last Name</label>
                  <input type="text" name="ca_lastname" id="" class="form-control" placeholder="Enter Last Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_email">Customer Email Address</label>
                  <input type="email" name="ca_email" id="" class="form-control" placeholder="Enter Email Address" reqired>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_username">Customer Username</label>
                  <input type="text" name="ca_username" id="" class="form-control" placeholder="Enter Username" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_password">Customer Password</label>
                  <input type="password" name="ca_password" id="" class="form-control" placeholder="Enter Password" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="ca_password2">Confirm Password</label>
                  <input type="password" name="ca_password2" id="" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" id="new-cus" name="submit" id="" class="btn btn-outline-primary btn-rounded waves-effect waves-light btn-block">Create New Accont</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
