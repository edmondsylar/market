<?php
//top header section
$this->load->view('sections/main/inc/main-header');

//Shop category header
$this->load->view('sections/main/inc/shop-category-header');

//mobile menu
$this->load->view('sections/main/inc/mobile-menu');

//top bar
$this->load->view('sections/main/inc/top-bar');

//nave bar
$this->load->view('sections/main/inc/main-nav-bar');

//main content view page
$this->load->view($page_view);

//footer section
$this->load->view('sections/main/inc/footer');
$this->load->view('sections/main/inc/main-footer');
$this->load->view('sections/main/inc/addon');
?>