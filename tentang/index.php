<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login");
}

$username = $_SESSION["user"];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Merdeka Belajar : Kampus Merdeka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>

<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">Merdeka Belajar : Kampus Merdeka</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <b>
                            <?php echo $username; ?>
                        </b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../login/logout.php">Log Out <span class="glyphicon glyphicon-off"></span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <?php
                // echo $_SESSION['role'];
                if ($_SESSION['role'] == 3) {
                ?>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard Mahasiswa</a>
                    </li>

                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-daftar_peserta_mbkm"><span class="glyphicon glyphicon-th"></span> M- Daftar Lolos MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-program_anda"><span class="glyphicon glyphicon-th"></span> M- Daftar Program Anda</a>
                    </li>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-pilih_matkul_konversi"><span class="glyphicon glyphicon-th"></span> M- Konversi Matkul</a>
                    </li>
                    <li>
                        <a href="../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
                    </li>
                    
                <?php
                }
                ?>

                <?php
                if ($_SESSION['role'] == 2) {
                ?>
                    <!-- <li>
                        <a href="../fitur/dosen/data_dosen"><span class="glyphicon glyphicon-list-alt"></span> D- Data Dosen</a>
                    </li> -->
                    <li>
                        <a href="../fitur/dosen/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> D- Dashboard Admin</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Mahasiswa MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_program_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pembimbing MBKM</a>
                    </li>
                    <li>
                        <a href="../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
                    </li>
                <?php
                }
                ?>

                <?php
                if ($_SESSION['role'] == 1) {
                ?>
                    <li>
                        <a href="../fitur/admin/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> A- Dashboard Admin</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Mahasiswa MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-kategori_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Kategori Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Pembimbing MBKM</a>
                    </li>
                    <li>
                        <a href="../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
                    </li>
                <?php
                }
                ?>

                <?php
                // echo $_SESSION['role'];
                if ($_SESSION['role'] == 4) {
                ?>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-pilih_matkul_konversi"><span class="glyphicon glyphicon-th"></span> M- Konversi Matkul</a>
                    </li>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-daftar_peserta_mbkm"><span class="glyphicon glyphicon-th"></span> M- Daftar Peserta MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/mahasiswa/mahasiswa-program_anda"><span class="glyphicon glyphicon-th"></span> M- Daftar Program Anda</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/data_dosen"><span class="glyphicon glyphicon-list-alt"></span> D- Data Dosen</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> D- Dashboard Admin</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Mahasiswa MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_program_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/dosen/dosen-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pembimbing MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> A- Dashboard Admin</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Mahasiswa MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-kategori_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Kategori Program MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/admin/admin-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Pembimbing MBKM</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-dashboard1"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 1</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 2</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-data_table"><span class="glyphicon glyphicon-list-alt"></span> T- Data Table View</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-table_basic_view"><span class="glyphicon glyphicon-list-alt"></span> T- Table Basic View</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-form_element"><span class="glyphicon glyphicon-list-alt"></span> T- Form Element</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-form_wizard"><span class="glyphicon glyphicon-list-alt"></span> T- Form Wizard</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-button"><span class="glyphicon glyphicon-list-alt"></span> T- Button</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-modal"><span class="glyphicon glyphicon-list-alt"></span> T- Modal</a>
                    </li>
                    <li>
                        <a href="../fitur/template/template-chart"><span class="glyphicon glyphicon-list-alt"></span> T- Chart</a>
                    </li>
                    <li>
                        <a href="../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
                    </li>
                <?php
                }
                ?>



                <!-- <li>
                    <a href="../fitur/template/template-dashboard1"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 1</a>
                </li>
                <li>
                    <a href="../fitur/template/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 2</a>
                </li>
                <li>
                    <a href="../fitur/template/template-data_table"><span class="glyphicon glyphicon-list-alt"></span> T- Data Table View</a>
                </li>
                <li>
                    <a href="../fitur/template/template-table_basic_view"><span class="glyphicon glyphicon-list-alt"></span> T- Table Basic View</a>
                </li>
                <li>
                    <a href="../fitur/template/template-form_element"><span class="glyphicon glyphicon-list-alt"></span> T- Form Element</a>
                </li>
                <li>
                    <a href="../fitur/template/template-form_wizard"><span class="glyphicon glyphicon-list-alt"></span> T- Form Wizard</a>
                </li>
                <li>
                    <a href="../fitur/template/template-button"><span class="glyphicon glyphicon-list-alt"></span> T- Button</a>
                </li>
                <li>
                    <a href="../fitur/template/template-modal"><span class="glyphicon glyphicon-list-alt"></span> T- Modal</a>
                </li>
                <li>
                    <a href="../fitur/template/template-chart"><span class="glyphicon glyphicon-list-alt"></span> T- Chart</a>
                </li> -->





            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="homepage">
                            <div class="text-center">
                                <h2>Apa itu Kampus
                                    Merdeka?</h2>
                                <p>
                                    Kampus Merdeka merupakan bagian dari kebijakan Merdeka Belajar oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempaatan bagi mahasiswa/i untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai persiapan karier masa depan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>


</body>

</html>