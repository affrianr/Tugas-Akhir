<?php

include "../koneksi.php";

$rating2	= $_POST["rating2"];
$efek2		= $_POST["efek2"];
$kriteria2 	= $_POST["kriteria2"];

if($add = mysqli_query($konek, "INSERT INTO parameter2(rating2, efek2, kriteria2) VALUES ('$rating2', '$efek2', '$kriteria2')")){
	header("Location: parameter2.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
