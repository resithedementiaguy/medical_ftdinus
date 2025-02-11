<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>Input Data Manual dan Data AKM</h3>
                <p class="text-subtitle text-muted">Silahkan isi form di bawah untuk menyimpan data pemeriksaan manual dan AKM</p>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
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
                            <div class="form-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="input-manual-tab" data-bs-toggle="tab" href="#input-manual" role="tab"
                                            aria-controls="input-manual" aria-selected="true">Input Data Manual</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="input-akm-tab" data-bs-toggle="tab" href="#input-akm" role="tab"
                                            aria-controls="input-akm" aria-selected="false">Input Data AKM</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!-- FORM INPUT DATA MANUAL -->
                                    <div class="tab-pane fade show mt-4 active" id="input-manual" role="tabpanel" aria-labelledby="input-manual-tab">
                                        <form class="form form-horizontal" id="form_manual" action="<?= base_url('akm_manual/add_manual') ?>" method="POST">
                                            <div class="row">
                                                <div>
                                                    <h5 class="h5 mb-4">Input Data Manual</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nik_manual">NIK</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <fieldset class="form-group">
                                                        <select class="choices form-select" id="nik_manual" name="nik_manual" required>
                                                            <option value="" selected hidden>Pilih NIK</option>
                                                            <?php foreach ($ktp as $data) : ?>
                                                                <option value="<?= $data->nik ?>" <?= set_select('nik', $data->nik) ?>><?= $data->nik ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nama_manual">Nama Lengkap</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="nama_manual" class="form-control" name="nama_manual" placeholder="Masukkan Nama Lengkap Manual" readonly value="<?= set_value('nama') ?>">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tinggi_manual">Tinggi Badan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="tinggi_manual" class="form-control" name="tinggi_manual" placeholder="Masukkan Tinggi Badan Manual" data-parsley-required="true" required data-parsley-error-message="Tinggi Badan wajib diisi!">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="berat_manual">Berat Badan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="berat_manual" class="form-control" name="berat_manual" placeholder="Masukkan Berat Badan Manual" data-parsley-required="true" required data-parsley-error-message="Berat Badan wajib diisi!">
                                                </div>                                        
                                                <div class="col-md-4">
                                                    <label for="sistol_manual">Tensi Sistol</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="sistol_manual" class="form-control" name="sistol_manual"
                                                    placeholder="Masukkan Tensi Sistol Manual" data-parsley-required="true"
                                                    required data-parsley-error-message="Tensi Sistol wajib diisi!"
                                                    oninput="updateKeteranganTensi()">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="diastol_manual">Tensi Diastol</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="diastol_manual" class="form-control" name="diastol_manual"
                                                    placeholder="Masukkan Tensi diastol Manual" data-parsley-required="true"
                                                    required data-parsley-error-message="Tensi diastol wajib diisi!"
                                                    oninput="updateKeteranganTensi()">
                                                    <span id="keterangan_tensi_manual"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="glukosa_manual">Glukosa / Gula Darah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="glukosa_manual" class="form-control" name="glukosa_manual"
                                                        placeholder="Masukkan Glukosa / Gula Darah Manual" data-parsley-required="true"
                                                        required data-parsley-error-message="Glukosa / Gula Darah wajib diisi!"
                                                        oninput="updateKeteranganGlukosa()">
                                                    <span id="keterangan_glukosa_manual"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="asam_urat_manual">Asam Urat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="asam_urat_manual" class="form-control" name="asam_urat_manual" 
                                                        placeholder="Masukkan Asam Urat Manual" data-parsley-required="true" 
                                                        required data-parsley-error-message="Asam Urat wajib diisi!" 
                                                        oninput="updateKeteranganAsamUrat()">
                                                    <span id="keterangan_asam_urat_manual"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="kolesterol_manual">Kolesterol</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="kolesterol_manual" class="form-control" name="kolesterol_manual"
                                                        placeholder="Masukkan Kolesterol Manual" data-parsley-required="true"
                                                        required data-parsley-error-message="Kolesterol wajib diisi!"
                                                        oninput="updateKeteranganKolesterol()">
                                                    <span id="keterangan_kolesterol_manual"></span>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- FORM INPUT DATA AKM -->
                                    <div class="tab-pane fade show mt-4" id="input-akm" role="tabpanel" aria-labelledby="input-akm-tab">
                                        <form class="form form-horizontal" id="form_akm" action="<?= base_url('akm_manual/add_akm') ?>" method="POST">
                                            <div class="row">
                                                <div>
                                                    <h5 class="h5 mb-4">Input Data IoT AKM</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nik_akm">NIK</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <fieldset class="form-group">
                                                        <select class="choices form-select" id="nik_akm" name="nik_akm" required>
                                                            <option value="" selected hidden>Pilih NIK</option>
                                                            <?php foreach ($ktp as $data) : ?>
                                                                <option value="<?= $data->nik ?>" <?= set_select('nik', $data->nik) ?>><?= $data->nik ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nama_akm">Nama Lengkap</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="nama_akm" class="form-control" name="nama_akm" placeholder="Masukkan Nama Lengkap AKM" readonly value="<?= set_value('nama') ?>">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tinggi_akm">Tinggi Badan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="tinggi_akm" class="form-control" name="tinggi_akm" placeholder="Masukkan Tinggi Badan AKM" data-parsley-required="true" required data-parsley-error-message="Tinggi Badan wajib diisi!">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="berat_akm">Berat Badan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="berat_akm" class="form-control" name="berat_akm" placeholder="Masukkan Berat Badan AKM" data-parsley-required="true" required data-parsley-error-message="Berat Badan wajib diisi!">
                                                </div>                                        
                                                <div class="col-md-4">
                                                    <label for="sistol_akm">Tensi Sistol</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="sistol_akm" class="form-control" name="sistol_akm"
                                                    placeholder="Masukkan Tensi Sistol AKM" data-parsley-required="true"
                                                    required data-parsley-error-message="Tensi Sistol wajib diisi!"
                                                    oninput="updateKeteranganTensiAKM()">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="diastol_akm">Tensi Diastol</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="diastol_akm" class="form-control" name="diastol_akm"
                                                    placeholder="Masukkan Tensi diastol AKM" data-parsley-required="true"
                                                    required data-parsley-error-message="Tensi diastol wajib diisi!"
                                                    oninput="updateKeteranganTensiAKM()">
                                                    <span id="keterangan_tensi_akm"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="glukosa_akm">Glukosa / Gula Darah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="glukosa_akm" class="form-control" name="glukosa_akm"
                                                    placeholder="Masukkan Glukosa / Gula Darah AKM" data-parsley-required="true"
                                                    required data-parsley-error-message="Glukosa / Gula Darah wajib diisi!"
                                                    oninput="updateKeteranganGlukosaAKM()">
                                                <span id="keterangan_glukosa_akm"></span>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                Data alat berhasil disimpan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Function for getting name based on selected NIK
        $('#nik_manual').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?= base_url('akm_manual/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: {
                        nik: selectedNik
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama_manual').val(response ? response : '');
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                $('#nama_manual').val('');
            }
        });    
        
        $('#nik_manual').select2({
            placeholder: "Pilih NIK",
            allowClear: true
        });

        // Function for getting name based on selected NIK
        $('#nik_akm').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?= base_url('akm_manual/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: {
                        nik: selectedNik
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama_akm').val(response ? response : '');
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                $('#nama_akm').val('');
            }
        });    
        
        $('#nik_akm').select2({
            placeholder: "Pilih NIK",
            allowClear: true
        });
    });

    $(document).ready(function() {
        // Function for getting name based on selected NIK
        $('#nik_akm').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?= base_url('akm_manual/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: {
                        nik: selectedNik
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama_akm').val(response ? response : '');
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                $('#nama_akm').val('');
            }
        });    
        
        $('#nik_akm').select2({
            placeholder: "Pilih NIK",
            allowClear: true
        });
    });

    $(document).ready(function() {
    // Existing code remains...

    // Handle manual form submission
    $('#form_manual').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    $('#successModal').modal('show');
                    $('#form_manual')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error);
            }
        });
    });

    // Handle AKM form submission
    $('#form_akm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    $('#successModal').modal('show');
                    $('#form_akm')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error);
            }
        });
    });

    // Handle modal close and redirect
    $('#successModal').on('hidden.bs.modal', function () {
        location.reload();
    });
});

function updateKeteranganGlukosa() {
    const glukosa = document.getElementById("glukosa_manual").value;
    const keteranganSpan = document.getElementById("keterangan_glukosa_manual");

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

function updateKeteranganGlukosaAKM() {
    const glukosa = document.getElementById("glukosa_akm").value;
    const keteranganSpan = document.getElementById("keterangan_glukosa_akm");

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
    const asamUrat = document.getElementById("asam_urat_manual").value;
    const keteranganSpan = document.getElementById("keterangan_asam_urat_manual");

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
    const kolesterol = document.getElementById("kolesterol_manual").value;
    const keteranganKolesterol = document.getElementById("keterangan_kolesterol_manual");

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

function updateKeteranganTensi() {
    const sistol = parseInt(document.getElementById("sistol_manual").value);
    const diastol = parseInt(document.getElementById("diastol_manual").value);
    const keteranganTensi = document.getElementById("keterangan_tensi_manual");

    if (!sistol || !diastol) {
        keteranganTensi.textContent = "";
        return;
    }

    if (sistol < 90 && diastol < 60) {
        keteranganTensi.textContent = "Tekanan Darah Rendah (Hipotensi)";
        keteranganTensi.style.color = "blue";
    } else if (sistol < 120 && diastol < 80) {
        keteranganTensi.textContent = "Normal";
        keteranganTensi.style.color = "green";
    } else if (sistol >= 120 && sistol < 130 && diastol < 80) {
        keteranganTensi.textContent = "Elevated (Meningkat)";
        keteranganTensi.style.color = "orange";
    } else if ((sistol >= 130 && sistol < 140) || (diastol >= 80 && diastol < 90)) {
        keteranganTensi.textContent = "Hipertensi Tingkat 1";
        keteranganTensi.style.color = "orange";
    } else if (sistol >= 140 || diastol >= 90) {
        keteranganTensi.textContent = "Hipertensi Tingkat 2";
        keteranganTensi.style.color = "red";
    } else if (sistol >= 180 || diastol >= 120) {
        keteranganTensi.textContent = "Krisis Hipertensi";
        keteranganTensi.style.color = "darkred";
    } else {
        keteranganTensi.textContent = "Tidak dikenali";
        keteranganTensi.style.color = "black";
    }
}

function updateKeteranganTensiAKM() {
    const sistol = parseInt(document.getElementById("sistol_akm").value);
    const diastol = parseInt(document.getElementById("diastol_akm").value);
    const keteranganTensi = document.getElementById("keterangan_tensi_akm");

    if (!sistol || !diastol) {
        keteranganTensi.textContent = "";
        return;
    }

    if (sistol < 90 && diastol < 60) {
        keteranganTensi.textContent = "Tekanan Darah Rendah (Hipotensi)";
        keteranganTensi.style.color = "blue";
    } else if (sistol < 120 && diastol < 80) {
        keteranganTensi.textContent = "Normal";
        keteranganTensi.style.color = "green";
    } else if (sistol >= 120 && sistol < 130 && diastol < 80) {
        keteranganTensi.textContent = "Elevated (Meningkat)";
        keteranganTensi.style.color = "orange";
    } else if ((sistol >= 130 && sistol < 140) || (diastol >= 80 && diastol < 90)) {
        keteranganTensi.textContent = "Hipertensi Tingkat 1";
        keteranganTensi.style.color = "orange";
    } else if (sistol >= 140 || diastol >= 90) {
        keteranganTensi.textContent = "Hipertensi Tingkat 2";
        keteranganTensi.style.color = "red";
    } else if (sistol >= 180 || diastol >= 120) {
        keteranganTensi.textContent = "Krisis Hipertensi";
        keteranganTensi.style.color = "darkred";
    } else {
        keteranganTensi.textContent = "Tidak dikenali";
        keteranganTensi.style.color = "black";
    }
}


</script>