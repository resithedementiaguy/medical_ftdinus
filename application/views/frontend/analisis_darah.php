<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Analisis Darah</h3>
                <p class="text-subtitle text-muted">Silahkan isi form di bawah untuk analisis darah</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analisis Darah</li>
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
                                                <select class="choices form-select" id="nik" name="nik">
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
                                            <input type="text" id="tinggi" class="form-control" name="tinggi" placeholder="Tinggi Badan" data-parsley-required="true" data-parsley-error-message="Tinggi Badan wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="berat">Berat Badan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="berat" class="form-control" name="berat" placeholder="Berat Badan" data-parsley-required="true" data-parsley-error-message="Berat Badan wajib diisi!">
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Alat Medical</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alat">Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="alat" name="alat">
                                                    <option value="" selected hidden>Pilih Alat</option>
                                                    <option value="suntik">Suntik</option>
                                                    <option value="ultraSound">Ultrasound</option>
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
                                                <input type="text" id="glukosa" class="form-control" name="glukosa" placeholder="Masukkan Glukosa">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="hb">HB</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="hb" class="form-control" name="hb" placeholder="Masukkan HB">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="spo2">SPO2</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="spo2" class="form-control" name="spo2" placeholder="Masukkan SPO2">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="kolesterol">Kolesterol</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="kolesterol" class="form-control" name="kolesterol" placeholder="Masukkan kolesterol">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="asam_urat">Asam Urat</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="asam_urat" class="form-control" name="asam_urat" placeholder="Masukkan Asam Urat">
                                            </div>
                                        </div>

                                        <!-- Fields untuk Ultrasound -->
                                        <div id="ultraSoundFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Ultrasound</h6>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="button" id="ultraSoundBtn1" class="btn btn-light-primary me-1 mb-1 px-5">Sample 1-5</button>
                                                <button type="button" id="ultraSoundBtn2" class="btn btn-light-primary me-1 mb-1 px-5">Sample 6-10</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us1">Sinyal Ultrasound 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us1" name="us1" rows="5" placeholder="Sinyal Ultrasound 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us2">Sinyal Ultrasound 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us2" name="us2" rows="5" placeholder="Sinyal Ultrasound 2" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us3">Sinyal Ultrasound 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us3" name="us3" rows="5" placeholder="Sinyal Ultrasound 3" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us4">Sinyal Ultrasound 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us4" name="us4" rows="5" placeholder="Sinyal Ultrasound 4" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us5">Sinyal Ultrasound 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us5" name="us5" rows="5" placeholder="Sinyal Ultrasound 5" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us6">Sinyal Ultrasound 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us6" name="us6" rows="5" placeholder="Sinyal Ultrasound 6" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us7">Sinyal Ultrasound 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us7" name="us7" rows="5" placeholder="Sinyal Ultrasound 7" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us8">Sinyal Ultrasound 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us8" name="us8" rows="5" placeholder="Sinyal Ultrasound 8" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us9">Sinyal Ultrasound 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us9" name="us9" rows="5" placeholder="Sinyal Ultrasound 9" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us10">Sinyal Ultrasound 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us10" name="us10" rows="5" placeholder="Sinyal Ultrasound 10" readonly></textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Super Bright -->
                                        <div id="superBrightFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Super Bright</h6>
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

<!-- Modal berhasil  -->
<div class="modal modal-borderless fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Data alat berhasil ditambahkan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lanjut</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function fetchData() {
        try {
            const response = await fetch('http://localhost/medical_ftdinus/analisis_darah/get_data');
            const data = await response.json();
            const textarea = document.getElementById('us1');
            textarea.value = data.join('\n');
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    setInterval(fetchData, 1000);
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

        // Function for form submission
        $('#analisisForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var selectedNik = $('#nik').val();
            var selectedNama = $('#nama').val();
            var selectedAlat = $('#alat').val();
            var tinggi = $('#tinggi').val();
            var berat = $('#berat').val();

            if (selectedNik === "" || selectedAlat === "") {
                $('#errorModal').modal('show');
                return;
            }

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#successModal').modal('show');

                    console.log('Jumlah opsi di #alat:', $('#alat option').length);

                    // Check if there are only default options left
                    if ($('#alat option').length === 2) {
                        // Show success modal
                        $('#successModal').on('hide.bs.modal', function() {
                            $.ajax({
                                url: '<?php echo site_url('analisis_darah/clear_session_id'); ?>',
                                type: 'POST',
                                success: function(response) {
                                    location.reload();
                                }
                            });
                        });
                    } else {
                        // Remove selected option and reset form
                        $('#alat option:selected').remove();
                        $('#analisisForm')[0].reset();
                        $('#nik').val(selectedNik);
                        $('#nama').val(selectedNama);
                        $('#nama').val($('#nama').val());
                        $('#tinggi').val(tinggi);
                        $('#berat').val(berat);

                        // Hide fields related to the selected alat
                        $('#' + selectedAlat + 'Fields').hide();
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
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
    });

    // Function select alat sembunyi
    document.addEventListener('DOMContentLoaded', function() {
        const alatSelect = document.getElementById('alat');
        const suntikFields = document.getElementById('suntikFields');
        const ultraSoundFields = document.getElementById('ultraSoundFields');
        const superBrightFields = document.getElementById('superBrightFields');
        const magnetikFields = document.getElementById('magnetikFields');

        function toggleFields() {
            const selectedAlat = alatSelect.value;

            suntikFields.style.display = selectedAlat === 'suntik' ? 'block' : 'none';
            ultraSoundFields.style.display = selectedAlat === 'ultraSound' ? 'block' : 'none';
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
            var fields = ["suntikFields", "ultraSoundFields", "superBrightFields", "magnetikFields"];
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


    document.getElementById('ultraSoundBtn1').addEventListener('click', function() {
        var ultrasoundId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_ultrasound_data/' + ultrasoundId)
            .then(response => response.json())
            .then(data_us => {
                // Mengisi nilai textarea dengan data dari data_us
                document.getElementById('us1').value = data_us.us1 || '';
                document.getElementById('us2').value = data_us.us2 || '';
                document.getElementById('us3').value = data_us.us3 || '';
                document.getElementById('us4').value = data_us.us4 || '';
                document.getElementById('us5').value = data_us.us5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('ultraSoundFields').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('ultraSoundBtn2').addEventListener('click', function() {
        var ultrasoundId = 1;

        // Ambil data_us dari API (controller) menggunakan AJAX
        fetch('analisis_darah/get_ultrasound_data/' + ultrasoundId)
            .then(response => response.json())
            .then(data_us => {
                // Mengisi nilai textarea dengan data dari data_us
                document.getElementById('us6').value = data_us.us1 || '';
                document.getElementById('us7').value = data_us.us2 || '';
                document.getElementById('us8').value = data_us.us3 || '';
                document.getElementById('us9').value = data_us.us4 || '';
                document.getElementById('us10').value = data_us.us5 || '';

                // Tampilkan div ultraSoundFields (jika sebelumnya disembunyikan)
                document.getElementById('ultraSoundFields').style.display = 'block';
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
</script>