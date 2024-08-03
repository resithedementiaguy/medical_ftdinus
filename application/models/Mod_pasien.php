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
        $this->db->select('nik, nama, kota');
        $this->db->from('ktp');
        $this->db->where('nik IN (SELECT nik FROM suntik UNION SELECT nik FROM ultrasound UNION SELECT nik FROM superbright UNION SELECT nik FROM magnetik)', NULL, FALSE);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pasien_detail($nik)
    {
        $this->db->select('*');
        $this->db->from('ktp');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_suntik($nik)
    {
        $this->db->select('*');
        $this->db->from('suntik');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ultrasound($nik)
    {
        $this->db->select('*');
        $this->db->from('ultrasound');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ultrasound_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ultrasound');
        return $query->row();
    }

    public function get_superbright($nik)
    {
        $this->db->select('*');
        $this->db->from('superbright');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_superbright_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('superbright');
        return $query->row();
    }

    public function get_magnetik($nik)
    {
        $this->db->select('*');
        $this->db->from('magnetik');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_magnetik_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('magnetik');
        return $query->row();
    }
}
