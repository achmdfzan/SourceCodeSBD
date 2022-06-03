<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$enters = tampil("SELECT * FROM kategori_program");

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
                        <h4 class="card-title">Kategori Program MBKM</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-10 ">
                                    <a href="tambah.php" type="submit" name="tambah" value="tambah" class="btn btn-primary">Tambah Kategori</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Deskripsi Program</th> -->
                                        <th>Kategori Program</th>
                                        <th>Jumlah Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($enters as $enter) : ?>
                                        <tr>
                                            <td><?= $no; ?>.</td>
                                            <td><?= $enter["nama_kategori"]; ?></td>
                                            <td><?= $enter["jumlah_mahasiswa"] ?></td>
                                            <td><a href="ubah.php?id_kategori_program=<?= $enter["id_kategori_program"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id_kategori_program=<?= $enter["id_kategori_program"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a> | <a href="list-mahasiswa.php?id_kategori_program=<?= $enter["id_kategori_program"]; ?>"><span class="glyphicon glyphicon-info-sign" title="List Mahasiswa"></span><span> List Mahasiswa</span></a> | <a href="list-program.php?id_kategori_program=<?= $enter["id_kategori_program"]; ?>"><span class="glyphicon glyphicon-info-sign" title="List Program"></span><span> List Program</span></a></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include('../../../view/footer.php');
?>