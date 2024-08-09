<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->library('PHPMailer_lib');
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
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
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
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi')
            );
            // Add the new resident to the database
            $this->Mod_penduduk->add_penduduk($data);

            // Kirim email
            $to = $this->input->post('email');
            $subject = "Pendaftaran Anda Berhasil";
            $body = "<h1>Terima Kasih Telah Mendaftar</h1>
            <p>Data Anda telah tersimpan di sistem kami. Kami sangat menghargai waktu Anda dan ingin memastikan bahwa proses pemeriksaan berjalan dengan lancar.</p>

            <p>Berdasarkan data yang Anda berikan, kami telah menjadwalkan pemeriksaan Anda sebagai berikut:</p>

            <ul>
                <li><strong>Tempat:</strong> Klinik Sehat Selalu, Jl. Sehat No. 123, Jakarta</li>
                <li><strong>Tanggal:</strong> 15 Agustus 2024</li>
                <li><strong>Waktu:</strong> 09:00 - 11:00 WIB</li>
            </ul>

            <p>Mohon hadir tepat waktu sesuai dengan jadwal yang telah ditentukan. Jika ada perubahan atau pertanyaan lebih lanjut, silakan hubungi kami melalui email ini atau nomor telepon yang tersedia di bawah.</p>

            <p>Terima kasih atas kepercayaan Anda. Kami berharap dapat memberikan pelayanan terbaik untuk Anda.</p>

            <p>Salam hangat,<br>
            Klinik Sehat Selalu</p>

            <p><em>Note: Harap membawa dokumen identitas dan hasil pemeriksaan sebelumnya (jika ada) saat datang ke klinik.</em></p>";

            $result = $this->phpmailer_lib->send_email($to, $subject, $body);
            if ($result !== 'Message has been sent') {
                echo "Error sending email: " . $result;
            } else {
                redirect('penduduk');
            }
        }
    }

    public function send_email($to, $subject, $body)
    {
        $result = $this->phpmailer_lib->send_email($to, $subject, $body);
        echo $result;
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
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
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
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi')
            );
            $this->Mod_penduduk->update_penduduk($id, $data);
            redirect('penduduk/edit/' . $id);
        }
    }
}
