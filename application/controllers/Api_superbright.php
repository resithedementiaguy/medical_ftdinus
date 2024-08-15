<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_superbright extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Superbright_model');
        $this->load->library('form_validation');
        header('Content-Type: application/json');
    }

    public function create()
    {
        // Ambil konten JSON dari body request
        $json_data = json_decode($this->input->raw_input_stream, true);

        // Set aturan validasi
        $this->form_validation->set_data($json_data);
        $this->form_validation->set_rules('id_pasien', 'ID Pasien', 'required');
        $this->form_validation->set_rules('ins_time', 'Insert Time', 'required');

        // Jalankan validasi
        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('error' => validation_errors()));
        } else {
            // Data yang valid, simpan ke database
            $data = array(
                'id_pasien' => $json_data['id_pasien'],
                'ins_time' => $json_data['ins_time'],
                'sb1' => isset($json_data['sb1']) ? implode(' ', $json_data['sb1']) : null,
                'sb2' => isset($json_data['sb2']) ? implode(' ', $json_data['sb2']) : null,
                'sb3' => isset($json_data['sb3']) ? implode(' ', $json_data['sb3']) : null,
                'sb4' => isset($json_data['sb4']) ? implode(' ', $json_data['sb4']) : null,
                'sb5' => isset($json_data['sb5']) ? implode(' ', $json_data['sb5']) : null,
                'sb6' => isset($json_data['sb6']) ? implode(' ', $json_data['sb6']) : null,
                'sb7' => isset($json_data['sb7']) ? implode(' ', $json_data['sb7']) : null,
                'sb8' => isset($json_data['sb8']) ? implode(' ', $json_data['sb8']) : null,
                'sb9' => isset($json_data['sb9']) ? implode(' ', $json_data['sb9']) : null,
                'sb10' => isset($json_data['sb10']) ? implode(' ', $json_data['sb10']) : null
            );

            if ($this->Superbright_model->create_superbright($data)) {
                echo json_encode(array('status' => 'Data created'));
            } else {
                echo json_encode(array('status' => 'Failed to create data'));
            }
        }
    }

    public function update($id_superbright)
    {
        // Ambil konten JSON dari body request
        $json_data = json_decode($this->input->raw_input_stream, true);

        // Set aturan validasi
        $this->form_validation->set_data($json_data);
        $this->form_validation->set_rules('ins_time', 'Insert Time', 'required');

        // Jalankan validasi
        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('error' => validation_errors()));
        } else {
            // Data yang valid, perbarui di database
            $data = array(
                'ins_time' => $json_data['ins_time'],
                'sb1' => $json_data['sb1'],
                'sb2' => $json_data['sb2'],
                'sb3' => $json_data['sb3'],
                'sb4' => $json_data['sb4'],
                'sb5' => $json_data['sb5'],
            );

            if ($this->Superbright_model->update_superbright($id_superbright, $data)) {
                echo json_encode(array('status' => 'Data updated'));
            } else {
                echo json_encode(array('status' => 'Failed to update data'));
            }
        }
    }

    // You can add more methods for retrieving, updating, and deleting data as needed
}
