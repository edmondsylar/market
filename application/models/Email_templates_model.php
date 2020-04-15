<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_templates_model extends CI_Model {

    public function setWelcomeEmail($data)
    {
        $this->db->where('em_temp_id', 1);
        $this->db->update('email_templates', $data);
        return TRUE;
    }

    public function setActivationEmail($data)
    {
        $this->db->where('em_temp_id', 2);
        $this->db->update('email_templates', $data);
        return TRUE;
    }

    public function setCpnEmail($data)
    {
        $this->db->where('em_temp_id', 3);
        $this->db->update('email_templates', $data);
        return TRUE;
    }

    public function getWelcome()
    {
        $this->db->where('em_temp_id', 1);
        $query = $this->db->get('email_templates');
        return $query->row(0);
    }

    public function getActivation()
    {
        $this->db->where('em_temp_id', 2);
        $query = $this->db->get('email_templates');
        return $query->row(0);
    }

    public function getCpn()
    {
        $this->db->where('em_temp_id', 3);
        $query = $this->db->get('email_templates');
        return $query->row(0);
    }

    public function getActivate()
    {
        $this->db->where('em_temp_id', 2);
        $query = $this->db->get('email_templates');
        return $query->row(0);
    }
    
}