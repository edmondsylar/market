<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages_model extends CI_Model {

    public function about_us()
    {
        $this->db->where('about_us_id', 1);
        $query = $this->db->get('about_us_page');
        return $query->row(2)->about_us_content;
    }

    public function update_about_us($data)
    {
        $this->db->where('about_us_id', 1);
        $this->db->update('about_us_page', $data);
        return TRUE;
    }

    public function create_page($data)
    {
        $this->db->insert('pages', $data);
        return TRUE;
    }

    public function list_pages()
    {
        $this->db->order_by('page_title', 'ASC');
        $query = $this->db->get('pages');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function find_page($url)
    {
        $this->db->where('page_slug', $url);
        $query = $this->db->get('pages');
        if($query->num_rows() > 0)
        {
            return $query->row(0);
        }
        else
        {
            return FALSE;
        }
    }

    public function update_my_page($data, $id)
    {
        $this->db->where('page_id', $id);
        $this->db->update('pages', $data);
        return TRUE;
    }

    public function remove($id)
    {
        $this->db->where('page_id', $id);
        $this->db->delete('pages');
        return TRUE;
    }
}