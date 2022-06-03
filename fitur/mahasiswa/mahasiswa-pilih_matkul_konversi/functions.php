<?php
    require('../../../koneksi.php');

    function tampil($query) {
        global $conn;

        $result = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data) {
        global $conn;
        $id_akun = $_SESSION["id"];
        
        if(isset($data['pilihMatkul'])){
        foreach ($data['pilihMatkul'] as $matkul) :

            mysqli_query($conn, "INSERT INTO matkul_peserta_konversi (id_peserta, id_matkul, semester_saat_mbkm) VALUES ((SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun), $matkul, (SELECT semester_sekarang FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_akun = $id_akun)) )");
        endforeach;

        return mysqli_affected_rows($conn);
        }
        
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = $data["berat"];
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $total = $berat * $harga;


        mysqli_query($conn, "UPDATE transaksi SET nama_konsumen = '$nama', berat = $berat, kategori = '$kategori', harga_satuan = $harga, harga_total = $total WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function hapus($id_peserta, $id_matkul) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM matkul_peserta_konversi WHERE id_peserta = $id_peserta AND id_matkul = $id_matkul");

        return mysqli_affected_rows($conn);
    }
?>