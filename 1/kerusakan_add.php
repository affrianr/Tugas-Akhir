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
$RPN					= $severity*$occurance*$detection;

if($add = mysqli_query($konek, "INSERT INTO kerusakan(kode_komponen_rusak, keterangan_kerusakan, tanggal_kerusakan, jam, pegawai_bertugas, severity, occurance, detection, RPN) VALUES ('$kode_komponen_rusak', '$keterangan_kerusakan', '$tanggal_kerusakan', '$jam', '$pegawai_bertugas', '$severity', '$occurance', '$detection', '$RPN')")){
	header("Location: kerusakan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>