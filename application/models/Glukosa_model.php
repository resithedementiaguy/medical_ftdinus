<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Glukosa_model extends CI_Model
{

    public function create_glukosa($data)
    {
        return $this->db->insert('data_glukosa', $data);
    }

    public function get_glukosa($id)
    {
        $query = $this->db->get_where('data_glukosa', array('id' => $id));
        return $query->row_array();
    }

    public function update_glukosa($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_glukosa', $data);
    }

    public function delete_glukosa($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_glukosa');
    }
}
