<!-- Start Sidebar -->
<div class="col-lg-3 order-lg-1 hidden-md-down">
    <aside class="sidebar">
        <div class="padding-top-1x padding-bottom-2x hidden-md-up"></div>
        <!-- Start Popular Brands -->
        <?php if($main_brands): ?>
        <section class="widget widget-categories">
            <h3 class="widget-title">Avaliable Brands</h3>
            <ul>
                <?php foreach($main_brands as $main_brand): ?>
                <li><a href="#"><?php echo $main_brand->brand_name; ?></li>
                <?php endforeach; ?>
                
            </ul>
        </section>
        <!-- End Popular Brands -->
        <!-- Start Promo Banner -->
        <section class="promo-box shop-promo">
            <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                <h3 class="text-bold text-light text-shadow">Smatphones</h3>
                <a class="btn btn-sm btn-primary" href="#">Shop Now</a>
            </div>
        </section>
        <?php endif; ?>
        <!-- End Promo Banner -->
    </aside>
</div>
<!-- End Sidebar -->