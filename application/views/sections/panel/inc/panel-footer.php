</div>
<!-- Right Sidebar -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Plugins js -->
        <?php if($this->uri->segment(2) == 'create_admin' OR $this->uri->segment(2) == 'edit_admin' OR $this->uri->segment(2) == 'categories' OR $this->uri->segment(3) == 'add-product' OR $this->uri->segment(3) == 'edit-product'): ?>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/dropzone/dropzone.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/dropify/dropify.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/pages/form-fileuploads.init.js"></script>
        <script src="<?php echo base_url(); ?>assets/main/assets/js/crs.min.js"></script>
        <?php endif; ?>

        <!-- Summernote js -->
        <?php if($this->uri->segment(3) == 'add-product' OR $this->uri->segment(3) == 'edit-product' OR $this->uri->segment(2) == 'pages'): ?>
        <!-- Select2 js-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/select2/select2.min.js"></script>
        <!-- Init js -->
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/pages/add-product.init.js"></script>

        <!-- selection of editors -->
        <?php if($editor): ?>
        <?php
        switch($editor->editor_name) {
            case 'summernote':
                ?>
                <script src="<?php echo base_url(); ?>assets/panel/assets/libs/summernote/summernote-bs4.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#product-description').summernote({height:180,minHeight:null,maxHeight:null,focus:!1});
                });
                </script>
                <?php
                break;

                //for ckeditor section
                case 'ckeditor':
                ?>
                    <script src="<?php echo base_url(); ?>plugins/editors/ckeditor/ckeditor.js"></script>
                    <script>
                    CKEDITOR.replace('product-description');
                    </script>
                <?php
                    break;

                //for trumbowyg section
                case 'trumbowyg':
                ?>
                     <script src="<?php echo base_url(); ?>plugins/editors/trumbowyg/dist/trumbowyg.min.js"></script>
                     <script>
                     $('#product-description').trumbowyg({height:180,minHeight:null,maxHeight:null,focus:!1});
                     </script>
                <?php
                    break;
        }
        ?>
        
        <?php endif; ?>
        <?php endif; ?>

        <!-- Dashboar 1 init js-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/pages/dashboard-1.init.js"></script>

        <!-- Tost-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/jquery-toast/jquery.toast.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/pages/toastr.init.js"></script>

        <!-- Sweet Alerts js -->
        <script src="<?php echo base_url(); ?>assets/panel/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/pages/sweet-alerts.init.js"></script>

        <!-- App js-->
        <script src="<?php echo base_url(); ?>assets/panel/assets/js/app.min.js"></script>

        <!--Editor coding..-->
        <?php if($this->uri->segment(2) AND $this->uri->segment(2) == 'email_template'): ?>
        <script>
            var value = "// The bindings defined specifically in the Sublime Text mode\nvar bindings = {\n";
            var map = CodeMirror.keyMap.sublime;
            for (var key in map) {
                var val = map[key];
                if (key != "fallthrough" && val != "..." && (!/find/.test(val) || /findUnder/.test(val)))
                value += "  \"" + key + "\": \"" + val + "\",\n";
            }
            value += "}\n\n// The implementation of joinLines\n";
            value += CodeMirror.commands.joinLines.toString().replace(/^function\s*\(/, "function joinLines(").replace(/\n  /g, "\n") + "\n";
            var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                value: value,
                lineNumbers: true,
                mode: "javascript",
                keyMap: "sublime",
                autoCloseBrackets: true,
                matchBrackets: true,
                showCursorWhenSelecting: true,
                theme: "monokai",
                tabSize: 2
            });
            </script>
        <?php endif; ?>

            <script>
                var thehours = new Date().getHours();
                var themessage;
                var morning = ('Good Morning');
                var afternoon = ('Good Afternoon');
                var evening = ('Good Evening');

                if (thehours >= 0 && thehours < 12) {
                    themessage = morning; 

                } else if (thehours >= 12 && thehours < 17) {
                    themessage = afternoon;

                } else if (thehours >= 17 && thehours < 24) {
                    themessage = evening;
                }

                $('.greeting').append(themessage);
            
            </script>
        
    </body>
</html>