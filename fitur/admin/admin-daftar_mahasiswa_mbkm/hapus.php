<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id_peserta_mbkm = $_GET["id_peserta_mbkm"];
    
    if(hapus($id_peserta_mbkm) > 0) {
        header("Location: hapus-sukses.php");
    }
    else {
        header("Location: hapus-gagal.php");
    }
