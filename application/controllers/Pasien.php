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
        $this->load->view('frontend/pasien/view_pasien', $data);
        $this->load->view('partials/footer');
    }

    public function detail($nik)
    {
        $data['pasien'] = $this->Mod_pasien->get_pasien_detail($nik);
        $data['suntik'] = $this->Mod_pasien->get_suntik($nik);
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound($nik);
        $data['superbright'] = $this->Mod_pasien->get_superbright($nik);
        $data['magnetik'] = $this->Mod_pasien->get_magnetik($nik);

        $this->load->view('partials/header');
        $this->load->view('frontend/pasien/detail_pasien', $data);
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
