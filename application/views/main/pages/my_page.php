<!-- Start Page Title -->
<div class="page-title">
    <div class="container">
        <div class="column">
            <h1><?php echo $page_show->page_title; ?></h1>
        </div>
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li><?php echo $page_show->page_title; ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->
<!-- Start Page Content -->
<div class="container">

<?php echo $page_show->page_content; ?>

</div>