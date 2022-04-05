<?php

include "../koneksi.php";

$Id_kuantitatif	= $_GET["Id_kuantitatif"];

if($delete = mysqli_query($konek, "DELETE FROM kuantitatif WHERE Id_kuantitatif='$Id_kuantitatif'")){
	header("Location: kuantitatif.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>