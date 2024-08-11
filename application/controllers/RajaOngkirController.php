<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RajaOngkirController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('RajaOngkir');
    }

    public function get_provinces()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-Requested-With");
        header('Content-Type: application/json');

        $provinces = $this->rajaongkir->getProvinces();
        echo json_encode($provinces);
    }


    public function get_cities($province_id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-Requested-With");
        header('Content-Type: application/json');

        $cities = $this->rajaongkir->getCities($province_id);
        echo json_encode($cities);
    }
}
