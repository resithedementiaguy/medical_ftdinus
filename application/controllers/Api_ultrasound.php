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
        $this->form_validation->set_rules('id_pasien', 'ID Pasien', 'required');
        $this->form_validation->set_rules('ins_time', 'Insert Time', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('error' => validation_errors()));
        } else {
            $data = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'ins_time' => $this->input->post('ins_time'),
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

            if ($this->Ultrasound_model->create_ultrasound($data)) {
                echo json_encode(array('status' => 'Data created'));
            } else {
                echo json_encode(array('status' => 'Failed to create data'));
            }
        }
    }

    // You can add more methods for retrieving, updating, and deleting data as needed
}
