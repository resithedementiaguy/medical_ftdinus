<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magnetik_model extends CI_Model
{

    public function create_magnetik($data)
    {
        return $this->db->insert('data_mag', $data);
    }

    public function get_magnetik($id)
    {
        $query = $this->db->get_where('data_mag', array('id' => $id));
        return $query->row_array();
    }

    public function update_magnetik($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_mag', $data);
    }

    public function delete_magnetik($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_mag');
    }

    public function get_magnetik_data_paginated($id, $page)
{
    // Misal setiap halaman menampilkan 1000 data
    $limit = 1000;
    $offset = ($page - 1) * $limit;
    $this->db->limit($limit, $offset);
    $this->db->where('id', $id);
    $query = $this->db->get('data_mag');
    return $query->row_array();
}


}
