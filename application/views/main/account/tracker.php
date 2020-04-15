<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Order Tracking</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Order Tracking</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->


<!-- Start Order Trucking -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="card mb-3">
        <?php if($get_order_number->order_status <= 4): ?>
        <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium"><?php echo $get_order_number->order_number; ?></span></div>
        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class='text-medium'>Amount Paid:</span> <?php echo $website_info->website_currency_symbol . number_format($get_order_number->order_total_amount); ?></div>
            <div class="w-100 text-center py-1 px-2"><span class='text-medium'>Status:</span> Checking Quality</div>
            <div class="w-100 text-center py-1 px-2"><span class='text-medium'>Generated Date:</span> <?php echo $get_order_number->order_month . ' ' . $get_order_number->order_day . ' ' . $get_order_number->order_year; ?>  </div>
        </div>
        <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                <div class="step<?php if($get_order_number->order_status >= 1) echo' completed'; ?>">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-cart"></i></div>
                    </div>
                    <h4 class="step-title">Confirmed Order</h4>
                </div>
                <div class="step<?php if($get_order_number->order_status >= 2) echo' completed'; ?>">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-config"></i></div>
                    </div>
                    <h4 class="step-title">Processing Order</h4>
                </div>
                <div class="step<?php if($get_order_number->order_status >= 3) echo' completed'; ?>">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-medal"></i></div>
                    </div>
                    <h4 class="step-title">Quality Check</h4>
                </div>
                <div class="step<?php if($get_order_number->order_status >= 3) echo' completed'; ?>">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-car"></i></div>
                    </div>
                    <h4 class="step-title">Product Dispatched</h4>
                </div>
                <div class="step<?php if($get_order_number->order_status == 4) echo' completed'; ?>">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-home"></i></div>
                    </div>
                    <h4 class="step-title">Product Delivered</h4>
                </div>
            </div>
        </div>
        <?php else: ?>
        <h4 class="text-center">This order has been canceled</h4>
        <?php endif; ?>
    </div>
</div>
<!-- End Order Trucking -->