<script>
$(document).ready(function() {
    //delay the form data
    $('#form_admin').on("submit", function(e) {
        e.preventDefault();
        $('#info').html("");
        $('#wait').fadeIn('slow').html('<div class="alert alert-info" align="center">Creating Account Please Wait.</div>');
        $('#new_admin').removeClass("btn-outline-primary");
        $('#new_admin').addClass("btn-default");
        $('#new_admin').text("In Progress");
        $('#new_admin').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/new_admin',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("form").trigger("reset");
                $('#wait').fadeOut(function() {
                    $('#info').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#new_admin').removeClass("btn-default");
            $('#new_admin').addClass("btn-outline-primary");
            $('#new_admin').text("Create Account");
            $('#new_admin').prop("disabled", false);
        });
    });

    //load all admin users in ajax
    function loadAllAdmin() {
        $.get("<?php echo base_url(); ?>admin/admin_ajax_load", function(data) {
            $('#list_admin').html(data);
            });
    }
    setInterval(function(){
        loadAllAdmin();
    },500);

    //editing of admin user
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'edit_admin'): ?>
    $('#form_admin_edit').on('submit', function(e) {
        e.preventDefault();
        $('#info').html("");
        $('#wait').fadeIn('slow').html('<div class="alert alert-info" align="center">Creating Account Please Wait.</div>');
        $('#new_admin').removeClass("btn-outline-primary");
        $('#new_admin').addClass("btn-default");
        $('#new_admin').text("In Progress");
        $('#new_admin').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_admin/<?php echo $edit_admin->id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#wait').fadeOut(function() {
                    $('#info').fadeIn('slow').html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#new_admin').removeClass("btn-default");
            $('#new_admin').addClass("btn-outline-primary");
            $('#new_admin').text("Update Account");
            $('#new_admin').prop("disabled", false);
        });

    });
    <?php endif; ?>

    //Deleting of admin account
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'admins'): ?>
        <?php if($admins_list): ?>
            <?php foreach($admins_list as $modes): ?>
            $('#del_user_<?php echo $modes->id; ?>').on('submit', function(e) {
                e.preventDefault();
                $('#no-btn').fadeOut('slow');
                $('#del-btn').removeClass('btn-danger');
                $('#del-btn').addClass('btn-default');
                $('#del-btn').prop("disabled", true);

                $.ajax({
                    url: '<?php echo base_url(); ?>admin/delete_admin/<?php echo $modes->id; ?>',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#con-close-modal-<?php echo $modes->id; ?>').modal('hide');
                        $('#sa-success').click();
                    }
                });
            });
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    //Create Parent Categories
    <?php if($this->uri->segment(3) AND $this->uri->segment(3) == 'main-categories'): ?>
    $('#set_main_cat').on('submit', function(e) {
        e.preventDefault();
        $('#info').hide();
        $('#no-btn').fadeOut();
        $('#wait').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#create-parent-cat-btn').removeClass('btn-outline-success');
        $('#create-parent-cat-btn').addClass('btn-default');
        $('#create-parent-cat-btn').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/create_main_category',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("form").trigger("reset");
                $('#wait').fadeOut(function() {
                    $('#info').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#no-btn').fadeIn();
            $('#create-parent-cat-btn').removeClass('btn-default');
            $('#create-parent-cat-btn').addClass('btn-outline-success');
            $('#create-parent-cat-btn').prop("disabled", false);
        });
    });

    //let load the stat info
    function loadMainCatStat() {
        $.get("<?php echo base_url(); ?>admin/get_main_cat_stat", function(data) {
            $('#show_cat_stat').html(data);
            });
    }
    setInterval(function(){
        loadMainCatStat();
    },500);

    //let load the main categories
    function loadMainCatList() {
        $.get("<?php echo base_url(); ?>admin/get_main_cat_list/<?php if($this->uri->segment(4)) echo $this->uri->segment(4); ?>", function(data) {
            $('#list_all_main_cat').html(data);
            });
    }
    setInterval(function(){
        loadMainCatList();
    },500);

    <?php if($get_cat_lists): ?>
    <?php foreach($get_cat_lists as $cat_modal): ?>
    $('#set_main_cat_modal<?php echo $cat_modal->id; ?>').on('submit', function(edit<?php echo $cat_modal->id; ?>) {
        edit<?php echo $cat_modal->id; ?>.preventDefault();
        $('#info<?php echo $cat_modal->id; ?>').hide();
        $('#no-btn<?php echo $cat_modal->id; ?>').fadeOut();
        $('#wait<?php echo $cat_modal->id; ?>').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').removeClass('btn-outline-success');
        $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').addClass('btn-default');
        $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/edit_main_category/<?php echo $cat_modal->id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#wait<?php echo $cat_modal->id; ?>').fadeOut(function() {
                    $('#info<?php echo $cat_modal->id; ?>').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#no-btn<?php echo $cat_modal->id; ?>').fadeIn();
            $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').removeClass('btn-default');
            $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').addClass('btn-outline-success');
            $('#edit-parent-cat-btn<?php echo $cat_modal->id; ?>').prop("disabled", false);
        });
    });

    //let delete main categoy
    $('#del_main_cat_modal<?php echo $cat_modal->id; ?>').on('submit', function(e) {
        e.preventDefault();
        $('#del-no-btn<?php echo $cat_modal->id; ?>').fadeOut();
        $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').removeClass('btn-outline-success');
        $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').addClass('btn-default');
        $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/delete_main_category/<?php echo $cat_modal->id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#info<?php echo $cat_modal->id; ?>').fadeIn("slow").html(data);
            }
        });

        $(document).ajaxComplete(function() {
            $('#del-no-btn<?php echo $cat_modal->id; ?>').fadeIn();
            $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').removeClass('btn-default');
            $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').addClass('btn-outline-success');
            $('#del-parent-cat-btn<?php echo $cat_modal->id; ?>').prop("disabled", false);
        });
    });
    <?php endforeach; ?>
    <?php endif; ?>
    <?php endif; ?>

    //Product sub categories page
    <?php if($this->uri->segment(3) AND $this->uri->segment(3) == 'sub-categories'): ?>

    //let get the stats of the categories
    <?php if($this->uri->segment(4) AND $this->uri->segment(4) != 'page'): ?>
    //let load the stat info
    function loadSubCatStat() {
        $.get("<?php echo base_url(); ?>admin/get_sub_cat_stats/<?php echo $this->uri->segment(4); ?>", function(data) {
            $('#show_sub_cat_stat').html(data);
        });
    }
    setInterval(function(){
        loadSubCatStat();
    },500);

    //let load out our sub categories
    function loadSubCatList() {
        $.get("<?php echo base_url(); ?>admin/get_sub_cat_lists/<?php if($this->uri->segment(4)) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5)) echo $this->uri->segment(5); ?>", function(data) {
            $('#list_all_sub_cat').html(data);
            });
    }
    setInterval(function(){
        loadSubCatList();
    },500);

    //let count the country baseon the main category
    function countSubCatStat() {
        $.get("<?php echo base_url(); ?>admin/ajax_count_cats/<?php echo $this->uri->segment(4); ?>", function(data) {
            $('#count_sub_cat_stat').html(data);
        });
    }
    setInterval(function(){
        countSubCatStat();
    },500);

    <?php else: ?>
    
    //let load the stat info
    function loadSubCatStat() {
        $.get("<?php echo base_url(); ?>admin/get_sub_cat_stat", function(data) {
            $('#show_sub_cat_stat').html(data);
        });
    }
    setInterval(function(){
        loadSubCatStat();
    },500);

    //let load out our sub categories
    <?php if($this->uri->segment(4) != 'page'): ?>
        function loadSubCatList() {
            $.get("<?php echo base_url(); ?>admin/get_sub_cat_list/<?php if($this->uri->segment(4)) echo $this->uri->segment(4); ?>", function(data) {
                $('#list_all_sub_cat').html(data);
                });
        }
        setInterval(function(){
            loadSubCatList();
        },500);

    <?php else: ?>

        function loadSubCatList() {
            $.get("<?php echo base_url(); ?>admin/get_sub_cat_list/page/<?php if($this->uri->segment(5)) echo $this->uri->segment(5); ?>", function(data) {
                $('#list_all_sub_cat').html(data);
                });
        }
        setInterval(function(){
            loadSubCatList();
        },500);

    <?php endif; ?>        

    <?php endif; ?>

    //Now let process main cateogry creating
    $('#set_sub_cat').on('submit', function(e) {
        e.preventDefault();
        $('#info').hide();
        $('#no-btn').fadeOut();
        $('#wait').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#create-parent-cat-btn').removeClass('btn-outline-success');
        $('#create-parent-cat-btn').addClass('btn-default');
        $('#create-parent-cat-btn').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/create_sub_category',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("form").trigger("reset");
                $('#wait').fadeOut(function() {
                    $('#info').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#no-btn').fadeIn();
            $('#create-parent-cat-btn').removeClass('btn-default');
            $('#create-parent-cat-btn').addClass('btn-outline-success');
            $('#create-parent-cat-btn').prop("disabled", false);
        });
    });

    //Now let list up the script to edit category
    <?php if($sub_cats): ?>
    <?php foreach($sub_cats as $model_sub_cat): ?>
    $('#edit_sub_cat<?php echo $model_sub_cat->sid; ?>').on('submit', function(e) {
        e.preventDefault();
        $('#info<?php echo $model_sub_cat->sid; ?>').hide();
        $('#edit-no-btn<?php echo $model_sub_cat->sid; ?>').fadeOut();
        $('#wait<?php echo $model_sub_cat->sid; ?>').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').removeClass('btn-outline-success');
        $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').addClass('btn-default');
        $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_sub_category/<?php echo $model_sub_cat->sid; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("form").trigger("reset");
                $('#wait<?php echo $model_sub_cat->sid; ?>').fadeOut(function() {
                    $('#info<?php echo $model_sub_cat->sid; ?>').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#edit-no-btn<?php echo $model_sub_cat->sid; ?>').fadeIn();
            $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').removeClass('btn-default');
            $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').addClass('btn-outline-success');
            $('#edit-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').prop("disabled", false);
        });
    });

    //let delete sub categoy
    $('#del_sub_cat_modal<?php echo $model_sub_cat->sid; ?>').on('submit', function(e) {
        e.preventDefault();
        $('#del-no-btn<?php echo $model_sub_cat->sid; ?>').fadeOut();
        $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').removeClass('btn-outline-success');
        $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').addClass('btn-default');
        $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/delete_sub_category/<?php echo $model_sub_cat->sid; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#info<?php echo $model_sub_cat->sid; ?>').fadeIn("slow").html(data);
            }
        });

        $(document).ajaxComplete(function() {
            $('#del-no-btn<?php echo $model_sub_cat->sid; ?>').fadeIn();
            $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').removeClass('btn-default');
            $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').addClass('btn-outline-success');
            $('#del-parent-cat-btn<?php echo $model_sub_cat->sid; ?>').prop("disabled", false);
        });
    });


    <?php endforeach; ?>
    <?php endif; ?>


    <?php endif; ?>

    //Seting up Shop set up content
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'shop_setup'): ?>

    $('#fcu').on('submit', function(e) {
        e.preventDefault();
        $('#fresh_cat_btn').removeClass('btn-outline-success');
        $('#fresh_cat_btn').addClass('btn-default');
        $('#fresh_cat_btn').prop('disabled', true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_fresh_cat_setup/',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#info_fresh_cat').fadeIn("slow").html(data);
            }
        });

        $(document).ajaxComplete(function() {
            $('#fresh_cat_btn').removeClass('btn-default');
            $('#fresh_cat_btn').addClass('btn-outline-success');
            $('#fresh_cat_btn').prop('disabled', false);
        });
    });

    <?php endif; ?>

    //lect display branding list sections
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'product_brands'): ?>

    //load all brands to table
    function loadAllBrands() {
        $.get("<?php echo base_url(); ?>admin/load_product_brands/<?php if($this->uri->segment(3)) echo $this->uri->segment(3); ?>", function(data) {
            $('#list_all_brands').html(data);
        });
    }
    setInterval(function(){
        loadAllBrands();
    },500);

    //let load the brand statistics
    //load all brands to table
    function loadAllBrandStat() {
        $.get("<?php echo base_url(); ?>admin/load_product_brands_stat", function(data) {
            $('#list_all_brands_stat').html(data);
        });
    }
    setInterval(function(){
        loadAllBrandStat();
    },500);

    //Let create new brands
    $('#create_brand').on('submit', function(e) {
        e.preventDefault();
        $('#info').hide();
        $('#new-brand-btn').removeClass('btn-outline-primary');
        $('#new-brand-btn').addClass('btn-default');
        $('#new-brand-btn').text('Working...');
        $('#new-brand-btn').prop('disabled', true);
    

        $.ajax({
            url: '<?php echo base_url(); ?>admin/create_new_brand',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#info').fadeIn("slow").html(data);
                $("form").trigger("reset");
            }
        });

        $(document).ajaxComplete(function() {
            $('#new-brand-btn').removeClass('btn-default');
            $('#new-brand-btn').addClass('btn-outline-primary');
            $('#new-brand-btn').prop('disabled', false);
            $('#new-brand-btn').text('Create New');
        });
    });

    //let edit our brand lists
    <?php if($brand_lists): ?>

    <?php foreach($brand_lists as $mode_brand): ?>

    $('#edit_brand<?php echo $mode_brand->brand_id; ?>').on('submit', function(edit) {
        edit.preventDefault();
        $('#edit_info<?php echo $mode_brand->brand_id; ?>').hide();
        $('#edit-no-btn<?php echo $mode_brand->brand_id; ?>').fadeOut();
        $('#edit_wait<?php echo $mode_brand->brand_id; ?>').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').removeClass('btn-outline-success');
        $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').addClass('btn-default');
        $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_product_brand/<?php echo $mode_brand->brand_id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("form").trigger("reset");
                $('#edit_wait<?php echo $mode_brand->brand_id; ?>').fadeOut(function() {
                    $('#edit_info<?php echo $mode_brand->brand_id; ?>').fadeIn("slow").html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#edit-no-btn<?php echo $mode_brand->brand_id; ?>').fadeIn();
            $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').removeClass('btn-default');
            $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').addClass('btn-outline-success');
            $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').prop("disabled", false);
        });
    });

    $('#del_brand<?php echo $mode_brand->brand_id; ?>').on('submit', function(del) {
        del.preventDefault();
        $('#del-no-btn<?php echo $mode_brand->brand_id; ?>').fadeOut();
        $('#del_wait<?php echo $mode_brand->brand_id; ?>').fadeIn("slow").html('<div class="alert alert-info" align="center">Action In <b>Progress</b>Please Wait..</div>');
        $('#del-brand-btn<?php echo $mode_brand->brand_id ?>').removeClass('btn-outline-success');
        $('#edit-brand-btn<?php echo $mode_brand->brand_id ?>').addClass('btn-default');
        $('#del-brand-btn<?php echo $mode_brand->brand_id ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/delete_product_brand/<?php echo $mode_brand->brand_id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#del_info<?php echo $mode_brand->brand_id; ?>').fadeIn("slow").html(data);
            }
        });
    });

    <?php endforeach; ?>

    <?php endif; ?>


    <?php endif; ?>

    //update the product preview imagage via ajax
    <?php if($this->uri->segment(3) AND $this->uri->segment(3) == 'edit-product'): ?>
        function loadProductShots() {
            $.get("<?php echo base_url(); ?>admin/load_product_shots/<?php echo $this->uri->segment(4); ?>", function(data) {
                $('#load_shots').html(data);
            });
        }
        setInterval(function(){
            loadProductShots();
        },500);
    <?php endif; ?>

    //let add product to featured items
    <?php if($this->uri->segment(2) == 'store' &! $this->uri->segment(3)): ?>
        <?php if($admin_product_lists): ?>
        <?php foreach($admin_product_lists as $product_add): ?>
        $('#add_feat<?php echo $product_add->product_id; ?>').click(function() {
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-secondary');
            $.ajax({
                url: '<?php echo base_url(); ?>admin/ajax_add_feature_product/<?php echo $product_add->product_id; ?>',
                success: function(data) {
                    $('#added').html(data);
                }
            });
        });
        <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    //let create a new main product slider
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'product_advert_slider'): ?>
        $('#new_product_slider').on('submit', function(e) {
            e.preventDefault();
            $('#info').hide();
            $('#wait').fadeIn().html('<div class="alert alert-info" align="center">Processing Data Please Wait</div>');
            $('#new-slider-btn').removeClass('btn-outline-success');
            $('#new-slider-btn').addClass('btn-default');
            $('#new-slider-btn').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>admin/new_product_slider',
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
                $('#new-slider-btn').removeClass('btn-default');
                $('#new-slider-btn').addClass('btn-outline-success');
                $('#new-slider-btn').prop('disabled', false);
            });
        });

        //let load the slider view
        function loadSliderView() {
            $.get('<?php echo base_url(); ?>admin/ajax_load_slider_view', function(data) {
                $('#loadSliderView').html(data);
            });
        }
        setInterval(function() {
            loadSliderView();
        },500);
    <?php endif; ?>

    //Admin creating new customer
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'create_customer'): ?>
        $('#ca_id').on('submit', function(c) {
            c.preventDefault();
            $('#info').hide();
            $('#wait').fadeIn('slow').html('<div class="alert alert-info" align="center">Action In Progress Please Wait</div>');
            $('#new-cus').removeClass('btn-outline-primary');
            $('#new-cus').addClass('btn-default');
            $('#new-cus').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>admin/add_customer',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("form").trigger("reset");
                    $('#wait').fadeOut(function() {
                        $('#info').fadeIn("slow").html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#new-cus').removeClass('btn-default');
                $('#new-cus').addClass('btn-outline-primary');
                $('#new-cus').prop('disabled', false);
            });
        });
    <?php endif; ?>

    //Loading custormers
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'customers'): ?>
        function loadCustomerStat() {
            $.get("<?php echo base_url(); ?>admin/get_customer_stat", function(data) {
                $('#load_stat').html(data);
            });
        }
        setInterval(function(){
            loadCustomerStat();
        },500);

        function loadCustomers() {
            $.get("<?php echo base_url(); ?>admin/get_customers/<?php if($this->uri->segment(3)) echo $this->uri->segment(3); ?>", function(data) {
                $('#load').html(data);
            });
        }
        setInterval(function(){
            loadCustomers();
        },500);

        //editing customers account section
        <?php if($customers): ?>
        <?php foreach($customers as $edit_customer): ?>
        $('#edit_id<?php echo $edit_customer->ca_id; ?>').on('submit', function(ed) {
            ed.preventDefault();
            $('#edit-info').hide();
            $('#edit-wait').fadeIn('slow').html('<div class="alert alert-info" align="center">Action In Progress Please Wait</div>');
            $('#edit-cus').removeClass('btn-outline-primary');
            $('#edit-cus').addClass('btn-default');
            $('#edit-cus').prop('disabled', true);

            $.ajax({
                url: '<?php echo base_url(); ?>admin/edit_customer/<?php echo $edit_customer->ca_id; ?>',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("form").trigger("reset");
                    $('#edit-wait').fadeOut(function() {
                        $('#edit-info').fadeIn("slow").html(data);
                    });
                }
            });

            $(document).ajaxComplete(function() {
                $('#edit-cus').removeClass('btn-default');
                $('#edit-cus').addClass('btn-outline-primary');
                $('#edit-cus').prop('disabled', false);
            });
        });

        //blocking customer account
        $('#block<?php echo $edit_customer->ca_id; ?>').click(function() {
            $('#block<?php echo $edit_customer->ca_id; ?>').removeClass('btn-outline-danger');
            $('#block<?php echo $edit_customer->ca_id; ?>').addClass('btn-secondary');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/block_customer/<?php echo $edit_customer->ca_id; ?>',
                success: function(data) {
                    $('#actions').html(data);
                }
            });
        });

        //unblocking customer account
        $('#unblock<?php echo $edit_customer->ca_id; ?>').click(function() {
            $('#unblock<?php echo $edit_customer->ca_id; ?>').removeClass('btn-outline-info');
            $('#unblock<?php echo $edit_customer->ca_id; ?>').addClass('btn-secondary');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/unblock_customer/<?php echo $edit_customer->ca_id; ?>',
                success: function(data) {
                    $('#actions').html(data);
                }
            });
        });

        //deactivating customer account
        $('#deact<?php echo $edit_customer->ca_id; ?>').click(function() {
            $('#deact<?php echo $edit_customer->ca_id; ?>').removeClass('btn-outline-warning');
            $('#deact<?php echo $edit_customer->ca_id; ?>').addClass('btn-secondary');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/deactivate_customer/<?php echo $edit_customer->ca_id; ?>',
                success: function(data) {
                    $('#actions').html(data);
                }
            });
        });

        //activating customer account
        $('#act<?php echo $edit_customer->ca_id; ?>').click(function() {
            $('#act<?php echo $edit_customer->ca_id; ?>').removeClass('btn-outline-success');
            $('#act<?php echo $edit_customer->ca_id; ?>').addClass('btn-secondary');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/activate_customer/<?php echo $edit_customer->ca_id; ?>',
                success: function(data) {
                    $('#actions').html(data);
                }
            });
        });

        $('#del_customer_modal<?php echo $edit_customer->ca_id; ?>').on('submit', function(e) {
        e.preventDefault();
        $('#del-no-btn<?php echo $edit_customer->ca_id; ?>').fadeOut();
        $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').removeClass('btn-outline-success');
        $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').addClass('btn-default');
        $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/delete_customer/<?php echo $edit_customer->ca_id; ?>',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#del-info<?php echo $edit_customer->ca_id; ?>').fadeIn("slow").html(data);
            }
        });

        $(document).ajaxComplete(function() {
            $('#del-no-btn<?php echo $edit_customer->ca_id; ?>').fadeIn();
            $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').removeClass('btn-default');
            $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').addClass('btn-outline-success');
            $('#del-parent-cat-btn<?php echo $edit_customer->ca_id; ?>').prop("disabled", false);
        });
    });
        <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(3) AND $this->uri->segment(3) == 'editors'): ?>
    $('input[type=radio]').on('change', function() {
        $(this).closest("form").submit();
    });
    <?php endif; ?>

    //editing of admin user
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'payment_gateways'): ?>
    $('#set_paypal').on('submit', function(e) {
        e.preventDefault();
        $('#info').html("");
        $('#wait').fadeIn('slow').html('<div class="alert alert-info" align="center">Proccessing Settings Please Wait.</div>');
        $('#paypal_btn').removeClass("btn-outline-primary");
        $('#paypal_btn').addClass("btn-default");
        $('#paypal_btn').text("In Progress");
        $('#paypal_btn').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_paypal_gateway',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#wait').fadeOut(function() {
                    $('#info').fadeIn('slow').html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#paypal_btn').removeClass("btn-default");
            $('#paypal_btn').addClass("btn-outline-primary");
            $('#paypal_btn').text("Save Settings");
            $('#paypal_btn').prop("disabled", false);
        });

    });

    $('#set_stripe').on('submit', function(e) {
        e.preventDefault();
        $('#info1').html("");
        $('#wait1').fadeIn('slow').html('<div class="alert alert-info" align="center">Proccessing Settings Please Wait.</div>');
        $('#stipe_btn').removeClass("btn-outline-primary");
        $('#stipe_btn').addClass("btn-default");
        $('#stipe_btn').text("In Progress");
        $('#stipe_btn').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_stripe_gateway',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#wait1').fadeOut(function() {
                    $('#info1').fadeIn('slow').html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#stipe_btn').removeClass("btn-default");
            $('#stipe_btn').addClass("btn-outline-primary");
            $('#stipe_btn').text("Save Settings");
            $('#stipe_btn').prop("disabled", false);
        });

    });

    $('#set_paystack').on('submit', function(e) {
        e.preventDefault();
        $('#info2').html("");
        $('#wait2').fadeIn('slow').html('<div class="alert alert-info" align="center">Proccessing Settings Please Wait.</div>');
        $('#paystack_btn').removeClass("btn-outline-primary");
        $('#paystack_btn').addClass("btn-default");
        $('#paystack_btn').text("In Progress");
        $('#paystack_btn').prop("disabled", true);

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update_paystack_gateway',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#wait2').fadeOut(function() {
                    $('#info2').fadeIn('slow').html(data);
                });
            }
        });

        $(document).ajaxComplete(function() {
            $('#paystack_btn').removeClass("btn-default");
            $('#paystack_btn').addClass("btn-outline-primary");
            $('#paystack_btn').text("Save Settings");
            $('#paystack_btn').prop("disabled", false);
        });

    });

    <?php endif; ?>

    <?php if($this->uri->segment(2) == 'store' &! $this->uri->segment(3)): ?>

    //let set up out live product searching.
    
    $('#let_find').keyup(function() {

        $('#s_all').hide();
        $('#s_find').show();

        var to_find = $('#find-product').val();

        if(to_find != '')
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin-find-product',
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
        } else {
            $('#s_find').hide();
            $('#s_all').show();
        }
    });

    <?php endif; ?>
    
});
</script>