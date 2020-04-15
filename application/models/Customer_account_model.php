<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_account_model extends CI_Model {

    public function register($data)
    {
        $this->db->insert('customer_accounts', $data);
        return TRUE;
    }

    public function getLastReg($username)
    {
        $this->db->where('ca_username', $username);
        $query = $this->db->get('customer_accounts');
        return $query->row(0);
    }

    public function setVerification($verify)
    {
        $this->db->insert('customer_email_verify', $verify);
        return TRUE;
    }

    public function confirmUser($username)
    {
        $this->db->where('ca_username', $username);
        $this->db->where('is_verify', 0);
        $query= $this->db->get('customer_accounts');
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }

    public function checkVerify($user, $code)
    {
        $this->db->where('customer_username', $user);
        $catch_verify = $this->db->get('customer_email_verify');
        if($catch_verify->num_rows() > 0) {
            $confirm_code = $catch_verify->row(3)->verify_key;
            $dust_code = password_verify($code, $confirm_code);
            if($dust_code) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function updateVerification($user)
    {
        $done = array(
            'is_verify' => 1,
            'ca_status' => 1
        );
        $this->db->where('ca_username', $user);
        $this->db->update('customer_accounts', $done);
        return TRUE;
    }

    public function removeCode($user)
    {
        $this->db->where('customer_username', $user);
        $this->db->delete('customer_email_verify');
        return TRUE;
    }

    public function grabEmail($user)
    {
        $this->db->where('ca_username', $user);
        $query = $this->db->get('customer_accounts');
        if($query->num_rows() > 0) {
            return $query->row(0);
        }else {
            return FALSE;
        }
    }

    public function stat()
    {
        $query = $this->db->get('customer_accounts');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }

    public function loadCustomers($page)
    {
        $this->db->order_by('ca_id', 'DESC');
        $this->db->limit(20, $page);
        $query = $this->db->get('customer_accounts');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function updateCustomer($data, $id)
    {
        $this->db->where('ca_id', $id);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function block($id)
    {
        $data = array(
            'ca_status' => 2
        );
        $this->db->where('ca_id', $id);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function unblock($id)
    {
        $data = array(
            'ca_status' => 1
        );
        $this->db->where('ca_id', $id);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function deactivate($id)
    {
        $data = array(
            'is_verify' => 0
        );
        $this->db->where('ca_id', $id);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function activate($id)
    {
        $data = array(
            'is_verify' => 1
        );
        $this->db->where('ca_id', $id);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function remove($id)
    {
        $this->db->where('ca_id', $id);
        $this->db->delete('customer_accounts');
        return TRUE;
    }

    public function count_customers()
    {
        $query = $this->db->get('customer_accounts');
        return $query->num_rows();
    }

    public function login($email, $password)
    {
        $this->db->where('ca_email', $email);
        $get = $this->db->get('customer_accounts');
        if($get->num_rows() > 0) {
            $db_pass = $get->row(5)->ca_password;
            $log_pass = password_verify($password, $db_pass);
            if($log_pass) {
                return $get->row(0);
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }

    public function grabUid($username)
    {
        $this->db->where('ca_username', $username);
        $query = $this->db->get('customer_accounts');
        if($query->num_rows() > 0) {
            return $query->row(0)->ca_id;
        }
    }

    public function createCustomerDetails($grab_uid)
    {
        $data = array(
            'cu_account_id' => $grab_uid
        );
        $this->db->insert('customer_details', $data);
        return TRUE;
    }

    public function createCustomerBalance($grab_uid)
    {
        $data = array(
            'cus_account_id' => $grab_uid
        );
        $this->db->insert('customer_balance', $data);
        return TRUE;
    }

    public function createCustomerContactDetail($grab_uid)
    {
        $data = array(
            'cont_account_id' => $grab_uid
        );
        $this->db->insert('customer_contact_address', $data);
        return TRUE;
    }

    public function createCustomerShippingAddress($grab_uid)
    {
        $data = array(
            'ship_account_id' => $grab_uid
        );
        $this->db->insert('customer_shipping_address', $data);
        return TRUE;
    }

    public function profileInfo($mine)
    {
        $this->db->select('*');
        $this->db->from('customer_accounts');
        $this->db->where('ca_username', $mine);
        $this->db->join('customer_details', 'customer_details.cu_account_id = customer_accounts.ca_id');
        $this->db->join('customer_balance', 'customer_balance.cus_account_id = customer_accounts.ca_id');
        $this->db->join('customer_contact_address', 'customer_contact_address.cont_account_id = customer_accounts.ca_id');
        $this->db->join('customer_shipping_address', 'customer_shipping_address.ship_account_id = customer_accounts.ca_id');
        $query = $this->db->get();
        return $query->row(0);
    }

    public function updateProfile($data, $uid)
    {
        $this->db->where('ca_id', $uid);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function updateProfileDetail($phone, $uid)
    {
        $this->db->where('cu_account_id', $uid);
        $this->db->update('customer_details', $phone);
        return TRUE;
    }

    public function updateContactAddress($cont, $uid)
    {
        $this->db->where('cont_account_id', $uid);
        $this->db->update('customer_contact_address', $cont);
        return TRUE;
    }

    public function updateShippingAddress($ship, $uid)
    {
        $this->db->where('ship_account_id', $uid);
        $this->db->update('customer_shipping_address', $ship);
        return TRUE;
    }

    public function loadCarts($uid)
    {
        $this->db->select('*');
        $this->db->from('shopping_carts');
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->join('products', 'products.product_id = shopping_carts.shop_cart_product_id');
        $this->db->order_by('shop_cart_id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function countCarts($uid)
    {
        $this->db->where('shop_cart_account_id', $uid);
        $query = $this->db->get('shopping_carts');
        return $query->num_rows();
    }

    public function getAmounts($uid)
    {
        $this->db->select('*');
        $this->db->from('shopping_carts');
        $this->db->where('shop_cart_account_id', $uid);
        $this->db->join('products', 'products.product_id = shopping_carts.shop_cart_product_id');
        $this->db->order_by('shop_cart_id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function getAddressCheckout($uid)
    {
        $this->db->select('*');
        $this->db->from('customer_accounts');
        $this->db->where('ca_id', $uid);
        $this->db->join('customer_shipping_address', 'customer_shipping_address.ship_account_id = customer_accounts.ca_id');
        $this->db->join('customer_details', 'customer_details.cu_account_id = customer_accounts.ca_id');
        $query = $this->db->get();
        return $query->row(0);
    }

    public function sendOrderTo($uid)
    {
        $this->db->where('ca_id', $uid);
        $get = $this->db->get('customer_accounts');
        if($get->num_rows() > 0) {
            return $get->row(0);
        }else {
            return FALSE;
        }
    }

    public function can_post_review($uid)
    {
        $this->db->where('order_account_id', $uid);
        $this->db->where('order_status >', 0);
        $this->db->where('order_status <', 5);
        $query = $this->db->get('orders');
        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function once_review($uid)
    {
        $this->db->where('testi_account_id', $uid);
        $query = $this->db->get('testimonials');
        if($query->num_rows() > 0)
        {
            return $query->row(0);
        }
        else
        {
            return FALSE;
        }
    }

    public function check_if_review($uid)
    {
        $this->db->where('testi_account_id', $uid);
        $query = $this->db->get('testimonials');
        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function new_review($data)
    {
        $this->db->insert('testimonials', $data);
        return TRUE;
    }

    public function update_review($data, $uid)
    {
        $this->db->where('testi_account_id', $uid);
        $this->db->update('testimonials', $data);
        return TRUE;
    }

    public function let_reset_password($username, $email)
    {
        $this->db->where('ca_email', $email);
        $this->db->where('ca_username', $username);
        $user = $this->db->get('customer_accounts');
        if($user->num_rows() > 0)
        {
            return $user->row(0);
        }
        else
        {
            return FALSE;
        }
    }

    public function reset_password($uid, $data)
    {
        $this->db->where('ca_id', $uid);
        $this->db->update('customer_accounts', $data);
        return TRUE;
    }

    public function getUserEmail($uid)
    {
        $this->db->where('ca_id', $uid);
        $query = $this->db->get('customer_accounts');
        return $query->row(4)->ca_email;
    }

}