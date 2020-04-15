<section class="widget widget-order-summary">
    <h3 class="widget-title">Order Summary</h3>
    <table class="table">
        <tr>
            <td>Cart Subtotal:</td>
            <td class="text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($this->session->userdata('cart_subtotal')); ?></td>
        </tr>
        <tr>
            <td>Tax:</td>
            <td class="text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo $shopping_tax->shop_tax; ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-lg text-medium"><?php echo $website_info->website_currency_symbol; ?><?php echo number_format($this->session->userdata('cart_subtotal') + $shopping_tax->shop_tax); ?></td>
        </tr>
    </table>
</section>