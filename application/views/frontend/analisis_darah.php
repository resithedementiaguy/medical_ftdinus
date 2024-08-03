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
                                                <select class="form-select" id="nik" name="nik">
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
                                            <div class="col-md-4">
                                                <label for="us1">Sinyal Ultrasound 1</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us1" name="us1" rows="5" placeholder="Sinyal Ultrasound 1" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us2">Sinyal Ultrasound 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us2" name="us2" rows="5" placeholder="Sinyal Ultrasound 2" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us3">Sinyal Ultrasound 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us3" name="us3" rows="5" placeholder="Sinyal Ultrasound 3" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us4">Sinyal Ultrasound 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us4" name="us4" rows="5" placeholder="Sinyal Ultrasound 4" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us5">Sinyal Ultrasound 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us5" name="us5" rows="5" placeholder="Sinyal Ultrasound 5" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us6">Sinyal Ultrasound 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us6" name="us6" rows="5" placeholder="Sinyal Ultrasound 6" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us7">Sinyal Ultrasound 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us7" name="us7" rows="5" placeholder="Sinyal Ultrasound 7" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us8">Sinyal Ultrasound 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us8" name="us8" rows="5" placeholder="Sinyal Ultrasound 8" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us9">Sinyal Ultrasound 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us9" name="us9" rows="5" placeholder="Sinyal Ultrasound 9" readonly>19,21 27,28 09,11</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="us10">Sinyal Ultrasound 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="us10" name="us10" rows="5" placeholder="Sinyal Ultrasound 10" readonly>19,21 27,28 09,11</textarea>
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
                                                <textarea class="form-control" id="sb1" name="sb1" rows="5" placeholder="Sinyal Super Bright 1" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb2">Sinyal Super Bright 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb2" name="sb2" rows="5" placeholder="Sinyal Super Bright 2" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb3">Sinyal Super Bright 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb3" name="sb3" rows="5" placeholder="Sinyal Super Bright 3" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb4">Sinyal Super Bright 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb4" name="sb4" rows="5" placeholder="Sinyal Super Bright 4" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb5">Sinyal Super Bright 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb5" name="sb5" rows="5" placeholder="Sinyal Super Bright 5" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb6">Sinyal Super Bright 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb6" name="sb6" rows="5" placeholder="Sinyal Super Bright 6" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb7">Sinyal Super Bright 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb7" name="sb7" rows="5" placeholder="Sinyal Super Bright 7" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb8">Sinyal Super Bright 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb8" name="sb8" rows="5" placeholder="Sinyal Super Bright 8" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb9">Sinyal Super Bright 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb9" name="sb9" rows="5" placeholder="Sinyal Super Bright 9" readonly>35,37 09,10 24,26</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sb10">Sinyal Super Bright 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="sb10" name="sb10" rows="5" placeholder="Sinyal Super Bright 10" readonly>35,37 09,10 24,26</textarea>
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
                                                <textarea class="form-control" id="mag1" name="mag1" rows="5" placeholder="Sinyal Magnetik 1" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag2">Sinyal Magnetik 2</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag2" name="mag2" rows="5" placeholder="Sinyal Magnetik 2" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag3">Sinyal Magnetik 3</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag3" name="mag3" rows="5" placeholder="Sinyal Magnetik 3" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag4">Sinyal Magnetik 4</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag4" name="mag4" rows="5" placeholder="Sinyal Magnetik 4" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag5">Sinyal Magnetik 5</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag5" name="mag5" rows="5" placeholder="Sinyal Magnetik 5" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag6">Sinyal Magnetik 6</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag6" name="mag6" rows="5" placeholder="Sinyal Magnetik 6" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag7">Sinyal Magnetik 7</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag7" name="mag7" rows="5" placeholder="Sinyal Magnetik 7" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag8">Sinyal Magnetik 8</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag8" name="mag8" rows="5" placeholder="Sinyal Magnetik 8" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag9">Sinyal Magnetik 9</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag9" name="mag9" rows="5" placeholder="Sinyal Magnetik 9" readonly>72,74 29,30 34,35</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mag10">Sinyal Magnetik 10</label>
                                            </div>
                                            <div class="col form-group">
                                                <textarea class="form-control" id="mag10" name="mag10" rows="5" placeholder="Sinyal Magnetik 10" readonly>72,74 29,30 34,35</textarea>
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

<!-- Modal  -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Tampilkan nama pada Select NIK
    $(document).ready(function() {
        $('#nik').change(function() {
            var selectedNik = $(this).val();
            if (selectedNik) {
                $.ajax({
                    url: '<?php echo base_url('analisis_darah/get_nama_by_nik'); ?>',
                    type: 'POST',
                    data: {
                        nik: selectedNik
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#nama').val(response);
                        } else {
                            $('#nama').val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
            } else {
                $('#nama').val('');
            }
        });

        $('#analisisForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var selectedNik = $('#nik').val();
            var selectedNama = $('#nama').val();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Menampilkan modal data berhasil ditambahkan
                    $('#successModal').modal('show');

                    console.log('Jumlah opsi di #alat:', $('#alat option').length);

                    // Cek apakah tidak ada opsi tersisa (default = 2 di console.log)
                    if ($('#alat option').length === 2) {
                        $('#successModal').modal('show');

                        // Event listener untuk modal saat diklik
                        $('#successModal').on('click', function() {
                            location.reload();
                        });
                    } else {
                        // Jika masih ada opsi, reset form dan sembunyikan fields
                        var selectedAlat = $('#alat').val();

                        // Remove the selected option
                        $('#alat option[value="' + selectedAlat + '"]').remove();

                        // Clear the fields after saving
                        $('#analisisForm')[0].reset();
                        $('#nik').val(selectedNik);
                        $('#nama').val(selectedNama);

                        // Hide the fields for the selected alat
                        if (selectedAlat) {
                            $('#' + selectedAlat + 'Fields').hide();
                        }

                        toggleFields();
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });
    });

    // Tampilkan Select Alat hidden
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

    // Tampilkan Field Alat hidden
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
</script>