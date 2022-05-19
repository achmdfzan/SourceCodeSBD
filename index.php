<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login");
}

$username = $_SESSION["user"];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Merdeka Belajar : Kampus Merdeka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
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
                        <li><a href="login/logout.php">Log Out <span class="glyphicon glyphicon-off"></span></a></li>
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
                <li>
                    <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                </li>
                <li>
                    <a href="laundry-masuk"><span class="glyphicon glyphicon-list-alt"></span> Data Mahasiswa</a>
                </li>
                <li>
                    <a href="laundry-keluar"><span class="glyphicon glyphicon-list-alt"></span> Data Dosen</a>
                </li>
                <li>
                    <a href="tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
                </li>
                <li>
                    <a href="admin-daftar_program_mbkm"><span class="glyphicon glyphicon-th"></span> Daftar Program MBKM</a>
                </li>
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
                                <h2>Program Kampus Merdeka</h2>
                                <p>
                                    Halo <b><?php echo $username; ?></b>, Selamat datang di Dashboard MBKM
                                    <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    ?>

</body>

</html>