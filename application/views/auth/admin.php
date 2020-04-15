<?php
defined('BASEPATH') OR exit('Not allowed');
?>
<!doctype html>
<html lang="en">


<head>
<meta charset="utf-8">
<title>Admintrative Login - Elecom E-commerce Store</title>
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
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="<?php echo base_url(); ?>assets/auth/images/elecom-logo.png" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Access Control Panel</p>
                        </div>
                        <div class="body">
                            <div id="log-wait"></div>
                            <div id="log-info"></div>
                            <?php 
                            $opt = ['id' => 'login', 'class' => 'form-auth-small'];
                            echo form_open('authenticate', $opt);
                            ?>
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="signin-email" placeholder="Your Email Address" autofocus="on" required>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" placeholder="Your Password" required>
                                </div>
                                <button type="submit" id="log-btn" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->


    <script src="<?php echo base_url(); ?>assets/auth/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/auth/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url(); ?>assets/auth/js/toastr/toastr.js"></script>


<script>
$(document).ready(function() {

    $('#login').on('submit', function(e) {
        e.preventDefault();
        $('#log-info').hide();
        $('#log-wait').fadeIn().html('<div class="alert alert-info" align="center">Authenticating</div>');
        $('#log-btn').prop('disabled', true);
        $('#log-btn').slideUp();

        $.ajax({
            url: '<?php echo base_url(); ?>auth/admin_log',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#signin-password').val("");
                $('#log-wait').fadeOut(function() {
                    $('#log-info').show().html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#log-btn').prop('disabled', false);
            $('#log-btn').slideDown();
        });
    });
});
</script>
</body>
</html>
