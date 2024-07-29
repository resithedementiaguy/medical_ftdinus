<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Analisis Darah</h3>
                <p class="text-subtitle text-muted">Silahkan untuk menganalisis darah pasien</p>
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

    <!-- NIK -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Analisis Darah</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="password-horizontal">NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="nik" name="nik">
                                                    <option value="" selected hidden>Pilih NIK</option>
                                                    <?php foreach($ktp as $data): ?>
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Alat Medical</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="password-horizontal">Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="alat" name="alat">
                                                    <option value="" selected hidden>Pilih Alat</option>
                                                    <option>Suntik</option>
                                                    <option>Ultra Sound</option>
                                                    <option>Super Bright</option>
                                                    <option>Magnetik</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Glukosa</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control" name="fname" placeholder="Masukkan Glukosa">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">HB</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control" name="fname" placeholder="Masukkan HB">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">SPO2</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control" name="fname" placeholder="Masukkan SPO2">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kolestrol</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control" name="fname" placeholder="Masukkan Kolestrol">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Asam Urat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control" name="fname" placeholder="Masukkan Asam Urat">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Sinyal Ultrasound 1</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control" id="exampleFormControlUltraSound" rows="5" placeholder="Sinyal Ultrasound" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Sinyal Ultrasound 2</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control" id="exampleFormControlUltraSound" rows="5" placeholder="Sinyal Ultrasound" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Sinyal Ultrasound 3</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control" id="exampleFormControlUltraSound" rows="5" placeholder="Sinyal Ultrasound" disabled>0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1, 0.0, 0.1, 0.2, 0.3, 0.4, 0.3, 0.2, 0.1, -0.1, -0.2, -0.3, -0.4, -0.3, -0.2, -0.1
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
$(document).ready(function() {
    $('#nik').change(function() {
        var nik = $(this).val();
        if (nik != "") {
            $.ajax({
                url: '<?php echo base_url("Analisis_darah/get_nama"); ?>',
                method: 'POST',
                data: {nik: nik},
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