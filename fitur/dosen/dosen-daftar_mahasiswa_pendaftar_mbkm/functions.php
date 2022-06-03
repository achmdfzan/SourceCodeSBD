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

        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = $data["berat"];
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $total = $berat * $harga;


        mysqli_query($conn, "INSERT INTO transaksi(masuk, keluar, nama_konsumen, berat, kategori, status, harga_satuan, harga_total) VALUES (NOW(), NOW() + INTERVAL 3 DAY, '$nama', $berat, '$kategori', 'Belum diambil', $harga, $total)");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id_peserta = $data["id_peserta"];
        $id_matkul = $data["id_matkul"];
        $konfirm = $data["konfirm"];
        


        mysqli_query($conn, "UPDATE matkul_peserta_konversi SET konfirmasi_dosen = $konfirm WHERE id_peserta = $id_peserta AND id_matkul = $id_matkul");

        return mysqli_affected_rows($conn);
    }

    function ubah2($data) {
        global $conn;

        $id_peserta_mbkm = $data["id_peserta_mbkm"];
        $id_program_mbkm = $data["id_program_mbkm"];
        $konfirm1 = $data["konfirm1"];
        $konfirm2 = $data["konfirm2"];
        


        mysqli_query($conn, "UPDATE peserta_program_mbkm SET status_pengajuan = $konfirm1, kelolosan = $konfirm2 WHERE id_peserta_mbkm = $id_peserta_mbkm AND id_program_mbkm = $id_program_mbkm");

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>