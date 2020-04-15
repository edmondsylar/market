<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
        //$this->session->keep_flashdata('error');
        if($this->session->userdata('cusLogged')) {
            $status_stage = $this->session->userdata('cus_status');
            $cus_username = $this->session->userdata('cus_username');

            if($status_stage != 1) {
                redirect('blocked-status');
            }
        }
    }

    public function index()
    {
        if($this->uri->segment(2)) {
            $slug = $this->uri->segment(2);
            if($view['show_product'] = $this->Product_model->productSlug($slug)) {
                $product_id = $view['show_product']->product_id;
                $relete_id = $view['show_product']->sub_cat_id;
                $view['get_releteds'] = $this->Product_model->releted($relete_id, $product_id);
                //catch provided colors
                $product_colors = $view['show_product']->product_colors;
                if($product_colors != NULL) {
                    $color_tags = trim($product_colors, ',');
                    if($color_tags != "") {
                        $view['colors'] = explode(",", $color_tags);
                    }
                }
                $view['cus_user'] = $this->session->userdata('cus_username');
                $mine = $view['cus_user'];
                if($this->session->userdata('cus_id')) {
                    $uid = $this->session->userdata('cus_id');
                    $view['wishlists'] = $this->Customer_wishlist_model->profileList($uid);
                    $view['carts'] = $this->Customer_account_model->loadCarts($uid);
                } else {
                    $view['wishlists'] = NULL;
                }

                
                //shoping carts
                if($this->session->userdata('cus_id')) {
                    $uid = $this->session->userdata('cus_id');
                    $view['carts'] = $this->Customer_account_model->loadCarts($uid);
                }else {
                    $view['carts'] = NULL;
                }
                $product = $view['show_product'];
                $pr_get_id = $product->product_id;

                //let work on rating
                $rates = $this->Product_model->getSingleRate($pr_get_id);
                if(count($rates) > 0) {
                    $userRating = $rates[0]['pr_rating'];
                } else {
                    $userRating = 0;
                }

                //Averarage rating
                $avgr = $this->Product_model->getAverageRating($pr_get_id);
                if($avgr == ''){
                    $avgr = 0;
                }

                $view['user_rating'] = $userRating;
                $view['avg_rating'] = $avgr;
                $view['rates_count'] = $this->Product_model->getCountRate($pr_get_id);
                $view['reviews'] = $this->Product_model->getReviews($pr_get_id);
                if($this->session->userdata('cus_id')):
                $review_action = $this->Customer_order_model->canReview($pr_get_id, $uid);
                if($review_action) {

                    //Let check if user already review
                    $get_review_row = $this->Customer_order_model->isReview($uid, $pr_get_id);

                    if( ! $get_review_row) {
                        $view['good_to_review'] = TRUE;
                    }else {
                        $view['good_to_review'] = FALSE;
                    }
                }

                $view['review_action'] = $review_action;
                endif;
                
                $view['isFeautred'] = $this->Product_model->isFeatured($product_id);
                $view['cus_pages'] = $this->Pages_model->list_pages();
                $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
                $view['product_previews'] = $this->Product_preview_model->showForUsers($product_id);
                $view['main_brands'] = $this->Product_brands_model->list_all_brands();
                $view['home_main_cats'] = $this->Main_category_model->home_cat();
                $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
                $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
                $view['product_show_view'] = 'main/product/product-show';
                $this->load->view('sections/main/product/product-show', $view);
            }else {
                $this->load->view('errors/custorm/404');
            }
        }else {
            $this->load->view('errors/custorm/404');
        }
    }

    public function add_wishlist($id)
    {
        $uid = $this->session->userdata('cus_id');
        $checkWish = $this->Product_model->checkWishlist($id, $uid);
        if( ! $checkWish) {
            if($this->Product_model->addToWishlist($id, $uid)) {
                echo "<script>$('#wishlist-action').click();</script>";
                echo "<script>$('#wishAdd".$id."').addClass('active');</script>";
            }
        }else {
            echo "<script>$('#wishWarning').click();</script>";
        }
    }

    public function add_to_cart($id)
    {
        $uid = $this->session->userdata('cus_id');
        $checkWish = $this->Product_model->checkCart($id, $uid);
        if( ! $checkWish) {
            if($this->Product_model->addToCart($id, $uid)) {
                echo "<script>$('#cart-added-action').click();</script>";
            }
        }else {
            echo "<script>$('#cartWarning').click();</script>";
        }
    }

    public function search_product_ajax()
    {
        $query = '';
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();

        if($this->input->post('site_search'))
        {
            $query = $this->input->post('site_search');
        }

        $data = $this->Product_model->searchProduct($query);
        if($data)
        {
            if($data->num_rows() > 0){
                $view['results'] = $data->result();
            }
            else
            {
                $view['results'] = FALSE;
            }
        }
        
        if($query)
        {
            $view['searching'] = $query;
            $this->load->view('main/search/result', $view);
        }
    }

    public function admin_search_product_ajax()
    {
        $query = '';
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();

        if($this->input->post('find-product'))
        {
            $query = $this->input->post('find-product');
        }

        $data = $this->Product_model->searchAdminProduct($query);
        if($data)
        {
            if($data->num_rows() > 0){
                $view['results'] = $data->result();
            }
            else
            {
                $view['results'] = FALSE;
            }
        }
        
        if($query)
        {
            $view['searching'] = $query;
            $this->load->view('admin/search/result', $view);
        }
    }

    public function search()
    {
        if($this->input->post('site_search'))
        {
            redirect('search-result/'. $this->input->post('site_search'));
        }
        else
        {
            $this->load->view('errors/custorm/404');
        }
    }

    public function search_result()
    {
        if(! $this->uri->segment(2))
        {
            redirect('404');
        }

        $keyword = $this->uri->segment(2);

        $row_count = $this->Product_model->count_search($keyword);
        $config['base_url'] = base_url().'search-result/'.$keyword. '/';
        $config['full_tag_open'] = '<nav class="pagination"><div class="column"><ul class="pages">';
        $config['full_tag_close'] = '</ul></div></nav>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript: void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = '<span class="btn btn-outline-secondary btn-sm"><i class="icon-arrow-left"></i> First</span>';
        $config['first_tag_open'] = '<span class="float-right column text-right hidden-xs-down">';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="float-right column text-right hidden-xs-down">';
        $config['last_tag_close'] = '</span>';
        $config['last_link'] = '<span class="btn btn-outline-secondary btn-sm">Last <i class="icon-arrow-right"></i></span>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 10;
        $config['num_links'] = 10;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();


        // echo $this->input->post('site_search');
        $view['cus_user'] = $this->session->userdata('cus_username');
        $mine = $view['cus_user'];
        //shoping carts
        if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['carts'] = $this->Customer_account_model->loadCarts($uid);
        }else {
            $view['carts'] = NULL;
        }
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['get_testi'] = $this->Testimonial_model->list_all();
        $view['main_brands'] = $this->Product_brands_model->list_all_brands();
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['get_searches'] = $this->Product_model->getSearch($keyword, $page);
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['search_view'] = 'main/search/view';
        $this->load->view('sections/main/category/search', $view);
    }
}