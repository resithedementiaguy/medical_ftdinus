<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update_email($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('email', $data);
    }

    public function get_email($id)
    {
        $query = $this->db->get_where('email', ['id' => $id]);
        return $query->row();
    }
}
