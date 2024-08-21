<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Periksa Pasien</h3>
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
                <div>
                    <h5 class="h5">Total Rekap Selisih Semua Data</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Total Data Manual</th>
                                <th>Total Data AKM</th>
                                <th>Total Selisih Data</th>
                                <th>Selisih Rata-Rata</th>
                                <th>Persentase Selisih</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tensi Sistol</td>
                                <td><?= $total_recap->manual_sistol ?></td>
                                <td><?= $total_recap->akm_sistol ?></td>
                                <td><?= $total_recap->total_selisih_sistol ?></td>
                                <td><?= $total_recap->avg_sistol ?></td>
                                <td><?= ($total_recap->avg_manual_sistol != 0) ? round(($total_recap->avg_sistol / $total_recap->avg_manual_sistol) * 100, 2) . '%' : '0%' ?></td>
                                <td><?= $total_recap->keterangan_sistol ?></td>
                            </tr>
                            <tr>
                                <td>Tensi Diastol</td>
                                <td><?= $total_recap->manual_diastol ?></td>
                                <td><?= $total_recap->akm_diastol ?></td>
                                <td><?= $total_recap->total_selisih_diastol ?></td>
                                <td><?= $total_recap->avg_diastol ?></td>
                                <td><?= ($total_recap->avg_manual_diastol != 0) ? round(($total_recap->avg_diastol / $total_recap->avg_manual_diastol) * 100, 2) . '%' : '0%' ?></td>
                                <td><?= $total_recap->keterangan_diastol ?></td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td><?= $total_recap->manual_tinggi_bdn ?></td>
                                <td><?= $total_recap->akm_tinggi_bdn ?></td>
                                <td><?= $total_recap->total_selisih_tinggi_bdn ?></td>
                                <td><?= $total_recap->avg_tinggi_bdn ?></td>
                                <td><?= ($total_recap->avg_manual_tinggi_bdn != 0) ? round(($total_recap->avg_tinggi_bdn / $total_recap->avg_manual_tinggi_bdn) * 100, 2) . '%' : '0%' ?></td>
                                <td><?= $total_recap->keterangan_tinggi_bdn ?></td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td><?= $total_recap->manual_berat_bdn ?></td>
                                <td><?= $total_recap->akm_berat_bdn ?></td>
                                <td><?= $total_recap->total_selisih_berat_bdn ?></td>
                                <td><?= $total_recap->avg_berat_bdn ?></td>
                                <td><?= ($total_recap->avg_manual_berat_bdn != 0) ? round(($total_recap->avg_berat_bdn / $total_recap->avg_manual_berat_bdn) * 100, 2) . '%' : '0%' ?></td>
                                <td><?= $total_recap->keterangan_berat_bdn ?></td>
                            </tr>
                            <tr>
                                <td>Glukosa</td>
                                <td><?= $total_recap->manual_glukosa ?></td>
                                <td><?= $total_recap->akm_glukosa ?></td>
                                <td><?= $total_recap->total_selisih_glukosa ?></td>
                                <td><?= $total_recap->avg_glukosa ?></td>
                                <td><?= ($total_recap->avg_manual_glukosa != 0) ? round(($total_recap->avg_glukosa / $total_recap->avg_manual_glukosa) * 100, 2) . '%' : '0%' ?></td>
                                <td><?= $total_recap->keterangan_glukosa ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="h5">Daftar riwayat periksa pasien</h5>
                </div>
            </div>
            <div class="card-body">
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
                                            <a href="<?php echo site_url('pasien/detail/' . $pasien['nik']); ?>"><?php echo $pasien['nik']; ?></a>
                                        </td>
                                        <td><?php echo $pasien['nama']; ?></td>
                                        <td><?php echo formatDate($pasien['tanggal_lahir']); ?></td>
                                        <td><?php echo $pasien['pembuat']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('pasien/detail/' . $pasien['nik']); ?>" class="badge bg-success">
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