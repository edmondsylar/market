<?php
defined('BASEPATH') OR exit('This page is not found or has been move');
class Global_pref {

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Pref_settings_model');
        $this->CI->load->database();
    }

    public function siteMaintenance()
    {
        $is_maintain = $this->CI->Pref_settings_model->isMaintain();
        if($is_maintain)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}