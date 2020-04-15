<?php if($sub_cats): ?>
<?php foreach($sub_cats as $sub_cat): ?>
<tr>
<td><?php echo $sub_cat->sub_cat_name; ?></td>
<td><a href="<?php echo base_url(); ?>admin/categories/sub-categories/<?php echo $sub_cat->main_cat_slug; ?>"><?php echo $sub_cat->main_cat_name; ?></a></td>
<td>
<?php if($sub_cat->sub_cat_status == 1): ?>
<span class="badge badge-success">Visible</span>
<?php else: ?>
<span class="badge badge-warning">No Visible</span>
<?php endif; ?>
</td>
<td>
<a href="javascript:void(0);" class="badge badge-primary" data-toggle="modal" data-target=".bs-edit-main-cat-modal-center<?php echo $sub_cat->sid; ?>">Edit</a>
<a href="#" class="badge badge-pink">Show Products</a>
</td>

<td>
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target=".bs-delete-modal-center<?php echo $sub_cat->sid; ?>">Delete</button>
</td>

</tr>
<?php endforeach; ?>
<?php endif; ?>