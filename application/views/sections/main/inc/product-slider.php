<?php if($load_sliders): ?>
<div class="hero-slider home-1-hero">
    <div class="owl-carousel large-controls dots-inside" data-owl-carousel='{"nav": true, "dots": true, "loop": true, "autoplay": true, "autoplayTimeou": 7000}'>
        <?php foreach($load_sliders as $slider): ?>
        <!-- Start Slide -->
        <div class="item">
            <div class="container padding-top-3x">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center hidden-md-down">
                        <div class="from-bottom">
                            <div class="h2 text-body text-normal mb-2 pt-1"><?php echo $slider->psa_description; ?></div>
                        </div>
                        <?php if($slider->psa_link != NULL): ?>
                        <a class="btn btn-primary scale-up delay-1" href="<?php echo $slider->psa_link; ?>"><?php echo $slider->psa_button_text; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 padding-bottom-2x mb-3">
                        <img class="d-block mx-auto" src="<?php echo base_url(); ?>statics/sliders/products/<?php echo $slider->psa_image; ?>" alt="Slider">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slide -->
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>