-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 02:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) NOT NULL,
  `shift` enum('pagi','malam','bebas') NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `shift`, `jam_masuk`, `jam_keluar`) VALUES
(1, 'pagi', '07:05:00', '15:26:00'),
(2, 'malam', '16:00:00', '21:30:00'),
(3, 'bebas', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id` int(11) NOT NULL,
  `jadwal_id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_datang` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `kode_karyawan` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id`, `jadwal_id`, `tanggal`, `jam_datang`, `jam_pulang`, `kode_karyawan`, `status`) VALUES
(1, 3, '2020-11-08', '18:32:38', NULL, '1006', 'Sakit'),
(2, 3, '2020-11-09', NULL, NULL, '1006', ''),
(3, 1, '2020-11-08', '18:39:39', '18:42:46', '1001', 'Dinas'),
(4, 1, '2020-11-09', NULL, NULL, '1001', 'Dinas'),
(5, 1, '2020-11-10', NULL, NULL, '1001', 'Dinas'),
(6, 1, '2020-11-11', '21:46:30', '21:46:33', '1001', 'Terlambat'),
(7, 1, '2020-11-08', '18:49:55', '18:49:55', '1002', 'Sakit'),
(8, 1, '2020-11-09', '18:49:55', '18:49:55', '1002', 'Sakit'),
(9, 1, '2020-11-10', '18:49:55', '18:49:55', '1002', 'Sakit'),
(10, 1, '2020-11-11', '18:49:55', '18:49:55', '1002', 'Sakit'),
(11, 1, '2020-11-12', NULL, NULL, '1002', ''),
(12, 1, '2020-11-13', NULL, NULL, '1002', ''),
(13, 1, '2020-11-14', NULL, NULL, '1002', ''),
(14, 1, '2020-11-15', NULL, NULL, '1002', ''),
(15, 1, '2020-11-08', '21:13:15', '21:13:15', '1007', 'Sakit'),
(16, 1, '2020-11-09', '21:13:15', '21:13:15', '1007', 'Sakit'),
(17, 1, '2020-11-10', NULL, NULL, '1007', ''),
(18, 2, '2020-11-11', NULL, NULL, '1007', ''),
(19, 3, '2020-11-12', NULL, NULL, '1007', ''),
(20, 1, '2020-11-13', '21:13:17', '21:13:17', '1007', 'Cuti'),
(21, 1, '2020-11-14', '21:13:17', '21:13:17', '1007', 'Cuti'),
(22, 1, '2020-11-15', NULL, NULL, '1007', ''),
(23, 1, '2020-11-11', '21:53:49', NULL, '1008', 'Terlambat'),
(24, 1, '2020-11-12', NULL, NULL, '1008', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `kode_karyawan` int(30) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `agama_karyawan` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `tlp_karyawan` varchar(15) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `kode_karyawan`, `nama_karyawan`, `jenis_kelamin`, `jabatan`, `agama_karyawan`, `tanggal_lahir`, `tlp_karyawan`, `alamat_karyawan`, `foto`) VALUES
(1, 1001, 'akmal gans', 'cowo', 'karyawan', 'islam', '2003-06-18', '2', 'jl.kelengkeng 1 blok e7no0', '398-a.png'),
(6, 1002, 'aminah', 'cewe', 'manager', 'islam', '2003-08-03', '0822121512', 'deket', '116-490-IMG_20191028_031628.jpg'),
(7, 1003, 'asep', 'cowo', 'hrd', 'islam', '2020-09-23', '234243', 'mensen', 'pp (1).jpg'),
(8, 1004, 'nikko', 'cowo', 'hrd', 'islam', '2020-10-08', '123232', 'pondok petir', 'pp.jpg'),
(9, 1005, 'baba', 'cowo', 'boss', 'islam', '2020-10-09', '023023', 'jauh', 'pp (2).jpg'),
(10, 1006, 'idris', 'cowo', 'bos', 'islam', '2003-03-12', '2323', '12313', '856273-full-size-baymax-wallpapers-1920x1080-for-windows-10.jpg'),
(11, 1007, 'bahtiar', 'perempuan', 'karyawan', 'katolik', '2003-08-03', '23131', 'jauh', '1.jpg'),
(12, 1008, 'daffa', 'laki-laki', 'hrd', 'islam', '2020-11-11', '21', 'sa', 'imageedit_2_2494892831.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kode_karyawan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `level`, `nama`, `kode_karyawan`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 101),
(7, '1001', '1001', 'user', 'akmal', 1001),
(8, '1002', '1002', 'user', 'aminah', 1002),
(9, '1003', '1003', 'user', 'asep', 1003),
(10, '1004', '1004', 'user', 'nikko', 1004),
(11, '1005', '1005', 'user', 'baba', 1005),
(12, '1006', '1006', 'user', 'idris', 1006),
(13, '1007', '1007', 'user', 'bahtiar', 1007),
(14, '1008', '1008', 'user', 'daffa', 1008);

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE `tb_permission` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(50) NOT NULL,
  `izin` varchar(100) NOT NULL,
  `dari` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_iz` enum('konfirmasi','menunggu','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permission`
--

INSERT INTO `tb_permission` (`id`, `kode_karyawan`, `izin`, `dari`, `sampai`, `keterangan`, `status_iz`) VALUES
(1, '1005', 'Cuti', '2020-11-06', '2020-11-10', 'test', 'konfirmasi'),
(3, '1006', 'Sakit', '2020-11-06', '2020-11-07', 'asma', 'konfirmasi'),
(4, '1006', 'Sakit', '2020-11-08', '2020-11-08', 'asma', 'konfirmasi'),
(5, '1001', 'Dinas', '2020-11-08', '2020-11-10', 'ke kota\r\n', 'konfirmasi'),
(6, '1002', 'Sakit', '2020-11-08', '2020-11-11', 'test\r\n', 'konfirmasi'),
(7, '1007', 'Sakit', '2020-11-08', '2020-11-09', 'bengek', 'konfirmasi'),
(8, '1007', 'Cuti', '2020-11-13', '2020-11-14', 'liburan\r\n', 'konfirmasi'),
(9, '1001', 'Cuti', '2020-11-11', '2020-11-11', 'asas', 'tolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `kode_karyawan` (`kode_karyawan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_permission`
--
ALTER TABLE `tb_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_permission`
--
ALTER TABLE `tb_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
