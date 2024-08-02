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
                <div class="data-list">
                    <?php foreach ($pasien as $pasien) : ?>
                        <p><strong>NIK:</strong> <?php echo $pasien->nik; ?></p>
                        <p><strong>Nama Lengkap:</strong> <?php echo $pasien->nama; ?></p>
                        <p><strong>Kota Asal:</strong> <?php echo $pasien->kota; ?></p>
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
                                                    <?php foreach($suntik as $suntik): ?>
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
                                                    <?php foreach($ultrasound as $ultrasound): ?>
                                                    <tr>
                                                        <td><?= $ultrasound->ins_time ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-ultrasound-modal">Lihat Data</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php //foreach ($bill as $row) : ?>
                                        <!-- Modal untuk Ultrasound -->
                                        <div id="view-ultrasound-modal" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Detail Ultrasound</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>aaaa</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php //endforeach;?>

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
                                                    <?php foreach($superbright as $superbright): ?>
                                                    <tr>
                                                        <td><?= $superbright->ins_time ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-superbright-modal">Lihat Data</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
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
                                                    <?php foreach($magnetik as $magnetik): ?>
                                                    <tr>
                                                        <td><?= $magnetik->ins_time ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-magnetik-modal">Lihat Data</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <script>
                                document.getElementById('basicSelect').addEventListener('change', function() {
                                    var alat = this.value;
                                    document.getElementById('suntikFields').style.display = alat === 'suntik' ? 'block' : 'none';
                                    document.getElementById('ultraSoundFields').style.display = alat === 'ultraSound' ? 'block' : 'none';
                                    document.getElementById('superBrightFields').style.display = alat === 'superBright' ? 'block' : 'none';
                                    document.getElementById('magnetikFields').style.display = alat === 'magnetik' ? 'block' : 'none';
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
