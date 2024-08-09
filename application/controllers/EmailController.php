<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPMailer_lib');
    }

    public function send_email($to, $subject, $body)
    {
        $result = $this->phpmailer_lib->send_email($to, $subject, $body);
        echo $result;
    }
}
