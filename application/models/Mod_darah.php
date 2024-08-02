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

    public function add_suntik($data)
    {
        return $this->db->insert('suntik', $data);
    }

    public function add_ultrasound($data)
    {
        return $this->db->insert('ultrasound', $data);
    }

    public function add_superbright($data)
    {
        return $this->db->insert('superbright', $data);
    }

    public function add_magnetik($data)
    {
        return $this->db->insert('magnetik', $data);
    }
}
