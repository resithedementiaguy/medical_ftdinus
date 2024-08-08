<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiEndpoint extends CI_Controller
{

    private $data = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('data_view');
    }
}
