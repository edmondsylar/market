<?php if($results): ?>
<?php foreach($results as $result): ?>
<div class="card-body">
    <div class="d-flex"><a class="pr-4 hidden-xs-down search-products-nav" href="<?php echo base_url(); ?>product/<?php echo $result->product_slug; ?>">
        <img src="<?php echo base_url(); ?>statics/shops/products/<?php echo $result->product_show; ?>" alt="Product"></a>
        <div>
            <h6><a class="navi-link" href="<?php echo base_url(); ?>product/<?php echo $result->product_slug; ?>"><?php echo $result->product_name; ?> </a></h6>
            <h6>
                <em><?php echo $website_info->website_currency_symbol; ?><?php echo $result->product_price; ?></em>
            </h6>
        </div>
    </div>
</div>
<hr>
<?php endforeach; ?>
<?php else: ?>
<div class="card-body"><h4 class="text-center">No Result Found For "<?php echo $searching; ?>"</h4></div>
<?php endif; ?>