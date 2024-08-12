<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_email');
        $this->load->library('PHPMailer_lib');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->check_login();
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
        $data['penduduk'] = $this->Mod_penduduk->get_all_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk/add_penduduk');
        $this->load->view('partials/footer');
    }

    public function edit($id)
    {
        $data['penduduk'] = $this->Mod_penduduk->get_penduduk_by_id($id);

        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk/edit_penduduk', $data);
        $this->load->view('partials/footer');
    }

    public function add()
    {
        // Set validation rules for all form fields
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('penduduk');
        } else {
            // Collect form data
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'pembuat' => $this->input->post('pembuat'),
                'umur' => $this->input->post('umur')
            );
            // Add the new resident to the database
            $this->Mod_penduduk->add_penduduk($data);

            // Ambil subject dan body dari database
            $data = $this->Mod_email->get_email(1);
            $subject = $data->subject;
            $body = $data->body;

            // Kirim email
            $to = $this->input->post('email');
            $result = $this->phpmailer_lib->send_email($to, $subject, $body);

            if ($result !== 'Message has been sent') {
                echo "Error sending email: " . $result;
            } else {
                redirect('penduduk');
            }
        }
    }

    public function update($id)
    {
        // Set validation rules for all form fields
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembalikan ke halaman edit dengan pesan kesalahan
            $this->edit($id);
        } else {
            // Jika validasi berhasil, lakukan update data
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'umur' => $this->input->post('umur')
            );
            $this->Mod_penduduk->update_penduduk($id, $data);
            redirect('pasien');
        }
    }
}
