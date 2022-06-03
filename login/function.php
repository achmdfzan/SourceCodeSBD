<?php

use LDAP\Result;

require 'functions.php';
require '../koneksi.php';

function registrasi($data){
    global $conn;

    $email = strtolower(stripslashes( $data['email']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $nim = $data['nim'];
    

    //cek username sudah ada atau blm
    $result= mysqli_query($conn, "SELECT email FROM akun WHERE email='$email'");
    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Email sudah terdaftar');
            </script>
        ";
        return false;
    }
    $result = mysqli_query($conn, "SELECT mahasiswa.id_mahasiswa FROM mahasiswa JOIN peserta_mbkm ON mahasiswa.id_mahasiswa = peserta_mbkm.id_mahasiswa WHERE nim=" . "'$nim'" );
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('NIM sudah terpaut dengan akun lain');
            </script>
        ";
        return false;
    }
    else
    {
        $result = tampil("SELECT nim FROM mahasiswa WHERE nim=" . "'$nim'")[0] ?? null;
        echo $result['nim'];
        if (($result['nim'] ?? null) != $nim) {
            echo "
            <script>
                alert('NIM tidak valid');
            </script>
        ";
            return false;
        }
    }
    if($password !== $password2){
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO akun VALUES('', '$email', '$password', '3')");   
    $temp = tampil("SELECT id_akun FROM akun WHERE email =". "'$email'")[0];
    $id_akun = $temp['id_akun'];
    $temp = tampil("SELECT id_mahasiswa FROM mahasiswa WHERE nim=" . "'$nim'")[0];
    $id_mahasiswa = $temp['id_mahasiswa'];
    mysqli_query($conn, "INSERT INTO peserta_mbkm VALUES('', '$id_mahasiswa', '$id_akun', 0)");   


    return mysqli_affected_rows($conn); 
}

function upload(){
    $namaFile = $_FILES['profile']['name'];
    $ukuranFile = $_FILES['profile']['size'];
    $errorFile = $_FILES['profile']['error'];
    $tempFile = $_FILES['profile']['tmp_name'];
    
    //cek apakah ada foto yg dikirim
    if($errorFile == 4){
        echo "
            <script>
                alert('WAJIB MEMASUKKAN FOTO');
            </script>
        ";
        return false;
    }

    // cek apakah yang dikirim user adalah gambar 
    $extensiData = ['jpg', 'png', 'jpeg', 'jfif', 'gif'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if(!in_array($ekstensiGambar, $extensiData)){
        echo "
            <script>
                alert('ANDA TIDAK MEMASUKKAN FOTO');
            </script>
        ";
        return false;
    }

    //cek ukuran file lebih besar dari batasan
    if($ukuranFile > 100000){
        echo "
            <script>
                alert('UKURAN FILE TERLALU BESAR!');
            </script>
        ";
        return false;
    }

    //lolos pengecekan
    //gegnerate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tempFile, 'img/'.$namaFileBaru);
    return $namaFileBaru;
}


    

?>