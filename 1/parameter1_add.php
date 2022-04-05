<?php

include "../koneksi.php";

$rating1	= $_POST["rating1"];
$efek1		= $_POST["efek1"];
$kriteria1 	= $_POST["kriteria1"];

if($add = mysqli_query($konek, "INSERT INTO parameter1(rating1, efek1, kriteria1) VALUES ('$rating1', '$efek1', '$kriteria1')")){
	header("Location: parameter1.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
