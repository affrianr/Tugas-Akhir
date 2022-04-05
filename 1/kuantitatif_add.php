<?php

include "../koneksi.php";

$Id_kuantitatif			= $_POST["Id_kuantitatif"];
$kode_kuantitatif		= $_POST["kode_kuantitatif"];
$shape					= $_POST["shape"];
$scale					= $_POST["scale"];
$timew					= $_POST["timew"];
$reliabilityw			= $_POST["reliabilityw"];
$failureratew			= $_POST["failureratew"];

if($add = mysqli_query($konek, "INSERT INTO kuantitatif(kode_kuantitatif, shape, scale, timew, reliabilityw, failureratew) VALUES ('$kode_kuantitatif', '$shape', '$scale', 'timew', '$reliabilityw', '$failureratew')")){
	header("Location: kuantitatif.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>