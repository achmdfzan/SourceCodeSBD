<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$berkas_persyaratan = $_GET["berkas_persyaratan"];

$path = "../../../files/"; // nama direktori tempat menyimpan file yang diupload
$full_path = $path . $berkas_persyaratan;

if ($fd = fopen($full_path, "r")) {
    $fsize = filesize($full_path);
    $path_parts = pathinfo($full_path);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
            header("Content-type: application/pdf"); // gunakan 'attachment' yang menunjukan file harus diunduh
            header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
            break;
            // menambah header lain untuk jenis content type selain application/pdf
        default:
            header("Content-type: application/octet-stream");
            header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
            break;
    }

    header("Content-length: $fsize");
    while (!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose($fd);
exit;

?>
