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

        <!-- Menampilkan Hasil Persentase -->
        <?php if (!empty($daftar_periksa)) : ?>
        <div class="card mt-4">
            <div class="card-body">
                <h4>Persentase Ketepatan Data AKM dengan Data Manual</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="startDate">Tanggal Mulai:</label>
                        <input type="date" id="startDate" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="endDate">Tanggal Akhir:</label>
                        <input type="date" id="endDate" class="form-control">
                    </div>
                </div>
                <div class="col-md-8 form-group">
                    <label for="range">Range Ketepatan:</label>
                    <input type="number" id="range" class="form-control" name="range" placeholder="Masukkan range ketepatan" value="0">
                </div>
                <button id="filterBtn" class="btn btn-primary">Filter</button>
                <br>
                <br>
                <div class="col-md-4">
                    <h5>Persentase Hasil Selisih Sistol:</h5>
                    <p>Data AKM Minus: <strong id="persentase_sistol_minus"></strong></p>
                    <p>Data AKM Lebih: <strong id="persentase_sistol_lebih"></strong></p>
                    <p>Data AKM Tepat: <strong id="persentase_sistol_tepat"></strong></p>

                    <h5>Persentase Hasil Selisih Diastol:</h5>
                    <p>Data AKM Minus: <strong id="persentase_diastol_minus"></strong></p>
                    <p>Data AKM Lebih: <strong id="persentase_diastol_lebih"></strong></p>
                    <p>Data AKM Tepat: <strong id="persentase_diastol_tepat"></strong></p>

                    <h5>Persentase Hasil Selisih Tinggi Badan:</h5>
                    <p>Data AKM Minus: <strong id="persentase_tinggi_bdn_minus"></strong></p>
                    <p>Data AKM Lebih: <strong id="persentase_tinggi_bdn_lebih"></strong></p>
                    <p>Data AKM Tepat: <strong id="persentase_tinggi_bdn_tepat"></strong></p>
                </div>

                <div class="col-md-8">
                    <h5>Persentase Hasil Selisih Berat Badan:</h5>
                    <p>Data AKM Minus: <strong id="persentase_berat_bdn_minus"></strong></p>
                    <p>Data AKM Lebih: <strong id="persentase_berat_bdn_lebih"></strong></p>
                    <p>Data AKM Tepat: <strong id="persentase_berat_bdn_tepat"></strong></p>

                    <h5>Persentase Hasil Selisih Glukosa:</h5>
                    <p>Data AKM Minus: <strong id="persentase_glukosa_minus"></strong></p>
                    <p>Data AKM Lebih: <strong id="persentase_glukosa_lebih"></strong></p>
                    <p>Data AKM Tepat: <strong id="persentase_glukosa_tepat"></strong></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
                                <th>Total Selisih Data Negatif</th>
                                <th>Total Selisih Data Positif</th>
                                <th>Selisih Rata-Rata</th>
                                <th>Persentase Selisih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tensi Sistol</td>
                                <td><?= $total_recap->manual_sistol ?></td>
                                <td><?= $total_recap->akm_sistol ?></td>
                                <td><?= $total_recap->total_selisih_sistol ?></td>
                                <td><?= $total_recap->total_selisih_negatif_sistol ?></td>
                                <td><?= $total_recap->total_selisih_positif_sistol ?></td>
                                <td><?= $total_recap->avg_sistol ?></td>
                                <td><?= ($total_recap->persentase_selisih_sistol != 0) ? $total_recap->persentase_selisih_sistol . '%' : '0%' ?></td>
                            </tr>
                            <tr>
                                <td>Tensi Diastol</td>
                                <td><?= $total_recap->manual_diastol ?></td>
                                <td><?= $total_recap->akm_diastol ?></td>
                                <td><?= $total_recap->total_selisih_diastol ?></td>
                                <td><?= $total_recap->total_selisih_negatif_diastol ?></td>
                                <td><?= $total_recap->total_selisih_positif_diastol ?></td>
                                <td><?= $total_recap->avg_diastol ?></td>
                                <td><?= ($total_recap->persentase_selisih_diastol != 0) ? $total_recap->persentase_selisih_diastol . '%' : '0%' ?></td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td><?= $total_recap->manual_tinggi_bdn ?></td>
                                <td><?= $total_recap->akm_tinggi_bdn ?></td>
                                <td><?= $total_recap->total_selisih_tinggi_bdn ?></td>
                                <td><?= $total_recap->total_selisih_negatif_tinggi_bdn ?></td>
                                <td><?= $total_recap->total_selisih_positif_tinggi_bdn ?></td>
                                <td><?= $total_recap->avg_tinggi_bdn ?></td>
                                <td><?= ($total_recap->persentase_selisih_tinggi_bdn != 0) ? $total_recap->persentase_selisih_tinggi_bdn . '%' : '0%' ?></td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td><?= $total_recap->manual_berat_bdn ?></td>
                                <td><?= $total_recap->akm_berat_bdn ?></td>
                                <td><?= $total_recap->total_selisih_berat_bdn ?></td>
                                <td><?= $total_recap->total_selisih_negatif_berat_bdn ?></td>
                                <td><?= $total_recap->total_selisih_positif_berat_bdn ?></td>
                                <td><?= $total_recap->avg_berat_bdn ?></td>
                                <td><?= ($total_recap->persentase_selisih_berat_bdn != 0) ? $total_recap->persentase_selisih_berat_bdn . '%' : '0%' ?></td>
                            </tr>
                            <tr>
                                <td>Glukosa</td>
                                <td><?= $total_recap->manual_glukosa ?></td>
                                <td><?= $total_recap->akm_glukosa ?></td>
                                <td><?= $total_recap->total_selisih_glukosa ?></td>
                                <td><?= $total_recap->total_selisih_negatif_glukosa ?></td>
                                <td><?= $total_recap->total_selisih_positif_glukosa ?></td>
                                <td><?= $total_recap->avg_glukosa ?></td>
                                <td><?= ($total_recap->persentase_selisih_glukosa != 0) ? $total_recap->persentase_selisih_glukosa . '%' : '0%' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-head d-flex justify-content-end">
                    <!-- Add this button after the table -->
                    <div class="mt-3">
                        <button id="exportExcel" class="btn btn-success">
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Export to Excel</span>
                        </button>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
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
                            <?php 
                            if (!empty($daftar_periksa)) : 
                                $no = 1;
                                $total_diff = count($daftar_periksa);
                                
                                // Inisialisasi variabel untuk persentase
                                $minus_diff_sistol = $lebih_diff_sistol = $tepat_diff_sistol = 0;
                                $minus_diff_diastol = $lebih_diff_diastol = $tepat_diff_diastol = 0;
                                $minus_diff_tinggi_bdn = $lebih_diff_tinggi_bdn = $tepat_diff_tinggi_bdn = 0;
                                $minus_diff_berat_bdn = $lebih_diff_berat_bdn = $tepat_diff_berat_bdn = 0;
                                $minus_diff_glukosa = $lebih_diff_glukosa = $tepat_diff_glukosa = 0;

                                foreach ($daftar_periksa as $pasien) : 
                                    // Menghitung jumlah persentase diff_sistol
                                    if ($pasien->diff_sistol < 0) {
                                        $minus_diff_sistol++;
                                    } elseif ($pasien->diff_sistol > 0) {
                                        $lebih_diff_sistol++;
                                    } else {
                                        $tepat_diff_sistol++;
                                    }

                                    // Menghitung jumlah persentase diff_diastol
                                    if ($pasien->diff_diastol < 0) {
                                        $minus_diff_diastol++;
                                    } elseif ($pasien->diff_diastol > 0) {
                                        $lebih_diff_diastol++;
                                    } else {
                                        $tepat_diff_diastol++;
                                    }

                                    // Menghitung jumlah persentase diff_tinggi_bdn
                                    if ($pasien->diff_tinggi_bdn < 0) {
                                        $minus_diff_tinggi_bdn++;
                                    } elseif ($pasien->diff_tinggi_bdn > 0) {
                                        $lebih_diff_tinggi_bdn++;
                                    } else {
                                        $tepat_diff_tinggi_bdn++;
                                    }

                                    // Menghitung jumlah persentase diff_berat_bdn
                                    if ($pasien->diff_berat_bdn < 0) {
                                        $minus_diff_berat_bdn++;
                                    } elseif ($pasien->diff_berat_bdn > 0) {
                                        $lebih_diff_berat_bdn++;
                                    } else {
                                        $tepat_diff_berat_bdn++;
                                    }

                                    // Menghitung jumlah persentase diff_glukosa
                                    if ($pasien->diff_glukosa < 0) {
                                        $minus_diff_glukosa++;
                                    } elseif ($pasien->diff_glukosa > 0) {
                                        $lebih_diff_glukosa++;
                                    } else {
                                        $tepat_diff_glukosa++;
                                    }
                            ?>
                                <tr>
                                    <td class="py-3"><?php echo $no++; ?></td>
                                    <td><?= $pasien->manual_nama ?></td>
                                    <td><?= formatDate($pasien->manual_tgl)?></td>
                                    <td><?= $pasien->manual_sistol ?></td>
                                    <td><?= $pasien->akm_sistol ?></td>
                                    <td><?= $pasien->diff_sistol ?></td>
                                    <td><?= $pasien->manual_diastol ?></td>
                                    <td><?= $pasien->akm_diastol ?></td>
                                    <td><?= $pasien->diff_diastol ?></td>
                                    <td><?= $pasien->manual_tinggi_bdn ?></td>
                                    <td><?= $pasien->akm_tinggi_bdn ?></td>
                                    <td><?= $pasien->diff_tinggi_bdn ?></td>
                                    <td><?= $pasien->manual_berat_bdn ?></td>
                                    <td><?= $pasien->akm_berat_bdn ?></td>
                                    <td><?= $pasien->diff_berat_bdn ?></td>
                                    <td><?= $pasien->manual_glukosa ?></td>
                                    <td><?= $pasien->akm_glukosa ?></td>
                                    <td><?= $pasien->diff_glukosa ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="17">Tidak ada data pasien.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
    </section>
</div>

<!-- Add this JavaScript code after the existing script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
document.getElementById('exportExcel').addEventListener('click', function() {
    const table = document.getElementById('table1');
    const ws = XLSX.utils.table_to_sheet(table);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Daftar Periksa");
    
    // Generate file name with current date
    const date = new Date();
    const fileName = `daftar_periksa_${date.getFullYear()}${(date.getMonth()+1).toString().padStart(2,'0')}${date.getDate().toString().padStart(2,'0')}.xlsx`;
    
    XLSX.writeFile(wb, fileName);
});
</script>

<script>    

    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('filterBtn').addEventListener('click', function() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;
        var range = document.getElementById('range').value;

        if (startDate && endDate && range) {
            $.ajax({
                url: '<?= base_url("total_periksa/calculate_percentage_by_date") ?>', // Ganti dengan controller dan method yang sesuai
                method: 'POST',
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    range: range
                },
                dataType: 'json',
                success: function(response) {
                    $('#persentase_sistol_minus').text(response.sistol_minus.toFixed(2) + '%');
                    $('#persentase_sistol_lebih').text(response.sistol_lebih.toFixed(2) + '%');
                    $('#persentase_sistol_tepat').text(response.sistol_tepat.toFixed(2) + '%');
                    
                    $('#persentase_diastol_minus').text(response.diastol_minus.toFixed(2) + '%');
                    $('#persentase_diastol_lebih').text(response.diastol_lebih.toFixed(2) + '%');
                    $('#persentase_diastol_tepat').text(response.diastol_tepat.toFixed(2) + '%');
                    
                    $('#persentase_tinggi_bdn_minus').text(response.tinggi_bdn_minus.toFixed(2) + '%');
                    $('#persentase_tinggi_bdn_lebih').text(response.tinggi_bdn_lebih.toFixed(2) + '%');
                    $('#persentase_tinggi_bdn_tepat').text(response.tinggi_bdn_tepat.toFixed(2) + '%');
                    
                    $('#persentase_berat_bdn_minus').text(response.berat_bdn_minus.toFixed(2) + '%');
                    $('#persentase_berat_bdn_lebih').text(response.berat_bdn_lebih.toFixed(2) + '%');
                    $('#persentase_berat_bdn_tepat').text(response.berat_bdn_tepat.toFixed(2) + '%');
                    
                    $('#persentase_glukosa_minus').text(response.glukosa_minus.toFixed(2) + '%');
                    $('#persentase_glukosa_lebih').text(response.glukosa_lebih.toFixed(2) + '%');
                    $('#persentase_glukosa_tepat').text(response.glukosa_tepat.toFixed(2) + '%');
                }
            });
        } else {
            alert('Mohon pilih rentang tanggal dan masukkan range ketepatan.');
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