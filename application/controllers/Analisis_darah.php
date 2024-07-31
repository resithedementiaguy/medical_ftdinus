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
        } elseif ($alat == 'ultraSound') {
            $this->form_validation->set_rules('us1', 'Ultrasound1', 'required');
        } elseif ($alat == 'superBright') {
            $this->form_validation->set_rules('sb1', 'Superbright1', 'required');
        } elseif ($alat == 'magnetik') {
            $this->form_validation->set_rules('mag1', 'Magnetik1', 'required');
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
                    'asam_urat' => $this->input->post('asam_urat'),
                    'keterangan' => $this->input->post('keterangan')
                );
                $this->Mod_darah->add_suntik($data);
            } elseif ($alat == 'ultraSound') {
                $data += array('us1' => $this->input->post('us1'));
                $this->Mod_darah->add_ultrasound($data);
            } elseif ($alat == 'superBright') {
                $data += array('sb1' => $this->input->post('sb1'));
                $this->Mod_darah->add_superbright($data);
            } elseif ($alat == 'magnetik') {
                $data += array('mag1' => $this->input->post('mag1'));
                $this->Mod_darah->add_magnetik($data);
            }

            redirect('analisis_darah');
        }
    }
}
