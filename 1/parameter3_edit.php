<?php

include "../koneksi.php";

$rating3	= $_POST["rating3"];
$efek3		= $_POST["efek3"];
$kriteria3 	= $_POST["kriteria3"];

if($edit = mysqli_query($konek, "UPDATE parameter3 SET efek3='$efek3', kriteria3='$kriteria3' WHERE rating3='$rating3'")){
	header("Location: parameter3.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>