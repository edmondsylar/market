<?php
defined('BASEPATH') OR exit('This requested file is not found');
class Maintenance extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        if(! $this->global_pref->siteMaintenance())
        {
            redirect('error_404');
        }
    }

    public function under()
    {
        $view['website_info'] = $this->Pref_settings_model->pref_settings_values();
        $this->load->view('main/maintain', $view);
    }
} 