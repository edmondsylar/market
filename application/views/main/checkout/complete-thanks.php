<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Checkout Complete</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Checkout Complate</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="container padding-top-1x padding-bottom-3x">
    <div class="card text-center">
        <div class="card-body padding-top-2x">
            <h3 class="card-title">Thank You For Your Order!</h3>
            <p class="card-text">Your order is now submited successfully.</p>
            <p class="card-text">Our staff will now be processing the packages asign to the order number: <span class="text-medium"><?php echo $orderId; ?></span></p>
            <p class="card-text">If you have any questions or query please use the contact section to reach us.</p>
            <div class="padding-top-1x padding-bottom-1x">
                <a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>my-account/my-orders">Go Back Shopping</a>
                <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>order-tracker/<?php echo $orderId; ?>"><i class="icon-location"></i>&nbsp;Track Order</a>
            </div>
        </div>
    </div>
</div>