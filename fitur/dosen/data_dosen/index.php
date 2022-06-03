<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../login");
        exit;
    }        

    $exits = tampil("SELECT * FROM dosen");

    include ('../../../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Dosen</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIP</th>
                                    <th>Nama</th>                                    
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($exits as $exit) : ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $exit["nip_dosen"] ?></td>
                                    <td><?= $exit["nama_dosen"] ?></td>
                                    <td><?= $exit["jabatan"] ?></td>
                                    <!-- <td><a href="hapus.php?id=<?= $exit["id_dosen"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td> -->
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <div class="text-center">
                            <a href="../../../laundry-keluar/tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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