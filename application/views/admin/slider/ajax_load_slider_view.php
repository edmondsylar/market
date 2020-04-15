<?php if($load_sliders): ?>
<div class="row">
    <?php foreach($load_sliders as $load_slider): ?>
    <div class="col-6 col-sm-4 col-md-3">
        <div class="card-box">
        <img class="img-fluid mx-auto d-block rounded" src="<?php echo base_url(); ?>statics/sliders/products/<?php echo $load_slider->psa_image; ?>" alt="">
        <br>
        <?php
        $del_opts = ['id' => 'rmv_'.$load_slider->psa_id];
        echo form_open('admin/remove_slider', $del_opts);
        ?>
        <center><button type="submit" id="del_btn_<?php echo $load_slider->psa_id; ?>" class="btn btn-danger btn-sm waves-effect effect-light">Remove</button></center>
        <?php echo form_close(); ?>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#rmv_<?php echo $load_slider->psa_id; ?>').on('submit', function(del) {
            del.preventDefault();
            $('#del_btn_<?php echo $load_slider->psa_id; ?>').removeClass('btn-danger');
            $('#del_btn_<?php echo $load_slider->psa_id; ?>').addClass('btn-default');
            $('#del_btn_<?php echo $load_slider->psa_id; ?>').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>admin/remove_product_slider/<?php echo $load_slider->psa_id; ?>',
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
<?php else: ?>
<div class="alert alert-info"><h3 class="text-center">No Slider Available Yet</h3></div>
<?php endif; ?>