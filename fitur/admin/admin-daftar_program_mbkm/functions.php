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

    $nama = htmlspecialchars($data["nama_konsumen"]);
    $berat = $data["berat"];
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = $data["harga"];
    $total = $berat * $harga;


    mysqli_query($conn, "INSERT INTO transaksi(masuk, keluar, nama_konsumen, berat, kategori, status, harga_satuan, harga_total) VALUES (NOW(), NOW() + INTERVAL 3 DAY, '$nama', $berat, '$kategori', 'Belum diambil', $harga, $total)");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id_program_mbkm = $data["id_program_mbkm"];
    $kd_program = htmlspecialchars($data["kd_program"]);
    $nama_program = htmlspecialchars($data["nama_program"]);
    $deskripsi_program = htmlspecialchars($data["deskripsi_program"]);
    $sks_konversi = $data["sks_konversi"];


    mysqli_query($conn, "UPDATE program_mbkm SET kd_program = '$kd_program', nama_program = '$nama_program', deskripsi_program = '$deskripsi_program', sks_konversi = $sks_konversi WHERE id_program_mbkm = $id_program_mbkm");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM program_mbkm WHERE id_program_mbkm = $id");

    return mysqli_affected_rows($conn);
}
