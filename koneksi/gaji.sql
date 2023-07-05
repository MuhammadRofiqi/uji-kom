-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2023 pada 07.06
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji_1921400016`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_gaji`
--

CREATE TABLE `tabel_gaji` (
  `id_gaji` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gaji` int(16) NOT NULL,
  `tunjangan` int(16) NOT NULL,
  `total_gaji` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_gaji`
--

INSERT INTO `tabel_gaji` (`id_gaji`, `nama_karyawan`, `jabatan`, `gaji`, `tunjangan`, `total_gaji`) VALUES
(1, 'Rofiqi', 'Kapala Lembaga', 2500000, 1500000, 4000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_gaji`
--
ALTER TABLE `tabel_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_gaji`
--
ALTER TABLE `tabel_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
