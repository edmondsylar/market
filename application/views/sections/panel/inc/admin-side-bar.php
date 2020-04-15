<div class="left-side-menu">

<div class="slimscroll-menu">

<!--- Sidemenu -->
<div id="sidebar-menu">

<ul class="metismenu" id="side-menu">

    <li class="menu-title">Navigation</li>

    <li>
        <a href="<?php echo base_url(); ?>admin">
            <i class="fe-airplay"></i>
            <span> Dashboard </span>
        </a>
    </li>

    <li class="menu-title">Product & Shop</li>

    <li>
        <a href="javascript:void(0);">
        <i class="fe-folder"></i>
        <span>Product Categories</span>
        </a>
        <ul  class="nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo base_url(); ?>admin/categories/main-categories">Main Categories</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/categories/sub-categories">Sub Categories</a>
            </li>
        </ul>

    </li>

    <li>
        <a href="<?php echo base_url(); ?>admin/product_brands">
            <i class="fe-sunrise"></i>
            <span> Product Brands </span>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url(); ?>admin/store">
            <i class="mdi mdi-shopify"></i>
            <span> Product Lists </span>
        </a>
    </li>

    <li class="menu-title">Users Area</li>

    <li>
        <a href="<?php echo base_url(); ?>admin/admins">
            <i class="fe-user"></i>
            <span>Admin Accounts</span>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url(); ?>admin/customers">
            <i class="fe-users"></i>
            <span>Customer Accounts</span>
        </a>
    </li>

    <li class="menu-title">Orders</li>

    <li>
        <a href="<?php echo base_url(); ?>admin/customer_orders">
            <i class="fas fa-money-bill"></i>
            <span> Customer Orders </span>
        </a>

        <a href="<?php echo base_url(); ?>admin/payment_received">
            <i class="fas fa-dollar-sign"></i>
            <span> Payment Received </span>
        </a>
    </li>

    <li class="menu-title">Slide Menu</li>

    <li>
        <a href="<?php echo base_url(); ?>admin/product_advert_slider">
            <i class="mdi mdi-animation"></i>
            <span> Product Advert Slider </span>
        </a>
    </li>

    <li class="menu-title">Email Sending</li>

    <li>
        <a href="javascript: void(0);">
            <i class="fas fa-envelope"></i>
            <span> Email Templates </span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo base_url(); ?>admin/email_template/welcome-email">Welcome Email</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/email_template/activation-email">Activation Email</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/email_template/change-pass-noti">Change Pass Noti</a>
            </li>

        </ul>
    </li>

    <li class="menu-title">Website Section</li>

    <li>
        <a href="<?php echo base_url(); ?>admin/shop_setup">
            <i class=" mdi mdi-store"></i>
            <span> Shops SetUp </span>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url(); ?>admin/payment_gateways">
            <i class=" fas fa-money-bill"></i>
            <span> Payment Gateways </span>
        </a>
    </li>

    <li>
        <a href="javascript: void(0);">
            <i class="far fa-comments"></i>
            <span> Testimonials </span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">

            <li>
                <a href="<?php echo base_url(); ?>admin/testimonial/approved">Approved</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/testimonial/pending">Pending</a>
            </li>
        </ul>
    </li>

    <li class="menu-title">Website Pages</li>
    
    <li>
        <a href="javascript: void(0);">
            <i class="fe-globe"></i>
            <span> Pages </span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">

            <li>
                <a href="<?php echo base_url(); ?>admin/pages">Create New</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/pages/about-us">About Us</a>
            </li>

            <?php if($cus_pages): ?>
            <?php foreach($cus_pages as $page): ?>
            <li>
                <a href="<?php echo base_url(); ?>admin/pages/<?php echo $page->page_slug; ?>"><?php echo $page->page_title; ?></a>
            </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </li>    

    <li class="menu-title">Website Setup</li>

    <li>
        <a href="javascript: void(0);">
            <i class="fe-settings"></i>
            <span> Settings </span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo base_url(); ?>admin/settings/prefrences">Prefrences Settings</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/settings/email-settings">Email Settings</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/settings/editors">Editors</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/settings/value-added-tax">Value Added Tax</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/settings/livechat">Live Chat</a>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/settings/google-tags">Google Tools</a>
            </li>
        </ul>
    </li>
</ul>

</div>
</div>
</div>
</div>

<div class="content-page">