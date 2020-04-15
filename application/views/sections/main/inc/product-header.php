<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $google_meta_tag = $this->google_tools->googleTools()->gt_meta_tags;
    if($google_meta_tag):
    ?> 
    <meta name="google-site-verification" content="<?php echo $google_meta_tag; ?>">
    <?php endif; ?>
    <title>Purchase <?php echo $show_product->product_name; ?> From <?php echo $website_info->website_title; ?></title>
    <!-- Mobile Specific Meta Tag -->
    <meta name="description" content="<?php echo $show_product->product_meta_description ?>">
    <meta name="keyword" content="<?php echo $show_product->product_meta_keyword ?>">
    <meta name="og:image" content="<?php echo base_url(); ?>statics/shops/products/<?php echo $show_product->product_show ?>">
    <meta name="theme-color" content="<?php echo $website_info->website_color; ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>statics/uploads/pref_settings/favicon.png">
    <!-- Bootsrap CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/font-awesome.min.css">
    <!-- Feather Icons CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/feather-icons.css">
    <!-- Pixeden Icons CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/pixeden.css">
    <!-- Social Icons CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/socicon.css">
    <!-- PhotoSwipe CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/photoswipe.css">
    <!-- Izitoast Notification CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/izitoast.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/style.css">
</head>
<body>
<!-- Start Page Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>