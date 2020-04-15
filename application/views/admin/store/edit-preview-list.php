<?php if($get_edit_shot): ?>
<div class="row">
<?php foreach($get_edit_shot as $shot): ?>
<div class="col-6 col-sm-4 col-md-3">
<div class="card-box">
<img class="img-fluid mx-auto d-block rounded" src="<?php echo base_url(); ?>statics/shops/products/<?php echo $shot->product_preview_name; ?>" alt="">
<br>
<?php
$del_opts = ['id' => 'rmv_'.$shot->pp_id];
echo form_open('admin/remove_shot', $del_opts);
?>
<center><button type="submit" id="del_btn_<?php echo $shot->pp_id; ?>" class="btn btn-danger btn-sm waves-effect effect-light">Remove</button></center>
<?php echo form_close(); ?>
</div>
</div>
<script>
$(document).ready(function() {
    $('#rmv_<?php echo $shot->pp_id; ?>').on('submit', function(del) {
        del.preventDefault();
        $('#del_btn_<?php echo $shot->pp_id; ?>').removeClass('btn-danger');
        $('#del_btn_<?php echo $shot->pp_id; ?>').addClass('btn-default');
        $('#del_btn_<?php echo $shot->pp_id; ?>').prop('disabled', true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/remove_preview_shot/<?php echo $shot->pp_id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                
            }
        });
    });
});
</script>
<?php endforeach; ?>
</div>
<?php endif; ?>