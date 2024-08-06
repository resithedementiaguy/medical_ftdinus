<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_penduduk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_penduduk()
    {
        $query = $this->db->get('ktp');
        return $query->result_array();
    }

    public function get_penduduk_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ktp');
        return $query->row_array();
    }

    public function get_nama_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('ktp');
        return $query->num_rows() > 0 ? $query->result() : [];
    }

    // Tambah data penduduk
    public function add_penduduk($data)
    {
        return $this->db->insert('ktp', $data);
    }

    // Update data penduduk
    public function update_penduduk($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ktp', $data);
    }
}
