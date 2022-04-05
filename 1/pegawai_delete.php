<?php

include "../koneksi.php";

$NIP	= $_GET["NIP"];

if($delete = mysqli_query ($konek, "DELETE FROM pegawai WHERE NIP='$NIP'")){
	header("Location: pegawai.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>