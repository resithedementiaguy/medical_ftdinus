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
                    <div class="card-body">
                        <div>
                            <h5 class="h5 mb-4">Riwayat Periksa</h5>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Periksa Alat</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Komparasi</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show mt-4 active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                        <option value="asamUrat">Deteksi Asam Urat</option>
                                                        <option value="kolesterol">Deteksi Kolesterol</option>
                                                        <option value="glukosa">Deteksi Gula Darah</option>
                                                        <option value="superBright">Superbright</option>
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
                                                                <th>SPO2</th>
                                                                <th>Kolesterol</th>
                                                                <th>Asam Urat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($suntik as $suntik) : ?>
                                                                <?php if (!empty($suntik->glukosa) || !empty($suntik->spo2) || !empty($suntik->kolesterol)) : ?>
                                                                    <tr>
                                                                        <td><?= formatDateTime($suntik->ins_time) ?></td>
                                                                        <td><?= formatDateTime($suntik->upd_time) ?></td>
                                                                        <td>
                                                                            <?= $suntik->glukosa ?><br>
                                                                            <span style="color: <?= getGlukosaColor($suntik->glukosa) ?>">
                                                                                (<?= getGlukosaKeterangan($suntik->glukosa) ?>)
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <?= $suntik->spo2 ?><br>
                                                                            <span style="color: <?= getSpo2Color($suntik->spo2) ?>">
                                                                                (<?= getSpo2Keterangan($suntik->spo2) ?>)
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <?= $suntik->kolesterol ?><br>
                                                                            <span style="color: <?= getKolesterolColor($suntik->kolesterol) ?>">
                                                                                (<?= getKolesterolKeterangan($suntik->kolesterol) ?>)
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <?= $suntik->asam_urat ?><br>
                                                                            <span style="color: <?= getAsamUratColor($suntik->asam_urat) ?>">
                                                                                (<?= getAsamUratKeterangan($suntik->asam_urat) ?>)
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="badge bg-warning border-0 edit-suntik-btn" data-bs-toggle="modal" data-bs-target="#SuntikModal" data-id="<?= $suntik->id ?>">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_suntik/' . $suntik->id) ?>">
                                                                                <i class="fas fa-trash"></i> Hapus
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
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

                                            <!-- Table untuk Deteksi Asam Urat -->
                                            <div id="asamFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Deteksi Asam Urat</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Data Manual</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($asam_urat as $au) : ?>
                                                                <?php if (!empty($au->ins_time) || !empty($au->upd_time)) : ?>
                                                                    <tr>
                                                                        <td><?= formatDateTime($au->ins_time) ?></td>
                                                                        <td><?= formatDateTime($au->upd_time) ?></td>
                                                                        <td><?= $au->manual ?></td>
                                                                        <td>
                                                                            <button type="button" class="badge bg-primary border-0 view-asam-btn" data-bs-toggle="modal" data-bs-target="#asamModal" data-id="<?= $au->id ?>">
                                                                                <i class="fas fa-eye"></i> Lihat
                                                                            </button>
                                                                            <button type="button" class="badge bg-warning border-0 edit-asam-btn" data-bs-toggle="modal" data-bs-target="#asamEditModal" data-id="<?= $au->id ?>">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_asam_urat/' . $au->id) ?>">
                                                                                <i class="fas fa-trash"></i> Hapus
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal asam urat -->
                                            <div class="modal fade" id="asamModal" tabindex="-1" role="dialog" aria-labelledby="asamModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="asamModalTitle">Detail Deteksi Asam Urat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div id="asamFields">
                                                                        <div class="col">
                                                                            <label for="asam_violet"><strong>Data Violet</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_violet" rows="5" placeholder="Data Violet" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="asam_blue"><strong>Data Blue</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_blue" rows="5" placeholder="Data Blue" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="asam_green"><strong>Data Green</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_green" rows="5" placeholder="Data Green" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="asam_yellow"><strong>Data Yellow</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_yellow" rows="5" placeholder="Data Yellow" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="asam_orange"><strong>Data Orange</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_orange" rows="5" placeholder="Data Orange" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="asam_red"><strong>Data Red</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="asam_red" rows="5" placeholder="Data Red" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal Deteksi Asam Urat -->
                                            <div class="modal fade" id="asamEditModal" tabindex="-1" role="dialog" aria-labelledby="asamEditModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="asamEditModalTitle">Edit Deteksi Asam Urat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" id="editAsamForm" action="<?= base_url('pasien/update_asam_urat') ?>" method="POST">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div id="asamFields">
                                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                                <button type="button" id="asamSamBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label for="asam_manual">Data Manual</label>
                                                                            </div>
                                                                            <div class="col form-group">
                                                                                <input type="text" id="asam_manual" class="form-control" name="asam_manual" placeholder="Masukkan Data Manual Asam Urat">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="violet"><strong>Data Violet</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamviolet" class="form-control" id="edit-asamviolet" rows="5" placeholder="Data Violet"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="blue"><strong>Data Blue</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamblue" class="form-control" id="edit-asamblue" rows="5" placeholder="Data Blue"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="green"><strong>Data Green</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamgreen" class="form-control" id="edit-asamgreen" rows="5" placeholder="Data Green"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="yellow"><strong>Data Yellow</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamyellow" class="form-control" id="edit-asamyellow" rows="5" placeholder="Data Yellow"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="orange"><strong>Data Orange</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamorange" class="form-control" id="edit-asamorange" rows="5" placeholder="Data Orange"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="red"><strong>Data Red</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="asamred" class="form-control" id="edit-asamred" rows="5" placeholder="Data Red"></textarea>
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

                                            <!-- Table untuk Deteksi Kolesterol -->
                                            <div id="kolesterolFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Deteksi Kolesterol</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tanggal Update</th>
                                                                <th>Data Manual</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($kolesterol as $k) : ?>
                                                                <?php if (!empty($k->ins_time) || !empty($k->upd_time)) : ?>
                                                                    <tr>
                                                                        <td><?= formatDateTime($k->ins_time) ?></td>
                                                                        <td><?= formatDateTime($k->upd_time) ?></td>
                                                                        <td><?= $k->manual ?></td>
                                                                        <td>
                                                                            <button type="button" class="badge bg-primary border-0 view-kolesterol-btn" data-bs-toggle="modal" data-bs-target="#kolesterolModal" data-id="<?= $k->id ?>">
                                                                                <i class="fas fa-eye"></i> Lihat
                                                                            </button>
                                                                            <button type="button" class="badge bg-warning border-0 edit-kolesterol-btn" data-bs-toggle="modal" data-bs-target="#kolesterolEditModal" data-id="<?= $k->id ?>">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <a class="badge bg-danger border-0 delete-suntik-btn" href="<?= site_url('pasien/delete_kolesterol/' . $k->id) ?>">
                                                                                <i class="fas fa-trash"></i> Hapus
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal kolesterol -->
                                            <div class="modal fade" id="kolesterolModal" tabindex="-1" role="dialog" aria-labelledby="kolesterolModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="kolesterolModalTitle">Detail Deteksi Kolesterol</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div id="kolesterolFields">
                                                                        <div class="col">
                                                                            <label for="kolesterol_violet"><strong>Data Violet</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_violet" rows="5" placeholder="Data Violet" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kolesterol_blue"><strong>Data Blue</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_blue" rows="5" placeholder="Data Blue" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kolesterol_green"><strong>Data Green</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_green" rows="5" placeholder="Data Green" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kolesterol_yellow"><strong>Data Yellow</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_yellow" rows="5" placeholder="Data Yellow" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kolesterol_orange"><strong>Data Orange</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_orange" rows="5" placeholder="Data Orange" readonly></textarea>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kolesterol_red"><strong>Data Red</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="kolesterol_red" rows="5" placeholder="Data Red" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal Deteksi Kolesterol -->
                                            <div class="modal fade" id="kolesterolEditModal" tabindex="-1" role="dialog" aria-labelledby="kolesterolEditModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="kolesterolEditModalTitle">Edit Deteksi Kolesterol</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" id="editKolesterolForm" action="<?= base_url('pasien/update_kolesterol') ?>" method="POST">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div id="kolesterolFields">
                                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                                <button type="button" id="kolesterolSamBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label for="kolesterol_manual">Data Manual</label>
                                                                            </div>
                                                                            <div class="col form-group">
                                                                                <input type="text" id="kolesterol_manual" class="form-control" name="kolesterol_manual" placeholder="Masukkan Data Manual Kolesterol">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="violet"><strong>Data Violet</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolviolet" class="form-control" id="edit-kolesterolviolet" rows="5" placeholder="Data Violet"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="blue"><strong>Data Blue</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolblue" class="form-control" id="edit-kolesterolblue" rows="5" placeholder="Data Blue"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="green"><strong>Data Green</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolgreen" class="form-control" id="edit-kolesterolgreen" rows="5" placeholder="Data Green"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="yellow"><strong>Data Yellow</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolyellow" class="form-control" id="edit-kolesterolyellow" rows="5" placeholder="Data Yellow"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="orange"><strong>Data Orange</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolorange" class="form-control" id="edit-kolesterolorange" rows="5" placeholder="Data Orange"></textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="red"><strong>Data Red</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="kolesterolred" class="form-control" id="edit-kolesterolred" rows="5" placeholder="Data Red"></textarea>
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

                                            <!-- Table untuk Deteksi Glukosa -->
                                            <div id="glukosaFields" style="display: none;">
                                                <div>
                                                    <h6 class="h6 mt-4 mb-4">Deteksi Gula Darah</h6>
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
                                                            <?php foreach ($glukosa as $glu) : ?>
                                                                <?php if (!empty($glu->ins_time) || !empty($glu->upd_time)) : ?>
                                                                    <tr>
                                                                        <td><?= formatDateTime($glu->ins_time) ?></td>
                                                                        <td><?= formatDateTime($glu->upd_time) ?></td>
                                                                        <td>
                                                                            <button type="button" class="badge bg-primary border-0 view-glukosa-btn" data-bs-toggle="modal" data-bs-target="#glukosaModal" data-id="<?= $glu->id ?>">
                                                                                <i class="fas fa-eye"></i> Lihat
                                                                            </button>
                                                                            <button type="button" class="badge bg-warning border-0 edit-glukosa-btn" data-bs-toggle="modal" data-bs-target="#glukosaEditModal" data-id="<?= $glu->id ?>">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <a class="badge bg-danger border-0 delete-glukosa-btn" href="<?= site_url('pasien/delete_glukosa/' . $glu->id) ?>">
                                                                                <i class="fas fa-trash"></i> Hapus
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Detail Modal glukosa -->
                                            <div class="modal fade" id="glukosaModal" tabindex="-1" role="dialog" aria-labelledby="glukosaModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="glukosaModalTitle">Detail Deteksi Glukosa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div id="glukosaFields">
                                                                        <div class="col">
                                                                            <label for="gula_darah"><strong>Gula Darah</strong></label>
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <textarea class="form-control" id="gula_darah" rows="5" placeholder="Gula Darah" readonly></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal Deteksi Glukosa -->
                                            <div class="modal fade" id="glukosaEditModal" tabindex="-1" role="dialog" aria-labelledby="glukosaEditModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="glukosaEditModalTitle">Edit Deteksi Gula Darah</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" id="editGlukosaForm" action="<?= base_url('pasien/update_glukosa') ?>" method="POST">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div id="glukosaFields">
                                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                                <button type="button" id="glukosaSamBtn" class="btn btn-light-primary me-1 mb-1 px-5">Ambil Data</button>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="violet"><strong>Gula Darah</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3"> 
                                                                                <textarea name="gula_darah" class="form-control" id="edit-guladarah" rows="5" placeholder="Gula Darah" readonly></textarea>
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
                                                                <?php endif; ?>
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
                                                            <form action="" id="editSuperbrightForm" action="<?= base_url('pasien/update_superbright') ?>" method="POST">
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
                                                                                <textarea name="sb1" class="form-control" id="edit-sb1" rows="5" placeholder="Data Super Bright 1"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb2"><strong>Data Super Bright 2</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb2" class="form-control" id="edit-sb2" rows="5" placeholder="Data Super Bright 2"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb3"><strong>Data Super Bright 3</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb3" class="form-control" id="edit-sb3" rows="5" placeholder="Data Super Bright 3"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb4"><strong>Data Super Bright 4</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb4" class="form-control" id="edit-sb4" rows="5" placeholder="Data Super Bright 4"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb5"><strong>Data Super Bright 5</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb5" class="form-control" id="edit-sb5" rows="5" placeholder="Data Super Bright 5"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb6"><strong>Data Super Bright 6</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb6" class="form-control" id="edit-sb6" rows="5" placeholder="Data Super Bright 6"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb7"><strong>Data Super Bright 7</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb7" class="form-control" id="edit-sb7" rows="5" placeholder="Data Super Bright 7"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb8"><strong>Data Super Bright 8</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb8" class="form-control" id="edit-sb8" rows="5" placeholder="Data Super Bright 8"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb9"><strong>Data Super Bright 9</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb9" class="form-control" id="edit-sb9" rows="5" placeholder="Data Super Bright 9"></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="sb10"><strong>Data Super Bright 10</strong></label>
                                                                            </div>
                                                                            <div class="col mb-3">
                                                                                <textarea name="sb10" class="form-control" id="edit-sb10" rows="5" placeholder="Data Super Bright 10"></textarea>
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
                                                                <?php endif; ?>
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
                                                            <form action="" id="editMagnetikForm" action="<?= base_url('pasien/update_magnetik') ?>" method="POST">
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
                            <div class="tab-pane fade mt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Data Manual</th>
                                                <th>Data AKM</th>
                                                <th>Selisih Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recap as $data) : ?>
                                                <tr>
                                                    <td>Tensi Sistol</td>
                                                    <td><?= $data->manual_sistol ?></td>
                                                    <td><?= $data->akm_sistol ?></td>
                                                    <td><?= $data->selisih_sistol ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tensi Diastol</td>
                                                    <td><?= $data->manual_diastol ?></td>
                                                    <td><?= $data->akm_diastol ?></td>
                                                    <td><?= $data->selisih_diastol ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tinggi Badan</td>
                                                    <td><?= $data->manual_tinggi_bdn ?></td>
                                                    <td><?= $data->akm_tinggi_bdn ?></td>
                                                    <td><?= $data->selisih_tinggi_bdn ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat Badan</td>
                                                    <td><?= $data->manual_berat_bdn ?></td>
                                                    <td><?= $data->akm_berat_bdn ?></td>
                                                    <td><?= $data->selisih_berat_bdn ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Glukosa</td>
                                                    <td><?= $data->manual_glukosa ?></td>
                                                    <td><?= $data->akm_glukosa ?></td>
                                                    <td><?= $data->selisih_glukosa ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        document.getElementById('asamFields').style.display = alat === 'asamUrat' ? 'block' : 'none';
        document.getElementById('kolesterolFields').style.display = alat === 'kolesterol' ? 'block' : 'none';
        document.getElementById('glukosaFields').style.display = alat === 'glukosa' ? 'block' : 'none';
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

    // Deteksi Asam Urat
    $(document).ready(function() {
        $('.view-asam-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_asam_urat/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#asam_violet').val(data.violet);
                        $('#asam_blue').val(data.blue);
                        $('#asam_green').val(data.green);
                        $('#asam_yellow').val(data.yellow);
                        $('#asam_orange').val(data.orange);
                        $('#asam_red').val(data.red);
                        $('#asamModal').modal('show');
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

    // Edit Deteksi Asam Urat
    $(document).ready(function() {
        $('.edit-asam-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_asam_urat/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editAsamForm').attr('action', '<?= base_url('Pasien/update_asam_urat/') ?>' + id);
                        $('#asamEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editAsamForm').on('submit', function(e) {
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
                        $('#asamEditModal').modal('hide');
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

    // Deteksi Kolesterol
    $(document).ready(function() {
        $('.view-kolesterol-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_kolesterol/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#kolesterol_violet').val(data.violet);
                        $('#kolesterol_blue').val(data.blue);
                        $('#kolesterol_green').val(data.green);
                        $('#kolesterol_yellow').val(data.yellow);
                        $('#kolesterol_orange').val(data.orange);
                        $('#kolesterol_red').val(data.red);
                        $('#kolesterolModal').modal('show');
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

    // Edit Deteksi Kolesterol
    $(document).ready(function() {
        $('.edit-kolesterol-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_kolesterol/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editKolesterolForm').attr('action', '<?= base_url('Pasien/update_kolesterol/') ?>' + id);
                        $('#kolesterolEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editKolesterolForm').on('submit', function(e) {
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
                        $('#kolesterolEditModal').modal('hide');
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

    // Deteksi glukosa
    $(document).ready(function() {
        $('.view-glukosa-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_glukosa/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#gula_darah').val(data.nilai_glukosa);
                        $('#glukosaModal').modal('show');
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

    // Edit Deteksi Glukosa
    $(document).ready(function() {
        $('.edit-glukosa-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_glukosa/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#editGlukosaForm').attr('action', '<?= base_url('Pasien/update_glukosa/') ?>' + id);
                        $('#glukosaEditModal').modal('show');
                    } else {
                        console.log('Data not found');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });

        $('#editGlukosaForm').on('submit', function(e) {
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
                        $('#glukosaEditModal').modal('hide');
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

    $(document).ready(function() {
        $('#magnetikEditLeftBtn').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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

    $(document).ready(function() {
        $('#magnetikEditRightBtn').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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

    $(document).ready(function() {
        $('#asamSamBtn').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_asam_urat_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#edit-asamviolet').val(data.violet);
                        $('#edit-asamblue').val(data.blue);
                        $('#edit-asamgreen').val(data.green);
                        $('#edit-asamyellow').val(data.yellow);
                        $('#edit-asamorange').val(data.orange);
                        $('#edit-asamred').val(data.red);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#kolesterolSamBtn').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_kolesterol_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#edit-kolesterolviolet').val(data.violet);
                        $('#edit-kolesterolblue').val(data.blue);
                        $('#edit-kolesterolgreen').val(data.green);
                        $('#edit-kolesterolyellow').val(data.yellow);
                        $('#edit-kolesterolorange').val(data.orange);
                        $('#edit-kolesterolred').val(data.red);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#glukosaSamBtn').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_glukosa_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#edit-guladarah').val(data.nilai_glukosa);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#superBrightSamBtn1').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_superbright_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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

    $(document).ready(function() {
        $('#superBrightSamBtn2').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_superbright_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
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
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $day = $date->format('d');
    $month = $months[(int)$date->format('m')];
    $year = $date->format('Y');

    return "{$day} {$month} {$year}";
}
?>

<?php
function getGlukosaKeterangan($glukosa) {
    if ($glukosa < 70) {
        return "Rendah";
    } elseif ($glukosa >= 70 && $glukosa <= 140) {
        return "Normal";
    } elseif ($glukosa > 140 && $glukosa <= 200) {
        return "Tinggi (Waspada)";
    } else {
        return "Sangat Tinggi (Berisiko)";
    }
}

function getGlukosaColor($glukosa) {
    if ($glukosa < 70) {
        return "blue";
    } elseif ($glukosa >= 70 && $glukosa <= 140) {
        return "green";
    } elseif ($glukosa > 140 && $glukosa <= 200) {
        return "orange";
    } else {
        return "red";
    }
}

function getSpo2Keterangan($spo2) {
    if ($spo2 >= 95) {
        return "Normal";
    } elseif ($spo2 >= 90 && $spo2 < 95) {
        return "Hipoksemia Ringan";
    } elseif ($spo2 >= 80 && $spo2 < 90) {
        return "Hipoksemia Sedang";
    } else {
        return "Hipoksemia Berat";
    }
}

function getSpo2Color($spo2) {
    if ($spo2 >= 95) {
        return "green";
    } elseif ($spo2 >= 90 && $spo2 < 95) {
        return "orange";
    } elseif ($spo2 >= 80 && $spo2 < 90) {
        return "red";
    } else {
        return "darkred";
    }
}

function getKolesterolKeterangan($kolesterol) {
    if ($kolesterol < 120) {
        return "Sangat Rendah (Berisiko)";
    } elseif ($kolesterol >= 120 && $kolesterol < 200) {
        return "Normal";
    } elseif ($kolesterol >= 200 && $kolesterol < 240) {
        return "Borderline (Waspada)";
    } else {
        return "Tinggi (Berisiko)";
    }
}

function getKolesterolColor($kolesterol) {
    if ($kolesterol < 120) {
        return "red";
    } elseif ($kolesterol >= 120 && $kolesterol < 200) {
        return "green";
    } elseif ($kolesterol >= 200 && $kolesterol < 240) {
        return "orange";
    } else {
        return "red";
    }
}

function getAsamUratKeterangan($asam_urat) {
    if ($asam_urat < 3.5) {
        return "Rendah";
    } elseif ($asam_urat >= 3.5 && $asam_urat <= 7.2) {
        return "Normal";
    } else {
        return "Tinggi";
    }
}

function getAsamUratColor($asam_urat) {
    if ($asam_urat < 3.5) {
        return "blue";
    } elseif ($asam_urat >= 3.5 && $asam_urat <= 7.2) {
        return "green";
    } else {
        return "red";
    }
}
?>
