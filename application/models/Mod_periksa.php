<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_periksa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_penduduk()
    {
        $this->db->select('*');
        $this->db->from('ktp');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_nama_by_nik($nik)
    {
        $this->db->select('nama');
        $this->db->from('ktp');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->nama;
        }
        return null;
    }

    // Tambah data manual
    public function add_manual($data)
    {
        return $this->db->insert('data_manual', $data);
    }

    // Tambah data akm
    public function add_akm($data)
    {
        return $this->db->insert('data_akm', $data);
    }
}
