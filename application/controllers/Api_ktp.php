<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_ktp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ktp_model');
        $this->load->library('form_validation');
        header('Content-Type: application/json');
    }

    public function get()
    {
        $data = $this->Ktp_model->get_ktp();
        echo json_encode($data);
    }

    public function suggest_nik()
    {
        // Validasi input
        $this->form_validation->set_data($this->input->get());
        $this->form_validation->set_rules('q', 'Query', 'required|min_length[3]');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kirimkan respon error
            echo json_encode([
                'status' => 'error',
                'message' => validation_errors()
            ]);
            return;
        }

        // Ambil input pencarian
        $query = $this->input->get('q');

        // Query untuk mencari NIK yang mirip
        $suggestions = $this->Ktp_model->suggest_nik($query);

        // Mengembalikan hasil dalam bentuk JSON
        echo json_encode($suggestions);
    }

    public function get_by_nik($nik)
    {
        $data = $this->Ktp_model->get_ktp_by_nik($nik);
        echo json_encode($data);
    }
}
