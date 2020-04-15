<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Shopping Cart</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Cart Content -->
<div class="container padding-top-1x padding-bottom-3x">
    <?php if($my_carts): ?>
    
    <!-- Start Shopping Cart -->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
            <tr>
                <th>Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Subtotal</th>
                <th class="text-center">Colour</th>
                <th class="text-center">
                    <?php echo form_open('empty-my-shopping-cart'); ?>
                    <input type="hidden" name="mine" value="<?php echo $this->session->userdata('cus_id'); ?>">
                    <button class="btn btn-sm btn-outline-danger" type="submit">Empty Cart</button>
                    <?php echo form_close(); ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $subtotal = 0; ?>
            <?php foreach($my_carts as $my_cart): ?>
            <?php $amt = $my_cart->shop_cart_quantity * $my_cart->product_price; ?>
            <?php $subtotal+= $amt; ?>
            <tr>
                <td>
                    <div class="product-item">
                        <a class="product-thumb" href="<?php echo base_url(); ?>product/<?php echo $my_cart->product_slug; ?>">
                            <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $my_cart->product_show; ?>" alt="Product">
                        </a>
                        <div class="product-info">
                            <h4 class="product-title"><a href="<?php echo base_url(); ?>product/<?php echo $my_cart->product_slug; ?>"><?php echo $my_cart->product_name; ?></a></h4>
                            <span><em>Color:</em> <?php echo $my_cart->shop_cart_color ? $my_cart->shop_cart_color : 'Not Specify'; ?></span>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="count-input">
                        <?php
                        $opt = ['id' => 'qty_'.$my_cart->shop_cart_id];
                        echo form_open('my-cat-qty/'.$my_cart->shop_cart_id,$opt);
                        ?> 
                        <select class="form-control" name="qty" id="qty<?php echo $my_cart->shop_cart_id; ?>">
                            <option value="1"<?php if($my_cart->shop_cart_quantity == 1) echo ' selected'; ?>>1</option>
                            <option value="2"<?php if($my_cart->shop_cart_quantity == 2) echo ' selected'; ?>>2</option>
                            <option value="3"<?php if($my_cart->shop_cart_quantity == 3) echo ' selected'; ?>>3</option>
                            <option value="4"<?php if($my_cart->shop_cart_quantity == 4) echo ' selected'; ?>>4</option>
                            <option value="5"<?php if($my_cart->shop_cart_quantity == 5) echo ' selected'; ?>>5</option>
                        </select>
                        <?php echo form_close(); ?>
                    </div>
                </td>
                <td class="text-center text-lg text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($my_cart->shop_cart_quantity * $my_cart->product_price); ?></td>
                <td class="text-center text-lg text-medium">
                    <?php if($my_cart->product_colors): ?>
                    <?php 
                    //catch provided colors
                    $product_colors = $my_cart->product_colors;
                    if($product_colors != NULL) {
                        $color_tags = trim($product_colors, ',');
                        if($color_tags != "") {
                            $colors = explode(",", $color_tags);
                        }
                    }
                    ?>
                    <?php
                    $color_opt = ['id' => 'changeCartColor'.$my_cart->shop_cart_id];
                    echo form_open('change-cart-color/'.$my_cart->shop_cart_id, $color_opt);
                    ?>
                    <select name="cart_color" id="cartColor<?php echo $my_cart->shop_cart_id; ?>" class="form-control">
                    <option value="<?php echo NULL; ?>">Any</option>
                    <?php foreach($colors as $key => $color): ?>
                    <option value="<?php echo $color; ?>" <?php if($color == $my_cart->shop_cart_color) echo 'selected'; ?>><?php echo $color; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?php echo form_close(); ?>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <a class="remove-from-cart" href="javascript:void(0);" id="removeFromCart_<?php echo $my_cart->shop_cart_id; ?>" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="shopping-cart-footer">
        <div class="column text-lg">Total: <span class="text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($subtotal); ?></span></div>
    </div>
    <div class="shopping-cart-footer">
        <div class="column">
            <a class="btn btn-outline-secondary" href="<?php echo base_url(); ?>stock"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a>
        </div>
        <div class="column">
            <a class="btn btn-success" href="<?php echo base_url(); ?>checkout/prepare">Checkout</a>
        </div>
    </div>
    <!-- End Shopping Cart -->
    <?php else: ?>
    <h4 class="text-center">Your shopping cart is Empty</h4>
    <?php endif; ?>
</div>