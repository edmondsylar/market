<?php
defined('BASEPATH') OR exit('Not allowed');
?>
<!doctype html>
<html lang="en">


<head>
<meta charset="utf-8">
<title>We Are Under Maintainance</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="<?php echo $website_info->website_description; ?>">
<meta name="keyword" content="<?php echo $website_info->website_keyword; ?>">
<meta name="theme-color" content="<?php echo $website_info->website_color; ?>">

<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>statics/uploads/pref_settings/favicon.png">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/auth/css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/auth/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/auth/css/toastr/toastr.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/auth/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/auth/css/color_skins.css">
</head>

<body class="theme-green">

<div id="wrapper">

    <div class="vertical-align-wrap">
        <div class="vertical-align-middle maintenance">

        <div class="text-center">
            <article>
                <h1>We&rsquo;ll be back soon!</h1>
                <div>
                    <p>Sorry for the inconvenience<br> but we&rsquo;re performing some maintenance at the moment.<br> If you need to you can always <a href="mailto:<?php echo $website_info->website_email; ?>">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
                    <p>&mdash; The Team</p>
                </div>
            </article>
        </div>
        </div>
    </div>
    
</div>
</html>
