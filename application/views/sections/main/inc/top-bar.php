<div class="topbar">
    <div class="topbar-column">
        <a class="hidden-md-down" href="#"><i class="fa fa-phone"></i> <?php echo $website_info->website_number; ?></a>
        <a class="hidden-md-down" href="#"><i class="fa fa-envelope-o"></i> <?php echo $website_info->website_email; ?></a>
        <a class="hidden-md-down" href="#"><i class="fa fa-map-marker"></i> <?php echo $website_info->website_address; ?></a>
    </div>
    <div class="topbar-column">
        <div class="lang-currency-switcher-wrap">
            <div class="lang-currency-switcher">
                <?php if( ! $this->session->userdata('cusLogged')): ?>
                <a href="<?php echo base_url(); ?>authentication"><span class="currency">Login/Register</span></a>
                <?php endif; ?>
                <span class="currency"><?php echo $website_info->website_currency_symbol . " " . $website_info->website_currency; ?></span>
            </div>
        </div>
        <?php if($website_info->website_facebook != NULL): ?>
        <a class="social-button sb-facebook shape-none sb-dark soc-border" href="<?php echo $website_info->website_facebook; ?>" target="_blank"><i class="socicon-facebook"></i></a>
        <?php endif; ?>
        <?php if($website_info->website_twitter != NULL): ?>
        <a class="social-button sb-twitter shape-none sb-dark" href="<?php echo $website_info->website_twitter; ?>" target="_blank"><i class="socicon-twitter"></i></a>
        <?php endif; ?>
        <?php if($website_info->website_instagram != NULL): ?>
        <a class="social-button sb-instagram shape-none sb-dark" href="<?php echo $website_info->website_twitter; ?>" target="_blank"><i class="socicon-instagram"></i></a>
        <?php endif; ?>
    </div>
</div>