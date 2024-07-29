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
        $data['ktp']= $this->Mod_darah->get_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/analisis_darah',$data);
        $this->load->view('partials/footer');
    }

    public function get_nama() {
        $nik = $this->input->post('nik');
        $nama = $this->Mod_darah->get_nama_by_nik($nik);
        echo json_encode($nama);
    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('glukosa', 'Glukosa', 'required');
        $this->form_validation->set_rules('hb', 'hb', 'required');
        $this->form_validation->set_rules('spo2', 'SPO2', 'required');
        $this->form_validation->set_rules('kolesterol', 'Kolesterol', 'required');
        $this->form_validation->set_rules('asam_urat', 'Asam Urat', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('analisis_darah');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'glukosa' => $this->input->post('glukosa'),
                'hb' => $this->input->post('hb'),
                'spo2' => $this->input->post('spo2'),
                'kolesterol' => $this->input->post('kolesterol'),
                'asam_urat' => $this->input->post('asam_urat'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->Mod_darah->add_medical($data);
            redirect('analisis_darah');
        }
    }
}
