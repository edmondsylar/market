<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
        $this->session->keep_flashdata('error');
        if($this->session->userdata('cusLogged')) {
            $status_stage = $this->session->userdata('cus_status');
            $cus_username = $this->session->userdata('cus_username');

            if($status_stage != 1) {
                redirect('blocked-status');
            }
        }else {
            redirect('authentication');
        }
    }

    public function my_account()
    {
        $uid = $this->session->userdata('cus_id');
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
        $view['count_order'] = $this->Customer_order_model->countOrders($uid);
        $view['wishlist_stat'] = $this->Customer_wishlist_model->getStat($uid);
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['profile_view'] = 'main/account/profile';
        $this->load->view('sections/main/account/profile', $view);
    }

    public function update_account()
    {
        $uid = $this->session->userdata('cus_id');
        $user = $this->session->userdata('cus_username');

        if( ! $this->input->is_ajax_request()){exit('Something went wrong here');}

        //now let process form..
        $this->form_validation->set_rules('ca_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[20]|xss_clean|strip_tags|alpha', array('required' => 'Please provide your firstname', 'min_lenght' => 'Your first name must be at least 3 characters', 'max_lenght' => 'Your firstname must not be more than 20 characters', 'alpha' => 'Your firstname can no contain speccial characters'));
        $this->form_validation->set_rules('ca_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[20]|xss_clean|strip_tags|alpha', array('required' => 'Please provide your lastname', 'min_lenght' => 'Your last name must be at least 3 characters', 'max_lenght' => 'Your lastname must not be more than 20 characters', 'alpha' => 'Your lastname can no contain speccial characters'));
        $this->form_validation->set_rules('cu_account_phone', 'Phone Number', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('ca_password', 'Password', 'trim|min_length[8]|strip_tags|xss_clean');

        if( ! empty($_POST['ca_password'])) {
            $this->form_validation->set_rules('con_pass', 'Confirm_password', 'trim|xss_clean|strip_tags|matches[ca_password]', array('matches' => 'Your Passwords does not match'));
            
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
                echo "<script>$('#error').click();</script>";
            } else {
                $password = password_hash($this->input->post('ca_password'), PASSWORD_DEFAULT);
                $data = array(
                    'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                    'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                    'ca_password' => $password
                );

                if($this->Customer_account_model->updateProfile($data, $uid)) {
                    $phone = array(
                        'cu_account_phone' => $this->input->post('cu_account_phone'),
                        'cu_country' => $this->input->post('cu_country'),
                        'cu_region' => $this->input->post('cu_region')
                    );

                    $this->Customer_account_model->updateProfileDetail($phone, $uid);

                    //let send password change notifications
                    $d_user = $this->Customer_account_model->grabEmail($user);
                    $site_info = $this->Pref_settings_model->pref_settings_values();
                    if ($this->agent->is_browser())
                    {
                            $agent = $this->agent->browser();
                    }
                    elseif ($this->agent->is_robot())
                    {
                            $agent = $this->agent->robot();
                    }
                    elseif ($this->agent->is_mobile())
                    {
                            $agent = $this->agent->mobile();
                    }
                    else
                    {
                            $agent = 'Unidentified User Agent';
                    }
                    $template = array(
                        'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
                        'site_name' => $site_info->website_name,
                        'main_url' => base_url(),
                        'user_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                        'user_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                        'pass_date' => date('M d Y'),
                        'pass_device' => $agent,
                        'pass_plat' => $this->agent->platform()
                    );

                    $get_cpn_temps = $this->Email_templates_model->getCpn();
                    $template['get_cpn_temps'] = $get_cpn_temps->mail_body;

                    $messages = $this->parser->parse('mailers/change-pass/send', $template, true);

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
                    $this->email->to($d_user->ca_email);
                    $this->email->subject('Hey! Your ' . $site_info->website_name . ' Password Has Just Been Changed');
                    $this->email->message($messages);
                    $this->email->send();

                    echo "<script>$('#show').click();</script>";
                }
            }
            
        } else {
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
                echo "<script>$('#error').click();</script>";
            } else {
                $data = array(
                    'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                    'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname')))
                );

                if($this->Customer_account_model->updateProfile($data, $uid)) {
                    $phone = array(
                        'cu_account_phone' => $this->input->post('cu_account_phone'),
                        'cu_country' => $this->input->post('cu_country'),
                        'cu_region' => $this->input->post('cu_region')
                    );

                    $this->Customer_account_model->updateProfileDetail($phone, $uid);

                    echo "<script>$('#show').click();</script>";
                }
            }
        }
    }

    public function update_account_addresses()
    {
        $uid = $this->session->userdata('cus_id');
        $user = $this->session->userdata('cus_username');
        if( ! $this->input->is_ajax_request()){exit('Something went wrong');}
        //let validate the forms
        $this->form_validation->set_rules('cont_company', 'Contact Company', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('cont_country', 'Contact Country', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('cont_city', 'Cotact City', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('cont_zip_code', 'Contact Zip Code', 'trim|numeric|xss_clean|strip_tags');
        $this->form_validation->set_rules('cont_address_1', 'Contact Address One', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('cont_address_2', 'Contact Address Two', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_company', 'Shipping Company', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_country', 'Shipping Country', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_state', 'Shipping City', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_zip_code', 'Shippping Zip Code', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_address_1', 'Shipping Address One', 'trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('ship_address_2', 'Shipping Address Two', 'trim|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
            echo "<script>$('#error').click();</script>";
        } else {
            $cont = array(
                'cont_company' => $this->input->post('cont_company'),
                'cont_country' => $this->input->post('cont_country'),
                'cont_city' => $this->input->post('cont_city'),
                'cont_zip_code' => $this->input->post('cont_zip_code'),
                'cont_address_1' => $this->input->post('cont_address_1'),
                'cont_address_2' => $this->input->post('cont_address_2')
            );

            $ship = array(
                'ship_company' => $this->input->post('ship_company'),
                'ship_country' => $this->input->post('ship_country'),
                'ship_state' => $this->input->post('ship_state'),
                'ship_zip_code' => $this->input->post('ship_zip_code'),
                'ship_address_1' => $this->input->post('ship_address_1'),
                'ship_address_2' => $this->input->post('ship_address_2')
            );

            if($this->Customer_account_model->updateContactAddress($cont, $uid) AND $this->Customer_account_model->updateShippingAddress($ship, $uid)) {
                echo "<script>$('#show').click();</script>";
            }
        }
        
    }

    public function upload_profile_picture()
    {
        $uid = $this->session->userdata('cus_id');
        $site_info = $this->Pref_settings_model->pref_settings_values();
        if($this->session->userdata('cus_username')) {
            if( ! empty($_FILES['cu_account_profile_pic']['name'])) {
                $cus_username = $this->session->userdata('cus_username');
                //Let process uploading image
                
                $config['upload_path'] = './statics/user_data/profile_pictures/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['file_name'] = 'customer_'.$cus_username.'_'.$site_info->website_name;
                $config['overwrite'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('cu_account_profile_pic')){
                    $up_info = array('up_info' => $this->upload->display_errors());
                    $this->session->set_flashdata($up_info);
                    redirect('my-account');
                }
                else{
                    $file = $this->upload->data();
                    $file_name = $file['file_name'];
                    $phone = array(
                        'cu_account_profile_pic' => $file_name
                    );
                    if($this->Customer_account_model->updateProfileDetail($phone, $uid)) {
                        $this->session->set_flashdata('up_info', 'Profile Picture Uploaded');
                        redirect('my-account');
                    }
                }
            } else {
                redirect(404);
            }
            
        }else {
            redirect(404);
        }
    }

    public function my_account_detail()
    {
        $view['cus_user'] = $this->session->userdata('cus_username');
        $uid = $this->session->userdata('cus_id');
        $mine = $view['cus_user'];
        //shoping carts
        if($this->session->userdata('cus_id')) {
            $uid = $this->session->userdata('cus_id');
            $view['carts'] = $this->Customer_account_model->loadCarts($uid);
        }else {
            $view['carts'] = NULL;
        }
        $view['cus_pages'] = $this->Pages_model->list_pages();
        $view['wishlist_stat'] = $this->Customer_wishlist_model->getStat($uid);
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['load_sliders'] = $this->Product_advert_slider_model->load();
        $view['home_featured_products'] = $this->Product_model->home_featured_list();
        $view['fresh_products'] = $this->Product_model->home_list();
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['count_order'] = $this->Customer_order_model->countOrders($uid);
        $view['can_post_review'] = $this->Customer_account_model->can_post_review($uid);
        $view['once_review'] = $this->Customer_account_model->once_review($uid);
        if($this->uri->segment(2)) {
            $url = $this->uri->segment(2);
            switch ($url) {
                case 'my-addresses':
                $view['my_addresses_view'] = 'main/account/my-addresses';
                $this->load->view('sections/main/account/my-addresses', $view);
                    break;
                case 'my-wishlist':
                $view['wishlists'] = $this->Customer_wishlist_model->profileList($uid);
                $view['my_wishlist_view'] = 'main/account/my-wishlist';
                $this->load->view('sections/main/account/my-wishlist', $view);
                    break;
                case 'my-orders':
                $view['orders'] = $this->Customer_order_model->profileList($uid);
                $view['bundles'] = $this->Customer_order_model->getBundles($uid);
                $view['my_orders_view'] = 'main/account/my-orders';
                $this->load->view('sections/main/account/my-orders', $view);
                    break;

                case 'my-review':
                $view['review'] = $this->Customer_order_model->profileList($uid);
                $view['bundles'] = $this->Customer_order_model->getBundles($uid);
                $view['my_review_view'] = 'main/account/my-review';
                $this->load->view('sections/main/account/my-review', $view);
                    break;
                default:
                redirect(404);
            }
        } else {
            redirect('my-account');
        }
    }

    public function remove_wishlist($id)
    {
        $uid = $this->session->userdata('cus_id');
        if($this->Customer_wishlist_model->remove($id, $uid)) {
            echo "
                <script type='text/javascript'>
                    window.location.href='". base_url()."my-account/my-wishlist';
                </script>
            ";
        }
    }

    public function remove_cat()
    {
        if($this->uri->segment(2)) {
            $uid = $this->session->userdata('cus_id');
            $id = $this->uri->segment(2);
            if($this->Product_model->removeCart($id, $uid)) {
                echo "<script>$('#removeCartDone').click();</script>";
            }
        }
    }

    public function order_tracking($id)
    {
        $uid = $this->session->userdata('cus_id');
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
        if($view['get_order_number'] = $this->Customer_order_model->trackOrder($id, $uid)) {
            $view['count_order'] = $this->Customer_order_model->countOrders($uid);
            $view['wishlist_stat'] = $this->Customer_wishlist_model->getStat($uid);
            $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
            $view['load_sliders'] = $this->Product_advert_slider_model->load();
            $view['home_featured_products'] = $this->Product_model->home_featured_list();
            $view['fresh_products'] = $this->Product_model->home_list();
            $view['home_main_cats'] = $this->Main_category_model->home_cat();
            $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
            $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
            $view['tracker_view'] = 'main/account/tracker';
            $this->load->view('sections/main/account/tracker', $view);
        }else {
            echo "not found";
        }
    }

    public function product_review($id, $page)
    {
        $this->form_validation->set_rules('rate_title', 'Review Subject', 'trim|required|max_length[100]|strip_tags|xss_clean');
        $this->form_validation->set_rules('rate_body', 'Review Comment', 'trim|required|strip_tags|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'error' => validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>')
            );
            $this->session->set_flashdata($errors);
            
            redirect('product/'.$page);
        } else {
            $data = array(
                'pr_product_id' => $id,
                'pr_rating' => $this->input->post('rating_star'),
                'pr_rate_title' => $this->input->post('rate_title'),
                'pr_tate_text' => $this->input->post('rate_body'),
                'pr_account_id' => $this->session->userdata('cus_id')
            );

            if($this->Product_model->newReview($data)) {
                $this->session->set_flashdata('error', '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-check"></i> Your Review has been submited Successfully.</p></div>');
                redirect('product/'.$page);
            }
        }
        
    }

    public function delete_review($id, $page)
    {
        $uid = $this->session->userdata('cus_id');
        if($this->Product_model->remove_review($id, $uid))
        {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-check"></i> Your Review has been Removed Successfully.</p></div>');
            redirect('product/'.$page);
        }
    }

    public function update_review()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something went wrong');
        }

        //let validate the input form
        $this->form_validation->set_rules('testi_content', 'Review Contents', 'trim|required|max_length[150]|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
            echo "<script>$('#error').click();</script>";
        } else {
            $uid = $this->session->userdata('cus_id');
            
             if( ! $this->Customer_account_model->check_if_review($uid))
             {
                $data = array(
                    'testi_status' => 0,
                    'testi_content' => $this->input->post('testi_content'),
                    'testi_rating' => $this->input->post('testi_rating'),
                    'testi_account_id' => $uid
                );

                 if($this->Customer_account_model->new_review($data))
                 {
                    echo "<script>$('#show').click();</script>";
                 }
             }
             else
             {
                $data = array(
                    'testi_status' => 0,
                    'testi_content' => $this->input->post('testi_content'),
                    'testi_rating' => $this->input->post('testi_rating')
                );

                 if($this->Customer_account_model->update_review($data, $uid))
                 {
                    echo "<script>$('#show').click();</script>";
                 }
             }
        }
        
    }
}