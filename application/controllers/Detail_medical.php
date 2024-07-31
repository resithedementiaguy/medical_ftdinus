<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_medical extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('frontend/view_penduduk');
        $this->load->view('partials/footer');
    }
}
