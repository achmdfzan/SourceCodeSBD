<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login");
}

$username = $_SESSION["user"];

include('../view/header.php');
?>
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
<?php
include('../view/footer.php');
?>