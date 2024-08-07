<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_pasien');
    }

    public function index()
    {
        $data['suntik'] = $this->Mod_pasien->get_suntik_dashboard();
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound_dashboard();
        $data['superbright'] = $this->Mod_pasien->get_superbright_dashboard();
        $data['magnetik'] = $this->Mod_pasien->get_magnetik_dashboard();
        $data['total_suntik'] = count($data['suntik']);
        $data['total_ultrasound'] = count($data['ultrasound']);
        $data['total_superbright'] = count($data['superbright']);
        $data['total_magnetik'] = count($data['magnetik']);
        $data['total_pasien'] = $this->Mod_pasien->get_total_pasien();
        $data['total_pemeriksaan'] = $this->Mod_pasien->get_total_pemeriksaan();
        $data['pasien'] = $this->Mod_pasien->get_pasien_dashboard();
        $this->load->view('partials/header');
        $this->load->view('frontend/dashboard',$data);
        $this->load->view('partials/footer');
    }
}
