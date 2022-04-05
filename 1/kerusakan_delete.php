<?php

include "../koneksi.php";

$Id_kerusakan	= $_GET["Id_kerusakan"];

if($delete = mysqli_query($konek, "DELETE FROM kerusakan WHERE Id_kerusakan='$Id_kerusakan'")){
	header("Location: kerusakan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>