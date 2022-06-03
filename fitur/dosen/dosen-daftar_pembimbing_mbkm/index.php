<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

// $id_kategori_program = $_GET["id_kategori_program"];
$kategori_program = tampil("SELECT nama_kategori FROM kategori_program WHERE id_kategori_program=2")[0];
$enters = tampil("SELECT id_dosen, nip_dosen, nama_dosen, alamat, no_hp, jabatan, COUNT(id_pembimbing_mbkm) AS jmlh_mhs
 FROM dosen LEFT JOIN (SELECT program_mbkm.id_program_mbkm, id_pembimbing_mbkm
FROM program_mbkm
    JOIN (
        SELECT  nim,
            nama_mahasiswa,
            semester_sekarang,
            semester_saat_mbkm,
            kelolosan,
            total_sks_mbkm,
            id_program_mbkm,
            id_pembimbing_mbkm,
            id_akun,
            peserta_mbkm.id_peserta_mbkm,
            mahasiswa.id_mahasiswa
        FROM peserta_program_mbkm
            JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm
            JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
    ) as X ON program_mbkm.id_program_mbkm = X.id_program_mbkm
    JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program) AS Y ON dosen.id_dosen = Y.id_pembimbing_mbkm GROUP BY nip_dosen;");
// $enter = tampil("SELECT * FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_peserta_mbkm = (SELECT id_peserta FROM peserta_program_mbkm WHERE id_program_mbkm = $id));")[0];

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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pembimbing MBKM</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Dosen</th>
                                        <!-- <th>Deskripsi Program</th> -->
                                        <th>No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Jumlah Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($enters as $enter) : ?>
                                        <tr>
                                            <td><?= $enter["nip_dosen"]; ?></td>
                                            <td><?= $enter["nama_dosen"] ?></td>
                                            <td><?= $enter["no_hp"] ?></td>
                                            <td><?= $enter["jabatan"] ?></td>
                                            <td><?= $enter["jmlh_mhs"] ?></td>
                                            <td><a href="list-mahasiswa.php?id_dosen=<?= $enter["id_dosen"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Detail Mahasiswa"></span><span> Daftar Mahasiswa</span></a></td>
                                        </tr>
                                    <?php endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Dosen</th>
                                        <!-- <th>Deskripsi Program</th> -->
                                        <th>No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Jumlah Mahasiswa</th>
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

<?php
include('../../../view/footer.php');
?>