<?php if($get_testi): ?>
<!-- Grid row -->
<div class="row">

<?php foreach($get_testi as $testi): ?>
<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-md-0 mb-4">
  <!--Card-->
  <div class="wow fadeInLeft testi-card testimonial-card">
    <!--Background color-->
    <div class="card-up blue-gradient">
    </div>
    <!--Avatar-->
    <div class="avatar mx-auto white">
      <img src="<?php echo base_url(); ?>statics/user_data/profile_pictures/<?php echo $testi->cu_account_profile_pic ? $testi->cu_account_profile_pic : "default.jpg"; ?>" class="rounded-circle img-fluid">
    </div>
    <div class="card-body">
      <!--Name-->
      <h4 class="font-weight-bold mb-4"><?php echo $testi->ca_firstname . ' ' . $testi->ca_lastname; ?></h4>
      <hr>
      <!--Quotation-->
      <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i><?php echo $testi->testi_content; ?></p>
        <hr>
        <div class="rating-stars">
        <?php if($testi->testi_rating == 1): ?>
        <i class="icon-star filled"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <?php elseif($testi->testi_rating == 2): ?>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <?php elseif($testi->testi_rating == 3): ?>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <?php elseif($testi->testi_rating == 4): ?>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star"></i>
        <?php elseif($testi->testi_rating == 5): ?>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <i class="icon-star filled"></i>
        <?php endif; ?>
        </div>
    </div>
  </div>
  <!--Card-->
</div>
<!--Grid column-->
<?php endforeach; ?>



</div>
<!-- Grid row -->
<?php endif; ?>