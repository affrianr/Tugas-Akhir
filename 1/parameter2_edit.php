<?php

include "../koneksi.php";

$rating2	= $_POST["rating2"];
$efek2		= $_POST["efek2"];
$kriteria2 	= $_POST["kriteria2"];

if($edit = mysqli_query($konek, "UPDATE parameter2 SET efek2='$efek2', kriteria2='$kriteria2' WHERE rating2='$rating2'")){
	header("Location: parameter2.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>