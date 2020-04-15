<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="<?php echo base_url(); ?>" class="btn btn-blue btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Return Home">
                    <i class="mdi mdi-home"></i>
                </a>
                <a href="<?php echo base_url(); ?>admin" class="btn btn-blue btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
            </div>
            <h4 class="page-title">Add Product</h4>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('product_error')): ?>
<?php echo $this->session->flashdata('product_error'); ?>
<?php endif; ?>

<div id="product_info">
    <?php echo form_open_multipart('admin/add_product'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                <div class="form-group mb-3">
                    <label for="product-name">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" value="<?php if($this->session->flashdata('product_name')) echo $this->session->flashdata('product_name'); ?>" id="product-name" class="form-control" placeholder="e.g : Apple iMac">
                </div>

                <div class="form-group mb-3">
                    <label for="product-reference">Product Brand <span class="text-danger">*</span></label>
                    <select name="product_brand_id" id="" class="form-control" required>
                        <option value="">Select Brand</option>
                        <?php if($select_brands): ?>
                        <?php foreach($select_brands as $select_brand): ?>
                        <option value="<?php echo $select_brand->brand_id; ?>"><?php echo $select_brand->brand_name; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="product-description">Product Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="product_description" id="product-description" rows="5" placeholder="Please enter description"><?php if($this->session->flashdata('product_description')) echo $this->session->flashdata('product_description'); ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="product-summary">Product Summary</label>
                    <textarea class="form-control" name="product_summary" id="product-summary" rows="3" placeholder="Please enter summary"><?php if($this->session->flashdata('product_summary')) echo $this->session->flashdata('product_summary'); ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="product-category">Categories <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="sub_cat_id" id="product-category" required>
                        <option>Select</option>
                        <?php if($select_main_cats): ?>
                        <?php foreach($select_main_cats as $select_main_cat): ?>
                        <optgroup label="<?php echo $select_main_cat->main_cat_name; ?>">
                        <?php if($select_sub_cats): ?>
                        <?php foreach($select_sub_cats as $select_sub_cat): ?>
                        <?php if($select_sub_cat->main_cat_id == $select_main_cat->id): ?>
                            <option value="<?php echo $select_sub_cat->sid; ?>"><?php echo $select_sub_cat->sub_cat_name; ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </optgroup>
                        <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="product-price">Price <span class="text-danger">*</span></label>
                    <input type="text" name="product_price" value="<?php if($this->session->flashdata('product_price')) echo $this->session->flashdata('product_price'); ?>" class="form-control" id="product-price" placeholder="Enter amount">
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                    <br/>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio1" value="1" name="product_status" checked="">
                        <label for="inlineRadio1"> In Stock </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="0" name="product_status">
                        <label for="inlineRadio2"> Out Of Stock </label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <label>Avaliable Colors <small>(Optional)</small></label>
                    <textarea class="form-control" name="product_colors" rows="3" placeholder="Please seprate color with Comma e.g red, blue, green"><?php if($this->session->flashdata('product_colors')) echo $this->session->flashdata('product_colors'); ?></textarea>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="col-lg-6">

        <div class="card-box">
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Main Preview</h5>

            <div class="mt-3">
                <input type="file" name="product_show" class="dropify" data-max-file-size="3M" />
            </div>

        </div> <!-- end col-->

            <div class="card-box">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>

                <div class="form-group mb-3">
                    <label for="product-meta-title">Meta title</label>
                    <input type="text" name="product_meta_title" value="<?php if($this->session->flashdata('product_meta_title')) echo $this->session->flashdata('product_meta_title'); ?>" class="form-control" id="product-meta-title" placeholder="Enter title">
                </div>

                <div class="form-group mb-3">
                    <label for="product-meta-keywords">Meta Keywords</label>
                    <input type="text" name="product_meta_keyword" class="form-control" value="<?php if($this->session->flashdata('product_meta_keyword')) echo $this->session->flashdata('product_meta_keyword'); ?>" id="product-meta-keywords" placeholder="Enter keywords">
                </div>

                <div class="form-group mb-0">
                    <label for="product-meta-description">Meta Description </label>
                    <textarea class="form-control" name="product_meta_description" value="<?php if($this->session->flashdata('product_meta_description')) echo $this->session->flashdata('product_meta_description'); ?>" rows="5" id="product-meta-description" placeholder="Please enter description"></textarea>
                </div>
            </div> <!-- end card-box -->

        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded waves-effect waves-light">Create New Product</button>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    <?php echo form_close(); ?>
</div>

<!-- let set preview -->

<div id="product_image" class="card-box">
    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

    <?php $pro_id = ['class' => 'dropzone', 'id' => 'myAwesomeDropzone']; ?>
    <?php echo form_open('admin/create_product_shots', $pro_id); ?>
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>

        <div class="dz-message needsclick">
            <i class="h1 text-muted dripicons-cloud-upload"></i>
            <h3>Drop files here or click to upload.</h3>
            <span class="text-muted font-13">(Note that first image upload will be use as the product Thumbnail)</span>
        </div>
    <?php echo form_close() ?>
    
    <a name="" id="" class="btn btn-success btn-block btn-rounded" href="<?php echo base_url(); ?>admin/store" role="button">Create New Product</a>

</div> <!-- end col-->
