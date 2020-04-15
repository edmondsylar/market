<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->session->keep_flashdata('product_error');
        $this->session->keep_flashdata('product_name');
        $this->session->keep_flashdata('product_description');
        $this->session->keep_flashdata('product_summary');
        $this->session->keep_flashdata('product_price');
        $this->session->keep_flashdata('product_colors');
        $this->session->keep_flashdata('product_meta_title');
        $this->session->keep_flashdata('product_meta_keyword');
        $this->session->keep_flashdata('product_meta_description');
        $this->session->keep_flashdata('edit_product_error');
        $this->session->keep_flashdata('product_updated');
        $this->session->keep_flashdata('info');
        $this->session->keep_flashdata('editor');
        $this->session->keep_flashdata('ord_done');


        if(! $this->session->userdata('isAdmin')) {
            redirect('auth/admin');
        }
    }

    public function index()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['all_product'] = $this->Dashboard_stat_model->count_product();
        $view['no_delivery'] = $this->Dashboard_stat_model->no_delivary();
        $view['all_orders'] = $this->Dashboard_stat_model->count_orders();
        $view['all_earnings'] = $this->Dashboard_stat_model->count_earnings();
        $view['all_customers'] = $this->Dashboard_stat_model->count_customers();
        $view['all_product_brands'] = $this->Dashboard_stat_model->count_product_brands();
        $view['all_product_cat'] = $this->Dashboard_stat_model->count_product_cat();
        $view['all_product_sub_cat'] = $this->Dashboard_stat_model->count_product_sub_cat();
        $view['panel'] = 'admin/index';
        $this->load->view('sections/panel/panel-view', $view);
    }

    public function categories()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        if($this->uri->segment(3)) {
            $url = $this->uri->segment(3);
            switch ($url) {
                case 'main-categories':
                $row_count = $this->Main_category_model->count_main_cat();
                $config['base_url'] = base_url().'admin/categories/main-categories/';
                $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
                $config['full_tag_close'] = '</ul></div>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
                $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
                $config['total_rows'] = $row_count;
                $config['per_page'] = 10;
                $config['num_links'] = 10;
                $config['url_segment'] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $view['pages'] = $this->pagination->create_links();

                $view['get_cat_lists'] = $this->Main_category_model->list($page);
                $view['main_cat_view'] = 'admin/category/main-category';
                $this->load->view('sections/panel/category/main-categories', $view);
                    break;
                case 'sub-categories':
                if($this->uri->segment(4)) {
                    if($this->uri->segment(4) != 'page') {
                        $cat = $this->uri->segment(4);
                        $id = $this->Main_category_model->findCatSlug($cat);
                        $row_count = $this->Sub_categories_model->count_sub_cat($id);
                        $config['base_url'] = base_url().'admin/categories/sub-categories/'.$cat .'/';
                        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
                        $config['full_tag_close'] = '</ul></div>';
                        $config['cur_tag_open'] = '<li class="active"><a href="#">';
                        $config['cur_tag_close'] = '</a></li>';
                        $config['num_tag_open'] = '<li>';
                        $config['num_tag_close'] = '</li>';
                        $config['first_tag_open'] = '<li>';
                        $config['first_tag_close'] = '</li>';
                        $config['last_tag_open'] = '<li>';
                        $config['last_tag_close'] = '</li>';
                        $config['prev_tag_open'] = '<li>';
                        $config['prev_tag_close'] = '</li>';
                        $config['next_tag_open'] = '<li>';
                        $config['next_tag_close'] = '</li>';
                        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
                        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
                        $config['total_rows'] = $row_count;
                        $config['per_page'] = 10;
                        $config['num_links'] = 10;
                        $config['url_segment'] = 5;
                        $this->pagination->initialize($config);
                        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                        $view['pages'] = $this->pagination->create_links();


                        $view['sub_cats'] = $this->Sub_categories_model->main_list($id, $page);
                    } else {

                        $row_count = $this->Sub_categories_model->count_sub_cat_single();
                        $config['base_url'] = base_url().'admin/categories/sub-categories/page/';
                        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
                        $config['full_tag_close'] = '</ul></div>';
                        $config['cur_tag_open'] = '<li class="active"><a href="#">';
                        $config['cur_tag_close'] = '</a></li>';
                        $config['num_tag_open'] = '<li>';
                        $config['num_tag_close'] = '</li>';
                        $config['first_tag_open'] = '<li>';
                        $config['first_tag_close'] = '</li>';
                        $config['last_tag_open'] = '<li>';
                        $config['last_tag_close'] = '</li>';
                        $config['prev_tag_open'] = '<li>';
                        $config['prev_tag_close'] = '</li>';
                        $config['next_tag_open'] = '<li>';
                        $config['next_tag_close'] = '</li>';
                        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
                        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
                        $config['total_rows'] = $row_count;
                        $config['per_page'] = 10;
                        $config['num_links'] = 10;
                        $config['url_segment'] = 5;
                        $this->pagination->initialize($config);
                        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                        $view['pages'] = $this->pagination->create_links();


                        $view['sub_cats'] = $this->Sub_categories_model->list($page);

                    }
                }else {
                    $row_count = $this->Sub_categories_model->count_sub_cat_single();
                    $config['base_url'] = base_url().'admin/categories/sub-categories/page';
                    $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
                    $config['full_tag_close'] = '</ul></div>';
                    $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    $config['cur_tag_close'] = '</a></li>';
                    $config['num_tag_open'] = '<li>';
                    $config['num_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
                    $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
                    $config['total_rows'] = $row_count;
                    $config['per_page'] = 10;
                    $config['num_links'] = 10;
                    $config['url_segment'] = 4;
                    $this->pagination->initialize($config);
                    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    $view['pages'] = $this->pagination->create_links();


                    $view['sub_cats'] = $this->Sub_categories_model->list($page);
                }
                if($this->uri->segment(4) AND $this->uri->segment(4) != 'page') {
                    $cat = $this->uri->segment(4);
                    $view['selected'] = $this->Main_category_model->selected($cat);
                }
                $view['select_main_cat'] = $this->Main_category_model->select();
                $view['sub_cat_view'] = 'admin/category/sub_category';
                $this->load->view('sections/panel/category/sub_category', $view);
                    break;
                case label:
                    break;
                default:
            }
        }else {
            $this->load->view('errors/custorm/404');
        }
    }

    //Pages view section

    public function settings($url)
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['get_pref_values'] = $this->Pref_settings_model->pref_settings_values();
        $view['get_smtp_settings'] = $this->Smtp_settings_model->get();
        switch ($url) {
            case 'prefrences':
            $view['prefrences'] = 'admin/settings/prefrences';
            $this->load->view('sections/settings/prefrences', $view);
                break;
            case 'email-settings':
            $view['email_settings'] = 'admin/settings/email-settings';
            $this->load->view('sections/settings/email-settings', $view);
                break;
            case 'editors':
            $view['cur_editor'] = $this->Pref_settings_model->currentEditor();
            $view['editor_settings'] = 'admin/settings/editor';
            $this->load->view('sections/settings/editor', $view);
                break;
            case 'value-added-tax':
            $view['vat'] = $this->Pref_settings_model->shop_tax();
            $view['vat_settings'] = 'admin/settings/vat';
            $this->load->view('sections/settings/vat', $view);
                break;
            case 'livechat':
            $view['show_code'] = $this->Pref_settings_model->livechat();
            $view['live_chat_view'] = 'admin/settings/livechat';
            $this->load->view('sections/settings/livechat', $view);
                break;
            case 'google-tags':
            $view['gt'] = $this->Pref_settings_model->getGoogleTags();
            $view['google_tags_view'] = 'admin/settings/google_tags';
            $this->load->view('sections/settings/google_tags', $view);
                break; 
            default:
            redirect(404);
        }
    }

    public function testimonial($url)
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['get_pref_values'] = $this->Pref_settings_model->pref_settings_values();
        $view['get_smtp_settings'] = $this->Smtp_settings_model->get();
        switch ($url) {
            case 'approved':
            $view['approves'] = $this->Testimonial_model->get_approves();
            $view['approved_testi_view'] = 'admin/testimonial/approved';
            $this->load->view('sections/panel/testimonial/approved', $view);
                break;
            case 'pending':
            $view['pendings'] = $this->Testimonial_model->get_pending();
            $view['pending_testi_view'] = 'admin/testimonial/pending';
            $this->load->view('sections/panel/testimonial/pending', $view);
                break;
            default:
            redirect(404);
        }
    }

    public function pages()
    {
        $uid = $this->session->userdata('uid');
        $view['editor'] = $this->Plugin_editor_model->editor();
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['get_pref_values'] = $this->Pref_settings_model->pref_settings_values();
        $view['get_smtp_settings'] = $this->Smtp_settings_model->get();
        if($this->uri->segment(3)):
        $url = $this->uri->segment(3);
        switch ($url) {
            case 'about-us':
            $view['about_us'] = $this->Pages_model->about_us();
            $view['about_us_view'] = 'admin/pages/about-us';
            $this->load->view('sections/panel/pages/about-us', $view);
                break;
            default:
            if($this->Pages_model->find_page($url))
            {
                $view['my_page'] = $this->Pages_model->find_page($url);
                $view['my_page_view'] = 'admin/pages/my-page';
                $this->load->view('sections/panel/pages/my-page', $view);
            } else
            {
                redirect(404);
            }
        }
        else:
            $view['create_page_view'] = 'admin/pages/create';
            $this->load->view('sections/panel/pages/create', $view);
        endif;
    }

    public function email_template($url)
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['get_pref_values'] = $this->Pref_settings_model->pref_settings_values();
        $view['get_smtp_settings'] = $this->Smtp_settings_model->get();
        switch ($url) {
            case 'welcome-email':
            $view['get_welcome_temps'] = $this->Email_templates_model->getWelcome();
            $view['welcome_mail'] = 'admin/emails/welcome-email';
            $this->load->view('sections/panel/emails/welcome-email', $view);
                break;
            case 'email-tags':
            $view['email_tags'] = 'admin/emails/email-tags';
            $this->load->view('sections/panel/emails/email-tags', $view);
                break;
            case 'activation-email':
            $view['get_activate_temps'] = $this->Email_templates_model->getActivate();
            $view['activation_mail'] = 'admin/emails/activation-email';
            $this->load->view('sections/panel/emails/activation-email', $view);
                break;
            case 'change-pass-noti':
            $view['get_cpn_temps'] = $this->Email_templates_model->getCpn();
            $view['change_pass_noti'] = 'admin/emails/change-pass-noti';
            $this->load->view('sections/panel/emails/change-pass-noti', $view);
                break;
            default:
            redirect(404);
        }
    }

    public function admins()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        //Pagination class

        $row_count = $this->Admin_user_model->count();
        $config['base_url'] = base_url().'admin/admins/';
        $config['full_tag_open'] = '<div class="text-right"><ul class="pagination pagination-split justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['num_links'] = 10;
        $config['url_segment'] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();

        $view['admins_list'] = $this->Admin_user_model->list($page);
        $view['admin_list'] = 'admin/users/admin/admin';
        $this->load->view('sections/panel/users/admin/admin', $view);
    }

    public function customers()
    {
        $row_count = $this->Customer_account_model->count_customers();
        $config['base_url'] = base_url().'admin/customers/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['num_links'] = 10;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();

        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['customers'] = $this->Customer_account_model->loadCustomers($page);
        $view['customer_list'] = 'admin/users/customer/index';
        $this->load->view('sections/panel/users/customer/index', $view);
    }

    public function shop_setup()
    {
        $view['fresh_categories'] = $this->Shop_sections_model->fresh_cat_edit();
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['main_set_view'] = 'admin/setup/index';
        $this->load->view('sections/panel/setup/main-set', $view);   
    }

    public function product_brands()
    {
        $row_count = $this->Product_brands_model->count_product_brands();
        $config['base_url'] = base_url().'admin/product_brands/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['num_links'] = 10;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();


        $view['brand_lists'] = $this->Product_brands_model->list($page);
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['brand_list_view'] = 'admin/products/brands';
        $this->load->view('sections/panel/products/brand-lists', $view);
    }

    public function store()
    {
        $view['editor'] = $this->Plugin_editor_model->editor();
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();

        if($this->uri->segment(3) AND $this->uri->segment(3) != 'pages') {
            $url = $this->uri->segment(3);
            switch ($url) {
                case 'add-product':
                $view['select_sub_cats'] = $this->Sub_categories_model->select_sub_cats();
                $view['select_main_cats'] = $this->Main_category_model->select_cats();
                $view['select_brands'] = $this->Product_brands_model->select_brands();
                $view['add_product_view'] = 'admin/store/add-product';
                $this->load->view('sections/panel/store/add-product', $view);
                    break;
                case 'product-detail':
                if($this->uri->segment(4)) {
                    $slug = $this->uri->segment(4);
                    $view['product_detail'] = $this->Product_model->findProductSlug($slug);
                    if($view['product_detail']) {
                        $pro_id = $view['product_detail']->product_id;
                        $pro_sub_id = $view['product_detail']->main_cat_id;
                        $view['main_cat'] = $this->Main_category_model->get_main($pro_sub_id);
                        $view['product_previews'] = $this->Product_preview_model->dispalyForAdmin($pro_id);
                        $view['product_details_view'] = 'admin/store/product-details';
                        $this->load->view('sections/panel/store/product-details', $view);
                    }else {
                        redirect(404);
                    }
                }else {
                    redirect(404);
                }
                    break;
                case 'edit-product':
                if($this->uri->segment(4)) {
                    $slug = $this->uri->segment(4);
                    $view['edit_product'] = $this->Product_model->findProductSlug($slug);
                    if($view['edit_product']) {
                        $pro_id = $view['edit_product']->product_id;
                        $view['select_sub_cats'] = $this->Sub_categories_model->select_sub_cats();
                        $view['select_main_cats'] = $this->Main_category_model->select_cats();
                        $view['select_brands'] = $this->Product_brands_model->select_brands();
                        $view['product_previews'] = $this->Product_preview_model->dispalyForAdmin($pro_id);
                        $view['edit_product_view'] = 'admin/store/edit-product';
                        $this->load->view('sections/panel/store/edit-product', $view);
                    }else {
                        redirect(404);
                    }
                }else {
                    redirect(404);
                }
                    break;
                case 'featured-product':
                $view['featureds']= $this->Product_model->admin_featured_list();
                $view['featured_view'] = 'admin/store/featured';
                $this->load->view('sections/panel/store/featured', $view);

                    break;

                default:
            }
        } else {
            $this->session->unset_userdata('product_slug');

            $row_count = $this->Product_model->count_product();
            $config['base_url'] = base_url().'admin/store/pages/';
            $config['full_tag_open'] = '<ul class="pagination pagination-rounded justify-content-end mb-3">';
            $config['full_tag_close'] = '</ul>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript: void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item page-link">';
            $config['num_tag_close'] = '</li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item page-link">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item page-link">';
            $config['last_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['prev_link'] = '<span class="page-link" aria-hidden="true">«</span><span class="sr-only">Previous</span>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['next_link'] = '<span class="page-link" aria-hidden="true">»</span><span class="sr-only">Next</span>';
            $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
            $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
            $config['total_rows'] = $row_count;
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $config['url_segment'] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $view['pages'] = $this->pagination->create_links();

            $view['admin_product_lists'] = $this->Product_model->admin_list($page);
            $view['products_view'] = 'admin/store/list';
            $this->load->view('sections/panel/store/list', $view);
        }
    }

    public function product_advert_slider()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['product_advert_slider_view'] = 'admin/slider/product_advert_slider';
        $this->load->view('sections/panel/slider/product_advert_slider', $view);
    }

    public function customer_orders()
    {
        if(isset($_POST['s_order'])) {
            $order_no = $this->input->post('search_order');
            $uid = $this->session->userdata('uid');
            $view['myProfile'] = $this->Auth_model->isAdmin($uid);
            $view['pages'] = NULL;
            $view['orders'] = $this->Customer_order_model->searchAdminOrders($order_no);
            $view['bundles'] = $this->Customer_order_model->getAdminBundles();
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['customer_orders_view'] = 'admin/orders/all';
            $this->load->view('sections/panel/orders/all', $view);
        }else {
            $row_count = $this->Customer_order_model->count();
            $config['base_url'] = base_url().'admin/customer_orders/';
            $config['full_tag_open'] = '<div class="text-right"><ul class="pagination pagination-split justify-content-end footable-pagination m-t-10">';
            $config['full_tag_close'] = '</ul></div>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
            $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
            $config['total_rows'] = $row_count;
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $config['url_segment'] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $view['pages'] = $this->pagination->create_links();


            $uid = $this->session->userdata('uid');
            $view['myProfile'] = $this->Auth_model->isAdmin($uid);
            $view['cus_pages'] = $this->Pages_model->list_pages();
            $view['orders'] = $this->Customer_order_model->loadAdminOrders($page);
            $view['bundles'] = $this->Customer_order_model->getAdminBundles();
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['customer_orders_view'] = 'admin/orders/all';
            $this->load->view('sections/panel/orders/all', $view);
        }
    }

    public function payment_received()
    {
        if(isset($_POST['s_order'])) {
            $order_no = $this->input->post('search_order');
            $uid = $this->session->userdata('uid');
            $view['myProfile'] = $this->Auth_model->isAdmin($uid);
            $view['pages'] = NULL;
            $view['payments'] = $this->Customer_order_model->searchAdminPayments($order_no);
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['payments_view'] = 'admin/orders/payments';
            $this->load->view('sections/panel/orders/payments', $view);
        }else {
            $row_count = $this->Customer_order_model->countPayments();
            $config['base_url'] = base_url().'admin/payment_received/';
            $config['full_tag_open'] = '<div class="text-right"><ul class="pagination pagination-split justify-content-end footable-pagination m-t-10">';
            $config['full_tag_close'] = '</ul></div>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
            $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
            $config['total_rows'] = $row_count;
            $config['per_page'] = 20;
            $config['num_links'] = 10;
            $config['url_segment'] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $view['pages'] = $this->pagination->create_links();


            $uid = $this->session->userdata('uid');
            $view['myProfile'] = $this->Auth_model->isAdmin($uid);
            $view['cus_pages'] = $this->Pages_model->list_pages();
            $view['payments'] = $this->Customer_order_model->loadAdminPayments($page);
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['payments_view'] = 'admin/orders/payments';
            $this->load->view('sections/panel/orders/payments', $view);
        }
    }

    public function payment_gateways()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['paypal'] = $this->Payment_gateways_model->paypal();
        $view['stripe'] = $this->Payment_gateways_model->stripe();
        $view['paystack'] = $this->Payment_gateways_model->paystack();
        $view['gateways'] = 'admin/payments/gateways';
        $this->load->view('sections/panel/payments/gateways', $view);
    }

    //Edit item page

    public function edit_admin($user)
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        if($view['edit_admin'] = $this->Admin_user_model->edit($user)) {
            $view['edit_admin_page'] = 'admin/users/admin/edit';
            $this->load->view('sections/panel/users/admin/edit', $view);
        }else {
            $this->load->view('errors/custorm/404');
        }
    }

    //Ajax page loading

    public function admin_ajax_load()
    {
        $row_count = $this->Admin_user_model->count();
        $config['base_url'] = base_url().'admin/admins/';
        $config['full_tag_open'] = '<div class="text-right"><ul class="pagination pagination-split justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['url_segment'] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();

        $view['admins_list'] = $this->Admin_user_model->list($page);
        $this->load->view('admin/users/admin/admin_ajax_load', $view);
    }

    public function create_admin()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['create_admin'] = 'admin/users/admin/create_admin';
        $this->load->view('sections/panel/users/admin/create_admin', $view);
    }

    public function create_customer()
    {
        $uid = $this->session->userdata('uid');
        $view['myProfile'] = $this->Auth_model->isAdmin($uid);
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['create_customer'] = 'admin/users/customer/create_customer';
        $this->load->view('sections/panel/users/customer/create_customer', $view);
    }

    public function get_main_cat_stat()
    {
        $view['get_stat'] = $this->Main_category_model->stat();
        $this->load->view('admin/category/ajax_main_cat_stat', $view);
    }

    public function get_sub_cat_stats($cat)
    {
        $id = $this->Main_category_model->findCatSlug($cat);
        $view['get_stat'] = $this->Sub_categories_model->stats($id);
        $this->load->view('admin/category/ajax_sub_cat_stat', $view);
    }

    public function get_sub_cat_stat()
    {
        $view['get_stat'] = $this->Sub_categories_model->stat();
        $this->load->view('admin/category/ajax_sub_cat_stat', $view);
    }

    public function ajax_count_cats($cat)
    {
        $id = $this->Main_category_model->findCatSlug($cat);
        $view['grab_name'] = $this->Main_category_model->findName($cat);
        $view['get_count_stats'] = $this->Sub_categories_model->count_stat($id);
        $this->load->view('admin/category/ajax_count_sub_cat_stat', $view);
    }

    public function get_main_cat_list()
    {
        $row_count = $this->Main_category_model->count_main_cat();
        $config['base_url'] = base_url().'admin/get_main_cat_list/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 10;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();

        $view['get_cat_lists'] = $this->Main_category_model->list($page);
        $this->load->view('admin/category/ajax_main_cat_list', $view);
    }

    public function get_sub_cat_list()
    {
        if($this->uri->segment(3) == 'page') {
            $row_count = $this->Sub_categories_model->count_sub_cat_single();
            $config['base_url'] = base_url().'admin/get_sub_cat_list/page/';
            $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
            $config['full_tag_close'] = '</ul></div>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
            $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
            $config['total_rows'] = $row_count;
            $config['per_page'] = 10;
            $config['url_segment'] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $view['pages'] = $this->pagination->create_links();
        }else {
            $row_count = $this->Sub_categories_model->count_sub_cat_single();
            $config['base_url'] = base_url().'admin/get_sub_cat_list/';
            $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
            $config['full_tag_close'] = '</ul></div>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
            $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
            $config['total_rows'] = $row_count;
            $config['per_page'] = 10;
            $config['url_segment'] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $view['pages'] = $this->pagination->create_links();
        }


        $view['sub_cats'] = $this->Sub_categories_model->list($page);
        $this->load->view('admin/category/ajax_sub_cat_list', $view);
    }

    public function get_sub_cat_lists($cat)
    {
        $id = $this->Main_category_model->findCatSlug($cat);
        $row_count = $this->Sub_categories_model->count_sub_cat($id);
        $config['base_url'] = base_url().'get_sub_cat_lists/'.$cat.'/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 10;
        $config['url_segment'] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $view['pages'] = $this->pagination->create_links();


        $view['sub_cats'] = $this->Sub_categories_model->main_list($id, $page);
        $this->load->view('admin/category/ajax_sub_cat_list', $view);
    }

    public function load_product_brands()
    {
        $row_count = $this->Product_brands_model->count_product_brands();
        $config['base_url'] = base_url().'admin/load_product_brands/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();


        $view['brand_lists'] = $this->Product_brands_model->list($page);
        $this->load->view('admin/products/ajax_brand_load', $view);
    }

    public function load_product_brands_stat()
    {
        $view['count_brand_list'] = $this->Product_brands_model->get_stat();
        $this->load->view('admin/products/ajax_brand_stat', $view);
    }

    public function load_product_shots($slug)
    {
        $pro = $this->Product_model->findSlug($slug);
        $pid = $pro->product_id;
        $view['get_edit_shot'] = $this->Product_preview_model->get_shot($pid);
        $this->load->view('admin/store/edit-preview-list', $view);
    }

    public function ajax_add_feature_product($id) {
        if($this->Product_model->checkFeatured($id)) {
            if($this->Product_model->addToFeatured($id)) {
                echo "<script>$('#toastr-three').click();</script>";
            }
        }else {
            echo "<script>$('#toastr-two').click();</script>";
        }
    }

    public function ajax_load_slider_view()
    {
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $this->load->view('admin/slider/ajax_load_slider_view', $view);
    }

    public function get_customer_stat()
    {
        $view['get_stat'] = $this->Customer_account_model->stat();
        $this->load->view('admin/users/customer/customer_load_stat', $view);
    }

    public function get_customers()
    {
        $row_count = $this->Customer_account_model->count_customers();
        $config['base_url'] = base_url().'admin/get_customers/';
        $config['full_tag_open'] = '<div class="float-right"><ul class="pagination pagination-split pagination-rounded justify-content-end footable-pagination m-t-10">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<i class="fa fa-angle-left"></i>';
        $config['next_tag_link'] = '<i class="fa fa-angle-right"></i>';
        $config['total_rows'] = $row_count;
        $config['per_page'] = 20;
        $config['url_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view['pages'] = $this->pagination->create_links();


        $view['customers'] = $this->Customer_account_model->loadCustomers($page);
        $this->load->view('admin/users/customer/ajax_load_customer', $view);
    }

    //Creating new data and forms
    public function new_admin()
    {
        $website_info = $this->Pref_settings_model->pref_settings_values();
        if(! $this->input->is_ajax_request()) { exit ('Something went wrong');}

        if(! empty($_FILES['admin_profile_picture']['name'])) {

            $this->form_validation->set_rules('admin_username', 'Admin Username', 'trim|required|xss_clean|strip_tags|is_unique[admins.admin_username]|min_length[4]', array('required' => 'Admin username must be Filed', 'is_unique' => 'Sorry but the username<b>'.$this->input->post('admin_username').'</b> is Already In Used', 'min_length' => 'The username must be at least four characters'));
            $this->form_validation->set_rules('admin_email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email|is_unique[admins.admin_email]', array('required' => 'The email address is Rquired', 'valid_email' => 'Please use a valid Email Address', 'is_unique' => 'This Emaill address is already taken'));
            $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
            $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
            $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|strip_tags|min_length[8]', array('min_length' => 'Your password must be atleat 8 Characters', 'required' => 'Provide Your Password'));
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean|strip_tags|required|matches[admin_password]', array('matches' => 'Sorry but your passwords does not Match'));

            //if the process in creating in account fail we show alert messages
            
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>','
            </div>
                ');
            } else {
                //if the inputed forms are valid we can proceed registration here.

                
                $config['upload_path'] = './statics/user_data/profile_pictures/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['min_width']  = '200';
                $config['min_height']  = '200';
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['file_name'] = $this->input->post('admin_username') . "_" . strtolower($website_info->website_name).".png";
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('admin_profile_picture')){
                    echo $this->upload->display_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>'
                    );
                    echo "<script>$('#toastr-four').click();</script>";
                }
                else{
                    $uploaded_picture = $this->upload->data();
                    $picture = $uploaded_picture['file_name'];

                    //let store all user data recieved
                    $username = $this->input->post('admin_username');
                    $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                    $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                    $email = $this->input->post('admin_email');
                    $user_password = $this->input->post('admin_password');
                    $country = $this->input->post('user_country');
                    $region = $this->input->post('user_region');
                    $gender = $this->input->post('user_gender');
                    $password = password_hash($user_password, PASSWORD_DEFAULT);
                    $profile_picture = $picture;

                    //Store the data in array
                    $data = array(
                        'admin_username' => $username,
                        'admin_email' => $email,
                        'admin_firstname' => $firstname,
                        'admin_lastname' => $lastname,
                        'admin_gender' => $gender,
                        'admin_country' => $country,
                        'admin_region' => $region,
                        'admin_profile_picture' => $profile_picture,
                        'admin_password' => $password
                    );

                    if($this->Admin_user_model->create($data)) {
                        echo "<div class='alert alert-success' align='center'>Registration Successful Please Wait $ Seconds To Prepare</div>";
                        echo "<script>$('#toastr-three').click();</script>";
                        echo "
                            <script>
                                window.setTimeout(function() {
                                    window.location.href='" . base_url() . "admin/admins';
                                }, 4000);
                            </script>
                        ";
                    }
                    
                }
                
            }
        }else {
            //if profile picture is not set

            $this->form_validation->set_rules('admin_username', 'Admin Username', 'trim|required|xss_clean|strip_tags|is_unique[admins.admin_username]|min_length[4]', array('required' => 'Admin username must be Filed', 'is_unique' => 'Sorry but the username<b>'.$this->input->post('admin_username').'</b> is Already In Used', 'min_length' => 'The username must be at least four characters'));
            $this->form_validation->set_rules('admin_email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email|is_unique[admins.admin_email]', array('required' => 'The email address is Rquired', 'valid_email' => 'Please use a valid Email Address', 'is_unique' => 'This Emaill address is already taken'));
            $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
            $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
            $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|strip_tags|min_length[8]', array('min_length' => 'Your password must be atleat 8 Characters', 'required' => 'Provide Your Password'));
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|strip_tags|matches[admin_password]', array('matches' => 'Sorry but your passwords does not Match'));

            //if the process in creating in account fail we show alert messages
            
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('
                <div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>','
            </div>
                ');
                echo "<script>$('#toastr-four').click();</script>";
            } else {
                //let store all user data recieved
                $username = $this->input->post('admin_username');
                $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                $email = $this->input->post('admin_email');
                $user_password = $this->input->post('admin_password');
                $country = $this->input->post('user_country');
                $region = $this->input->post('user_region');
                $gender = $this->input->post('user_gender');
                $password = password_hash($user_password, PASSWORD_DEFAULT);

                //Store the data in array
                $data = array(
                    'admin_username' => $username,
                    'admin_email' => $email,
                    'admin_firstname' => $firstname,
                    'admin_lastname' => $lastname,
                    'admin_gender' => $gender,
                    'admin_country' => $country,
                    'admin_region' => $region,
                    'admin_password' => $password
                );

                if($this->Admin_user_model->create($data)) {
                    echo "<div class='alert alert-success' align='center'>Registration Successful Please Wait $ Seconds To Prepare</div>";
                    echo "<script>$('#toastr-three').click();</script>";
                    echo "
                        <script>
                            window.setTimeout(function() {
                                window.location.href='" . base_url() . "admin/admins';
                            }, 4000);
                        </script>
                    ";
                }
            }

        }
        
    }

    public function create_main_category()
    {
        if(! $this->input->is_ajax_request()) {exit('Somthing went Wrong');}

        //Now let proccess the main category form
        $this->form_validation->set_rules('main_cat_name', 'Category Name', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[50]|is_unique[main_categories.main_cat_name]', array('is_unique' => 'Sorry but this category name already exist', 'min-length' => 'This category name must be at least 3 Characters', 'max-length' => 'You are creating a Category is must not exist 50 characters', 'required' => 'Please give your category a name'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $main_cat_name = $this->input->post('main_cat_name');

            //Now let us process the preview uploading
            
            $config['upload_path'] = './statics/shops/categories/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']  = '4025';
            $config['file_name'] = $main_cat_name . '_preview';
            
            $this->upload->initialize($config);
            
            if ( ! $this->upload->do_upload('main_cat_preview1')){
                echo $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>');
            }
            else{
                $pre1 = $this->upload->data();
                $main_preview1 = $pre1['file_name'];

                //now let process theother preview if set

                if(! empty($_FILES['main_cat_preview2']['name']) OR ! empty($_FILES['main_cat_preview3']['name'])) {

                    //let process their pictures
                    
                    $config['upload_path'] = './statics/shops/categories/';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['max_size']  = '4025';
                    $config['file_name'] = $main_cat_name . "_preview";
                    
                    $this->upload->initialize($config);
                    
                    if ( ! $this->upload->do_upload('main_cat_preview2')){
                        $error = array('error1' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                    } else {
                        $pre2 = $this->upload->data();
                        $main_preview2 = $pre2['file_name'];
                    }

                    //process second preview

                    $config['upload_path'] = './statics/shops/categories/';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['max_size']  = '4025';
                    $config['file_name'] = $main_cat_name . "_preview";
                    
                    $this->upload->initialize($config);
                    
                    if ( ! $this->upload->do_upload('main_cat_preview3')){
                        $error = array('error2' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                    } else {
                        $pre3 = $this->upload->data();
                        $main_preview3 = $pre3['file_name'];
                    }

                    if(! empty($error['error1'])) {
                        echo $error['error1'];
                        echo "<script>$('#toastr-four').click();</script>";
                    } elseif(! empty($error['error2'])) {
                        echo $error['error2'];
                        echo "<script>$('#toastr-four').click();</script>";
                    }else {

                        //let complete the uploading...
                        $data = array(
                            'main_cat_name' => $main_cat_name,
                            'status' => $this->input->post('status'),
                            'main_cat_slug' => url_title($main_cat_name, 'dash', TRUE),
                            'main_cat_preview1' => $main_preview1,
                            'main_cat_preview2' => $main_preview2,
                            'main_cat_preview3' => $main_preview3
                        );

                        if($this->Main_category_model->new_category($data)) {
                            echo "<div class='alert alert-success' align='center'>New Category Has Been Created Successfully Create <b>New</b> or click <b>Close</b> Button below.</div>";
                            echo "<script>$('#toastr-three').click();</script>";
                        } else {
                            echo "<div class='alert alert-danger' align='center'>It look like something went wrong try again</div>";
                            echo "<script>$('#toastr-four').click();</script>";
                        }
                    }
                    
                    
                } else {
                    //let complete the uploading...
                    $data = array(
                        'main_cat_name' => $main_cat_name,
                        'status' => $this->input->post('status'),
                        'main_cat_slug' => url_title($main_cat_name, 'dash', TRUE),
                        'main_cat_preview1' => $main_preview1
                    );

                    if($this->Main_category_model->new_category($data)) {
                        echo "<div class='alert alert-success' align='center'>New Category Has Been Created Successfully Create <b>New</b> or click <b>Close</b> Button below.</div>";
                        echo "<script>$('#toastr-three').click();</script>";
                    } else {
                        echo "<div class='alert alert-danger' align='center'>It look like something went wrong try again</div>";
                        echo "<script>$('#toastr-four').click();</script>";
                    }
                }
            }
            
        }
        

    }

    public function create_sub_category()
    {
        if(! $this->input->is_ajax_request()) {exit('Somthing went Wrong');}

        //let make some validation processing here
        $this->form_validation->set_rules('sub_cat_name', 'Category Name', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[50]|is_unique[sub_categories.sub_cat_name]', array('required' => 'What is the name of the Category?', 'is_unique' => 'Sorry this category already exist'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $data = array(
                'main_cat_id' => $this->input->post('main_cat_id'),
                'sub_cat_status' => $this->input->post('sub_cat_status'),
                'sub_cat_name' => $this->input->post('sub_cat_name'),
                'sub_cat_slug' => url_title($this->input->post('sub_cat_name'), 'dash', TRUE)
            );

            if($this->Sub_categories_model->new_category($data)) {
                echo "<div class='alert alert-success' align='center'>New Category Has Been Created Successfully Create <b>New</b> or click <b>Close</b> Button below.</div>";
                echo "<script>$('#toastr-three').click();</script>";
            } else {
                echo "<div class='alert alert-danger' align='center'>It look like something went wrong try again</div>";
                echo "<script>$('#toastr-four').click();</script>";
            }
        }
        
    }

    public function create_new_brand()
    {
        if(! $this->input->is_ajax_request()) {exit('Somthing went Wrong');}
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required|xss_clean|strip_tags|is_unique[product_brands.brand_name]|max_length[20]', array('required' => 'Please fill in the brand name', 'is_unique' => 'This brand name already exsit'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<font color="red"><small><b>','</b></small></font>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $data = array(
                'brand_name' => $this->input->post('brand_name'),
                'brand_status' => 1,
                'brand_slug' => url_title($this->input->post('brand_name'), 'dash', TRUE)
            );
            if($this->Product_brands_model->create($data)) {
                echo "<script>$('#toastr-three').click();</script>";
            } else {
                echo "<script>$('#toastr-four').click();</script>";
            }
        }
        
    }

    public function add_product()
    {
        //let store some temporary form data if error occurs
        $this->session->set_flashdata('product_name', $this->input->post('product_name'));
        $this->session->set_flashdata('product_description', $this->input->post('product_description'));
        $this->session->set_flashdata('product_summary', $this->input->post('product_summary'));
        $this->session->set_flashdata('product_price', $this->input->post('product_price'));
        $this->session->set_flashdata('product_colors', $this->input->post('product_colors'));
        $this->session->set_flashdata('product_meta_title', $this->input->post('product_meta_title'));
        $this->session->set_flashdata('product_meta_keyword', $this->input->post('product_meta_keyword'));
        $this->session->set_flashdata('product_meta_description', $this->input->post('product_meta_description'));

        
        //let validate our forms
        $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|xss_clean|strip_tags|min_length[2]|max_length[100]|is_unique[products.product_name]', array('required' => 'Please the product name is Required', 'is_unique' => 'Sorry but this product name alred in Stock'));
        $this->form_validation->set_rules('product_description', 'product Description', 'trim|required|xss_clean', array('required' => 'Please descript this product'));
        $this->form_validation->set_rules('product_summary', 'Product Summary', 'trim|required|xss_clean|strip_tags', array('required' => 'Please give brief infomation about this product'));
        $this->form_validation->set_rules('product_price', 'Product price', 'trim|required', array('required|xss_clean|strip_tags' => 'How much are we selling this product?'));
        $this->form_validation->set_rules('product_colors', 'Product Colors', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('product_meta_title', 'Product meta tags', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('product_meta_keyword', 'Product Meta keyword', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('product_meta_description', 'Product meta description', 'trim|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {

            $error = array(
                'product_error' => validation_errors('<div class="alert alert-warning" align="center">','</div>')
            );
            $this->session->set_flashdata($error, 5);
            redirect('admin/store/add-product');
        } else {

            
            $config['upload_path'] = './statics/shops/products/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['file_name'] = $this->input->post('product_name') . '_preview';
            
            $this->upload->initialize($config);
            
            if ( ! $this->upload->do_upload('product_show')){
                $error = array('product_error' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                $this->session->set_flashdata($error, 5);
                redirect('admin/store/add-product');
            }
            else{
                $fileToUpload = $this->upload->data();
                $product_show = $fileToUpload['file_name'];
            
            
            
                $data = array(
                    'sub_cat_id' => $this->input->post('sub_cat_id'),
                    'product_name' => $this->input->post('product_name'),
                    'product_brand_id' => $this->input->post('product_brand_id'),
                    'product_description' => $this->input->post('product_description'),
                    'product_summary' => $this->input->post('product_summary'),
                    'product_price' => $this->input->post('product_price'),
                    'product_status' => $this->input->post('product_status'),
                    'product_colors' => $this->input->post('product_colors'),
                    'product_meta_title' => $this->input->post('product_meta_title'),
                    'product_meta_keyword' => $this->input->post('product_meta_keyword'),
                    'product_meta_description' => $this->input->post('product_meta_description'),
                    'product_slug' => url_title($this->input->post('product_name'), 'dash', TRUE),
                    'product_created_at' => date('Y-M-d'),
                    'product_show' => $product_show
                );

                if($this->Product_model->create($data)) {
                    $this->session->set_userdata('product_slug', url_title($this->input->post('product_name'), 'dash', TRUE));
                    redirect('admin/store/add-product');
                }
            }
        }
        
    }

    public function create_product_shots()
    {
        if($this->session->userdata('product_slug')) {
            $slug = $this->session->userdata('product_slug');
            $pro = $this->Product_model->findSlug($slug);
            if($pro) {
                
                $config['upload_path'] = './statics/shops/products/';
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['file_name'] = $pro->product_name . '_preview';
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('file')){
                    $file_info = $this->upload->data();
                    $name = $file_info['file_name'];

                    $preview_data = array(
                        'product_id' => $pro->product_id,
                        'product_preview_name' => $name
                    );

                    $this->Product_preview_model->new($preview_data);
                }
                
            } else {
                redirect('admin/store/add-product');
            }
        } else {
            redirect('error_404');
        }
    }

    public function new_product_slider()
    {
        if( ! $this->input->is_ajax_request()) { exit('Something went Wrong!');}

        //Now let validate out forms
        $this->form_validation->set_rules('psa_description', 'Slider Description', 'trim|required|xss_clean|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('psa_button_text', 'Text on Button', 'trim|required|xss_clean|strip_tags|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('psa_link', 'Url Link', 'trim|required|xss_clean|strip_tags|valid_url');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
        } else {
            //form validations now passed let process file uploading
            
            $config['upload_path'] = './statics/sliders/products/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_width']  = '555';
            $config['max_height']  = '440';
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ( ! $this->upload->do_upload('psa_image')){
                echo $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>');
            }
            else{
                $imgInfo = $this->upload->data();
                $imgName = $imgInfo['file_name'];

                $data = array(
                    'psa_description' => $this->input->post('psa_description'),
                    'psa_button_text' => $this->input->post('psa_button_text'),
                    'psa_link' => $this->input->post('psa_link'),
                    'psa_image' => $imgName
                );

                if($this->Product_advert_slider_model->new($data)) {
                    echo "<script>$('#toastr-three').click();</script>";
                    echo "<script>$('.bs-create-slider').modal('hide');</script>";
                } else {
                    echo "<script>$('#toastr-four').click();</script>";
                }
            }
            
        }
        
        
    }

    public function add_customer()
    {
        if( ! $this->input->is_ajax_request()){exit('Something Went Wrong');}
        
        //let validate the form
        $this->form_validation->set_rules('ca_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Firstname', 'min_length' => 'Sorry your Firstname must be more than 3 Characters', 'max_length' => 'Sorry your Firstname must not exceed 50 Characters', 'alpha' => 'Your Firstname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Lastname', 'min_length' => 'Sorry your Lastname must be more than 3 Characters', 'max_length' => 'Sorry your Lastname must not exceed 50 Characters', 'alpha' => 'Your Lastname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email|is_unique[customer_accounts.ca_email]', array('required' => 'Please provide your Email Address', 'is_unique' => 'Sorry but this email is already registerd with us'));
        $this->form_validation->set_rules('ca_username', 'Username', 'trim|required|min_length[5]|xss_clean|strip_tags|is_unique[customer_accounts.ca_username]', array('required' => 'Please choose a username', 'min_length' => 'Sorry your username must be more than 3 characters', 'is_unique' => 'Sorry but this Username is already taken try another'));
        $this->form_validation->set_rules('ca_password', 'Password', 'trim|required|min_length[8]|xss_clean|strip_tags', array('requred' => 'Please provide a strong Password', 'min_length' => 'Your password must be at least 8 characters'));
        $this->form_validation->set_rules('ca_password2', 'Confirm Password', 'trim|required|xss_clean|strip_tags|matches[ca_password]', array('required' => 'Please confirm your password', 'matches' => 'Sorry but your passwords does not match!'));

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p> ', '</p></div>');
        }else {
            $old_password = $this->input->post('ca_password');
            $password = password_hash($old_password, PASSWORD_DEFAULT);
            $data = array(
                'ca_username' => $this->input->post('ca_username'),
                'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                'ca_email' => $this->input->post('ca_email'),
                'ca_password' => $password,
                'ca_create_day' => date('j'),
                'ca_create_month' => date('M'),
                'ca_create_year' => date('Y'),
                'is_verify' => 1,
                'ca_status' => 1
            );

            if($this->Customer_account_model->register($data)) {
                echo '<div class="alert alert-success" align="center">Registration Successful</div>';
                $username = $this->input->post('ca_username');
                $grab_uid = $this->Customer_account_model->grabUid($username);
                $customer_detail = $this->Customer_account_model->createCustomerDetails($grab_uid);
                $customer_balance = $this->Customer_account_model->createCustomerBalance($grab_uid);
                $customer_contact_detail = $this->Customer_account_model->createCustomerContactDetail($grab_uid);
                $customer_shipping_address = $this->Customer_account_model->createCustomerShippingAddress($grab_uid);
                //let send verification code via email
                    
                $site_info = $this->Pref_settings_model->pref_settings_values();
                $template = array(
                    'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
                    'site_name' => $site_info->website_name,
                    'main_url' => base_url(),
                    'user_firstname' => $this->input->post('ca_firstname'),
                    'user_lastname' => $this->input->post('ca_lastname'),
                );

                $get_welcome_temps = $this->Email_templates_model->getWelcome();
                $template['get_welcome_temps'] = $get_welcome_temps->mail_body;

                $messages = $this->parser->parse('mailers/welcome/send', $template, true);

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
                $this->email->from($email_set->smtp_default_email, $email_set->smtp_display_name);
                $this->email->to($this->input->post('ca_email'));
                $this->email->subject('Welcome To ' . $site_info->website_name . '');
                $this->email->message($messages);
                if($this->email->send()) {

                    //let redirect the user
                    echo "
                    <script type='text/javascript'>
                        window.location.href='". base_url() ."admin/customers"."';
                    </script>
                ";
                }
            }
        }
    }

    public function create_new_page()
    {
        $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required|max_length[50]|xss_clean|strip_tags|is_unique[pages.page_title]');
        $this->form_validation->set_rules('page_content', 'Page Content', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'error' => validation_errors('<div class="alert alert-danger" align="center">','</div>')
            );
            $this->session->set_flashdata($errors);
            redirect('admin/pages');
        } else {
            $data = array(
                'page_title' => $this->input->post('page_title'),
                'page_content' => $this->input->post('page_content'),
                'page_slug' => url_title($this->input->post('page_title'), 'dash', TRUE)
            );

            if($this->Pages_model->create_page($data))
            {
                $this->session->set_flashdata('error', '<div class="alert alert-success" align="center">Your new page has been created Successfully!</div>');
                redirect('admin/pages');
            }
        }
        
    }

    //Updating of data sections

    public function updated_settings_1()
    {
        //let update the first row section
        $this->form_validation->set_rules('website_name', 'Website Name', 'trim|required|xss_clean|strip_tags|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('website_title', 'Website Title', 'trim|required|xss_clean|strip_tags|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('website_description', 'Website Description', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('website_keyword', 'Website keyword', 'trim|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => validation_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>',
                '</div>
                ')
            );

            //let store the session
            $this->session->set_flashdata($error);
            
            //let redirect back
            redirect('admin/settings/prefrences');
        } else {
            //Store the input data in array
            $data = array(
                'website_name' => $this->input->post('website_name'),
                'website_title' => $this->input->post('website_title'),
                'website_description' => $this->input->post('website_description'),
                'website_keyword' => $this->input->post('website_keyword')
            );
            //call the model to update
            if($this->Pref_settings_model->update_settings($data)) {
                $this->session->set_flashdata('setttings', 'updated');
                redirect('admin/settings/prefrences');
            }
        }
        
        
        
        
    }

    public function updated_settings_2()
    {
        //validate if website logo not empty
        if(! empty($_FILES['website_logo']['name'])) {
            //let validate the form
            
            $config['upload_path'] = './statics/uploads/pref_settings/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '600';
            $config['max_height']  = '300';
            $config['file_name'] = 'logo.png';
            $config['overwrite'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ( ! $this->upload->do_upload('website_logo')){
                $error = array('error' => $this->upload->display_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>',
                '</div>
                '
                ));

                //let store the error session
                $this->session->set_flashdata($error);

                //now redirect
                redirect('admin/settings/prefrences');
            }
            else{
                $file = $this->upload->data();
            }
            
        }

        if(! empty($_FILES['website_favicon']['name'])) {
            //let validate the form
            
            $config['upload_path'] = './statics/uploads/pref_settings/';
            $config['allowed_types'] = 'jpeg|jpg|png|ico';
            $config['max_size']  = '1000';
            $config['max_width']  = '100';
            $config['max_height']  = '100';
            $config['file_name'] = 'favicon.png';
            $config['overwrite'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ( ! $this->upload->do_upload('website_favicon')){
                $error = array('error' => $this->upload->display_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>',
                '</div>
                '
                ));

                //let store the error session
                $this->session->set_flashdata($error);

                //now redirect
                redirect('admin/settings/prefrences');
            }
            else{
                $file_fav = $this->upload->data();
            }
            
        }

        $website_currency = $this->input->post('website_currency');
        switch ($website_currency) {
            case 'USD':
            $website_currency_symbol = '$';
                break;
            case 'EUR':
            $website_currency_symbol = '€';
                break;
            case 'UKP':
            $website_currency_symbol = '£';
                break;
            case 'JPY':
            $website_currency_symbol = '¥';
                break;
            case 'NGN':
            $website_currency_symbol = 'N';
                break;
            default:
        }

        $data = array(
            'website_currency' => $website_currency,
            'website_currency_symbol' => $website_currency_symbol,
            'website_color' => $this->input->post('website_color'),
            'website_status' => $this->input->post('website_status')
        );

        //update the database
        if($this->Pref_settings_model->update_settings($data)) {
            $this->session->set_flashdata('setttings', 'updated');
            redirect('admin/settings/prefrences');
        }
        
    }

    public function update_settings_3()
    {
        $this->form_validation->set_rules('website_email', 'Company Email', 'trim|required|xss_clean|strip_tags|valid_email');
        $this->form_validation->set_rules('website_address', 'Company Address', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('website_number', 'Company Phone Number', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => validation_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>',
                '</div>
                ')
            );
            //let store the error messages
            $this->session->set_flashdata($error);
            redirect('admin/settings/prefrences');
        } else {
            
            //good to insert into the database
            $data = array(
                'website_email' => $this->input->post('website_email'),
                'website_address' => $this->input->post('website_address'),
                'website_number' => $this->input->post('website_number')
            );

            //let now call the database
            if($this->Pref_settings_model->update_settings($data)) {

                //if success continue to update
                $this->session->set_flashdata('setttings', 'updated');
                
                //redirec back
                redirect('admin/settings/prefrences');
            }
        }
        
    }

    public function update_settings_4()
    {
        $this->form_validation->set_rules('website_facebook', 'Facebook Link', 'trim|xss_clean|strip_tags|valid_url');
        $this->form_validation->set_rules('website_twitter', 'Twitter Link', 'trim|xss_clean|strip_tags|valid_url');
        $this->form_validation->set_rules('website_instagram', 'Instagram Link', 'trim|xss_clean|strip_tags|valid_url');
        
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => validation_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>',
                '</div>
                ')
            );
            //let store the error messages
            $this->session->set_flashdata($error);
            redirect('admin/settings/prefrences');
        } else {
            
            //good to insert into the database
            $data = array(
                'website_facebook' => $this->input->post('website_facebook'),
                'website_twitter' => $this->input->post('website_twitter'),
                'website_instagram' => $this->input->post('website_instagram')
            );

            //let now call the database
            if($this->Pref_settings_model->update_settings($data)) {

                //if success continue to update
                $this->session->set_flashdata('setttings', 'updated');
                
                //redirec back
                redirect('admin/settings/prefrences');
            }
        }
        
    }

    public function update_admin($id)
    {
        $website_info = $this->Pref_settings_model->pref_settings_values();
        $pics = $this->Admin_user_model->fetch_user_photo($id);
        if(! $this->input->is_ajax_request()) { exit ('Something went wrong');}

        if(! empty($_POST['admin_password'])) {
            if(! empty($_FILES['admin_profile_picture']['name'])) {

                $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|strip_tags|min_length[8]', array('min_length' => 'Your password must be atleat 8 Characters', 'required' => 'Provide Your Password'));
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|strip_tags|matches[admin_password]', array('matches' => 'Sorry but your passwords does not Match'));
    
                //if the process in creating in account fail we show alert messages
                
                if ($this->form_validation->run() == FALSE) {
                    echo validation_errors('
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>','
                </div>
                    ');
                } else {
                    //if the inputed forms are valid we can proceed registration here.
    
                    
                    $config['upload_path'] = './statics/user_data/profile_pictures/';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['min_width']  = '200';
                    $config['min_height']  = '200';
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $pics->admin_username . "_" . strtolower($website_info->website_name).".png";
                    
                    $this->upload->initialize($config);
                    
                    if ( ! $this->upload->do_upload('admin_profile_picture')){
                        echo $this->upload->display_errors(
                            '<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>'
                        );
                        echo "<script>$('#toastr-four').click();</script>";
                    }
                    else{
                        $uploaded_picture = $this->upload->data();
                        $picture = $uploaded_picture['file_name'];
    
                        //let store all user data recieved
                        $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                        $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                        $user_password = $this->input->post('admin_password');
                        $country = $this->input->post('user_country');
                        $region = $this->input->post('user_region');
                        $gender = $this->input->post('user_gender');
                        $password = password_hash($user_password, PASSWORD_DEFAULT);
                        $profile_picture = $picture;
    
                        //Store the data in array
                        $data = array(
                            'admin_firstname' => $firstname,
                            'admin_lastname' => $lastname,
                            'admin_gender' => $gender,
                            'admin_country' => $country,
                            'admin_region' => $region,
                            'admin_profile_picture' => $profile_picture,
                            'admin_password' => $password
                        );
    
                        if($this->Admin_user_model->update($data, $id)) {
                            echo "<div class='alert alert-success' align='center'>Account Updated Successful Please Wait $ Seconds To Prepare</div>";
                            echo "<script>$('#toastr-three').click();</script>";
                            echo "
                                <script>
                                    window.setTimeout(function() {
                                        window.location.href='" . base_url() . "admin/admins';
                                    }, 4000);
                                </script>
                            ";
                        }
                        
                    }
                    
                }
            }else {
                //if profile picture is not set
    
                $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|strip_tags|min_length[8]', array('min_length' => 'Your password must be atleat 8 Characters', 'required' => 'Provide Your Password'));
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|strip_tags|matches[admin_password]', array('matches' => 'Sorry but your passwords does not Match'));
    
                //if the process in creating in account fail we show alert messages
                
                if ($this->form_validation->run() == FALSE) {
                    echo validation_errors('
                    <div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>','
                </div>
                    ');
                    echo "<script>$('#toastr-four').click();</script>";
                } else {
                    //let store all user data recieved
                    $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                    $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                    $user_password = $this->input->post('admin_password');
                    $country = $this->input->post('user_country');
                    $region = $this->input->post('user_region');
                    $gender = $this->input->post('user_gender');
                    $password = password_hash($user_password, PASSWORD_DEFAULT);
    
                    //Store the data in array
                    $data = array(
                        'admin_firstname' => $firstname,
                        'admin_lastname' => $lastname,
                        'admin_gender' => $gender,
                        'admin_country' => $country,
                        'admin_region' => $region,
                        'admin_password' => $password
                    );
    
                    if($this->Admin_user_model->update($data, $id)) {
                        echo "<div class='alert alert-success' align='center'>Account Updated Successful Please Wait $ Seconds To Prepare</div>";
                        echo "<script>$('#toastr-three').click();</script>";
                        echo "
                            <script>
                                window.setTimeout(function() {
                                    window.location.href='" . base_url() . "admin/admins';
                                }, 4000);
                            </script>
                        ";
                    }
                }
    
            }
        } else {
            //if password is not changing...
            if(! empty($_FILES['admin_profile_picture']['name'])) {

                $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
    
                //if the process in creating in account fail we show alert messages
                
                if ($this->form_validation->run() == FALSE) {
                    echo validation_errors('
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>','
                </div>
                    ');
                } else {
                    //if the inputed forms are valid we can proceed registration here.
    
                    
                    $config['upload_path'] = './statics/user_data/profile_pictures/';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['min_width']  = '200';
                    $config['min_height']  = '200';
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $pics->admin_username . "_" . strtolower($website_info->website_name).".png";
                    
                    $this->upload->initialize($config);
                    
                    if ( ! $this->upload->do_upload('admin_profile_picture')){
                        echo $this->upload->display_errors(
                            '<div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>'
                        );
                        echo "<script>$('#toastr-four').click();</script>";
                    }
                    else{
                        $uploaded_picture = $this->upload->data();
                        $picture = $uploaded_picture['file_name'];
    
                        //let store all user data recieved
                        $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                        $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                        $country = $this->input->post('user_country');
                        $region = $this->input->post('user_region');
                        $gender = $this->input->post('user_gender');
                        $profile_picture = $picture;
    
                        //Store the data in array
                        $data = array(
                            'admin_firstname' => $firstname,
                            'admin_lastname' => $lastname,
                            'admin_gender' => $gender,
                            'admin_country' => $country,
                            'admin_region' => $region,
                            'admin_profile_picture' => $profile_picture
                        );
    
                        if($this->Admin_user_model->update($data, $id)) {
                            echo "<div class='alert alert-success' align='center'>Account Updating Successful Please Wait $ Seconds To Prepare</div>";
                            echo "<script>$('#toastr-three').click();</script>";
                            echo "
                                <script>
                                    window.setTimeout(function() {
                                        window.location.href='" . base_url() . "admin/admins';
                                    }, 4000);
                                </script>
                            ";
                        }
                        
                    }
                    
                }
            }else {
                //if profile picture is not set
    
                $this->form_validation->set_rules('admin_firstname', 'Firstname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
                $this->form_validation->set_rules('admin_lastname', 'Lastname', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[12]');
    
                //if the process in creating in account fail we show alert messages
                
                if ($this->form_validation->run() == FALSE) {
                    echo validation_errors('
                    <div class="alert alert-warning alert-dismissible fade show" align="center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>','
                </div>
                    ');
                    echo "<script>$('#toastr-four').click();</script>";
                } else {
                    //let store all user data recieved
                    $firstname = ucfirst(strtolower($this->input->post('admin_firstname')));
                    $lastname = ucfirst(strtolower($this->input->post('admin_lastname')));
                    $country = $this->input->post('user_country');
                    $region = $this->input->post('user_region');
                    $gender = $this->input->post('user_gender');
    
                    //Store the data in array
                    $data = array(
                        'admin_firstname' => $firstname,
                        'admin_lastname' => $lastname,
                        'admin_gender' => $gender,
                        'admin_country' => $country,
                        'admin_region' => $region
                    );
    
                    if($this->Admin_user_model->update($data, $id)) {
                        echo "<div class='alert alert-success' align='center'>Account Updated Successful Please Wait $ Seconds To Prepare</div>";
                        echo "<script>$('#toastr-three').click();</script>";
                        echo "
                            <script>
                                window.setTimeout(function() {
                                    window.location.href='" . base_url() . "admin/admins';
                                }, 4000);
                            </script>
                        ";
                    }
                }
    
            }
        }
    }

    public function edit_main_category($id)
    {
        if(! $this->input->is_ajax_request()) {exit('Somthing went Wrong');}

        //Now let proccess the main category form
        $this->form_validation->set_rules('main_cat_name', 'Category Name', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[50]', array('min-length' => 'This category name must be at least 3 Characters', 'max-length' => 'You are creating a Category is must not exist 50 characters', 'required' => 'Please give your category a name'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $main_cat_name = $this->input->post('main_cat_name');

            //let process some form upload if any
            if(! empty($_FILES['main_cat_preview1']['name'])) {
                //if the main category is set let do something

                $config['upload_path'] = './statics/shops/categories/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']  = '4025';
                $config['file_name'] = $main_cat_name . "_preview";
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('main_cat_preview1')){
                    $error = array('error1' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                } else {
                    $pre1 = $this->upload->data();
                    $main_preview1 = $pre1['file_name'];

                    $data = array(
                        'main_cat_preview1' => $main_preview1
                    );
                    $this->Main_category_model->update_category($data, $id);
                }
            }

            if(! empty($_FILES['main_cat_preview2']['name'])) {
                //if the main category is set let do something

                $config['upload_path'] = './statics/shops/categories/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']  = '4025';
                $config['file_name'] = $main_cat_name . "_preview";
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('main_cat_preview2')){
                    $error = array('error2' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                } else {
                    $pre2 = $this->upload->data();
                    $main_preview2 = $pre2['file_name'];

                    $data = array(
                        'main_cat_preview2' => $main_preview2
                    );
                    $this->Main_category_model->update_category($data, $id);
                }
            }

            if(! empty($_FILES['main_cat_preview3']['name'])) {
                //if the main category is set let do something

                $config['upload_path'] = './statics/shops/categories/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']  = '4025';
                $config['file_name'] = $main_cat_name . "_preview";
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('main_cat_preview3')){
                    $error = array('error3' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                } else {
                    $pre3 = $this->upload->data();
                    $main_preview3 = $pre3['file_name'];

                    $data = array(
                        'main_cat_preview3' => $main_preview1
                    );
                    $this->Main_category_model->update_category($data, $id);
                }
            }


            //let confirm if all the form uploading ar okay
            if(! empty($error['error1'])) {
                echo $error['error1'];
                echo "<script>$('#toastr-four').click();</script>";
            } elseif(! empty($error['error2'])) {
                echo $error['error2'];
                echo "<script>$('#toastr-four').click();</script>";
            }elseif(! empty($error['error3'])) {
                echo $error['error3'];
                echo "<script>$('#toastr-four').click();</script>";
            } else {
                //let complete the uploading...
                $data = array(
                    'main_cat_name' => $main_cat_name,
                    'status' => $this->input->post('status')
                );

                if($this->Main_category_model->update_category($data, $id)) {
                    echo "<div class='alert alert-success' align='center'>New Category Has Been Created Successfully Create <b>New</b> or click <b>Close</b> Button below.</div>";
                    echo "<script>$('#toastr-three').click();</script>";
                    echo "<script>$('.bs-edit-main-cat-modal-lg".$id."').modal('hide');</script>";
                } else {
                    echo "<div class='alert alert-danger' align='center'>It look like something went wrong try again</div>";
                    echo "<script>$('#toastr-four').click();</script>";
                }
            }
        }
    }

    public function update_sub_category($id)
    {
        if(! $this->input->is_ajax_request()) {exit('Something Went Wrong');}

        //let make some validation processing here
        $this->form_validation->set_rules('sub_cat_name', 'Category Name', 'trim|required|xss_clean|strip_tags|min_length[3]|max_length[50]', array('required' => 'What is the name of the Category?'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $data = array(
                'main_cat_id' => $this->input->post('main_cat_id'),
                'sub_cat_status' => $this->input->post('sub_cat_status'),
                'sub_cat_name' => $this->input->post('sub_cat_name')
            );

            if($this->Sub_categories_model->update_category($data, $id)) {
                echo "<div class='alert alert-success' align='center'>Sub Category Has Been Updated Successfully Create <b>New</b> or click <b>Close</b> Button below.</div>";
                echo "<script>$('#toastr-three').click();</script>";
                echo "<script>$('.bs-edit-main-cat-modal-center".$id."').modal('hide');</script>";
            } else {
                echo "<div class='alert alert-danger' align='center'>It look like something went wrong try again</div>";
                echo "<script>$('#toastr-four').click();</script>";
            }
        }
    }

    public function update_fresh_cat_setup()
    {
        $this->form_validation->set_rules('fresh_cat_setup', 'Display Name', 'trim|required|xss_clean|strip_tags|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('fresh_cat_show_limit', 'Max Number Visible', 'trim|required|xss_clean|strip_tags|integer');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            echo "<script>$('#toastr-four').click();</script>";
        } else {
            $data = array(
                'title_name' => $this->input->post('fresh_cat_setup'),
                'show_limit' => $this->input->post('fresh_cat_show_limit'),
                'access_id' => $this->input->post('fresh_cat_access_id')
            );

            if($this->Shop_sections_model->update_fresh_cat_setup($data)) {
                echo "<script>$('#toastr-three').click();</script>";
            }
        }
        
    }

    public function update_product_brand($id)
    {
        if(! $this->input->is_ajax_request()) {exit('Something went Wrong');}
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required|xss_clean|strip_tags|max_length[20]');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger" align="center">','</div>');
        } else {
            $data = array(
                'brand_name' => $this->input->post('brand_name'),
                'brand_status' => $this->input->post('brand_status')
            );

            if($this->Product_brands_model->update($data, $id)) {
                echo "<script>$('#toastr-three').click();</script>";
                echo "<script>$('.bs-example-modal-center".$id."').modal('hide');</script>";
            }
        }
        
        
    }

    public function update_product($slug)
    {
         //let validate our forms
         $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|xss_clean|strip_tags|min_length[2]|max_length[100]', array('required' => 'Please the product name is Required'));
         $this->form_validation->set_rules('product_description', 'product Description', 'trim|required|xss_clean', array('required' => 'Please descript this product'));
         $this->form_validation->set_rules('product_summary', 'Product Summary', 'trim|required', array('required|xss_clean|strip_tags' => 'Please give brief infomation about this product'));
         $this->form_validation->set_rules('product_price', 'Product price', 'trim|required|xss_clean|strip_tags', array('required' => 'How much are we selling this product?'));
         $this->form_validation->set_rules('product_discount', 'Discount', 'trim|xss_clean|strip_tags|numeric');;
         $this->form_validation->set_rules('product_colors', 'Product Colors', 'trim|xss_clean|strip_tags');
         $this->form_validation->set_rules('product_meta_title', 'Product meta tags', 'trim|xss_clean|strip_tags');
         $this->form_validation->set_rules('product_meta_keyword', 'Product Meta keyword', 'trim|xss_clean|strip_tags');
         $this->form_validation->set_rules('product_meta_description', 'Product meta description', 'trim|xss_clean|strip_tags');

         if ($this->form_validation->run() == FALSE) {

            $error = array(
                'edit_product_error' => validation_errors('<div class="alert alert-warning" align="center">','</div>')
            );
            $this->session->set_flashdata($error, 5);
            redirect('admin/store/edit-product/'.$slug);
        } else {
            if( ! empty($_FILES['product_show']['name'])) {
                $config['upload_path'] = './statics/shops/products/';
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['file_name'] = $this->input->post('product_name') . '_preview';
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('product_show')){
                    $error = array('edit_product_error' => $this->upload->display_errors('<div class="alert alert-warning" align="center">','</div>'));
                    $this->session->set_flashdata($error, 5);
                    redirect('admin/store/add-product/'.$slug);
                }
                else{
                    $fileToUpload = $this->upload->data();
                    $product_show = $fileToUpload['file_name'];
                    $product_discount = $this->input->post('product_discount');
                    $product_fix_price = NULL;
                    $product_price = $this->input->post('product_price');

                    if($product_discount != NULL)
                    {
                        $product_new_price = $product_price -ceil($product_discount / 100 * $this->input->post('product_price'));
                        $product_price = $product_price - $product_new_price;
                        $product_fix_price = $this->input->post('product_price');
                        $product_discount = $this->input->post('product_discount');
                    }
                    else
                    {
                        $product_discount = NULL;
                    }
                
                
                    $data = array(
                        'sub_cat_id' => $this->input->post('sub_cat_id'),
                        'product_name' => $this->input->post('product_name'),
                        'product_brand_id' => $this->input->post('product_brand_id'),
                        'product_description' => $this->input->post('product_description'),
                        'product_summary' => $this->input->post('product_summary'),
                        'product_price' => $product_price,
                        'product_discount' => $product_discount,
                        'product_fix_price' => $product_fix_price,
                        'product_status' => $this->input->post('product_status'),
                        'product_colors' => $this->input->post('product_colors'),
                        'product_meta_title' => $this->input->post('product_meta_title'),
                        'product_meta_keyword' => $this->input->post('product_meta_keyword'),
                        'product_meta_description' => $this->input->post('product_meta_description'),
                        'product_show' => $product_show
                    );

                    if($this->Product_model->update($data, $slug)) {
                        $this->session->set_flashdata('product_updated', '<div class="alert alert-success" align="center">Product <b>'.$this->input->post('product_name').'</b> was recently last updated!</div>');
                        redirect('admin/store');
                    }
                }
            } else {
                $product_discount = $this->input->post('product_discount');
                $product_fix_price = NULL;
                $product_price = $this->input->post('product_price');

                if($product_discount != NULL)
                {
                    $product_new_price = ceil($product_discount / 100 * $this->input->post('product_price'));
                    $product_price = $product_price - $product_new_price;
                    $product_fix_price = $this->input->post('product_price');
                    $product_discount = $this->input->post('product_discount');
                }
                else
                {
                    $product_discount = NULL;
                }

                $data = array(
                    'sub_cat_id' => $this->input->post('sub_cat_id'),
                    'product_name' => $this->input->post('product_name'),
                    'product_brand_id' => $this->input->post('product_brand_id'),
                    'product_description' => $this->input->post('product_description'),
                    'product_summary' => $this->input->post('product_summary'),
                    'product_price' => $product_price,
                    'product_discount' => $product_discount,
                    'product_fix_price' => $product_fix_price,
                    'product_status' => $this->input->post('product_status'),
                    'product_colors' => $this->input->post('product_colors'),
                    'product_meta_title' => $this->input->post('product_meta_title'),
                    'product_meta_keyword' => $this->input->post('product_meta_keyword'),
                    'product_meta_description' => $this->input->post('product_meta_description')
                );

                if($this->Product_model->update($data, $slug)) {
                    $this->session->set_flashdata('product_updated', '<div class="alert alert-success" align="center">Product <b>'.$this->input->post('product_name').'</b> was recently last updated!</div>');
                    redirect('admin/store');
                }
            }
        }
    }

    public function update_product_shots($slug)
    {
        $pro = $this->Product_model->findSlug($slug);

        if($pro) {
                
            $config['upload_path'] = './statics/shops/products/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['file_name'] = $pro->product_name . '_preview';
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('file')){
                $file_info = $this->upload->data();
                $name = $file_info['file_name'];

                $preview_data = array(
                    'product_id' => $pro->product_id,
                    'product_preview_name' => $name
                );

                $this->Product_preview_model->new($preview_data);
            }
            
        }
    }

    public function update_smtp_settings()
    {
        //as usual let validate forms input
        $this->form_validation->set_rules('smtp_default_email', 'Default Email Address', 'trim|required|xss_clean|strip_tags|valid_email');
        $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('smtp_display_name', 'Dispaly Name', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('smtp_username', 'SMTP Username', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('smtp_password', 'SMTP Password', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'trim|required|xss_clean|strip_tags|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'error' => validation_errors('<div class="alert alert-warning" align="center">','</div>')
            );

            $this->session->set_flashdata($errors);
            redirect('admin/settings/email-settings');
        } else {
            //if validation is safe let insert to data base

            $data = array(
                'smtp_default_email'=> $this->input->post('smtp_default_email'),
                'smtp_display_name' => $this->input->post('smtp_display_name'),
                'smtp_type' => $this->input->post('smtp_type'),
                'smtp_username' => $this->input->post('smtp_username'),
                'smtp_password' => $this->input->post('smtp_password'),
                'smtp_port' => $this->input->post('smtp_port'),
                'smtp_host' => $this->input->post('smtp_host')
            );

            if($this->Smtp_settings_model->update($data)) {
                $this->session->set_flashdata('error', '<div class="alert alert-success" align="center">Smtp Settings Updated Successful!</div>');
                redirect('admin/settings/email-settings');
            }
        }
        
    }

    public function set_welcome_email()
    {
        $this->form_validation->set_rules('mail_body', 'Mil Content', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" align="center">Error Something Went Wrong!</div>');
            redirect('admin/email_template/welcome-email');
        } else {
            $data = array(
                'mail_body' => $this->input->post('mail_body')
            );

            if($this->Email_templates_model->setWelcomeEmail($data)) {
                $this->session->set_flashdata('info', '<div class="alert alert-success" align="center">Your Editing have been saved Successfully</div>');
                redirect('admin/email_template/welcome-email');
            }
        }
        
    }

    public function set_activation_email()
    {
        $this->form_validation->set_rules('mail_body', 'Mil Content', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" align="center">Error Something Went Wrong!</div>');
            redirect('admin/email_template/activation-email');
        } else {
            $data = array(
                'mail_body' => $this->input->post('mail_body')
            );

            if($this->Email_templates_model->setActivationEmail($data)) {
                $this->session->set_flashdata('info', '<div class="alert alert-success" align="center">Your Editing have been saved Successfully</div>');
                redirect('admin/email_template/activation-email');
            }
        }
        
    }

    public function set_cpn_email()
    {
        $this->form_validation->set_rules('mail_body', 'Mil Content', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" align="center">Error Something Went Wrong!</div>');
            redirect('admin/email_template/change-pass-noti');
        } else {
            $data = array(
                'mail_body' => $this->input->post('mail_body')
            );

            if($this->Email_templates_model->setCpnEmail($data)) {
                $this->session->set_flashdata('info', '<div class="alert alert-success" align="center">Your Editing have been saved Successfully</div>');
                redirect('admin/email_template/change-pass-noti');
            }
        }
        
    }

    public function edit_customer($id)
    {
        if( ! $this->input->is_ajax_request()){exit('Something Went Wrong');}
        
        //let validate the form
        $this->form_validation->set_rules('ca_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Firstname', 'min_length' => 'Sorry your Firstname must be more than 3 Characters', 'max_length' => 'Sorry your Firstname must not exceed 50 Characters', 'alpha' => 'Your Firstname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Lastname', 'min_length' => 'Sorry your Lastname must be more than 3 Characters', 'max_length' => 'Sorry your Lastname must not exceed 50 Characters', 'alpha' => 'Your Lastname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email', array('required' => 'Please provide your Email Address'));
        $this->form_validation->set_rules('ca_username', 'Username', 'trim|required|min_length[5]|xss_clean|strip_tags', array('required' => 'Please choose a username', 'min_length' => 'Sorry your username must be more than 3 characters'));
        $this->form_validation->set_rules('ca_password', 'Password', 'trim|min_length[8]|xss_clean|strip_tags', array('requred' => 'Please provide a strong Password', 'min_length' => 'Your password must be at least 8 characters'));

        if( ! empty($_POST['ca_password'])) {
            $this->form_validation->set_rules('ca_password2', 'Confirm Password', 'trim|xss_clean|strip_tags|matches[ca_password]', array('required' => 'Please confirm your password', 'matches' => 'Sorry but your passwords does not match!'));
            
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            } else {
                $old_password = $this->input->post('ca_password');
                $password = password_hash($old_password, PASSWORD_DEFAULT);
                $data = array(
                    'ca_username' => $this->input->post('ca_username'),
                    'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                    'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                    'ca_email' => $this->input->post('ca_email'),
                    'ca_password' => $password
                );

                if($this->Customer_account_model->updateCustomer($data, $id)) {
                    echo "<div class='alert alert-success' align='center'>New Customer Has Been Updated Successfully</div>";
                    echo "<script>$('#toastr-three').click();</script>";
                    echo "<script>$('.edit-center".$id."').modal('hide');</script>";
                }
            }
            
        } else {
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
            } else {
                $data = array(
                    'ca_username' => $this->input->post('ca_username'),
                    'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                    'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                    'ca_email' => $this->input->post('ca_email')
                );

                if($this->Customer_account_model->updateCustomer($data, $id)) {
                    echo "<div class='alert alert-success' align='center'>New Customer Has Been Updated Successfully</div>";
                    echo "<script>$('#toastr-three').click();</script>";
                    echo "<script>$('.edit-center".$id."').modal('hide');</script>";
                }
            }
        }
    }

    public function block_customer($id)
    {
        if($this->Customer_account_model->block($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.status-center".$id."').modal('hide');</script>";
        }
    }

    public function unblock_customer($id)
    {
        if($this->Customer_account_model->unblock($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.status-center".$id."').modal('hide');</script>";
        }
    }

    public function deactivate_customer($id)
    {
        if($this->Customer_account_model->deactivate($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.status-center".$id."').modal('hide');</script>";
        }
    }

    public function activate_customer($id)
    {
        if($this->Customer_account_model->activate($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.status-center".$id."').modal('hide');</script>";
        }
    }

    public function change_editor()
    {
        $editor = $this->input->post('editor');
        $data = array(
            'editor_name' => $editor
        );

        if($this->Pref_settings_model->changeEditor($data)) {
            $this->session->set_flashdata('editor', '<div class="alert alert-success" align="center">Success Your New Editor Is Now Activate</div>');
            redirect('admin/settings/editors');
        }
    }

    public function update_order_status($id, $ord)
    { 
        $data = array(
            'order_status' => $this->input->post('update_order')
        );
        if($this->Customer_order_model->adminUpdateStatus($id, $data)) {
            $this->session->set_flashdata('ord_done', '<div class="alert alert-success" align="center">Order as been Updated! <b>'.$ord.'</b> Last Updated</div>');
            redirect('admin/customer_orders');
        }
    }

    public function update_vat()
    {
        $this->form_validation->set_rules('shop_tax', 'Shopping tax', 'trim|required|numeric|xss_clean|strip_tags');
        
        if ($this->form_validation->run() ==  FALSE) {
            $errors = array(
                'vat' => validation_errors('<div class="alert alert-danger" align="center">','</div>')
            );
            $this->session->set_flashdata($errors);
            redirect('admin/settings/value-added-tax');
        } else {
            $data = array(
                'shop_tax' => $this->input->post('shop_tax')
            );

            if($this->Pref_settings_model->update_vat($data))
            {
                $this->session->set_flashdata('vat', '<div class="alert alert-success" align="center">Settings has been saved!</div>');
                redirect('admin/settings/value-added-tax');
            }
        }
        
    }

    public function update_about_us()
    {
        $this->form_validation->set_rules('about_us', 'Page Contents', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'error' => validation_errors('<div class="alert alert-danger" align="center">','</div>')
            );

            $this->session->set_flashdata($errors);
            redirect('admin/pages/about-us');
        } else {
            $data = array(
                'about_us_content' => $this->input->post('about_us')
            );

            if($this->Pages_model->update_about_us($data))
            {
                $this->session->set_flashdata('error', '<div class="alert alert-success" align="center">Settings has been saved!</div>');
                redirect('admin/pages/about-us');
            }
        }
        
    }

    public function update_my_page($id, $url)
    {
        $this->form_validation->set_rules('about_us', 'Page Contents', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'error' => validation_errors('<div class="alert alert-danger" align="center">','</div>')
            );

            $this->session->set_flashdata($errors);
            redirect('admin/pages/'.$url);
        } else {
            $data = array(
                'page_content' => $this->input->post('about_us')
            );

            if($this->Pages_model->update_my_page($data, $id))
            {
                $this->session->set_flashdata('error', '<div class="alert alert-success" align="center">Settings has been saved!</div>');
                redirect('admin/pages/'.$url);
            }
        }
    }

    public function update_paypal_gateway()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something went wrong');
        }

        $this->form_validation->set_rules('pg_bussiness_email', 'Business Email', 'trim|required|xss_clean|strip_tags|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
        } else {
            $data = array(
                'pg_bussiness_email' => $this->input->post('pg_bussiness_email'),
                'pg_is_active' => $this->input->post('pg_is_active')
            );

            if($this->Payment_gateways_model->update_paypal($data))
            {
                echo "<script>$('#toastr-three').click();</script>";
                echo "<script>$('.bs-example-modal-paypal').modal('hide');</script>";
            }
        }
        
    }

    public function update_stripe_gateway()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something went wrong');
        }

        $this->form_validation->set_rules('public_key', 'Public Key', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('secret_key', 'Secret Key', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
        } else {
            $data = array(
                'sg_api_key' => $this->input->post('public_key'),
                'sg_secret_key' => $this->input->post('secret_key'),
                'sg_is_active' => $this->input->post('is_active')
            );

            if($this->Payment_gateways_model->update_stripe($data))
            {
                echo "<script>$('#toastr-three').click();</script>";
                echo "<script>$('.bs-example-modal-stripe').modal('hide');</script>";
            }
        }
        
    }

    public function update_paystack_gateway()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something went wrong');
        }

        $this->form_validation->set_rules('public_key', 'Public Key', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('secret_key', 'Secret Key', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-warning" align="center">','</div>');
        } else {
            $data = array(
                'ps_public_key' => $this->input->post('public_key'),
                'ps_secret_key' => $this->input->post('secret_key'),
                'ps_is_active' => $this->input->post('is_active')
            );

            if($this->Payment_gateways_model->update_paystack($data))
            {
                echo "<script>$('#toastr-three').click();</script>";
                echo "<script>$('.bs-example-modal-paystack').modal('hide');</script>";
            }
        }
        
    }

    public function update_livechat()
    {
        $this->form_validation->set_rules('code', 'Cpde', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/settings/livechat', 'refresh');
        } else {
            $data = array(
                'lc_code' => $this->input->post('code')
            );

            if($this->Pref_settings_model->updateLiveChat($data))
            {
                $this->session->set_flashdata('infos', '<div class="alert alert-success">Your settings have been saved Successfuly</div>');
                redirect('admin/settings/livechat', 'refresh');
            }
        }
        
    }

    public function update_google_tags()
    {
        $this->form_validation->set_rules('google_meta_tags', 'Google Mea Tags', 'trim|xss_clean|strip_tags');

        $this->form_validation->set_rules('google_analystics', 'Google Analystics', 'trim|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'gt_info' => validation_errors('<div class="alert alert-warning" align="center">','</div>')
            );
            $this->session->set_flashdata($error);
            redirect('admin/settings/google-tags', 'refresh');
        } else {
            
            $data = array(
                'gt_meta_tags' => $this->input->post('google_meta_tags'),
                'gt_analytics' => $this->input->post('google_analystics')
            );

            if($this->Pref_settings_model->updateGoogleTags($data))
            {
                $this->session->set_flashdata('gt_info', '<div class="alert alert-success" align="center">Google tags has been updated successfully</div>');
                redirect('admin/settings/google-tags', 'refresh');
            }
        }
        
    }

    //Deleting actions
    public function delete_admin($id)
    {
        if(! $this->input->is_ajax_request()) { exit ('Something went wrong');}
        $pics = $this->Admin_user_model->fetch_user_photo($id);
        unlink('./statics/user_data/profile_pictures/'.$pics->admin_profile_picture);
        $this->Admin_user_model->delete($id);
    }

    public function delete_main_category($id)
    {
        if($this->Main_category_model->delete($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.bs-delete-modal-center".$id."').modal('hide');</script>";
        }
    }

    public function delete_sub_category($id)
    {
        if($this->Sub_categories_model->delete($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.bs-delete-modal-center".$id."').modal('hide');</script>";
        }
    }

    public function delete_product_brand($id)
    {
        if(! $this->input->is_ajax_request()) {exit('Something went wrong');}
        if($this->Product_brands_model->delete($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.bs-example-modal-sm".$id."').modal('hide');</script>";
        }
    }

    public function remove_preview_shot($id)
    {
        $this->Product_preview_model->remove($id);
    }

    public function delete_product($id)
    {
        if($this->Product_model->remove($id)) {
            redirect('admin/store');
        }
    }

    public function remove_featured($id)
    {
        if($this->Product_model->remove_featured($id)) {
            $this->session->set_flashdata('rmv_featured', '<div class="alert alert-success" align="center">Product has been Removed from featured List!</div>');
            redirect('admin/store/featured-product');
        }
    }

    public function remove_product_slider($id)
    {
        if( ! $this->input->is_ajax_request()) {exit('Something went wrong');}
        if($this->Product_advert_slider_model->remove($id)) {
            echo "<script>$('#toastr-three').click();</script>";
        } else {
            echo "<script>$('#toastr-four').click();</script>";
        }
    }

    public function delete_customer($id)
    {
        if($this->Customer_account_model->remove($id)) {
            echo "<script>$('#toastr-three').click();</script>";
            echo "<script>$('.delete-center".$id."').modal('hide');</script>";
        }
    }

    public function remove_order($id)
    {
        if($this->Customer_order_model->adminRemoveOrder($id)) {
            $this->session->set_flashdata('ord_done', '<div class="alert alert-danger" align="center">Last action We remove an Order</div>');
            redirect('admin/customer_orders');
        }
    }

    public function remove_page($id)
    {
        if($this->Pages_model->remove($id))
        {
            redirect('admin');
        }
    }

    public function delete_testi($id)
    {
        if($this->Testimonial_model->admin_delete($id))
        {
            redirect('admin/testimonial/pending');
        }
    }

    public function approve_testi($id)
    {
        $data = array(
            'testi_status' => 1
        );
        if($this->Testimonial_model->approve_test($data, $id))
        {
            redirect('admin/testimonial/approved');
        }
    }
}