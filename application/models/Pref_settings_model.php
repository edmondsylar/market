<?php
class Pref_settings_model extends CI_Model {

    public function pref_settings_values()
    {
        $this->db->select('*');
        $this->db->from('pref_settings');
        $this->db->join('live_chat', 'live_chat.lc_id = pref_settings.id');
        $this->db->where('id', 1);
        $get = $this->db->get('');
        if($get) {
            return $get->row(0);
        } else {
            return FALSE;
        }
    }

    public function update_settings($data)
    {
        $this->db->where('id', 1);
        if($this->db->update('pref_settings', $data)) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function changeEditor($data)
    {
        $this->db->where('editor_id', 1);
        $this->db->update('plugin_editors', $data);
        return TRUE;
    }

    public function currentEditor()
    {
        $this->db->where('editor_id', 1);
        $query = $this->db->get('plugin_editors');
        return $query->row(1)->editor_name;
    }

    public function shop_tax()
    {
        $this->db->where('shop_tax_id', 1);
        $query = $this->db->get('shopping_tax');
        return $query->row(1)->shop_tax;        
    }

    public function update_vat($data)
    {
        $this->db->where('shop_tax_id', 1);
        $this->db->update('shopping_tax', $data);
        return TRUE;
    }

    public function livechat()
    {
        $this->db->where('lc_id', 1);
        $code = $this->db->get('live_chat');
        return $code->row(0);
    }

    public function updateLiveChat($data)
    {
        $this->db->where('lc_id', 1);
        $this->db->update('live_chat', $data);
        return TRUE;
    }

    public function updateGoogleTags($data)
    {
        $this->db->where('gt_id', 1);
        $this->db->update('google_tools', $data);
        return TRUE;
    }

    public function getGoogleTags()
    {
        $this->db->where('gt_id', 1);
        $query = $this->db->get('google_tools');
        return $query->row(0);
    }

    public function isMaintain()
    {
        $this->db->select('*');
        $this->db->from('pref_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();
        if($query->row(10)->website_status == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}