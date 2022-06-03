<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$username = $_SESSION["user"];
$id_akun = $_SESSION["id"];

$id_peserta_mbkm = tampil("SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun");

include('../../../view/header.php');
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Page Content -->
<div id="page-content-wrapper">

    <link href="../../../assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">

    <link href="../../../assets/css/style.css" rel="stylesheet">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage">
                    <div class="text-center">
                        <h2>Program Kampus Merdeka</h2>
                        <p>
                            Halo <b><?php echo $username; ?></b>, Selamat datang di Dashboard MBKM
                            <br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Jumlah Mahasiswa yang Sudah Mengikuti Program MBKM minimal 20 SKS</div>
                            <div class="stat-digit"><?php echo hitung("SELECT COUNT(id_peserta_mbkm) AS jumlah FROM`peserta_mbkm` WHERE total_sks_mbkm >=20;") ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">SKS MBKM Terbanyak yang Pernah Dicapai Mahasiswa</div>
                            <div class="stat-digit"><?php echo hitung("SELECT MAX(total_sks_mbkm) AS jumlah FROM`peserta_mbkm`"); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Jumlah Perolehan SKS MBKM Anda</div>
                            <div class="stat-digit"><?php echo hitung("SELECT total_sks_mbkm AS jumlah FROM`peserta_mbkm` WHERE id_akun = $id_akun;") ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Jumlah Program MBKM yang Anda Ikuti</div>
                            <div class="stat-digit"><?php echo hitung("SELECT COUNT(*) AS jumlah FROM`peserta_program_mbkm` WHERE id_peserta_mbkm = (SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun) ;"); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grafik Peserta Program MBKM Perkategori</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart_test"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grafik Kelolosan Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="pie_chart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <!-- Required vendors -->
        <script src="../../../assets/vendor/global/global.min.js"></script>
        <script src="../../../assets/js/quixnav-init.js"></script>
        <script src="../../../assets/js/custom.min.js"></script>

        <script src="../../../assets/vendor/chartist/js/chartist.min.js"></script>

        <script src="../../../assets/vendor/moment/moment.min.js"></script>
        <script src="../../../assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


        <!-- Chart ChartJS plugin files -->
        <script src="../../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
        <script>
            // Build the chart
            (function($) {
                new Chart(barChart_test, {
                    type: 'bar',
                    data: {
                        defaultFontFamily: 'Poppins',
                        labels: ["Magang", "Studi Independen", "Bangkit", "PKM", "Kampus Mengajar", ],
                        datasets: [{
                            label: "My First dataset",
                            data: [<?php
                                    echo hitung("SELECT jumlah_mahasiswa as jumlah FROM kategori_program WHERE id_kategori_program=1"); 
                                    ?>,
                                <?php
                               echo hitung("SELECT jumlah_mahasiswa as jumlah FROM kategori_program WHERE id_kategori_program=2"); 
                                ?>,
                                <?php
                                echo hitung("SELECT jumlah_mahasiswa as jumlah FROM kategori_program WHERE id_kategori_program=3"); 
                                ?>,
                                <?php
                                echo hitung("SELECT jumlah_mahasiswa as jumlah FROM kategori_program WHERE id_kategori_program=5");
                                ?>,
                                <?php
                                echo hitung("SELECT jumlah_mahasiswa as jumlah FROM kategori_program WHERE id_kategori_program=7");
                                ?>,
                            ],
                            borderColor: 'rgba(26, 51, 213, 1)',
                            borderWidth: "0",
                            backgroundColor: 'rgba(26, 51, 213, 1)'
                        }]
                    },
                    options: {
                        legend: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }],
                            xAxes: [{
                                // Change here
                                barPercentage: 0.5
                            }]
                        }
                    }
                });
                const pie_chart = document.getElementById("pie_chart").getContext('2d');
                pie_chart.height = 100;
                new Chart(pie_chart, {
                    type: 'pie',
                    data: {
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            data: [<?php
                                    echo hitung("SELECT COUNT(*) as jumlah FROM peserta_program_mbkm WHERE kelolosan=1") 
                                    ?>,
                                <?php
                                echo hitung("SELECT COUNT(*) as jumlah FROM peserta_program_mbkm WHERE kelolosan=0") 
                                ?>,
                            ],
                            borderWidth: 0,
                            backgroundColor: [
                                "rgba(0, 171, 197, .9)",
                                "rgba(0, 171, 197, .7)",
                                "rgba(0, 171, 197, .5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 171, 197, .9)",
                                "rgba(0, 171, 197, .7)",
                                "rgba(0, 171, 197, .5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: [
                            "Mahasiswa yang lolos program MBKM",
                            "Mahasiswa yang tidak lolos program MBKM",

                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        maintainAspectRatio: true
                    }
                });
            })(jQuery);
        </script>
        <script src="../../../assets/js/plugins-init/chartjs-init.js"></script>


        <script src="../../../assets/js/dashboard/dashboard-2.js"></script>

        <?php
        include('../../../view/footer.php');
        ?>