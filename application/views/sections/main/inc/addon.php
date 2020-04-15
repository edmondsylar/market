<script>
$(document).ready(function() {
    //sign out customer
    $('#signout').click(function() {
        $.ajax({
            url: '<?php echo base_url(); ?>logout/signout',
            success: function(data) {
                $('#logout').html(data);
            }
        });
    });

    $('#signouts').click(function() {
        $.ajax({
            url: '<?php echo base_url(); ?>logout/signout',
            success: function(data) {
                $('#logout').html(data);
            }
        });
    });

    //check
    $('#customer-checkout-btn').on('click', function() {
        window.location.href='<?php echo base_url(); ?>checkout/prepare';
    });

    //load testimonials
    function loadAllTesti() {
        $.get("<?php echo base_url(); ?>home/ajax_load_testi", function(data) {
            $('#list_testi').html(data);
            });
    }
    setInterval(function(){
        loadAllTesti();
    },6000);

    //adding product to wishlist
    <?php if( ! $this->uri->segment(1)): ?>
        <?php if($fresh_products): ?>
        <?php foreach($fresh_products as $wishfresh): ?>
        $('#wishLogin<?php echo $wishfresh->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#cart_add_login<?php echo $wishfresh->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#wishAdd<?php echo $wishfresh->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $wishfresh->product_id; ?>',
                success:function(data){
                    $('#addWithAlert').html(data);
                }
            });
        });

        $('#fresh_add_to_cart<?php echo $wishfresh->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $wishfresh->product_id; ?>',
                success:function(data) {
                    $('#addCartDone').html(data);
                }
            });
        });
        <?php endforeach; ?>
        <?php endif; ?>

        <?php if($home_featured_products): ?>
        <?php foreach($home_featured_products as $feas): ?>
        $('#wishFeLogin<?php echo $feas->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#cart_add_login_fe<?php echo $feas->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#wishAddFea<?php echo $feas->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $feas->product_id; ?>',
                success:function(data){
                    $('#addWithAlert').html(data);
                }
            });
        });

        $('#fresh_add_to_cart_fe<?php echo $feas->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $feas->product_id; ?>',
                success:function(data) {
                    $('#addCartDone').html(data);
                }
            });
        });
        <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == 'shop-category' && $this->uri->segment(2)): ?>
        <?php if($cat_products): ?>
            <?php foreach($cat_products as $add_cat_p): ?>
            $('#wishFeLoginCat<?php echo $add_cat_p->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#cart_add_login_cat<?php echo $add_cat_p->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#wishAddCat<?php echo $add_cat_p->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $add_cat_p->product_id; ?>',
                    success:function(data){
                        $('#addWithAlert').html(data);
                    }
                });
            });

            $('#fresh_add_to_cart_cat<?php echo $add_cat_p->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $add_cat_p->product_id; ?>',
                    success:function(data) {
                        $('#addCartDone').html(data);
                    }
                });
            });
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == 'stock'): ?>
        <?php if($get_all_home_products): ?>
            <?php foreach($get_all_home_products as $add_stock_p): ?>
            $('#wishFeLoginStock<?php echo $add_stock_p->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#cart_add_login_stock<?php echo $add_stock_p->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#wishAddStock<?php echo $add_stock_p->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $add_stock_p->product_id; ?>',
                    success:function(data){
                        $('#addWithAlert').html(data);
                    }
                });
            });

            $('#fresh_add_to_cart_stock<?php echo $add_stock_p->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $add_stock_p->product_id; ?>',
                    success:function(data) {
                        $('#addCartDone').html(data);
                    }
                });
            });
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    //loading shoping carts
    <?php if($this->session->userdata('cusLogged')): ?>
        function loadShopingCarts() {
            $.get("<?php echo base_url(); ?>home/ajax_load_carts", function(data) {
                $('#loadShopingCarts').html(data);
            });
        }
        setInterval(function(){
            loadShopingCarts();
        },500);

        function loadShopingCartStat() {
            $.get("<?php echo base_url(); ?>home/ajax_cart_stat", function(data) {
                $('#loadShopingCartStat').html(data);
            });
        }
        setInterval(function(){
            loadShopingCartStat();
        },500);

        function loadShopingCartPrice() {
            $.get("<?php echo base_url(); ?>home/get_cart_total", function(data) {
                $('#loadShopingCartPrice').html(data);
            });
        }
        setInterval(function(){
            loadShopingCartPrice();
        },500);

        function loadShopingCartSubtotal() {
            $.get("<?php echo base_url(); ?>home/get_cart_total", function(data) {
                $('#loadShopingCartSubtotal').html(data);
            });
        }
        setInterval(function(){
            loadShopingCartSubtotal();
        },500);

       
    <?php endif; ?>

    //single product view
    //adding product to wishlist
    <?php if($this->uri->segment(1) == 'product' AND $this->uri->segment(2)): ?>
        <?php if($show_product): ?>
        $('#wishLogin<?php echo $show_product->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#cart_add_login<?php echo $show_product->product_id; ?>').on('click', function() {
            window.location.href='<?php echo base_url(); ?>authentication';
        });

        $('#wishAdd<?php echo $show_product->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $show_product->product_id; ?>',
                success:function(data){
                    $('#addWithAlert').html(data);
                }
            });
        });

        $('#fresh_add_to_cart<?php echo $show_product->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $show_product->product_id; ?>',
                success:function(data) {
                    $('#addCartDone').html(data);
                }
            });
        });
        <?php endif; ?>

        
    <?php endif; ?>

    //actions from shop categories
    <?php if($this->uri->segment(1) == 'shop-category' AND $this->uri->segment(2)): ?>
        <?php if($cat_products): ?>
            <?php foreach($cat_products as $wishfresh): ?>
            $('#wishLogin<?php echo $wishfresh->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#cart_add_login<?php echo $wishfresh->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#wishAdd<?php echo $wishfresh->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $wishfresh->product_id; ?>',
                    success:function(data){
                        $('#addWithAlert').html(data);
                    }
                });
            });

            $('#fresh_add_to_cart<?php echo$wishfresh->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $wishfresh->product_id; ?>',
                success:function(data) {
                    $('#addCartDone').html(data);
                }
            });
        });
            <?php endforeach; ?>
            <?php endif; ?>
    <?php endif; ?>

    //actions from all product
    <?php if($this->uri->segment(1) == 'stock'): ?>
        <?php if($get_all_home_products): ?>
            <?php foreach($get_all_home_products as $wishfresh): ?>
            $('#wishLogin<?php echo $wishfresh->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#cart_add_login<?php echo $wishfresh->product_id; ?>').on('click', function() {
                window.location.href='<?php echo base_url(); ?>authentication';
            });

            $('#wishAdd<?php echo $wishfresh->product_id; ?>').on('click', function() {
                $.ajax({
                    url: '<?php echo base_url(); ?>product/add_wishlist/<?php echo $wishfresh->product_id; ?>',
                    success:function(data){
                        $('#addWithAlert').html(data);
                    }
                });
            });

            $('#fresh_add_to_cart<?php echo$wishfresh->product_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>product/add_to_cart/<?php echo $wishfresh->product_id; ?>',
                success:function(data) {
                    $('#addCartDone').html(data);
                }
            });
        });
            <?php endforeach; ?>
            <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) AND $this->uri->segment(1) == 'authentication'): ?>
        $('#signup').click(function() {
            $('#login').fadeOut(function() {
                $('#register').fadeIn('slow');
            });
        });

        $('#signin').click(function() {
            $('#register').fadeOut(function() {
                $('#login').fadeIn('slow');
            });
        });

        //now let process registration
        $('#reg').on('submit', function(reg) {
            reg.preventDefault();
            $('#reg-info').hide();
            $('#reg-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Registration In process</p></div>');
            $('#reg-button').removeClass('btn-primary');
            $('#reg-button').addClass('btn-default');
            $('#reg-button').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>customer/register',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('form').trigger('reset');
                    $('#reg-wait').fadeOut(function() {
                        $('#reg-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#reg-button').removeClass('btn-default');
                $('#reg-button').addClass('btn-primary');
                $('#reg-button').prop('disabled', false);
            });
        });

        //Now let enable customer to login thir account
        $('#log-id').on('submit', function(login) {
            login.preventDefault();
            $('#log-info').hide();
            $('#log-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center"><b>Authenticating...</b></p></div>');
            $('#log-btn').removeClass('btn-primary');
            $('#log-btn').addClass('btn-default');
            $('#log-btn').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>customer/login',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('form').trigger('reset');
                    $('#log-wait').fadeOut(function() {
                        $('#log-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#log-btn').removeClass('btn-default');
                $('#log-btn').addClass('btn-primary');
                $('#log-btn').prop('disabled', false);
            });

        });
    <?php endif; ?>

    //Let verify account here
    <?php if($this->uri->segment(1) AND $this->uri->segment(1) == 'activate-account'): ?>
        $('#v_id').on('submit', function(v) {
            v.preventDefault();
            $('#v-info').hide();
            $('#v-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Checking Verification Code...</p></div>');
            $('#v-button').removeClass('btn-primary');
            $('#v-button').addClass('btn-default');
            $('#v-button').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>account-verify',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('form').trigger('reset');
                    $('#v-wait').fadeOut(function() {
                        $('#v-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#v-button').removeClass('btn-default');
                $('#v-button').addClass('btn-primary');
                $('#v-button').prop('disabled', false);
            });
        });

    
    <?php endif; ?>

    <?php if($this->uri->segment(1) == 'lost-password'): ?>
        $('#reset-pass').on('submit', function(v) {
            v.preventDefault();
            $('#p-info').hide();
            $('#p-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Checking Information Please Wait...</p></div>');
            $('#reset-pass_btn').removeClass('btn-primary');
            $('#reset-pass_btn').addClass('btn-default');
            $('#reset-pass_btn').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>customer/reset_password',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('form').trigger('reset');
                    $('#p-wait').fadeOut(function() {
                        $('#p-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#reset-pass_btn').removeClass('btn-default');
                $('#reset-pass_btn').addClass('btn-primary');
                $('#reset-pass_btn').prop('disabled', false);
            });
        });
    <?php endif; ?>

    <?php if($this->uri->segment(1) == 'contact-us'): ?>
        $('#contact-us').on('submit', function(v) {
            v.preventDefault();
            $('#info').hide();
            $('#wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Sending Your Please Wait...</p></div>');
            $('#send_msg_btn').removeClass('btn-primary');
            $('#send_msg_btn').addClass('btn-default');
            $('#send_msg_btn').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>home/send_us_message',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('form').trigger('reset');
                    $('#wait').fadeOut(function() {
                        $('#info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#send_msg_btn').removeClass('btn-default');
                $('#send_msg_btn').addClass('btn-primary');
                $('#send_msg_btn').prop('disabled', false);
            });
        });
    <?php endif; ?>

    //editing of profile
    <?php if($this->uri->segment(1) AND $this->uri->segment(1) == 'my-account'): ?>
        $('#profile-edit').on('submit', function(profile) {
            profile.preventDefault();
            $('#profile-btn').removeClass('btn-primary');
            $('#profile-btn').addClass('btn-default');
            $('#profile-info').hide();
            $('#profile-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Updating In process</p></div>');

            $.ajax({
                url: '<?php echo base_url(); ?>account/update_account',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#profile-wait').fadeOut(function() {
                        $('#profile-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#profile-btn').removeClass('btn-default');
                $('#profile-btn').addClass('btn-primary');
                $('#profile-btn').prop('disabled', false);
            });

        });

        //changing photo
        $('#change-photo').click(function() {
            $('#input-photo').click();
        });

        //uploading process
        $("input[name='cu_account_profile_pic']").change(function() {
            $('#pro-img').submit();
        });

        //updating my addresses
        $('#my-account-form').on('submit', function(e) {
            e.preventDefault();
            $('#my-address-btn').removeClass('btn-primary');
            $('#my-address-btn').addClass('btn-default');
            $('#my-account-info').hide();
            $('#my-account-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Updating In process</p></div>');

            $.ajax({
                url: '<?php echo base_url(); ?>account/update_account_addresses',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#my-account-wait').fadeOut(function() {
                        $('#my-account-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#my-address-btn').removeClass('btn-default');
                $('#my-address-btn').addClass('btn-primary');
                $('#my-address-btn').prop('disabled', false);
            });
        });

        //let work on wishlist item control
        <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'my-wishlist'): ?>
        <?php if($wishlists): ?>
        <?php foreach($wishlists as $w_list): ?>
        $('#remove-wishlist-<?php echo $w_list->cw_id; ?>').click(function() {
            $.ajax({
                url: '<?php echo base_url(); ?>account/remove_wishlist/<?php echo $w_list->cw_id; ?>',
                success:function(data) {
                    $('#w-r-info').html(data);
                }
            });
        });
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    //changing quantiy value in shopping cart
    <?php if($this->uri->segment(1) AND $this->uri->segment(1) == 'shopping-cart'): ?>
        <?php if($my_carts): ?>
        <?php foreach($my_carts as $u_cart): ?>
        $('#qty<?php echo $u_cart->shop_cart_id; ?>').on('change', function() {
            $('#qty_<?php echo $u_cart->shop_cart_id; ?>').submit();
        });

        $('#cartColor<?php echo $u_cart->shop_cart_id; ?>').on('change', function() {
            $('#changeCartColor<?php echo $u_cart->shop_cart_id; ?>').submit();
        });

        $('#removeFromCart_<?php echo $u_cart->shop_cart_id; ?>').on('click', function() {
            $.ajax({
                url: '<?php echo base_url(); ?>shopping/remove_from_cart/<?php echo $u_cart->shop_cart_id; ?>',
                success:function(data) {
                    window.location.href='<?php echo base_url(); ?>shopping-cart';
                }
            });
        });
        <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    //webiste Review
    <?php if($this->uri->segment(2) == 'my-review'): ?>
        $('#my-review-form').on('submit', function(review) {
            review.preventDefault();
            $('#my-review-btn').removeClass('btn-primary');
            $('#my-review-btn').addClass('btn-default');
            $('#my-review-btn').prop('disabled', true);
            $('#review-info').hide();
            $('#review-wait').fadeIn('slow').html('<div class="alert alert-primary"><p class="primary-alert" align="center">Updating In process</p></div>');

            $.ajax({
                url: '<?php echo base_url(); ?>account/update_review',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#review-wait').fadeOut(function() {
                        $('#review-info').fadeIn('slow').html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#my-review-btn').removeClass('btn-default');
                $('#my-review-btn').addClass('btn-primary');
                $('#my-review-btn').prop('disabled', false);
            });
        });
    <?php endif; ?>

    //let set up out live product searching.
    
    $('#let_search').keyup(function() {
        if($('#find-product' != ''))
        {
            $.ajax({
                url: '<?php echo base_url(); ?>search-product',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    $('#returnSearch').html(data);
                }
            });
        }
    });
});
</script>