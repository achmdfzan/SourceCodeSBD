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

    $id_mahasiswa = $data["id_mahasiswa"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $tanggal_lahir = date('Y-m-d', strtotime($data["tanggal_lahir"]));
    $no_hp = htmlspecialchars($data["no_hp"]);
    $semester_sekarang = htmlspecialchars($data["semester"]);
    $sks_kontrak = htmlspecialchars($data["sks_kontrak"]);


    mysqli_query($conn, "UPDATE mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', tanggal_lahir = '$tanggal_lahir', no_hp = '$no_hp', semester_sekarang = $semester_sekarang, jatah_sks_sekarang = $sks_kontrak WHERE id_mahasiswa = $id_mahasiswa");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM peserta_program_mbkm WHERE id_peserta_mbkm = $id");

    return mysqli_affected_rows($conn);
}
