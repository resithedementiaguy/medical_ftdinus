<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis_darah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_darah');
        $this->load->model('Ultrasound_model');
        $this->load->model('Auk_model');
        $this->load->model('Glukosa_model');
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
            $this->form_validation->set_rules('spo2', 'SPO2', 'required');
            $this->form_validation->set_rules('kolesterol', 'Kolesterol', 'required');
            $this->form_validation->set_rules('asam_urat', 'Asam Urat', 'required');
        } elseif ($alat == 'asamUrat') {
            $this->form_validation->set_rules('asam_manual', 'Asam Urat Manual', 'required');
            $this->form_validation->set_rules('asam_violet', 'Violet', 'required');
            $this->form_validation->set_rules('asam_blue', 'Blue', 'required');
            $this->form_validation->set_rules('asam_green', 'Green', 'required');
            $this->form_validation->set_rules('asam_yellow', 'Yellow', 'required');
            $this->form_validation->set_rules('asam_orange', 'Orange', 'required');
            $this->form_validation->set_rules('asam_red', 'Red', 'required');
        } elseif ($alat == 'kolesterol') {
            $this->form_validation->set_rules('kolesterol_manual', 'Kolesterol Manual', 'required');
            $this->form_validation->set_rules('kolesterol_violet', 'Violet', 'required');
            $this->form_validation->set_rules('kolesterol_blue', 'Blue', 'required');
            $this->form_validation->set_rules('kolesterol_green', 'Green', 'required');
            $this->form_validation->set_rules('kolesterol_yellow', 'Yellow', 'required');
            $this->form_validation->set_rules('kolesterol_orange', 'Orange', 'required');
            $this->form_validation->set_rules('kolesterol_red', 'Red', 'required');
        } elseif ($alat == 'glukosa') {
            $this->form_validation->set_rules('gula_darah', 'Gula Darah', 'required');
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
            $this->form_validation->set_rules('jtg_mag1', 'JTG MAG1', 'required');
            $this->form_validation->set_rules('jtg_mag2', 'JTG MAG2', 'required');
            $this->form_validation->set_rules('jtg_mag3', 'JTG MAG3', 'required');
            $this->form_validation->set_rules('jtg_mag4', 'JTG MAG4', 'required');
            $this->form_validation->set_rules('jtg_mag5', 'JTG MAG5', 'required');
            $this->form_validation->set_rules('jtg_mag6', 'JTG MAG6', 'required');
            $this->form_validation->set_rules('jtg_mag7', 'JTG MAG7', 'required');
            $this->form_validation->set_rules('jtg_mag8', 'JTG MAG8', 'required');
            $this->form_validation->set_rules('jtg_mag9', 'JTG MAG9', 'required');
            $this->form_validation->set_rules('jtg_mag10', 'JTG MAG10', 'required');
            $this->form_validation->set_rules('srf_mag1', 'SRF MAG1', 'required');
            $this->form_validation->set_rules('srf_mag2', 'SRF MAG2', 'required');
            $this->form_validation->set_rules('srf_mag3', 'SRF MAG3', 'required');
            $this->form_validation->set_rules('srf_mag4', 'SRF MAG4', 'required');
            $this->form_validation->set_rules('srf_mag5', 'SRF MAG5', 'required');
            $this->form_validation->set_rules('srf_mag6', 'SRF MAG6', 'required');
            $this->form_validation->set_rules('srf_mag7', 'SRF MAG7', 'required');
            $this->form_validation->set_rules('srf_mag8', 'SRF MAG8', 'required');
            $this->form_validation->set_rules('srf_mag9', 'SRF MAG9', 'required');
            $this->form_validation->set_rules('srf_mag10', 'SRF MAG10', 'required');
            $this->form_validation->set_rules('drh_mag1', 'DRH MAG1', 'required');
            $this->form_validation->set_rules('drh_mag2', 'DRH MAG2', 'required');
            $this->form_validation->set_rules('drh_mag3', 'DRH MAG3', 'required');
            $this->form_validation->set_rules('drh_mag4', 'DRH MAG4', 'required');
            $this->form_validation->set_rules('drh_mag5', 'DRH MAG5', 'required');
            $this->form_validation->set_rules('drh_mag6', 'DRH MAG6', 'required');
            $this->form_validation->set_rules('drh_mag7', 'DRH MAG7', 'required');
            $this->form_validation->set_rules('drh_mag8', 'DRH MAG8', 'required');
            $this->form_validation->set_rules('drh_mag9', 'DRH MAG9', 'required');
            $this->form_validation->set_rules('drh_mag10', 'DRH MAG10', 'required');
            $this->form_validation->set_rules('sel_mag1', 'SEL MAG1', 'required');
            $this->form_validation->set_rules('sel_mag2', 'SEL MAG2', 'required');
            $this->form_validation->set_rules('sel_mag3', 'SEL MAG3', 'required');
            $this->form_validation->set_rules('sel_mag4', 'SEL MAG4', 'required');
            $this->form_validation->set_rules('sel_mag5', 'SEL MAG5', 'required');
            $this->form_validation->set_rules('sel_mag6', 'SEL MAG6', 'required');
            $this->form_validation->set_rules('sel_mag7', 'SEL MAG7', 'required');
            $this->form_validation->set_rules('sel_mag8', 'SEL MAG8', 'required');
            $this->form_validation->set_rules('sel_mag9', 'SEL MAG9', 'required');
            $this->form_validation->set_rules('sel_mag10', 'SEL MAG10', 'required');
            $this->form_validation->set_rules('tgi_mag1', 'TGI MAG1', 'required');
            $this->form_validation->set_rules('tgi_mag2', 'TGI MAG2', 'required');
            $this->form_validation->set_rules('tgi_mag3', 'TGI MAG3', 'required');
            $this->form_validation->set_rules('tgi_mag4', 'TGI MAG4', 'required');
            $this->form_validation->set_rules('tgi_mag5', 'TGI MAG5', 'required');
            $this->form_validation->set_rules('tgi_mag6', 'TGI MAG6', 'required');
            $this->form_validation->set_rules('tgi_mag7', 'TGI MAG7', 'required');
            $this->form_validation->set_rules('tgi_mag8', 'TGI MAG8', 'required');
            $this->form_validation->set_rules('tgi_mag9', 'TGI MAG9', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            $this->index();
        } else {
            // Check if we already have a pasien ID in session
            $id_pasien = $this->Mod_darah->add_pasien([
                'nik' => $nik,
                'tinggi' => $tinggi,
                'berat' => $berat,
            ]);

            date_default_timezone_set('Asia/Jakarta');
            $ins_time = date('Y-m-d H:i:s', time());

            $data = array(
                'id_pasien' => $id_pasien,
                'ins_time'  => $ins_time
            );

            if ($alat == 'suntik') {
                $data += array(
                    'glukosa' => $this->input->post('glukosa'),
                    'spo2' => $this->input->post('spo2'),
                    'kolesterol' => $this->input->post('kolesterol'),
                    'asam_urat' => $this->input->post('asam_urat')
                );
                $this->Mod_darah->add_suntik($data);
            } elseif ($alat == 'asamUrat') {
                $data += array(
                    'manual' => $this->input->post('asam_manual'),
                    'violet' => $this->input->post('asam_violet'),
                    'blue' => $this->input->post('asam_blue'),
                    'green' => $this->input->post('asam_green'),
                    'yellow' => $this->input->post('asam_yellow'),
                    'orange' => $this->input->post('asam_orange'),
                    'red' => $this->input->post('asam_red')
                );
                $this->Mod_darah->add_asam_urat($data);
            } elseif ($alat == 'kolesterol') {
                $data += array(
                    'manual' => $this->input->post('kolesterol_manual'),
                    'violet' => $this->input->post('kolesterol_violet'),
                    'blue' => $this->input->post('kolesterol_blue'),
                    'green' => $this->input->post('kolesterol_green'),
                    'yellow' => $this->input->post('kolesterol_yellow'),
                    'orange' => $this->input->post('kolesterol_orange'),
                    'red' => $this->input->post('kolesterol_red')
                );
                $this->Mod_darah->add_kolesterol($data);
            } elseif ($alat == 'glukosa') {
                $data += array(
                    'nilai_glukosa' => $this->input->post('gula_darah')
                );
                $this->Mod_darah->add_glukosa($data);
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

            $this->session->set_flashdata('success', true);
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

    public function get_asam_urat_data($id)
    {
        // Ambil data asam berdasarkan ID
        $data_asam = $this->Auk_model->get_asamurat($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_asam);
    }

    public function get_kolesterol_data($id)
    {
        // Ambil data kolesterol berdasarkan ID
        $data_kolesterol = $this->Auk_model->get_kolesterol($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_kolesterol);
    }

    public function get_glukosa_data($id)
    {
        // Ambil data glukosa berdasarkan ID
        $data_glukosa = $this->Glukosa_model->get_glukosa($id);

        // Kirimkan data sebagai JSON response
        echo json_encode($data_glukosa);
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
