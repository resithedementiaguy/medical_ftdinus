<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktp_model extends CI_Model
{

    public function create_ktp($data)
    {
        return $this->db->insert('ktp', $data);
    }

    public function suggest_nik($query)
    {
        $this->db->select('nik');
        $this->db->from('ktp');
        $this->db->like('nik', $query, 'after');
        $this->db->limit(10);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_ktp()
    {
        $query = $this->db->get('ktp');
        return $query->result_array();
    }

    public function update_ktp($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ktp', $data);
    }

    public function delete_ktp($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ktp');
    }

    public function get_ktp_by_nik($nik)
    {
        $query = $this->db->get_where('ktp', array('nik' => $nik));
        return $query->row_array();
    }
}
