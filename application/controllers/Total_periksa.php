<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_periksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_pasien');
        $this->load->model('Ultrasound_model');
        $this->load->model('Superbright_model');
        $this->load->model('Magnetik_model');
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
        $data['pasien_list'] = $this->Mod_pasien->get_all_pasien();
        $data['total_recap'] = $this->Mod_pasien->get_total_recap();
        $data['daftar_periksa'] = $this->Mod_pasien->get_manual_akm();
        $this->load->view('partials/header');
        $this->load->view('frontend/total_periksa/view', $data);
        $this->load->view('partials/footer');
    }

    public function calculate_percentage_by_date()
{
    $start_date = $this->input->post('startDate');
    $end_date = $this->input->post('endDate');
    $range = $this->input->post('range');

    $this->load->model('Mod_pasien');
    $data = $this->Mod_pasien->get_filtered_data($start_date, $end_date);

    // Menghitung persentase berdasarkan data
    $total_diff = count($data);

    $minus_diff_sistol = $lebih_diff_sistol = $tepat_diff_sistol = 0;
    $minus_diff_diastol = $lebih_diff_diastol = $tepat_diff_diastol = 0;
    $minus_diff_tinggi_bdn = $lebih_diff_tinggi_bdn = $tepat_diff_tinggi_bdn = 0;
    $minus_diff_berat_bdn = $lebih_diff_berat_bdn = $tepat_diff_berat_bdn = 0;
    $minus_diff_glukosa = $lebih_diff_glukosa = $tepat_diff_glukosa = 0;

    foreach ($data as $pasien) {
        // Menghitung persentase diff_sistol
        if ($pasien->diff_sistol < -$range) {
            $minus_diff_sistol++;
        } elseif ($pasien->diff_sistol > $range) {
            $lebih_diff_sistol++;
        } else {
            $tepat_diff_sistol++;
        }

        // Menghitung persentase diff_diastol
        if ($pasien->diff_diastol < -$range) {
            $minus_diff_diastol++;
        } elseif ($pasien->diff_diastol > $range) {
            $lebih_diff_diastol++;
        } else {
            $tepat_diff_diastol++;
        }

        // Menghitung persentase diff_tinggi_bdn
        if ($pasien->diff_tinggi_bdn < -$range) {
            $minus_diff_tinggi_bdn++;
        } elseif ($pasien->diff_tinggi_bdn > $range) {
            $lebih_diff_tinggi_bdn++;
        } else {
            $tepat_diff_tinggi_bdn++;
        }

        // Menghitung persentase diff_berat_bdn
        if ($pasien->diff_berat_bdn < -$range) {
            $minus_diff_berat_bdn++;
        } elseif ($pasien->diff_berat_bdn > $range) {
            $lebih_diff_berat_bdn++;
        } else {
            $tepat_diff_berat_bdn++;
        }

        // Menghitung persentase diff_glukosa
        if ($pasien->diff_glukosa < -$range) {
            $minus_diff_glukosa++;
        } elseif ($pasien->diff_glukosa > $range) {
            $lebih_diff_glukosa++;
        } else {
            $tepat_diff_glukosa++;
        }
    }

    // Menghitung persentase
    $persentase = [
        'sistol_minus' => ($total_diff > 0) ? ((($minus_diff_sistol / $total_diff) * 100)) : 0,
        'sistol_lebih' => ($total_diff > 0) ? ((($lebih_diff_sistol / $total_diff) * 100)) : 0,
        'sistol_tepat' => ($total_diff > 0) ? ((($tepat_diff_sistol / $total_diff) * 100)) : 0,
        'diastol_minus' => ($total_diff > 0) ? ((($minus_diff_diastol / $total_diff) * 100)) : 0,
        'diastol_lebih' => ($total_diff > 0) ? ((($lebih_diff_diastol / $total_diff) * 100)) : 0,
        'diastol_tepat' => ($total_diff > 0) ? ((($tepat_diff_diastol / $total_diff) * 100)) : 0,
        'tinggi_bdn_minus' => ($total_diff > 0) ? ((($minus_diff_tinggi_bdn / $total_diff) * 100)) : 0,
        'tinggi_bdn_lebih' => ($total_diff > 0) ? ((($lebih_diff_tinggi_bdn / $total_diff) * 100)) : 0,
        'tinggi_bdn_tepat' => ($total_diff > 0) ? ((($tepat_diff_tinggi_bdn / $total_diff) * 100)) : 0,
        'berat_bdn_minus' => ($total_diff > 0) ? ((($minus_diff_berat_bdn / $total_diff) * 100)) : 0,
        'berat_bdn_lebih' => ($total_diff > 0) ? ((($lebih_diff_berat_bdn / $total_diff) * 100)) : 0,
        'berat_bdn_tepat' => ($total_diff > 0) ? ((($tepat_diff_berat_bdn / $total_diff) * 100)) : 0,
        'glukosa_minus' => ($total_diff > 0) ? ((($minus_diff_glukosa / $total_diff) * 100)) : 0,
        'glukosa_lebih' => ($total_diff > 0) ? ((($lebih_diff_glukosa / $total_diff) * 100)) : 0,
        'glukosa_tepat' => ($total_diff > 0) ? ((($tepat_diff_glukosa / $total_diff) * 100)) : 0,
    ];

    echo json_encode($persentase);
}
}