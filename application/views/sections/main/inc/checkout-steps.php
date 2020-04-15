<?php $url = $this->uri->segment(2); ?>
<?php
switch ($url) {
    case 'shipping-address':
    ?>
        <div class="checkout-steps">
            <a href="javascript:void(0);">4. Review</a>
            <a href="javascript:void(0);"><span class="angle"></span>3. Payment</a>
            <a <?php if($this->uri->segment(2) == 'shipping-address') echo 'class="active"'; ?> href="javascript:void(0);"><span class="angle"></span>2. Shipping Address</a>
            <a class="completed" href="<?php echo base_url(); ?>shopping-cart"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. My Shoping Cart</a>
        </div>
    <?php
        break;
    case 'payment':
    ?>
        <div class="checkout-steps">
            <a href="javascript:void(0);">4. Confirmation</a>
            <a class="active" href="javascript:void(0);"><span class="angle"></span>3. Payment</a>
            <a class="complete" href="<?php echo base_url(); ?>shop-checkout/shipping-address"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>2. Shipping Address</a>
            <a class="complete" href="<?php echo base_url(); ?>shopping-cart"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. My Shoping Cart</a>
        </div>
        <?php
        break;
    case 'complete':
    ?>
        <div class="checkout-steps">
            <a class="active" href="javascript:void(0);">4. Confirmation</a>
            <a class="completed" href="javascript:void(0);"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>3. Payment</a>
            <a class="completed" href="javascript:void(0);"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>2. Shipping Address</a>
            <a class="completed" href="<?php echo base_url(); ?>shopping-cart"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. My Shoping Cart</a>
        </div>
        <?php
        break;
    
    default:
        redirect(404);
        break;
}
?>
