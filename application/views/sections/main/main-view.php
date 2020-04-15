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

//Random product slider section
$this->load->view('sections/main/inc/product-slider');

//top categories
$this->load->view('sections/main/inc/fresh-categories');

//featured product lis
$this->load->view('sections/main/inc/featured-product');

//main content view page
$this->load->view($main);

//footer section
$this->load->view('sections/main/inc/testimonial');
$this->load->view('sections/main/inc/services');
$this->load->view('sections/main/inc/footer');
$this->load->view('sections/main/inc/main-footer');
$this->load->view('sections/main/inc/addon');
?>