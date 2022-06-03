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

function tambah($data)
{
    global $conn;



    $nip_dosen = htmlspecialchars($data["nip_dosen"]);
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);


    mysqli_query($conn, "INSERT INTO dosen VALUES ('', '$nip_dosen', '$nama_dosen', '', '$no_hp', '$jabatan', 1)");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id_dosen = $data["id_dosen"];
    $nip_dosen = htmlspecialchars($data["nip_dosen"]);
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);


    mysqli_query($conn, "UPDATE dosen SET nip_dosen = '$nip_dosen', nama_dosen = '$nama_dosen', no_hp = '$no_hp', jabatan = '$jabatan' WHERE id_dosen = $id_dosen");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen = $id");

    return mysqli_affected_rows($conn);
}
