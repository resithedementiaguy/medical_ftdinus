<div class="page-heading">
    <h3>Dashboard Medical</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <h5>Selamat datang, <?= $this->session->userdata('username') ?></h5>
            <br>
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldHeart"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Periksa</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_pemeriksaan ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pasien</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_pasien ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Periksa Minggu Ini</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="periksaMingguanChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Periksa Suntik Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($suntik as $s): ?>
                                            <tr>
                                                <td class="col-2">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold mb-0"><?= $s->nama ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0"><?= $s->nik ?></p>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0 nowrap"><?= formatDateTime($s->ins_time_datetime) ?></p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Periksa Ultrasound Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ultrasound as $us): ?>
                                            <tr>
                                                <td class="col-2">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold mb-0"><?= $us->nama ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0"><?= $us->nik ?></p>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0 nowrap"><?= formatDateTime($us->ins_time_datetime) ?></p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Periksa Superbright Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($superbright as $sb): ?>
                                            <tr>
                                                <td class="col-2">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold mb-0"><?= $sb->nama ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0"><?= $sb->nik ?></p>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0 nowrap"><?= formatDateTime($sb->ins_time_datetime) ?></p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Periksa Magnetik Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($magnetik as $mag): ?>
                                            <tr>
                                                <td class="col-2">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold mb-0"><?= $mag->nama ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0"><?= $mag->nik ?></p>
                                                </td>
                                                <td class="col-4">
                                                    <p class="mb-0 nowrap"><?= formatDateTime($mag->ins_time_datetime) ?></p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Periksa</h4>
                </div>
                <div class="card-body">
                    <canvas id="chart-periksa"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pasien Terbaru</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($pasien as $p): ?>
                        <div class="recent-message d-flex px-4 py-3">

                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $p->nama ?></h5>
                                <h6 class="text-muted mb-0"><?= $p->nik ?></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
    .nowrap {
        white-space: nowrap;
    }

    @media (max-width: 576px) {
        .custom-mb {
            margin-bottom: .5rem;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("periksaMingguanChart").getContext("2d");

        // Data dari PHP ke JavaScript
        var periksaMingguan = <?= json_encode($periksa_mingguan) ?>;

        // Inisialisasi data per hari dalam minggu
        var daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        var suntikData = Array(7).fill(0);
        var ultrasoundData = Array(7).fill(0);
        var superbrightData = Array(7).fill(0);
        var magnetikData = Array(7).fill(0);

        // Olah data untuk Chart.js
        periksaMingguan.forEach(function(item) {
            var dayIndex = daysOfWeek.indexOf(item.day);
            if (dayIndex !== -1) {
                switch (item.type) {
                    case 'Suntik':
                        suntikData[dayIndex] = item.total;
                        break;
                    case 'Ultrasound':
                        ultrasoundData[dayIndex] = item.total;
                        break;
                    case 'Superbright':
                        superbrightData[dayIndex] = item.total;
                        break;
                    case 'Magnetik':
                        magnetikData[dayIndex] = item.total;
                        break;
                }
            }
        });

        // Membuat grafik bar
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: daysOfWeek,
                datasets: [{
                        label: 'Suntik',
                        data: suntikData,
                        backgroundColor: '#FF6384',
                    },
                    {
                        label: 'Ultrasound',
                        data: ultrasoundData,
                        backgroundColor: '#36A2EB',
                    },
                    {
                        label: 'Superbright',
                        data: superbrightData,
                        backgroundColor: '#FFCE56',
                    },
                    {
                        label: 'Magnetik',
                        data: magnetikData,
                        backgroundColor: '#4BC0C0',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.dataset.label;
                                var value = tooltipItem.raw;
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Get context with jQuery - using jQuery's .get() method.
        var ctx = document.getElementById("chart-periksa").getContext("2d");

        // Data dari PHP ke JavaScript
        var totalSuntik = <?= $total_suntik ?>;
        var totalUltrasound = <?= $total_ultrasound ?>;
        var totalSuperbright = <?= $total_superbright ?>;
        var totalMagnetik = <?= $total_magnetik ?>;

        // Data untuk Chart.js
        var data = {
            labels: ["Suntik", "Ultrasound", "Superbright", "Magnetik"],
            datasets: [{
                data: [totalSuntik, totalUltrasound, totalSuperbright, totalMagnetik],
                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"],
                hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"]
            }]
        };

        // Membuat grafik pie
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = data.labels[tooltipItem.dataIndex];
                                var value = data.datasets[0].data[tooltipItem.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

<?php
function formatDateTime($datetime)
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
    $time = $date->format('H:i:s');

    return "{$day} {$month} {$year}, {$time} WIB";
}
?>