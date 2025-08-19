-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 09, 2025 at 09:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidkdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(38, 20, 40, 'Anak'),
(40, 20, 41, 'Anak'),
(41, 20, 39, 'Istri'),
(42, 20, 42, 'Anak'),
(45, 20, 43, 'Kepala Keluarga'),
(46, 21, 45, 'Istri'),
(47, 21, 46, 'Anak'),
(48, 21, 44, 'Kepala Keluarga'),
(49, 21, 47, 'Anak'),
(50, 21, 48, 'Anak'),
(51, 21, 49, 'Anak'),
(52, 20, 50, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`) VALUES
(2, '5316612002567890', 'fransiskus Mahu', 'LK', '2024-12-11', 37),
(3, '5317729941234567', 'femiana Hanul', 'PR', '2023-10-25', 36);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`, `nm_ayah`, `nm_ibu`) VALUES
(20, '5315021501130003', 'Ardianus Nani', 'Coal', '002', '003', 'Kuwus', 'Manggarai Barat', 'NTT', 'Ardianus Nani', 'Maria Lisa'),
(21, '5315010510090009', 'Petrus Ruben', 'Coal', '003', '002', 'Kuwus', 'Manggarai Barat', 'NTT', 'Petrus Ruben', 'Yuliana Puspa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tgl_lh`, `jekel`, `id_kk`) VALUES
(4, 'fathan', '2025-01-14', 'LK', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`) VALUES
(4, 37, '2024-12-04', 'Penyakit'),
(5, 42, '2025-01-09', 'Penyakit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  `nm_ayah_pdd` varchar(50) NOT NULL,
  `nm_ibu_pdd` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`, `nm_ayah_pdd`, `nm_ibu_pdd`, `created_by`, `updated_by`) VALUES
(34, '33123456789', 'Gregorius Agung Gesi', 'Coal', '2024-11-19', 'LK', 'Coal', '002', '001', 'islam', 'Belum', 'joki', '', 'cristiano ronaldo', 'Veronika', NULL, NULL),
(35, '5313312345678901', 'Longginius Jehabut', 'Coal', '1999-06-07', 'LK', 'Coal', '002', '003', 'Katolik', 'Belum', 'Petani', '', 'Lorensius Garut', 'Katarina', NULL, NULL),
(36, '5314412345678902', 'Lorensius Garut', 'Coal', '1973-06-22', 'LK', 'Coal', '002', '003', 'Katolik', 'Sudah', 'petani', '', 'Belasius', 'Elisabet', NULL, NULL),
(37, '5315512345678901', 'Katarina', 'Coal', '1975-05-21', 'PR', 'Coal', '002', '003', 'Katolik', 'Sudah', 'petani', 'Meninggal', 'Ande Ludung', 'Ana', NULL, NULL),
(38, '5315020107790194', 'Ardianus Nani', 'Coal', '1979-07-01', 'LK', 'Coal', '003', '002', 'Katolik', 'Sudah', 'Petani', '', 'Dameanus Damal', 'Martina Bunut', NULL, NULL),
(39, '53150204707790005', 'Maria Lisa', 'Raka', '1979-07-07', 'PR', 'Coal', '002', '003', 'Katolik', 'Sudah', 'Petani', '', 'Tomas Rimus', 'Maria Ijang', NULL, NULL),
(40, '5315022003020010', 'Sebastianus Handri Turino', 'Coal', '2002-03-20', 'LK', 'Coal', '002', '003', 'Katolik', 'Belum', 'Mahasiswa', 'Pindah', 'Ardi Nani', 'Maria Lisa', NULL, NULL),
(41, '5315022508070003', 'Marionius Ervino Da Kosta', 'Coal', '2007-08-25', 'LK', 'Coal', '002', '003', 'Katolik', 'Belum', 'Pelajar', '', 'Ardianus nani', 'Maria Lisa', NULL, NULL),
(42, '5315022508150001', 'Anjelus Alansa Damal', 'Ruteng', '2015-08-25', 'LK', 'Coal', '003', '002', 'Katolik', 'Belum', 'Pelajar', 'Meninggal', 'Ardi Nani', 'Maria Lisa', NULL, NULL),
(43, '5315022508150001', 'Ardianus Nani', 'Coal', '1979-07-01', 'LK', 'Coal', '003', '002', 'Katolik', 'Sudah', 'Petani', 'Ada', 'Dameanus Damal', 'Martina Bunut', NULL, NULL),
(44, '5315010401670005', 'Petrus Ruben', 'Coal', '1967-01-04', 'LK', 'Coal', '003', '002', 'Katolik', 'Sudah', 'Petani', 'Ada', 'Tombeng', 'Teresia', NULL, NULL),
(45, '5315014106680001', 'Yuliana Puspa', 'Mompol', '1968-06-01', 'PR', 'Coal', '003', '002', 'Katolik', 'Sudah', 'Petani', 'Ada', 'Gabriel', 'Maria', NULL, NULL),
(46, '5315014909880001', 'Severina mandira', 'Coal', '1988-09-09', 'PR', 'Coal', '002', '003', 'Katolik', 'Belum', 'Petani', 'Ada', 'Petrus Ruben', 'Yuliana Puspa', NULL, NULL),
(47, '5315016505930001', 'Mariana Krista', 'Coal', '1993-05-25', 'PR', 'Coal', '003', '002', 'Katolik', 'Belum', 'Petani', 'Ada', 'Petrus Ruben', 'Yuliana Puspa', NULL, NULL),
(48, '5315011402960001', 'Yulianus Dirman', 'Coal', '1996-02-14', 'LK', 'Coal', '003', '002', 'Katolik', 'Belum', 'Petani', 'Ada', 'Petrus Ruben', 'Yuliana Puspa', NULL, NULL),
(49, '5315012103050003', 'Servianus Velgioni', 'Coal', '2005-03-21', 'LK', 'Coal', '003', '002', 'Katolik', 'Belum', 'Pelajar', 'Ada', 'Petrus Ruben', 'Yuliana Puspa', NULL, NULL),
(50, '5315022003020010', 'Sebastianus Handri Turino', 'Coal', '2002-03-20', 'LK', 'Coal', '003', '002', 'Katolik', 'Belum', 'Pelajar', 'Ada', 'Ardi Nani', 'Maria Lisa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima_bantuan`
--

CREATE TABLE `tb_penerima_bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `jenis_bantuan` enum('PKH','BLT') NOT NULL,
  `tanggal_bantuan` date NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerima_bantuan`
--

INSERT INTO `tb_penerima_bantuan` (`id_bantuan`, `id_pdd`, `jenis_bantuan`, `tanggal_bantuan`, `keterangan`) VALUES
(3, 38, 'PKH', '2024-12-12', 'Penduduk Tidak mampu'),
(4, 36, 'BLT', '2025-01-09', 'Lansia'),
(5, 41, 'BLT', '2025-01-09', 'Lansia'),
(6, 39, 'PKH', '2025-01-11', 'Penduduk Tidak mampu'),
(7, 35, 'PKH', '2025-01-09', 'Penduduk Tidak mampu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'desacoal', '1234567', 'Administrator'),
(2, 'KadesCoal', 'KadesCoal', '12345', 'Kaur Pemerintah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`) VALUES
(3, 40, '2021-06-10', 'Kuliah Diluar Kota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `fk_pdd_created_by` (`created_by`),
  ADD KEY `fk_pdd_updated_by` (`updated_by`);

--
-- Indexes for table `tb_penerima_bantuan`
--
ALTER TABLE `tb_penerima_bantuan`
  ADD PRIMARY KEY (`id_bantuan`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_penerima_bantuan`
--
ALTER TABLE `tb_penerima_bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD CONSTRAINT `fk_pdd_created_by` FOREIGN KEY (`created_by`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_pdd_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_penerima_bantuan`
--
ALTER TABLE `tb_penerima_bantuan`
  ADD CONSTRAINT `tb_penerima_bantuan_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
