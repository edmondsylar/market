<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_gateways_model extends CI_Model {

    public function paypal()
    {
        $this->db->where('pg_id', 1);
        $paypal = $this->db->get('paypal_gateway');
        return $paypal->row(0);
    }

    public function update_paypal($data)
    {
        $this->db->where('pg_id', 1);
        $this->db->update('paypal_gateway', $data);
        return TRUE;
    }

    public function stripe()
    {
        $this->db->where('sg_id', 1);
        $stripe = $this->db->get('stipe_gateway');
        return $stripe->row(0);
    }

    public function paystack()
    {
        $this->db->where('ps_id', 1);
        $stripe = $this->db->get('paystack_gateway');
        return $stripe->row(0);
    }

    public function update_stripe($data)
    {
        $this->db->where('sg_id', 1);
        $this->db->update('stipe_gateway', $data);
        return TRUE;
    }

    public function update_paystack($data)
    {
        $this->db->where('ps_id', 1);
        $this->db->update('paystack_gateway', $data);
        return TRUE;
    }
}