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
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div>
                                            <h5 class="h5 mb-4">Informasi Pasien</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password-horizontal">NIK</label>
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
                                            <label for="first-name-horizontal">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" readonly>
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Alat Medical</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="password-horizontal">Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" onchange="showFields()">
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
                                                <label for="kolestrol">Kolestrol</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="kolestrol" class="form-control" name="kolestrol" placeholder="Masukkan Kolestrol">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="asamUrat">Asam Urat</label>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" id="asamUrat" class="form-control" name="asamUrat" placeholder="Masukkan Asam Urat">
                                            </div>
                                        </div>

                                        <!-- Fields untuk Ultrasound -->
                                        <div id="ultraSoundFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Ultrasound</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sinyalUltrasound">Sinyal Ultrasound</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sinyalUltrasound" rows="5" placeholder="Sinyal Ultrasound" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1</textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Super Bright -->
                                        <div id="superBrightFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Super Bright</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sinyalSuperBright">Sinyal Super Bright</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sinyalSuperBright" rows="5" placeholder="Sinyal Super Bright" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1</textarea>
                                            </div>
                                        </div>

                                        <!-- Fields untuk Magnetik -->
                                        <div id="magnetikFields" style="display: none;">
                                            <div>
                                                <h6 class="h6 mt-4 mb-4">Magnetik</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sinyalMagnetik">Sinyal Magnetik</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sinyalMagnetik" rows="5" placeholder="Sinyal Magnetik" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1</textarea>
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
    // Menampilkan alat
    function showFields() {
        var selectedValue = document.getElementById("basicSelect").value;
        var fields = ["suntikFields", "ultraSoundFields", "superBrightFields", "magnetikFields"];

        fields.forEach(function(field) {
            document.getElementById(field).style.display = "none";
        });

        if (selectedValue) {
            document.getElementById(selectedValue + "Fields").style.display = "block";
        }
    }

    // Tampilkan NIK
    $(document).ready(function() {
        $('#nik').change(function() {
            var nik = $(this).val();
            if (nik != "") {
                $.ajax({
                    url: '<?php echo base_url("Analisis_darah/get_nama"); ?>',
                    method: 'POST',
                    data: {
                        nik: nik
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#nama').val(response.nama);
                        } else {
                            $('#nama').val('');
                        }
                    }
                });
            } else {
                $('#nama').val('');
            }
        });
    });
</script>