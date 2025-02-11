<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_kolesterol extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auk_model');
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
                'violet' => isset($json_data['violet']) ? implode(' ', $json_data['violet']) : null,
                'blue' => isset($json_data['blue']) ? implode(' ', $json_data['blue']) : null,
                'green' => isset($json_data['green']) ? implode(' ', $json_data['green']) : null,
                'yellow' => isset($json_data['yellow']) ? implode(' ', $json_data['yellow']) : null,
                'orange' => isset($json_data['orange']) ? implode(' ', $json_data['orange']) : null,
                'red' => isset($json_data['red']) ? implode(' ', $json_data['red']) : null
            );

            if ($this->Auk_model->create_kolesterol($data)) {
                echo json_encode(array('status' => 'Data created'));
            } else {
                echo json_encode(array('status' => 'Failed to create data'));
            }
        }
    }

    public function update($id_auk)
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
                'violet' => isset($json_data['violet']) ? implode(' ', $json_data['violet']) : null,
                'blue' => isset($json_data['blue']) ? implode(' ', $json_data['blue']) : null,
                'green' => isset($json_data['green']) ? implode(' ', $json_data['green']) : null,
                'yellow' => isset($json_data['yellow']) ? implode(' ', $json_data['yellow']) : null,
                'orange' => isset($json_data['orange']) ? implode(' ', $json_data['orange']) : null,
                'red' => isset($json_data['red']) ? implode(' ', $json_data['red']) : null
            );

            if ($this->Auk_model->update_kolesterol($id_auk, $data)) {
                echo json_encode(array('status' => 'Data updated'));
            } else {
                echo json_encode(array('status' => 'Failed to update data'));
            }
        }
    }

    // You can add more methods for retrieving, updating, and deleting data as needed
}
