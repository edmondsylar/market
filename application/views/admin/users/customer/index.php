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
            <h4 class="page-title">Customers Account</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="card">
    <div class="card-body">
    <a name="" id="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Let You Add New Admin" href="<?php echo base_url(); ?>admin/create_customer" role="button">Create New Account</a>
    <div id="load_stat"></div>

    <div class="table-responsive">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>S/N</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Status</th>
                    <th>Verify</th>
                    <th>Registered</th>
                    <th>Action</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody id="load">
                   
                </tbody>
        </table>
    </div>
    </div>
    <?php echo $pages; ?>
</div>
<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>
<div id="actions"></div>

<!-- Editing the user models -->
<?php if($customers): ?>
<?php foreach($customers as $edit_customer): ?>

<div class="modal fade edit-center<?php echo $edit_customer->ca_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Edit <?php echo $edit_customer->ca_username; ?> Account.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="edit-info"></div>
                <div id="edit-wait"></div>
                <?php
                $edit_id = ['id' => 'edit_id'.$edit_customer->ca_id];
                echo form_open('update_customer', $edit_id);
                ?>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_firstname">Customer First Name</label>
                    <input type="text" name="ca_firstname" value="<?php echo $edit_customer->ca_firstname; ?>" class="form-control" placeholder="Enter Firstname" autofocus="on" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_lastname">Customer Last Name</label>
                    <input type="text" name="ca_lastname" value="<?php echo $edit_customer->ca_lastname; ?>" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_email">Customer Email Address</label>
                    <input type="email" name="ca_email" value="<?php echo $edit_customer->ca_email; ?>" class="form-control" placeholder="Enter Email Address" reqired>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_username">Customer Username</label>
                    <input type="text" name="ca_username" value="<?php echo $edit_customer->ca_username; ?>" class="form-control" placeholder="Enter Username" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_password">Customer Password</label>
                    <input type="password" name="ca_password" class="form-control" placeholder="Leave Empty to make No change">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="ca_password2">Confirm Password</label>
                    <input type="password" name="ca_password2" class="form-control" placeholder="Leave Empty to make No change">
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" id="edit-cus" name="submit" class="btn btn-outline-primary btn-rounded waves-effect waves-light btn-block">Update <?php echo $edit_customer->ca_username; ?> Account</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Updating user status -->
<div class="modal fade status-center<?php echo $edit_customer->ca_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Update <?php echo $edit_customer->ca_username; ?> Account Status.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <?php if($edit_customer->ca_status == 1): ?>
                        <a name="" id="block<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-danger btn-rounded waves-effect waves-light btn-block" href="javascript:void(0);" role="button">Block Account</a>
                        <?php else: ?>
                        <a name="" id="unblock<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-info btn-rounded waves-effect waves-light btn-block" href="javascript:void(0);" role="button">UnBlock Account</a>
                        <?php endif; ?>
                    </div>

                    <div class="col-6">
                        <?php if($edit_customer->is_verify == 1): ?>
                        <a name="" id="deact<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-warning btn-rounded waves-effect waves-light btn-block" href="javascript:void(0);" role="button">DeActivate Account</a>
                        <?php else: ?>
                        <a name="" id="act<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light btn-block" href="javascript:void(0);" role="button">Activate Account</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- deleting confirmation -->
<div class="modal fade delete-center<?php echo $edit_customer->ca_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <?php
        $del_cat_modal = ['id' => 'del_customer_modal'.$edit_customer->ca_id];
        echo form_open_multipart('admin/delete_main_category/'.$edit_customer->ca_id, $del_cat_modal);
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Are you sure you want to delete <font color="red"><?php echo $edit_customer->ca_username; ?></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <center>Remove All User Data</center>
            </div>
            <div class="modal-footer">
            <button type="button" id="del-no-btn<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-danger btn-rounded waves-effect" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Not Sure?</button>
            <button type="submit" id="del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>" class="btn btn-outline-success btn-rounded waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check-all"></i></span>Yes Delete</button>
            </div>
        </div><!-- /.modal-content -->
        <?php echo form_close(); ?>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php endforeach; ?>
<?php endif; ?>