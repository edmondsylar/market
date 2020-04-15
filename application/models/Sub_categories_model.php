<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sub_categories_model extends CI_Model {

    public function stats($id)
    {
        $this->db->where('main_cat_id', $id);
        $this->db->order_by('sub_cat_name', 'ASC');
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function stat()
    {
        $this->db->order_by('sub_cat_name', 'ASC');
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function count_stat($id)
    {
        $this->db->where('main_cat_id', $id);
        $query = $this->db->get('sub_categories');
        return $query->num_rows();
    }

    public function new_category($data)
    {
        $this->db->insert('sub_categories', $data);
        return TRUE;
    }

    public function list($page)
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->join('main_categories', 'id = main_cat_id');
        $this->db->order_by('sub_cat_name', 'ASC');
        $this->db->limit(10, $page);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function main_list($id, $page)
    {
        $this->db->select('*');
        $this->db->where('main_cat_id', $id);
        $this->db->from('sub_categories');
        $this->db->join('main_categories', 'id = main_cat_id');
        $this->db->order_by('sub_cat_name', 'ASC');
        $this->db->limit(10, $page);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function update_category($data, $id)
    {
        $this->db->where('sid', $id);
        $query = $this->db->update('sub_categories', $data);
        if($query) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function count_sub_cat($id)
    {
        $this->db->where('main_cat_id', $id);
        $query = $this->db->get('sub_categories');
        return $query->num_rows();
    }

    public function count_sub_cat_single()
    {
        $query = $this->db->get('sub_categories');
        return $query->num_rows();
    }

    public function delete($id)
    {
        $this->db->where('sid', $id);
        $this->db->delete('sub_categories');
        return TRUE;
    }

    public function home_cat()
    {
        $this->db->where('sub_cat_status', 1);
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function select_sub_cats()
    {
        $this->db->where('sub_cat_status', 1);
        $this->db->order_by('sub_cat_name', 'asc');
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function home_side_sub_cats()
    {
        $this->db->where('sub_cat_status', 1);
        $this->db->order_by('sub_cat_name', 'asc');
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_cat_product($main_cat_id, $page)
    {
        $this->db->select('*');
        $this->db->where('main_cat_id', $main_cat_id);
        $this->db->join('products', 'sub_categories.sid = products.sub_cat_id');
        $this->db->order_by('products.product_id', 'desc');
        $this->db->limit(18, $page);
        $query = $this->db->get('sub_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function count_view_cats($main_cat_id)
    {
        $this->db->select('*');
        $this->db->where('main_cat_id', $main_cat_id);
        $this->db->join('products', 'sub_categories.sid = products.sub_cat_id');
        $query = $this->db->get('sub_categories');
        return $query->num_rows();
    }
}