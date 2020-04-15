<div class="row">
            <!-- Start Contact Info -->
            <div class="col-lg-4 col-md-6">
                <section class="widget widget-light-skin">
                    <h3 class="widget-title"><?php echo $website_info->website_name; ?> Info</h3>
                    <p class="text-white"><i class="fa fa-phone"></i> <?php echo $website_info->website_number; ?></p>
                    <p class="text-white"><i class="fa fa-envelope-o"></i> <?php echo $website_info->website_email; ?></p>
                    <p class="text-white"><i class="fa fa-map-marker"></i> <?php echo $website_info->website_address; ?></p>

                    <?php if($website_info->website_facebook != NULL): ?>
                    <a class="social-button shape-circle sb-facebook sb-light-skin" href="<?php echo $website_info->website_facebook; ?>">
                        <i class="socicon-facebook"></i>
                    </a>
                    <?php endif; ?>

                    <?php if($website_info->website_twitter != NULL): ?>
                    <a class="social-button shape-circle sb-twitter sb-light-skin" href="<?php echo $website_info->website_twitter; ?>">
                        <i class="socicon-twitter"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if($website_info->website_instagram != NULL): ?>
                    <a class="social-button shape-circle sb-instagram sb-light-skin" href="<?php echo $website_info->website_twitter; ?>">
                        <i class="socicon-instagram"></i>
                    </a>
                    <?php endif; ?>
                </section>
            </div>
            <!-- End Contact Info -->
            <!-- Start Mobile Apps -->
            <div class="col-lg-4 col-md-6">
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">Navigate To</h3>
                    <?php if($cus_pages): ?>
                    <ul>
                        <?php foreach($cus_pages as $my_page): ?>
                        <li><a href="<?php echo $my_page->page_slug; ?>"><?php echo $my_page->page_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </section>
            </div>
            <!-- End Mobile Apps -->
            <!-- Start Account Info -->
            <div class="col-lg-4 col-md-6">
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">Account Info</h3>
                    <ul>
                        <li><a href="#">My Shopping Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">My Tickets</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Single Tickets</a></li>
                    </ul>
                </section>
            </div>
            <!-- End Account Info -->
        </div>