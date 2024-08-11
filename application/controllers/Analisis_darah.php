<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis_darah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_darah');
        $this->load->model('Ultrasound_model');
        $this->load->model('Superbright_model');
        $this->load->model('Magnetik_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
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
        $data['ktp'] = $this->Mod_darah->get_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/analisis_darah', $data);
        $this->load->view('partials/footer');
    }

    public function get_nama_by_nik()
    {
        $nik = $this->input->post('nik');
        $nama = $this->Mod_darah->get_nama_by_nik($nik);
        echo json_encode($nama);
    }

    public function add()
    {
        $alat = $this->input->post('alat');
        $nik = $this->input->post('nik');
        $tinggi = $this->input->post('tinggi');
        $berat = $this->input->post('berat');

        // Validate the input
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');

        if ($alat == 'suntik') {
            $this->form_validation->set_rules('glukosa', 'Glukosa', 'required');
            $this->form_validation->set_rules('hb', 'HB', 'required');
            $this->form_validation->set_rules('spo2', 'SPO2', 'required');
            $this->form_validation->set_rules('kolesterol', 'Kolesterol', 'required');
            $this->form_validation->set_rules('asam_urat', 'Asam Urat', 'required');
        } elseif ($alat == 'ultraSound') {
            $this->form_validation->set_rules('us1', 'US1', 'required');
            $this->form_validation->set_rules('us2', 'US2', 'required');
            $this->form_validation->set_rules('us3', 'US3', 'required');
            $this->form_validation->set_rules('us4', 'US4', 'required');
            $this->form_validation->set_rules('us5', 'US5', 'required');
            $this->form_validation->set_rules('us6', 'US6', 'required');
            $this->form_validation->set_rules('us7', 'US7', 'required');
            $this->form_validation->set_rules('us8', 'US8', 'required');
            $this->form_validation->set_rules('us9', 'US9', 'required');
            $this->form_validation->set_rules('us10', 'US10', 'required');
        } elseif ($alat == 'superBright') {
            $this->form_validation->set_rules('sb1', 'SB1', 'required');
            $this->form_validation->set_rules('sb2', 'SB2', 'required');
            $this->form_validation->set_rules('sb3', 'SB3', 'required');
            $this->form_validation->set_rules('sb4', 'SB4', 'required');
            $this->form_validation->set_rules('sb5', 'SB5', 'required');
            $this->form_validation->set_rules('sb6', 'SB6', 'required');
            $this->form_validation->set_rules('sb7', 'SB7', 'required');
            $this->form_validation->set_rules('sb8', 'SB8', 'required');
            $this->form_validation->set_rules('sb9', 'SB9', 'required');
            $this->form_validation->set_rules('sb10', 'SB10', 'required');
        } elseif ($alat == 'magnetik') {
        }

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            // Check if we already have a pasien ID in session
            if (!$this->session->userdata('pasien_id')) {
                // Insert the pasien data into the pasien table and get the new ID
                $id_pasien = $this->Mod_darah->add_pasien([
                    'nik' => $nik,
                    'tinggi' => $tinggi,
                    'berat' => $berat,
                ]);
                // Save the pasien ID in session
                $this->session->set_userdata('pasien_id', $id_pasien);
            } else {
                // Use the pasien ID from session
                $id_pasien = $this->session->userdata('pasien_id');
            }

            date_default_timezone_set('Asia/Jakarta');
            $ins_time = date('Y-m-d H:i:s', time());

            $data = array(
                'id_pasien' => $id_pasien,
                'ins_time'  => $ins_time
            );

            if ($alat == 'suntik') {
                $data += array(
                    'glukosa' => $this->input->post('glukosa'),
                    'hb' => $this->input->post('hb'),
                    'spo2' => $this->input->post('spo2'),
                    'kolesterol' => $this->input->post('kolesterol'),
                    'asam_urat' => $this->input->post('asam_urat')
                );
                $this->Mod_darah->add_suntik($data);
            } elseif ($alat == 'ultraSound') {
                $data += array(
                    'us1' => $this->input->post('us1'),
                    'us2' => $this->input->post('us2'),
                    'us3' => $this->input->post('us3'),
                    'us4' => $this->input->post('us4'),
                    'us5' => $this->input->post('us5'),
                    'us6' => $this->input->post('us6'),
                    'us7' => $this->input->post('us7'),
                    'us8' => $this->input->post('us8'),
                    'us9' => $this->input->post('us9'),
                    'us10' => $this->input->post('us10')
                );
                $this->Mod_darah->add_ultrasound($data);
            } elseif ($alat == 'superBright') {
                $data += array(
                    'sb1' => $this->input->post('sb1'),
                    'sb2' => $this->input->post('sb2'),
                    'sb3' => $this->input->post('sb3'),
                    'sb4' => $this->input->post('sb4'),
                    'sb5' => $this->input->post('sb5'),
                    'sb6' => $this->input->post('sb6'),
                    'sb7' => $this->input->post('sb7'),
                    'sb8' => $this->input->post('sb8'),
                    'sb9' => $this->input->post('sb9'),
                    'sb10' => $this->input->post('sb10')
                );
                $this->Mod_darah->add_superbright($data);
            } elseif ($alat == 'magnetik') {
                $data += array(
                    'jtg_mag1' => $this->input->post('jtg_mag1'),
                    'jtg_mag2' => $this->input->post('jtg_mag2'),
                    'jtg_mag3' => $this->input->post('jtg_mag3'),
                    'jtg_mag4' => $this->input->post('jtg_mag4'),
                    'jtg_mag5' => $this->input->post('jtg_mag5'),
                    'jtg_mag6' => $this->input->post('jtg_mag6'),
                    'jtg_mag7' => $this->input->post('jtg_mag7'),
                    'jtg_mag8' => $this->input->post('jtg_mag8'),
                    'jtg_mag9' => $this->input->post('jtg_mag9'),
                    'jtg_mag10' => $this->input->post('jtg_mag10'),
                    'srf_mag1' => $this->input->post('srf_mag1'),
                    'srf_mag2' => $this->input->post('srf_mag2'),
                    'srf_mag3' => $this->input->post('srf_mag3'),
                    'srf_mag4' => $this->input->post('srf_mag4'),
                    'srf_mag5' => $this->input->post('srf_mag5'),
                    'srf_mag6' => $this->input->post('srf_mag6'),
                    'srf_mag7' => $this->input->post('srf_mag7'),
                    'srf_mag8' => $this->input->post('srf_mag8'),
                    'srf_mag9' => $this->input->post('srf_mag9'),
                    'srf_mag10' => $this->input->post('srf_mag10'),
                    'drh_mag1' => $this->input->post('drh_mag1'),
                    'drh_mag2' => $this->input->post('drh_mag2'),
                    'drh_mag3' => $this->input->post('drh_mag3'),
                    'drh_mag4' => $this->input->post('drh_mag4'),
                    'drh_mag5' => $this->input->post('drh_mag5'),
                    'drh_mag6' => $this->input->post('drh_mag6'),
                    'drh_mag7' => $this->input->post('drh_mag7'),
                    'drh_mag8' => $this->input->post('drh_mag8'),
                    'drh_mag9' => $this->input->post('drh_mag9'),
                    'drh_mag10' => $this->input->post('drh_mag10'),
                    'sel_mag1' => $this->input->post('sel_mag1'),
                    'sel_mag2' => $this->input->post('sel_mag2'),
                    'sel_mag3' => $this->input->post('sel_mag3'),
                    'sel_mag4' => $this->input->post('sel_mag4'),
                    'sel_mag5' => $this->input->post('sel_mag5'),
                    'sel_mag6' => $this->input->post('sel_mag6'),
                    'sel_mag7' => $this->input->post('sel_mag7'),
                    'sel_mag8' => $this->input->post('sel_mag8'),
                    'sel_mag9' => $this->input->post('sel_mag9'),
                    'sel_mag10' => $this->input->post('sel_mag10'),
                    'tgi_mag1' => $this->input->post('tgi_mag1'),
                    'tgi_mag2' => $this->input->post('tgi_mag2'),
                    'tgi_mag3' => $this->input->post('tgi_mag3'),
                    'tgi_mag4' => $this->input->post('tgi_mag4'),
                    'tgi_mag5' => $this->input->post('tgi_mag5'),
                    'tgi_mag6' => $this->input->post('tgi_mag6'),
                    'tgi_mag7' => $this->input->post('tgi_mag7'),
                    'tgi_mag8' => $this->input->post('tgi_mag8'),
                    'tgi_mag9' => $this->input->post('tgi_mag9'),
                    'tgi_mag10' => $this->input->post('tgi_mag10'),

                );
                $this->Mod_darah->add_magnetik($data);
            }

            if ($this->input->post('completed') == 'yes') {
                $this->session->unset_userdata('pasien_id');
            }

            redirect('analisis_darah');
        }
    }

    public function clear_session_id()
    {
        $this->session->unset_userdata('pasien_id');
        echo json_encode(['status' => 'success']);
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
