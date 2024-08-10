<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_user');
        $this->load->model('Mod_email');
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
        // Ambil user_id dari sesi
        $user_id = $this->session->userdata('user_id');

        // Ambil data email dan pengguna dari model
        $data['email'] = $this->Mod_email->get_email(1);
        $data['user'] = $this->Mod_user->get_user($user_id);

        // Muat tampilan
        $this->load->view('partials/header');
        $this->load->view('frontend/settings', $data);
        $this->load->view('partials/footer');
    }

    public function update_email($id)
    {
        // Set validation rules
        $this->form_validation->set_rules('host', 'Host', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            // If validation fails, return validation errors as JSON
            $errors = validation_errors();
            echo json_encode(['status' => 'error', 'message' => $errors]);
        } else {
            // Collect form data
            $data = array(
                'host' => $this->input->post('host'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'subject' => $this->input->post('subject'),
                'body' => $this->input->post('body')
            );

            // Update email configuration
            if ($this->Mod_email->update_email($id, $data)) {
                // Return success response
                echo json_encode(['status' => 'success', 'message' => 'Email configuration updated successfully.']);
            } else {
                // Return error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update email configuration.']);
            }
        }
    }

    public function update_user($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, muat kembali tampilan dengan pesan error
            $data['user'] = $this->Mod_user->get_user($id); // Mengambil data pengguna dengan ID dari parameter
            $this->load->view('partials/header');
            $this->load->view('frontend/settings/profile', $data);
            $this->load->view('partials/footer');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');

            // Siapkan data untuk diupdate
            $data = [
                'username' => $username,
                'nama' => $nama
            ];

            // Periksa apakah password baru diisi dan cocok
            if (!empty($password1) && $password1 === $password2) {
                $data['password'] = sha1('jksdhf832746aiH{}{()&(*&(*' . MD5($password1) . 'HdfevgyDDw{}{}{;;*766&*&*');
            }

            // Update data pengguna di database
            if ($this->Mod_user->update_user($id, $data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
            }

            // Redirect ke halaman profil atau halaman lain yang sesuai
            redirect('settings');
        }
    }
}
