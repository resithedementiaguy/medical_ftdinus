<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Periksa Data Manual dan AKM</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Periksa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>

    <section class="section">
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Sistol Manual</th>
                                <th>Sistol AKM</th>
                                <th>Selisih Sistol</th>
                                <th>Diastol Manual</th>
                                <th>Diastol AKM</th>
                                <th>Selisih Diastol</th>
                                <th>Tinggi Badan Manual</th>
                                <th>Tinggi Badan AKM</th>
                                <th>Selisih Tinggi Badan</th>
                                <th>Berat Badan Manual</th>
                                <th>Berat Badan AKM</th>
                                <th>Selisih Berat Badan</th>
                                <th>Glukosa Manual</th>
                                <th>Glukosa AKM</th>
                                <th>Selisih Glukosa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($daftar_periksa)) : ?>
                                <?php $no = 1;
                                foreach ($daftar_periksa as $pasien) : ?>
                                    <tr>
                                        <td class="py-3"><?php echo $no++; ?></td>
                                        <td><?= $pasien->manual_nama?></td>
                                        <td><?= $pasien->manual_sistol?></td>
                                        <td><?= $pasien->akm_sistol?></td>
                                        <td><?= $pasien->diff_sistol?></td>                                        
                                        <td><?= $pasien->manual_diastol?></td>
                                        <td><?= $pasien->akm_diastol?></td>
                                        <td><?= $pasien->diff_diastol?></td>
                                        <td><?= $pasien->manual_tinggi_bdn?></td>
                                        <td><?= $pasien->akm_tinggi_bdn?></td>
                                        <td><?= $pasien->diff_tinggi_bdn?></td>
                                        <td><?= $pasien->manual_berat_bdn?></td>
                                        <td><?= $pasien->akm_berat_bdn?></td>
                                        <td><?= $pasien->diff_berat_bdn?></td>
                                        <td><?= $pasien->manual_glukosa?></td>
                                        <td><?= $pasien->akm_glukosa?></td>
                                        <td><?= $pasien->diff_glukosa?></td>
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