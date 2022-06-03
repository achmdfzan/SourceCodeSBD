<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$id_akun = $_SESSION["id"];
$enters = tampil("SELECT * FROM 
                    mahasiswa 
                    JOIN peserta_mbkm ON mahasiswa.id_mahasiswa=peserta_mbkm.id_mahasiswa 
                    JOIN peserta_program_mbkm ON peserta_mbkm.id_peserta_mbkm=peserta_program_mbkm.id_peserta_mbkm 
                    JOIN program_mbkm ON peserta_program_mbkm.id_program_mbkm=program_mbkm.id_program_mbkm 
                    JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program 
                    LEFT JOIN dosen ON peserta_program_mbkm.id_pembimbing_mbkm=dosen.id_dosen 
                    WHERE mahasiswa.id_mahasiswa = 
                        (SELECT mahasiswa.id_mahasiswa FROM 
                        mahasiswa 
                        JOIN peserta_mbkm ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa 
                        WHERE id_akun = '$id_akun');");

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
                        <h4 class="card-title">Program yang Anda Ikuti</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm" id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Semester</th>
                                        <th>Nama Program</th>
                                        <th>Kategori Program</th>
                                        <th>Status Pengajuan</th>
                                        <th>Berkas Persyaratan</th>
                                        <th>Kelolosan</th>
                                        <th>Bukti Lolos</th>
                                        <th>SKS Konversi</th>
                                        <th>Dosen Pembimbing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($enters as $enter) : ?>
                                        <tr>
                                            <td><?= $no; ?>.</td>
                                            <td><?= $enter["semester_saat_mbkm"]; ?></td>
                                            <td><?= $enter["nama_program"]; ?></td>
                                            <td><?= $enter["nama_kategori"]; ?></td>
                                            <td><?php if ($enter["status_pengajuan"] == 0) {
                                                    echo '<div style="text-align: center;" class="alert alert-danger">Belum diterima</div>';
                                                } else {
                                                    echo '<div style="text-align: center;" class="alert alert-success">Sudah diterima</div>';
                                                } ?></td>
                                            <!-- aneh tomoblnya -->
                                            <td><a href="./download.php?berkas_persyaratan=<?= $enter["berkas_persyaratan"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Lihat Berkas"></span><span> lihat berkas</span></td>
                                            <td><?php if ($enter["kelolosan"] == 0) {
                                                    echo '<div style="text-align: center;" class="alert alert-danger">Belum Lolos</div>';
                                                } else {
                                                    echo '<div style="text-align: center;" class="alert alert-primary">Sudah Lolos</div>';
                                                } ?></td>
                                            <td><a href="./lolos.php?id=<?= $enter["id"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Bukti Kelolosan"></span><span> upload</span> | <a href="<?= $enter["bukti_lolos"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Bukti Kelolosan"></span><span> lihat berkas</span></td>
                                            <td><?= $enter["sks_konversi"]; ?></td>
                                            <td><?= $enter["nama_dosen"]; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <div class="text-right">
                                <a href="tambah.php"><button type="button" class="btn btn-primary">Ajukan Program</button></a>
                            </div>
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