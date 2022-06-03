<?php
session_start();
$id_akun = $_SESSION["id"];

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

if (isset($_POST["konversi"])) {

    tambah($_POST);
    header("Location: ./tambah-sukses.php");
}

$jumlahSKS = tampil("SELECT SUM(beban_sks) as jmlh_sks FROM
                    matkul_peserta_konversi 
                    JOIN matkul ON matkul.id_matkul = matkul_peserta_konversi.id_matkul 
                    LEFT JOIN dosen ON dosen.id_dosen = matkul.id_dosen
                    WHERE id_peserta = (SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun);")[0]['jmlh_sks'];
$enters = tampil("SELECT * FROM 
                    matkul_peserta_konversi 
                    JOIN matkul ON matkul.id_matkul = matkul_peserta_konversi.id_matkul 
                    LEFT JOIN dosen ON dosen.id_dosen = matkul.id_dosen
                    WHERE id_peserta = (SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun);");

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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Konversi Mata Kuliah Anda</h4>
                    </div>
                    <div class=" card-header ">
                        <div class="alert alert-success card-title" style="width: 200px; height: 30px; text-align: center; padding: auto;">Jumlah SKS: <b><?= $jumlahSKS; ?></b></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode MK</th>
                                        <th>Nama MK</th>
                                        <th>Beban SKS</th>
                                        <th>Semester</th>
                                        <th>Dosen</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($enters as $enter) : ?>
                                        <tr>
                                            <td><?= $no; ?>.</td>
                                            <td><?= $enter["kd_matkul"] ?></td>
                                            <td><?= $enter["nama_matkul"] ?></td>
                                            <td><?= $enter["beban_sks"] ?></td>
                                            <td><?= $enter["semester"] ?></td>
                                            <td><?= $enter["nama_dosen"] ?></td>
                                            <td><?php if ($enter["konfirmasi_dosen"] == 0) {
                                                    echo '<div style="text-align: center;" class="alert alert-danger">Belum dikonfirmasi</div>';
                                                } else {
                                                    echo '<div style="text-align: center;" class="alert alert-success">Sudah dikonfirmasi</div>';
                                                } ?></td>
                                            <td><a href="hapus.php?id_matkul=<?= $enter["id_matkul"]; ?>&id_peserta=<?= $enter["id_peserta"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode MK</th>
                                        <th>Nama MK</th>
                                        <th>Beban SKS</th>
                                        <th>Semester</th>
                                        <th>Dosen</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/vendor/global/global.min.js"></script>
    <script src="../../../assets/js/quixnav-init.js"></script>
    <script src="../../../assets/js/custom.min.js"></script>
    <script src="../../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/js/plugins-init/datatables.init.js"></script>
</div>

<!-- <?php
        if (isset($_POST['konversi'])) {
            if (!empty($_POST['pilihMatkul'])) {
                foreach ($_POST['pilihMatkul'] as $checked) {
                    echo $checked . "</br>";
                }
            }
        }
        ?> -->


<?php
include('../../../view/footer.php');
?>