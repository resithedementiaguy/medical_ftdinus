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

    public function update_email()
    {
        // Set validation rules
        $this->form_validation->set_rules('host', 'Host', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            // If validation fails, reload the form with validation errors
            $this->index();
        } else {
            // Collect form data
            $id = $this->input->post('id');
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
                // Redirect or show success message
                $this->session->set_flashdata('success', 'Email configuration updated successfully.');
                redirect('settings');
            } else {
                // Show error message
                $this->session->set_flashdata('error', 'Failed to update email configuration.');
                redirect('settings');
            }
        }
    }
}
