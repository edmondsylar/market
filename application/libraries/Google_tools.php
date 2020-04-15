<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_tools{

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Pref_settings_model');
        $this->CI->load->database();
    }

    public function googleTools()
    {
        $tools = $this->CI->Pref_settings_model->getGoogleTags();
        return $tools;
    }

}