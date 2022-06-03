<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id_peserta = $_GET["id_peserta"];
    $id_matkul = $_GET["id_matkul"];
    
    if(hapus($id_peserta, $id_matkul) > 0) {
        header("Location: matkul.php");
    }
    else {
        header("Location: matkul.php");
    }    
?>