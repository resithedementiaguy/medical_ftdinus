<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_periksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_pasien');
        $this->load->model('Ultrasound_model');
        $this->load->model('Superbright_model');
        $this->load->model('Magnetik_model');
        $this->load->library('session'); // Load session library
        $this->check_login(); // Ensure user is logged in
    }

    private function check_login()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page if not logged in
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        $data['total_recap'] = $this->Mod_pasien->get_total_recap();
        $data['daftar_periksa'] = $this->Mod_pasien->get_manual_akm();
        $this->load->view('partials/header');
        $this->load->view('frontend/total_periksa/view', $data);
        $this->load->view('partials/footer');
    }
}