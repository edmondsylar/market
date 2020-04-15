<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_sections_model extends CI_Model {

    public function fresh_categories()
    {
        $this->db->where('id', 1);
        $this->db->where('access_id', 1);
        $query = $this->db->get('fresh_categories');
        return $query->row(0);
    }

    public function fresh_cat_edit()
    {
        $this->db->where('id', 1);
       $query = $this->db->get('fresh_categories');
       return $query->row(0); 
    }

    public function update_fresh_cat_setup($data)
    {
        $this->db->where('id', 1);
        $this->db->update('fresh_categories', $data);
        return TRUE;
    }
}