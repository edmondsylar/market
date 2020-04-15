<?php

error_reporting(1); //Error reporting
session_start();
// Launch your application
if(isset($_GET['launch'])) {
  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
  $redir .= "://".$_SERVER['HTTP_HOST'];
  $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
  $redir = str_replace('install/','',$redir); 
	header( 'Location: ' . $redir) ;
}

// Make File Writeable
if(isset($_GET['fileid'])) {
	
	require_once('includes/Fileactions.php');
	$fileactions = new Fileactions();
	$fileactions->make_writeable($_GET['fileid']);
	header('location: index.php');
}


require_once('includes/Permissions.php');
require_once('includes/database_class.php');
$permissions = new Permissions();
$database = new Database();

if(isset($_GET['step2'])) {

	// Database Configuration File
	$db_config_path = '../application/config/';

	// Install form submitted to install software
	if($_POST) {

		// Load the classes and create the new objects
		require_once('includes/core_class.php');
		$core = new Core();


		// Validate the post data
		if($core->validate_post($_POST) == true)
		{

			// First create the database, then create tables, then write config file
			if($database->database_create($_POST) == false) {
				$message = $core->show_message('error',"The database could not be created, please verify your settings.");
			} else if ($database->tables_create($_POST) == false) {
				$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
			} else if ($core->write_config($_POST) == false) {
				$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
			}

			// If no errors, redirect to registration page
			if(!isset($message)) {

				header('location: index.php?step3');
			}

		}
		else {
			$message = $core->show_message('error','The hostname, username, password, and database name are required.');
		}
	}
}
if(isset($_GET['step3'])) {

	// Install form submitted to install software
	if($_POST) {

		// $email = $database->test_input($_POST['email']);
		// $password = $database->test_input($_POST['password']);

		// $result = $database->insert_login_data($email, $password);

		// if($result){
			header('location: index.php?complete');
		// } else {
		// 	$message = $core->show_message('error','Failed! Please try again.');
		// }

	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Elecom - Electronic Ecommerce Store Installation Wizard.</title>
	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
	<!--Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
	<!-- custom css  -->
    <link rel="stylesheet" href="assets/css/style.css"> 

</head>
<body>
	<div class="installer_content">
	    <h1 class="installer_title"> Welcome To Elecom Installer</h1>
	    <div class="main_content">

	    	<!-- Step 1 Start -->
             <?php  if (isset($_GET['step1']) || (!isset($_GET['step1'])) &&  (!isset($_GET['step2'])) && (!isset($_GET['step3'])) && (!isset($_GET['complete']))) {  
        	?>
                <div class="step1 div1">
                        <h3 class="title text-center">Step 1 - Directory permissions & requirements</h3>
                        <p class="sub-title text-center">(<span class="label label-success">Success</span> = OK, <span class="label label-danger">Error</span> = Not OK - Must be update, <span class="label label-warning">Warning</span> = Optional-can be avoided)</p>
                        <!-- display requirements -->
                        <?php echo $permissions->directoryPermissions(); ?>
                        <?php echo $permissions->server_requirement();      ?>

                    <div class="divider"></div>
                    <a class="btn btn-success btn-next" href="index.php?step2">Next</a>
                </div>
            <?php 
            } 
            ?>
            <!-- End of Step 1 -->



	    <!-- begin of step 2-->
	    <?php  if (isset($_GET['step2']) && (!isset($_GET['step1'])) && !isset($_GET['complete'])) {  
        ?>

        <h3 class="title text-center">Step 2 - Database Information</h3>
	          <hr>

	    <?php if(is_writable($db_config_path)){?>

			  <?php if(isset($message)) { ?>

				<div class="alert alert-danger" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				  <?php echo $message; ?>
				</div>

			  <?php }?>

			<form id="install_form" method="post" action="" enctype="multipart/form-data">
	          <label for="database">Database Name<span class="required">*</span></label>
	          <input type="text" id="database" class="form-control" name="database" />
	          <label for="username">Username<span class="required">*</span></label><input type="text" id="username" class="form-control" name="username" />
	          <label for="password">Password<span class="required">*</span></label><input type="password" id="password" class="form-control" name="password" />
	          <label for="hostname">Host name<span class="required">*</span></label><input type="text" id="hostname" value="localhost" class="form-control" name="hostname" />

	          <div class="divider"></div>

	          <div class="row submit-div">
	          	<div class="col-md-12">
	          		<a href="index.php?step1" class="btn btn-primary pull-left cbtn1">Previous</a>
	          		<input type="submit" value="Next" class="btn btn-success pull-right cbtn2" />
	          	</div>
	          </div>
	          
			  </form>

		  <?php } else { ?>
	      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
		  <?php }  }?>
		<!-- ends of step2 -->

		<!-- Step 3 Start -->
         <?php  if (isset($_GET['step3'])) {  
        ?>
            <div class="step1 div1">
                    <h3 class="title text-center">Step 3 - Login Information</h3>
					<p><h4 class="text-center">Helere are your admin login information</h4></p>
                    <hr>
                    <?php if(isset($message)) { ?>
					<div class="alert alert-danger" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					  <?php echo $message; ?>
					</div>

				  <?php }?>

                    <form class="form-horizontal" method="POST" action="">
					  <div class="form-group">
					    <label for="email" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" name="email" id="email" value="admin@admin.com" placeholder="Email" required >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="password" id="password" value="admin1234" placeholder="Password"  required >
					    </div>
					  </div>
					   <div class="row submit-div">
			          	<div class="col-md-12">
			          		<a href="index.php?step2" class="btn btn-primary pull-left cbtn1">Previous</a>
			          		<input type="submit" value="Next" class="btn btn-success pull-right cbtn2" />
			          	</div>
			          </div>
					</form>
            </div>
            <?php 
            } 
            ?>
            <!-- End of Step 3 -->


		<!--complete installation-->
        <?php if (isset($_GET['complete'])) { ?>

        	<div class="step3">

	            <h2 class="title">Installation complete</h2> 
	            
	            <div class="alert alert-success">
	                <strong>Your application installed successfully !!!</strong>
	            </div>

	            <div class="divider"></div>

	            <h3 class="red" id="btn-before">&nbsp;</h3>
	            <div class="hide" id="btn-complete">
	                <a href="index.php?launch" class="btn btn-green">Click to launch your application </a>
	            </div>
        	</div>
        <?php } ?>
        <!-- End of installation -->


		 </div>
	</div>
<!-- start of javascript  -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    var wait = 11000; //10 second

    var time = 10;
    setInterval(function(){
     $("#btn-before").html("You need to wait "+time+" second before you can proceed");
     time--;
    }, 1000);

    setTimeout(function() {
        $("#btn-before").addClass('hide');
        $("#btn-complete").removeClass('hide');
    }, wait);

});
</script>
<!-- ends of javascript -->
</body>
</html>
