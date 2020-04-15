<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_user_model extends CI_Model {

    public function create($data)
    {
        $this->db->insert('admins', $data);
        return TRUE;
    }

    public function list($page)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit(20, $page);
        $query = $this->db->get('admins');
        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            return FALSE;
        }
    }

    public function edit($user)
    {
        $this->db->where('admin_username', $user);
        $query = $this->db->get('admins');
        if($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return FALSE;
        }
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        if($this->db->update('admins', $data)) {
            return TRUE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admins');
        return TRUE;
    }

    public function fetch_user_photo($id)
    {
        $this->db->where('id', $id);
        $pic = $this->db->get('admins');
        return $pic->row(0);
    }

    public function count()
    {
        $query = $this->db->get('admins');
        return $query->num_rows();
    }
}