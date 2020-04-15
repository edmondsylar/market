<style>
  .input-hidden {
    position: absolute;
    left: -9999px;
  }

  input[type=radio]:checked + label>img {
    border: 1px solid #fff;
    box-shadow: 0 0 3px 3px #090;
  }

  /* Stuff after this is only to make things more pretty */
  input[type=radio] + label>img {
    border: 1px dashed #444;
    width: 300px;
    height: 150px;
    transition: 500ms all;
  }

  input[type=radio]:checked + label>img {
    transform: 
      rotateZ(-10deg) 
      rotateX(10deg);
  }

  /*
  | //lea.verou.me/css3patterns
  | Because white bgs are boring.
  */
  html {
    background-color: #fff;
    background-size: 100% 1.2em;
    background-image: 
      linear-gradient(
        90deg, 
        transparent 79px, 
        #abced4 79px, 
        #abced4 81px, 
        transparent 81px
      ),
      linear-gradient(
        #eee .1em, 
        transparent .1em
      );
}
</style>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Main</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            <h4 class="page-title">My Prefered Editor</h4>
        </div>
    </div>
</div>     
<!-- end page title -->


<!-- <input 
  type="radio" name="emotion" 
  id="sad" class="input-hidden" />
<label for="sad">
  <img 
    src="http://placekitten.com/150/150" 
    alt="I'm sad" />
</label>

<input 
  type="radio" name="emotion"
  id="happy" class="input-hidden" />
<label for="happy">
  <img 
    src="http://placekitten.com/151/151" 
    alt="I'm happy" />
</label> -->

<div class="card">
  <div class="card-title"><h4 class="text-center">Select Your Prefer and Comfortable Editor.</h4></div>
  <div class="card-body">
  <?php if($this->session->flashdata('editor')) {
    echo $this->session->flashdata('editor');
  }
  ?>
  <?php echo form_open('admin/change_editor'); ?>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          <input 
            type="radio" name="editor" value="ckeditor" 
            id="ckeditor" class="input-hidden" <?php if($cur_editor == 'ckeditor') echo 'checked'; ?> />
          <label for="ckeditor">
            <img 
              src="<?php echo base_url(); ?>statics/plugins/editors/ckeditor/select.jpg" 
              alt="ckeditor" data-toggle="tooltip" data-placement="top" title="Ckeditor Editor" />
          </label>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          <input 
            type="radio" name="editor" value="summernote" 
            id="summernote" class="input-hidden" <?php if($cur_editor == 'summernote') echo 'checked'; ?> />
          <label for="summernote">
            <img 
              src="<?php echo base_url(); ?>statics/plugins/editors/summernote/select.png" 
              alt="trumbowyg" data-toggle="tooltip" data-placement="top" title="Summernote Editor" />
          </label>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          <input 
            type="radio" name="editor" value="trumbowyg" 
            id="trumbowyg" class="input-hidden" <?php if($cur_editor == 'trumbowyg') echo 'checked'; ?> />
          <label for="trumbowyg">
            <img 
              src="<?php echo base_url(); ?>statics/plugins/editors/trumbowyg/select.jpg" 
              alt="trumbowyg" data-toggle="tooltip" data-placement="top" title="Trumbowyg Editor" />
          </label>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>