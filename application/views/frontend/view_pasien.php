<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>List Hasil Pasien</h3>
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

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar Pasien
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Kota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1234567890123456</td>
                                <td>John Doe</td>
                                <td>Semarang</td>
                                <td>
                                    <span class="badge bg-warning">
                                        <i class="fas fa-eye"></i> Lihat
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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