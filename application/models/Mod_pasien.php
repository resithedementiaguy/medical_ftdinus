<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pasien extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Function Pasien
    public function get_all_pasien()
    {
        $this->db->select('ktp.*, pasien.nik AS pasien_nik');
        $this->db->from('ktp');
        $this->db->join('pasien', 'ktp.nik = pasien.nik', 'left');
        $this->db->group_by('ktp.nik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pasien_detail($nik)
    {
        $this->db->select('pasien.id as pasien_id, pasien.nik AS pasien_nik, ktp.id as ktp_id, ktp.nik, ktp.nama, ktp.alamat, ktp.tempat_lahir, ktp.tanggal_lahir, ktp.kelurahan, ktp.kecamatan, ktp.kota');
        $this->db->from('ktp');
        $this->db->join('pasien', 'pasien.nik = ktp.nik', 'left');
        $this->db->where('ktp.nik', $nik);
        $query = $this->db->get();

        return $query->row_array();
    }

    // Function Suntik
    public function get_suntik($nik)
    {
        $this->db->select('suntik.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('suntik', 'suntik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_suntik_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('suntik');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_suntik($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('suntik', $data);
    }

    // Function Ultrasound
    public function get_ultrasound($nik)
    {
        $this->db->select('ultrasound.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('ultrasound', 'ultrasound.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_ultrasound($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ultrasound', $data);
    }

    public function get_ultrasound_id($id)
    {
        $this->db->select('*');
        $this->db->from('ultrasound');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Function Super Bright
    public function get_superbright($nik)
    {
        $this->db->select('superbright.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('superbright', 'superbright.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_superbright($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('superbright', $data);
    }

    public function get_superbright_id($id)
    {
        $this->db->select('*');
        $this->db->from('superbright');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Function Magnetik
    public function get_magnetik($nik)
    {
        $this->db->select('magnetik.*, pasien.id as pasien_id, pasien.nik');
        $this->db->from('pasien');
        $this->db->join('magnetik', 'magnetik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_magnetik($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('magnetik', $data);
    }

    public function get_magnetik_id($id)
    {
        $this->db->select('*');
        $this->db->from('magnetik');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
