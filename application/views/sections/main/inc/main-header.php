<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <?php if($this->uri->segment(1) == 'pages'): ?>
    <title><?php echo $page_show->page_title; ?> - <?php echo $website_info->website_name; ?></title>
    <?php else: ?>
    <title><?php echo $website_info->website_title; ?></title>
    <?php endif; ?>
    <!-- Mobile Specific Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $google_meta_tag = $this->google_tools->googleTools()->gt_meta_tags;
    if($google_meta_tag):
    ?> 
    <meta name="google-site-verification" content="<?php echo $google_meta_tag; ?>">
    <?php endif; ?>
    <meta name="description" content="<?php echo $website_info->website_description; ?>">
    <meta name="keyword" content="<?php echo $website_info->website_keyword; ?>">
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
    <link href="<?php echo base_url(); ?>assets/panel/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Izitoast Notification CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/izitoast.css">
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/animate.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/main/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/main/assets/css/geodatasource-countryflag.css">
    <link rel="gettext" type="application/x-po" href="<?php echo base_url(); ?>assets/main/languages/en/LC_MESSAGES/en.po" />
    <?php if($this->uri->segment(2) == 'payment'): ?>
    <style>
        .input-hidden {
        position: absolute;
        left: -9999px;
        }

        input[type=radio]:checked + label>img {
        border: 1px solid #fff;
        box-shadow: 0 0 3px 3px #090;
        }

        /* Stuff after this is only to make things more pretty */
        input[type=radio] + label>img {
        border: 1px dashed orange;
        width: 650px;
        height: 150px;
        transition: 500ms all;
        }

        input[type=radio]:checked + label>img {
        transform: 
            rotateZ(-10deg) 
            rotateX(10deg);
        }

        /*
        | //lea.verou.me/css3patterns
        | Because white bgs are boring.
        */
        html {
        background-color: #fff;
        background-size: 100% 1.2em;
        background-image: 
            linear-gradient(
            90deg, 
            transparent 79px, 
            #abced4 79px, 
            #abced4 81px, 
            transparent 81px
            ),
            linear-gradient(
            #eee .1em, 
            transparent .1em
            );
        }
    </style>
    <?php endif; ?>
    <?php if($this->uri->segment(2) == 'complete'): ?>
    <script language="JavaScript" type="text/javascript">
    var seconds =10;
    var url="<?php echo base_url(); ?>checkout/order_comp";

    function redirect(){
    if (seconds <=0){
    // redirect to new url after counter  down.
    window.location = url;
    }else{
    seconds--;
    document.getElementById("pageInfo").innerHTML = "<h3 class='text-center'>You will be Redirect in "+seconds+" seconds <br>Please calm while we Confirm your order.</h3>"
    setTimeout("redirect()", 1000)
    }
    }
    </script>
    <?php endif; ?>
</head>
<body>
<div id="logout"></div>
<!-- Start Page Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>