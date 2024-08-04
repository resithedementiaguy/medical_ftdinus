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

    // get suntik
    public function get_suntik($id)
    {
        $this->load->model('Mod_pasien');
        $suntik = $this->Mod_pasien->get_suntik_by_id($id);
        header('Content-Type: application/json');
        echo json_encode($suntik);
    }

    public function update_suntik($id)
    {
        $this->load->model('Mod_pasien');

        // data dari POST
        $data = array(
            'glukosa'    => $this->input->post('glukosa'),
            'hb'         => $this->input->post('hb'),
            'spo2'       => $this->input->post('spo2'),
            'kolesterol' => $this->input->post('kolesterol'),
            'asam_urat'  => $this->input->post('asam_urat')
        );

        $updated = $this->Mod_pasien->update_suntik($id, $data);

        if ($updated) {
            // Kirim JSON respons dengan status sukses
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            // Kirim JSON respons dengan status gagal
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }

    public function get_ultrasound($id)
    {
        $ultrasound = $this->Mod_pasien->get_ultrasound_id($id);
        header('Content-Type: application/json');
        echo json_encode($ultrasound);
    }

    public function get_superbright($id)
    {
        $superbright = $this->Mod_pasien->get_superbright_id($id);
        header('Content-Type: application/json');
        echo json_encode($superbright);
    }

    public function get_magnetik($id)
    {
        $magnetik = $this->Mod_pasien->get_magnetik_id($id);
        header('Content-Type: application/json');
        echo json_encode($magnetik);
    }
}
