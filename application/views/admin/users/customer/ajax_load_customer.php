<?php if($customers): ?>
<?php $i = 1; ?>
<?php foreach($customers as $customer): ?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $customer->ca_username; ?></td>
<td><?php echo $customer->ca_firstname . " " . $customer->ca_lastname; ?></td>
<td><?php echo $customer->ca_email; ?></td>
<td>
<?php if($customer->ca_status == 0): ?>
<span class="badge badge-warning">Not Active</span>
<?php elseif($customer->ca_status == 1): ?>
<span class="badge badge-success">Active</span>
<?php else: ?>
<span class="badge badge-danger">Banned</span>
<?php endif; ?>
</td>
<td>
<?php if($customer->is_verify == 1): ?>
<span class="badge badge-info">Verified</span>
<?php else: ?>
<span class="badge badge-danger">Not Verified</span>
<?php endif; ?>
</td>
<td>
<?php echo $customer->ca_create_day . ', ' . $customer->ca_create_month . ' ' . $customer->ca_create_year; ?>
</td>
<td>
<a href="javascript:void(0);" data-toggle="modal" data-target=".status-center<?php echo $customer->ca_id; ?>" class="badge badge-pink">Stat</a> 
<a href="javascript:void(0);" data-toggle="modal" data-target=".edit-center<?php echo $customer->ca_id; ?>" class="badge badge-primary">Edit</a>
</td>
<td>
<button type="button" data-toggle="modal" data-target=".delete-center<?php echo $customer->ca_id; ?>" class="btn btn-danger btn-rounded btn-sm">Delete</button>
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?>