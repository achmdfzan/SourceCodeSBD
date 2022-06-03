<?php
require('../../../koneksi.php');

function tampil($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



function tambah($data)
{
    global $conn;



    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $jumlah_mahasiswa = $data["jumlah_mahasiswa"];


    mysqli_query($conn, "INSERT INTO kategori_program VALUES ('', '$nama_kategori', '$jumlah_mahasiswa', '')");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id_kategori_program = $data["id_kategori_program"];
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $jumlah_mahasiswa = $data["jumlah_mahasiswa"];


    mysqli_query($conn, "UPDATE kategori_program SET nama_kategori = '$nama_kategori', jumlah_mahasiswa = $jumlah_mahasiswa WHERE id_kategori_program = $id_kategori_program");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kategori_program WHERE id_kategori_program = $id");

    return mysqli_affected_rows($conn);
}
