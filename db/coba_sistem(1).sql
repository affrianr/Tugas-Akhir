-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 02:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

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
-- Table structure for table `kerusakan`
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
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`Id_kerusakan`, `kode_komponen_rusak`, `keterangan_kerusakan`, `tanggal_kerusakan`, `jam`, `pegawai_bertugas`, `severity`, `occurance`, `detection`) VALUES
(11, 'BFP11', 'ini keterangan', '2022-01-21', '11:11', '112233445566', 2, 1, 1),
(22, 'BFP11', 'coba', '0000-00-00', '11:44', '111111111111111', 1, 1, 1),
(25, 'BFP11', 'cobacpba', '0000-00-00', '11:49', '111111111111111', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `Kode_Komponen` varchar(50) NOT NULL,
  `Nama_Komponen` varchar(50) NOT NULL,
  `Fungsi_Komponen` text NOT NULL,
  `Status_Komponen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`Kode_Komponen`, `Nama_Komponen`, `Fungsi_Komponen`, `Status_Komponen`) VALUES
('BARU12', 'Baru', '', 'Aktif'),
('BFP11', 'BFP 1.1', '', 'Aktif'),
('HRSG12', 'HRSG 1.2', '', 'Aktif'),
('HRSG13', 'HRSG 1.3', '', 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `kuantitatif`
--

CREATE TABLE `kuantitatif` (
  `Id_kuantitatif` int(11) NOT NULL,
  `kode_kuantitatif` varchar(50) CHARACTER SET latin1 NOT NULL,
  `shape` float NOT NULL,
  `scale` float NOT NULL,
  `timew` float NOT NULL,
  `reliabilityw` float NOT NULL,
  `failureratew` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuantitatif`
--

INSERT INTO `kuantitatif` (`Id_kuantitatif`, `kode_kuantitatif`, `shape`, `scale`, `timew`, `reliabilityw`, `failureratew`) VALUES
(18, 'BFP11', 1.98, 8004, 4000, 0, 0),
(19, 'BFP11', 1.98, 8004, 4000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parameter1`
--

CREATE TABLE `parameter1` (
  `rating1` int(10) NOT NULL,
  `efek1` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kriteria1` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter1`
--

INSERT INTO `parameter1` (`rating1`, `efek1`, `kriteria1`) VALUES
(1, 'Tidak ada', 'Aradasda'),
(2, 'Sangat Minor', 'Gangguan minor pada lini produksi, sebagian produk harus dikerjakan ulang di tempat, fit & finish atau squeak & rattle produk tidak sesuai, pelanggan yang sangat jeli menyadari defect tersebut'),
(3, 'Minor', 'deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `parameter2`
--

CREATE TABLE `parameter2` (
  `rating2` int(10) NOT NULL,
  `efek2` text CHARACTER SET latin1 NOT NULL,
  `kriteria2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter2`
--

INSERT INTO `parameter2` (`rating2`, `efek2`, `kriteria2`) VALUES
(1, 'Kegagalan mustahil. Tak pernah ada kegagalan terjadi dalam proses yang identik', '1:1.500.000'),
(2, 'Sangat rendah: Hanya kegagalan terisolasi yang berkaitan dengan proses hampir identik', '  1:150.000');

-- --------------------------------------------------------

--
-- Table structure for table `parameter3`
--

CREATE TABLE `parameter3` (
  `rating3` int(10) NOT NULL,
  `efek3` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kriteria3` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter3`
--

INSERT INTO `parameter3` (`rating3`, `efek3`, `kriteria3`) VALUES
(1, 'Rusak', 'Secara kasat mata'),
(2, 'Rusak1', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `Nama_Pegawai`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`) VALUES
('111111111111111', 'Pak Jokowi', '1975-01-09', 'L', '081151215125', 'Indonesia'),
('112233445566', 'Pak Emon', '1995-01-10', 'L', '081111111111111', 'Surabaya'),
('1234567890111', 'Pak Bud', '1980-01-09', 'L', '123125', 'Bumi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`, `Foto`, `nama_lengkap`) VALUES
(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', '', 'Admin 01'),
(18, 2, '098980', '$2y$10$25GSpBPnHynFHGafwjdyUeuwy6kF/6/pKLBSVdxk61suyPf5Tsugu', '', 'Luqman Hakim M.Kom'),
(21, 3, '1941160108', '$2y$10$KJmPyZTI2L/y.hyVmUtuuu3LUq53SQhMFO1DIVOmTlud9uTAVNg62', '', ''),
(22, 3, '1900000000', '$2y$10$clJZiL28Yve4dbQbZa8xzeuiMmzA7XIoBzLYmdfe3Su3JoQDZHpr6', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `Id_Usergroup` int(11) NOT NULL,
  `Nama_Usergroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`Id_Usergroup`, `Nama_Usergroup`) VALUES
(1, 'Administrator'),
(2, 'Supervisor'),
(3, 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`Id_kerusakan`),
  ADD KEY `kode_komponen_rusak` (`kode_komponen_rusak`),
  ADD KEY `FK_rating1` (`severity`) USING BTREE,
  ADD KEY `FK_rating2` (`occurance`) USING BTREE,
  ADD KEY `FK_rating3` (`detection`) USING BTREE,
  ADD KEY `pegawai_bertugas` (`pegawai_bertugas`) USING BTREE;

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`Kode_Komponen`);

--
-- Indexes for table `kuantitatif`
--
ALTER TABLE `kuantitatif`
  ADD PRIMARY KEY (`Id_kuantitatif`),
  ADD KEY `kode_kuantitatif` (`kode_kuantitatif`);

--
-- Indexes for table `parameter1`
--
ALTER TABLE `parameter1`
  ADD PRIMARY KEY (`rating1`),
  ADD KEY `rating1` (`rating1`);

--
-- Indexes for table `parameter2`
--
ALTER TABLE `parameter2`
  ADD PRIMARY KEY (`rating2`);

--
-- Indexes for table `parameter3`
--
ALTER TABLE `parameter3`
  ADD PRIMARY KEY (`rating3`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `FK_user_usergroup` (`Id_Usergroup_User`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`Id_Usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `Id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kuantitatif`
--
ALTER TABLE `kuantitatif`
  MODIFY `Id_kuantitatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `Id_Usergroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD CONSTRAINT `kerusakan_ibfk_1` FOREIGN KEY (`kode_komponen_rusak`) REFERENCES `komponen` (`Kode_Komponen`),
  ADD CONSTRAINT `kerusakan_ibfk_2` FOREIGN KEY (`pegawai_bertugas`) REFERENCES `pegawai` (`NIP`),
  ADD CONSTRAINT `kerusakan_ibfk_3` FOREIGN KEY (`severity`) REFERENCES `parameter1` (`rating1`),
  ADD CONSTRAINT `kerusakan_ibfk_4` FOREIGN KEY (`occurance`) REFERENCES `parameter2` (`rating2`),
  ADD CONSTRAINT `kerusakan_ibfk_5` FOREIGN KEY (`detection`) REFERENCES `parameter3` (`rating3`);

--
-- Constraints for table `kuantitatif`
--
ALTER TABLE `kuantitatif`
  ADD CONSTRAINT `kuantitatif_ibfk_1` FOREIGN KEY (`kode_kuantitatif`) REFERENCES `komponen` (`Kode_Komponen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
