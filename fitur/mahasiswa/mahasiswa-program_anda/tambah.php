<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$id_akun = $_SESSION["id"];

if (isset($_POST['tambah'])) {
    $target_dir = "../../../files/";
    $target_file = $target_dir . basename($_FILES["persyaratan"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    // if (isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["persyaratan"]["tmp_name"]);
    //     if ($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["persyaratan"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    // if (
    //     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //     && $imageFileType != "gif"
    // ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["persyaratan"]["tmp_name"], $target_file)) {
            $FileName = htmlspecialchars(basename($_FILES["persyaratan"]["name"]));
            echo "The file " . htmlspecialchars(basename($_FILES["persyaratan"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (tambah($_POST, $FileName) > 0) {
        header("Location: tambah-sukses.php");
    } else {
        header("Location: tambah-gagal.php");
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
                    <div class="panel-heading">Ajukan Program</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kode Program :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kd_program" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Program :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_program" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Deksripsi Program :</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="deskripsi_program" placeholder="" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kategori Program :</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-control" name="kategori">
                                        <option value="" selected>Pilih</option>
                                        <?php
                                        $enters = tampil("SELECT * FROM kategori_program;");
                                        foreach ($enters as $enter) :
                                            echo ' <option value="' . $enter["id_kategori_program"] . '">' . $enter["nama_kategori"] . '</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Jumlah SKS Konversi :</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-control" name="sks_konversi">
                                        <option value="" selected>Pilih</option>
                                        <?php
                                        $sks = 1;
                                        while ($sks <= 20) {
                                            echo ' <option value="' . $sks . '">' . $sks . '</option>';
                                            $sks++;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- ini juga knp jelek inputnya -->
                            <div class="form-group">
                                <label class="control-label col-sm-2">Berkas Persyaratan :</label>
                                <div class="col-sm-10">
                                    <div class="form-control">
                                        <input type="file" class="form-control" id="customFile" name="persyaratan">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="tambah" value="Tambah" type="submit">Tambah</button>
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