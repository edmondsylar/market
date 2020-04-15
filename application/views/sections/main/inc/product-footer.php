
</div>

<!-- Start Photoswipe Container -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Photoswipe Container -->

<!-- Start Back To Top -->
<a class="scroll-to-top-btn" href="#">
    <i class="icon-arrow-up"></i>
</a>
<!-- End Back To Top -->
<div class="site-backdrop"></div>
<?php if($website_info->lc_code) echo $website_info->lc_code; ?>
<!-- Modernizr JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/modernizr.min.js"></script>
<!-- JQuery JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/bootstrap.min.js"></script>
<!-- CountDown JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/count.min.js"></script>
<!-- Gmap JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/gmap.min.js"></script>
<!-- ImageLoader JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/imageloader.min.js"></script>
<!-- Isotope JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/isotope.min.js"></script>
<!-- NouiSlider JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/nouislider.min.js"></script>
<!-- OwlCarousel JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/owl.carousel.min.js"></script>
<!-- PhotoSwipe UI JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/photoswipe-ui-default.min.js"></script>
<!-- PhotoSwipe JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/photoswipe.min.js"></script>
<!-- Velocity JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/velocity.min.js"></script>
<!-- Main JS -->
<script src="<?php echo base_url(); ?>assets/main/assets/js/script.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/main/assets/js/custom.js"></script>-->
</body>
</html>