<?php

include "../koneksi.php";

$rating1	= $_POST["rating1"];
$efek1		= $_POST["efek1"];
$kriteria1 	= $_POST["kriteria1"];

if($edit = mysqli_query($konek, "UPDATE parameter1 SET efek1='$efek1', kriteria1='$kriteria1' WHERE rating1='$rating1'")){
	header("Location: parameter1.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>