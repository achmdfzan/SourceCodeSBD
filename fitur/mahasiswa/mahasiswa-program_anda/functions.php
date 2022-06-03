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

    function tambah($data, $FileName) {
        global $conn;
        $id_akun = $_SESSION["id"];

        $kd_program = htmlspecialchars($data["kd_program"]);
        $nama_program = htmlspecialchars($data["nama_program"]);
        $deskripsi_program = htmlspecialchars($data["deskripsi_program"]);
        $id_kategori_program = $data["kategori"];
        // $semester_saat_mbkm = $data["semester_saat_mbkm"];
        $sks_konversi = $data["sks_konversi"];
        
        mysqli_query($conn, "INSERT INTO program_mbkm (kd_program, nama_program, deskripsi_program, sks_konversi, id_kategori_program)
                            VALUES ('$kd_program', '$nama_program', '$deskripsi_program', $sks_konversi, $id_kategori_program)");

        $id_program = mysqli_insert_id($conn);

        $id_peserta_mbkm = tampil("SELECT id_peserta_mbkm FROM peserta_mbkm WHERE id_akun = $id_akun")[0]['id_peserta_mbkm'];
        $semester_sekarang = tampil("SELECT semester_sekarang FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_akun = $id_akun)")[0]['semester_sekarang'];
        
        mysqli_query($conn, "INSERT INTO peserta_program_mbkm (id_peserta_mbkm, id_program_mbkm, berkas_persyaratan, semester_saat_mbkm, tahun_ajaran)
                            VALUES ($id_peserta_mbkm, $id_program, '$FileName', $semester_sekarang, YEAR(NOW()))");

        return mysqli_affected_rows($conn);
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

    function syarat($data) {
        global $conn;

        $id = $data["id"];
        $dokumen_persyaratan = htmlspecialchars($data["dokumen_persyaratan"]);

        mysqli_query($conn, "UPDATE peserta_program_mbkm SET dokumen_persyaratan = '$dokumen_persyaratan' WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function lolos($data) {
        global $conn;

        $id = $data["id"];
        $bukti_kelolosan = htmlspecialchars($data["bukti_kelolosan"]);

        mysqli_query($conn, "UPDATE peserta_program_mbkm SET bukti_lolos = '$bukti_kelolosan' WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
