<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis_darah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_darah');
    }

    public function index()
    {
        $data['ktp'] = $this->Mod_darah->get_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/analisis_darah', $data);
        $this->load->view('partials/footer');
    }

    public function get_nama()
    {
        $nik = $this->input->post('nik');
        $nama = $this->Mod_darah->get_nama_by_nik($nik);
        echo json_encode($nama);
    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $alat = $this->input->post('alat');
        $this->form_validation->set_rules('nik', 'NIK', 'required');

        if ($alat == 'suntik') {
            $this->form_validation->set_rules('glukosa', 'Glukosa', 'required');
            $this->form_validation->set_rules('hb', 'HB', 'required');
            $this->form_validation->set_rules('spo2', 'SPO2', 'required');
            $this->form_validation->set_rules('kolesterol', 'Kolesterol', 'required');
            $this->form_validation->set_rules('asam_urat', 'Asam Urat', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan error
            $this->index();
        } else {
            $data = array('nik' => $this->input->post('nik'));

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

            redirect('analisis_darah');
        }
    }
}
