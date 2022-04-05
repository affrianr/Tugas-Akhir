<?php
include "../koneksi.php";

$Kode_Komponen	= $_POST["Kode_Komponen"];
$Nama_Komponen	= $_POST["Nama_Komponen"];
$Fungsi_Komponen = $_POST["Fungsi_Komponen"];
$Status_Komponen = $_POST["Status_Komponen"];


if($add = mysqli_query($konek, "INSERT INTO komponen (Kode_Komponen, Nama_Komponen, Fungsi_Komponen, Status_Komponen) VALUES ('$Kode_Komponen', '$Nama_Komponen', '$Fungsi_Ruanang', '$Status_Komponen')")){
	header("Location: komponen.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>