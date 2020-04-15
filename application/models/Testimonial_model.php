<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial_model extends CI_Model {

    public function get_pending()
    {
        $this->db->select('*');
        $this->db->from('testimonials');
        $this->db->where('testi_status', 0);
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = testimonials.testi_account_id');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function admin_delete($id)
    {
        $this->db->where('testi_id', $id);
        $this->db->delete('testimonials');
        return TRUE;
    }

    public function approve_test($data, $id)
    {
        $this->db->where('testi_id', $id);
        $this->db->update('testimonials', $data);
        return TRUE;
    }

    public function get_approves()
    {
        $this->db->select('*');
        $this->db->from('testimonials');
        $this->db->where('testi_status', 1);
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = testimonials.testi_account_id');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function list_all()
    {
        $this->db->select('*');
        $this->db->from('testimonials');
        $this->db->where('testi_status', 1);
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = testimonials.testi_account_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = testimonials.testi_account_id');
        $this->db->order_by('test_id', 'RANDOM');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
}