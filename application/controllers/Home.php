<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }

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
        if($view['set_fresh_cat'] = $this->Shop_sections_model->fresh_categories()) {
            $tot_fresh_cat = $view['set_fresh_cat']->show_limit;
            $view['top_cats'] = $this->Main_category_model->fresh_cats($tot_fresh_cat);
        }
        $view['cus_user'] = $this->session->userdata('cus_username');
        $mine = $view['cus_user'];
        $view['cus_pages'] = $this->Pages_model->list_pages();
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
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['get_testi'] = $this->Testimonial_model->list_all();
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['main'] = 'main/index';
        $this->load->view('sections/main/main-view.php', $view);
    }

    public function ajax_load_testi()
    {
        $view['get_testi'] = $this->Testimonial_model->list_all();
        $this->load->view('main/account/ajax_load_testi', $view);
    }

    public function category()
    {
        $row_count = $this->Main_category_model->count_home_cats();
        $config['base_url'] = base_url().'shop-category/';
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
        $config['per_page'] = 12;
        $config['num_links'] = 10;
        $config['url_segment'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $view['pages'] = $this->pagination->create_links();

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
        $view['list_all_cats'] = $this->Main_category_model->get_all_cats($page);
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['main_cat_view'] = 'main/category/main-cat-list';
        $this->load->view('sections/main/category/main-cat-list', $view);
    }

    public function product_category()
    {
        if($this->uri->segment(2)) {
            $cat_slug = $this->uri->segment(2);
            //let fetch out the cat slug here
            if($main_cat_ids = $this->Main_category_model->findMainCat($cat_slug)) {
                $main_cat_id = $main_cat_ids->id;
                $view['main_cat_info'] = $main_cat_ids;

                $row_count = $this->Sub_categories_model->count_view_cats($main_cat_id);
                $config['base_url'] = base_url().'shop-category/'.$cat_slug.'/';
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
                $config['per_page'] = 18;
                $config['num_links'] = 10;
                $config['url_segment'] = 3;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $view['pages'] = $this->pagination->create_links();

                $view['cus_user'] = $this->session->userdata('cus_username');
                $mine = $view['cus_user'];
                if($this->session->userdata('cus_id')) {
                    $uid = $this->session->userdata('cus_id');
                    $view['wishlists'] = $this->Customer_wishlist_model->profileList($uid);
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
                $view['cat_products'] = $this->Sub_categories_model->get_cat_product($main_cat_id, $page);

                $view['main_side_cats'] = $this->Main_category_model->home_side_cats();
                $view['cus_pages'] = $this->Pages_model->list_pages();
                $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
                $view['main_brands'] = $this->Product_brands_model->list_all_brands();
                $view['list_all_cats'] = $this->Main_category_model->get_all_cats($page);
                $view['home_main_cats'] = $this->Main_category_model->home_cat();
                $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
                $view['main_side_sub_cats'] = $this->Sub_categories_model->home_side_sub_cats();
                $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
                $view['main_cat_show_view'] = 'main/category/main-cat-show';
                $this->load->view('sections/main/category/main-cat-show', $view);
            }else {
                $this->load->view('errors/custorm/404');
            }
        }else {
            $this->load->view('errors/custorm/404');
        }
    }

    public function all_product()
    {
        $row_count = $this->Product_model->count_all_stock();
        $config['base_url'] = base_url().'stock/';
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
        $config['num_links'] = 10;
        $config['per_page'] = 18;
        $config['url_segment'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $view['pages'] = $this->pagination->create_links();

        $view['cus_user'] = $this->session->userdata('cus_username');
        $mine = $view['cus_user'];
        if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['wishlists'] = $this->Customer_wishlist_model->profileList($uid);
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
        $view['get_all_home_products'] = $this->Product_model->show_all_product($page);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['main_brands'] = $this->Product_brands_model->list_all_brands();
        $view['list_all_cats'] = $this->Main_category_model->get_all_cats($page);
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['main_all_product_view'] = 'main/product/list-all';
        $this->load->view('sections/main/product/list-all', $view);
    }

    public function testemail()
    {
        //$this->load->view('mailers/email_verify/send');
        $view['site_info'] = $this->Pref_settings_model->pref_settings_values();
        // if ($this->agent->is_browser())
        // {
        //         $agent = $this->agent->browser();
        // }
        // elseif ($this->agent->is_robot())
        // {
        //         $agent = $this->agent->robot();
        // }
        // elseif ($this->agent->is_mobile())
        // {
        //         $agent = $this->agent->mobile();
        // }
        // else
        // {
        //         $agent = 'Unidentified User Agent';
        // }
        // $template = array(
        //     'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
        //     'site_name' => $site_info->website_name,
        //     'main_url' => base_url(),
        //     'user_firstname' => 'Zubayr',
        //     'user_lastname' => 'Ganiyu',
        //     'pass_date' => date('M d Y'),
        //     'pass_device' => $agent,
        //     'pass_plat' => $this->agent->platform()
        // );
        // $get_activation_temps = $this->Email_templates_model->getActivation();
        // $template['get_activation_temps'] = $get_activation_temps->mail_body;
        // $this->parser->parse('mailers/order_paid/send', $view);
        // $order_no = "336BA2EB48";
        // $view['p_order'] = $this->Customer_order_model->searchOrderPaid($order_no);
        // $view['p_bundles'] = $this->Customer_order_model->PaidBundles();
        // $view['tax'] = $this->Product_model->getTax();
        // $this->load->view('mailers/order_paid/send', $view);

        echo mt_rand(000000, 999999);
    }

    public function ajax_load_carts()
    {
         //shoping carts
         if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['carts'] = $this->Customer_account_model->loadCarts($uid);
        }else {
            $view['carts'] = NULL;
        }
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $this->load->view('main/cart/ajax_load_cart', $view);
    }

    public function ajax_cart_stat()
    {
        if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['count_cart'] = $this->Customer_account_model->countCarts($uid);
        }else {
            $view['count_cart'] = NULL;
        }
        echo $view['count_cart'];
    }

    public function get_cart_total()
    {
        $uid = $this->session->userdata('cus_id');
        $web_info = $this->Pref_settings_model->pref_settings_values();
        if($this->Customer_account_model->countCarts($uid) > 0) {
            if($this->session->userdata('cus_id')) {
                $catchCat = $this->Customer_account_model->getAmounts($uid);
            }else {
                $catchCat = NULL;
            }
            $amts = 0;
            foreach($catchCat as $key => $g_cat) {
                $amt = $g_cat->shop_cart_quantity * $g_cat->product_price;
                $amts+= $amt;
                
            }
            
            echo $web_info->website_currency_symbol . number_format($amts);
        }else {
            echo $web_info->website_currency_symbol.'0.00';
        }
    }

    public function about_us()
    {
        $view['about_us'] = $this->Pages_model->about_us();
        if($view['set_fresh_cat'] = $this->Shop_sections_model->fresh_categories()) {
            $tot_fresh_cat = $view['set_fresh_cat']->show_limit;
            $view['top_cats'] = $this->Main_category_model->fresh_cats($tot_fresh_cat);
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
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['about_us_view'] = 'main/pages/about-us';
        $this->load->view('sections/main/pages/about-us', $view);
    }

    public function pages()
    {
        if($this->uri->segment(2))
        {
            $url = $this->uri->segment(2);
            if($view['page_show'] = $this->Pages_model->find_page($url))
            {
                if($view['set_fresh_cat'] = $this->Shop_sections_model->fresh_categories()) {
                    $tot_fresh_cat = $view['set_fresh_cat']->show_limit;
                    $view['top_cats'] = $this->Main_category_model->fresh_cats($tot_fresh_cat);
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
                $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
                $view['cus_pages'] = $this->Pages_model->list_pages();
                $view['load_sliders'] = $this->Product_advert_slider_model->load();
                $view['home_featured_products'] = $this->Product_model->home_featured_list();
                $view['fresh_products'] = $this->Product_model->home_list();
                $view['home_main_cats'] = $this->Main_category_model->home_cat();
                $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
                $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
                $view['page_view'] = 'main/pages/my_page';
                $this->load->view('sections/main/pages/my_page', $view);
            }
            else
            {
                redirect('404');
            }
        }
        else
        {
            redirect(404);
        }
    }

    public function contact_us()
    {
        if($view['set_fresh_cat'] = $this->Shop_sections_model->fresh_categories()) {
            $tot_fresh_cat = $view['set_fresh_cat']->show_limit;
            $view['top_cats'] = $this->Main_category_model->fresh_cats($tot_fresh_cat);
        }
        $view['cus_user'] = $this->session->userdata('cus_username');
        $mine = $view['cus_user'];
        $view['cus_pages'] = $this->Pages_model->list_pages();
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
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['get_testi'] = $this->Testimonial_model->list_all();
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['contact_us_view'] = 'main/pages/contact-us';
        $this->load->view('sections/main/pages/contact-us', $view);
    }

    public function send_us_message()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something went wrong');
        }

        $this->form_validation->set_rules('name', 'Full name', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('email', 'Emil', 'trim|required|xss_clean|strip_tags|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
        } else {
            $site_info = $this->Pref_settings_model->pref_settings_values();

            $messages = $this->input->post('message');
            $subject = $this->input->post('subject');
            $email = $this->input->post('email');
            $name = $this->input->post('name');

                     $email_set = $this->Smtp_settings_model->get();
                    if($email_set->smtp_type == 'ssl') {
                        $config['protocol']  = 'smtp';
                        $config['smtp_host'] = $email_set->smtp_type . '://' . $email_set->smtp_host;
                        $config['smtp_port'] = $email_set->smtp_port;
                        $config{'smtp_user'} = $email_set->smtp_username;
                        $config{'smtp_pass'} = $email_set->smtp_password;
                        $config['mailtype']  = 'html';
                        $config['charset']   = 'utf-8';
                        $config['newline'] = '\n';
                    } else {
                        $config['protocol']  = 'smtp';
                        $config['smtp_host'] = $email_set->smtp_host;
                        $config['smtp_port'] = $email_set->smtp_port;
                        $config{'smtp_user'} = $email_set->smtp_username;
                        $config{'smtp_pass'} = $email_set->smtp_password;
                        $config['mailtype']  = 'html';
                        $config['charset']   = 'utf-8';
                        $config['newline'] = '\n';
                    }

                    $this->email->initialize($config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");
                    $this->email->from($email_set->smtp_default_email, $name);
                    $this->email->to($site_info->website_email);
                    $this->email->reply_to($email, 'Support Reply');
                    $this->email->subject($subject);
                    $this->email->message($messages);
                    if($this->email->send()) {

                        echo '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> Thank You For Reaching Us  We Will Get Back To You</p></div>';
                    }
        }
        
        
    }

    public function sitemap()
    {
        $data['sitemap'] = $this->Product_model->sitemapProducts();
        $this->load->view('main/sitemap', $data);
    }
}