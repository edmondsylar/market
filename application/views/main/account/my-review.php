<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1>My Review</h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="separator">&nbsp;</li>
                <li>My Review</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start Contacts & Shipping Address -->
<div class="container padding-top-1x padding-bottom-3x">
    <div class="row">
    <?php $this->load->view('sections/main/inc/profile-sidebar'); ?>
        <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div id="my-account-wait"></div>
            <div id="my-account-info"></div>
            <h4>My Review</h4>
            <hr class="padding-bottom-1x">
            <div id="review-info"></div>
            <div id="review-wait"></div>
            <?php if($can_post_review): ?>
            <?php if($once_review): ?>
            <?php
            $opts = ['id' => 'my-review-form', 'class' => 'row'];
            echo form_open('update-review', $opts);
            ?>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="testi_rating">Review Rating</label>
                      <select class="form-control" name="testi_rating">
                        <option value="1" <?php if($once_review->testi_rating == 1) echo 'selected'; ?>>1 Star</option>
                        <option value="2" <?php if($once_review->testi_rating == 2) echo 'selected'; ?>>2 Star</option>
                        <option value="3" <?php if($once_review->testi_rating == 3) echo 'selected'; ?>>3 Star</option>
                        <option value="4" <?php if($once_review->testi_rating == 4) echo 'selected'; ?>>4 Star</option>
                        <option value="5" <?php if($once_review->testi_rating == 5) echo 'selected'; ?>>5 Star</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="account-company">My Review Contents</label>
                          <textarea class="form-control" name="testi_content" rows="10"><?php echo $once_review->testi_content; ?></textarea>
                    </div>
                </div>
                    <hr class="margin-top-1x margin-bottom-1x">
                    <div class="text-right">
                        <button class="btn btn-primary margin-bottom-none" type="submit" id="my-review-btn">Update Review</button>
                    </div>
                </div>
            <?php echo form_close(); ?>

            <?php else: ?>
            <?php
            $opts = ['id' => 'my-review-form', 'class' => 'row'];
            echo form_open('update-review', $opts);
            ?>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="testi_rating">Review Rating</label>
                      <select class="form-control" name="testi_rating">
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="account-company">My Review Contents</label>
                          <textarea class="form-control" name="testi_content" rows="10"></textarea>
                    </div>
                </div>
                    <hr class="margin-top-1x margin-bottom-1x">
                    <div class="text-right">
                        <button class="btn btn-primary margin-bottom-none" type="submit" id='my-review-btn'>Submit Review</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <!-- End Contacts & Shipping Address -->
<div id="show" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-message="Your profile has been updated successfuly."></div>
<div id="error" data-toast-icon="icon-circle-check" data-toast-title="Error!" data-toast data-toast-position="topRight" data-toast-type="danger" data-toast-message="Your profile is not updated!."></div>