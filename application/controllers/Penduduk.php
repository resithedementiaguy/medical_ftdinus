<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_email');
        $this->load->library('PHPMailer_lib');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->check_login();
    }

    private function check_login()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page if not logged in
            redirect('auth');
        }
    }

    public function index()
    {
        $data['penduduk'] = $this->Mod_penduduk->get_all_penduduk();
        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk/add_penduduk');
        $this->load->view('partials/footer');
    }

    public function edit($id)
    {
        $data['penduduk'] = $this->Mod_penduduk->get_penduduk_by_id($id);

        $this->load->view('partials/header');
        $this->load->view('frontend/penduduk/edit_penduduk', $data);
        $this->load->view('partials/footer');
    }

    public function add()
    {
        // Set validation rules for required fields
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('penduduk');
        } else {
            // Collect form data
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pembuat' => $this->input->post('pembuat'),
                'umur' => $this->input->post('umur'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                //'email' => $this->input->post('email'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
                /*'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),*/
            );

            // Add the new resident to the database
            $this->Mod_penduduk->add_penduduk($data);

            date_default_timezone_set('Asia/Jakarta');
            $tgl_periksa = date('Y-m-d', time());

            // $akm_manual = array(
            //     'tgl_periksa' => $tgl_periksa,
            //     'nik' => $nik,
            //     'nama' => $nama
            // );

            // $this->Mod_penduduk->add_data_manual($akm_manual);
            // $this->Mod_penduduk->add_data_akm($akm_manual);

            // Ambil subject dan body dari database
            $email_data = $this->Mod_email->get_email(1);
            $subject = $email_data->subject;
            $body = $email_data->body;

            // Kirim email
            $to = $this->input->post('email');
            $result = $this->phpmailer_lib->send_email($to, $subject, $body);

            if ($result !== 'Message has been sent') {
                echo "Error sending email: " . $result;
            } else {
                redirect('penduduk');
            }
        }
    }

    public function update($id)
    {
        // Set validation rules for all form fields
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('rt', 'RT', 'required');
        // $this->form_validation->set_rules('rw', 'RW', 'required');
        // $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        // $this->form_validation->set_rules('kota', 'Kota', 'required');
        // $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembalikan ke halaman edit dengan pesan kesalahan
            $this->edit($id);
        } else {
            // Jika validasi berhasil, lakukan update data
            $data = array(
                // 'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                // 'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                // 'rt' => $this->input->post('rt'),
                // 'rw' => $this->input->post('rw'),
                // 'kelurahan' => $this->input->post('kelurahan'),
                // 'kecamatan' => $this->input->post('kecamatan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                // 'kota' => $this->input->post('kota'),
                // 'provinsi' => $this->input->post('provinsi'),
                'umur' => $this->input->post('umur')
            );
            $this->Mod_penduduk->update_penduduk($id, $data);
            redirect('pasien');
        }
    }

    public function import_data() 
    {
        // Initialize variables
        $url = 'http://103.101.52.65:7021/api/patient/all';
        $inserted = 0;
        $skipped = 0;
        
        try {
            // Initialize cURL session
            $ch = curl_init();
            
            // Set curl options
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json'
                ),
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false
            ));
            
            // Execute cURL request
            $response = curl_exec($ch);
            
            // Check for cURL errors
            if(curl_errno($ch)) {
                throw new Exception('Curl error: ' . curl_error($ch));
            }
            
            // Get HTTP status code
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) {
                throw new Exception('HTTP error: ' . $httpCode);
            }
            
            // Close cURL session
            curl_close($ch);
            
            // Log response for debugging
            log_message('debug', 'API Response: ' . $response);
            
            // Decode JSON response
            $result = json_decode($response, true);
            
            // Check if data exists and has the correct structure
            if(!$result || !isset($result['data']) || !is_array($result['data'])) {
                throw new Exception('Invalid data structure received from API. Response: ' . $response);
            }
            
            // Process each record from the data array
            foreach($result['data'] as $patient) {
                // Log each patient record for debugging
                log_message('debug', 'Processing patient: ' . json_encode($patient));
                
                // Validate required fields exist
                if(empty($patient['nik']) || empty($patient['nama_pasien'])) {
                    log_message('debug', 'Skipping record - missing required fields');
                    continue;
                }
                
                // Check if NIK already exists
                $existing = $this->Mod_penduduk->get_nama_by_nik($patient['nik']);
                
                if(empty($existing)) {
                    // Prepare data for insertion
                    $insert_data = array(
                        'nik' => $patient['nik'],
                        'nama' => $patient['nama_pasien'],
                        'jenis_kelamin' => isset($patient['jenis_kelamin']) ? $patient['jenis_kelamin'] : '',
                        'tanggal_lahir' => isset($patient['tgl_lahir']) ? date('Y-m-d', strtotime($patient['tgl_lahir'])) : null,
                        'no_hp' => isset($patient['no_hp']) ? $patient['no_hp'] : '',
                        'alamat' => isset($patient['alamat']) ? $patient['alamat'] : '',
                        'kelurahan' => isset($patient['kelurahan']) ? $patient['kelurahan'] : '',
                        'kecamatan' => isset($patient['kecamatan']) ? $patient['kecamatan'] : '',
                        'kota' => isset($patient['kabkota']) ? $patient['kabkota'] : '',
                        'pembuat' => $this->session->userdata('username')
                    );
                    
                    // Log insertion attempt
                    log_message('debug', 'Attempting to insert: ' . json_encode($insert_data));
                    
                    // Insert data
                    if($this->Mod_penduduk->add_penduduk($insert_data)) {
                        $inserted++;
                        log_message('debug', 'Successfully inserted record');
                    } else {
                        log_message('error', 'Failed to insert record');
                    }
                } else {
                    $skipped++;
                    log_message('debug', 'Skipped duplicate NIK: ' . $patient['nik']);
                }
            }
            
            // Prepare response message
            $message = "Berhasil mengimpor $inserted data baru. ";
            if($skipped > 0) {
                $message .= "$skipped data dilewati karena NIK sudah ada.";
            }
            
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            
        } catch(Exception $e) {
            log_message('error', 'Import Error: ' . $e->getMessage());
            echo json_encode(array(
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ));
        }
    }
}
