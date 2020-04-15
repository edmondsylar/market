<?php if($brand_lists): ?>
<?php foreach($brand_lists as $brandlist): ?>
<tr>
<td><?php echo $brandlist->brand_name; ?></td>

<td>
<?php if($brandlist->brand_status == 1): ?>
<span class="badge badge-success">Active</span>
<?php else: ?>
<span class="badge badge-danger">No Active</span>
<?php endif; ?>
</td>

<td>
<span class="badge badge-danger">0</span>
</td>

<td><a href="javascript:void(0);" class="badge badge-info" data-toggle="modal" data-target=".bs-example-modal-center<?php echo $brandlist->brand_id; ?>">Update</a></td>

<td><button type="button" class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $brandlist->brand_id; ?>">Delete</button></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>