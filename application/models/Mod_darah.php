<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_darah extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data program studi dengan relasi ke tiga tabel
    public function get_penduduk()
    {
        $query = $this->db->get('ktp');
        return $query->result();
    }

    public function get_penduduk_by_id($id) {
        $this->db->select('*');
        $this->db->from('ktp');
        $this->db->where('nik', $id);
        $query = $this->db->get();
        return $query->row(); // Using row() to get a single row result
    }

    // Tambah data program studi
    public function add_medical($data)
    {
        return $this->db->insert('medical', $data);
    }

    // Update data program studi
    public function update_program_studi($id, $data)
    {
        $this->db->where('idx_skf', $id);
        return $this->db->update('srm_skf', $data);
    }

    // Hapus data program studi
    public function delete_program_studi($id)
    {
        return $this->db->delete('srm_skf', array('idx_skf' => $id));
    }
}