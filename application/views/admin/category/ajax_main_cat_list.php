<?php if($get_cat_lists): ?>
<?php foreach($get_cat_lists as $cat): ?>
<tr>
<td>
    <img src="<?php echo base_url(); ?>statics/shops/categories/<?php echo $cat->main_cat_preview1; ?>" width="50px" alt="">
</td>

<td><?php echo $cat->main_cat_name; ?></td>

<td>
<?php if($cat->status == 1): ?>
<span class="badge badge-success">Visible</span>
<?php else: ?>
<span class="badge badge-warning">No Visible</span>
<?php endif; ?>
</td>

<td>
<span class="badge badge-danger"><b>0</b></span>
</td>

<td>
<a href="javascript:void(0);" class="badge badge-primary" data-toggle="modal" data-target=".bs-edit-main-cat-modal-lg<?php echo $cat->id; ?>">Edit</a>
<a href="<?php echo base_url(); ?>admin/categories/sub-categories/<?php echo $cat->main_cat_slug; ?>" class="badge badge-info">Mange Sub</a>
</td>

<td>
<button type="button" class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target=".bs-delete-modal-center<?php echo $cat->id; ?>">Delete</button>
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?> 