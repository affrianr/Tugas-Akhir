<?php

include "../koneksi.php";

$rating3	= $_GET["rating3"];
$efek3		= $_GET["efek3"];
$kriteria3	= $_GET["kriteria3"];

if($delete = mysqli_query($konek, "DELETE FROM parameter3 WHERE rating3='$rating3', efek3='$efek3', kriteria3='$kriteria3' ")){
	header("Location: parameter3.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>