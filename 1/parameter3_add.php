<?php

include "../koneksi.php";

$rating3	= $_POST["rating3"];
$efek3		= $_POST["efek3"];
$kriteria3 	= $_POST["kriteria3"];

if($add = mysqli_query($konek, "INSERT INTO parameter3(rating3, efek3, kriteria3) VALUES ('$rating3', '$efek3', '$kriteria3')")){
	header("Location: parameter3.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
