<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auk_model extends CI_Model
{

    public function create_asamurat($data)
    {
        return $this->db->insert('data_asamurat', $data);
    }

    public function get_asamurat($id)
    {
        $query = $this->db->get_where('data_asamurat', array('id' => $id));
        return $query->row_array();
    }

    public function update_asamurat($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_asamurat', $data);
    }

    public function delete_asamurat($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_asamurat');
    }

    public function create_kolesterol($data)
    {
        return $this->db->insert('data_kolesterol', $data);
    }

    public function get_kolesterol($id)
    {
        $query = $this->db->get_where('data_kolesterol', array('id' => $id));
        return $query->row_array();
    }

    public function update_kolesterol($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_kolesterol', $data);
    }

    public function delete_kolesterol($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_kolesterol');
    }
}
