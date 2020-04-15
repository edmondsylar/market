<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smtp_settings_model extends CI_Model {

    public function update($data)
    {
        $this->db->where('smtp_id', 1);
        if($this->db->update('smtp_settings', $data)) {
            return TRUE;
        } else {
            return FLASE;
        }
    }

    public function get()
    {
        $this->db->where('smtp_id', 1);
        $query = $this->db->get('smtp_settings');
        return $query->row(0);
    }

}