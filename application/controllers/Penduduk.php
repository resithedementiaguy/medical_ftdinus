<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
    }

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk');
        $this->load->view('partials/footer');
    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        //$this->form_validation->set_rules('foto', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('penduduk');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'kode_pos' => $this->input->post('kode_pos'),
                'status_perkawinan' => $this->input->post('status_perkawinan')
            );
            $this->Mod_penduduk->add_penduduk($data);
            redirect('penduduk');
        }
    }

    
}
