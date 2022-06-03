<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id_peserta_mbkm = $_GET["id_peserta_mbkm"];

$infoMhs = tampil("SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi WHERE id_mahasiswa=(SELECT id_mahasiswa FROM peserta_mbkm JOIN peserta_program_mbkm ON peserta_mbkm.id_peserta_mbkm = peserta_program_mbkm.id_peserta_mbkm WHERE peserta_program_mbkm.id_peserta_mbkm = $id_peserta_mbkm LIMIT 1)")[0];
$infoMBKM = tampil("SELECT * FROM peserta_program_mbkm JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm JOIN program_mbkm ON peserta_program_mbkm.id_program_mbkm = program_mbkm.id_program_mbkm LEFT JOIN dosen ON peserta_program_mbkm.id_pembimbing_mbkm = dosen.id_dosen WHERE peserta_program_mbkm.id_peserta_mbkm = $id_peserta_mbkm;");

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
                    <p class="mb-0">Detail Mahasiswa <b><?= $infoMhs['nama_mahasiswa'] ?></b> - <b><?= $infoMhs['nim'] ?></b></p>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="50%" class="table table-striped table-responsive-sm">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">NIM</th>
                                        <td><?= $infoMhs['nim'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $infoMhs['nama_mahasiswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td><?= $infoMhs['tanggal_lahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. HP</th>
                                        <td><?= $infoMhs['no_hp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Prodi</th>
                                        <td><?= $infoMhs['nama_prodi'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td><?= $infoMhs['semester_sekarang'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kontrak SKS</th>
                                        <td><?= $infoMhs['jatah_sks_sekarang'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $number = 1;
            foreach ($infoMBKM as $MBKMMhs) : ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail MBKM Ke-<?= $number ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;">Nama Program</th>
                                            <td><?= $MBKMMhs['nama_program'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Program</th>
                                            <td><?= $MBKMMhs['kd_program'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Konversi SKS</th>
                                            <td><?= $MBKMMhs['sks_konversi'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Ajaran</th>
                                            <td><?= $MBKMMhs['tahun_ajaran'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Semester Saat MBKM</th>
                                            <td><?= $MBKMMhs['semester_saat_mbkm'] ?></td>
                                        </tr>

                                        <tr>
                                            <th>Status Pengajuan</th>
                                            <td><?php if ($MBKMMhs["status_pengajuan"] == 0) {
                                                    echo '<div style="text-align: center;" class="alert alert-danger">Belum dikonfirmasi</div>';
                                                } else {
                                                    echo '<div style="text-align: center;" class="alert alert-success">Sudah dikonfirmasi</div>';
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th>Berkas Pesyaratan</th>
                                            <td>
                                                <a href="./download.php?berkas_persyaratan=<?= $MBKMMhs["berkas_persyaratan"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Lihat Berkas"></span><span> lihat berkas</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Kelolosan</th>
                                            <td><?php if ($MBKMMhs["kelolosan"] == 0) {
                                                    echo '<div style="text-align: center;" class="alert alert-danger">Belum Lolos</div>';
                                                } else {
                                                    echo '<div style="text-align: center;" class="alert alert-primary">Sudah Lolos</div>';
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th>Berkas Bukti Kelolosan</th>
                                            <td><a href="<?= $MBKMMhs["bukti_lolos"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Bukti Kelolosan"></span><span> lihat berkas</span></td>
                                        </tr>
                                        <tr>
                                            <th>Dosen Pembimbing</th>
                                            <td><?= $MBKMMhs['nama_dosen'] ?></td>
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