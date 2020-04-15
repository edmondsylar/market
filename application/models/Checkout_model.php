<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout_model extends CI_Model {

    public function createOrdersTable($order)
    {
        $this->db->insert('orders', $order);
        return TRUE;
    }

    public function getLastOrderId($order_number)
    {
        $this->db->where('order_number', $order_number);
        $query = $this->db->get('orders');
        return $query->row(0)->order_id;
    }

    public function createOrderShipping($ship)
    {
        $this->db->insert('order_shipping', $ship);
        return TRUE;
    }

    public function createCob($do_cart)
    {
        $this->db->insert('customer_order_bundle', $do_cart);
        return TRUE;
    }
}