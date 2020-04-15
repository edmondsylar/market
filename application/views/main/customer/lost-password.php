<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Lost Password</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator"> </li>
                <li>Password Recovery</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Password Recovery -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <h2>Forgot your password?</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ol class="list-unstyled">
                <li><span class="text-primary text-medium">1. </span>Fill in your email address below.</li>
                <li><span class="text-primary text-medium">2. </span>Fill in your account username.</li>
                <li><span class="text-primary text-medium">3. </span>Wait while whe generate a new password for you</li>
            </ol>
            <div id="p-info"></div>
            <div id="p-wait"></div>
            <?php $opt = ['id' => 'reset-pass', 'class' => 'card mt-4']; ?>
            <?php echo form_open('reset-password', $opt); ?>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="pass_user" id="username-reset" placeholder="Enter your Username" required>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" type="email" name="pass_email" id="email-for-pass" placeholder="Enter your Email address" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="reset-pass_btn">Get New Password</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Start Password Recovery -->