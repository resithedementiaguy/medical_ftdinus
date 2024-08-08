<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ultrasound_model extends CI_Model
{

    public function create_ultrasound($data)
    {
        return $this->db->insert('ultrasound', $data);
    }

    public function get_ultrasound($id)
    {
        $query = $this->db->get_where('ultrasound', array('id' => $id));
        return $query->row_array();
    }

    public function update_ultrasound($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('data_us', $data);
    }

    public function delete_ultrasound($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ultrasound');
    }
}
