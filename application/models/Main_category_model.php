<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_category_model extends CI_Model {

    public function new_category($data) 
    {
        $query = $this->db->insert('main_categories', $data);
        if($query) {
            return TRUE;
        }
    }

    public function list($page)
    {
        $this->db->order_by('main_cat_name', 'ASC');
        $this->db->limit(10, $page);
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function stat()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function update_category($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('main_categories', $data);
        return TRUE;
    }

    public function count_main_cat()
    {
        $query = $this->db->get('main_categories');
        return $query->num_rows();
    }

    public function findCatSlug($cat)
    {
        $this->db->where('main_cat_slug', $cat);
        $query = $this->db->get('main_categories');
        return $query->row(0)->id;
    }

    public function findName($cat)
    {
        $this->db->where('main_cat_slug', $cat);
        $query = $this->db->get('main_categories');
        return $query->row(0);
    }

    public function select()
    {
        $this->db->order_by('main_cat_name', 'ASC');
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function selected($cat)
    {
        $this->db->where('main_cat_slug', $cat);
        $query = $this->db->get('main_categories');
        return $query->row(0)->id;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('main_categories');
        return TRUE;
    }

    public function home_cat()
    {
        $this->db->where('status', 1);
        $this->db->order_by('main_cat_name', 'ASC');
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
        
    }

    public function fresh_cats($tot_fresh_cat)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($tot_fresh_cat);
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function select_cats()
    {
        $this->db->where('status', 1);
        $this->db->order_by('main_cat_name', 'asc');
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function get_main($pro_sub_id)
    {
        $this->db->where('id', $pro_sub_id);
        $query = $this->db->get('main_categories');
        return $query->row(0);
    }

    public function get_all_cats($page)
    {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(12, $page);
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function count_home_cats()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('main_categories');
        return $query->num_rows();
    }

    public function home_side_cats()
    {
        $this->db->where('status', 1);
        $this->db->order_by('main_cat_name', 'asc');
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function findMainCat($cat_slug)
    {
        $this->db->where('main_cat_slug', $cat_slug);
        $query = $this->db->get('main_categories');
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }
}