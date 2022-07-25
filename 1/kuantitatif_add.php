<?php

include "../koneksi.php";

$Id_kuantitatif			= $_POST["Id_kuantitatif"];
$kode_kuantitatif		= $_POST["kode_kuantitatif"];
$tanggal_rusak			= $_POST["tanggal_rusak"];
$tanggal_selesai		= $_POST["tanggal_selesai"];
$nilai_ttf				= $_POST["nilai_ttf"];



if($add = mysqli_query($konek, "INSERT INTO kuantitatif(kode_kuantitatif, tanggal_rusak, tanggal_selesai, nilai_ttf) VALUES ('$kode_kuantitatif', '$tanggal_rusak', '$tanggal_selesai', '$nilai_ttf')")){
	header("Location: kuantitatif.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>