<div class="col-lg-4">
<aside class="user-info-wrapper">
    <div class="user-cover account-details">
        <div class="info-label" data-toggle="tooltip" title="You currently have <?php echo $website_info->website_currency_symbol; ?><?php if($profile_info->cus_balance == 0){ echo "0.00";} else {echo $profile_info->cus_balance;} ?> Total balance on your Account To Shop"><i class="icon-medal"></i>Bal: <?php echo $website_info->website_currency_symbol; ?><?php if($profile_info->cus_balance == 0){ echo "0.00";} else {echo $profile_info->cus_balance;} ?></div>
    </div>
    <div class="user-info">
        <div class="user-avatar"><a class="edit-avatar" id="change-photo" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Change Profile Pic"></a><img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $profile_info->cu_account_profile_pic ? $profile_info->cu_account_profile_pic : "default.jpg"; ?>" alt="User"></div>
        <div class="user-data">
            <h4><?php echo $profile_info->ca_firstname . " " . $profile_info->ca_lastname; ?></h4><span>Joined <?php echo $profile_info->ca_create_month; ?> <?php echo $profile_info->ca_create_day; ?> <?php echo $profile_info->ca_create_year; ?></span>
        </div>
    </div>
</aside>
<nav class="list-group">
<a class="list-group-item<?php if( ! $this->uri->segment(2) AND $this->uri->segment(1) == 'my-account') echo ' active'; ?>" href="<?php echo base_url(); ?>my-account"><i class="icon-head"></i>My Profile</a>
<a class="list-group-item<?php if($this->uri->segment(2) == 'my-orders') echo ' active'; ?> with-badge" href="<?php echo base_url(); ?>my-account/my-orders"><i class="icon-bag"></i>My Orders<?php if($count_order) echo'<span class="badge badge-primary badge-pill">'.$count_order.'</span>'; ?></a>
<a class="list-group-item<?php if($this->uri->segment(2) == 'my-addresses') echo ' active'; ?>" href="<?php echo base_url(); ?>my-account/my-addresses"><i class="icon-map"></i>My Addresses</a>
<a class="list-group-item<?php if($this->uri->segment(2) == 'my-wishlist') echo ' active'; ?> with-badge" href="<?php echo base_url(); ?>my-account/my-wishlist"><i class="icon-heart"></i>My Wishlist<?php if($wishlist_stat) echo'<span class="badge badge-primary badge-pill">'.$wishlist_stat.'</span>'; ?></a>
<a class="list-group-item <?php if($this->uri->segment(2) == 'my-review') echo ' active'; ?>" href="<?php echo base_url(); ?>my-account/my-review"><i class="icon-tag"></i>My Review</a>
</nav>
</div>