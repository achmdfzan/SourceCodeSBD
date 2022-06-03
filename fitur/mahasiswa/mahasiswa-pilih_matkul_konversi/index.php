<?php
session_start();
$id_akun = $_SESSION["id"];

require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../../login");
    exit;
}

$id_akun = $_SESSION["id"];

$jatahSKS = tampil("SELECT total_sks_mbkm_sekarang FROM peserta_mbkm WHERE id_akun = $id_akun")[0]['total_sks_mbkm_sekarang'];

$enters = tampil("SELECT * FROM 
                    matkul 
                    LEFT JOIN dosen ON dosen.id_dosen = matkul.id_dosen 
                    WHERE semester>(SELECT semester_sekarang FROM mahasiswa WHERE id_mahasiswa = (SELECT id_mahasiswa FROM peserta_mbkm WHERE id_akun = $id_akun))
                    AND id_matkul NOT IN(SELECT id_matkul FROM matkul_peserta_konversi);");

include('../../../view/header.php');
?>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<!-- Page Content -->
<div id="page-content-wrapper">
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../../../assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pilihan Matkul</h4>
                    </div>

                    <div class=" card-header">
                        <a href="matkul.php" id="konversi" name="konversi" class="btn btn-primary">Matkul Konversi Anda</a>
                    </div>


                    <div class=" card-header ">
                        <div class="alert alert-success card-title" style="width: 200px; height: 30px; text-align: center; padding: auto;">Jatah Konversi SKS: <b><?= $jatahSKS ?></b></div>
                        <div class="alert alert-warning card-title" style="width: 200px; height: 30px; text-align: center; padding: auto;">Jumlah SKS Terpilih: <b id="display">0</b></div>
                    </div>
                    <div class="card-body">
                        <form action="matkul.php" method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table header-border table-responsive-sm" id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode MK</th>
                                            <th>Nama MK</th>
                                            <th>Beban SKS</th>
                                            <th>Semester</th>
                                            <!-- <th>Dosen</th> -->
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($enters as $enter) : ?>
                                            <tr>
                                                <td><?= $no; ?>.</td>
                                                <td><?= $enter["kd_matkul"] ?></td>
                                                <td><?= $enter["nama_matkul"] ?></td>
                                                <td id="beban_sks" class="beban_sks"><?= $enter["beban_sks"] ?></td>
                                                <td><?= $enter["semester"] ?></td>
                                                <!-- <td><?= $enter["nama_dosen"] ?></td> -->
                                                <td><input type="checkbox" name="pilihMatkul[]" class="" id="<?= $enter["id_matkul"]; ?>" value="<?= $enter["id_matkul"]; ?>"></td>
                                                <!-- <td><a href="hapus.php?id=<?= $enter["id_matkul"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a></td> -->
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode MK</th>
                                            <th>Nama MK</th>
                                            <th>Beban SKS</th>
                                            <th>Semester</th>
                                            <!-- <th>Dosen</th> -->
                                            <th>Pilih</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right">
                                    <input type="submit" id="konversi" name="konversi" class="btn btn-primary" value="Tambahkan Pilihan Matkul"></input>

                                    <!-- <a href="tambah.php"><button type="button" id="konversi" class="btn btn-primary">Ajukan</button></a> -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>

<script>
    $('input:checkbox').change(function() {
        var total = 0;
        $('input:checkbox:checked').each(function() { // iterate through each checked element.
            total += isNaN(parseInt($(this).closest('tr').find('#beban_sks').text())) ? 0 : parseInt($(this).closest('tr').find('#beban_sks').text());
        });
        $("#total").val(total);
        console.log(total);
        document.getElementById('display').innerHTML = total
    });
</script>

<script>
    // (function() {
    //     alert("tes");
    //     $('form > input#cek').keyup(function() {
    //         var empty = false;
    //         $('form > input').each(function() {
    //             if ($(this).val() == '') {
    //                 empty = true;
    //             }
    //         });
    //         $("input:checkbox[name='pilihMatkul']:checked").each(function(){    
    //             empty = true;    		
    //   		});

    //         if (empty) {
    //             $('#konversi').attr('disabled', 'disabled');

    //         } else {
    //             $('#konversi').removeAttr('disabled');
    //         }
    //     });
    // })()
</script>

<script>
    // function ajukan() {
    // var matkulPilihan = [];
    // $("input:checkbox[name='pilihMatkul']:checked").each(function(){    
    //     matkulPilihan.push($(this).val());    		
    // });
    // alert("Matkul yang Dipilih: " + matkulPilihan.join(", "));;
    // alert("tes");
    // }
</script>

<?php
include('../../../view/footer.php');
?>