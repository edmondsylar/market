<div class="offcanvas-container" id="mobile-menu">
    <a class="account-link" href="#">
        <?php if($this->session->userdata('cusLogged')): ?>
        <div class="user-ava">
            <img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $profile_info->cu_account_profile_pic ? $profile_info->cu_account_profile_pic : "default.jpg"; ?>" alt="<?php echo $profile_info->ca_firstname . " " . $profile_info->ca_lastname; ?>k">
        </div>
        <?php endif; ?>
        <div class="user-info">
        <?php if($this->session->userdata('cusLogged')): ?>
            <h6 class="user-name"><?php echo $profile_info->ca_firstname . " " . $profile_info->ca_lastname; ?></h6>
            <span class="text-sm text-white opacity-60">Balance: <?php echo $website_info->website_currency_symbol; ?><?php if($profile_info->cus_balance == 0){ echo "0.00";} else {echo $profile_info->cus_balance;} ?></span>
        <?php endif; ?>
        </div>
    </a>
    <nav class="offcanvas-menu">
        <ul class="menu">
            <li class="has-children <?php if( ! $this->uri->segment(1)) echo 'active'; ?>">
                <span>
                    <a href="<?php echo base_url(); ?>"><span>Home</span></a>
                </span>
            </li>
            <li class="has-children <?php if($this->uri->segment(1) == 'shop-category' OR $this->uri->segment(1) == 'stock') echo 'active'; ?>">
                <span>
                    <a href="<?php echo base_url(); ?>shop-category"><span>Shop Categories</span></a>
                </span>
            </li>
            <li class="has-children">
                <span>
                    <a href="#">Categories</a>
                    <span class="sub-menu-toggle"></span>
                </span>
                <?php if($home_main_cats): ?>
                <ul class="offcanvas-submenu">
                <?php foreach($home_main_cats as $home_cat): ?>
                    <li class="has-children">
                <span>
                    <a href="<?php echo base_url(); ?>shop-category/<?php echo $home_cat->main_cat_slug; ?>"><?php echo $home_cat->main_cat_name; ?></a>
                    <span class="sub-menu-toggle"></span>
                </span>
                        <ul class="offcanvas-submenu">
                        <?php if($home_sub_cats): ?>
                        <?php foreach ($home_sub_cats as $home_sub_cat): ?>
                        <?php if($home_sub_cat->main_cat_id == $home_cat->id): ?>
                            <li><a href="#"><?php echo $home_sub_cat->sub_cat_name; ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php if($this->session->userdata('cusLogged')): ?>
            <li class="has-children">
                <span>
                    <a href="#"><span>Account</span></a>
                    <span class="sub-menu-toggle"></span>
                </span>
                <ul class="offcanvas-submenu">
                <li><a href="<?php echo base_url(); ?>my-account">My Account</a></li>
                        <li><a href="<?php echo base_url(); ?>my-account/my-orders">My Orders</a></li>
                        <li><a href="<?php echo base_url(); ?>my-account/my-wishlist">My Wishlist</a></li>
                        <li class="sub-menu-separator"></li>
                        <li><a href="javascript:void(0);" id="signout">Sign Out</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if($cus_pages): ?>
            <li class="has-children<?php if($this->uri->segment(1) == 'pages') echo ' active'; ?>">
                <span>
                    <a href="#"><span>Pages</span></a>
                    <span class="sub-menu-toggle"></span>
                </span>
                <ul class="offcanvas-submenu">
                    <?php foreach($cus_pages as $my_page): ?>
                    <li><a href="<?php echo base_url(); ?>pages/<?php echo $my_page->page_slug; ?>"><?php echo $my_page->page_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endif; ?>
            <li class="has-children <?php if($this->uri->segment(1) == 'contact-us') echo 'active'; ?>">
                <span>
                    <a href="<?php echo base_url(); ?>contact-us"><span>Contact Us</span></a>
                </span>
            </li>
        </ul>
    </nav>
</div>