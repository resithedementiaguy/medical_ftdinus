<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_pasien');
        $this->load->model('Mod_penduduk');
    }

    public function index()
    {
        $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        $this->load->view('partials/header');
        $this->load->view('frontend/view_pasien', $data);
        $this->load->view('partials/footer');
    }

    public function detail($nik)
    {
        $data['pasien'] = $this->Mod_penduduk->get_nama_by_nik($nik);
        $data['ultrasound'] = $this->Mod_penduduk->get_ultrasound_by_nik($nik);
        $data['suntik'] = $this->Mod_penduduk->get_suntik_by_nik($nik);
        $data['superbright'] = $this->Mod_penduduk->get_superbright_by_nik($nik);
        $data['magnetik'] = $this->Mod_penduduk->get_magnetik_by_nik($nik);
        $this->load->view('partials/header');
        $this->load->view('frontend/detail_pasien', $data);
        $this->load->view('partials/footer');
    }

    public function get_ultrasound($id)
    {
        $ultrasound = $this->Mod_pasien->get_ultrasound_id($id);
        echo json_encode($ultrasound);
    }

    public function get_superbright($id)
    {
        $superbright = $this->Mod_pasien->get_superbright_id($id);
        echo json_encode($superbright);
    }

    public function get_magnetik($id)
    {
        $magnetik = $this->Mod_pasien->get_magnetik_id($id);
        echo json_encode($magnetik);
    }
}
