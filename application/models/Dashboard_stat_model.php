<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_stat_model extends CI_Model {

    public function count_product()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function count_product_cat()
    {
        $query = $this->db->get('main_categories');
        return $query->num_rows();
    }

    public function count_product_sub_cat()
    {
        $query = $this->db->get('sub_categories');
        return $query->num_rows();
    }

    public function count_product_brands()
    {
        $query = $this->db->get('product_brands');
        return $query->num_rows();
    }

    public function count_customers()
    {
        $query = $this->db->get('customer_accounts');
        return $query->num_rows();
    }

    public function count_orders()
    {
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function count_earnings()
    {
        $this->db->select_sum('order_total_amount');
        $this->db->from('orders');
        $this->db->where('order_status >', 0);
        $this->db->where('order_status <', 5);
        $query = $this->db->get();
        return $query->row()->order_total_amount;
    }

    public function no_delivary()
    {
        $this->db->where('order_status >', 0);
        $this->db->where('order_status !=', 4);
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

}