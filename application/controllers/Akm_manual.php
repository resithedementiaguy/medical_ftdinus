<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akm_manual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_darah');
        $this->load->model('Mod_periksa');
        $this->load->model('Ultrasound_model');
        $this->load->model('Superbright_model');
        $this->load->model('Magnetik_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session'); // Load session library
        $this->check_login(); // Ensure user is logged in
    }

    private function check_login()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page if not logged in
            redirect('auth');
        }
    }

    public function index()
    {
        $data['ktp'] = $this->Mod_periksa->get_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/akm_manual', $data);
        $this->load->view('partials/footer');
    }

    public function get_nama_by_nik()
    {
        $nik = $this->input->post('nik');
        $nama = $this->Mod_periksa->get_nama_by_nik($nik);
        echo json_encode($nama);
    }

    public function add_manual()
    {
        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s', time());
        $data = array(
            'tgl_periksa' => $ins_time,
            'nik' => $this->input->post('nik_manual'),
            'nama' => $this->input->post('nama_manual'),
            'sistol' => $this->input->post('sistol_manual'),
            'diastol' => $this->input->post('diastol_manual'),
            'tinggi_bdn' => $this->input->post('tinggi_manual'),
            'berat_bdn' => $this->input->post('berat_manual'),
            'glukosa' => $this->input->post('glukosa_manual'),
            'asam_urat' => $this->input->post('asam_urat_manual'),
            'kolesterol' => $this->input->post('kolesterol_manual')
        );

        $result = $this->Mod_periksa->add_manual($data);
        echo json_encode(['success' => true]);
    }

    public function add_akm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s', time());
        $data = array(
            'tgl_periksa' => $ins_time,
            'nik' => $this->input->post('nik_akm'),
            'nama' => $this->input->post('nama_akm'),
            'sistol' => $this->input->post('sistol_akm'),
            'diastol' => $this->input->post('diastol_akm'),
            'tinggi_bdn' => $this->input->post('tinggi_akm'),
            'berat_bdn' => $this->input->post('berat_akm'),
            'glukosa' => $this->input->post('glukosa_akm')
        );

        $result = $this->Mod_periksa->add_akm($data);
        echo json_encode(['success' => true]);
    }

    public function get_keterangan_glukosa_manual()
    {
        $glukosa = $this->input->post('glukosa');
        $response = [
            'keterangan' => '',
            'status' => '' // Status warna: normal, warning, danger
        ];

        if ($glukosa < 70) {
            $response['keterangan'] = 'Glukosa terlalu rendah (Hipoglikemia)';
            $response['status'] = 'danger';
        } elseif ($glukosa >= 70 && $glukosa <= 140) {
            $response['keterangan'] = 'Glukosa normal';
            $response['status'] = 'normal';
        } elseif ($glukosa > 140 && $glukosa <= 199) {
            $response['keterangan'] = 'Glukosa tinggi (Pra-diabetes)';
            $response['status'] = 'warning';
        } elseif ($glukosa >= 200) {
            $response['keterangan'] = 'Glukosa sangat tinggi (Diabetes)';
            $response['status'] = 'danger';
        }

        echo json_encode($response);
    }

    public function get_keterangan_asamurat_manual()
    {
        $asam_urat = $this->input->post('asam_urat');
        $response = [
            'keterangan' => '',
            'status' => '' // Status warna: normal, warning, danger
        ];

        // Nilai referensi untuk asam urat berdasarkan standar umum
        if ($asam_urat < 3.5) {
            $response['keterangan'] = 'Asam urat terlalu rendah';
            $response['status'] = 'danger';
        } elseif ($asam_urat >= 3.5 && $asam_urat <= 7.2) {
            $response['keterangan'] = 'Asam urat normal';
            $response['status'] = 'normal';
        } elseif ($asam_urat > 7.2) {
            $response['keterangan'] = 'Asam urat tinggi (Hiperurisemia)';
            $response['status'] = 'danger';
        }

        echo json_encode($response);
    }


}
