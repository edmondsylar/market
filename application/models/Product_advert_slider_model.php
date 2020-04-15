<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_advert_slider_model extends CI_Model {

    public function new($data)
    {
        $this->db->insert('product_advert_slider', $data);
        return TRUE;
    }

    public function load()
    {
        $this->db->order_by('psa_id', 'DESC');
        $query = $this->db->get('product_advert_slider');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function remove($id)
    {
        $this->db->where('psa_id', $id);
        $this->db->delete('product_advert_slider');
        return TRUE;
    }
    
}