<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_ultrasound extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ultrasound_model');
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
                'us1' => isset($json_data['us1']) ? implode(' ', $json_data['us1']) : null,
                'us2' => isset($json_data['us2']) ? implode(' ', $json_data['us2']) : null,
                'us3' => isset($json_data['us3']) ? implode(' ', $json_data['us3']) : null,
                'us4' => isset($json_data['us4']) ? implode(' ', $json_data['us4']) : null,
                'us5' => isset($json_data['us5']) ? implode(' ', $json_data['us5']) : null,
                'us6' => isset($json_data['us6']) ? implode(' ', $json_data['us6']) : null,
                'us7' => isset($json_data['us7']) ? implode(' ', $json_data['us7']) : null,
                'us8' => isset($json_data['us8']) ? implode(' ', $json_data['us8']) : null,
                'us9' => isset($json_data['us9']) ? implode(' ', $json_data['us9']) : null,
                'us10' => isset($json_data['us10']) ? implode(' ', $json_data['us10']) : null
            );

            if ($this->Ultrasound_model->create_ultrasound($data)) {
                echo json_encode(array('status' => 'Data created'));
            } else {
                echo json_encode(array('status' => 'Failed to create data'));
            }
        }
    }

    public function update($id_ultrasound)
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
                'us1' => isset($json_data['us1']) ? implode(' ', $json_data['us1']) : null,
                'us2' => isset($json_data['us2']) ? implode(' ', $json_data['us2']) : null,
                'us3' => isset($json_data['us3']) ? implode(' ', $json_data['us3']) : null,
                'us4' => isset($json_data['us4']) ? implode(' ', $json_data['us4']) : null,
                'us5' => isset($json_data['us5']) ? implode(' ', $json_data['us5']) : null,
                'us6' => isset($json_data['us6']) ? implode(' ', $json_data['us6']) : null,
                'us7' => isset($json_data['us7']) ? implode(' ', $json_data['us7']) : null,
                'us8' => isset($json_data['us8']) ? implode(' ', $json_data['us8']) : null,
                'us9' => isset($json_data['us9']) ? implode(' ', $json_data['us9']) : null,
                'us10' => isset($json_data['us10']) ? implode(' ', $json_data['us10']) : null
            );

            if ($this->Ultrasound_model->update_ultrasound($id_ultrasound, $data)) {
                echo json_encode(array('status' => 'Data updated'));
            } else {
                echo json_encode(array('status' => 'Failed to update data'));
            }
        }
    }

    // You can add more methods for retrieving, updating, and deleting data as needed
}
