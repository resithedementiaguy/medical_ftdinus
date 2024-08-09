<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_pasien');
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
        $this->load->view('partials/header');
        $this->load->view('frontend/pasien/view_pasien', $data);
        $this->load->view('partials/footer');
    }

    public function detail($nik)
    {
        $data['penduduk'] = $this->Mod_penduduk->get_all_penduduk();
        $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        $data['pasien'] = $this->Mod_pasien->get_pasien_detail($nik);
        $data['suntik'] = $this->Mod_pasien->get_suntik($nik);
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound($nik);
        $data['superbright'] = $this->Mod_pasien->get_superbright($nik);
        $data['magnetik'] = $this->Mod_pasien->get_magnetik($nik);

        $this->load->view('partials/header');
        $this->load->view('frontend/pasien/detail_pasien', $data);
        $this->load->view('partials/footer');
    }

    // function suntik
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

        $data = array(
            'glukosa'    => $this->input->post('glukosa'),
            'hb'         => $this->input->post('hb'),
            'spo2'       => $this->input->post('spo2'),
            'kolesterol' => $this->input->post('kolesterol'),
            'asam_urat'  => $this->input->post('asam_urat')
        );

        $updated = $this->Mod_pasien->update_suntik($id, $data);

        if ($updated) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }

    // function ultrasound
    public function get_ultrasound($id)
    {
        $ultrasound = $this->Mod_pasien->get_ultrasound_id($id);
        header('Content-Type: application/json');
        echo json_encode($ultrasound);
    }

    public function update_ultrasound($id)
    {
        $this->load->model('Mod_pasien');

        $data = array(
            'us1'       => $this->input->post('us1'),
            'us2'       => $this->input->post('us2'),
            'us3'       => $this->input->post('us3'),
            'us4'       => $this->input->post('us4'),
            'us5'       => $this->input->post('us5'),
            'us6'       => $this->input->post('us6'),
            'us7'       => $this->input->post('us7'),
            'us8'       => $this->input->post('us8'),
            'us9'       => $this->input->post('us9'),
            'us10'      => $this->input->post('us10')
        );

        $updated = $this->Mod_pasien->update_ultrasound($id, $data);

        if ($updated) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }

    // function super bright
    public function get_superbright($id)
    {
        $superbright = $this->Mod_pasien->get_superbright_id($id);
        header('Content-Type: application/json');
        echo json_encode($superbright);
    }

    public function update_superbright($id)
    {
        $this->load->model('Mod_pasien');

        $data = array(
            'sb1'       => $this->input->post('sb1'),
            'sb2'       => $this->input->post('sb2'),
            'sb3'       => $this->input->post('sb3'),
            'sb4'       => $this->input->post('sb4'),
            'sb5'       => $this->input->post('sb5'),
            'sb6'       => $this->input->post('sb6'),
            'sb7'       => $this->input->post('sb7'),
            'sb8'       => $this->input->post('sb8'),
            'sb9'       => $this->input->post('sb9'),
            'sb10'      => $this->input->post('sb10')
        );

        $updated = $this->Mod_pasien->update_superbright($id, $data);

        if ($updated) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }

    // function magnetik
    public function get_magnetik($id)
    {
        $magnetik = $this->Mod_pasien->get_magnetik_id($id);
        header('Content-Type: application/json');
        echo json_encode($magnetik);
    }

    public function update_magnetik($id)
    {
        $this->load->model('Mod_pasien');

        $data = array(
            'mag1'       => $this->input->post('mag1'),
            'mag2'       => $this->input->post('mag2'),
            'mag3'       => $this->input->post('mag3'),
            'mag4'       => $this->input->post('mag4'),
            'mag5'       => $this->input->post('mag5'),
            'mag6'       => $this->input->post('mag6'),
            'mag7'       => $this->input->post('mag7'),
            'mag8'       => $this->input->post('mag8'),
            'mag9'       => $this->input->post('mag9'),
            'mag10'      => $this->input->post('mag10')
        );

        $updated = $this->Mod_pasien->update_magnetik($id, $data);

        if ($updated) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }
}
