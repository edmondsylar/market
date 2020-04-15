<header class="navbar navbar-sticky">
    <!-- Start Search -->
    <?php 
    $s_id = ['class' => 'site-search', 'id' => 'let_search'];
    echo form_open('search', $s_id);
    ?>
        <input type="text" name="site_search" id="find-product" placeholder="Type to search...">
        <span id="returnSearch">


        </span>
        <div class="search-tools">
            <span class="clear-search">Clear</span>
            <span class="close-search"><i class="icon-cross"></i></span>
        </div>
    <?php echo form_close(); ?>
    <!-- End Search -->
    <!-- Start Logo -->
    <div class="site-branding">
        <div class="inner">
            <a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
            <a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
            <a class="site-logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>statics/uploads/pref_settings/logo.png" alt="Inspina"></a>
        </div>
    </div>
    <!-- End Logo -->
    <!-- Start Nav Menu -->
    <nav class="site-menu">
        <ul>
            <li class="<?php if( ! $this->uri->segment(1)) echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>"><span>Home</span></a>
            </li>
            <li class="<?php if($this->uri->segment(1) == 'shop-category' OR $this->uri->segment(1) == 'stock') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>shop-category"><span>Shop Categories</span></a>
            </li>
            
            <li class="<?php if($this->uri->segment(1) == 'about-us') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>about-us"><span>About Us</span></a>
            </li>
            <?php if($cus_pages): ?>
            <li class="<?php if($this->uri->segment(1) == 'pages') echo 'active'; ?>">
                <a href="#"><span>Pages</span></a>
                <ul class="sub-menu">
                    <?php foreach($cus_pages as $my_page): ?>
                    <li><a href="<?php echo base_url(); ?>pages/<?php echo $my_page->page_slug; ?>"><?php echo $my_page->page_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endif; ?>

            <li class="<?php if($this->uri->segment(1) == 'contact-us') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>contact-us"><span>Contact Us</span></a>
            </li>
        </ul>
    </nav>
    <!-- End Nav Menu -->
    <!-- Start Toolbar -->
    <div class="toolbar">
        <div class="inner">
            <div class="tools">
                <div class="search"><i class="icon-search"></i></div>
                <?php if($this->session->userdata('cusLogged')): ?>
                <!-- Start Account -->
                <div class="account">
                    <a href="#"></a><i class="icon-head"></i>
                    <ul class="toolbar-dropdown">
                        <li class="sub-menu-user">
                            <div class="user-ava">
                                <img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $profile_info->cu_account_profile_pic ? $profile_info->cu_account_profile_pic : "default.jpg"; ?>" alt="<?php echo $profile_info->ca_firstname . " " . $profile_info->ca_lastname; ?>">
                            </div>
                            <div class="user-info">
                                <h6 class="user-name"><?php echo $profile_info->ca_firstname . " " . $profile_info->ca_lastname; ?></h6>
                                <span class="text-xs text-muted">Balance: <?php echo $website_info->website_currency_symbol; ?><?php if($profile_info->cus_balance == 0){ echo "0.00";} else {echo $profile_info->cus_balance;} ?></span>
                            </div>
                        </li>
                        <li><a href="<?php echo base_url(); ?>my-account">My Account</a></li>
                        <li><a href="<?php echo base_url(); ?>my-account/my-orders">My Orders</a></li>
                        <li><a href="<?php echo base_url(); ?>my-account/my-wishlist">My Wishlist</a></li>
                        <li class="sub-menu-separator"></li>
                        <li><a href="javascript:void(0);" id="signouts"><i class="fa fa-lock"></i> Sign Out</a></li>
                    </ul>
                </div>
                <!-- End Account -->
                <?php endif; ?>
                <!-- Start Cart -->
                <div class="cart">
                    <a href="<?php echo base_url(); ?>shopping-cart"></a>
                    <i class="icon-bag"></i>
                    <?php if($this->session->userdata('cusLogged')): ?>
                    <span class="count" id="loadShopingCartStat"></span>
                    <span class="subtotal" id="loadShopingCartPrice"></span>
                    <?php endif; ?>
                    <?php if($this->session->userdata('cusLogged')): ?>
                    
                    <div class="toolbar-dropdown">
                        <?php if($this->session->userdata('cusLogged')): ?>
                        <div id="loadShopingCarts"></div>
                        
                        <div class="toolbar-dropdown-group">
                            <div class="column">
                                <span class="text-lg">Total:</span>
                            </div>
                            <div class="column text-right">
                                <span class="text-lg text-medium" id="loadShopingCartSubtotal"> </span>
                            </div>
                        </div>
                        <div class="toolbar-dropdown-group">
                            <div class="column">
                                <a class="btn btn-sm btn-block btn-secondary" href="<?php echo base_url(); ?>shopping-cart">View Cart</a>
                            </div>
                            <div class="column">
                                <a class="btn btn-sm btn-block btn-success" href="javascript:void(0);" id="customer-checkout-btn">Checkout</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                <?php endif; ?>
                </div>
                <!-- End Cart -->
            </div>
        </div>
    </div>
    <!-- End Toolbar -->
</header>

<div class="offcanvas-wrapper">