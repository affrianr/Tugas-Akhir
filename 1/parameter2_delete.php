<?php

include "../koneksi.php";

$rating2	= $_GET["rating2"];
$efek2		= $_GET["efek2"];
$kriteria2	= $_GET["kriteria2"];

if($delete = mysqli_query($konek, "DELETE FROM parameter2 WHERE rating2='$rating2', efek2='$efek2', kriteria2='$kriteria2' ")){
	header("Location: parameter2.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>