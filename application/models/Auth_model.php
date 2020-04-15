<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model {

    public function admin($email, $password)
    {
        $this->db->where('admin_email', $email);
        $get = $this->db->get('admins');
        if($get->num_rows() > 0) {
            $db_password = $get->row(9)->admin_password;
            $check_password = password_verify($password, $db_password);
            if($check_password) {
                return $get->row(0);
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function isAdmin($uid)
    {
        $this->db->where('id', $uid);
        $user = $this->db->get('admins');
        return $user->row(0);
    }
}