<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_preview_model extends CI_Model {

    public function new($preview_data)
    {
        $this->db->insert('product_previews', $preview_data);
        return TRUE;
    }

    public function dispalyForAdmin($pro_id)
    {
        $this->db->where('product_id', $pro_id);
        $query = $this->db->get('product_previews');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function get_shot($pid)
    {
        $this->db->where('product_id', $pid);
        $query = $this->db->get('product_previews');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function remove($id)
    {
        $this->db->where('pp_id', $id);
        $this->db->delete('product_previews');
        return TRUE;
    }

    public function showForUsers($product_id)
    {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('product_previews');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }
}