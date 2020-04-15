<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
    }

    public function admin()
    {
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $this->session->sess_destroy();
        $this->load->view('auth/admin', $view);
    }

    public function admin_log()
    {
        if(! $this->input->is_ajax_request()) { exit ('Something went wrong');}
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|strip_tags|valid_email', array('required' => 'Please Provide Your Email'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|strip_tags', array('required' => 'Provide Your Password'));
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors('<div class="alert alert-danger" align="center">','</div>');
            echo "
                <script>
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';    
                toastr['warning']('Something went wrong Please Try Again.');
                </script>
            ";
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $isAuth = $this->Auth_model->admin($email, $password);

            if($isAuth) {
                $userdata = array(
                    'uid' => $isAuth->id,
                    'isAdmin' => TRUE
                );

                $this->session->set_userdata($userdata);
                echo "
                <script>
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';    
                toastr['success']('Welcome Back! Hope your have a Nice Day?.');
                </script>
            ";

                echo "
                    <script type='text/javascript'>
                        window.location.href='". base_url() ."admin';
                    </script>
                ";
            } else {
                echo "
                <script>
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';    
                toastr['error']('Authentication Failed. Check your login.');
                </script>
            ";
            }
        }
        
        
    }

    public function admin_logout()
    {
        $this->session->sess_destroy();
        redirect('auth/admin');
    }
}