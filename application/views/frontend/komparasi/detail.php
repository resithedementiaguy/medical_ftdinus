<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Komparasi Riwayat Periksa Pasien</h3>
                <p class="text-subtitle text-muted">Detail lengkap riwayat periksa pasien dengan analisa komparasi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('komparasi') ?>">Analisis Komparasi</a></li>
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
                                <h5 class="h5 mb-4">Rekap Periksa</h5>
                            </div>
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
        $('#ultraSoundSamBtn1').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_ultrasound_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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

    $(document).ready(function() {
        $('#ultraSoundSamBtn2').on('click', function() {
            var id = 1; // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_ultrasound_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
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