<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_order_model extends CI_Model {

    public function profileList($uid)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_account_id', $uid);
        $this->db->join('order_shipping', 'order_shipping.order_info_id = orders.order_id');
        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function getBundles($uid)
    {
        $this->db->select('*');
        $this->db->from('customer_order_bundle');
        $this->db->where('cob_account_id', $uid);
        $this->db->join('products', 'products.product_id = customer_order_bundle.cob_product_id');
        
        $query = $this->db->get('');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function checkOrderNum($order)
    {
        $this->db->where('order_number', $order);
        $this->db->where('order_status', 0);
        $query = $this->db->get('orders');
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function countOrders($uid)
    {
        $this->db->where('order_account_id', $uid);
        $query = $this->db->get('orders');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return FALSE;
        }
    }

    public function getOrderInfo($order_number, $uid)
    {
        $this->db->where('order_account_id', $uid);
        $this->db->where('order_number', $order_number);
        $query = $this->db->get('orders');
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }

    public function createIncomePayment($pay)
    {
        $this->db->insert('income_payments', $pay);
        return TRUE;
    }

    public function confirmPayment($rid)
    {
        $this->db->where('order_number', $rid);
        $this->db->where('order_status', 1);
        $query = $this->db->get('orders');
        if($query->num_rows() == 1) {
            return TRUE;
        }else {
            return FALSE;
        }
        
    }

    public function setPaying($order_pay_id, $uid)
    {
        $data = array(
            'order_status' => 1
        );
        $this->db->where('order_number', $order_pay_id);
        $this->db->where('order_status', 0);
        $this->db->where('order_account_id', $uid);
        if($this->db->update('orders', $data)) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function createCode($secure, $item_number, $uid)
    {
        $data = array(
            'pay_check' => $secure
        );
        $this->db->where('order_account_id', $uid);
        $this->db->where('order_number', $item_number);
        if($this->db->update('orders', $data)) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function verifyPayThrough($secure)
    {
        $this->db->where('pay_check', $secure);
        $query = $this->db->get('orders');
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function updateSecureD($secure, $rder)
    {
        $data = array(
            'pay_check' => NULL
        );
        $this->db->where('pay_check', $secure);
        $this->db->where('order_number', $rder);
        $this->db->update('orders', $data);
        return TRUE;
    }

    public function trackOrder($id, $uid)
    {
        $this->db->where('order_number', $id);
        $this->db->where('order_account_id', $uid);
        $this->db->where('order_status >', 0);
        $rows = $this->db->get('orders');
        if($rows->num_rows() > 0) {
            return $rows->row(0);
        }else {
            return FALSE;
        }
    }

    public function loadAdminOrders($page)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_shipping', 'order_shipping.order_info_id = orders.order_id');
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = orders.order_account_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = orders.order_account_id');
        $this->db->order_by('order_id', 'desc');
        $this->db->limit(20, $page);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function getAdminBundles()
    {
        $this->db->select('*');
        $this->db->from('customer_order_bundle');
        $this->db->join('products', 'products.product_id = customer_order_bundle.cob_product_id');
        
        $query = $this->db->get('');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function adminUpdateStatus($id, $data)
    {
        $this->db->where('order_id', $id);
        $this->db->update('orders', $data);
        return TRUE;
    }

    public function adminRemoveOrder($id)
    {
        $this->db->where('order_id', $id);
        $this->db->delete('orders');
        return TRUE;
    }

    public function count()
    {
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function searchAdminOrders($order_no)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_number', $order_no);
        $this->db->join('order_shipping', 'order_shipping.order_info_id = orders.order_id');
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = orders.order_account_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = orders.order_account_id');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function loadAdminPayments($page)
    {
        $this->db->order_by('inp_id', 'desc');
        $this->db->limit(20, $page);
        $query = $this->db->get('income_payments');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function countPayments()
    {
        $count = $this->db->get('income_payments');
        return $count->num_rows();
    }

    public function searchAdminPayments($order_no)
    {
        $this->db->where('inp_order_number', $order_no);
        $this->db->order_by('inp_id', 'desc');
        $query = $this->db->get('income_payments');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function searchOrderPaid($order_no)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_number', $order_no);
        $this->db->join('order_shipping', 'order_shipping.order_info_id = orders.order_id');
        $this->db->join('customer_accounts', 'customer_accounts.ca_id = orders.order_account_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = orders.order_account_id');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }

    public function PaidBundles()
    {
        $this->db->select('*');
        $this->db->from('customer_order_bundle');
        $this->db->join('products', 'products.product_id = customer_order_bundle.cob_product_id');
        
        $query = $this->db->get('');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function canReview($pr_get_id, $uid)
    {
        $this->db->select('*');
        $this->db->from('customer_order_bundle');
        $this->db->where('cob_product_id', $pr_get_id);
        $this->db->where('cob_account_id', $uid);
        $this->db->join('orders', 'orders.order_number = customer_order_bundle.cob_order_number');
        $this->db->where('order_status', 4);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function isReview($uid, $pr_get_id)
    {
        $this->db->where('pr_account_id', $uid);
        $this->db->where('pr_product_id', $pr_get_id);
        $query = $this->db->get('product_rating');
        if($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}