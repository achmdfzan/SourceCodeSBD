<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$username = $_SESSION["user"];


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
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Halo, Selamat datang <b><?php echo $username; ?></b> di Sistem Informasi MBKM</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> -->
                </ol>
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
                            <div class="stat-text">Pendaftar MBKM</div>
                            <div class="stat-digit">
                                <?php
                                echo tampil2("SELECT COUNT(*) as total from peserta_mbkm");
                                ?></div>
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
                            <div class="stat-text">Lolos MBKM</div>
                            <div class="stat-digit"><?php
                                                    echo tampil2("SELECT COUNT(*) as total from peserta_program_mbkm WHERE kelolosan=1");
                                                    ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-book text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Mata Kuliah</div>
                            <div class="stat-digit"><?php
                                                    echo tampil2("SELECT COUNT(*) as total from matkul");
                                                    ?></div>
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
                            <div class="stat-text">Dosen</div>
                            <div class="stat-digit"><?php
                                                    echo tampil2("SELECT COUNT(*) as total from dosen");
                                                    ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-8">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-list text-pink border-pink"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Program MBKM yang diambil Mahasiswa</div>
                            <div class="stat-digit"><?php
                                                    echo tampil2("SELECT COUNT(*) as total from program_mbkm");
                                                    ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-8">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-comment text-black border-black"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Pengajuan Surat yang belum di acc</div>
                            <div class="stat-digit"><?php
                                                    echo tampil2("SELECT COUNT(*) as total from peserta_program_mbkm WHERE status_pengajuan=0");
                                                    ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Grafik Mahasiswa Program MBKM Pertahun</h4>
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
                            labels: ["2019", "2020", "2021", "2022", "2023", ],
                            datasets: [{
                                label: "My First dataset",
                                data: [<?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE tahun_ajaran=2019"); ?>,
                                    <?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE tahun_ajaran=2020"); ?>,
                                    <?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE tahun_ajaran=2021"); ?>,
                                    <?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE tahun_ajaran=2022"); ?>,
                                    <?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE tahun_ajaran=2023"); ?>,
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
                                data: [<?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE kelolosan=1") ?>,
                                    <?php echo tampil2("SELECT COUNT(*) as total FROM peserta_program_mbkm WHERE kelolosan=0") ?>,
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