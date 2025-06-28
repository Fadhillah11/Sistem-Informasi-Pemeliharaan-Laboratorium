-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2025 pada 13.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemeliharaan_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(10) NOT NULL,
  `monitor` varchar(50) NOT NULL,
  `prosesor` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `mouse` varchar(50) NOT NULL,
  `keyboard` varchar(50) NOT NULL,
  `id_pc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `monitor`, `prosesor`, `ram`, `os`, `mouse`, `keyboard`, `id_pc`) VALUES
(33, 'ACER', 'Intel core i7', '4', 'Windows 10', 'ACER', 'ACER', 113),
(34, 'ACER', 'Intel core i7', '4', 'Windows 10', 'Logitec', 'ACER', 114),
(35, 'LENOVO', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'LENOVO', 'LENOVO', 115),
(36, 'LG', 'Intel core i3', '2', 'Windows 8', 'LG', 'LG', 116),
(37, 'LG', 'Intel core i3', '2', 'Windows 8', 'LG', 'LG', 117),
(38, 'LG', 'Intel core i3', '2', 'Windows 8', 'Logitec', 'M-Tech', 118),
(39, 'TOSHIBA', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'M-tech', 'M-Tech', 119),
(40, 'TOSHIBA', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'M-tech', 'M-Tech', 120),
(41, 'TOSHIBA', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'M-tech', 'M-Tech', 121),
(42, 'LENOVO', 'Intel core i3', '2', 'Windows 8', 'LENOVO', 'LENOVO', 122),
(43, 'LENOVO', 'Intel core i3', '2', 'Windows 8', 'LENOVO', 'LENOVO', 123),
(44, 'ASUS', 'Intel core i3', '2', 'Windows 8', 'LENOVO', 'LENOVO', 124),
(45, 'ASUS', 'Intel core i7', '4', 'Windows 10', 'ASUS', 'ASUS', 125),
(46, 'ASUS', 'Intel core i7', '4', 'Windows 10', 'ASUS', 'ASUS', 126),
(47, 'ASUS', 'Intel core i7', '4', 'Windows 10', 'ASUS', 'ASUS', 127),
(48, 'LENOVO', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'LENOVO', 'LENOVO', 128),
(49, 'LENOVO', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'Logitec', 'LENOVO', 129),
(50, 'LENOVO', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'LENOVO', 'LENOVO', 130),
(51, 'ACER', 'Intel core i3', '4', 'Windows 10', 'ACER', 'ACER', 131),
(52, 'ACER', 'Intel core i3', '4', 'Windows 10', 'ACER', 'M-Tic', 132),
(53, 'ACER', 'Intel core i3', '4', 'Windows 10', 'ACER', 'M-Tech', 133),
(54, 'LENOVO', 'Intel(R) Celeron(R)', '2', 'Windows 8', 'LG', 'M-Tech', 134),
(55, 'LENOVO', 'Intel core i3', '2', 'Windows 8', 'Logitec', 'LENOVO', 135),
(56, 'LENOVO', 'Intel core i3', '2', 'Windows 8', 'LENOVO', 'LENOVO', 136);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komputer`
--

CREATE TABLE `komputer` (
  `id_pc` int(10) NOT NULL,
  `label` varchar(25) NOT NULL,
  `lab` int(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `kondisi` enum('NORMAL','RUSAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komputer`
--

INSERT INTO `komputer` (`id_pc`, `label`, `lab`, `tahun`, `kondisi`) VALUES
(113, '01-TKJ1', 1, '2021', 'NORMAL'),
(114, '02-TKJ1', 1, '2021', 'NORMAL'),
(115, '03-TKJ1', 1, '2021', 'NORMAL'),
(116, '01-TKJ2', 2, '2019', 'RUSAK'),
(117, '02-TKJ2', 2, '2019', 'NORMAL'),
(118, '03-TKJ2', 2, '2019', 'NORMAL'),
(119, ' 01-DKV1 ', 3, '2018', 'NORMAL'),
(120, '02-DKV1', 3, '2018', 'NORMAL'),
(121, '03-DKV1', 3, '2018', 'NORMAL'),
(122, '01-DKV2', 4, '2018', 'NORMAL'),
(123, '02-DKV2', 4, '2018', 'NORMAL'),
(124, '03-DKV2', 4, '2018', 'NORMAL'),
(125, '001-AK1', 5, '2021', 'RUSAK'),
(126, '002-AK1', 5, '2021', 'NORMAL'),
(127, '003-AK1', 5, '2021', 'NORMAL'),
(128, '001-AK2', 6, '2018', 'NORMAL'),
(129, '002-AK2', 6, '2018', 'NORMAL'),
(130, '003-AK2', 6, '2018', 'NORMAL'),
(131, '01-MPLB', 7, '2022', 'NORMAL'),
(132, '02-MPLB', 7, '2022', 'NORMAL'),
(133, '03-MPLB', 7, '2022', 'NORMAL'),
(134, '01-PM', 10, '2022', 'NORMAL'),
(135, '02-PM', 10, '2022', 'NORMAL'),
(136, '03-PM', 10, '2022', 'NORMAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(10) NOT NULL,
  `nama_lab` varchar(25) NOT NULL,
  `kapro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`, `kapro`) VALUES
(1, 'TKJ - 1', 2),
(2, 'TKJ - 2', 2),
(3, 'DKV - 1', 4),
(4, 'DKV - 2', 4),
(5, 'AKL - 1', 5),
(6, 'AKL - 2', 5),
(7, 'MPLB ', 7),
(10, 'PEMASARAN', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(10) NOT NULL,
  `pc` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `hasil` enum('NORMAL','PERBAIKAN','TIDAK DAPAT DIPERBAIKI') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `pc`, `id_user`, `hasil`, `keterangan`, `kerusakan`, `tgl`) VALUES
(53, 113, 3, 'NORMAL', '4,5,6,7,8,9', '-', '2025-02-14'),
(54, 114, 3, 'NORMAL', '4,5,6,7,8,9', 'gagal booting', '2025-02-14'),
(55, 115, 3, 'NORMAL', '4,5,6,7,8,9', 'monitor tidak nyala', '2025-02-14'),
(56, 116, 3, 'TIDAK DAPAT DIPERBAIKI', '4,5,6,7,8,9', 'motherboot rusak', '2025-02-14'),
(57, 117, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(58, 118, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(59, 119, 8, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(60, 120, 8, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(61, 121, 8, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(62, 122, 8, 'NORMAL', '4,5,6,7,8,9', 'keyboard rusak', '2025-02-14'),
(63, 123, 8, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(64, 124, 8, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(65, 125, 13, 'TIDAK DAPAT DIPERBAIKI', '4,5,6,7,8,9', 'motherboot rusak', '2025-02-14'),
(66, 126, 13, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(67, 127, 13, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(68, 128, 13, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(69, 129, 13, 'NORMAL', '4,5,6,7,8,9', 'PC lemot', '2025-02-14'),
(70, 130, 13, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(71, 131, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(72, 132, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(73, 133, 3, 'PERBAIKAN', '4,5,6,7,8,9', 'gagal booting', '2025-02-14'),
(74, 134, 3, 'PERBAIKAN', '4,5,6,7,8,9', 'monitor rusak ', '2025-02-14'),
(75, 135, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14'),
(76, 136, 3, 'NORMAL', '4,5,6,7,8,9', '', '2025-02-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(10) NOT NULL,
  `id_pemeliharaan` int(10) NOT NULL,
  `daftar_perbaikan` varchar(255) NOT NULL,
  `tgl_perbaikan` date DEFAULT NULL,
  `petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_pemeliharaan`, `daftar_perbaikan`, `tgl_perbaikan`, `petugas`) VALUES
(11, 54, 'install ulang ', '2025-02-14', 3),
(12, 55, 'ganti kabel VGA', '2025-02-14', 3),
(13, 56, 'RUSAK ', '2025-02-14', 8),
(14, 62, 'ganti keyboard', '2025-02-14', 8),
(15, 65, 'RUSAK ', '2025-02-14', 13),
(16, 69, 'install ulang ', '2025-02-14', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sop`
--

CREATE TABLE `sop` (
  `id_sop` int(10) NOT NULL,
  `nama_sop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sop`
--

INSERT INTO `sop` (`id_sop`, `nama_sop`) VALUES
(4, 'Membersihkan hardware dari debu'),
(5, 'Pengecekan kinerja hardware untuk memastikan semua komputer dapat  bekerja normal.'),
(6, ' Pemindaian dan Pembaruan Antivirus'),
(7, 'Memperbarui aplikasi yang sering digunakan oleh siswa dan guru'),
(8, 'Pengelolaan Penyimpanan / clean up data'),
(9, 'Pemeriksaan Jaringan dan Konektivitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jabatan` enum('KAPRO','KALAB','PETUGAS') NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `jabatan`, `no_tlp`, `alamat`, `jenis_kelamin`, `password`, `status`, `reset_token`, `token_expiry`) VALUES
(1, 'admin', 'Pradata Damar W', 'KALAB', '08123456789', 'Batang', 'LAKI-LAKI', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(2, 'astri', 'Astri Yuliati', 'KAPRO', '08512345678ab', 'Kauman', 'PEREMPUAN', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(3, 'Dilla', 'Dilla', 'PETUGAS', '08587654321', 'kalisalak batang', 'PEREMPUAN', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(4, 'Ahsan', 'Ahsan Prasetiyo', 'KAPRO', '08123456789', 'Paasekaran', 'LAKI-LAKI', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(5, 'Abduka', 'Abduka Gusnati', 'KAPRO', '08528899800', 'kauman', 'LAKI-LAKI', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(6, 'Yuniarti', 'Yuniarti Naning Triyani', 'KAPRO', '08999988871', 'sambong', 'PEREMPUAN', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(7, 'Ratna', 'Ratna', 'KAPRO', '0812365', 'Kalipucang', 'PEREMPUAN', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL),
(8, 'Jeno', 'Jeno', 'PETUGAS', '0852789291', 'Kwangyayaya', 'LAKI-LAKI', '202cb962ac59075b964b07152d234b70', 'active', 'c9e50e796f1214f2aa5c1f333fcc5c2f', '2025-02-09 02:34:09'),
(13, 'Nana', 'Nana', 'PETUGAS', '0987654321', 'Kauman', 'PEREMPUAN', '202cb962ac59075b964b07152d234b70', 'active', '70b2be3eafb888944163f1d658e35705', '1995-02-08 04:48:23'),
(14, 'joni', 'jonii', 'PETUGAS', '0812345678', 'Lebo', 'LAKI-LAKI', '698d51a19d8a121ce581499d7b701668', 'inactive', '43ce83aa559c59e365e1628cfe4e326d', '2025-02-06 04:34:11'),
(15, 'kardiyono', 'kardiyono', 'KALAB', '085678654667', 'pekalongan', 'LAKI-LAKI', '202cb962ac59075b964b07152d234b70', 'active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`),
  ADD KEY `id_pc` (`id_pc`);

--
-- Indeks untuk tabel `komputer`
--
ALTER TABLE `komputer`
  ADD PRIMARY KEY (`id_pc`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `lab` (`lab`);

--
-- Indeks untuk tabel `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `kapro` (`kapro`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `pc` (`pc`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_pemeliharaan` (`id_pemeliharaan`),
  ADD KEY `petugas` (`petugas`);

--
-- Indeks untuk tabel `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `komputer`
--
ALTER TABLE `komputer`
  MODIFY `id_pc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `sop`
--
ALTER TABLE `sop`
  MODIFY `id_sop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD CONSTRAINT `komponen_ibfk_1` FOREIGN KEY (`id_pc`) REFERENCES `komputer` (`id_pc`);

--
-- Ketidakleluasaan untuk tabel `komputer`
--
ALTER TABLE `komputer`
  ADD CONSTRAINT `komputer_ibfk_1` FOREIGN KEY (`lab`) REFERENCES `lab` (`id_lab`);

--
-- Ketidakleluasaan untuk tabel `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`kapro`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_2` FOREIGN KEY (`pc`) REFERENCES `komputer` (`id_pc`),
  ADD CONSTRAINT `pemeliharaan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `perbaikan_ibfk_1` FOREIGN KEY (`id_pemeliharaan`) REFERENCES `pemeliharaan` (`id_pemeliharaan`),
  ADD CONSTRAINT `perbaikan_ibfk_2` FOREIGN KEY (`petugas`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
