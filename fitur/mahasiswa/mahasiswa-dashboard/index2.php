<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$id_akun = $_SESSION["id"];
// $enters = tampil("SELECT * FROM mahasiswa JOIN peserta_mbkm ON mahasiswa.id_mahasiswa=peserta_mbkm.id_mahasiswa JOIN peserta_program_mbkm ON peserta_mbkm.id_peserta_mbkm=peserta_program_mbkm.id_peserta JOIN program_mbkm ON peserta_program_mbkm.id_program_mbkm=program_mbkm.id_program JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori JOIN dosen ON peserta_program_mbkm.id_pembimbing_mbkm=dosen.id_dosen WHERE mahasiswa.id_mahasiswa = (SELECT mahasiswa.id_mahasiswa FROM mahasiswa JOIN peserta_mbkm ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_akun = '$id_akun');");

include('../../../view/header.php');
?>

<!-- Page Content -->

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">Program yang Anda Ikuti</div>
                    <div class="panel-body">

                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Semester</th>
                                    <th>Nama Program</th>
                                    <th>Kategori Program</th>
                                    <th>Status Pengajuan</th>
                                    <th>Berkas Persyaratan</th>
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
                                        <td><?= $enter["status_pengajuan"]; ?></td>
                                        <td><?= $enter["berkas_persyaratan"]; ?></td>
                                        <td><?= $enter["bukti_lolos"]; ?></td>
                                        <td><?= $enter["sks_konversi"]; ?></td>
                                        <td><?= $enter["nama_dosen"]; ?></td>
                                        <!-- <td><a href="ubah.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a> | <a href="detail-mahasiswa.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Detail Mahasiswa"></span><span> Detail Mahasiswa</span></a></td> -->
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <div class="text-center">
                            <a href="tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../../../view/footer.php');
?>