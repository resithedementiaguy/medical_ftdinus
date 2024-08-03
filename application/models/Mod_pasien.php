<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pasien extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_pasien()
    {
        $this->db->select('ktp.*, pasien.id');
        $this->db->from('ktp');
        $this->db->join('pasien', 'ktp.nik = pasien.nik', 'inner');
        $this->db->group_by('ktp.nik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pasien_detail($id)
    {
        $this->db->select('pasien.id as pasien_id, ktp.nik, ktp.nama, ktp.alamat, ktp.tempat_lahir, ktp.tanggal_lahir, ktp.kelurahan, ktp.kecamatan, ktp.kota');
        $this->db->from('pasien');
        $this->db->join('ktp', 'pasien.nik = ktp.nik', 'left');
        $this->db->where('pasien.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_suntik($id)
    {
        $this->db->select('*');
        $this->db->from('suntik');
        $this->db->where('id_pasien', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ultrasound($id)
    {
        $this->db->select('*');
        $this->db->from('ultrasound');
        $this->db->where('id_pasien', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_superbright($id)
    {
        $this->db->select('*');
        $this->db->from('superbright');
        $this->db->where('id_pasien', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_magnetik($id)
    {
        $this->db->select('*');
        $this->db->from('magnetik');
        $this->db->where('id_pasien', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
