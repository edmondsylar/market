<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Elecomm - Electronic E-commerce Store.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A full function on online ecommerce store." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>statics/uploads/pref_settings/favicon.png">

    <!-- Jquery Toast css -->
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />

    <?php if($this->uri->segment(3) == 'add-product' OR $this->uri->segment(3) == 'edit-product' OR $this->uri->segment(2) == 'pages'): ?>
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <?php if($editor): ?>
        <?php
        switch($editor->editor_name) {
            case 'summernote':
                echo '<link href="'.base_url().'assets/panel/assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />';
                break;
            case 'trumbowyg':
                echo '<link rel="stylesheet" href="'.base_url().'plugins/editors/trumbowyg/dist/ui/trumbowyg.min.css">';
                break;
        }
        ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <?php if($this->uri->segment(2) == 'create_admin' OR $this->uri->segment(2) == 'edit_admin' OR $this->uri->segment(2) == 'categories' OR $this->uri->segment(3) == 'add-product' OR $this->uri->segment(3) == 'edit-product'): ?>
    <!--File uploading Plugins css -->
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/panel/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/panel/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/panel/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/panel/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!--Code editor css files-->
    <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'email_template'): ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/panel/assets//codes/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/panel/assets/codes/addon/fold/foldgutter.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/panel/assets/codes/addon/dialog/dialog.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/panel/assets/codes/theme/monokai.css">
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/lib/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/search/searchcursor.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/search/search.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/dialog/dialog.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/edit/matchbrackets.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/edit/closebrackets.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/comment/comment.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/wrap/hardwrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/fold/foldcode.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/addon/fold/brace-fold.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/mode/javascript/javascript.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/assets/codes/keymap/sublime.js"></script>
    <?php endif; ?>

</head>

<body>
<!-- base on creating product page -->
<?php if($this->uri->segment(3) AND $this->uri->segment(3) == 'add-product'): ?>
    <?php if(! $this->session->userdata('product_slug')): ?>
    <style>
        #product_image {
            display: none;
        }
    </style>
    <?php else: ?>
    <style>
        #product_info {
            display: none;
        }
    </style>
    <?php endif; ?>
<?php endif; ?>

<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">Loading...</div>
    </div>
</div>
<!-- End Preloader-->
<div id="wrapper">