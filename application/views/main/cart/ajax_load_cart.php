<?php if($carts): ?>
<?php foreach($carts as $cart): ?>
<div class="dropdown-product-item">
    <span class="dropdown-product-remove"><a href="javascript:void(0);" id="remove-cart-m<?php echo $cart->shop_cart_id; ?>"><i class="icon-cross"></i></a></span>
    <a class="dropdown-product-thumb" href="<?php echo base_url(); ?>product/<?php echo $cart->product_slug; ?>">
        <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $cart->product_show; ?>" alt="Product">
    </a>
    <div class="dropdown-product-info">
        <a class="dropdown-product-title" href="<?php echo base_url(); ?>product/<?php echo $cart->product_slug; ?>"><?php echo $cart->product_name; ?></a>
        <span class="dropdown-product-details"><?php echo $cart->shop_cart_quantity; ?> x <?php echo $website_info->website_currency_symbol; ?><?php echo $cart->product_price; ?></span>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<script>
 //romoving shopping cart on main pages
 <?php if($carts): ?>
    <?php foreach($carts as $r_cart): ?>
    $('#remove-cart-m<?php echo $r_cart->shop_cart_id; ?>').click(function() {
        $.ajax({
            url: '<?php echo base_url(); ?>remove-cart/<?php echo $r_cart->shop_cart_id; ?>',
            success:function(data) {
                $('#r_cart_info').html(data);
            }
        });
    });
    <?php endforeach; ?>
<?php endif; ?>
</script>