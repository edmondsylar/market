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
            <h4 class="page-title">Administrator Accounts</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <a name="" id="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Let You Add New Admin" href="<?php echo base_url(); ?>admin/create_admin" role="button">Create ADmin</a>
        <?php if($admins_list): ?>
        <div class="table-responsive">
            <table class="table table-hover table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Username</th>
                        <th>Display</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email Address</th>
                        <th>Gender</th>
                        <th>Residence</th>
                        <th>Registerd Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody id="list_admin">
                        
                    </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info" role="alert">
            <i class="mdi mdi-alert-circle-outline mr-2"></i> <strong>Empty!</strong> it look like we do not have any Admin User on List yet.
        </div>
        <?php endif; ?>
        <?php echo $pages; ?>
    </div>
</div>
<span id="sa-success"></span>
<?php if($admins_list): ?>
<?php foreach($admins_list as $modal): ?>
<div id="con-close-modal-<?php echo $modal->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are You Sure You Want To Delete <font color="blue"><strong><?php echo $modal->admin_username; ?></strong></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?php
            $del_opt = ['id' => 'del_user_'.$modal->id];
            echo form_open('admin', $del_opt);
            ?>
            <div class="modal-body p-4">
                <font color="red"><strong>Note:</strong></font> Oncel delete He/She can never be Retrived.
            </div>
            <div class="modal-footer">
                <button type="button" id="no-btn" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" id="del-btn" class="btn btn-danger waves-effect waves-light">Yes Delete</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div><!-- /.modal -->
<?php endforeach; ?>
<?php endif; ?>