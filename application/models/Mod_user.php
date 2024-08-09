<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row();
    }
}
