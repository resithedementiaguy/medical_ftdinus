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
        $this->db->select('pasien.id as pasien_id, pasien.nik AS pasien_nik, ktp.id as ktp_id, ktp.nik, ktp.nama, ktp.alamat, ktp.tempat_lahir, ktp.tanggal_lahir, ktp.jenis_kelamin, ktp.kelurahan, ktp.kecamatan, ktp.kota, ktp.email, ktp.no_hp, pasien.tinggi, pasien.berat, ktp.umur');
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

    public function get_suntik_dashboard()
    {
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

    public function count_suntik_dashboard()
    {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_suntik');
        $query_pasien = $this->db->get('suntik');
        $total_pasien = $query_pasien->row()->total_suntik;

        // Return the total
        return $total_pasien;
    }

    public function get_ultrasound_dashboard()
    {
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

    public function count_ultrasound_dashboard()
    {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_ultrasound');
        $query_pasien = $this->db->get('ultrasound');
        $total_pasien = $query_pasien->row()->total_ultrasound;

        // Return the total
        return $total_pasien;
    }

    public function get_superbright_dashboard()
    {
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

    public function count_superbright_dashboard()
    {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_superbright');
        $query_pasien = $this->db->get('superbright');
        $total_pasien = $query_pasien->row()->total_superbright;

        // Return the total
        return $total_pasien;
    }

    public function get_magnetik_dashboard()
    {
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

    public function count_magnetik_dashboard()
    {
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

    public function get_total_pemeriksaan()
    {
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

    public function get_total_pasien()
    {
        // Get total count from suntik table
        $this->db->select('COUNT(*) as total_pasien');
        $query_pasien = $this->db->get('ktp');
        $total_pasien = $query_pasien->row()->total_pasien;

        // Return the total
        return $total_pasien;
    }

    public function get_pemeriksaan_counts()
    {
        $result = [];

        $tables = ['suntik', 'ultrasound', 'superbright', 'magnetik'];
        foreach ($tables as $table) {
            $this->db->select('COUNT(*) as count');
            $query = $this->db->get($table);
            $result[$table] = $query->row()->count;
        }

        return $result;
    }

    public function get_periksa_mingguan()
    {
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

    public function get_recap_by_nik($nik)
    {
        $this->db->select('
            data_manual.sistol AS manual_sistol,
            data_manual.diastol AS manual_diastol,
            data_manual.tinggi_bdn AS manual_tinggi_bdn,
            data_manual.berat_bdn AS manual_berat_bdn,
            data_manual.glukosa AS manual_glukosa,
            data_akm.sistol AS akm_sistol,
            data_akm.diastol AS akm_diastol,
            data_akm.tinggi_bdn AS akm_tinggi_bdn,
            data_akm.berat_bdn AS akm_berat_bdn,
            data_akm.glukosa AS akm_glukosa,
            COALESCE(data_manual.sistol, 0) - COALESCE(data_akm.sistol, 0) as selisih_sistol,
            COALESCE(data_manual.diastol, 0) - COALESCE(data_akm.diastol, 0) as selisih_diastol,
            COALESCE(data_manual.tinggi_bdn, 0) - COALESCE(data_akm.tinggi_bdn, 0) as selisih_tinggi_bdn,
            COALESCE(data_manual.berat_bdn, 0) - COALESCE(data_akm.berat_bdn, 0) as selisih_berat_bdn,
            COALESCE(data_manual.glukosa, 0) - COALESCE(data_akm.glukosa, 0) as selisih_glukosa
        ');
        $this->db->from('data_manual');
        $this->db->join('data_akm', 'data_manual.nik = data_akm.nik', 'left');
        $this->db->where('data_manual.nik', $nik);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_recap()
    {
        $this->db->select('
        SUM(COALESCE(data_manual.sistol, 0)) as manual_sistol,
        SUM(COALESCE(data_akm.sistol, 0)) as akm_sistol,
        
        AVG(COALESCE(data_manual.sistol, 0)) as avg_manual_sistol,
        AVG(COALESCE(data_akm.sistol, 0)) as avg_akm_sistol,
        SUM(COALESCE(data_manual.sistol, 0) - COALESCE(data_akm.sistol, 0)) as total_selisih_sistol,
        ABS(AVG(COALESCE(data_manual.sistol, 0)) - AVG(COALESCE(data_akm.sistol, 0))) as avg_sistol,
        (CASE WHEN AVG(COALESCE(data_manual.sistol, 0)) - AVG(COALESCE(data_akm.sistol, 0)) < 0 THEN "Data Lebih" ELSE "Data Kurang" END) as keterangan_sistol,

        SUM(COALESCE(data_manual.diastol, 0)) as manual_diastol,
        SUM(COALESCE(data_akm.diastol, 0)) as akm_diastol,
        
        AVG(COALESCE(data_manual.diastol, 0)) as avg_manual_diastol,
        AVG(COALESCE(data_akm.diastol, 0)) as avg_akm_diastol,
        SUM(COALESCE(data_manual.diastol, 0) - COALESCE(data_akm.diastol, 0)) as total_selisih_diastol,
        ABS(AVG(COALESCE(data_manual.diastol, 0)) - AVG(COALESCE(data_akm.diastol, 0))) as avg_diastol,
        (CASE WHEN AVG(COALESCE(data_manual.diastol, 0)) - AVG(COALESCE(data_akm.diastol, 0)) < 0 THEN "Data Lebih" ELSE "Data Kurang" END) as keterangan_diastol,

        SUM(COALESCE(data_manual.tinggi_bdn, 0)) as manual_tinggi_bdn,
        SUM(COALESCE(data_akm.tinggi_bdn, 0)) as akm_tinggi_bdn,
        
        AVG(COALESCE(data_manual.tinggi_bdn, 0)) as avg_manual_tinggi_bdn,
        AVG(COALESCE(data_akm.tinggi_bdn, 0)) as avg_akm_tinggi_bdn,
        SUM(COALESCE(data_manual.tinggi_bdn, 0) - COALESCE(data_akm.tinggi_bdn, 0)) as total_selisih_tinggi_bdn,
        ABS(AVG(COALESCE(data_manual.tinggi_bdn, 0)) - AVG(COALESCE(data_akm.tinggi_bdn, 0))) as avg_tinggi_bdn,
        (CASE WHEN AVG(COALESCE(data_manual.tinggi_bdn, 0)) - AVG(COALESCE(data_akm.tinggi_bdn, 0)) < 0 THEN "Data Lebih" ELSE "Data Kurang" END) as keterangan_tinggi_bdn,

        SUM(COALESCE(data_manual.berat_bdn, 0)) as manual_berat_bdn,
        SUM(COALESCE(data_akm.berat_bdn, 0)) as akm_berat_bdn,
        
        AVG(COALESCE(data_manual.berat_bdn, 0)) as avg_manual_berat_bdn,
        AVG(COALESCE(data_akm.berat_bdn, 0)) as avg_akm_berat_bdn,
        SUM(COALESCE(data_manual.berat_bdn, 0) - COALESCE(data_akm.berat_bdn, 0)) as total_selisih_berat_bdn,
        ABS(AVG(COALESCE(data_manual.berat_bdn, 0)) - AVG(COALESCE(data_akm.berat_bdn, 0))) as avg_berat_bdn,
        (CASE WHEN AVG(COALESCE(data_manual.berat_bdn, 0)) - AVG(COALESCE(data_akm.berat_bdn, 0)) < 0 THEN "Data Lebih" ELSE "Data Kurang" END) as keterangan_berat_bdn,

        SUM(COALESCE(data_manual.glukosa, 0)) as manual_glukosa,
        SUM(COALESCE(data_akm.glukosa, 0)) as akm_glukosa,
        
        AVG(COALESCE(data_manual.glukosa, 0)) as avg_manual_glukosa,
        AVG(COALESCE(data_akm.glukosa, 0)) as avg_akm_glukosa,
        SUM(COALESCE(data_manual.glukosa, 0) - COALESCE(data_akm.glukosa, 0)) as total_selisih_glukosa,
        ABS(AVG(COALESCE(data_manual.glukosa, 0)) - AVG(COALESCE(data_akm.glukosa, 0))) as avg_glukosa,
        (CASE WHEN AVG(COALESCE(data_manual.glukosa, 0)) - AVG(COALESCE(data_akm.glukosa, 0)) < 0 THEN "Data Lebih" ELSE "Data Kurang" END) as keterangan_glukosa,

        -- Menghitung persentase selisih
        (CASE 
            WHEN SUM(COALESCE(data_akm.sistol, 0)) > 0 
            THEN ROUND((SUM(COALESCE(data_manual.sistol, 0)) - SUM(COALESCE(data_akm.sistol, 0))) / SUM(COALESCE(data_akm.sistol, 0)) * 100, 2)
            ELSE 0
        END) as persentase_selisih_sistol,
        (CASE 
            WHEN SUM(COALESCE(data_akm.diastol, 0)) > 0 
            THEN ROUND((SUM(COALESCE(data_manual.diastol, 0)) - SUM(COALESCE(data_akm.diastol, 0))) / SUM(COALESCE(data_akm.diastol, 0)) * 100, 2)
            ELSE 0
        END) as persentase_selisih_diastol,
        (CASE 
            WHEN SUM(COALESCE(data_akm.tinggi_bdn, 0)) > 0 
            THEN ROUND((SUM(COALESCE(data_manual.tinggi_bdn, 0)) - SUM(COALESCE(data_akm.tinggi_bdn, 0))) / SUM(COALESCE(data_akm.tinggi_bdn, 0)) * 100, 2)
            ELSE 0
        END) as persentase_selisih_tinggi_bdn,
        (CASE 
            WHEN SUM(COALESCE(data_akm.berat_bdn, 0)) > 0 
            THEN ROUND((SUM(COALESCE(data_manual.berat_bdn, 0)) - SUM(COALESCE(data_akm.berat_bdn, 0))) / SUM(COALESCE(data_akm.berat_bdn, 0)) * 100, 2)
            ELSE 0
        END) as persentase_selisih_berat_bdn,
        (CASE 
            WHEN SUM(COALESCE(data_akm.glukosa, 0)) > 0 
            THEN ROUND((SUM(COALESCE(data_manual.glukosa, 0)) - SUM(COALESCE(data_akm.glukosa, 0))) / SUM(COALESCE(data_akm.glukosa, 0)) * 100, 2)
            ELSE 0
        END) as persentase_selisih_glukosa,

        -- Menghitung total selisih negatif dan positif per orang
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.sistol, 0) - COALESCE(data_akm.sistol, 0) > 0 THEN data_manual.nik ELSE NULL END) as total_selisih_positif_sistol,
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.sistol, 0) - COALESCE(data_akm.sistol, 0) < 0 THEN data_manual.nik ELSE NULL END) as total_selisih_negatif_sistol,

        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.diastol, 0) - COALESCE(data_akm.diastol, 0) > 0 THEN data_manual.nik ELSE NULL END) as total_selisih_positif_diastol,
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.diastol, 0) - COALESCE(data_akm.diastol, 0) < 0 THEN data_manual.nik ELSE NULL END) as total_selisih_negatif_diastol,

        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.tinggi_bdn, 0) - COALESCE(data_akm.tinggi_bdn, 0) > 0 THEN data_manual.nik ELSE NULL END) as total_selisih_positif_tinggi_bdn,
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.tinggi_bdn, 0) - COALESCE(data_akm.tinggi_bdn, 0) < 0 THEN data_manual.nik ELSE NULL END) as total_selisih_negatif_tinggi_bdn,

        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.berat_bdn, 0) - COALESCE(data_akm.berat_bdn, 0) > 0 THEN data_manual.nik ELSE NULL END) as total_selisih_positif_berat_bdn,
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.berat_bdn, 0) - COALESCE(data_akm.berat_bdn, 0) < 0 THEN data_manual.nik ELSE NULL END) as total_selisih_negatif_berat_bdn,

        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.glukosa, 0) - COALESCE(data_akm.glukosa, 0) > 0 THEN data_manual.nik ELSE NULL END) as total_selisih_positif_glukosa,
        COUNT(DISTINCT CASE WHEN COALESCE(data_manual.glukosa, 0) - COALESCE(data_akm.glukosa, 0) < 0 THEN data_manual.nik ELSE NULL END) as total_selisih_negatif_glukosa
    ');
        $this->db->from('data_manual');
        $this->db->join('data_akm', 'data_manual.nik = data_akm.nik', 'left');

        $query = $this->db->get();
        return $query->row();
    }

    public function get_manual_akm() 
    {
        $this->db->select('
            dm.id AS manual_id,
            dm.nik AS manual_nik,
            dm.nama AS manual_nama,
            dm.sistol AS manual_sistol,
            dm.diastol AS manual_diastol,
            dm.tinggi_bdn AS manual_tinggi_bdn,
            dm.berat_bdn AS manual_berat_bdn,
            dm.glukosa AS manual_glukosa,
            dm.asam_urat AS manual_asam_urat,
            dm.kolesterol AS manual_kolesterol,
            da.id AS akm_id,
            da.nik AS akm_nik,
            da.nama AS akm_nama,
            da.sistol AS akm_sistol,
            da.diastol AS akm_diastol,
            da.tinggi_bdn AS akm_tinggi_bdn,
            da.berat_bdn AS akm_berat_bdn,
            da.glukosa AS akm_glukosa,
            da.asam_urat AS akm_asam_urat,
            da.kolesterol AS akm_kolesterol,
            (dm.sistol - da.sistol) AS diff_sistol,
            (dm.diastol - da.diastol) AS diff_diastol,
            (dm.tinggi_bdn - da.tinggi_bdn) AS diff_tinggi_bdn,
            (dm.berat_bdn - da.berat_bdn) AS diff_berat_bdn,
            (dm.glukosa - da.glukosa) AS diff_glukosa
        ');
        $this->db->from('data_manual dm');
        $this->db->join('data_akm da', 'dm.nik = da.nik', 'left');
        $query = $this->db->get();

        return $query->result();
    }


}
