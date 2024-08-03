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

    public function add_patient($nik)
    {
        // Insert new patient data into the pasien table
        $this->db->insert('pasien', array('nik' => $nik));
        // Retrieve the newly inserted patient's ID
        return $this->db->insert_id();
    }

    public function get_patient_id_by_nik($nik)
    {
        $this->db->select('id');
        $this->db->from('pasien');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->id : null;
    }

    public function add_suntik($data)
    {
        $this->db->trans_start(); // Start transaction
        $this->db->insert('suntik', $data);
        $success = $this->db->trans_complete(); // Complete transaction
        return $success; // Return status of the transaction
    }

    public function add_ultrasound($data)
    {
        $this->db->trans_start(); // Start transaction
        $this->db->insert('ultrasound', $data);
        $success = $this->db->trans_complete(); // Complete transaction
        return $success; // Return status of the transaction
    }

    public function add_superbright($data)
    {
        $this->db->trans_start(); // Start transaction
        $this->db->insert('superbright', $data);
        $success = $this->db->trans_complete(); // Complete transaction
        return $success; // Return status of the transaction
    }

    public function add_magnetik($data)
    {
        $this->db->trans_start(); // Start transaction
        $this->db->insert('magnetik', $data);
        $success = $this->db->trans_complete(); // Complete transaction
        return $success; // Return status of the transaction
    }
}