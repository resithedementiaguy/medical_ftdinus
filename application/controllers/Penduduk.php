<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->library('form_validation');
        $this->load->helper('form');
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
            redirect('penduduk');
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
