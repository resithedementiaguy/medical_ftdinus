<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_pasien');
    }

    public function index($nik = null)
    {
        if ($nik) {
            // Display details for a specific patient
            $data['pasien'] = $this->Mod_pasien->get_pasien_detail($nik);
            $data['ultrasound'] = $this->Mod_pasien->get_ultrasound($nik);
            // Load detailed view for specific patient
        } else {
            // Display the list of patients
            $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        }

        $this->load->view('partials/header');
        $this->load->view('frontend/view_pasien', $data);
        $this->load->view('partials/footer');
    }
}
