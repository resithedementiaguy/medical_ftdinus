<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pasien extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Function Pasien
    public function get_all_pasien()
    {
        $this->db->select('ktp.*, pasien.nik AS pasien_nik');
        $this->db->from('ktp');
        $this->db->join('pasien', 'ktp.nik = pasien.nik', 'left');
        $this->db->group_by('ktp.nik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pasien_detail($nik)
    {
        $this->db->select('pasien.id as pasien_id, pasien.nik AS pasien_nik, ktp.id as ktp_id, ktp.nik, ktp.nama, ktp.alamat, ktp.tempat_lahir, ktp.tanggal_lahir, ktp.jenis_kelamin, ktp.kelurahan, ktp.kecamatan, ktp.kota, ktp.email, ktp.no_hp, pasien.tinggi, pasien.berat');
        $this->db->from('ktp');
        $this->db->join('pasien', 'pasien.nik = ktp.nik', 'left');
        $this->db->where('ktp.nik', $nik);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_antropometri($nik)
    {
        $this->db->select('id as pasien_id, nik, tinggi, berat, STR_TO_DATE(ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        $this->db->from('pasien');
        $this->db->where('nik', $nik);
        $this->db->order_by("ins_time_datetime", 'DESC');
        $this->db->limit(5);
        
        $query = $this->db->get();
        return $query->result();
    }

    // Function Suntik
    public function get_suntik($nik)
    {
        $this->db->select('suntik.*, pasien.id as pasien_id, pasien.nik, STR_TO_DATE(suntik.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        $this->db->from('pasien');
        $this->db->join('suntik', 'suntik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $this->db->order_by("ins_time_datetime", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_suntik_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('suntik');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_suntik($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('suntik', $data);
    }

    // Function Ultrasound
    public function get_ultrasound($nik)
    {
        $this->db->select('ultrasound.*, pasien.id as pasien_id, pasien.nik, STR_TO_DATE(ultrasound.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        $this->db->from('pasien');
        $this->db->join('ultrasound', 'ultrasound.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $this->db->order_by("ins_time_datetime", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_ultrasound($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ultrasound', $data);
    }

    public function get_ultrasound_id($id)
    {
        $this->db->select('*');
        $this->db->from('ultrasound');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Function Super Bright
    public function get_superbright($nik)
    {
        $this->db->select('superbright.*, pasien.id as pasien_id, pasien.nik, STR_TO_DATE(superbright.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        $this->db->from('pasien');
        $this->db->join('superbright', 'superbright.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $this->db->order_by("ins_time_datetime", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_superbright($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('superbright', $data);
    }

    public function get_superbright_id($id)
    {
        $this->db->select('*');
        $this->db->from('superbright');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Function Magnetik
    public function get_magnetik($nik)
    {
        $this->db->select('magnetik.*, pasien.id as pasien_id, pasien.nik, STR_TO_DATE(magnetik.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        $this->db->from('pasien');
        $this->db->join('magnetik', 'magnetik.id_pasien = pasien.id', 'left');
        $this->db->where('pasien.nik', $nik);
        $this->db->order_by("ins_time_datetime", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_magnetik($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('magnetik', $data);
    }

    public function get_magnetik_id($id)
    {
        $this->db->select('*');
        $this->db->from('magnetik');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_suntik_dashboard() {
        // Select fields
        $this->db->select('ktp.nama, ktp.nik, STR_TO_DATE(suntik.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        
        // Join tables
        $this->db->from('suntik');
        $this->db->join('pasien', 'suntik.id_pasien = pasien.id');
        $this->db->join('ktp', 'pasien.nik = ktp.nik');
        $this->db->order_by("ins_time_datetime", 'DESC');
        // Limit the number of results
        $this->db->limit(3);
        

        // Execute query
        $query = $this->db->get();
        
        // Return results
        return $query->result();
    }

    public function count_suntik_dashboard() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_suntik');
        $query_pasien = $this->db->get('suntik');
        $total_pasien = $query_pasien->row()->total_suntik;

        // Return the total
        return $total_pasien;
        
    }

    public function get_ultrasound_dashboard() {
        // Select fields
        $this->db->select('ktp.nama, ktp.nik, STR_TO_DATE(ultrasound.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        
        // Join tables
        $this->db->from('ultrasound');
        $this->db->join('pasien', 'ultrasound.id_pasien = pasien.id');
        $this->db->join('ktp', 'pasien.nik = ktp.nik');
        $this->db->order_by("ins_time_datetime", 'DESC');
        // Limit the number of results
        $this->db->limit(3);
        

        // Execute query
        $query = $this->db->get();
        
        // Return results
        return $query->result();
    }

    public function count_ultrasound_dashboard() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_ultrasound');
        $query_pasien = $this->db->get('ultrasound');
        $total_pasien = $query_pasien->row()->total_ultrasound;

        // Return the total
        return $total_pasien;
        
    }

    public function get_superbright_dashboard() {
        // Select fields
        $this->db->select('ktp.nama, ktp.nik, STR_TO_DATE(superbright.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        
        // Join tables
        $this->db->from('superbright');
        $this->db->join('pasien', 'superbright.id_pasien = pasien.id');
        $this->db->join('ktp', 'pasien.nik = ktp.nik');
        $this->db->order_by("ins_time_datetime", 'DESC');
        // Limit the number of results
        $this->db->limit(3);
        

        // Execute query
        $query = $this->db->get();
        
        // Return results
        return $query->result();
    }

    public function count_superbright_dashboard() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_superbright');
        $query_pasien = $this->db->get('superbright');
        $total_pasien = $query_pasien->row()->total_superbright;

        // Return the total
        return $total_pasien;
        
    }

    public function get_magnetik_dashboard() {
        // Select fields
        $this->db->select('ktp.nama, ktp.nik, STR_TO_DATE(magnetik.ins_time, "%Y-%m-%d %H:%i:%s") as ins_time_datetime');
        
        // Join tables
        $this->db->from('magnetik');
        $this->db->join('pasien', 'magnetik.id_pasien = pasien.id');
        $this->db->join('ktp', 'pasien.nik = ktp.nik');
        $this->db->order_by("ins_time_datetime", 'DESC');
        // Limit the number of results
        $this->db->limit(3);
        

        // Execute query
        $query = $this->db->get();
        
        // Return results
        return $query->result();
    }

    public function count_magnetik_dashboard() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_magnetik');
        $query_pasien = $this->db->get('magnetik');
        $total_pasien = $query_pasien->row()->total_magnetik;

        // Return the total
        return $total_pasien;
        
    }

    public function get_pasien_dashboard()
    {
        $this->db->select('*');
        $this->db->from('ktp');
        $this->db->order_by('id', 'DESC'); // Urutkan berdasarkan id secara descending
        $this->db->limit(3); // Tambahkan limit disini
        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_pemeriksaan() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_suntik');
        $query_suntik = $this->db->get('suntik');
        $total_suntik = $query_suntik->row()->total_suntik;

        // Get total count from ultrasound table
        $this->db->select('COUNT(*) as total_ultrasound');
        $query_ultrasound = $this->db->get('ultrasound');
        $total_ultrasound = $query_ultrasound->row()->total_ultrasound;

        // Get total count from superbright table
        $this->db->select('COUNT(*) as total_superbright');
        $query_superbright = $this->db->get('superbright');
        $total_superbright = $query_superbright->row()->total_superbright;

        // Get total count from magnetik table
        $this->db->select('COUNT(*) as total_magnetik');
        $query_magnetik = $this->db->get('magnetik');
        $total_magnetik = $query_magnetik->row()->total_magnetik;

        // Calculate total
        $total_pemeriksaan = $total_suntik + $total_ultrasound + $total_superbright + $total_magnetik;

        // Return the total
        return $total_pemeriksaan;
    }

    public function get_total_pasien() {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_pasien');
        $query_pasien = $this->db->get('ktp');
        $total_pasien = $query_pasien->row()->total_pasien;

        // Return the total
        return $total_pasien;
    }

    public function get_pemeriksaan_counts() {
        $result = [];
    
        $tables = ['suntik', 'ultrasound', 'superbright', 'magnetik'];
        foreach ($tables as $table) {
            $this->db->select('COUNT(*) as count');
            $query = $this->db->get($table);
            $result[$table] = $query->row()->count;
        }
    
        return $result;
    }

    public function get_periksa_mingguan() {
        $query = "
            SELECT 
                DATE_FORMAT(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s'), '%W') as day, 
                COUNT(*) as total, 
                'Suntik' as type 
            FROM suntik 
            WHERE WEEK(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = WEEK(NOW()) 
            AND YEAR(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = YEAR(NOW()) 
            GROUP BY day
            UNION ALL
            SELECT 
                DATE_FORMAT(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s'), '%W') as day, 
                COUNT(*) as total, 
                'Ultrasound' as type 
            FROM ultrasound 
            WHERE WEEK(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = WEEK(NOW()) 
            AND YEAR(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = YEAR(NOW()) 
            GROUP BY day
            UNION ALL
            SELECT 
                DATE_FORMAT(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s'), '%W') as day, 
                COUNT(*) as total, 
                'Superbright' as type 
            FROM superbright 
            WHERE WEEK(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = WEEK(NOW()) 
            AND YEAR(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = YEAR(NOW()) 
            GROUP BY day
            UNION ALL
            SELECT 
                DATE_FORMAT(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s'), '%W') as day, 
                COUNT(*) as total, 
                'Magnetik' as type 
            FROM magnetik 
            WHERE WEEK(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = WEEK(NOW()) 
            AND YEAR(STR_TO_DATE(ins_time, '%Y-%m-%d %H:%i:%s')) = YEAR(NOW()) 
            GROUP BY day
        ";

        $result = $this->db->query($query);
        return $result->result();
    }

    public function delete_suntik($id)
    {
        return $this->db->delete('suntik', array('id' => $id));
    }
    public function delete_ultrasound($id)
    {
        return $this->db->delete('ultrasound', array('id' => $id));
    }
    public function delete_superbright($id)
    {
        return $this->db->delete('superbright', array('id' => $id));
    }
    public function delete_magnetik($id)
    {
        return $this->db->delete('magnetik', array('id' => $id));
    }
}
