<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_glukosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Glukosa_model');
        $this->load->library('form_validation');
        header('Content-Type: application/json');
    }

    public function update($id_glukosa)
    {
        // Ambil input JSON
        $json_data = json_decode($this->input->raw_input_stream, true);

        if (!$json_data) {
            echo json_encode(['status' => 'Invalid JSON input']);
            return;
        }

        // Validasi manual tanpa form_validation
        if (!isset($json_data['ins_time']) || !isset($json_data['glukosa'])) {
            echo json_encode(['status' => 'Missing required fields']);
            return;
        }

        // Siapkan data untuk update
        $data = array(
            'ins_time' => $json_data['ins_time'],
            'nilai_glukosa' => $json_data['glukosa']
        );

        // Update ke database
        if ($this->Glukosa_model->update_glukosa($id_glukosa, $data)) {
            echo json_encode(['status' => 'Data updated']);
        } else {
            echo json_encode(['status' => 'Failed to update data']);
        }
    }
}
