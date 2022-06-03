<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$enters = tampil("SELECT * FROM mahasiswa JOIN peserta_mbkm ON mahasiswa.id_mahasiswa=peserta_mbkm.id_mahasiswa JOIN peserta_program_mbkm ON peserta_mbkm.id_peserta_mbkm=peserta_program_mbkm.id_peserta_mbkm JOIN program_mbkm ON peserta_program_mbkm.id_program_mbkm=program_mbkm.id_program_mbkm JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program WHERE kelolosan = 1 ORDER BY tahun_ajaran DESC;");

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
                        <h4 class="card-title">Daftar Peserta yang Lolos MBKM</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Program</th>
                                        <!-- <th>Deskripsi Program</th> -->
                                        <th>Kategori Program</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($enters as $enter) : ?>
                                        <tr>
                                            <td><?= $no; ?>.</td>
                                            <td><?= $enter["nama_mahasiswa"]; ?></td>
                                            <td><?= $enter["nama_program"]; ?></td>
                                            <td><?= $enter["nama_kategori"]; ?></td>
                                            <td><?= $enter["semester_saat_mbkm"]; ?></td>
                                            <td><?= $enter["tahun_ajaran"]; ?></td>
                                            <!-- <td><a href="ubah.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a> | <a href="detail-mahasiswa.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Detail Mahasiswa"></span><span> Detail Mahasiswa</span></a></td> -->
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach;
                                    // $filter="";
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Program</th>
                                        <!-- <th>Deskripsi Program</th> -->
                                        <th>Kategori Program</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
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

<?php
include('../../../view/footer.php');
?>