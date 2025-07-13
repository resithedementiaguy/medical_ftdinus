<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

class Mobile_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Ktp_model');
        $this->load->model('Mod_auth');
        $this->load->model('Mod_penduduk');
        $this->load->model('Mod_darah');
        $this->load->model('Mod_pasien');
        $this->load->model('Mod_periksa');
        $this->load->model('Mod_user');
        $this->load->model('Auk_model');
        $this->load->model('Superbright_model');
        $this->load->model('Magnetik_model');
        header('Content-Type: application/json');
    }

    public function login()
    {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = array(
                'status' => 'error',
                'message' => 'Username and password are required',
                'errors' => $this->form_validation->error_array()
            );
            echo json_encode($response);
            return;
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Log the attempt
        log_message('debug', "Mobile API: Attempting login with username: $username");

        try {
            $user = $this->Mod_auth->validate_login($username, $password);

            if ($user) {
                // Login successful
                $response = array(
                    'status' => 'success',
                    'message' => 'Login successful',
                    'data' => array(
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'level_name' => $user['level_name']
                    )
                );
                
                log_message('debug', "Mobile API: Login successful for username: $username");
            } else {
                // Login failed
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid username or password'
                );
                
                log_message('debug', "Mobile API: Login failed for username: $username");
            }

        } catch (Exception $e) {
            // Handle any database or other errors
            $response = array(
                'status' => 'error',
                'message' => 'An error occurred during login process'
            );
            
            log_message('error', "Mobile API: Login error for username: $username - " . $e->getMessage());
        }

        echo json_encode($response);
    }

    public function get_all_penduduk()
    {
        try {
            // Ambil semua data penduduk dari model
            $penduduk = $this->Mod_darah->get_penduduk();
            
            if ($penduduk) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Data penduduk berhasil diambil',
                    'data' => $penduduk
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Data penduduk tidak ditemukan',
                    'data' => array()
                );
                echo json_encode($response);
            }
        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => array()
            );
            echo json_encode($response);
        }
    }

    public function get_nama_by_nik()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit

        if (!$nik) {
            $response = array(
                'status' => 'error',
                'message' => 'NIK tidak boleh kosong'
            );
            echo json_encode($response);
            return;
        }

        try {
            $nama = $this->Mod_darah->get_nama_by_nik($nik);

            if ($nama) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Data ditemukan',
                    'data' => $nama
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan'
                );
            }
        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            );
        }

        echo json_encode($response);
    }

    public function add_pasien()
    {
        try {
            // Validasi input
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('no_hp', 'No HP', 'required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => validation_errors()
                );
                echo json_encode($response);
                return;
            }

            // Ambil data dari POST request
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $no_hp = $this->input->post('no_hp');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $umur = $this->input->post('umur');

            // Siapkan data untuk insert
            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'pembuat' => 'mobile_app', // atau bisa dari session user
                'umur' => $umur,
                'tanggal_lahir' => $tanggal_lahir,
                'tempat_lahir' => $tempat_lahir,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            );

            // Insert data penduduk
            $insert_result = $this->Mod_penduduk->add_penduduk($data);

            if ($insert_result) {
                // Set timezone dan tanggal periksa
                date_default_timezone_set('Asia/Jakarta');
                $tgl_periksa = date('Y-m-d', time());

                // Data untuk tabel manual dan akm
                // $akm_manual = array(
                //     'tgl_periksa' => $tgl_periksa,
                //     'nik' => $nik,
                //     'nama' => $nama
                // );

                // // Insert ke tabel data manual dan akm
                // $this->Mod_penduduk->add_data_manual($akm_manual);
                // $this->Mod_penduduk->add_data_akm($akm_manual);

                $response = array(
                    'status' => 'success',
                    'message' => 'Data pasien berhasil ditambahkan',
                    'data' => array(
                        'nik' => $nik,
                        'nama' => $nama
                    )
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal menambahkan data pasien'
                );
                echo json_encode($response);
            }

        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            );
            echo json_encode($response);
        }
    }


    public function import_data_pasien()
    {
        header('Content-Type: application/json');

        $url = 'http://103.101.52.65:7021/api/patient/all';
        $inserted = 0;
        $skipped = 0;

        try {
            $ch = curl_init();
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

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new Exception('Curl error: ' . curl_error($ch));
            }

            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode !== 200) {
                throw new Exception('HTTP error: ' . $httpCode);
            }

            curl_close($ch);

            $result = json_decode($response, true);

            if (!$result || !isset($result['data']) || !is_array($result['data'])) {
                throw new Exception('Invalid data structure received from API.');
            }

            foreach ($result['data'] as $patient) {
                if (empty($patient['nik']) || empty($patient['nama_pasien'])) {
                    continue;
                }

                $existing = $this->Mod_penduduk->get_nama_by_nik($patient['nik']);

                if (empty($existing)) {
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
                        'pembuat' => 'android' // default pembuat dari mobile
                    );

                    if ($this->Mod_penduduk->add_penduduk($insert_data)) {
                        $inserted++;
                    }
                } else {
                    $skipped++;
                }
            }

            $message = "Berhasil mengimpor $inserted data baru.";
            if ($skipped > 0) {
                $message .= " $skipped data dilewati karena NIK sudah ada.";
            }

            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));

        } catch (Exception $e) {
            echo json_encode(array(
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ));
        }
    }

    public function get_all_pasien()
    {
        $this->load->model('Mod_pasien');

        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        $search = $this->input->get('search'); // tambahkan ini

        $limit = is_numeric($limit) ? (int)$limit : 10;
        $offset = is_numeric($offset) ? (int)$offset : 0;

        $data = $this->Mod_pasien->get_all_pasien_limit($limit, $offset, $search);

        $response = [
            'status' => !empty($data),
            'message' => !empty($data) ? 'Data pasien berhasil diambil.' : 'Data pasien tidak ditemukan.',
            'data' => $data
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function get_pasien_detail()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_pasien_detail($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_pasien_by_id()
    {
        $id = $this->input->get('id'); // atau input->post('id') sesuai Retrofit
        $this->load->model('Mod_penduduk');
        $data = $this->Mod_penduduk->get_penduduk_by_id($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function update_pasien()
    {
        // Ambil ID dari input POST
        $id = $this->input->post('id');

        // Cek apakah ID tersedia
        if (!$id) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'ID pasien tidak ditemukan.'
                ]));
            return;
        }

        // Validasi input (bisa menggunakan form_validation atau validasi manual)
        $this->form_validation->set_data($this->input->post());
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => validation_errors()
                ]));
            return;
        }

        // Data yang akan diupdate
        $data = array(
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'umur' => $this->input->post('umur')
        );

        // Lakukan update
        $updated = $this->Mod_penduduk->update_penduduk($id, $data);

        if ($updated) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Data pasien berhasil diupdate.'
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Gagal mengupdate data pasien.'
                ]));
        }
    }

    public function get_antropometri()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_antropometri($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_asam_urat()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_asam_urat($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_asam_urat_id()
    {
        $id = $this->input->get('id'); // atau input->post('id') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_asam_urat_id($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_asam_urat_data()
    {
        $id=1;
        $data = $this->Auk_model->get_asamurat($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function update_asam_urat()
    {
        // Ambil data dari POST
        $id = $this->input->post('id'); // pastikan client mengirimkan ID asam_urat
        $violet = $this->input->post('asamviolet');
        $blue = $this->input->post('asamblue');
        $green = $this->input->post('asamgreen');
        $yellow = $this->input->post('asamyellow');
        $orange = $this->input->post('asamorange');
        $red = $this->input->post('asamred');

        // Validasi data wajib
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        // Siapkan data untuk update
        $data = array(
            'violet' => $violet,
            'blue' => $blue,
            'green' => $green,
            'yellow' => $yellow,
            'orange' => $orange,
            'red' => $red,
        );

        // Update data
        $updated = $this->Mod_pasien->update_asam_urat($id, $data);

        // Respon
        if ($updated) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data asam urat berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal memperbarui data asam urat.'
            ]);
        }
    }

    public function delete_asam_urat()
    {
        $id = $this->input->post('id'); // pastikan client mengirimkan ID asam_urat

        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        $deleted = $this->Mod_pasien->delete_asam_urat($id);

        if ($deleted) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data asam urat berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data asam urat.'
            ]);
        }
    }


    public function get_kolesterol()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_kolesterol($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_kolesterol_id()
    {
        $id = $this->input->get('id'); // atau input->post('id') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_kolesterol_id($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_kolesterol_data()
    {
        $id = 1; // Ganti dengan ID yang sesuai
        $data = $this->Auk_model->get_kolesterol($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function update_kolesterol()
    {
        // Ambil data dari POST
        $id = $this->input->post('id'); // pastikan client mengirimkan ID kolesterol
        $violet = $this->input->post('kolesterolviolet');
        $blue = $this->input->post('kolesterolblue');
        $green = $this->input->post('kolesterolgreen');
        $yellow = $this->input->post('kolesterolyellow');
        $orange = $this->input->post('kolesterolorange');
        $red = $this->input->post('kolesterolred');

        // Validasi data wajib
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        // Siapkan data untuk update
        $data = array(
            'violet' => $violet,
            'blue' => $blue,
            'green' => $green,
            'yellow' => $yellow,
            'orange' => $orange,
            'red' => $red,
        );

        // Update data
        $updated = $this->Mod_pasien->update_kolesterol($id, $data);

        // Respon
        if ($updated) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data kolesterol berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal memperbarui data kolesterol.'
            ]);
        }
    }

    public function delete_kolesterol()
    {
        $id = $this->input->post('id'); // pastikan client mengirimkan ID kolesterol

        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        $deleted = $this->Mod_pasien->delete_kolesterol($id);

        if ($deleted) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data kolesterol berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data kolesterol.'
            ]);
        }
    }

    public function get_magnetik()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_magnetik($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_magnetik_id()
    {
        $id = $this->input->get('id'); // atau input->post('id') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_magnetik_id($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_magnetik_data()
    {
        $id = 1; // Ganti dengan ID yang sesuai
        $data = $this->Magnetik_model->get_magnetik($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function update_magnetik()
    {
        // Ambil data dari POST
        $id = $this->input->post('id'); // pastikan client mengirimkan ID magnetik
        $jtg_mag1 = $this->input->post('jtg_mag1');
        $jtg_mag2 = $this->input->post('jtg_mag2');
        $jtg_mag3 = $this->input->post('jtg_mag3');
        $jtg_mag4 = $this->input->post('jtg_mag4');
        $jtg_mag5 = $this->input->post('jtg_mag5');
        $jtg_mag6 = $this->input->post('jtg_mag6');
        $jtg_mag7 = $this->input->post('jtg_mag7');
        $jtg_mag8 = $this->input->post('jtg_mag8');
        $jtg_mag9 = $this->input->post('jtg_mag9');
        $jtg_mag10 = $this->input->post('jtg_mag10');

        $srf_mag1 = $this->input->post('srf_mag1');
        $srf_mag2 = $this->input->post('srf_mag2');
        $srf_mag3 = $this->input->post('srf_mag3');
        $srf_mag4 = $this->input->post('srf_mag4');
        $srf_mag5 = $this->input->post('srf_mag5');
        $srf_mag6 = $this->input->post('srf_mag6');
        $srf_mag7 = $this->input->post('srf_mag7');
        $srf_mag8 = $this->input->post('srf_mag8');
        $srf_mag9 = $this->input->post('srf_mag9');
        $srf_mag10 = $this->input->post('srf_mag10');
        
        $drh_mag1 = $this->input->post('drh_mag1');
        $drh_mag2 = $this->input->post('drh_mag2');
        $drh_mag3 = $this->input->post('drh_mag3');
        $drh_mag4 = $this->input->post('drh_mag4');
        $drh_mag5 = $this->input->post('drh_mag5');
        $drh_mag6 = $this->input->post('drh_mag6');
        $drh_mag7 = $this->input->post('drh_mag7');
        $drh_mag8 = $this->input->post('drh_mag8');
        $drh_mag9 = $this->input->post('drh_mag9');
        $drh_mag10 = $this->input->post('drh_mag10');

        $sel_mag1 = $this->input->post('sel_mag1');
        $sel_mag2 = $this->input->post('sel_mag2');
        $sel_mag3 = $this->input->post('sel_mag3');
        $sel_mag4 = $this->input->post('sel_mag4');
        $sel_mag5 = $this->input->post('sel_mag5');
        $sel_mag6 = $this->input->post('sel_mag6');
        $sel_mag7 = $this->input->post('sel_mag7');
        $sel_mag8 = $this->input->post('sel_mag8');
        $sel_mag9 = $this->input->post('sel_mag9');
        $sel_mag10 = $this->input->post('sel_mag10');

        $tgi_mag1 = $this->input->post('tgi_mag1');
        $tgi_mag2 = $this->input->post('tgi_mag2');
        $tgi_mag3 = $this->input->post('tgi_mag3');
        $tgi_mag4 = $this->input->post('tgi_mag4');
        $tgi_mag5 = $this->input->post('tgi_mag5');
        $tgi_mag6 = $this->input->post('tgi_mag6');
        $tgi_mag7 = $this->input->post('tgi_mag7');
        $tgi_mag8 = $this->input->post('tgi_mag8');
        $tgi_mag9 = $this->input->post('tgi_mag9');
        $tgi_mag10 = $this->input->post('tgi_mag10');

        // Validasi data wajib
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        // Siapkan data untuk update
        $data = array(
            'jtg_mag1' => $jtg_mag1,
            'jtg_mag2' => $jtg_mag2,
            'jtg_mag3' => $jtg_mag3,
            'jtg_mag4' => $jtg_mag4,
            'jtg_mag5' => $jtg_mag5,
            'jtg_mag6' => $jtg_mag6,
            'jtg_mag7' => $jtg_mag7,
            'jtg_mag8' => $jtg_mag8,
            'jtg_mag9' => $jtg_mag9,
            'jtg_mag10' => $jtg_mag10,

            'srf_mag1' => $srf_mag1,
            'srf_mag2' => $srf_mag2,
            'srf_mag3' => $srf_mag3,
            'srf_mag4' => $srf_mag4,
            'srf_mag5' => $srf_mag5,
            'srf_mag6' => $srf_mag6,
            'srf_mag7' => $srf_mag7,
            'srf_mag8' => $srf_mag8,
            'srf_mag9' => $srf_mag9,
            'srf_mag10' => $srf_mag10,

            'drh_mag1' => $drh_mag1,
            'drh_mag2' => $drh_mag2,
            'drh_mag3' => $drh_mag3,
            'drh_mag4' => $drh_mag4,
            'drh_mag5' => $drh_mag5,
            'drh_mag6' => $drh_mag6,
            'drh_mag7' => $drh_mag7,
            'drh_mag8' => $drh_mag8,
            'drh_mag9' => $drh_mag9,
            'drh_mag10' => $drh_mag10,

            'sel_mag1' => $sel_mag1,
            'sel_mag2' => $sel_mag2,
            'sel_mag3' => $sel_mag3,
            'sel_mag4' => $sel_mag4,
            'sel_mag5' => $sel_mag5,
            'sel_mag6' => $sel_mag6,
            'sel_mag7' => $sel_mag7,
            'sel_mag8' => $sel_mag8,
            'sel_mag9' => $sel_mag9,
            'sel_mag10' => $sel_mag10,
            
            'tgi_mag1' => $tgi_mag1,
            'tgi_mag2' => $tgi_mag2,
            'tgi_mag3' => $tgi_mag3,
            'tgi_mag4' => $tgi_mag4,
            'tgi_mag5' => $tgi_mag5,
            'tgi_mag6' => $tgi_mag6,
            'tgi_mag7' => $tgi_mag7,
            'tgi_mag8' => $tgi_mag8,
            'tgi_mag9' => $tgi_mag9,
            'tgi_mag10' => $tgi_mag10
        );

        // Update data
        $updated = $this->Mod_pasien->update_magnetik($id, $data);

        // Respon
        if ($updated) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data magnetik berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal memperbarui data magnetik.'
            ]);
        }
    }

    public function delete_magnetik()
    {
        $id = $this->input->post('id'); // pastikan client mengirimkan ID magnetik

        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        $deleted = $this->Mod_pasien->delete_magnetik($id);

        if ($deleted) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data magnetik berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data magnetik.'
            ]);
        }
    }

    public function get_superbright()
    {
        $nik = $this->input->get('nik'); // atau input->post('nik') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_superbright($nik);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_superbright_id()
    {
        $id = $this->input->get('id'); // atau input->post('id') sesuai Retrofit
        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_superbright_id($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_superbright_data()
    {
        $id = 1; // Ganti dengan ID yang sesuai
        $data = $this->Superbright_model->get_superbright($id);

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function update_superbright()
    {
        // Ambil data dari POST
        $id = $this->input->post('id'); // pastikan client mengirimkan ID superbright
        $sb1=$this->input->post('sb1');
        $sb2=$this->input->post('sb2');
        $sb3=$this->input->post('sb3');
        $sb4=$this->input->post('sb4');
        $sb5=$this->input->post('sb5');
        $sb6=$this->input->post('sb6');
        $sb7=$this->input->post('sb7');
        $sb8=$this->input->post('sb8');
        $sb9=$this->input->post('sb9');
        $sb10=$this->input->post('sb10');

        // Validasi data wajib
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        // Siapkan data untuk update
        $data = array(
            'sb1' => $sb1,
            'sb2' => $sb2,
            'sb3' => $sb3,
            'sb4' => $sb4,
            'sb5' => $sb5,
            'sb6' => $sb6,
            'sb7' => $sb7,
            'sb8' => $sb8,
            'sb9' => $sb9,
            'sb10' => $sb10
        );

        // Update data
        $updated = $this->Mod_pasien->update_superbright($id, $data);

        // Respon
        if ($updated) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data superbright berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal memperbarui data superbright.'
            ]);
        }
    }

    public function delete_superbright()
    {
        $id = $this->input->post('id'); // pastikan client mengirimkan ID superbright

        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID wajib diisi.'
            ]);
            return;
        }

        $deleted = $this->Mod_pasien->delete_superbright($id);

        if ($deleted) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data superbright berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data superbright.'
            ]);
        }
    }

    public function add_pemeriksaan()
    {
        $alat = $this->input->post('alat');
        $nik = $this->input->post('nik');
        $tinggi = $this->input->post('tinggi');
        $berat = $this->input->post('berat');

        if (!$nik || !$tinggi || !$berat || !$alat) {
            echo json_encode([
                'status' => false,
                'message' => 'Field nik, tinggi, berat, dan alat wajib diisi'
            ]);
            return;
        }

        $this->load->model('Mod_darah');

        // Simpan data pasien (insert jika belum ada)
        $id_pasien = $this->Mod_darah->add_pasien([
            'nik' => $nik,
            'tinggi' => $tinggi,
            'berat' => $berat
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s');

        $data = [
            'id_pasien' => $id_pasien,
            'ins_time' => $ins_time
        ];

        if ($alat === 'Suntik') {
            $data += [
                'glukosa' => $this->input->post('glukosa'),
                'spo2' => $this->input->post('spo2'),
                'kolesterol' => $this->input->post('kolesterol'),
                'asam_urat' => $this->input->post('asam_urat')
            ];
            $this->Mod_darah->add_suntik($data);

        } elseif ($alat === 'Deteksi Asam Urat') {
            $data += [
                'violet' => $this->input->post('asam_violet'),
                'blue' => $this->input->post('asam_blue'),
                'green' => $this->input->post('asam_green'),
                'yellow' => $this->input->post('asam_yellow'),
                'orange' => $this->input->post('asam_orange'),
                'red' => $this->input->post('asam_red')
            ];
            $this->Mod_darah->add_asam_urat($data);

        } elseif ($alat === 'Deteksi Kolesterol') {
            $data += [
                'violet' => $this->input->post('kolesterol_violet'),
                'blue' => $this->input->post('kolesterol_blue'),
                'green' => $this->input->post('kolesterol_green'),
                'yellow' => $this->input->post('kolesterol_yellow'),
                'orange' => $this->input->post('kolesterol_orange'),
                'red' => $this->input->post('kolesterol_red')
            ];
            $this->Mod_darah->add_kolesterol($data);

        } elseif ($alat === 'Superbright') {
            $data += [
                'sb1' => $this->input->post('sb1'),
                'sb2' => $this->input->post('sb2'),
                'sb3' => $this->input->post('sb3'),
                'sb4' => $this->input->post('sb4'),
                'sb5' => $this->input->post('sb5'),
                'sb6' => $this->input->post('sb6'),
                'sb7' => $this->input->post('sb7'),
                'sb8' => $this->input->post('sb8'),
                'sb9' => $this->input->post('sb9'),
                'sb10' => $this->input->post('sb10')
            ];
            $this->Mod_darah->add_superbright($data);

        } elseif ($alat === 'Magnetik') {
            $data += [
                'jtg_mag1' => $this->input->post('jtg_mag1'),
                'jtg_mag2' => $this->input->post('jtg_mag2'),
                'jtg_mag3' => $this->input->post('jtg_mag3'),
                'jtg_mag4' => $this->input->post('jtg_mag4'),
                'jtg_mag5' => $this->input->post('jtg_mag5'),
                'jtg_mag6' => $this->input->post('jtg_mag6'),
                'jtg_mag7' => $this->input->post('jtg_mag7'),
                'jtg_mag8' => $this->input->post('jtg_mag8'),
                'jtg_mag9' => $this->input->post('jtg_mag9'),
                'jtg_mag10' => $this->input->post('jtg_mag10'),

                'srf_mag1' => $this->input->post('srf_mag1'),
                'srf_mag2' => $this->input->post('srf_mag2'),
                'srf_mag3' => $this->input->post('srf_mag3'),
                'srf_mag4' => $this->input->post('srf_mag4'),
                'srf_mag5' => $this->input->post('srf_mag5'),
                'srf_mag6' => $this->input->post('srf_mag6'),
                'srf_mag7' => $this->input->post('srf_mag7'),
                'srf_mag8' => $this->input->post('srf_mag8'),
                'srf_mag9' => $this->input->post('srf_mag9'),
                'srf_mag10' => $this->input->post('srf_mag10'),

                'drh_mag1' => $this->input->post('drh_mag1'),
                'drh_mag2' => $this->input->post('drh_mag2'),
                'drh_mag3' => $this->input->post('drh_mag3'),
                'drh_mag4' => $this->input->post('drh_mag4'),
                'drh_mag5' => $this->input->post('drh_mag5'),
                'drh_mag6' => $this->input->post('drh_mag6'),
                'drh_mag7' => $this->input->post('drh_mag7'),
                'drh_mag8' => $this->input->post('drh_mag8'),
                'drh_mag9' => $this->input->post('drh_mag9'),
                'drh_mag10' => $this->input->post('drh_mag10'),

                'sel_mag1' => $this->input->post('sel_mag1'),
                'sel_mag2' => $this->input->post('sel_mag2'),
                'sel_mag3' => $this->input->post('sel_mag3'),
                'sel_mag4' => $this->input->post('sel_mag4'),
                'sel_mag5' => $this->input->post('sel_mag5'),
                'sel_mag6' => $this->input->post('sel_mag6'),
                'sel_mag7' => $this->input->post('sel_mag7'),
                'sel_mag8' => $this->input->post('sel_mag8'),
                'sel_mag9' => $this->input->post('sel_mag9'),
                'sel_mag10' => $this->input->post('sel_mag10'),

                'tgi_mag1' => $this->input->post('tgi_mag1'),
                'tgi_mag2' => $this->input->post('tgi_mag2'),
                'tgi_mag3' => $this->input->post('tgi_mag3'),
                'tgi_mag4' => $this->input->post('tgi_mag4'),
                'tgi_mag5' => $this->input->post('tgi_mag5'),
                'tgi_mag6' => $this->input->post('tgi_mag6'),
                'tgi_mag7' => $this->input->post('tgi_mag7'),
                'tgi_mag8' => $this->input->post('tgi_mag8'),
                'tgi_mag9' => $this->input->post('tgi_mag9'),
                'tgi_mag10' => $this->input->post('tgi_mag10')
            ];
            $this->Mod_darah->add_magnetik($data);

        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Jenis alat tidak valid'
            ]);
            return;
        }

        echo json_encode([
            'status' => true,
            'message' => 'Pemeriksaan berhasil ditambahkan',
            'id_pasien' => $id_pasien
        ]);
    }
    
    public function get_total_rekapitulasi()
    {
        $data = $this->Mod_pasien->get_total_recap();

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_rekapitulasi()
    {
        $data = $this->Mod_pasien->get_manual_akm();

        if ($data) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'data' => $data]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Data tidak ditemukan']));
        }
    }

    public function get_persentase_by_date()
    {
        $start_date = $this->input->post('startDate');
        $end_date = $this->input->post('endDate');
        $range = $this->input->post('range');

        if (!$start_date || !$end_date || $range === null) {
            echo json_encode([
                'status' => false,
                'message' => 'Parameter startDate, endDate, dan range wajib diisi'
            ]);
            return;
        }

        $this->load->model('Mod_pasien');
        $data = $this->Mod_pasien->get_filtered_data($start_date, $end_date);

        $total_diff = count($data);

        // Inisialisasi semua kategori
        $count = [
            'sistol_minus' => 0, 'sistol_lebih' => 0, 'sistol_tepat' => 0,
            'diastol_minus' => 0, 'diastol_lebih' => 0, 'diastol_tepat' => 0,
            'tinggi_bdn_minus' => 0, 'tinggi_bdn_lebih' => 0, 'tinggi_bdn_tepat' => 0,
            'berat_bdn_minus' => 0, 'berat_bdn_lebih' => 0, 'berat_bdn_tepat' => 0,
            'glukosa_minus' => 0, 'glukosa_lebih' => 0, 'glukosa_tepat' => 0,
        ];

        foreach ($data as $pasien) {
            // diff_sistol
            $count['sistol_minus'] += ($pasien->diff_sistol < -$range) ? 1 : 0;
            $count['sistol_lebih'] += ($pasien->diff_sistol > $range) ? 1 : 0;
            $count['sistol_tepat'] += (abs($pasien->diff_sistol) <= $range) ? 1 : 0;

            // diff_diastol
            $count['diastol_minus'] += ($pasien->diff_diastol < -$range) ? 1 : 0;
            $count['diastol_lebih'] += ($pasien->diff_diastol > $range) ? 1 : 0;
            $count['diastol_tepat'] += (abs($pasien->diff_diastol) <= $range) ? 1 : 0;

            // diff_tinggi_bdn
            $count['tinggi_bdn_minus'] += ($pasien->diff_tinggi_bdn < -$range) ? 1 : 0;
            $count['tinggi_bdn_lebih'] += ($pasien->diff_tinggi_bdn > $range) ? 1 : 0;
            $count['tinggi_bdn_tepat'] += (abs($pasien->diff_tinggi_bdn) <= $range) ? 1 : 0;

            // diff_berat_bdn
            $count['berat_bdn_minus'] += ($pasien->diff_berat_bdn < -$range) ? 1 : 0;
            $count['berat_bdn_lebih'] += ($pasien->diff_berat_bdn > $range) ? 1 : 0;
            $count['berat_bdn_tepat'] += (abs($pasien->diff_berat_bdn) <= $range) ? 1 : 0;

            // diff_glukosa
            $count['glukosa_minus'] += ($pasien->diff_glukosa < -$range) ? 1 : 0;
            $count['glukosa_lebih'] += ($pasien->diff_glukosa > $range) ? 1 : 0;
            $count['glukosa_tepat'] += (abs($pasien->diff_glukosa) <= $range) ? 1 : 0;
        }

        // Hitung persentase
        $persentase = [];
        foreach ($count as $key => $value) {
            $persentase[$key] = ($total_diff > 0) ? round(($value / $total_diff) * 100, 2) : 0;
        }

        echo json_encode([
            'status' => true,
            'message' => 'Berhasil menghitung persentase',
            'data' => $persentase
        ]);
    }

    public function add_manual()
    {
        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s', time());

        $data = array(
            'tgl_periksa' => $ins_time,
            'nik' => $this->input->post('nik_manual'),
            'nama' => $this->input->post('nama_manual'),
            'sistol' => $this->input->post('sistol_manual'),
            'diastol' => $this->input->post('diastol_manual'),
            'tinggi_bdn' => $this->input->post('tinggi_manual'),
            'berat_bdn' => $this->input->post('berat_manual'),
            'glukosa' => $this->input->post('glukosa_manual'),
            'asam_urat' => $this->input->post('asam_urat_manual'),
            'kolesterol' => $this->input->post('kolesterol_manual')
        );

        $this->load->model('Mod_periksa');
        $inserted = $this->Mod_periksa->add_manual($data);

        if ($inserted) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'message' => 'Data manual berhasil ditambahkan']));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal menambahkan data manual']));
        }
    }

    public function add_akm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s', time());

        $data = array(
            'tgl_periksa' => $ins_time,
            'nik' => $this->input->post('nik_akm'),
            'nama' => $this->input->post('nama_akm'),
            'sistol' => $this->input->post('sistol_akm'),
            'diastol' => $this->input->post('diastol_akm'),
            'tinggi_bdn' => $this->input->post('tinggi_akm'),
            'berat_bdn' => $this->input->post('berat_akm'),
            'glukosa' => $this->input->post('glukosa_akm')
        );

        $this->load->model('Mod_periksa');
        $inserted = $this->Mod_periksa->add_akm($data);

        if ($inserted) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'message' => 'Data AKM berhasil ditambahkan']));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Gagal menambahkan data AKM']));
        }
    }

}
