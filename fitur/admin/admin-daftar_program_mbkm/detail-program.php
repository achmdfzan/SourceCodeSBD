<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id_program_mbkm = $_GET["id_program_mbkm"];
$nama_program = tampil("SELECT nama_program FROM program_mbkm WHERE id_program_mbkm=$id_program_mbkm")[0];
$infoMhs = tampil("SELECT * FROM peserta_program_mbkm JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi WHERE id_program_mbkm = $id_program_mbkm;");

// $infoMhs = tampil("SELECT * FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_peserta_mbkm = (SELECT id_peserta FROM peserta_program_mbkm WHERE id_program_mbkm = $id));")[0];

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        header("Location: ubah-sukses.php");
    } else {
        header("Location: ubah-gagal.php?id=$id");
    }
}

include('../../../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../../../assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <!-- <h4>Hi, welcome back!</h4> -->
                    <p class="mb-0">Daftar Mahasiswa Program <b><?= $nama_program['nama_program'] ?></b></b></p>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                </ol>
            </div> -->
        </div>
        <div class="row">
            <?php
            $number = 1;
            foreach ($infoMhs as $Mhs) : ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mahasiswa Ke-<?= $number ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;">NIM</th>
                                            <td><?= $Mhs['nim'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $Mhs['nama_mahasiswa'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td><?= $Mhs['tanggal_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>No. HP</th>
                                            <td><?= $Mhs['no_hp'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Prodi</th>
                                            <td><?= $Mhs['nama_prodi'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Semester</th>
                                            <td><?= $Mhs['semester_sekarang'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kontrak SKS</th>
                                            <td><?= $Mhs['jatah_sks_sekarang'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $number++;
            endforeach; ?>

        </div>
    </div>
    <script src="../../../assets/vendor/global/global.min.js"></script>
    <script src="../../../assets/js/quixnav-init.js"></script>
    <script src="../../../assets/js/custom.min.js"></script>
    <script src="../../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/js/plugins-init/datatables.init.js"></script>
</div>

<?php
include('../../../view/footer.php');
?>