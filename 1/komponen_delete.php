<?php

include "../koneksi.php";

$Kode_Komponen	= $_GET["Kode_Komponen"];

if($delete = mysqli_query($konek, "DELETE FROM Komponen WHERE Kode_Komponen='$Kode_Komponen'")){
	header("Location: komponen.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>