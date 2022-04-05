<?php

include "../koneksi.php";

$Id_kerusakan			= $_POST["Id_kerusakan"];
$kode_komponen_rusak	= $_POST["kode_komponen_rusak"];
$keterangan_kerusakan	= $_POST["keterangan_kerusakan"];
$tanggal_kerusakan		= $_POST["tanggal_kerusakan"];
$jam					= $_POST["jam"];
$pegawai_bertugas		= $_POST["pegawai_bertugas"];
$severity				= $_POST["severity"];
$occurance				= $_POST["occurance"];
$detection				= $_POST["detection"];

if($edit = mysqli_query($konek, "UPDATE kerusakan SET kode_komponen_rusak='$kode_komponen_rusak', keterangan_kerusakan='$keterangan_kerusakan', tanggal_kerusakan='$tanggal_kerusakan', jam='$jam', pegawai_bertugas='$pegawai_bertugas', severity='$severity', occurance='$occurance', detection='$detection' WHERE Id_kerusakan='$Id_kerusakan'")){
		header("Location: kerusakan.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>