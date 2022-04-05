-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perguruantinggi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(50) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `Nama_Dosen`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`) VALUES
('098980', 'Luqman Hakim M.Kom', '1973-01-02', 'L', '080000000000', 'Jakarta'),
('DS003', 'Didih Rizky M.Pd', '1976-05-01', 'L', '081111111111', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_Jadwal` int(11) NOT NULL,
  `Kode_Matakuliah_Jadwal` varchar(50) NOT NULL,
  `NIP_Jadwal` varchar(50) NOT NULL,
  `Kode_Ruangan_Jadwal` varchar(50) NOT NULL,
  `Kode_Jurusan_Jadwal` varchar(50) NOT NULL,
  `Hari` varchar(50) NOT NULL,
  `Jam` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_Jadwal`, `Kode_Matakuliah_Jadwal`, `NIP_Jadwal`, `Kode_Ruangan_Jadwal`, `Kode_Jurusan_Jadwal`, `Hari`, `Jam`) VALUES
(13, 'W01', 'DS003', 'R03', 'TIS1', 'Senin', '09:00-11:30'),
(14, 'PM01', 'DS003', 'R02', 'TIS1', 'Senin', '12:30-13:30'),
(15, 'MK01', '098980', 'R01', 'JTDS1', 'Rabu', '08:40-10:20');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `Kode_Jenjang` varchar(50) NOT NULL,
  `Nama_Jenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`Kode_Jenjang`, `Nama_Jenjang`) VALUES
('D1', 'Diploma I'),
('D3', 'Diploma III'),
('D4', 'Sarjana Terapan'),
('S1', 'Sarjana'),
('S2', 'Magister'),
('S3', 'Doktor');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `Kode_Jurusan` varchar(50) NOT NULL,
  `Nama_Jurusan` varchar(50) NOT NULL,
  `Kode_Jenjang_Jrs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`Kode_Jurusan`, `Nama_Jurusan`, `Kode_Jenjang_Jrs`) VALUES
('JTDS1', 'Jaringan Telekomunikasi Digital', 'D4'),
('KIS1', 'Kimia', 'D3'),
('SID3', 'Sistem Informasi', 'D3'),
('TIS1', 'Teknik Informatika', 'S1'),
('TKD3', 'Teknik Komputer', 'D3');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(50) NOT NULL,
  `Nama_Mahasiswa` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `Kode_Jurusan_Mhs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama_Mahasiswa`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`, `Kode_Jurusan_Mhs`) VALUES
('1900000000', 'Ardana Firmansyah', '2000-08-23', 'L', '081234567891', 'Sumenep', 'TIS1'),
('1941160108', 'Eka Purnama Wulandari', '2001-05-05', 'P', '081234567890', 'Sumenep', 'JTDS1');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Kode_Matakuliah` varchar(50) NOT NULL,
  `Nama_Matakuliah` varchar(50) NOT NULL,
  `SKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`Kode_Matakuliah`, `Nama_Matakuliah`, `SKS`) VALUES
('MK01', 'Database', 2),
('MK02', 'MTQ', 3),
('PM01', 'Pemrogramana Mobile', 3),
('SO01', 'Sistem Operasi', 2),
('W01', 'Web Programming', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `Id_Nilai` int(11) NOT NULL,
  `NIM_Nilai` varchar(50) NOT NULL,
  `Kode_Matakuliah_Nilai` varchar(50) NOT NULL,
  `Nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`Id_Nilai`, `NIM_Nilai`, `Kode_Matakuliah_Nilai`, `Nilai`) VALUES
(1, '1900000000', 'W01', 'A'),
(2, '1900000000', 'PM01', 'A'),
(3, '1941160108', 'MK01', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `Kode_Ruangan` varchar(50) NOT NULL,
  `Nama_Ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`Kode_Ruangan`, `Nama_Ruangan`) VALUES
('R01', 'Ruangan 1'),
('R02', 'Ruangan 2'),
('R03', 'Ruangan 3');

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
(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', 'polinema.png', 'Admin 01'),
(18, 2, '098980', '$2y$10$25GSpBPnHynFHGafwjdyUeuwy6kF/6/pKLBSVdxk61suyPf5Tsugu', 'polinema.png', 'Luqman Hakim M.Kom'),
(21, 3, '1941160108', '$2y$10$KJmPyZTI2L/y.hyVmUtuuu3LUq53SQhMFO1DIVOmTlud9uTAVNg62', 'polinema.png', ''),
(22, 3, '1900000000', '$2y$10$clJZiL28Yve4dbQbZa8xzeuiMmzA7XIoBzLYmdfe3Su3JoQDZHpr6', 'polinema.png', '');

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
(2, 'Dosen'),
(3, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_Jadwal`),
  ADD KEY `FK_jadwal_dosen` (`NIP_Jadwal`),
  ADD KEY `FK_jadwal_ruangan` (`Kode_Ruangan_Jadwal`),
  ADD KEY `FK_jadwal_matakuliah` (`Kode_Matakuliah_Jadwal`),
  ADD KEY `FK_jadwal_jurusan` (`Kode_Jurusan_Jadwal`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`Kode_Jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`Kode_Jurusan`),
  ADD KEY `FK_jurusan_jenjang` (`Kode_Jenjang_Jrs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `FK_mahasiswa_jurusan` (`Kode_Jurusan_Mhs`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Kode_Matakuliah`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`Id_Nilai`),
  ADD KEY `FK_nilai_mahasiswa` (`NIM_Nilai`),
  ADD KEY `FK_nilai_matakuliah` (`Kode_Matakuliah_Nilai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`Kode_Ruangan`);

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
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `Id_Jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `Id_Nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_dosen` FOREIGN KEY (`NIP_Jadwal`) REFERENCES `dosen` (`NIP`),
  ADD CONSTRAINT `FK_jadwal_jurusan` FOREIGN KEY (`Kode_Jurusan_Jadwal`) REFERENCES `jurusan` (`Kode_Jurusan`),
  ADD CONSTRAINT `FK_jadwal_matakuliah` FOREIGN KEY (`Kode_Matakuliah_Jadwal`) REFERENCES `matakuliah` (`Kode_Matakuliah`),
  ADD CONSTRAINT `FK_jadwal_ruangan` FOREIGN KEY (`Kode_Ruangan_Jadwal`) REFERENCES `ruangan` (`Kode_Ruangan`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `FK_jurusan_jenjang` FOREIGN KEY (`Kode_Jenjang_Jrs`) REFERENCES `jenjang` (`Kode_Jenjang`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_mahasiswa_jurusan` FOREIGN KEY (`Kode_Jurusan_Mhs`) REFERENCES `jurusan` (`Kode_Jurusan`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `FK_nilai_mahasiswa` FOREIGN KEY (`NIM_Nilai`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `FK_nilai_matakuliah` FOREIGN KEY (`Kode_Matakuliah_Nilai`) REFERENCES `matakuliah` (`Kode_Matakuliah`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_usergroup` FOREIGN KEY (`Id_Usergroup_User`) REFERENCES `usergroup` (`Id_Usergroup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
