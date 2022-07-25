<?php

include "../koneksi.php";

$Id_kuantitatif			= $_POST["Id_kuantitatif"];
$kode_kuantitatif		= $_POST["kode_kuantitatif"];
$tanggal_kerusakan		= $_POST["tanggal_kerusakan"];
$tangal_selesai			= $_POST["tanggal_selesai"];
$nilai_ttf				= $_POST["nilai_ttf"];

if($edit = mysqli_query($konek, "UPDATE kuantitatif SET kode_kuantitatif='$kode_kuantitatif',  tanggal_kerusakan='$tanggal_kerusakan', tangal_selesai='$tangal_selesai', nilai_ttf='$nilai_ttf' WHERE Id_kuantitatif='$Id_kuantitatif'")){
		header("Location: kuantitatif.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>