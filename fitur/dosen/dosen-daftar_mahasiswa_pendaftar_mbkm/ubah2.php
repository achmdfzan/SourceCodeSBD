<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id_peserta_mbkm = $_GET["id_peserta_mbkm"];
$infoMhs = tampil("SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi WHERE 
id_mahasiswa=(SELECT id_mahasiswa FROM peserta_mbkm JOIN peserta_program_mbkm 
ON peserta_mbkm.id_peserta_mbkm = peserta_program_mbkm.id_peserta_mbkm
WHERE peserta_program_mbkm.id_peserta_mbkm = $id_peserta_mbkm LIMIT 1)")[0];

$infoMBKM = tampil("SELECT * FROM peserta_program_mbkm JOIN peserta_mbkm ON 
peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm 
JOIN program_mbkm ON peserta_program_mbkm.id_program_mbkm = program_mbkm.id_program_mbkm
LEFT JOIN dosen ON peserta_program_mbkm.id_pembimbing_mbkm = dosen.id_dosen WHERE peserta_program_mbkm.id_peserta_mbkm = $id_peserta_mbkm;");

// $enters = tampil("SELECT id_peserta_mbkm, X.id_program_mbkm, nim, nama_mahasiswa, semester_sekarang, COUNT(*) AS jmlh_mbkm,
// kelolosan,berkas_persyaratan,bukti_lolos,status_pengajuan
// FROM program_mbkm
//     JOIN (
//         SELECT  nim,
//             nama_mahasiswa,
//             semester_sekarang,
//             semester_saat_mbkm,
//             kelolosan,
//             total_sks_mbkm,
//             id_program_mbkm,
//             id_pembimbing_mbkm,
//             id_akun,
//             bukti_lolos,
//             status_pengajuan,

//             berkas_persyaratan,
//             peserta_mbkm.id_peserta_mbkm,
//             mahasiswa.id_mahasiswa
//         FROM peserta_program_mbkm
//             JOIN peserta_mbkm ON peserta_program_mbkm.id_peserta_mbkm = peserta_mbkm.id_peserta_mbkm
//             JOIN mahasiswa ON peserta_mbkm.id_mahasiswa = mahasiswa.id_mahasiswa
//     ) as X ON program_mbkm.id_program_mbkm = X.id_program_mbkm
//     JOIN kategori_program ON program_mbkm.id_kategori_program = kategori_program.id_kategori_program
// GROUP BY X.nim;");
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Data</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">

                                <label class="control-label col-sm-2">NIM Mahasiswa :</label>
                                <div class="col-sm-10 form control">
                                    <?= $infoMhs['nim'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Mahasiswa :</label>
                                <div class="col-sm-10">
                                    <td><?= $infoMhs['nama_mahasiswa'] ?></td>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Berkas Peryaratan : </label>
                                <div class="col-sm-10">
                                    <td><?= $infoMBKM['berkas_persyaratan'] ?></td>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Konfirmasi Persyaratan</label>
                                <div class="col-sm-10">
                                    <?= $infoMBKM['status_pengajuan'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Bukti Kelolosan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" value="<?= $enter["harga_satuan"]; ?>" placeholder="4000">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Konfirmasi Kelolosan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" value="<?= $enter["harga_satuan"]; ?>" placeholder="4000">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="update" value="update" type="submit">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../../../view/footer.php');
?>