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
            <h4 class="page-title">Customers Orders</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <?php $opts = ['class' => 'form-inline']; ?>
                    <?php echo form_open('admin/customer_orders', $opts); ?>
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

<?php 
if($this->session->flashdata('ord_done')) {
    echo $this->session->flashdata('ord_done');
}
?>

<div class="card">
    <div class="card-body">
        <?php if($orders): ?>
        <div class="table-responsive">
            <table class="table table-hover table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Order Number</th>
                        <th>Order Description</th>
                        <th>Customer Username</th>
                        <th>Customer Email</th>
                        <th>Price</th>
                        <th>Order Status</th>
                        <th>Generated On</th>
                        <th>Actions</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                        <tr>
                            <td scope="row"><?php echo $order->order_number; ?></td>
                            <td><?php echo $order->order_description; ?></td>
                            <td><?php echo $order->ca_username; ?></td>
                            <td><?php echo $order->ca_email; ?></td>
                            <td><?php echo $website_info->website_currency_symbol; ?><?php echo $order->order_total_amount; ?></td>
                            <?php if($order->order_status == 0): ?>
                            <td><span class="badge badge-danger">UnPaid</span></td>
                            <?php elseif($order->order_status == 1): ?>
                            <td><span class="badge badge-info">Paid</span></td>
                            <?php elseif($order->order_status == 2): ?>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <?php elseif($order->order_status == 3): ?>
                            <td><span class="badge badge-primary">Dispatched</span></td>
                            <?php elseif($order->order_status == 4): ?>
                            <td><span class="badge badge-success">Delivered</span></td>
                            <?php else: ?>
                            <td><span class="badge badge-danger">Canceled</span></td>
                            <?php endif; ?>
                            <td><?php echo $order->order_day . ' ' . $order->order_month . ' ' . $order->order_year; ?></td>
                            <td><a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $order->order_id; ?>" class="badge badge-info">Review</a> <a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-center-<?php echo $order->order_id; ?>" class="badge badge-primary">Update</a></td>
                            <td>
                            <?php echo form_open('admin/remove_order/'.$order->order_id); ?>
                            <button class="btn btn-outline-danger btn-sm">Remove</button>
                            <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
        <?php echo $pages; ?>
        <?php else: ?>
        <div class="alert alert-info"><h3 class="text-center">No order has been generated yet.</h3></div>
        <?php endif; ?>
    </div>
</div>

<?php if($orders): ?>
<?php foreach($orders as $order_info): ?>
<!--infomations modal-->
<div class="modal fade bs-example-modal-lg-<?php echo $order_info->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Review For Order: <font color="blue"><?php echo $order_info->order_number; ?></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title">Customer Infomations</div>
                            <div class="card-body">
                                <p><b>Full Name:</b> <?php echo $order_info->ca_firstname . ' ' . $order_info->ca_lastname; ?></p>
                                <p><b>Username:</b> <?php echo $order_info->ca_username; ?></p>
                                <p><b>Email Address:</b> <?php echo $order_info->ca_email; ?></p>
                                <p><b>Phone Number:</b> <?php echo $order_info->cu_account_phone; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title">Shipping Infomations</div>
                            <div class="card-body">
                                <p><b>Company:</b> <?php echo $order_info->order_shipping_company; ?></p>
                                <p><b>Address 1:</b> <?php echo $order_info->order_shipping_address_1; ?></p>
                                <p><b>Address 2:</b> <?php echo $order_info->order_shipping_address_2; ?></p>
                                <p><b>State:</b> <?php echo $order_info->order_shipping_state; ?></p>
                                <p><b>Country:</b> <?php echo $order_info->order_shipping_country; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <?php if($bundles): ?>
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Preview</th>
                                <th>Product Name</th>
                                <th>Colour</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bundles as $bundle): ?>
                                <?php if($bundle->cob_order_number == $order_info->order_number): ?>
                                <tr>
                                    <td scope="row"><img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $bundle->product_show; ?>" width="75px" alt="Product"></td>
                                    <td><a href="<?php echo base_url(); ?>admin/store/product-detail/<?php echo $bundle->product_slug; ?>"><?php echo $bundle->product_name; ?></a></td>
                                    <td><?php echo $bundle->cob_color ? $bundle->cob_color : 'Not Specify'; ?></td>
                                    <td><span class="badge badge-success"><?php echo $bundle->cob_qty; ?></span></td>
                                    <td><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($bundle->product_price); ?></td>
                                    <td><span class="badge badge-secondary"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($bundle->cob_qty * $bundle->product_price); ?></span></td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                    </table>
                    <div align="right"><strong>Total: <?php echo $website_info->website_currency_symbol; ?><?php echo number_format($order_info->order_total_amount); ?></strong></div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Updating status-->
<div class="modal fade bs-example-modal-center-<?php echo $order_info->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Update Status For Order: <font color="red"><?php echo $order_info->order_number; ?></font></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open('admin/update_order_status/'.$order_info->order_id.'/'.$order_info->order_number); ?>
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                  <select class="form-control" name="update_order" id="">
                                    <option value="0" <?php if($order_info->order_status == 0) echo 'selected'; ?>>Unpaid</option>
                                    <option value="1" <?php if($order_info->order_status == 1) echo 'selected'; ?>>Paid</option>
                                    <option value="2" <?php if($order_info->order_status == 2) echo 'selected'; ?>>In Progress</option>
                                    <option value="3" <?php if($order_info->order_status == 3) echo 'selected'; ?>>Dispatched</option>
                                    <option value="4" <?php if($order_info->order_status == 4) echo 'selected'; ?>>Delivered</option>
                                    <option value="5" <?php if($order_info->order_status >= 5) echo 'selected'; ?>>Canceled</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-outline-primary waves-effect waves-light" btn-lg btn-block">Update</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; ?>
<?php endif; ?>