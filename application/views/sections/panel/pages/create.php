<?php
//admin header section
$this->load->view('sections/panel/inc/panel-header');

//admin top bar
$this->load->view('sections/panel/inc/admin-top-bar');

//admin sidebar
$this->load->view('sections/panel/inc/admin-side-bar');

//Admin min view page
$this->load->view($create_page_view);

//ADmin main footer
$this->load->view('sections/panel/inc/footer');
$this->load->view('sections/panel/inc/panel-footer');
