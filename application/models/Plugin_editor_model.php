<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plugin_editor_model extends CI_Model {

    public function editor()
    {
        $this->db->where('editor_activate', 'yes');
        $query = $this->db->get('plugin_editors');
        if($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return FALSE;
        }
    }
}