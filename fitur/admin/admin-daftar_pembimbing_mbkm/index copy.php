<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$enters = tampil("SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi JOIN peserta_mbkm ON mahasiswa.id_mahasiswa=peserta_mbkm.id_mahasiswa JOIN data_akun ON data_akun.id_akun=peserta_mbkm.id_akun JOIN dosen JOIN waldos ON waldos.id_dosen=dosen.id_dosen WHERE mahasiswa.id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_peserta_mbkm=(SELECT id_peserta FROM peserta_program_mbkm));");

include('../../../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Program MBKM</div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <!-- <th>Deskripsi Program</th> -->
                                    <th>Prodi</th>
                                    <th>Semester</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Dosen Pembimbing MBKM(masih dosen PA bang)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($enters as $enter) : ?>
                                    <tr>
                                        <td><?= $no; ?>.</td>
                                        <td><?= $enter["nim"]; ?></td>
                                        <td><?= $enter["nama_mahasiswa"] ?></td>
                                        <!-- <td><?= $enter["deskripsi_program"] ?></td> -->
                                        <td><?= $enter["nama_prodi"] ?></td>
                                        <td><?= $enter["semester_sekarang"] ?></td>
                                        <td><?= $enter["no_hp"] ?></td>
                                        <td><?= $enter["email"] ?></td>
                                        <td><?= $enter["nama_dosen"] ?></td>


                                        <td><a href="ubah.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a> | <a href="detail-mahasiswa.php?id=<?= $enter["id_program"]; ?>"><span class="glyphicon glyphicon-info-sign" title="Detail Mahasiswa"></span><span> Detail Mahasiswa</span></a></td>
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