<!-- Start Sidebar -->
<div class="col-lg-3 order-lg-1 hidden-md-down">
    <aside class="sidebar">
        <div class="padding-top-2x hidden-lg-up"></div>
        <!-- Start Categories Widget -->
        <?php if($main_side_cats): ?>
        <section class="widget widget-categories">
            <h3 class="widget-title">Shop Categories</h3>
            <ul>
                <?php foreach($main_side_cats as $side_cat): ?>
                <li class="has-children<?php if($side_cat->id == $main_cat_info->id) echo ' expanded'; ?>">
                    <a href="#"><?php echo $side_cat->main_cat_name; ?></a>
                    <ul>
                        <?php if($main_side_sub_cats): ?>
                        <?php foreach($main_side_sub_cats as $sub_cat): ?>
                        <?php if($sub_cat->main_cat_id == $side_cat->id): ?>
                        <li>
                            <a href="#"><?php echo $sub_cat->sub_cat_name; ?></a>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php endif; ?>
        <!-- End Categories Widget -->
        <!--  Start Price Range Widget -->
        <section class="widget widget-categories">
            <h3 class="widget-title">Price Range</h3>
            <form class="price-range-slider" method="post" data-start-min="250" data-start-max="970" data-min="0" data-max="1500" data-step="1">
                <div class="ui-range-slider"></div>
                <footer class="ui-range-slider-footer">
                    <div class="column">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                    </div>
                    <div class="column">
                        <div class="ui-range-values">
                            <div class="ui-range-value-min">$<span></span>
                                <input type="hidden">
                            </div> -
                            <div class="ui-range-value-max">$<span></span>
                                <input type="hidden">
                            </div>
                        </div>
                    </div>
                </footer>
            </form>
        </section>
        <!--  End Price Range Widget -->
        <!-- Start Promo Banner -->
        <section class="promo-box shop-promo">
            <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                <h3 class="text-bold text-light text-shadow">Smatphones</h3>
                <a class="btn btn-sm btn-primary" href="shop-grid-1.html">Shop Now</a>
            </div>
        </section>
        <!-- End Promo Banner -->
    </aside>
</div>
<!-- End Sidebar -->