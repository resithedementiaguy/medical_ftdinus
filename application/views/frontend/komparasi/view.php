<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Komparasi Riwayat Periksa Pasien</h3>
                <p class="text-subtitle text-muted">Daftar semua riwayat periksa pasien</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="table-tab" data-bs-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">Daftar riwayat periksa pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chart-tab" data-bs-toggle="tab" href="#chart" role="tab" aria-controls="chart" aria-selected="false">Grafik</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                        <br>
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pembuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pasien_list)) : ?>
                                        <?php $no = 1;
                                        foreach ($pasien_list as $pasien) : ?>
                                            <tr>
                                                <td class="py-3"><?php echo $no++; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('komparasi/detail/' . $pasien['nik']); ?>"><?php echo $pasien['nik']; ?></a>
                                                </td>
                                                <td><?php echo $pasien['nama']; ?></td>
                                                <td><?php echo formatDate($pasien['tanggal_lahir']); ?></td>
                                                <td><?php echo $pasien['pembuat']; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('komparasi/detail/' . $pasien['nik']); ?>" class="badge bg-success">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6">Tidak ada data pasien.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                        <br>
                        <div class="table-responsive">
                            <table class="table" id="table1">
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
                                            <td><?= $data->selisih_sistol?></td>
                                        </tr>
                                        <tr>
                                            <td>Tensi Diastol</td>
                                            <td><?= $data->manual_diastol ?></td>
                                            <td><?= $data->akm_diastol ?></td>
                                            <td><?= $data->selisih_diastol?></td>
                                        </tr>
                                        <tr>
                                            <td>Tinggi Badan</td>
                                            <td><?= $data->manual_tinggi_bdn ?></td>
                                            <td><?= $data->akm_tinggi_bdn ?></td>
                                            <td><?= $data->selisih_tinggi_bdn?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat Badan</td>
                                            <td><?= $data->manual_berat_bdn ?></td>
                                            <td><?= $data->akm_berat_bdn ?></td>
                                            <td><?= $data->selisih_berat_bdn?></td>
                                        </tr>
                                        <tr>
                                            <td>Glukosa</td>
                                            <td><?= $data->manual_glukosa ?></td>
                                            <td><?= $data->akm_glukosa ?></td>
                                            <td><?= $data->selisih_glukosa?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

<?php
// Format Tanggal
function formatDate($datetime)
{
    $date = new DateTime($datetime);
    $months = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei',
        6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    $day = $date->format('d');
    $month = $months[(int)$date->format('m')];
    $year = $date->format('Y');

    return "{$day} {$month} {$year}";
}
?>