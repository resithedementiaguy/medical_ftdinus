<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Periksa Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analisis Darah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Pasien</h5>
            </div>
            <div class="card-body">
                <div class="data-list custom-table">
                    <?php foreach ($pasien as $pasien) : ?>
                        <div class="custom-row">
                            <div class="custom-label">NIK</div>
                            <div class="custom-data"><?php echo $pasien->nik; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Nama Lengkap</div>
                            <div class="custom-data"><?php echo $pasien->nama; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Tempat Tanggal Lahir</div>
                            <div class="custom-data"><?php echo $pasien->tempat_lahir; ?>, <?php echo $pasien->tanggal_lahir; ?></div>
                        </div>
                        <div class="custom-row">
                            <div class="custom-label">Kota Asal</div>
                            <div class="custom-data"><?php echo $pasien->kota; ?></div>
                        </div>
                    <?php endforeach; ?>
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
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors() ?>
                                </div>
                            <?php endif; ?>
                            <form class="form form-horizontal" id="analisisForm" action="<?= base_url('analisis_darah/add') ?>" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div>
                                            <h5 class="h5 mb-4">Riwayat Periksa</h5>
                                        </div>

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
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Periksa</th>
                                                        <th>Glukosa</th>
                                                        <th>HB</th>
                                                        <th>SPO2</th>
                                                        <th>Kolesterol</th>
                                                        <th>Asam Urat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($suntik as $suntik) : ?>
                                                        <tr>
                                                            <td><?= $suntik->ins_time ?></td>
                                                            <td><?= $suntik->glukosa ?></td>
                                                            <td><?= $suntik->hb ?></td>
                                                            <td><?= $suntik->spo2 ?></td>
                                                            <td><?= $suntik->kolesterol ?></td>
                                                            <td><?= $suntik->asam_urat ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Table untuk Ultrasound -->
                                        <div id="ultraSoundFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Ultrasound</h6>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Periksa</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ultrasound as $ultrasound) : ?>
                                                        <tr>
                                                            <td><?= $ultrasound->ins_time ?></td>
                                                            <td>
                                                                <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#ultraSoundModal">
                                                                    <i class="fas fa-eye"></i> Lihat Ultrasound
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!--Detail Modal Ultrasound -->
                                        <div class="modal fade" id="ultraSoundModal" tabindex="-1" role="dialog" aria-labelledby="ultraSoundModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ultraSoundModalTitle">Detail Ultrasound</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <!-- Fields untuk Ultrasound -->
                                                                <div id="ultraSoundFields">
                                                                    <div class="col-md-4">
                                                                        <label for="us1">Sinyal Ultrasound 1</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us1" rows="5" placeholder="Sinyal Ultrasound 1" readonly><?= htmlspecialchars($ultrasound->us1) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us2">Sinyal Ultrasound 2</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us2" rows="5" placeholder="Sinyal Ultrasound 2" readonly><?= htmlspecialchars($ultrasound->us2) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us3">Sinyal Ultrasound 3</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us3" rows="5" placeholder="Sinyal Ultrasound 3" readonly><?= htmlspecialchars($ultrasound->us3) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us4">Sinyal Ultrasound 4</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us4" rows="5" placeholder="Sinyal Ultrasound 4" readonly><?= htmlspecialchars($ultrasound->us4) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us5">Sinyal Ultrasound 5</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us5" rows="5" placeholder="Sinyal Ultrasound 5" readonly><?= htmlspecialchars($ultrasound->us5) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us6">Sinyal Ultrasound 6</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us6" rows="5" placeholder="Sinyal Ultrasound 6" readonly><?= htmlspecialchars($ultrasound->us6) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us7">Sinyal Ultrasound 7</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us7" rows="5" placeholder="Sinyal Ultrasound 7" readonly><?= htmlspecialchars($ultrasound->us7) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us8">Sinyal Ultrasound 8</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us8" rows="5" placeholder="Sinyal Ultrasound 8" readonly><?= htmlspecialchars($ultrasound->us8) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us9">Sinyal Ultrasound 9</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us9" rows="5" placeholder="Sinyal Ultrasound 9" readonly><?= htmlspecialchars($ultrasound->us9) ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="us10">Sinyal Ultrasound 10</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="us10" rows="5" placeholder="Sinyal Ultrasound 10" readonly><?= htmlspecialchars($ultrasound->us10) ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Table untuk Super Bright -->
                                        <div id="superBrightFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Super Bright</h6>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Periksa</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($superbright as $item) : ?>
                                                        <tr>
                                                            <td><?= $item->ins_time ?></td>
                                                            <td>
                                                                <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#superBrightModal">
                                                                    <i class="fas fa-eye"></i> Lihat Super Bright
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Detail Modal Super Bright -->
                                        <div class="modal fade" id="superBrightModal" tabindex="-1" role="dialog" aria-labelledby="superBrightModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="superBrightModalTitle">Detail Super Bright</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <!-- Fields untuk Super Bright -->
                                                                <div id="superBrightFieldsDetail">
                                                                    <div class="col-md-12">
                                                                        <label for="sb1">Data Super Bright 1</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb1" rows="5" placeholder="Data Super Bright 1" readonly><?= htmlspecialchars($superbright->sb1) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb2">Data Super Bright 2</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb2" rows="5" placeholder="Data Super Bright 2" readonly><?= htmlspecialchars($superbright->sb2) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb3">Data Super Bright 3</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb3" rows="5" placeholder="Data Super Bright 3" readonly><?= htmlspecialchars($superbright->sb3) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb4">Data Super Bright 4</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb4" rows="5" placeholder="Data Super Bright 4" readonly><?= htmlspecialchars($superbright->sb4) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb5">Data Super Bright 5</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb5" rows="5" placeholder="Data Super Bright 5" readonly><?= htmlspecialchars($superbright->sb5) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb6">Data Super Bright 6</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb6" rows="5" placeholder="Data Super Bright 6" readonly><?= htmlspecialchars($superbright->sb6) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb7">Data Super Bright 7</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb7" rows="5" placeholder="Data Super Bright 7" readonly><?= htmlspecialchars($superbright->sb7) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb8">Data Super Bright 8</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb8" rows="5" placeholder="Data Super Bright 8" readonly><?= htmlspecialchars($superbright->sb8) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb9">Data Super Bright 9</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb9" rows="5" placeholder="Data Super Bright 9" readonly><?= htmlspecialchars($superbright->sb9) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb10">Data Super Bright 10</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="sb10" rows="5" placeholder="Data Super Bright 10" readonly><?= htmlspecialchars($superbright->sb10) ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Table untuk Magnetik -->
                                        <div id="magnetikFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik</h6>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Periksa</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($magnetik as $item) : ?>
                                                        <tr>
                                                            <td><?= $item->ins_time ?></td>
                                                            <td>
                                                                <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#MagnetikModal" data-id="<?= $item->id ?>">
                                                                    <i class="fas fa-eye"></i> Lihat Magnetik
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Detail Modal Magnetik -->
                                        <div class="modal fade" id="MagnetikModal" tabindex="-1" role="dialog" aria-labelledby="MagnetikModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="MagnetikModalTitle">Detail Magnetik</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <!-- Fields untuk Magnetik -->
                                                                <div id="magnetikFieldsDetail">
                                                                    <div class="col-md-12">
                                                                        <label for="mag1">Data Magnetik 1</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag1" rows="5" placeholder="Data Magnetik 1" readonly><?= htmlspecialchars($magnetik->mag1) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag2">Data Magnetik 2</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag2" rows="5" placeholder="Data Magnetik 2" readonly><?= htmlspecialchars($magnetik->mag2) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag3">Data Magnetik 3</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag3" rows="5" placeholder="Data Magnetik 3" readonly><?= htmlspecialchars($magnetik->mag3) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag4">Data Magnetik 4</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag4" rows="5" placeholder="Data Magnetik 4" readonly><?= htmlspecialchars($magnetik->mag4) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag5">Data Magnetik 5</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag5" rows="5" placeholder="Data Magnetik 5" readonly><?= htmlspecialchars($magnetik->mag5) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag6">Data Magnetik 6</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag6" rows="5" placeholder="Data Magnetik 6" readonly><?= htmlspecialchars($magnetik->mag6) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag7">Data Magnetik 7</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag7" rows="5" placeholder="Data Magnetik 7" readonly><?= htmlspecialchars($magnetik->mag7) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag8">Data Magnetik 8</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag8" rows="5" placeholder="Data Magnetik 8" readonly><?= htmlspecialchars($magnetik->mag8) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag9">Data Magnetik 9</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag9" rows="5" placeholder="Data Magnetik 9" readonly><?= htmlspecialchars($magnetik->mag9) ?></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag10">Data Magnetik 10</label>
                                                                    </div>
                                                                    <div class="col">
                                                                        <textarea class="form-control" id="mag10" rows="5" placeholder="Data Magnetik 10" readonly><?= htmlspecialchars($magnetik->mag10) ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        width: 150px;
    }

    .custom-data {
        flex: 1;
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
</script>