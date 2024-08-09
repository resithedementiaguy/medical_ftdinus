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
        $data['title'] = 'Dashboard';
        $data['suntik'] = $this->Mod_pasien->get_suntik_dashboard();
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound_dashboard();
        $data['superbright'] = $this->Mod_pasien->get_superbright_dashboard();
        $data['magnetik'] = $this->Mod_pasien->get_magnetik_dashboard();
        $data['total_suntik'] = $this->Mod_pasien->count_suntik_dashboard();
        $data['total_ultrasound'] = $this->Mod_pasien->count_ultrasound_dashboard();
        $data['total_superbright'] = $this->Mod_pasien->count_superbright_dashboard();
        $data['total_magnetik'] = $this->Mod_pasien->count_magnetik_dashboard();
        $data['total_pasien'] = $this->Mod_pasien->get_total_pasien();
        $data['total_pemeriksaan'] = $this->Mod_pasien->get_total_pemeriksaan();
        $data['pasien'] = $this->Mod_pasien->get_pasien_dashboard();
        // Data per minggu
        $data['periksa_mingguan'] = $this->Mod_pasien->get_periksa_mingguan();
        $this->load->view('partials/header',$data);
        $this->load->view('frontend/dashboard',$data);
        $this->load->view('partials/footer');
    }
}
