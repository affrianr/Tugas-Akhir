<?php
include "../koneksi.php";

$NIP 			= $_POST["NIP"];
$Nama_Pegawai	= $_POST["Nama_Pegawai"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$Alamat 		= $_POST["Alamat"];
$No_Telp 		= $_POST["No_Telp"];

if ($add = mysqli_query($konek, "INSERT INTO pegawai (NIP, Nama_Pegawai, Tanggal_Lahir, JK, Alamat, No_Telp) VALUES 
	('$NIP', '$Nama_Pegawai', '$Tanggal_Lahir', '$JK', '$Alamat', '$No_Telp')")){
		header("Location: pegawai.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>