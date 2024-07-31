<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
    }

    public function index()
    {
        $data['ktp'] = $this->Mod_darah->get_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk', $data);
        $this->load->view('partials/footer');
    }
}
