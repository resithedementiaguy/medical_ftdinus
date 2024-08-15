<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Periksa Pasien</h3>
                <p class="text-subtitle text-muted">Detail lengkap riwayat periksa pasien</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pasien') ?>">Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <h5 class="h5 mb-4">Data Pasien</h5>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div>
                            <a href="<?php echo site_url('penduduk/edit/' . $pasien['ktp_id']); ?>" class="badge bg-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col custom-table">
                        <div class="custom-row">
                            <div class="custom-label">NIK</div>
                            <div class="custom-data"><?php echo $pasien['nik']; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Nama Lengkap</div>
                            <div class="custom-data"><?php echo $pasien['nama']; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Jenis Kelamin</div>
                            <div class="custom-data">
                                <?php
                                if ($pasien['jenis_kelamin'] === 'L') {
                                    echo 'Laki-laki';
                                } elseif ($pasien['jenis_kelamin'] === 'P') {
                                    echo 'Perempuan';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Tempat Tanggal Lahir</div>
                            <div class="custom-data"><?php echo $pasien['tempat_lahir']; ?>, <?php echo formatDate($pasien['tanggal_lahir']); ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Umur</div>
                            <div class="custom-data"><?php echo $pasien['umur'] ?> tahun</div>
                        </div>
                        
                    </div>
                    <div class="col">
                        
                        <div class="custom-row">
                            <div class="custom-label">Alamat</div>
                            <div class="custom-data"><?php echo $pasien['alamat'] ?>, <?php echo $pasien['kelurahan']; ?>, <?php echo $pasien['kecamatan']; ?>, <?php echo $pasien['kota']; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Email</div>
                            <div class="custom-data"><?php echo $pasien['email']; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">No Telepon</div>
                            <div class="custom-data"><?php echo $pasien['no_hp']; ?></div>
                        </div>                        
                    </div>
                </div>
            </div>
    </section>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div>
                                <h5 class="h5 mb-4">Riwayat Periksa</h5>
                            </div>
                            <?php if (!empty($pasien['pasien_nik'])) : ?>
                                <div class="form-body mb-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="basicSelect">Data Antropometri</label>
                                        </div>
                                        <!-- Table untuk Suntik -->
                                        <div id="antropometri" class="mt-3">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal Periksa</th>
                                                            <th>Tinggi</th>
                                                            <th>Berat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($antropometri as $antro) : ?>
                                                            <tr>
                                                                <td><?= formatDateTime($antro->ins_time_datetime) ?></td>
                                                                <td><?= $antro->tinggi ?></td>
                                                                <td><?= $antro->berat ?></td>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="basicSelect">Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="alat">
                                                    <option value="" selected hidden>Pilih Alat</option>
                                                    <option value="suntik">Suntik</option>
                                                    <option value="ultraSound">Ultra Sound</option>
                                                    <option value="superBright">Super Bright</option>
                                                    <option value="magnetik">Magnetik</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                            <!-- Table untuk Suntik -->
                                            <div id="suntikFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Suntik</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Glukosa</th>
                                                                <th>HB</th>
                                                                <th>SPO2</th>
                                                                <th>Kolesterol</th>
                                                                <th>Asam Urat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($suntik as $suntik) : ?>
                                                                <?php if (!empty($suntik->glukosa) || !empty($suntik->hb) || !empty($suntik->spo2)) : ?>
                                                                <tr>
                                                                    <td><?= formatDateTime($suntik->ins_time) ?></td>
                                                                    <td><?= formatDateTime($suntik->upd_time) ?></td>
                                                                    <td><?= $suntik->glukosa ?></td>
                                                                    <td><?= $suntik->hb ?></td>
                                                                    <td><?= $suntik->spo2 ?></td>
                                                                    <td><?= $suntik->kolesterol ?></td>
                                                                    <td><?= $suntik->asam_urat ?></td>
                                                                    <td>
                                                                        <button type="button" class="badge bg-warning border-0 edit-suntik-btn" data-bs-toggle="modal" data-bs-target="#SuntikModal" data-id="<?= $suntik->id ?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_suntik/' . $suntik->id) ?>">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php endif;?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal Suntik -->
                                            <div class="modal fade" id="SuntikModal" tabindex="-1" role="dialog" aria-labelledby="SuntikModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="SuntikModalTitle">Edit Suntik</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="form form-horizontal" id="analisisForm" action="<?= base_url('pasien/update_suntik') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div id="SuntikFields">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Table untuk Ultrasound -->
                                            <div id="ultraSoundFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Ultrasound</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ultrasound as $us) : ?>
                                                                <?php if (!empty($us->ins_time) || !empty($us->upd_time)) : ?>
                                                                <tr>
                                                                    <td><?= formatDateTime($us->ins_time) ?></td>
                                                                    <td><?= formatDateTime($us->upd_time) ?></td>
                                                                    <td>
                                                                        <button type="button" class="badge bg-primary border-0 view-ultrasound-btn" data-bs-toggle="modal" data-bs-target="#ultraSoundModal" data-id="<?= $us->id ?>">
                                                                            <i class="fas fa-eye"></i> Lihat
                                                                        </button>
                                                                        <button type="button" class="badge bg-warning border-0 edit-ultrasound-btn" data-bs-toggle="modal" data-bs-target="#ultraSoundEditModal" data-id="<?= $us->id ?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_ultrasound/' . $us->id) ?>">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php endif;?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal Ultrasound -->
                                            <div class="modal fade" id="ultraSoundModal" tabindex="-1" role="dialog" aria-labelledby="ultraSoundModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ultraSoundModalTitle">Detail Ultrasound</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div id="ultraSoundFields">
                                                                        
                                                                        <div class="col">
                                                                            <label for="us1"><strong>Data Ultrasound 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us1" rows="5" placeholder="Data Ultrasound 1" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us2"><strong>Data Ultrasound 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us2" rows="5" placeholder="Data Ultrasound 2" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us3"><strong>Data Ultrasound 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us3" rows="5" placeholder="Data Ultrasound 3" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us4"><strong>Data Ultrasound 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us4" rows="5" placeholder="Data Ultrasound 4" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us5"><strong>Data Ultrasound 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us5" rows="5" placeholder="Data Ultrasound 5" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us6"><strong>Data Ultrasound 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us6" rows="5" placeholder="Data Ultrasound 6" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us7"><strong>Data Ultrasound 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us7" rows="5" placeholder="Data Ultrasound 7" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us8"><strong>Data Ultrasound 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us8" rows="5" placeholder="Data Ultrasound 8" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us9"><strong>Data Ultrasound 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us9" rows="5" placeholder="Data Ultrasound 9" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us10"><strong>Data Ultrasound 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="us10" rows="5" placeholder="Data Ultrasound 10" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal Ultrasound -->
                                            <div class="modal fade" id="ultraSoundEditModal" tabindex="-1" role="dialog" aria-labelledby="ultraSoundEditModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ultraSoundEditModalTitle">Edit Ultrasound</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                        <form class="" id="editUltrasoundForm" action="<?= base_url('pasien/update_ultrasound')?>" method="POST">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                
                                                                    <div id="ultraSoundFields">
                                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                                            <button type="button" id="ultraSoundSamBtn1" class="btn btn-light-primary me-1 mb-1 px-5">Sample 1-5</button>
                                                                            <button type="button" id="ultraSoundSamBtn2" class="btn btn-light-primary me-1 mb-1 px-5">Sample 6-10</button>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us1"><strong>Data Ultrasound 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us1" class="form-control" id="edit-us1" rows="5" placeholder="Data Ultrasound 1"></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us2"><strong>Data Ultrasound 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us2" class="form-control" id="edit-us2" rows="5" placeholder="Data Ultrasound 2" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us3"><strong>Data Ultrasound 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us3" class="form-control" id="edit-us3" rows="5" placeholder="Data Ultrasound 3" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us4"><strong>Data Ultrasound 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us4" class="form-control" id="edit-us4" rows="5" placeholder="Data Ultrasound 4" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us5"><strong>Data Ultrasound 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us5" class="form-control" id="edit-us5" rows="5" placeholder="Data Ultrasound 5" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us6"><strong>Data Ultrasound 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us6" class="form-control" id="edit-us6" rows="5" placeholder="Data Ultrasound 6" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us7"><strong>Data Ultrasound 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us7" class="form-control" id="edit-us7" rows="5" placeholder="Data Ultrasound 7" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us8"><strong>Data Ultrasound 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us8" class="form-control" id="edit-us8" rows="5" placeholder="Data Ultrasound 8" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us9"><strong>Data Ultrasound 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us9" class="form-control" id="edit-us9" rows="5" placeholder="Data Ultrasound 9" ></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="us10"><strong>Data Ultrasound 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="us10" class="form-control" id="edit-us10" rows="5" placeholder="Data Ultrasound 10" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-between">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batal</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Simpan</span>
                                                            </button>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Table untuk Super Bright -->
                                            <div id="superBrightFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Super Bright</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($superbright as $sb) : ?>
                                                                <?php if (!empty($sb->ins_time) || !empty($sb->upd_time)) : ?>
                                                                <tr>
                                                                    <td><?= formatDateTime($sb->ins_time) ?></td>
                                                                    <td><?= formatDateTime($sb->upd_time) ?></td>
                                                                    <td>
                                                                        <button type="button" class="badge bg-primary border-0 view-superbright-btn" data-bs-toggle="modal" data-bs-target="#superBrightModal" data-id="<?= $sb->id ?>">
                                                                            <i class="fas fa-eye"></i> Lihat
                                                                        </button>
                                                                        <button type="button" class="badge bg-warning border-0 edit-superbright-btn" data-bs-toggle="modal" data-bs-target="#superBrightEditModal" data-id="<?= $sb->id ?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_superbright/' . $sb->id) ?>">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php endif;?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal Super Bright -->
                                            <div class="modal fade" id="superBrightModal" tabindex="-1" role="dialog" aria-labelledby="superBrightModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="superBrightModalTitle">Detail Super Bright</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <!-- Fields untuk Super Bright -->
                                                                    <div id="superBrightFieldsDetail">
                                                                        <div class="col-md-12">
                                                                            <label for="sb1"><strong>Data Super Bright 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb1" rows="5" placeholder="Data Super Bright 1" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb2"><strong>Data Super Bright 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb2" rows="5" placeholder="Data Super Bright 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb3"><strong>Data Super Bright 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb3" rows="5" placeholder="Data Super Bright 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb4"><strong>Data Super Bright 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb4" rows="5" placeholder="Data Super Bright 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb5"><strong>Data Super Bright 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb5" rows="5" placeholder="Data Super Bright 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb6"><strong>Data Super Bright 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb6" rows="5" placeholder="Data Super Bright 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb7"><strong>Data Super Bright 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb7" rows="5" placeholder="Data Super Bright 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb8"><strong>Data Super Bright 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb8" rows="5" placeholder="Data Super Bright 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb9"><strong>Data Super Bright 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb9" rows="5" placeholder="Data Super Bright 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb10"><strong>Data Super Bright 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="sb10" rows="5" placeholder="Data Super Bright 10" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal Super Bright -->
                                            <div class="modal fade" id="superBrightEditModal" tabindex="-1" role="dialog" aria-labelledby="superBrightModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="superBrightModalTitle">Edit Super Bright</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                        <form action="" id="editSuperbrightForm" action="<?= base_url('pasien/update_superbright')?>" method="POST">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- Fields untuk Super Bright -->
                                                                    <div id="superBrightFieldsDetail">
                                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                                            <button type="button" id="superBrightSamBtn1" class="btn btn-light-primary me-1 mb-1 px-5">Sample 1-5</button>
                                                                            <button type="button" id="superBrightSamBtn2" class="btn btn-light-primary me-1 mb-1 px-5">Sample 6-10</button>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="sb1"><strong>Data Super Bright 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb1" class="form-control" id="edit-sb1" rows="5" placeholder="Data Super Bright 1" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb2"><strong>Data Super Bright 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb2" class="form-control" id="edit-sb2" rows="5" placeholder="Data Super Bright 2" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb3"><strong>Data Super Bright 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb3" class="form-control" id="edit-sb3" rows="5" placeholder="Data Super Bright 3" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb4"><strong>Data Super Bright 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb4" class="form-control" id="edit-sb4" rows="5" placeholder="Data Super Bright 4" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb5"><strong>Data Super Bright 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb5" class="form-control" id="edit-sb5" rows="5" placeholder="Data Super Bright 5" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb6"><strong>Data Super Bright 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb6" class="form-control" id="edit-sb6" rows="5" placeholder="Data Super Bright 6" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb7"><strong>Data Super Bright 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb7" class="form-control" id="edit-sb7" rows="5" placeholder="Data Super Bright 7" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb8"><strong>Data Super Bright 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb8" class="form-control" id="edit-sb8" rows="5" placeholder="Data Super Bright 8" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb9"><strong>Data Super Bright 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb9" class="form-control" id="edit-sb9" rows="5" placeholder="Data Super Bright 9" ></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="sb10"><strong>Data Super Bright 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sb10" class="form-control" id="edit-sb10" rows="5" placeholder="Data Super Bright 10" ></textarea>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-between">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batal</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Simpan</span>
                                                            </button>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Table untuk Magnetik -->
                                            <div id="magnetikFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Magnetik</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($magnetik as $mag) : ?>
                                                                <?php if (!empty($mag->ins_time) || !empty($mag->upd_time)) : ?>
                                                                <tr>
                                                                    <td><?= formatDateTime($mag->ins_time) ?></td>
                                                                    <td><?= formatDateTime($mag->upd_time) ?></td>
                                                                    <td>
                                                                        <button type="button" class="badge bg-primary border-0 view-magnetik-btn" data-bs-toggle="modal" data-bs-target="#MagnetikModal" data-id="<?= $mag->id ?>">
                                                                            <i class="fas fa-eye"></i> Lihat
                                                                        </button>
                                                                        <button type="button" class="badge bg-warning border-0 edit-magnetik-btn" data-bs-toggle="modal" data-bs-target="#MagnetikEditModal" data-id="<?= $mag->id ?>">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_magnetik/' . $mag->id) ?>">
                                                                            <i class="fas fa-trash"></i> Hapus
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php endif;?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal Magnetik -->
                                            <div class="modal fade" id="MagnetikModal" tabindex="-1" role="dialog" aria-labelledby="MagnetikModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="MagnetikModalTitle">Detail Magnetik</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <!-- Fields untuk Magnetik -->
                                                                    <div id="magnetikFieldsDetail">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Edit Modal Magnetik -->
                                            <div class="modal fade" id="MagnetikEditModal" tabindex="-1" role="dialog" aria-labelledby="MagnetikEditModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="MagnetikModalTitle">Edit Magnetik</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" id="editMagnetikForm" action="<?= base_url('pasien/update_magnetik')?>" method="POST">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- Fields untuk Magnetik -->
                                                                    <div id="magnetikFieldsDetail">
                                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                                            <button type="button" id="magnetikEditLeftBtn" class="btn btn-light-primary me-1 mb-1 px-5">Left Hand</button>
                                                                            <button type="button" id="magnetikEditRightBtn" class="btn btn-light-primary me-1 mb-1 px-5">Right Hand</button>
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Jantung</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag1" class="form-control" id="edit_jtg_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag2" class="form-control" id="edit_jtg_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag3" class="form-control" id="edit_jtg_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag4" class="form-control" id="edit_jtg_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag5" class="form-control" id="edit_jtg_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag6" class="form-control" id="edit_jtg_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag7" class="form-control" id="edit_jtg_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag8" class="form-control" id="edit_jtg_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag9" class="form-control" id="edit_jtg_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="jtg_mag10" class="form-control" id="edit_jtg_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                                                        </div>

                                                                        <div>
                                                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Sistem Saraf</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag1" class="form-control" id="edit_srf_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag2" class="form-control" id="edit_srf_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag3" class="form-control" id="edit_srf_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag4" class="form-control" id="edit_srf_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag5" class="form-control" id="edit_srf_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag6" class="form-control" id="edit_srf_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag7" class="form-control" id="edit_srf_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag8" class="form-control" id="edit_srf_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag9" class="form-control" id="edit_srf_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="srf_mag10" class="form-control" id="edit_srf_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                                                        </div>

                                                                        <div>
                                                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Darah dan Metabolisme</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag1" class="form-control" id="edit_drh_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag2" class="form-control" id="edit_drh_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag3" class="form-control" id="edit_drh_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag4" class="form-control" id="edit_drh_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag5" class="form-control" id="edit_drh_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag6" class="form-control" id="edit_drh_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag7" class="form-control" id="edit_drh_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag8" class="form-control" id="edit_drh_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag9" class="form-control" id="edit_drh_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="drh_mag10" class="form-control" id="edit_drh_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                                                        </div>

                                                                        <div>
                                                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Molekuler dan Sel</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag1" class="form-control" id="edit_sel_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag2" class="form-control" id="edit_sel_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag3" class="form-control" id="edit_sel_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag4" class="form-control" id="edit_sel_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag5" class="form-control" id="edit_sel_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag6" class="form-control" id="edit_sel_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag7" class="form-control" id="edit_sel_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag8" class="form-control" id="edit_sel_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag9" class="form-control" id="edit_sel_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="sel_mag10" class="form-control" id="edit_sel_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                                                        </div>

                                                                        <div>
                                                                            <h6 class="h6 mt-4 mb-4">Magnetik Frekuensi Tinggi</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag1" class="form-control" id="edit_tgi_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag2" class="form-control" id="edit_tgi_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag3" class="form-control" id="edit_tgi_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag4" class="form-control" id="edit_tgi_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag5" class="form-control" id="edit_tgi_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag6" class="form-control" id="edit_tgi_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag7" class="form-control" id="edit_tgi_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag8" class="form-control" id="edit_tgi_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag9" class="form-control" id="edit_tgi_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea name="tgi_mag10" class="form-control" id="edit_tgi_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-between">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batal</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Simpan</span>
                                                            </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php else : ?>
                                <div class="row justify-content-center">
                                    <div class="col-md-5 text-center">
                                        <div class="alert alert-light-warning">
                                            <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i></h4>
                                            <p>Pasien belum pernah periksa!</p>
                                            <p>Silahkan untuk periksa pasien terlebih dahulu.</p>
                                        </div>
                                        <a href="<?= base_url('analisis_darah') ?>" class="btn btn-primary me-1 mb-1 px-5">Periksa Pasien</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .custom-table {
        display: flex;
        flex-direction: column;
    }

    .custom-row {
        display: flex;
        padding: 10px 0;
    }

    .custom-row:last-child {
        border-bottom: none;
    }

    .custom-label {
        font-weight: bold;
        width: 225px;
    }

    .custom-data {
        flex: 1;
    }

    @media (max-width: 576px) {
        .custom-label {
            width: 150px;
        }
    }
</style>

<script>
    document.getElementById('basicSelect').addEventListener('change', function() {
        var alat = this.value;
        document.getElementById('suntikFields').style.display = alat === 'suntik' ? 'block' : 'none';
        document.getElementById('ultraSoundFields').style.display = alat === 'ultraSound' ? 'block' : 'none';
        document.getElementById('superBrightFields').style.display = alat === 'superBright' ? 'block' : 'none';
        document.getElementById('magnetikFields').style.display = alat === 'magnetik' ? 'block' : 'none';
    });

    // Edit Suntik
    $(document).ready(function() {
        // Ketika tombol edit diklik
        $('.edit-suntik-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_suntik/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#glukosa').val(data.glukosa);
                        $('#hb').val(data.hb);
                        $('#spo2').val(data.spo2);
                        $('#kolesterol').val(data.kolesterol);
                        $('#asam_urat').val(data.asam_urat);

                        $('#analisisForm').attr('action', '<?= base_url('Pasien/update_suntik/') ?>' + id);

                        $('#SuntikModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#analisisForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            var formData = $(this).serialize();
            var actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#SuntikModal').modal('hide');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
    });

    // Ultrasound
    $(document).ready(function() {
        $('.view-ultrasound-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_ultrasound/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#us1').val(data.us1);
                        $('#us2').val(data.us2);
                        $('#us3').val(data.us3);
                        $('#us4').val(data.us4);
                        $('#us5').val(data.us5);
                        $('#us6').val(data.us6);
                        $('#us7').val(data.us7);
                        $('#us8').val(data.us8);
                        $('#us9').val(data.us9);
                        $('#us10').val(data.us10);
                        $('#ultraSoundModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });
    });

    // Edit Ultrasound
    $(document).ready(function() {
        $('.edit-ultrasound-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_ultrasound/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editUltrasoundForm').attr('action', '<?= base_url('Pasien/update_ultrasound/') ?>' + id);
                        $('#ultraSoundEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editUltrasoundForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            var formData = $(this).serialize();
            var actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#ultraSoundEditModal').modal('hide');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
    });

    // Super Bright
    $(document).ready(function() {
        $('.view-superbright-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_superbright/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#sb1').val(data.sb1);
                        $('#sb2').val(data.sb2);
                        $('#sb3').val(data.sb3);
                        $('#sb4').val(data.sb4);
                        $('#sb5').val(data.sb5);
                        $('#sb6').val(data.sb6);
                        $('#sb7').val(data.sb7);
                        $('#sb8').val(data.sb8);
                        $('#sb9').val(data.sb9);
                        $('#sb10').val(data.sb10);
                        $('#superBrightModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });
    });

    // Edit Super Bright
    $(document).ready(function() {
        $('.edit-superbright-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_superbright/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editSuperbrightForm').attr('action', '<?= base_url('Pasien/update_superbright/') ?>' + id);
                        $('#superBrightEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editSuperbrightForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            var formData = $(this).serialize();
            var actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#superBrightEditModal').modal('hide');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
    });

    // Magnetik
    $(document).ready(function() {
        $('.view-magnetik-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_magnetik/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#jtg_mag1').val(data.jtg_mag1);
                        $('#jtg_mag2').val(data.jtg_mag2);
                        $('#jtg_mag3').val(data.jtg_mag3);
                        $('#jtg_mag4').val(data.jtg_mag4);
                        $('#jtg_mag5').val(data.jtg_mag5);
                        $('#jtg_mag6').val(data.jtg_mag6);
                        $('#jtg_mag7').val(data.jtg_mag7);
                        $('#jtg_mag8').val(data.jtg_mag8);
                        $('#jtg_mag9').val(data.jtg_mag9);
                        $('#jtg_mag10').val(data.jtg_mag10);

                        $('#srf_mag1').val(data.srf_mag1);
                        $('#srf_mag2').val(data.srf_mag2);
                        $('#srf_mag3').val(data.srf_mag3);
                        $('#srf_mag4').val(data.srf_mag4);
                        $('#srf_mag5').val(data.srf_mag5);
                        $('#srf_mag6').val(data.srf_mag6);
                        $('#srf_mag7').val(data.srf_mag7);
                        $('#srf_mag8').val(data.srf_mag8);
                        $('#srf_mag9').val(data.srf_mag9);
                        $('#srf_mag10').val(data.srf_mag10);

                        $('#drh_mag1').val(data.drh_mag1);
                        $('#drh_mag2').val(data.drh_mag2);
                        $('#drh_mag3').val(data.drh_mag3);
                        $('#drh_mag4').val(data.drh_mag4);
                        $('#drh_mag5').val(data.drh_mag5);
                        $('#drh_mag6').val(data.drh_mag6);
                        $('#drh_mag7').val(data.drh_mag7);
                        $('#drh_mag8').val(data.drh_mag8);
                        $('#drh_mag9').val(data.drh_mag9);
                        $('#drh_mag10').val(data.drh_mag10);

                        $('#sel_mag1').val(data.sel_mag1);
                        $('#sel_mag2').val(data.sel_mag2);
                        $('#sel_mag3').val(data.sel_mag3);
                        $('#sel_mag4').val(data.sel_mag4);
                        $('#sel_mag5').val(data.sel_mag5);
                        $('#sel_mag6').val(data.sel_mag6);
                        $('#sel_mag7').val(data.sel_mag7);
                        $('#sel_mag8').val(data.sel_mag8);
                        $('#sel_mag9').val(data.sel_mag9);
                        $('#sel_mag10').val(data.sel_mag10);

                        $('#tgi_mag1').val(data.tgi_mag1);
                        $('#tgi_mag2').val(data.tgi_mag2);
                        $('#tgi_mag3').val(data.tgi_mag3);
                        $('#tgi_mag4').val(data.tgi_mag4);
                        $('#tgi_mag5').val(data.tgi_mag5);
                        $('#tgi_mag6').val(data.tgi_mag6);
                        $('#tgi_mag7').val(data.tgi_mag7);
                        $('#tgi_mag8').val(data.tgi_mag8);
                        $('#tgi_mag9').val(data.tgi_mag9);
                        $('#tgi_mag10').val(data.tgi_mag10);
                        $('#MagnetikModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });
    });

    // Magnetik
    $(document).ready(function() {
        $('.edit-magnetik-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_magnetik/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editMagnetikForm').attr('action', '<?= base_url('Pasien/update_magnetik/') ?>' + id);
                        $('#MagnetikEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editMagnetikForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            var formData = $(this).serialize();
            var actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#MegnetikEditModal').modal('hide');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#magnetikEditLeftBtn').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit_jtg_mag1').val(data.jtg_mag1);
                        $('#edit_jtg_mag2').val(data.jtg_mag2);
                        $('#edit_jtg_mag3').val(data.jtg_mag3);
                        $('#edit_jtg_mag4').val(data.jtg_mag4);
                        $('#edit_jtg_mag5').val(data.jtg_mag5);

                        $('#edit_srf_mag1').val(data.srf_mag1);
                        $('#edit_srf_mag2').val(data.srf_mag2);
                        $('#edit_srf_mag3').val(data.srf_mag3);
                        $('#edit_srf_mag4').val(data.srf_mag4);
                        $('#edit_srf_mag5').val(data.srf_mag5);

                        $('#edit_drh_mag1').val(data.drh_mag1);
                        $('#edit_drh_mag2').val(data.drh_mag2);
                        $('#edit_drh_mag3').val(data.drh_mag3);
                        $('#edit_drh_mag4').val(data.drh_mag4);
                        $('#edit_drh_mag5').val(data.drh_mag5);

                        $('#edit_sel_mag1').val(data.sel_mag1);
                        $('#edit_sel_mag2').val(data.sel_mag2);
                        $('#edit_sel_mag3').val(data.sel_mag3);
                        $('#edit_sel_mag4').val(data.sel_mag4);
                        $('#edit_sel_mag5').val(data.sel_mag5);

                        $('#edit_tgi_mag1').val(data.tgi_mag1);
                        $('#edit_tgi_mag2').val(data.tgi_mag2);
                        $('#edit_tgi_mag3').val(data.tgi_mag3);
                        $('#edit_tgi_mag4').val(data.tgi_mag4);
                        $('#edit_tgi_mag5').val(data.tgi_mag5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#magnetikEditRightBtn').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit_jtg_mag6').val(data.jtg_mag1);
                        $('#edit_jtg_mag7').val(data.jtg_mag2);
                        $('#edit_jtg_mag8').val(data.jtg_mag3);
                        $('#edit_jtg_mag9').val(data.jtg_mag4);
                        $('#edit_jtg_mag10').val(data.jtg_mag5);

                        $('#edit_srf_mag6').val(data.srf_mag1);
                        $('#edit_srf_mag7').val(data.srf_mag2);
                        $('#edit_srf_mag8').val(data.srf_mag3);
                        $('#edit_srf_mag9').val(data.srf_mag4);
                        $('#edit_srf_mag10').val(data.srf_mag5);

                        $('#edit_drh_mag6').val(data.drh_mag1);
                        $('#edit_drh_mag7').val(data.drh_mag2);
                        $('#edit_drh_mag8').val(data.drh_mag3);
                        $('#edit_drh_mag9').val(data.drh_mag4);
                        $('#edit_drh_mag10').val(data.drh_mag5);

                        $('#edit_sel_mag6').val(data.sel_mag1);
                        $('#edit_sel_mag7').val(data.sel_mag2);
                        $('#edit_sel_mag8').val(data.sel_mag3);
                        $('#edit_sel_mag9').val(data.sel_mag4);
                        $('#edit_sel_mag10').val(data.sel_mag5);

                        $('#edit_tgi_mag6').val(data.tgi_mag1);
                        $('#edit_tgi_mag7').val(data.tgi_mag2);
                        $('#edit_tgi_mag8').val(data.tgi_mag3);
                        $('#edit_tgi_mag9').val(data.tgi_mag4);
                        $('#edit_tgi_mag10').val(data.tgi_mag5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#ultraSoundSamBtn1').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_ultrasound_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit-us1').val(data.us1);
                        $('#edit-us2').val(data.us2);
                        $('#edit-us3').val(data.us3);
                        $('#edit-us4').val(data.us4);
                        $('#edit-us5').val(data.us5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#ultraSoundSamBtn2').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_ultrasound_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit-us6').val(data.us1);
                        $('#edit-us7').val(data.us2);
                        $('#edit-us8').val(data.us3);
                        $('#edit-us9').val(data.us4);
                        $('#edit-us10').val(data.us5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#superBrightSamBtn1').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_superbright_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit-sb1').val(data.sb1);
                        $('#edit-sb2').val(data.sb2);
                        $('#edit-sb3').val(data.sb3);
                        $('#edit-sb4').val(data.sb4);
                        $('#edit-sb5').val(data.sb5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#superBrightSamBtn2').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_superbright_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit-sb6').val(data.sb1);
                        $('#edit-sb7').val(data.sb2);
                        $('#edit-sb8').val(data.sb3);
                        $('#edit-sb9').val(data.sb4);
                        $('#edit-sb10').val(data.sb5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>

<?php
// Format Tanggal dan Waktu
function formatDateTime($datetime)
{
    if (empty($datetime)) {
        return "-"; // Atau teks lain sesuai kebutuhan
    }

    $date = new DateTime($datetime);
    $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    $day = $date->format('d');
    $month = $months[(int)$date->format('m')];
    $year = $date->format('Y');
    $time = $date->format('H:i:s');

    return "{$day} {$month} {$year}, {$time} WIB";
}

// Format Tanggal
function formatDate($datetime)
{
    if (empty($datetime)) {
        return "-"; // Atau teks lain sesuai kebutuhan
    }

    $date = new DateTime($datetime);
    $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei',
        6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    $day = $date->format('d');
    $month = $months[(int)$date->format('m')];
    $year = $date->format('Y');

    return "{$day} {$month} {$year}";
}
?>