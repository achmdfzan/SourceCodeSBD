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
}

$enters = tampil("SELECT * FROM 
                    matkul_peserta_konversi 
                    JOIN matkul ON matkul.id_matkul = matkul_peserta_konversi.id_matkul 
                    LEFT JOIN dosen ON dosen.id_dosen = matkul.id_dosen
                    WHERE id_peserta = (SELECT id_peserta FROM peserta_mbkm WHERE id_akun = $id_akun);");

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
                        <h4 class="card-title">Konveri Mata Kuliah Anda</h4>
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
                                                    echo 'Belum Dikonfirmasi';
                                                } else {
                                                }
                                                ?></td>
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
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Konveri Mata Kuliah Anda</div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode MK</th>
                                    <th>Nama MK</th>
                                    <th>Beban SKS</th>
                                    <th>Semester</th>
                                    <th>Dosen</th>
                                    <th>Status</th>
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
                                                echo 'Belum Dikonfirmasi';
                                            } else {
                                            }
                                            ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <input type="button" id="konversi" nama="konversi" onclick="ajukan()" class="btn btn-primary"></input>
                            <!-- <a href="tambah.php"><button type="button" id="konversi" class="btn btn-primary">Ajukan</button></a> -->
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