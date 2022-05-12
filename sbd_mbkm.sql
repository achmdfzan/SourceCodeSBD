-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbd_mbkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id_akun`, `email`, `password`, `id_role`) VALUES
(2, 'bintang@gmail.com', 'passbintang', 3),
(3, 'yasin@gmail.com', '$2y$10$8h6GulZRemi6fMLhRsppUOaGcDEiXEyHeZccMQMC4ZYMSPIrimUs.', 3),
(4, 'laela@gmail.com', 'passlaela', 3),
(5, 'yasmin@gmail.com', 'passyasmin', 3),
(6, 'ani@gmail.com', 'passani', 2),
(7, 'yudi@gmail.com', 'passyudi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(45) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `id_univ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `nama_dosen`, `alamat`, `no_hp`, `jabatan`, `id_univ`) VALUES
(1, '920200419941231201', 'Andini Setya Arianti, S.Ds., M.Ds.', '', '85722435496', 'Tenaga Pengajar', 1),
(2, '920200419930811201', 'Ani Anisyah, S.Pd., M.T.', '', '8998889285', 'Tenaga Pengajar', 1),
(3, '197112232006041001', 'Dr. Asep Wahyudin, M.T.', '', '8122097762', 'Lektor', 1),
(4, '197607102010121002', 'Budi Laksono Putro, M.T.', '', '81221007008', 'Lektor', 1),
(5, '197505152008011014', 'Eddy Prasetyo Nugroho, M.T.', '', '8562116367', 'Lektor', 1),
(6, '196402141990031003', 'Drs. H. Eka Fitrajaya Rahman, M.T.', '', '8122115391', 'Lektor Kepala', 1),
(7, '920171219850822101', 'Eki Nugraha, M.Kom.', '', '85624500083', 'Tenaga Pengajar', 1),
(8, '196711211991011001', 'Dr. H. Enjang Ali Nurdin, M.Kom.', '', '81321137302', 'Lektor Kepala', 1),
(9, '198512202012122002', 'Enjun Junaeti, M.Si.', '', '89505271636', 'Asisten Ahli', 1),
(10, '198607082018031001', 'Erlangga, MT', '', '81321397362', 'Tenaga Pengajar', 1),
(11, '920171219890224201', 'Erna Piantari, S.Kom., M.T.', '', '85222044331', 'Tenaga Pengajar', 1),
(12, '198008102009121003', 'Harsa Wara Prabawa, S.Si., M.Pd.', '', '81321005577', 'Lektor', 1),
(13, '197005022008121001', 'Herbert Siregar, M.T.', '', '81224268728', 'Asisten Ahli', 1),
(14, '195607141984031002', 'Drs. H. Heri Sutarno, M.T.', '', '81320713004', 'Lektor Kepala', 1),
(15, '197506012008121001', 'Jajang Kusnendar, M.T.', '', '8122304838', 'Lektor', 1),
(16, '197809262008121001', 'Lala Septem Riza, Ph.D.', '', '81234509109', 'Lektor', 1),
(17, '197909292006041002', 'Dr. Muhammad Nursalman, M.T.', '', '8981678872', 'Lektor', 1),
(18, '196603252001121001', 'Prof. Dr. Munir, M.IT.', '', '8157021112', 'Guru Besar', 1),
(19, '920200419891122201', 'Nusuki Syariati Fathimah, S.Pd., M.Pd.', '', '83869628414', 'Tenaga Pengajar', 1),
(20, '198705242014042002', 'Dr. Rani Megasari, M.T.', '', '8112412413', 'Asisten Ahli', 1),
(21, '197407252006041002', 'Rasim, M.T.', '', '81321089010', 'Lektor', 1),
(22, '197711252006041002', 'Rizky Rahman J., M.Kom.', '', '81578776511', 'Asisten Ahli', 1),
(23, '198109182009122003', 'Rosa Ariani Sukamto, M.T.', '', '81573102533', 'Lektor', 1),
(24, '197304242008121001', 'Dr. Wahyudin, M.T.', '', '85871599644', 'Lektor', 1),
(25, '196601011991031005', 'Prof. Dr. H. Wawan Setiawan, M.Kom.', '', '85222888713', 'Guru Besar', 1),
(26, '198903252015041001', 'Yaya Wihardi, M.Kom.', '', '85222690070', 'Asisten Ahli', 1),
(27, '199005302019031013', 'Yudi Ahmad Hambali, MT', '', '81809092229', 'Tenaga Pengajar', 1),
(28, '197507072003121003', 'Dr. Yudi Wibisono, M.T.', '', '8164206161', 'Lektor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(7) NOT NULL,
  `nama_mahasiswa` varchar(45) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `semester_sekarang` int(11) NOT NULL,
  `total_sks` int(11) NOT NULL,
  `id_waldos` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `alamat`, `tanggal_lahir`, `no_hp`, `semester_sekarang`, `total_sks`, `id_waldos`, `id_prodi`) VALUES
(1, '2100137', 'Muhamad Nur Yasin Amadudin', '', '2003-01-01', '', 6, 40, 1, 1),
(2, '2100187', 'Muhammad Hilmy Rasyad Sofyan', '', '2003-01-02', '', 2, 0, 1, 1),
(3, '2100192', 'Muhammad Rayhan Nur', '', '2003-01-03', '', 2, 0, 1, 1),
(4, '2100195', 'Davin Fausta Putra Sanjaya', '', '2003-01-04', '', 2, 0, 1, 1),
(5, '2100846', 'Rafly Putra Santoso', '', '2003-01-05', '', 2, 0, 2, 1),
(6, '2100901', 'Azzahra Siti Hadjar', '', '2003-01-06', '', 2, 0, 1, 1),
(7, '2100991', 'Khana Yusdiana', '', '2003-01-07', '', 2, 0, 2, 1),
(8, '2101103', 'Rifqi Fajar Indrayadi', '', '2003-01-08', '', 2, 0, 2, 1),
(9, '2101114', 'Anandita Kusumah Mulyadi', '', '2003-01-09', '', 2, 0, 2, 1),
(10, '2101147', 'Amida Zulfa Laila', '', '2003-01-10', '', 2, 0, 1, 1),
(11, '2102159', 'Virza Raihan Kurniawan', '', '2003-01-11', '', 2, 0, 1, 1),
(12, '2102204', 'Mohamad Asyqari Anugrah', '', '2003-01-12', '', 2, 0, 2, 1),
(13, '2102268', 'Audry Leonardo Loo', '', '2003-01-13', '', 2, 0, 2, 1),
(14, '2102292', 'Harold Vidian Exaudi Simarmata', '', '2003-01-14', '', 2, 0, 1, 1),
(15, '2102313', 'Muhammad Kamal Robbani', '', '2003-01-15', '', 2, 0, 2, 1),
(16, '2102421', 'Kania Dinda Fasya', '', '2003-01-16', '', 2, 0, 2, 1),
(17, '2102545', 'Zahra Fitria Maharani', '', '2003-01-17', '', 2, 0, 2, 1),
(18, '2102585', 'Apri Anggara Yudha', '', '2003-01-18', '', 2, 0, 2, 1),
(19, '2102665', 'Muhammad Cahyana Bintang Fajar', '', '2003-01-19', '', 2, 0, 2, 1),
(20, '2102671', 'Anderfa Jalu Kawani', '', '2003-01-20', '', 2, 0, 2, 1),
(21, '2102843', 'Najma Qalbi Dwiharani', '', '2003-01-21', '', 2, 0, 1, 1),
(22, '2103207', 'Yasmin Fathanah Zakiyyah', '', '2003-01-22', '', 2, 0, 1, 1),
(23, '2103507', 'Indah Resti Fauzi', '', '2003-01-23', '', 2, 0, 1, 1),
(24, '2103703', 'Fauziyyah Zayyan Nur', '', '2003-01-24', '', 2, 0, 1, 1),
(25, '2103727', 'Cantika Putri Arbiliansyah', '', '2003-01-25', '', 2, 0, 1, 1),
(26, '2105673', 'Alghaniyu Naufal Hamid', '', '2003-01-26', '', 2, 0, 1, 1),
(27, '2105745', 'Ridwan Albana', '', '2003-01-27', '', 2, 0, 1, 1),
(28, '2105879', 'Farhan Muzhaffar Tiras Putra', '', '2003-01-28', '', 2, 0, 1, 1),
(29, '2105885', 'Qurrotu\' Ainii', '', '2003-01-29', '', 2, 0, 1, 1),
(30, '2105927', 'Febry Syaman Hasan', '', '2003-01-30', '', 2, 0, 2, 1),
(31, '2105997', 'Muhammad Fakhri Fadhlurrahman', '', '2003-01-31', '', 2, 0, 2, 1),
(32, '2106000', 'Sabila Rosad', '', '2003-02-01', '', 2, 0, 2, 1),
(33, '2108061', 'Achmad Fauzan', '', '2003-02-02', '', 2, 0, 1, 1),
(34, '2108067', 'Villeneuve Andhira Suwandhi', '', '2003-02-03', '', 2, 0, 2, 1),
(35, '2108077', 'Hestina Dwi Hartiwi', '', '2003-02-04', '', 2, 0, 1, 1),
(36, '2108804', 'Laelatusya\'diyah', '', '2003-02-05', '', 2, 0, 1, 1),
(37, '2108927', 'Muhammad Fahru Rozi', '', '2003-02-06', '', 2, 0, 2, 1),
(38, '2108938', 'Rafi Arsalan Mi’raj', '', '2003-02-07', '', 2, 0, 1, 1);

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `tr_mhs_waldos_insert` BEFORE INSERT ON `mahasiswa` FOR EACH ROW BEGIN
UPDATE waldos SET
waldos.jumlah_mahasiswa = waldos.jumlah_mahasiswa + 1
WHERE id_waldos = NEW.id_waldos;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `kd_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(75) NOT NULL,
  `beban_sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kd_matkul`, `nama_matkul`, `beban_sks`, `semester`, `id_prodi`) VALUES
(1, '0', 'Pendidikan Agama Islam*', 2, 1, 1),
(2, '0', 'Pendidikan Kewarganegaraan', 2, 1, 1),
(3, '0', 'Pendidikan Bahasa Indonesia', 2, 1, 1),
(4, '0', 'Arsitektur dan Organisasi Komputer', 3, 1, 1),
(5, '0', 'Algoritma dan Pemrograman 1', 3, 1, 1),
(6, '0', 'Kalkulus', 3, 1, 1),
(7, '0', 'Logika Informatika', 3, 1, 1),
(8, '0', 'Teori Bahasa dan Automata', 3, 1, 1),
(9, '0', 'Pendidikan Pancasila', 2, 2, 1),
(10, '0', 'Pengantar Pendidikan', 2, 2, 1),
(11, '0', 'Sistem Kontrol', 3, 2, 1),
(12, '0', 'Rekayasa Perangkat Lunak', 3, 2, 1),
(13, '0', 'Design dan Pemrograman Web', 3, 2, 1),
(14, '0', 'Algoritma dan Pemrograman 2', 3, 2, 1),
(15, '0', 'Sistem Basis Data', 3, 2, 1),
(16, '0', 'Kriptografi', 2, 2, 1),
(17, '0', 'Kecerdasan Buatan', 3, 3, 1),
(18, '0', 'Data Mining and Warehouse', 3, 3, 1),
(19, '0', 'Jaringan Komputer', 3, 3, 1),
(20, '0', 'Sistem Informasi', 3, 3, 1),
(21, '0', 'Grafika Komputer dan Multimedia', 3, 3, 1),
(22, '0', 'Machine Learning', 3, 3, 1),
(23, '0', 'Struktur Data', 3, 3, 1),
(24, '0', 'Pemrograman Visual dan Piranti Bergerak', 3, 4, 1),
(25, '0', 'Desain dan Pemrograman Berorientasi Objek', 3, 4, 1),
(26, '0', 'Analisis dan Desain Algoritma', 3, 4, 1),
(27, '0', 'Metodologi Penelitian', 3, 4, 1),
(28, '0', 'Big Data Platforms', 2, 4, 1),
(29, '0', 'Proyek Konsultasi', 4, 4, 1),
(30, '0', 'Sistem Operasi', 3, 4, 1),
(31, '0', 'Seminar Pendidikan Agama Islam', 2, 5, 1),
(32, '0', 'Bahasa Inggris', 2, 5, 1),
(33, '0', 'Statistika', 2, 5, 1),
(34, '0', 'E-Business', 2, 5, 1),
(35, '0', 'Paradigma Pemrograman', 2, 5, 1),
(36, '0', 'MKKPS', 10, 5, 1),
(37, '0', 'MSTR (Matematika, Sains, Teknologi dan Rekayasa)', 3, 6, 1),
(38, '0', 'Kuliah Kerja Nyata (KKN)', 2, 6, 1),
(39, '0', 'Seminar', 2, 6, 1),
(40, '0', 'Aljabar Linier dan Matriks', 2, 6, 1),
(41, '0', 'Teknik Riset Operasi', 2, 6, 1),
(42, '0', 'Etika Profesi Teknologi Informasi dan Komunikasi', 2, 6, 1),
(43, '', 'MKKPS', 5, 6, 1),
(44, '0', 'Pendidikan Jasmani dan Olahraga*', 2, 7, 1),
(45, '0', 'Aplikasi MSTR (Matematika, Sains, Teknologi dan Rekayasa)', 3, 7, 1),
(46, '0', 'Metode Numerik', 2, 7, 1),
(47, '0', 'Kewirausahaan Ilmu Komputer', 2, 7, 1),
(48, '0', 'Kapita Selekta', 2, 7, 1),
(49, '', 'MKKPS', 3, 7, 1),
(50, '0', 'Skripsi', 6, 8, 1),
(51, '0', 'Ujian Sidang', 0, 8, 1),
(52, '0', 'Praktik Pengalaman Lapangan (PPL)', 4, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_mahasiswa`
--

CREATE TABLE `matkul_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matkul_peserta_konversi`
--

CREATE TABLE `matkul_peserta_konversi` (
  `id_peserta` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `semester_saat_mbkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matkul_peserta_pertukaran`
--

CREATE TABLE `matkul_peserta_pertukaran` (
  `id_peserta` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `semester_saat_pertukaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_mbkm`
--

CREATE TABLE `peserta_mbkm` (
  `id_peserta_mbkm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `total_sks_mbkm` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_mbkm`
--

INSERT INTO `peserta_mbkm` (`id_peserta_mbkm`, `id_mahasiswa`, `id_akun`, `total_sks_mbkm`) VALUES
(1, 19, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_program_mbkm`
--

CREATE TABLE `peserta_program_mbkm` (
  `id_peserta` int(11) NOT NULL,
  `id_program_mbkm` int(11) NOT NULL,
  `semester_saat_mbkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kd_prodi` varchar(8) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL,
  `id_univ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kd_prodi`, `nama_prodi`, `id_univ`) VALUES
(1, 'IK', 'Ilmu Komputer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_mbkm`
--

CREATE TABLE `program_mbkm` (
  `id_program` int(11) NOT NULL,
  `kd_program` varchar(10) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `kategori_program` varchar(35) NOT NULL,
  `deskripsi_program` varchar(535) NOT NULL,
  `sks_konversi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_mbkm`
--

INSERT INTO `program_mbkm` (`id_program`, `kd_program`, `nama_program`, `kategori_program`, `deskripsi_program`, `sks_konversi`) VALUES
(1, 'SIB-50', '21st-Century Digital Educator (Guru Digital Abad 21)', 'Magang', '21st-Century Digital Educator (Guru Digital Abad 21)\n\nBerikut alur program studi independen 21st-Century Digital Educator (Guru Digital Abad 21)....', 20);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Pembimbing Akademik'),
(3, 'Peserta MBKM');

-- --------------------------------------------------------

--
-- Table structure for table `sks_mahasiswa_per_semester`
--

CREATE TABLE `sks_mahasiswa_per_semester` (
  `id_mahasiswa` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_sks_per_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sks_mahasiswa_per_semester`
--

INSERT INTO `sks_mahasiswa_per_semester` (`id_mahasiswa`, `semester`, `total_sks_per_semester`) VALUES
(1, 4, 21),
(1, 6, 19);

--
-- Triggers `sks_mahasiswa_per_semester`
--
DELIMITER $$
CREATE TRIGGER `tr_sks_asal_insert` AFTER INSERT ON `sks_mahasiswa_per_semester` FOR EACH ROW BEGIN
UPDATE mahasiswa
SET mahasiswa.total_sks = mahasiswa.total_sks + NEW.total_sks_per_semester
WHERE id_mahasiswa = NEW.id_mahasiswa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_semester_insert` BEFORE INSERT ON `sks_mahasiswa_per_semester` FOR EACH ROW BEGIN
UPDATE mahasiswa
SET mahasiswa.semester_sekarang = NEW.semester 
WHERE NEW.semester > mahasiswa.semester_sekarang AND NEW.id_mahasiswa = id_mahasiswa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id_universitas` int(11) NOT NULL,
  `kd_universitas` varchar(10) NOT NULL,
  `nama_universitas` varchar(45) NOT NULL,
  `alamat_universitas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `kd_universitas`, `nama_universitas`, `alamat_universitas`) VALUES
(1, '', 'Universitas Pendidikan Indonesia', 'Jl. Dr. Setiabudi No.229, Isola, Kec. Sukasari, Kota Bandung, Jawa Barat 40154');

-- --------------------------------------------------------

--
-- Table structure for table `waldos`
--

CREATE TABLE `waldos` (
  `id_waldos` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jumlah_mahasiswa` int(11) NOT NULL DEFAULT 0,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waldos`
--

INSERT INTO `waldos` (`id_waldos`, `id_dosen`, `id_akun`, `jumlah_mahasiswa`, `id_prodi`) VALUES
(1, 2, 6, 21, 1),
(2, 28, 7, 17, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_univ` (`id_univ`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_pa` (`id_waldos`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `matkul_mahasiswa`
--
ALTER TABLE `matkul_mahasiswa`
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `matkul_peserta_konversi`
--
ALTER TABLE `matkul_peserta_konversi`
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `matkul_peserta_pertukaran`
--
ALTER TABLE `matkul_peserta_pertukaran`
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `peserta_mbkm`
--
ALTER TABLE `peserta_mbkm`
  ADD PRIMARY KEY (`id_peserta_mbkm`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `peserta_program_mbkm`
--
ALTER TABLE `peserta_program_mbkm`
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_program` (`id_program_mbkm`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_univ` (`id_univ`);

--
-- Indexes for table `program_mbkm`
--
ALTER TABLE `program_mbkm`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sks_mahasiswa_per_semester`
--
ALTER TABLE `sks_mahasiswa_per_semester`
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_universitas`);

--
-- Indexes for table `waldos`
--
ALTER TABLE `waldos`
  ADD PRIMARY KEY (`id_waldos`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `peserta_mbkm`
--
ALTER TABLE `peserta_mbkm`
  MODIFY `id_peserta_mbkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_mbkm`
--
ALTER TABLE `program_mbkm`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_universitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waldos`
--
ALTER TABLE `waldos`
  MODIFY `id_waldos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD CONSTRAINT `data_akun_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_waldos`) REFERENCES `waldos` (`id_waldos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul_mahasiswa`
--
ALTER TABLE `matkul_mahasiswa`
  ADD CONSTRAINT `matkul_mahasiswa_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_mahasiswa_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul_peserta_konversi`
--
ALTER TABLE `matkul_peserta_konversi`
  ADD CONSTRAINT `matkul_peserta_konversi_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_peserta_konversi_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta_mbkm` (`id_peserta_mbkm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul_peserta_pertukaran`
--
ALTER TABLE `matkul_peserta_pertukaran`
  ADD CONSTRAINT `matkul_peserta_pertukaran_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_peserta_pertukaran_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta_mbkm` (`id_peserta_mbkm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_mbkm`
--
ALTER TABLE `peserta_mbkm`
  ADD CONSTRAINT `peserta_mbkm_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_mbkm_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `data_akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_program_mbkm`
--
ALTER TABLE `peserta_program_mbkm`
  ADD CONSTRAINT `peserta_program_mbkm_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta_mbkm` (`id_peserta_mbkm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_program_mbkm_ibfk_2` FOREIGN KEY (`id_program_mbkm`) REFERENCES `program_mbkm` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sks_mahasiswa_per_semester`
--
ALTER TABLE `sks_mahasiswa_per_semester`
  ADD CONSTRAINT `sks_mahasiswa_per_semester_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
