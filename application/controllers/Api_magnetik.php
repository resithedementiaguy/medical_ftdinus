<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Api_magnetik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Magnetik_model');
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

            if ($this->magnetik_model->create_magnetik($data)) {
                echo json_encode(array('status' => 'Data created'));
            } else {
                echo json_encode(array('status' => 'Failed to create data'));
            }
        }
    }

    public function update($id_magnetik)
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
            'jtg_mag1' => $json_data['jtg_mag1'],
            'jtg_mag2' => $json_data['jtg_mag2'],
            'jtg_mag3' => $json_data['jtg_mag3'],
            'jtg_mag4' => $json_data['jtg_mag4'],
            'jtg_mag5' => $json_data['jtg_mag5'],
            'srf_mag1' => $json_data['srf_mag1'],
            'srf_mag2' => $json_data['srf_mag2'],
            'srf_mag3' => $json_data['srf_mag3'],
            'srf_mag4' => $json_data['srf_mag4'],
            'srf_mag5' => $json_data['srf_mag5'],
            'drh_mag1' => $json_data['drh_mag1'],
            'drh_mag2' => $json_data['drh_mag2'],
            'drh_mag3' => $json_data['drh_mag3'],
            'drh_mag4' => $json_data['drh_mag4'],
            'drh_mag5' => $json_data['drh_mag5'],
            'sel_mag1' => $json_data['sel_mag1'],
            'sel_mag2' => $json_data['sel_mag2'],
            'sel_mag3' => $json_data['sel_mag3'],
            'sel_mag4' => $json_data['sel_mag4'],
            'sel_mag5' => $json_data['sel_mag5'],
            'tgi_mag1' => $json_data['tgi_mag1'],
            'tgi_mag2' => $json_data['tgi_mag2'],
            'tgi_mag3' => $json_data['tgi_mag3'],
            'tgi_mag4' => $json_data['tgi_mag4'],
            'tgi_mag5' => $json_data['tgi_mag5']
        );

        if ($this->Magnetik_model->update_magnetik($id_magnetik, $data)) {
            echo json_encode(array('status' => 'Data updated'));
        } else {
            echo json_encode(array('status' => 'Failed to update data'));
        }
    }
}


    // You can add more methods for retrieving, updating, and deleting data as needed
}
