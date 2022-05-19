<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];
$enter = tampil("SELECT * FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_peserta_mbkm = (SELECT id_peserta FROM peserta_program_mbkm WHERE id_program_mbkm = $id));")[0];

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        header("Location: ubah-sukses.php");
    } else {
        header("Location: ubah-gagal.php?id=$id");
    }
}

include('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Mahasiswa</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">NIM :</label>
                                <div class="col-sm-10" style="padding-left: 0;">
                                    <div class="" style="border: none; padding: 7px 0 0 0;"><?= $enter['nim'] ?></div>
                                    <!-- <input type="text" class="form-control" name="berat" placeholder="2" required> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama :</label>
                                <div class="col-sm-10" style="padding-left: 0;">
                                    <div class="" style="border: none; padding: 7px 0 0 0;"><?= $enter['nama_mahasiswa'] ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Alamat :</label>
                                <div class="col-sm-10" style="padding-left: 0;">
                                    <div class="" style="border: none; padding: 7px 0 0 0;"><?= $enter['alamat'] ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tanggal Lahir:</label>
                                <div class="col-sm-10" style="padding-left: 0;">
                                    <div class="" style="border: none; padding: 7px 0 0 0;"><?= $enter['tanggal_lahir'] ?></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="update" value="update" type="submit">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../view/footer.php');
?>