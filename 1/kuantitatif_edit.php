<?php

include "../koneksi.php";

$Id_kuantitatif			= $_POST["Id_kuantitatif"];
$kode_kuantitatif		= $_POST["kode_kuantitatif"];
$shape					= $_POST["shape"];
$scale					= $_POST["scale"];
$reliabilityw			= $_POST["reliabilityw"];
$failureratew			= $_POST["failureratew"];

if($edit = mysqli_query($konek, "UPDATE kuantitatif SET kode_kuantitatif='$kode_kuantitatif', shape='$shape', scale='$scale', realiabilityw='$realiabilityw', failureratew='$failureratew' WHERE Id_kuantitatif='$Id_kuantitatif'")){
		header("Location: kuantitatif.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>