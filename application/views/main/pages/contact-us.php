<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>Contact Us</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator"> </li>
                <li>Send Us Message</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Password Recovery -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div id="info"></div>
            <div id="wait"></div>
            <?php $opt = ['id' => 'contact-us', 'class' => 'card mt-4']; ?>
            <?php echo form_open('reset-password', $opt); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" id="username-reset" placeholder="Enter your Full Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email-for-pass" placeholder="Enter your Email address" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="text" name="subject" id="subject" placeholder="Message Subject" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message Content"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="send_msg_btn">Send Message</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Start Password Recovery -->