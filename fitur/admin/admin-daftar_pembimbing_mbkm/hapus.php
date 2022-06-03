<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id_dosen = $_GET["id_dosen"];
    
    if(hapus($id_dosen) > 0) {
        header("Location: hapus-sukses.php");
    }
    else {
        header("Location: hapus-gagal.php");
    }
