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

    public function get_pasien_detail($nik)
    {
        $this->db->select('pasien.id as pasien_id, ktp.nik, ktp.nama, ktp.alamat, ktp.tempat_lahir, ktp.tanggal_lahir, ktp.kelurahan, ktp.kecamatan, ktp.kota');
        $this->db->from('pasien');
        $this->db->join('ktp', 'pasien.nik = ktp.nik', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_suntik($nik)
    {
        $this->db->select('suntik.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('suntik', 'suntik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ultrasound($nik)
    {
        $this->db->select('ultrasound.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('ultrasound', 'ultrasound.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_superbright($nik)
    {
        $this->db->select('superbright.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('superbright', 'superbright.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_magnetik($nik)
    {
        $this->db->select('magnetik.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('magnetik', 'magnetik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }
}
