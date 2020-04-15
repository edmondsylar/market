<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
        if($this->session->userdata('cusLogged')) {
            redirect('/');
        }
    }

    public function auth()
    {
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
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['authentication_view'] = 'main/customer/auth';
        $this->load->view('sections/main/customer/auth', $view);
    }

    public function account_verify()
    {
        if( ! $this->uri->segment(2)) {
            if( ! $this->input->is_ajax_request()){exit('Something Went Wrong!');}
            $this->form_validation->set_rules('activate', 'Activation Code', 'trim|required|xss_clean|strip_tags');
            //$this->form_validation->set_rules('user', 'User', 'trim|xss_clean|strip_tags');
            
            if ($this->form_validation->run() == TRUE) {
                $user = $this->input->post('user');
                $code = $this->input->post('activate');

                if($this->Customer_account_model->checkVerify($user, $code)) {
                    //Let activate user account here
                    $this->Customer_account_model->updateVerification($user);
                    //let remove the action allocated to the user
                    $this->Customer_account_model->removeCode($user);

                    echo '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> Verification Successfull</p></div>';

                    //grab user email
                    $d_user = $this->Customer_account_model->grabEmail($user);

                    //let send verification code via email
                    
                    $site_info = $this->Pref_settings_model->pref_settings_values();
                    $template = array(
                        'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
                        'site_name' => $site_info->website_name,
                        'main_url' => base_url(),
                        'user_firstname' => $d_user->ca_firstname,
                        'user_lastname' => $d_user->ca_lastname
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
                    $this->email->to($d_user->ca_email);
                    $this->email->subject('Welcome To ' . $site_info->website_name . '');
                    $this->email->message($messages);
                    $this->email->send();

                    echo "
                        <script type='text/javascript'>
                            window.location.href='". base_url() ."authentication" ."';
                        </script>
                        ";
                }else {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> Account Verification Failed</p></div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> Account Verification Failed</p></div>';
            }
            
        }
    }

    public function register()
    {
        if( ! $this->input->is_ajax_request()){exit('Something went wrong');}

        //let validate the form
        $this->form_validation->set_rules('ca_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Firstname', 'min_length' => 'Sorry your Firstname must be more than 3 Characters', 'max_length' => 'Sorry your Firstname must not exceed 50 Characters', 'alpha' => 'Your Firstname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[50]|xss_clean|strip_tags|alpha', array('required' => 'Please Provide Your Lastname', 'min_length' => 'Sorry your Lastname must be more than 3 Characters', 'max_length' => 'Sorry your Lastname must not exceed 50 Characters', 'alpha' => 'Your Lastname can not contain Special Characters and Numbers'));
        $this->form_validation->set_rules('ca_email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email|is_unique[customer_accounts.ca_email]', array('required' => 'Please provide your Email Address', 'is_unique' => 'Sorry but this email is already registerd with us'));
        $this->form_validation->set_rules('ca_username', 'Username', 'trim|required|min_length[5]|xss_clean|strip_tags|is_unique[customer_accounts.ca_username]', array('required' => 'Please choose a username', 'min_length' => 'Sorry your username must be more than 3 characters', 'is_unique' => 'Sorry but this Username is already taken try another'));
        $this->form_validation->set_rules('ca_password', 'Password', 'trim|required|min_length[8]|xss_clean|strip_tags', array('requred' => 'Please provide a strong Password', 'min_length' => 'Your password must be at least 8 characters'));
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|strip_tags|matches[ca_password]', array('required' => 'Please confirm your password', 'matches' => 'Sorry but your passwords does not match!'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
        } else {
            $old_password = $this->input->post('ca_password');
            $password = password_hash($old_password, PASSWORD_DEFAULT);
            $data = array(
                'ca_username' => strtolower($this->input->post('ca_username')),
                'ca_firstname' => ucfirst(strtolower($this->input->post('ca_firstname'))),
                'ca_lastname' => ucfirst(strtolower($this->input->post('ca_lastname'))),
                'ca_email' => $this->input->post('ca_email'),
                'ca_password' => $password,
                'ca_create_day' => date('j'),
                'ca_create_month' => date('M'),
                'ca_create_year' => date('Y')
            );

            if($this->Customer_account_model->register($data)) {
                $username = $this->input->post('ca_username');
                $grab_uid = $this->Customer_account_model->grabUid($username);
                $verify_user = $this->Customer_account_model->getLastReg($username);
                $customer_detail = $this->Customer_account_model->createCustomerDetails($grab_uid);
                $customer_balance = $this->Customer_account_model->createCustomerBalance($grab_uid);
                $customer_contact_detail = $this->Customer_account_model->createCustomerContactDetail($grab_uid);
                $customer_shipping_address = $this->Customer_account_model->createCustomerShippingAddress($grab_uid);

                //let send verification codes
                $n = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                $randomString = '';
                for ($i = 0; $i < $n; $i++) { 
                    $index = rand(0, strlen($characters) - 1); 
                    $randomString .= $characters[$index]; 
                }

                $verify_key = password_hash($randomString, PASSWORD_DEFAULT);

                $verify = array(
                    'customer_id' => $verify_user->ca_id,
                    'customer_username' => $verify_user->ca_username,
                    'verify_key' => $verify_key
                );

                //let update the verification table

                if($this->Customer_account_model->setVerification($verify)) {
                    echo '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> Registration Successfull Please Check Your Email</p></div>';

                    //let send verification code via email
                    
                    $site_info = $this->Pref_settings_model->pref_settings_values();
                    $template = array(
                        'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
                        'site_name' => $site_info->website_name,
                        'main_url' => base_url(),
                        'user_firstname' => $this->input->post('ca_firstname'),
                        'user_lastname' => $this->input->post('ca_lastname'),
                        'direct_verify' => base_url() . 'activate-account/' . $this->input->post('ca_username'),
                        'verify_code' => $randomString
                    );

                    $get_activation_temps = $this->Email_templates_model->getActivation();
                    $template['get_activation_temps'] = $get_activation_temps->mail_body;

                    $messages = $this->parser->parse('mailers/email_verify/send', $template, true);

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
                    $this->email->subject('Activate Your ' . $site_info->website_name . ' Account');
                    $this->email->message($messages);
                    if($this->email->send()) {

                        //let redirect the user
                        echo "
                        <script type='text/javascript'>
                            window.location.href='". base_url() ."activate-account/".$this->input->post('ca_username')."';
                        </script>
                    ";
                    }
                }
            }
        }
        
    }

    public function account_verification()
    {
        if($this->uri->segment(2)) {
            $username = $this->uri->segment(2);
            if($view['user_to_verify'] = $this->Customer_account_model->confirmUser($username)) {
                $view['cus_pages'] = $this->Pages_model->list_pages();
                $view['home_main_cats'] = $this->Main_category_model->home_cat();
                $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
                $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
                $view['account_verify_view'] = 'main/customer/account-verify';
                $this->load->view('sections/main/customer/account-verify', $view);
            } else {
                $this->load->view('errors/custorm/404');
            }
        } else {
            $this->load->view('errors/custorm/404');
        }
    }

    public function login()
    {
        if( ! $this->input->is_ajax_request()){exit('Something went wrong');}
        
        //let validate out input fields
        $this->form_validation->set_rules('log-email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email');
        $this->form_validation->set_rules('log-password', 'password', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
        } else {
            
            //Let process customer authentication here.
            $email = $this->input->post('log-email');
            $password = $this->input->post('log-password');

            if($customer_login = $this->Customer_account_model->login($email, $password)) {

                if($customer_login->is_verify == 0) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p> Email account is not yet Verified</p></div>';
                }else {
                    $customer_access = array(
                        'cus_id' => $customer_login->ca_id,
                        'cus_status' => $customer_login->ca_status,
                        'cus_username' => $customer_login->ca_username,
                        'cusLogged' => TRUE
                    );

                    $this->session->set_userdata($customer_access);
                    echo '<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-check"></i> Welcome Back <b>'.$customer_login->ca_username . '</b></p></div>';

                    //let redirect the user
                    echo "
                        <script type='text/javascript'>
                            window.location.href='". base_url()."';
                        </script>
                    ";
                }
                
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p> Email or Password Is Incorrect</p></div>';
            }
        }
        
    }

    public function lost_password()
    {
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
        $view['home_main_cats'] = $this->Main_category_model->home_cat();
        $view['profile_info'] = $this->Customer_account_model->profileInfo($mine);
        $view['home_sub_cats'] = $this->Sub_categories_model->home_cat();
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $view['lost_password_view'] = 'main/customer/lost-password';
        $this->load->view('sections/main/customer/lost-password', $view);
    }

    public function reset_password()
    {
        if( ! $this->input->is_ajax_request())
        {
            exit('Something Went Wrong!');
        }

        $this->form_validation->set_rules('pass_user', 'Username', 'trim|required|xss_clean|strip_tags');
        $this->form_validation->set_rules('pass_email', 'Email Address', 'trim|required|xss_clean|strip_tags');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> ', '</p></div>');
        } else {
            $username = $this->input->post('pass_user');
            $email = $this->input->post('pass_email');
            $check_befor_reset = $this->Customer_account_model->let_reset_password($username, $email);
            if($check_befor_reset)
            {
                $n = 15;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                $randomString = '';
                for ($i = 0; $i < $n; $i++) { 
                    $index = rand(0, strlen($characters) - 1); 
                    $randomString .= $characters[$index]; 
                }

                $new_password = password_hash($randomString, PASSWORD_DEFAULT);
                $uid = $check_befor_reset->ca_id;
                $data = array(
                    'ca_password' => $new_password
                );

                if($this->Customer_account_model->reset_password($uid, $data))
                {
                    //let send email

                     //let send verification code via email
                    
                     $site_info = $this->Pref_settings_model->pref_settings_values();
                     $template = array(
                         'site_logo' => base_url() .'statics/uploads/pref_settings/' . $site_info->website_logo,
                         'site_name' => $site_info->website_name,
                         'main_url' => base_url(),
                         'user_firstname' => $check_befor_reset->ca_firstname,
                         'user_lastname' => $check_befor_reset->ca_lastname,
                         'password' => $randomString
                     );

                     $messages = $this->load->view('mailers/reset_pass/send', $template, true);

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
                    $this->email->to($check_befor_reset->ca_email);
                    $this->email->subject('Your ' . $site_info->website_name . ' Account Password');
                    $this->email->message($messages);
                    if($this->email->send()) {

                        //let redirect the user
                        echo '
                        <div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> New password sent to you email address</p></div>
                    ';
                    }
                }
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><p><i class="fa fa-bell"></i> We can not Identify you.</p></div>';
            }
        }
        
    }

}