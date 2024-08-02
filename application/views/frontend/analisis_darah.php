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
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                                                <select class="form-select" id="nik" name="nik">
                                                    <option value="" selected hidden>Pilih NIK</option>
                                                    <?php foreach ($ktp as $data) : ?>
                                                        <option value="<?= $data->nik ?>"><?= $data->nik ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" readonly>
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Alat Medical</h5>
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
                                            <div class="col-md-4">
                                                <label for="us1">Sinyal Ultrasound 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us1" name="us1" rows="5" placeholder="Sinyal Ultrasound 1" readonly>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us2">Sinyal Ultrasound 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us2" name="us2" rows="5" placeholder="Sinyal Ultrasound 2" readonly>Data untuk US 2</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us3">Sinyal Ultrasound 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us3" name="us3" rows="5" placeholder="Sinyal Ultrasound 3" readonly>Data untuk US 3</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us4">Sinyal Ultrasound 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us4" name="us4" rows="5" placeholder="Sinyal Ultrasound 4" readonly>Data untuk US 4</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us5">Sinyal Ultrasound 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us5" name="us5" rows="5" placeholder="Sinyal Ultrasound 5" readonly>Data untuk US 5</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us6">Sinyal Ultrasound 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us6" name="us6" rows="5" placeholder="Sinyal Ultrasound 6" readonly>Data untuk US 6</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us7">Sinyal Ultrasound 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us7" name="us7" rows="5" placeholder="Sinyal Ultrasound 7" readonly>Data untuk US 7</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us8">Sinyal Ultrasound 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us8" name="us8" rows="5" placeholder="Sinyal Ultrasound 8" readonly>Data untuk US 8</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us9">Sinyal Ultrasound 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us9" name="us9" rows="5" placeholder="Sinyal Ultrasound 9" readonly>Data untuk US 9</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us10">Sinyal Ultrasound 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us10" name="us10" rows="5" placeholder="Sinyal Ultrasound 10" readonly>Data untuk US 10</textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Super Bright -->
                                        <div id="superBrightFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Super Bright</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb1">Sinyal Super Bright 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb1" name="sb1" rows="5" placeholder="Sinyal Super Bright 1" readonly>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb2">Sinyal Super Bright 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb2" name="sb2" rows="5" placeholder="Sinyal Super Bright 2" readonly>Data untuk SB 2</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb3">Sinyal Super Bright 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb3" name="sb3" rows="5" placeholder="Sinyal Super Bright 3" readonly>Data untuk SB 3</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb4">Sinyal Super Bright 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb4" name="sb4" rows="5" placeholder="Sinyal Super Bright 4" readonly>Data untuk SB 4</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb5">Sinyal Super Bright 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb5" name="sb5" rows="5" placeholder="Sinyal Super Bright 5" readonly>Data untuk SB 5</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb6">Sinyal Super Bright 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb6" name="sb6" rows="5" placeholder="Sinyal Super Bright 6" readonly>Data untuk SB 6</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb7">Sinyal Super Bright 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb7" name="sb7" rows="5" placeholder="Sinyal Super Bright 7" readonly>Data untuk SB 7</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb8">Sinyal Super Bright 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb8" name="sb8" rows="5" placeholder="Sinyal Super Bright 8" readonly>Data untuk SB 8</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb9">Sinyal Super Bright 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb9" name="sb9" rows="5" placeholder="Sinyal Super Bright 9" readonly>Data untuk SB 9</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb10">Sinyal Super Bright 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb10" name="sb10" rows="5" placeholder="Sinyal Super Bright 10" readonly>Data untuk SB 10</textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Magnetik -->
                                        <div id="magnetikFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag1">Sinyal Magnetik 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag1" name="mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag2" name="mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly>Data untuk Magnetik 2</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag3" name="mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly>Data untuk Magnetik 3</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag4" name="mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly>Data untuk Magnetik 4</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag5" name="mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly>Data untuk Magnetik 5</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag6" name="mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly>Data untuk Magnetik 6</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag7" name="mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly>Data untuk Magnetik 7</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag8" name="mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly>Data untuk Magnetik 8</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag9" name="mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly>Data untuk Magnetik 9</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag10" name="mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly>Data untuk Magnetik 10</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                            <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1 px-5">Selesai</button> -->
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('analisisForm');
        var alatSelect = document.getElementById('basicSelect');

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

        // Tampilkan NIK dan nama menggunakan Ajax
        $('#nik').change(function() {
            var nik = $(this).val();
            if (nik != "") {
                $.ajax({
                    url: '<?= base_url("Analisis_darah/get_nama") ?>',
                    method: 'POST',
                    data: {
                        nik: nik
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#nama').val(response ? response.nama : '');
                    }
                });
            } else {
                $('#nama').val('');
            }
        });
    });
</script>