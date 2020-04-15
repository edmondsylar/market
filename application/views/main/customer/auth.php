<style>
#register {
    display:none;
}
</style>
<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Login / Register</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>Login / Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="container padding-top-1x padding-bottom-3x">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
            <div id="login">
                <?php
                    $form_log = ['id' => 'log-id', 'class' => 'login-box'];
                    echo form_open('login', $form_log);
                ?>
                    <h4 class="margin-bottom-1x">Sign In Into Your Account</h4>
                    <div class="row margin-bottom-1x">
                        <div class="col-xl-6 col-6 col-md-6 col-sm-6"><a class="btn btn-sm btn-block facebook-btn" href="javascript:void(0);">Login Account</a></div>
                        <div class="col-xl-6 col-6 col-md-6 col-sm-6"><a class="btn btn-sm btn-block twitter-btn" id="signup" href="javascript:void(0);">Create Account</a></div>
                    </div>
                    <h4 class="margin-bottom-1x">Provide your Login Details</h4>
                    <div id="log-info"></div>
                    <div id="log-wait"></div>
                    <div class="form-group input-group">
                        <input name="log-email" class="form-control" type="text" placeholder="Enter E-Mail" required><span class="input-group-addon"><i class="icon-mail"></i></span>
                    </div>
                    <div class="form-group input-group">
                        <input name="log-password" class="form-control" type="password" placeholder="Enter Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="remember_me">
                            <label class="custom-control-label" for="remember_me">Remember Me</label>
                        </div><a class="navi-link" href="<?php echo base_url(); ?>lost-password">Forgot Password?</a>
                    </div>
                    <div class="text-center text-sm-right">
                        <button id="log-btn" class="btn btn-primary margin-bottom-none" type="submit">Login</button>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <div id="register">
                <div class="padding-top-3x hidden-md-up"></div>
                <h4 class="margin-bottom-1x">Create A New Account With Us</h4>
                <div class="row margin-bottom-1x">
                    <div class="col-xl-6 col-6 col-md-6 col-sm-6"><a class="btn btn-sm btn-block facebook-btn" id="signin" href="javascript:void(0);">Login Account</a></div>
                    <div class="col-xl-6 col-6 col-md-6 col-sm-6"><a class="btn btn-sm btn-block twitter-btn" href="javascript:void(0);">Create Account</a></div>
                </div>
                <h4 class="margin-bottom-1x">Fill in the field below to create your Account</h4>
                <div id="reg-info"></div>
                <div id="reg-wait"></div>
                <?php
                $reg_opt = ['id' => 'reg', 'class' => 'row'];
                echo form_open('register', $reg_opt);
                ?> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-fn">First Name</label>
                            <input name="ca_firstname" class="form-control" type="text" id="reg-fn" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-ln">Last Name</label>
                            <input name="ca_lastname" class="form-control" type="text" id="reg-ln" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-email">E-Mail Address</label>
                            <input name="ca_email" class="form-control" type="email" id="reg-email" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-phone">Username</label>
                            <input name="ca_username" class="form-control" type="text" id="reg-phone" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-pass">Password</label>
                            <input name="ca_password" class="form-control" type="password" id="reg-pass" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-pass-confirm">Confirm Password</label>
                            <input name="confirm_password" class="form-control" type="password" id="reg-pass-confirm" required>
                        </div>
                    </div>
                    <div class="col-12 text-center text-sm-right">
                        <button id="reg-button" class="btn btn-primary margin-bottom-none" type="submit">Register</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>