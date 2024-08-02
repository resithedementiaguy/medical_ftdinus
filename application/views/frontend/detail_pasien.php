<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Periksa Pasien</h3>
                <p class="text-subtitle text-muted">Hasil detail periksa pasien</p>
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
                                                                <button type="button" class="badge bg-primary border-0 view-ultrasound-btn" data-bs-toggle="modal" data-bs-target="#ultraSoundModal" data-id="<?= $ultrasound->id ?>">
                                                                    <i class="fas fa-eye"></i> Lihat Ultrasound
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Detail Modal Ultrasound -->
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
                                                                    <div class="col">
                                                                        <label for="us1"><strong>Sinyal Ultrasound 1</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us1" rows="5" placeholder="Sinyal Ultrasound 1" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us2"><strong>Sinyal Ultrasound 2</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us2" rows="5" placeholder="Sinyal Ultrasound 2" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us3"><strong>Sinyal Ultrasound 3</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us3" rows="5" placeholder="Sinyal Ultrasound 3" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us4"><strong>Sinyal Ultrasound 4</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us4" rows="5" placeholder="Sinyal Ultrasound 4" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us5"><strong>Sinyal Ultrasound 5</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us5" rows="5" placeholder="Sinyal Ultrasound 5" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us6"><strong>Sinyal Ultrasound 6</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us6" rows="5" placeholder="Sinyal Ultrasound 6" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us7"><strong>Sinyal Ultrasound 7</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us7" rows="5" placeholder="Sinyal Ultrasound 7" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us8"><strong>Sinyal Ultrasound 8</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us8" rows="5" placeholder="Sinyal Ultrasound 8" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us9"><strong>Sinyal Ultrasound 9</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us9" rows="5" placeholder="Sinyal Ultrasound 9" readonly></textarea>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="us10"><strong>Sinyal Ultrasound 10</strong></label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="us10" rows="5" placeholder="Sinyal Ultrasound 10" readonly></textarea>
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
                                                    <?php foreach ($superbright as $sb) : ?>
                                                        <tr>
                                                            <td><?= $sb->ins_time ?></td>
                                                            <td>
                                                                <button type="button" class="badge bg-primary border-0 view-superbright-btn" data-bs-toggle="modal" data-bs-target="#superBrightModal" data-id="<?= $sb->id ?>">
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
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb1" rows="5" placeholder="Data Super Bright 1" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb2">Data Super Bright 2</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb2" rows="5" placeholder="Data Super Bright 2" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb3">Data Super Bright 3</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb3" rows="5" placeholder="Data Super Bright 3" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb4">Data Super Bright 4</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb4" rows="5" placeholder="Data Super Bright 4" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb5">Data Super Bright 5</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb5" rows="5" placeholder="Data Super Bright 5" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb6">Data Super Bright 6</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb6" rows="5" placeholder="Data Super Bright 6" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb7">Data Super Bright 7</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb7" rows="5" placeholder="Data Super Bright 7" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb8">Data Super Bright 8</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb8" rows="5" placeholder="Data Super Bright 8" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb9">Data Super Bright 9</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="sb9" rows="5" placeholder="Data Super Bright 9" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="sb10">Data Super Bright 10</label>
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
                                                    <?php foreach ($magnetik as $mag) : ?>
                                                        <tr>
                                                            <td><?= $mag->ins_time ?></td>
                                                            <td>
                                                                <button type="button" class="badge bg-primary border-0 view-magnetik-btn" data-bs-toggle="modal" data-bs-target="#MagnetikModal" data-id="<?= $mag->id ?>">
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
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag1" rows="5" placeholder="Data Magnetik 1" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag2">Data Magnetik 2</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag3">Data Magnetik 3</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag4">Data Magnetik 4</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag5">Data Magnetik 5</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag6">Data Magnetik 6</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag7">Data Magnetik 7</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag8">Data Magnetik 8</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag9">Data Magnetik 9</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="mag10">Data Magnetik 10</label>
                                                                    </div>
                                                                    <div class="col mb-3">
                                                                        <textarea class="form-control" id="mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
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

    // Ultrasound
    $(document).ready(function() {
        $('.view-ultrasound-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('Pasien/get_ultrasound/') ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
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
                    $('#mag1').val(data.mag1);
                    $('#mag2').val(data.mag2);
                    $('#mag3').val(data.mag3);
                    $('#mag4').val(data.mag4);
                    $('#mag5').val(data.mag5);
                    $('#mag6').val(data.mag6);
                    $('#mag7').val(data.mag7);
                    $('#mag8').val(data.mag8);
                    $('#mag9').val(data.mag9);
                    $('#mag10').val(data.mag10);
                }
            });
        });
    });
</script>