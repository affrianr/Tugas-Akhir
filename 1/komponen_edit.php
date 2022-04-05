<?php
include "../koneksi.php";

$Kode_Komponen		= $_POST["Kode_Komponen"];
$Nama_Komponen		= $_POST["Nama_Komponen"];
$Fungsi_Komponen	= $_POST["Fungsi_Komponen"];
$Status_Komponen	= $_POST["Status_Komponen"];

if ($edit = mysqli_query($konek, "UPDATE komponen SET Nama_Komponen='$Nama_Komponen', Fungsi_Komponen='$Fungsi_Komponen', Status_Komponen='$Status_Komponen' WHERE Kode_Komponen='$Kode_Komponen'")){
	header("Location: komponen.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>