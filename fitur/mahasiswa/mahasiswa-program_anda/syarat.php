<?php 
    // session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id = $_GET["id"];
    $enter = tampil("SELECT * FROM peserta_program_mbkm WHERE id= $id")[0];

    if(isset($_POST['update'])){
        if(syarat($_POST) > 0) {
            header("Location: ubah-sukses.php");
        }
        else {
            header("Location: ubah-gagal.php?id=$id");
        }
    }    

    include ('../../../view/header.php');    
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Dokumen Persyaratan</div>
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Link Drive Dokumen Persyaratan</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $enter["id"]; ?>">
                                    <input type="text" class="form-control" name="dokumen_persyaratan" placeholder="" value="" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2">Berat (kg) :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="berat" placeholder="2" value="<?= $enter["berat"]; ?>" required>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2">Berkas Persyaratan :</label>
                                <div class="col-sm-10">
                                    <div class="form-control">
                                        <input type="file" class="form-control" id="customFile" name="persyaratan">
                                    </div>
                                </div>
                            </div> -->
                            <div class="text-center">
                                <button class="btn btn-primary" name="update" value="update" type="submit">Ajukan</button>
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