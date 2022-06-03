<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <?php
        // echo $_SESSION['role'];
        if ($_SESSION['role'] == 3) {
        ?>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard Mahasiswa</a>
            </li>

            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-daftar_peserta_mbkm"><span class="glyphicon glyphicon-th"></span> M- Daftar Lolos MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-program_anda"><span class="glyphicon glyphicon-th"></span> M- Daftar Program Anda</a>
            </li>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-pilih_matkul_konversi"><span class="glyphicon glyphicon-th"></span> M- Konversi Matkul</a>
            </li>
            <li>
                <a href="../../../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
            </li>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['role'] == 2) {
        ?>
            <!-- <li>
                <a href="../../../fitur/dosen/data_dosen"><span class="glyphicon glyphicon-list-alt"></span> D- Data Dosen</a>
            </li> -->
            <li>
                <a href="../../../fitur/dosen/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> D- Dashboard Admin</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Mahasiswa MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_mahasiswa_pendaftar_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pengajuan Surat</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_program_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pembimbing MBKM</a>
            </li>
            <li>
                <a href="../../../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
            </li>
        <?php
        }
        ?>

        <?php
        if ($_SESSION['role'] == 1) {
        ?>
            <li>
                <a href="../../../fitur/admin/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> A- Dashboard Admin</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Mahasiswa MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-kategori_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Kategori Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Pembimbing MBKM</a>
            </li>
            <li>
                <a href="../../../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
            </li>
        <?php
        }
        ?>

        <?php
        // echo $_SESSION['role'];
        if ($_SESSION['role'] == 4) {
        ?>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard Mahasiswa</a>
            </li>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-pilih_matkul_konversi"><span class="glyphicon glyphicon-th"></span> M- Konversi Matkul</a>
            </li>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-daftar_peserta_mbkm"><span class="glyphicon glyphicon-th"></span> M- Daftar Peserta MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/mahasiswa/mahasiswa-program_anda"><span class="glyphicon glyphicon-th"></span> M- Daftar Program Anda</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/data_dosen"><span class="glyphicon glyphicon-list-alt"></span> D- Data Dosen</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> D- Dashboard Dosen</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Mahasiswa MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_mahasiswa_pendaftar_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pengajuan Surat</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_program_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/dosen/dosen-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-list-alt"></span> D- Daftar Pembimbing MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> A- Dashboard Admin</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_mahasiswa_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Mahasiswa MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-kategori_program_mbkm"><span class="glyphicon glyphicon-th"></span> A- Kategori Program MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/admin/admin-daftar_pembimbing_mbkm"><span class="glyphicon glyphicon-th"></span> A- Daftar Pembimbing MBKM</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-dashboard1"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 1</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 2</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-data_table"><span class="glyphicon glyphicon-list-alt"></span> T- Data Table View</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-table_basic_view"><span class="glyphicon glyphicon-list-alt"></span> T- Table Basic View</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-form_element"><span class="glyphicon glyphicon-list-alt"></span> T- Form Element</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-form_wizard"><span class="glyphicon glyphicon-list-alt"></span> T- Form Wizard</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-button"><span class="glyphicon glyphicon-list-alt"></span> T- Button</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-modal"><span class="glyphicon glyphicon-list-alt"></span> T- Modal</a>
            </li>
            <li>
                <a href="../../../fitur/template/template-chart"><span class="glyphicon glyphicon-list-alt"></span> T- Chart</a>
            </li>
            <li>
                <a href="../../../tentang"><span class="glyphicon glyphicon-th"></span> Tentang Program MBKM</a>
            </li>
        <?php
        }
        ?>



        <!-- <li>
                    <a href="../../../fitur/template/template-dashboard1"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 1</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-dashboard2"><span class="glyphicon glyphicon-list-alt"></span> T- Dashboard 2</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-data_table"><span class="glyphicon glyphicon-list-alt"></span> T- Data Table View</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-table_basic_view"><span class="glyphicon glyphicon-list-alt"></span> T- Table Basic View</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-form_element"><span class="glyphicon glyphicon-list-alt"></span> T- Form Element</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-form_wizard"><span class="glyphicon glyphicon-list-alt"></span> T- Form Wizard</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-button"><span class="glyphicon glyphicon-list-alt"></span> T- Button</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-modal"><span class="glyphicon glyphicon-list-alt"></span> T- Modal</a>
                </li>
                <li>
                    <a href="../../../fitur/template/template-chart"><span class="glyphicon glyphicon-list-alt"></span> T- Chart</a>
                </li> -->





    </ul>
</div>