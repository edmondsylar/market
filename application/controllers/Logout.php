<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->global_pref->siteMaintenance())
        {
            redirect('maintenance-mode');
            exit();
        }
        if( ! $this->session->userdata('cusLogged')) {
            redirect('404');
        }

        if($this->session->userdata('cartReady')) {
            $this->session->unset_userdata('cart_descrip');
            $this->session->unset_userdata('cart_subtotal');
            $this->session->unset_userdata('cart_customer_id');
            $this->session->unset_userdata('cartReady');
        }

        if($this->session->userdata('readyToPay')) {
            
            $this->session->unset_userdata('readyToPay');
            $this->session->unset_userdata('orderNumber');
            
        }
    }

    public function signout()
    {
        $this->session->unset_userdata('cusLogged');
        $this->session->unset_userdata('cus_id');
        $this->session->unset_userdata('cus_status');
        $this->session->unset_userdata('cus_username');
            echo "
                <script type='text/javascript'>
                    window.location.href='". base_url()."';
                </script>
            ";
    }
}