<?php 
    session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../../../index.php");
        exit;
    }

    $id_kategori_program = $_GET["id_kategori_program"];
    
    if(hapus($id_kategori_program) > 0) {
        header("Location: hapus-sukses.php");
    }
    else {
        header("Location: hapus-gagal.php");
    }
