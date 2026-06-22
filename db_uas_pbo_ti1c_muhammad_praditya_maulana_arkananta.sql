-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_muhammad praditya maulana arkananta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(10,2) NOT NULL,
  `jenis_karyawan` enum('kontrak','tetap','magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(10,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(10,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Rendi Wijaya', 'Operasional', 22, '150000.00', 'kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
(2, 'Siti Nurhaliza', 'Customer Service', 20, '140000.00', 'kontrak', 6, 'PT Global Talent', NULL, NULL, NULL, NULL),
(3, 'Arif Rahman', 'Logistik', 24, '160000.00', 'kontrak', 24, 'PT Indo Human Resource', NULL, NULL, NULL, NULL),
(4, 'Fitriani', 'Fasilitas', 19, '135000.00', 'kontrak', 6, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
(5, 'Dedi Setiawan', 'Keamanan', 26, '150000.00', 'kontrak', 12, 'PT Garda Perkasa', NULL, NULL, NULL, NULL),
(6, 'Citra Dewi', 'Administrasi', 21, '145000.00', 'kontrak', 12, 'PT Global Talent', NULL, NULL, NULL, NULL),
(7, 'Hendra Wijaya', 'Transportasi', 23, '155000.00', 'kontrak', 18, 'PT Indo Human Resource', NULL, NULL, NULL, NULL),
(8, 'Budi Santoso', 'IT Engineering', 21, '250000.00', 'tetap', NULL, NULL, '500000.00', 'ESOP-TECH-042', NULL, NULL),
(9, 'Diana Putri', 'Human Resources', 22, '200000.00', 'tetap', NULL, NULL, '450000.00', 'ESOP-HR-012', NULL, NULL),
(10, 'Eko Prasetyo', 'Finance', 20, '220000.00', 'tetap', NULL, NULL, '500000.00', 'ESOP-FIN-005', NULL, NULL),
(11, 'Megawati', 'Legal', 22, '240000.00', 'tetap', NULL, NULL, '600000.00', 'ESOP-LGL-001', NULL, NULL),
(12, 'Gilang Permana', 'IT Engineering', 22, '280000.00', 'tetap', NULL, NULL, '550000.00', 'ESOP-TECH-088', NULL, NULL),
(13, 'Rina Lestari', 'Marketing', 21, '190000.00', 'tetap', NULL, NULL, '400000.00', 'ESOP-MKT-023', NULL, NULL),
(14, 'Aditya Pratama', 'Procurement', 23, '210000.00', 'tetap', NULL, NULL, '450000.00', 'ESOP-PROC-011', NULL, NULL),
(15, 'Aris Munandar', 'Marketing', 18, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-2026A'),
(16, 'Amalia Rizki', 'IT Support', 19, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-2026B'),
(17, 'Dimas Saputra', 'Creative', 20, '55000.00', 'magang', NULL, NULL, NULL, NULL, '1600000.00', 'CERT-KM-2026C'),
(18, 'Nadia Safitri', 'Public Relation', 17, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-2026D'),
(19, 'Yusuf Bahtiar', 'Data Analyst', 22, '60000.00', 'magang', NULL, NULL, NULL, NULL, '1800000.00', 'CERT-KM-2026E'),
(20, 'Clarissa Putri', 'UI/UX Design', 21, '55000.00', 'magang', NULL, NULL, NULL, NULL, '1600000.00', 'CERT-KM-2026F'),
(21, 'Rian Hidayat', 'Quality Assurance', 19, '50000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'CERT-KM-2026G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
