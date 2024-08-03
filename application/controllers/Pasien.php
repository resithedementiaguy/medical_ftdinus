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

    public function detail($id)
    {
        $data['pasien'] = $this->Mod_pasien->get_pasien_detail($id);
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound($id);
        $data['suntik'] = $this->Mod_pasien->get_suntik($id);
        $data['superbright'] = $this->Mod_pasien->get_superbright($id);
        $data['magnetik'] = $this->Mod_pasien->get_magnetik($id);
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
