<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id_program_mbkm = $_GET["id_program_mbkm"];
    
    if(hapus($id_program_mbkm) > 0) {
        header("Location: hapus-sukses.php");
    }
    else {
        header("Location: hapus-gagal.php");
    }
