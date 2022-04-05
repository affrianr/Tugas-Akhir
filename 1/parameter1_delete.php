<?php

include "../koneksi.php";

$rating1	= $_GET["rating1"];
$efek1		= $_GET["efek1"];
$kriteria1	= $_GET["kriteria1"];

if($delete = mysqli_query($konek, "DELETE FROM parameter1 WHERE rating1='$rating1', efek1='$efek1', kriteria1='$kriteria1' ")){
	header("Location: parameter1.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>