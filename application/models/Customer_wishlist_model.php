<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_wishlist_model extends CI_Model {

    public function profileList($uid)
    {
        $this->db->select('*');
        $this->db->from('customer_wishlist');
        $this->db->where('cw_account_id', $uid);
        $this->db->join('products', 'products.product_id = customer_wishlist.cw_product_id');
        $this->db->order_by('cw_id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function remove($id, $uid)
    {
        $this->db->where('cw_id', $id);
        $this->db->where('cw_account_id', $uid);
        $this->db->delete('customer_wishlist');
        return TRUE;
    }

    public function getStat($uid)
    {
        $this->db->where('cw_account_id', $uid);
        $query = $this->db->get('customer_wishlist');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }

}