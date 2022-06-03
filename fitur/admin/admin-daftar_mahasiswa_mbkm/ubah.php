<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id_peserta_mbkm = $_GET["id_peserta_mbkm"];
$infoMhs = tampil("SELECT * FROM mahasiswa WHERE id_mahasiswa=(SELECT id_mahasiswa FROM peserta_mbkm JOIN peserta_program_mbkm ON peserta_mbkm.id_peserta_mbkm = peserta_program_mbkm.id_peserta_mbkm WHERE peserta_program_mbkm.id_peserta_mbkm = $id_peserta_mbkm LIMIT 1)")[0];

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        header("Location: ubah-sukses.php");
    } else {
        header("Location: ubah-gagal.php?id_peserta_mbkm=" . $id_peserta_mbkm);
    }
}

include('../../../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">

    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../../../assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form role="form" action="" method="post">
                                <div class="form-group row">

                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_mahasiswa" class="form-control" placeholder="id" value="<?= $infoMhs['id_mahasiswa'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= $infoMhs['nim'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $infoMhs['nama_mahasiswa'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $infoMhs['tanggal_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_hp" placeholder="No. HP" value="<?= $infoMhs['no_hp'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="semester" placeholder="Semester" value="<?= $infoMhs['semester_sekarang'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kontrak SKS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="sks_kontrak" placeholder="Kontrak SKS" value="<?= $infoMhs['jatah_sks_sekarang'] ?>">
                                    </div>
                                </div>
                                <!-- <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2 pt-0">Radios</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked>
                                                <label class="form-check-label">
                                                    First radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                <label class="form-check-label">
                                                    Second radio
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled>
                                                <label class="form-check-label">
                                                    Third disabled radio
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-2">Checkbox</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                Example checkbox
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-sm-10 ">
                                        <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/vendor/global/global.min.js"></script>
    <script src="../../../assets/js/quixnav-init.js"></script>
    <script src="../../../assets/js/custom.min.js"></script>
</div>

<?php
include('../../../view/footer.php');
?>