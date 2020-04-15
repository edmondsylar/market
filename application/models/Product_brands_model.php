<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_brands_model extends CI_Model {

    public function get_stat()
    {
        $query = $this->db->get('product_brands');
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function list($page)
    {
        $this->db->order_by('brand_name', 'ASC');
        $this->db->limit(20, $page);
        $query = $this->db->get('product_brands');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function create($data)
    {
        $this->db->insert('product_brands', $data);
        return TRUE;
    }

    public function update($data, $id)
    {
        $this->db->where('brand_id', $id);
        $this->db->update('product_brands', $data);
        return TRUE;
    }

    public function delete($id)
    {
        $this->db->where('brand_id', $id);
        $this->db->delete('product_brands');
        return TRUE;
    }

    public function count_product_brands()
    {
        $query = $this->db->get('product_brands');
        return $query->num_rows();
    }

    public function select_brands()
    {
        $this->db->where('brand_status', 1);
        $this->db->order_by('brand_name', 'ASC');
        $query = $this->db->get('product_brands');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function list_all_brands()
    {
        $this->db->where('brand_status', 1);
        $this->db->order_by('brand_name', 'asc');
        $query = $this->db->get('product_brands');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }
}