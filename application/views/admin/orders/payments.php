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
            <h4 class="page-title">Payments Reports</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <?php $opts = ['class' => 'form-inline']; ?>
                    <?php echo form_open('admin/payment_received', $opts); ?>
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="search_order" id="inputPassword2" placeholder="Enter Order Number" autocomplete = "off">
                            <input type="submit" value="Search" name="s_order" style="position:absolute; left: -9999px; width: 1px; height: 1px; " tabindex="-1">
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row-->

<?php if($payments): ?>
<div class="card">
    <div class="card-body">
    
    <div class="table-responsive">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Order Number</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($payments as $payment): ?>
                    <tr>
                        <td scope="row"><?php echo $i++; ?></td>
                        <td><span class="badge badge-primary"><?php echo $payment->inp_order_number; ?></span></td>
                        <td><?php echo $payment->inp_method; ?></td>
                        <td><?php echo $payment->inp_day . ', ' . $payment->inp_month . ' ' . $payment->inp_year; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>
    </div>
    <?php echo $pages; ?>

    <?php else: ?>
    <div class="alert alert-info"><h3 class="text-center">No Payment Made yet!</h3></div>
    <?php endif; ?>
    </div>
</div>