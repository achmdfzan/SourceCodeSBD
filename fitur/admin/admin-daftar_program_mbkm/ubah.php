<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id_program_mbkm = $_GET["id_program_mbkm"];
$infoProgram = tampil("SELECT * FROM program_mbkm WHERE id_program_mbkm = $id_program_mbkm")[0];

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        header("Location: ubah-sukses.php");
    } else {
        header("Location: ubah-gagal.php?id_program_mbkm=" . $id_program_mbkm);
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
                        <h4 class="card-title">Informasi Program MBKM</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form role="form" action="" method="post">
                                <div class="form-group row">

                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_program_mbkm" class="form-control" placeholder="id" value="<?= $infoProgram['id_program_mbkm'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Program</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kd_program" class="form-control" placeholder="Kode Program" value="<?= $infoProgram['kd_program'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Program</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_program" placeholder="Nama Program" value="<?= $infoProgram['nama_program'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Deskripsi Program</label>
                                    <div class="col-sm-10">
                                        <textarea id="deskripsi_program" cols="30" rows="10" class="form-control" name="deskripsi_program" placeholder="Deskripsi Program"><?= $infoProgram['deskripsi_program'] ?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">SKS Konversi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="sks_konversi" placeholder="SKS Konversi" value="<?= $infoProgram['sks_konversi'] ?>">
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