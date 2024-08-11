<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_darah extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_penduduk()
    {
        $query = $this->db->get('ktp');
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

    public function add_pasien($data)
    {
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
    }

    public function add_suntik($data)
    {
        $this->db->insert('suntik', $data);
        return $this->db->affected_rows() > 0;
    }

    public function add_ultrasound($data)
    {
        $this->db->insert('ultrasound', $data);
        return $this->db->affected_rows() > 0;
    }

    public function add_superbright($data)
    {
        $this->db->insert('superbright', $data);
        return $this->db->affected_rows() > 0;
    }

    public function add_magnetik($data)
    {
        $this->db->insert('magnetik', $data);
        return $this->db->affected_rows() > 0;
    }

    public function get_ultrasound_data_by_pasien($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('ultrasound');
        $this->db->where('id_pasien', $id_pasien);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data dalam bentuk array
    }
}
