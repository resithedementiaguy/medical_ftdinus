<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis_darah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_darah');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
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

        // Validate the input
        $this->form_validation->set_rules('nik', 'NIK', 'required');

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
            $this->form_validation->set_rules('mag1', 'Mag1', 'required');
            $this->form_validation->set_rules('mag2', 'Mag2', 'required');
            $this->form_validation->set_rules('mag3', 'Mag3', 'required');
            $this->form_validation->set_rules('mag4', 'Mag4', 'required');
            $this->form_validation->set_rules('mag5', 'Mag5', 'required');
            $this->form_validation->set_rules('mag6', 'Mag6', 'required');
            $this->form_validation->set_rules('mag7', 'Mag7', 'required');
            $this->form_validation->set_rules('mag8', 'Mag8', 'required');
            $this->form_validation->set_rules('mag9', 'Mag9', 'required');
            $this->form_validation->set_rules('mag10', 'Mag10', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            // Check if we already have a pasien ID in session
            if (!$this->session->userdata('pasien_id')) {
                // Insert the pasien data into the pasien table and get the new ID
                $id_pasien = $this->Mod_darah->add_pasien($nik);
                // Save the pasien ID in session
                $this->session->set_userdata('pasien_id', $id_pasien);
            } else {
                // Use the pasien ID from session
                $id_pasien = $this->session->userdata('pasien_id');
            }

            date_default_timezone_set('Asia/Jakarta');
            $ins_time=date('Y-m-d H:i:s', time());

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
                    'mag1' => $this->input->post('mag1'),
                    'mag2' => $this->input->post('mag2'),
                    'mag3' => $this->input->post('mag3'),
                    'mag4' => $this->input->post('mag4'),
                    'mag5' => $this->input->post('mag5'),
                    'mag6' => $this->input->post('mag6'),
                    'mag7' => $this->input->post('mag7'),
                    'mag8' => $this->input->post('mag8'),
                    'mag9' => $this->input->post('mag9'),
                    'mag10' => $this->input->post('mag10')
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

    public function get_ultrasound_data()
{
    $id_pasien = $this->input->post('id_pasien');

    if ($id_pasien) {
        $ultrasound_data = $this->Mod_darah->get_ultrasound_data_by_pasien($id_pasien);
        echo json_encode($ultrasound_data);
    } else {
        echo json_encode(['error' => 'ID Pasien tidak ditemukan']);
    }
}
}
