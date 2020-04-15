<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="<?php echo base_url(); ?>" class="btn btn-blue btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Return Home">
                    <i class="mdi mdi-home"></i>
                </a>
                <a href="<?php echo base_url(); ?>admin" class="btn btn-blue btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
            </div>
            <h4 class="page-title">Active Testimonials</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <?php if($approves): ?>
        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Review By</th>
                        <th>Review Rating</th>
                        <th>reviewer Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($approves as $appr): ?>
                        <tr>
                            <td scope="row"><?php echo $appr->ca_firstname . ' ' . $appr->ca_lastname; ?></td>
                            <td style="color:orange;">
                                <?php if($appr->testi_rating == 1): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php elseif($appr->testi_rating == 2): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php elseif($appr->testi_rating == 3): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php elseif($appr->testi_rating == 4): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php elseif($appr->testi_rating == 5): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $appr->ca_email; ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-rounded btn-sm" data-toggle="modal" data-target=".bs-example-modal-center-<?php echo $appr->testi_id; ?>">Review</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info"><h3 class="text-center">No Approved Testimonial</h3></div>
        <?php endif; ?>
    </div>
</div>

<!-- Actions -->
<?php if($approves): ?>
<?php foreach($approves as $a_apprs): ?>
<div class="modal fade bs-example-modal-center-<?php echo $a_apprs->testi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Review By: <?php echo $a_apprs->ca_username; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for=""></label>
                  <textarea class="form-control" name="" rows="6"><?php echo $a_apprs->testi_content; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_open('admin/delete_testi/'.$a_apprs->testi_id); ?>
                <button type="submit" class="btn btn-outline-danger btn-rounded">Decline</button>
                <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; ?>
<?php endif; ?>