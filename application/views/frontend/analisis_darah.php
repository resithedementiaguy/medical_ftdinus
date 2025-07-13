<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pemeriksaan</h3>
                <p class="text-subtitle text-muted">Silahkan isi form di bawah untuk menyimpan data pemeriksaan sesuai alat</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pemeriksaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors() ?>
                                </div>
                            <?php endif; ?>
                            <form class="form form-horizontal" id="analisisForm" action="<?= base_url('analisis_darah/add') ?>" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div>
                                            <h5 class="h5 mb-4">Informasi Pasien</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nik">NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="choices form-select" id="nik" name="nik" required>
                                                    <option value="" selected hidden>Pilih NIK</option>
                                                    <?php foreach ($ktp as $data) : ?>
                                                        <option value="<?= $data->nik ?>" <?= set_select('nik', $data->nik) ?>><?= $data->nik ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" readonly value="<?= set_value('nama') ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tinggi">Tinggi Badan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tinggi" class="form-control" name="tinggi" placeholder="Tinggi Badan" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="berat">Berat Badan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="berat" class="form-control" name="berat" placeholder="Berat Badan" required>
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Alat Medical</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alat">Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="alat" name="alat" required>
                                                    <option value="" selected hidden>Pilih Alat</option>
                                                    <option value="asamUrat">Deteksi Asam Urat</option>
                                                    <option value="kolesterol">Deteksi Kolesterol</option>
                                                    <option value="glukosa">Deteksi Gula Darah</option>
                                                    <option value="superBright">SuperBright</option>
                                                    <option value="magnetik">Magnetik</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <!-- Fields untuk Suntik -->
                                        <div id="suntikFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Suntik</h6>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="glukosa">Glukosa</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="glukosa" class="form-control" name="glukosa" placeholder="Masukkan Glukosa" oninput="updateKeteranganGlukosa()">
                                                <span id="keterangan_glukosa"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="spo2">SPO2</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="spo2" class="form-control" name="spo2" placeholder="Masukkan SPO2" oninput="updateKeteranganSpO2()">
                                                <span id="keterangan_spo2"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="kolesterol">Kolesterol</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="kolesterol" class="form-control" name="kolesterol" placeholder="Masukkan kolesterol" oninput="updateKeteranganKolesterol()">
                                                <span id="keterangan_kolesterol"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="asam_urat">Asam Urat</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="asam_urat" class="form-control" name="asam_urat" placeholder="Masukkan Asam Urat" oninput="updateKeteranganAsamUrat()">
                                                <span id="keterangan_asam_urat"></span>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Deteksi Asam Urat -->
                                        <div id="asamFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Deteksi Asam Urat</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="asam_manual">Data Manual</label>
                                            </div>
                                            <div class="col-md form-group">
                                                <input type="text" id="asam_manual" class="form-control" name="asam_manual" placeholder="Asam Urat Manual">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tinggi">Data Sensor</label>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="asamBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="violet">Sinyal Violet</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_violet" name="asam_violet" rows="5" placeholder="Sinyal Violet" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="blue">Sinyal Blue</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_blue" name="asam_blue" rows="5" placeholder="Sinyal Blue" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="green">Sinyal Green</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_green" name="asam_green" rows="5" placeholder="Sinyal Green" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="yellow">Sinyal Yellow</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_yellow" name="asam_yellow" rows="5" placeholder="Sinyal Yellow" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="orange">Sinyal Orange</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_orange" name="asam_orange" rows="5" placeholder="Sinyal Orange" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="red">Sinyal Red</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="asam_red" name="asam_red" rows="5" placeholder="Sinyal Red" readonly></textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Deteksi Kolesterol -->
                                        <div id="kolesterolFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Deteksi Kolesterol</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="kolesterol_manual">Data Manual</label>
                                            </div>
                                            <div class="col-md form-group">
                                                <input type="text" id="kolesterol_manual" class="form-control" name="kolesterol_manual" placeholder="Kolesterol Manual">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tinggi">Data Sensor</label>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="kolesterolBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="violet">Sinyal Violet</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_violet" name="kolesterol_violet" rows="5" placeholder="Sinyal Violet" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="blue">Sinyal Blue</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_blue" name="kolesterol_blue" rows="5" placeholder="Sinyal Blue" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="green">Sinyal Green</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_green" name="kolesterol_green" rows="5" placeholder="Sinyal Green" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="yellow">Sinyal Yellow</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_yellow" name="kolesterol_yellow" rows="5" placeholder="Sinyal Yellow" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="orange">Sinyal Orange</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_orange" name="kolesterol_orange" rows="5" placeholder="Sinyal Orange" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="red">Sinyal Red</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="kolesterol_red" name="kolesterol_red" rows="5" placeholder="Sinyal Red" readonly></textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Deteksi Glukosa -->
                                        <div id="glukosaFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Deteksi Kolesterol</h6>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="glukosaBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="gula_darah">Gula Darah</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="gula_darah" name="gula_darah" rows="5" placeholder="Gula Darah" readonly></textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Super Bright -->
                                        <div id="superBrightFields" style="display: none;">
                                            <br>
                                            <h5 class="text text-danger">*Pemeriksaan superbright dilakukan mulai dari tangan kiri lalu ke tangan kanan</h5>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Superbright</h6>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="superBrightBtn1" class="btn btn-light-primary me-1 mb-1 px-5">Sample 1-5</button>
                                                <button type="button" id="superBrightBtn2" class="btn btn-light-primary me-1 mb-1 px-5">Sample 6-10</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb1">Sinyal Super Bright 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb1" name="sb1" rows="5" placeholder="Sinyal Super Bright 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb2">Sinyal Super Bright 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb2" name="sb2" rows="5" placeholder="Sinyal Super Bright 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb3">Sinyal Super Bright 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb3" name="sb3" rows="5" placeholder="Sinyal Super Bright 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb4">Sinyal Super Bright 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb4" name="sb4" rows="5" placeholder="Sinyal Super Bright 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb5">Sinyal Super Bright 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb5" name="sb5" rows="5" placeholder="Sinyal Super Bright 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb6">Sinyal Super Bright 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb6" name="sb6" rows="5" placeholder="Sinyal Super Bright 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb7">Sinyal Super Bright 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb7" name="sb7" rows="5" placeholder="Sinyal Super Bright 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb8">Sinyal Super Bright 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb8" name="sb8" rows="5" placeholder="Sinyal Super Bright 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb9">Sinyal Super Bright 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb9" name="sb9" rows="5" placeholder="Sinyal Super Bright 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb10">Sinyal Super Bright 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb10" name="sb10" rows="5" placeholder="Sinyal Super Bright 10" readonly></textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Magnetik -->
                                        <div id="magnetikFields" style="display: none;">
                                            <br>
                                            <h5 class="text text-danger">*Pemeriksaan magnetik dilakukan mulai dari tangan kiri lalu ke tangan kanan</h5>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik</h6>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="magnetikLeftBtn" class="btn btn-light-primary me-1 mb-1 px-5">Left Hand</button>
                                                <button type="button" id="magnetikRightBtn" class="btn btn-light-primary me-1 mb-1 px-5">Right Hand</button>
                                            </div>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik Analisis Jantung</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag1" name="jtg_mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag2" name="jtg_mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag3" name="jtg_mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag4" name="jtg_mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag5" name="jtg_mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag6" name="jtg_mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag7" name="jtg_mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag8" name="jtg_mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag9" name="jtg_mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="jtg_mag10" name="jtg_mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly></textarea>
                                            </div>
                                            <hr>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik Analisis Sistem Saraf</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag1" name="srf_mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag2" name="srf_mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag3" name="srf_mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag4" name="srf_mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag5" name="srf_mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag6" name="srf_mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag7" name="srf_mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag8" name="srf_mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag9" name="srf_mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="srf_mag10" name="srf_mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly></textarea>
                                            </div>
                                            <hr>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik Analisis Darah dan Metabolisme</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag1" name="drh_mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag2" name="drh_mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag3" name="drh_mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag4" name="drh_mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag5" name="drh_mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag6" name="drh_mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag7" name="drh_mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag8" name="drh_mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag9" name="drh_mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="drh_mag10" name="drh_mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly></textarea>
                                            </div>
                                            <hr>
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik Analisis Molekuler dan Sel</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag1" name="sel_mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag2" name="sel_mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag3" name="sel_mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag4" name="sel_mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag5" name="sel_mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag6" name="sel_mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag7" name="sel_mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag8" name="sel_mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag9" name="sel_mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sel_mag10" name="sel_mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly></textarea>
                                            </div>
                                            <hr>

                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik Frekuensi Tinggi</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag1" name="tgi_mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag2" name="tgi_mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag3" name="tgi_mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag4" name="tgi_mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag5" name="tgi_mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag6" name="tgi_mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag7" name="tgi_mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag8" name="tgi_mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag9" name="tgi_mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="tgi_mag10" name="tgi_mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly></textarea>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" id="lewatiButton" class="btn btn-light-secondary me-3 mb-1 px-5">Lewati</button>
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="lewatiModal" tabindex="-1" aria-labelledby="lewatiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lewatiModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin melewati input data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmLewatiButton">Ya, Lewati</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pilih nik dan alat -->
<div class="modal modal-borderless fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Peringatan Simpan!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pilih NIK dan alat terlebih dahulu sebelum simpan data.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal modal-borderless fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="bi bi-check-circle text-success" style="font-size: 3rem;"></i>
                    <p class="mt-3">Data alat berhasil ditambahkan!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Validation Error Modal -->
<div class="modal fade" id="validationErrorModal" tabindex="-1" aria-labelledby="validationErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validationErrorModalLabel">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger">
                        <?= validation_errors() ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle NIK change
        $('#nik').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?= base_url('analisis_darah/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: { nik: selectedNik },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama').val(response ? response : '');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('#nama').val('');
            }
        });

        // Show validation errors modal if there are validation errors
        <?php if (validation_errors()) : ?>
            var validationErrorModal = new bootstrap.Modal(document.getElementById('validationErrorModal'));
            validationErrorModal.show();
        <?php endif; ?>

        // Show success modal if form submission was successful
        <?php if ($this->session->flashdata('success')) : ?>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            
            // Auto close success modal after 2 seconds
            setTimeout(function() {
                successModal.hide();
                // Optional: redirect after success
                // window.location.href = '<?= base_url("analisis_darah") ?>';
            }, 2000);
        <?php endif; ?>

        // Handle form submission
        $('#analisisForm').submit(function(e) {
            var nik = $('#nik').val();
            var alat = $('#alat').val();

            if (!nik || !alat) {
                e.preventDefault();
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
                return false;
            }

            // Disable submit button to prevent double submission
            $(this).find('button[type="submit"]').prop('disabled', true);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Function for getting name based on selected NIK
        $('#nik').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?= base_url('analisis_darah/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: {
                        nik: selectedNik
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama').val(response ? response : '');
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                $('#nama').val('');
            }
        });
        
        // Handle "Lewati" button click
        $('#lewatiButton').click(function() {
            $('#lewatiModal').modal('show');
        });

        // Handle confirm "Lewati" button click in modal
        $('#confirmLewatiButton').click(function() {
            $.ajax({
                url: '<?= base_url('analisis_darah/clear_session_id'); ?>',
                type: 'POST',
                success: function(response) {
                    // Reset the form and re-enable all options
                    $('#analisisForm')[0].reset();
                    $('#alat option').prop('disabled', false).show();
                    $('#suntikFields, #ultraSoundFields, #superBrightFields, #magnetikFields').hide();
                    // Reload the page to refresh all AJAX functions
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });

        // Handle confirm "Lewati" button click in modal
        $('#tutupButton').click(function() {
            $.ajax({
                url: '<?= base_url('analisis_darah/clear_session_id'); ?>',
                type: 'POST',
                success: function(response) {
                    // Reset the form and re-enable all options
                    $('#analisisForm')[0].reset();
                    $('#alat option').prop('disabled', false).show();
                    $('#suntikFields, #ultraSoundFields, #superBrightFields, #magnetikFields').hide();
                    // Reload the page to refresh all AJAX functions
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });
    });

    // Function select alat sembunyi
    document.addEventListener('DOMContentLoaded', function() {
        const alatSelect = document.getElementById('alat');
        const suntikFields = document.getElementById('suntikFields');
        const asamFields = document.getElementById('asamFields');
        const kolesterolFields = document.getElementById('kolesterolFields');
        const glukosaFields = document.getElementById('glukosaFields');
        const superBrightFields = document.getElementById('superBrightFields');
        const magnetikFields = document.getElementById('magnetikFields');

        function toggleFields() {
            const selectedAlat = alatSelect.value;

            suntikFields.style.display = selectedAlat === 'suntik' ? 'block' : 'none';
            asamFields.style.display = selectedAlat === 'asamUrat' ? 'block' : 'none';
            kolesterolFields.style.display = selectedAlat === 'kolesterol' ? 'block' : 'none';
            glukosaFields.style.display = selectedAlat === 'glukosa' ? 'block' : 'none';
            superBrightFields.style.display = selectedAlat === 'superBright' ? 'block' : 'none';
            magnetikFields.style.display = selectedAlat === 'magnetik' ? 'block' : 'none';
        }

        alatSelect.addEventListener('change', toggleFields);

        // Initialize the fields on page load
        toggleFields();
    });

    // Function field alat sembunyi
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('analisisForm');
        var alatSelect = document.getElementById('alat');

        alatSelect.addEventListener('change', function() {
            var selectedValue = alatSelect.value;

            // Menampilkan field sesuai dengan pilihan alat
            var fields = ["suntikFields", "deteksiFields", "superBrightFields", "magnetikFields"];
            fields.forEach(function(field) {
                document.getElementById(field).style.display = "none";
            });

            if (selectedValue) {
                document.getElementById(selectedValue + "Fields").style.display = "block";
            }
        });

        // Tampilkan field yang sesuai saat halaman dimuat
        alatSelect.dispatchEvent(new Event('change'));
    });


    document.getElementById('asamBtn').addEventListener('click', function() {
        var asamId = 1;

        // Ambil data_asam dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_asam_urat_data/' + asamId)
            .then(response => response.json())
            .then(data_asam => {
                // Mengisi nilai textarea dengan data dari data_asam
                document.getElementById('asam_violet').value = data_asam.violet || '';
                document.getElementById('asam_blue').value = data_asam.blue || '';
                document.getElementById('asam_green').value = data_asam.green || '';
                document.getElementById('asam_yellow').value = data_asam.yellow || '';
                document.getElementById('asam_orange').value = data_asam.orange || '';
                document.getElementById('asam_red').value = data_asam.red || '';

                // Tampilkan div asamFields (jika sebelumnya disembunyikan)
                document.getElementById('asamFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('kolesterolBtn').addEventListener('click', function() {
        var kolesterolId = 1;

        // Ambil data_kolesterol dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_kolesterol_data/' + kolesterolId)
            .then(response => response.json())
            .then(data_kolesterol => {
                // Mengisi nilai textarea dengan data dari data_kolesterol
                document.getElementById('kolesterol_violet').value = data_kolesterol.violet || '';
                document.getElementById('kolesterol_blue').value = data_kolesterol.blue || '';
                document.getElementById('kolesterol_green').value = data_kolesterol.green || '';
                document.getElementById('kolesterol_yellow').value = data_kolesterol.yellow || '';
                document.getElementById('kolesterol_orange').value = data_kolesterol.orange || '';
                document.getElementById('kolesterol_red').value = data_kolesterol.red || '';

                // Tampilkan div asamFields (jika sebelumnya disembunyikan)
                document.getElementById('kolesterolFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('glukosaBtn').addEventListener('click', function() {
        var glukosaId = 1;

        // Ambil data_glukosa dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_glukosa_data/' + glukosaId)
            .then(response => response.json())
            .then(data_glukosa => {
                // Mengisi nilai textarea dengan data dari data_glukosa
                document.getElementById('gula_darah').value = data_glukosa.nilai_glukosa || '';

                // Tampilkan div asamFields (jika sebelumnya disembunyikan)
                document.getElementById('glukosaFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('superBrightBtn1').addEventListener('click', function() {
        var superbrightId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_superbright_data/' + superbrightId)
            .then(response => response.json())
            .then(data_sb => {
                // Mengisi nilai textarea dengan data dari data_sb
                document.getElementById('sb1').value = data_sb.sb1 || '';
                document.getElementById('sb2').value = data_sb.sb2 || '';
                document.getElementById('sb3').value = data_sb.sb3 || '';
                document.getElementById('sb4').value = data_sb.sb4 || '';
                document.getElementById('sb5').value = data_sb.sb5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('superBrightFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('superBrightBtn2').addEventListener('click', function() {
        var superbrightId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_superbright_data/' + superbrightId)
            .then(response => response.json())
            .then(data_sb => {
                // Mengisi nilai textarea dengan data dari data_sb
                document.getElementById('sb6').value = data_sb.sb1 || '';
                document.getElementById('sb7').value = data_sb.sb2 || '';
                document.getElementById('sb8').value = data_sb.sb3 || '';
                document.getElementById('sb9').value = data_sb.sb4 || '';
                document.getElementById('sb10').value = data_sb.sb5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('superBrightFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('magnetikLeftBtn').addEventListener('click', function() {
        var magnetikId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_magnetik_data/' + magnetikId)
            .then(response => response.json())
            .then(data_mag => {
                // Mengisi nilai textarea dengan data dari data_mag
                document.getElementById('jtg_mag1').value = data_mag.jtg_mag1 || '';
                document.getElementById('jtg_mag2').value = data_mag.jtg_mag2 || '';
                document.getElementById('jtg_mag3').value = data_mag.jtg_mag3 || '';
                document.getElementById('jtg_mag4').value = data_mag.jtg_mag4 || '';
                document.getElementById('jtg_mag5').value = data_mag.jtg_mag5 || '';

                document.getElementById('srf_mag1').value = data_mag.srf_mag1 || '';
                document.getElementById('srf_mag2').value = data_mag.srf_mag2 || '';
                document.getElementById('srf_mag3').value = data_mag.srf_mag3 || '';
                document.getElementById('srf_mag4').value = data_mag.srf_mag4 || '';
                document.getElementById('srf_mag5').value = data_mag.srf_mag5 || '';

                document.getElementById('drh_mag1').value = data_mag.drh_mag1 || '';
                document.getElementById('drh_mag2').value = data_mag.drh_mag2 || '';
                document.getElementById('drh_mag3').value = data_mag.drh_mag3 || '';
                document.getElementById('drh_mag4').value = data_mag.drh_mag4 || '';
                document.getElementById('drh_mag5').value = data_mag.drh_mag5 || '';

                document.getElementById('sel_mag1').value = data_mag.sel_mag1 || '';
                document.getElementById('sel_mag2').value = data_mag.sel_mag2 || '';
                document.getElementById('sel_mag3').value = data_mag.sel_mag3 || '';
                document.getElementById('sel_mag4').value = data_mag.sel_mag4 || '';
                document.getElementById('sel_mag5').value = data_mag.sel_mag5 || '';

                document.getElementById('tgi_mag1').value = data_mag.tgi_mag1 || '';
                document.getElementById('tgi_mag2').value = data_mag.tgi_mag2 || '';
                document.getElementById('tgi_mag3').value = data_mag.tgi_mag3 || '';
                document.getElementById('tgi_mag4').value = data_mag.tgi_mag4 || '';
                document.getElementById('tgi_mag5').value = data_mag.tgi_mag5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('magnetikFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('magnetikRightBtn').addEventListener('click', function() {
        var magnetikId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_magnetik_data/' + magnetikId)
            .then(response => response.json())
            .then(data_mag => {
                // Mengisi nilai textarea dengan data dari data_mag
                document.getElementById('jtg_mag6').value = data_mag.jtg_mag1 || '';
                document.getElementById('jtg_mag7').value = data_mag.jtg_mag2 || '';
                document.getElementById('jtg_mag8').value = data_mag.jtg_mag3 || '';
                document.getElementById('jtg_mag9').value = data_mag.jtg_mag4 || '';
                document.getElementById('jtg_mag10').value = data_mag.jtg_mag5 || '';

                document.getElementById('srf_mag6').value = data_mag.srf_mag1 || '';
                document.getElementById('srf_mag7').value = data_mag.srf_mag2 || '';
                document.getElementById('srf_mag8').value = data_mag.srf_mag3 || '';
                document.getElementById('srf_mag9').value = data_mag.srf_mag4 || '';
                document.getElementById('srf_mag10').value = data_mag.srf_mag5 || '';

                document.getElementById('drh_mag6').value = data_mag.drh_mag1 || '';
                document.getElementById('drh_mag7').value = data_mag.drh_mag2 || '';
                document.getElementById('drh_mag8').value = data_mag.drh_mag3 || '';
                document.getElementById('drh_mag9').value = data_mag.drh_mag4 || '';
                document.getElementById('drh_mag10').value = data_mag.drh_mag5 || '';

                document.getElementById('sel_mag6').value = data_mag.sel_mag1 || '';
                document.getElementById('sel_mag7').value = data_mag.sel_mag2 || '';
                document.getElementById('sel_mag8').value = data_mag.sel_mag3 || '';
                document.getElementById('sel_mag9').value = data_mag.sel_mag4 || '';
                document.getElementById('sel_mag10').value = data_mag.sel_mag5 || '';

                document.getElementById('tgi_mag6').value = data_mag.tgi_mag1 || '';
                document.getElementById('tgi_mag7').value = data_mag.tgi_mag2 || '';
                document.getElementById('tgi_mag8').value = data_mag.tgi_mag3 || '';
                document.getElementById('tgi_mag9').value = data_mag.tgi_mag4 || '';
                document.getElementById('tgi_mag10').value = data_mag.tgi_mag5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('magnetikFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    $(document).ready(function() {
        $('#nik').select2({
            placeholder: "Pilih NIK",
            allowClear: true
        });
    });

    function updateKeteranganSpO2() {
        const spo2 = parseInt(document.getElementById("spo2").value);
        const keteranganSpO2 = document.getElementById("keterangan_spo2");

        if (!spo2) {
            keteranganSpO2.textContent = "";
            return;
        }

        if (spo2 >= 95 && spo2 <= 100) {
            keteranganSpO2.textContent = "Normal";
            keteranganSpO2.style.color = "green";
        } else if (spo2 >= 90 && spo2 < 95) {
            keteranganSpO2.textContent = "Hipoksemia Ringan (Perlu Pemantauan)";
            keteranganSpO2.style.color = "orange";
        } else if (spo2 >= 80 && spo2 < 90) {
            keteranganSpO2.textContent = "Hipoksemia Sedang (Perlu Penanganan)";
            keteranganSpO2.style.color = "red";
        } else if (spo2 < 80) {
            keteranganSpO2.textContent = "Hipoksemia Berat (Darurat Medis)";
            keteranganSpO2.style.color = "darkred";
        } else {
            keteranganSpO2.textContent = "Tidak dikenali";
            keteranganSpO2.style.color = "black";
        }
    }

    function updateKeteranganGlukosa() {
    const glukosa = document.getElementById("glukosa").value;
    const keteranganSpan = document.getElementById("keterangan_glukosa");

    if (glukosa === "") {
        keteranganSpan.textContent = "";
        keteranganSpan.style.color = "black";
        return;
    }

    const glukosaValue = parseFloat(glukosa);

    if (glukosaValue < 70) {
        keteranganSpan.textContent = "Rendah (Hipoglikemia)";
        keteranganSpan.style.color = "red";
    } else if (glukosaValue >= 70 && glukosaValue <= 140) {
        keteranganSpan.textContent = "Normal";
        keteranganSpan.style.color = "green";
    } else if (glukosaValue > 140 && glukosaValue <= 199) {
        keteranganSpan.textContent = "Pre-diabetes";
        keteranganSpan.style.color = "orange";
    } else {
        keteranganSpan.textContent = "Diabetes";
        keteranganSpan.style.color = "red";
    }
}

function updateKeteranganAsamUrat() {
    const asamUrat = document.getElementById("asam_urat").value;
    const keteranganSpan = document.getElementById("keterangan_asam_urat");

    if (asamUrat === "") {
        keteranganSpan.textContent = "";
        keteranganSpan.style.color = "black";
        return;
    }

    const asamUratValue = parseFloat(asamUrat);

    if (asamUratValue < 3.5) {
        keteranganSpan.textContent = "Rendah";
        keteranganSpan.style.color = "red";
    } else if (asamUratValue >= 3.5 && asamUratValue <= 7.2) {
        keteranganSpan.textContent = "Normal";
        keteranganSpan.style.color = "green";
    } else {
        keteranganSpan.textContent = "Tinggi (Hiperurisemia)";
        keteranganSpan.style.color = "red";
    }
}

function updateKeteranganKolesterol() {
    const kolesterol = document.getElementById("kolesterol").value;
    const keteranganKolesterol = document.getElementById("keterangan_kolesterol");

    if (kolesterol === "") {
        keteranganKolesterol.textContent = "";
        return;
    }

    const kolesterolValue = parseFloat(kolesterol);

    if (kolesterolValue < 200 && kolesterolValue >= 120) {
        keteranganKolesterol.textContent = "Normal";
        keteranganKolesterol.style.color = "green";
    } else if (kolesterolValue >= 200 && kolesterolValue < 240) {
        keteranganKolesterol.textContent = "Borderline (Waspada)";
        keteranganKolesterol.style.color = "orange";
    } else if (kolesterolValue < 120) {
        keteranganKolesterol.textContent = "Sangat Rendah (Berisiko)";
        keteranganKolesterol.style.color = "red";
    } else {
        keteranganKolesterol.textContent = "Tinggi (Berisiko)";
        keteranganKolesterol.style.color = "red";
    }
}
</script>