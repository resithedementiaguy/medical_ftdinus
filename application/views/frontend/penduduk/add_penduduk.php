<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Tambah Penduduk</h3>
                <p class="text-subtitle text-muted">Silahkan isi form di bawah sesuai dengan KTP</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Penduduk</li>
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
                            <form class="form form-horizontal" id="analisisForm" action="<?= base_url('penduduk/add') ?>" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div>
                                            <h5 class="h5 mb-4">Informasi Penduduk</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nik">NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nik" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" data-parsley-required="true" data-parsley-error-message="NIK wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" data-parsley-required="true" data-parsley-error-message="Nama Lengkap wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" data-parsley-required="true" data-parsley-error-message="Email wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="no_hp">Nomor HP</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="no_hp" class="form-control" name="no_hp" placeholder="Nomor HP" data-parsley-required="true" data-parsley-error-message="Nomor HP wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" data-parsley-required="true" data-parsley-error-message="Tempat Lahir wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" data-parsley-required="true" data-parsley-error-message="Tanggal Lahir wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input type="radio" id="jenis_kelamin_l" class="form-check-input" name="jenis_kelamin" value="L" data-parsley-required="true" data-parsley-error-message="Jenis Kelamin wajib diisi!">
                                                        <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input type="radio" id="jenis_kelamin_p" class="form-check-input" name="jenis_kelamin" value="P">
                                                        <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Informasi Alamat</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alamat">Alamat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea id="alamat" class="form-control" name="alamat" rows="3" placeholder="Alamat Lengkap" data-parsley-required="true" data-parsley-error-message="Alamat wajib diisi!"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rt">RT</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="rt" class="form-control" name="rt" placeholder="RT" data-parsley-required="true" data-parsley-error-message="RT wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rw">RW</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="rw" class="form-control" name="rw" placeholder="RW" data-parsley-required="true" data-parsley-error-message="RW wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kelurahan">Kelurahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kelurahan" class="form-control" name="kelurahan" placeholder="Kelurahan" data-parsley-required="true" data-parsley-error-message="Kelurahan wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kecamatan">Kecamatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan" data-parsley-required="true" data-parsley-error-message="Kecamatan wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kota">Kota</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kota" class="form-control" name="kota" placeholder="Kota" data-parsley-required="true" data-parsley-error-message="Kota wajib diisi!">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="provinsi">Provinsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="provinsi" class="form-control" name="provinsi" placeholder="Provinsi" data-parsley-required="true" data-parsley-error-message="Provinsi wajib diisi!">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" id="success" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                            <button id="spinner" class="btn btn-primary" type="button" disabled style="display: none;">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Loading...
                                            </button>
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

    $('#analisisForm').on('submit', function(e) {
        e.preventDefault();

        // Validasi form menggunakan Parsley
        if ($(this).parsley().isValid()) {
            // Sembunyikan tombol simpan dan tampilkan spinner
            $('#success').hide();
            $('#spinner').show();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Anda berhasil disimpan.',
                        icon: 'success',
                        confirmButtonText: 'Lanjut'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('penduduk'); ?>';
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        title: 'Kesalahan!',
                        text: 'Ada kesalahan simpan.',
                        icon: 'error',
                        confirmButtonText: 'Oke'
                    });

                    // Tampilkan kembali tombol simpan dan sembunyikan spinner jika ada error
                    $('#success').show();
                    $('#spinner').hide();
                }
            });
        } else {
            // Tampilkan pesan peringatan jika form tidak valid
            Swal.fire({
                title: 'Peringatan!',
                text: 'Form tidak boleh ada yang kosong',
                icon: 'warning',
                confirmButtonText: 'Oke'
            });
        }
    });
</script>