<?php foreach($admins_list as $admin): ?>
<tr>
<td><?php echo $admin->admin_username; ?></td>
<td>
<?php if($admin->admin_profile_picture != NULL): ?>
<img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $admin->admin_profile_picture; ?>" class="rounded-circle" width="35px" height="35px" alt="">
<?php else: ?>
<img src="<?php echo base_url(); ?>assets/avater/default.jpg" class="rounded-circle" width="35px" height="35px" alt="">
<?php endif; ?>
</td>
<td><?php echo $admin->admin_firstname; ?></td>
<td><?php echo $admin->admin_lastname; ?></td>
<td><?php echo $admin->admin_email; ?></td>
<td>
<?php if($admin->admin_gender == 1): ?>
<span class="badge badge-secondary">Male</span>
<?php elseif($admin->admin_gender == 2): ?>
<span class="badge badge-pink">Female</span>
<?php else: ?>
<span class="badge badge-warning">Unknown</span>
<?php endif; ?>
</td>
<td><?php echo $admin->admin_region; ?>, <?php echo $admin->admin_country; ?></td>
<td><?php echo $admin->admin_created_at; ?></td>
<td><a name="" id="" class="btn btn-info btn-sm btn-rounded" href="<?php echo base_url(); ?>admin/edit_admin/<?php echo $admin->admin_username; ?>" role="button">Edit</a></td>
<td><button name="" data-toggle="modal" data-target="#con-close-modal-<?php echo $admin->id; ?>" class="btn btn-danger btn-sm btn-rounded" role="button">Delete</button></td>
</tr>
<?php endforeach; ?>