<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superbright_model extends CI_Model
{

    public function create_superbright($data)
    {
        return $this->db->insert('data_sb', $data);
    }

    public function get_superbright($id)
    {
        $query = $this->db->get_where('data_sb', array('id' => $id));
        return $query->row_array();
    }

    public function update_superbright($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_sb', $data);
    }

    public function delete_superbright($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_sb');
    }
}
