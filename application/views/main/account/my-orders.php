<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>My Orders</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator"> </li>
                <li>My Orders</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start My Orders -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
    <?php $this->load->view('sections/main/inc/profile-sidebar'); ?>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <?php if($orders): ?>
            <div class="table-responsive">
                <table class="table table-hover margin-bottom-none">
                    <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date Generated</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $order): ?>
                    <tr>
                        <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails" data-toggle="tooltip" data-placement="top" title="See Order Details"><?php echo $order->order_number; ?></a></td>
                        <td><?php echo $order->order_month; ?> <?php echo $order->order_day; ?>, <?php echo $order->order_year; ?></td>
                        <?php if($order->order_status == 0): ?>
                        <td><span class="text-danger">UnPaid</span></td>
                        <?php elseif($order->order_status == 1): ?>
                        <td><span class="text-info">Paid</span></td>
                        <?php elseif($order->order_status == 2): ?>
                        <td><span class="text-warning">In Progress</span></td>
                        <?php elseif($order->order_status == 3): ?>
                        <td><span class="text-primary">Dispatched</span></td>
                        <?php elseif($order->order_status == 4): ?>
                        <td><span class="text-success">Delivered</span></td>
                        <?php else: ?>
                        <td><span class="text-danger">Canceled</span></td>
                        <?php endif; ?>
                        <td><span class="text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($order->order_total_amount); ?></span></td>
                        <td>
                            <!-- <button type="button" class="btn btn-sm btn-outline-info">Details</button> -->
                            <span class="badge badge-info" data-toggle="modal" data-target="#orderModalCenter-<?php echo $order->order_id; ?>" style="cursor:pointer;">Details</span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <h4 class="text-center">You have not Generate any order yet!</h4>
            <?php endif; ?>
            <hr>
        </div>
    </div>
    
</div>
<!-- End My Orders -->