<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komparasi extends CI_Controller
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
        $this->load->view('partials/header');
        $this->load->view('frontend/komparasi/view', $data);
        $this->load->view('partials/footer');
    }

    public function detail($nik)
    {
        $data['penduduk'] = $this->Mod_penduduk->get_all_penduduk();
        $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        $data['pasien'] = $this->Mod_pasien->get_pasien_detail($nik);
        $data['antropometri'] = $this->Mod_pasien->get_antropometri($nik);
        $data['suntik'] = $this->Mod_pasien->get_suntik($nik);
        $data['ultrasound'] = $this->Mod_pasien->get_ultrasound($nik);
        $data['superbright'] = $this->Mod_pasien->get_superbright($nik);
        $data['magnetik'] = $this->Mod_pasien->get_magnetik($nik);
        $data['recap'] = $this->Mod_pasien->get_recap_by_nik($nik);

        $this->load->view('partials/header');
        $this->load->view('frontend/komparasi/detail', $data);
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
            'jtg_mag1'       => $this->input->post('jtg_mag1'),
            'jtg_mag2'       => $this->input->post('jtg_mag2'),
            'jtg_mag3'       => $this->input->post('jtg_mag3'),
            'jtg_mag4'       => $this->input->post('jtg_mag4'),
            'jtg_mag5'       => $this->input->post('jtg_mag5'),
            'jtg_mag6'       => $this->input->post('jtg_mag6'),
            'jtg_mag7'       => $this->input->post('jtg_mag7'),
            'jtg_mag8'       => $this->input->post('jtg_mag8'),
            'jtg_mag9'       => $this->input->post('jtg_mag9'),
            'jtg_mag10'      => $this->input->post('jtg_mag10'),

            'srf_mag1'       => $this->input->post('srf_mag1'),
            'srf_mag2'       => $this->input->post('srf_mag2'),
            'srf_mag3'       => $this->input->post('srf_mag3'),
            'srf_mag4'       => $this->input->post('srf_mag4'),
            'srf_mag5'       => $this->input->post('srf_mag5'),
            'srf_mag6'       => $this->input->post('srf_mag6'),
            'srf_mag7'       => $this->input->post('srf_mag7'),
            'srf_mag8'       => $this->input->post('srf_mag8'),
            'srf_mag9'       => $this->input->post('srf_mag9'),
            'srf_mag10'      => $this->input->post('srf_mag10'),

            'drh_mag1'       => $this->input->post('drh_mag1'),
            'drh_mag2'       => $this->input->post('drh_mag2'),
            'drh_mag3'       => $this->input->post('drh_mag3'),
            'drh_mag4'       => $this->input->post('drh_mag4'),
            'drh_mag5'       => $this->input->post('drh_mag5'),
            'drh_mag6'       => $this->input->post('drh_mag6'),
            'drh_mag7'       => $this->input->post('drh_mag7'),
            'drh_mag8'       => $this->input->post('drh_mag8'),
            'drh_mag9'       => $this->input->post('drh_mag9'),
            'drh_mag10'      => $this->input->post('drh_mag10'),

            'sel_mag1'       => $this->input->post('sel_mag1'),
            'sel_mag2'       => $this->input->post('sel_mag2'),
            'sel_mag3'       => $this->input->post('sel_mag3'),
            'sel_mag4'       => $this->input->post('sel_mag4'),
            'sel_mag5'       => $this->input->post('sel_mag5'),
            'sel_mag6'       => $this->input->post('sel_mag6'),
            'sel_mag7'       => $this->input->post('sel_mag7'),
            'sel_mag8'       => $this->input->post('sel_mag8'),
            'sel_mag9'       => $this->input->post('sel_mag9'),
            'sel_mag10'      => $this->input->post('sel_mag10'),

            'tgi_mag1'       => $this->input->post('tgi_mag1'),
            'tgi_mag2'       => $this->input->post('tgi_mag2'),
            'tgi_mag3'       => $this->input->post('tgi_mag3'),
            'tgi_mag4'       => $this->input->post('tgi_mag4'),
            'tgi_mag5'       => $this->input->post('tgi_mag5'),
            'tgi_mag6'       => $this->input->post('tgi_mag6'),
            'tgi_mag7'       => $this->input->post('tgi_mag7'),
            'tgi_mag8'       => $this->input->post('tgi_mag8'),
            'tgi_mag9'       => $this->input->post('tgi_mag9'),
            'tgi_mag10'      => $this->input->post('tgi_mag10'),
        );

        $updated = $this->Mod_pasien->update_magnetik($id, $data);

        if ($updated) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan saat memperbarui data.'));
        }
    }

    public function delete_suntik($id)
    {
        $this->Mod_pasien->delete_suntik($id);
        redirect('pasien');
    }

    public function delete_ultrasound($id)
    {
        $this->Mod_pasien->delete_ultrasound($id);
        redirect('pasien');
    }

    public function delete_superbright($id)
    {
        $this->Mod_pasien->delete_superbright($id);
        redirect('pasien');
    }

    public function delete_magnetik($id)
    {
        $this->Mod_pasien->delete_magnetik($id);
        redirect('pasien');
    }

    public function get_ultrasound_data($id)
    {
        // Ambil data ultrasound berdasarkan ID
        $data_us = $this->Ultrasound_model->get_ultrasound($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_us);
    }

    public function get_superbright_data($id)
    {
        // Ambil data ultrasound berdasarkan ID
        $data_sb = $this->Superbright_model->get_superbright($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_sb);
    }

    public function get_magnetik_data($id)
    {
        // Ambil data ultrasound berdasarkan ID
        $data_mag = $this->Magnetik_model->get_magnetik($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_mag);
    }
}
