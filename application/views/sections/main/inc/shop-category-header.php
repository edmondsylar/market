<div class="offcanvas-container" id="shop-categories">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title">Shop Categories</h3>
    </div>
    <nav class="offcanvas-menu">
        <?php if($home_main_cats): ?>
        <ul class="menu">
            <?php foreach($home_main_cats as $home_cat): ?>
            <li class="has-children">
                <span>
                    <a href="<?php echo base_url(); ?>shop-category/<?php echo $home_cat->main_cat_slug; ?>"><?php echo $home_cat->main_cat_name; ?></a>
                    <span class="sub-menu-toggle"></span>
                </span>
                <ul class="offcanvas-submenu">
                <?php if($home_sub_cats): ?>
                <?php foreach ($home_sub_cats as $home_sub_cat): ?>
                <?php if($home_sub_cat->main_cat_id == $home_cat->id): ?>
                    <li><a href="#"><?php echo $home_sub_cat->sub_cat_name; ?></a></li>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </nav>
</div>