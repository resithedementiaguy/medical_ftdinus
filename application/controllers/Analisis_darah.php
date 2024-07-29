<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis_darah extends CI_Controller
{

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('frontend/analisis_darah');
        $this->load->view('partials/footer');
    }
}
