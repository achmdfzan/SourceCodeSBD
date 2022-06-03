<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$enters = tampil("SELECT * FROM mahasiswa");

include('../../../view/header.php');
?>
<script src="../../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../../assets/js/plugins-init/chartjs-init.js"></script>

<!-- Page Content -->
<div id="page-content-wrapper">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link href="../../../assets/css/style.css" rel="stylesheet">


    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">ChartJS</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gradient Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stalked Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Line Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gradient Line Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart_2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dual Line Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart_3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="areaChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gradinet Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="areaChart_2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dual Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="areaChart_3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dual Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="pie_chart"></canvas>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/vendor/global/global.min.js"></script>
    <script src="../../../assets/js/quixnav-init.js"></script>
    <script src="../../../assets/js/custom.min.js"></script>




    <!-- Chart ChartJS plugin files -->
    <script src="../../../assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../../../assets/js/plugins-init/chartjs-init.js"></script>
</div>

<?php
include('../../../view/footer.php');
?>