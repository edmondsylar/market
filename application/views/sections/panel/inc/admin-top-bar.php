<div class="navbar-custom navbar-custom-light">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <h4><span class="greeting"></span> <?php echo $myProfile->admin_firstname; ?></h4>
                </div>
            </form>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $myProfile->admin_profile_picture ? $myProfile->admin_profile_picture : 'default.jpg'; ?>" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php echo ucfirst($myProfile->admin_username); ?> <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="<?php echo base_url(); ?>admin/edit_admin/<?php echo $myProfile->admin_username; ?>" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="<?php echo base_url(); ?>auth/admin_logout" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="<?php echo base_url(); ?>admin" class="logo text-center">
            <span class="logo-lg">
                <img src="<?php echo base_url(); ?>assets/panel/assets/images/logo-dark.png" alt="" height="18">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="<?php echo base_url(); ?>assets/panel/assets/images/logo-sm.png" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>