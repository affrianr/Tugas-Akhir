-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2022 pada 14.28
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_sistem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `Id_kerusakan` int(11) NOT NULL,
  `kode_komponen_rusak` varchar(50) CHARACTER SET latin1 NOT NULL,
  `keterangan_kerusakan` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `tanggal_kerusakan` date NOT NULL,
  `jam` varchar(11) CHARACTER SET latin1 NOT NULL,
  `pegawai_bertugas` varchar(50) CHARACTER SET latin1 NOT NULL,
  `severity` int(10) NOT NULL,
  `occurance` int(10) NOT NULL,
  `detection` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`Id_kerusakan`, `kode_komponen_rusak`, `keterangan_kerusakan`, `tanggal_kerusakan`, `jam`, `pegawai_bertugas`, `severity`, `occurance`, `detection`) VALUES
(11, 'BFP11', 'ini keterangan', '2022-01-21', '11:11', '112233445566', 2, 1, 1),
(22, 'BFP11', 'coba', '0000-00-00', '11:44', '111111111111111', 1, 1, 1),
(28, 'BARU12', '', '2020-01-15', '18:50', '111111111111111', 1, 1, 1),
(33, 'HRSG13', '', '2022-06-15', '18:38', '111111111111111', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen`
--

CREATE TABLE `komponen` (
  `Kode_Komponen` varchar(50) NOT NULL,
  `Nama_Komponen` varchar(50) NOT NULL,
  `Fungsi_Komponen` text NOT NULL,
  `Status_Komponen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komponen`
--

INSERT INTO `komponen` (`Kode_Komponen`, `Nama_Komponen`, `Fungsi_Komponen`, `Status_Komponen`) VALUES
('BARU12', 'Baru', '', 'Aktif'),
('BFP11', 'BFP 1.1', '', 'Aktif'),
('HRSG12', 'HRSG 1.2', '', 'Aktif'),
('HRSG13', 'HRSG 1.3', '', 'Nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuantitatif`
--

CREATE TABLE `kuantitatif` (
  `Id_kuantitatif` int(11) NOT NULL,
  `kode_kuantitatif` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal_rusak` datetime DEFAULT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `nilai_ttf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuantitatif`
--

INSERT INTO `kuantitatif` (`Id_kuantitatif`, `kode_kuantitatif`, `tanggal_rusak`, `tanggal_selesai`, `nilai_ttf`) VALUES
(43, 'HRSG12', '2022-06-08 00:00:00', '2022-06-13 00:00:00', 0),
(44, 'HRSG12', '2022-06-14 00:00:00', '2022-06-15 00:00:00', 0),
(45, 'BFP11', '2022-06-01 00:00:00', '2022-06-10 00:00:00', 0),
(55, 'BARU12', '2022-06-12 00:00:00', '2022-06-14 00:00:00', 0),
(56, 'BARU12', '2022-06-11 00:00:00', '2022-06-13 00:00:00', 0),
(57, 'BARU12', '2022-06-01 21:19:00', '2022-06-14 21:19:00', 0),
(58, 'BFP11', '2022-06-16 12:48:00', '2022-06-16 12:48:00', 0),
(61, 'BFP11', '2022-06-20 23:51:00', '2022-06-30 23:52:00', 0),
(62, 'HRSG12', '2022-06-21 13:24:00', '2022-06-30 13:24:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter1`
--

CREATE TABLE `parameter1` (
  `rating1` int(10) NOT NULL,
  `efek1` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kriteria1` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `parameter1`
--

INSERT INTO `parameter1` (`rating1`, `efek1`, `kriteria1`) VALUES
(1, 'Tidak ada', 'Aradasda'),
(2, 'Sangat Minor', 'Gangguan minor pada lini produksi, sebagian produk harus dikerjakan ulang di tempat, fit & finish atau squeak & rattle produk tidak sesuai, pelanggan yang sangat jeli menyadari defect tersebut'),
(3, 'Minor', 'deskripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter2`
--

CREATE TABLE `parameter2` (
  `rating2` int(10) NOT NULL,
  `efek2` text CHARACTER SET latin1 NOT NULL,
  `kriteria2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `parameter2`
--

INSERT INTO `parameter2` (`rating2`, `efek2`, `kriteria2`) VALUES
(1, 'Kegagalan mustahil. Tak pernah ada kegagalan terjadi dalam proses yang identik', '1:1.500.000'),
(2, 'Sangat rendah: Hanya kegagalan terisolasi yang berkaitan dengan proses hampir identik', '  1:150.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter3`
--

CREATE TABLE `parameter3` (
  `rating3` int(10) NOT NULL,
  `efek3` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kriteria3` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `parameter3`
--

INSERT INTO `parameter3` (`rating3`, `efek3`, `kriteria3`) VALUES
(1, 'Rusak', 'Secara kasat mata'),
(2, 'Rusak1', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(50) NOT NULL,
  `Nama_Pegawai` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `Nama_Pegawai`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`) VALUES
('111111111111111', 'Pak Jokowi', '1975-01-09', 'L', '081151215125', 'Indonesia'),
('112233445566', 'Pak Emon', '1995-01-10', 'L', '081111111111111', 'Surabaya'),
('1234567890111', 'Pak Bud', '1980-01-09', 'L', '123125', 'Bumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Id_Usergroup_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) NOT NULL DEFAULT 'polinema.png',
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`, `Foto`, `nama_lengkap`) VALUES
(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', '', 'Admin 01'),
(18, 2, '098980', '$2y$10$25GSpBPnHynFHGafwjdyUeuwy6kF/6/pKLBSVdxk61suyPf5Tsugu', '', 'Luqman Hakim M.Kom'),
(21, 3, '1941160108', '$2y$10$KJmPyZTI2L/y.hyVmUtuuu3LUq53SQhMFO1DIVOmTlud9uTAVNg62', '', ''),
(22, 3, '1900000000', '$2y$10$clJZiL28Yve4dbQbZa8xzeuiMmzA7XIoBzLYmdfe3Su3JoQDZHpr6', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usergroup`
--

CREATE TABLE `usergroup` (
  `Id_Usergroup` int(11) NOT NULL,
  `Nama_Usergroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usergroup`
--

INSERT INTO `usergroup` (`Id_Usergroup`, `Nama_Usergroup`) VALUES
(1, 'Administrator'),
(2, 'Supervisor'),
(3, 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`Id_kerusakan`),
  ADD KEY `kode_komponen_rusak` (`kode_komponen_rusak`),
  ADD KEY `FK_rating1` (`severity`) USING BTREE,
  ADD KEY `FK_rating2` (`occurance`) USING BTREE,
  ADD KEY `FK_rating3` (`detection`) USING BTREE,
  ADD KEY `pegawai_bertugas` (`pegawai_bertugas`) USING BTREE;

--
-- Indeks untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`Kode_Komponen`);

--
-- Indeks untuk tabel `kuantitatif`
--
ALTER TABLE `kuantitatif`
  ADD PRIMARY KEY (`Id_kuantitatif`),
  ADD KEY `kode_kuantitatif` (`kode_kuantitatif`);

--
-- Indeks untuk tabel `parameter1`
--
ALTER TABLE `parameter1`
  ADD PRIMARY KEY (`rating1`),
  ADD KEY `rating1` (`rating1`);

--
-- Indeks untuk tabel `parameter2`
--
ALTER TABLE `parameter2`
  ADD PRIMARY KEY (`rating2`);

--
-- Indeks untuk tabel `parameter3`
--
ALTER TABLE `parameter3`
  ADD PRIMARY KEY (`rating3`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `FK_user_usergroup` (`Id_Usergroup_User`);

--
-- Indeks untuk tabel `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`Id_Usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `Id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kuantitatif`
--
ALTER TABLE `kuantitatif`
  MODIFY `Id_kuantitatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `Id_Usergroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD CONSTRAINT `kerusakan_ibfk_1` FOREIGN KEY (`kode_komponen_rusak`) REFERENCES `komponen` (`Kode_Komponen`),
  ADD CONSTRAINT `kerusakan_ibfk_2` FOREIGN KEY (`pegawai_bertugas`) REFERENCES `pegawai` (`NIP`),
  ADD CONSTRAINT `kerusakan_ibfk_3` FOREIGN KEY (`severity`) REFERENCES `parameter1` (`rating1`),
  ADD CONSTRAINT `kerusakan_ibfk_4` FOREIGN KEY (`occurance`) REFERENCES `parameter2` (`rating2`),
  ADD CONSTRAINT `kerusakan_ibfk_5` FOREIGN KEY (`detection`) REFERENCES `parameter3` (`rating3`);

--
-- Ketidakleluasaan untuk tabel `kuantitatif`
--
ALTER TABLE `kuantitatif`
  ADD CONSTRAINT `kuantitatif_ibfk_1` FOREIGN KEY (`kode_kuantitatif`) REFERENCES `komponen` (`Kode_Komponen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
