<?php

include "../koneksi.php";


$sql ="SELECT * FROM kuantitatif WHERE kode_kuantitatif='HRSG12' ORDER BY tanggal_selesai DESC ";
$result=mysqli_query($konek,$sql);


while($rows = mysqli_fetch_array($result)){
    $result1[]=$rows;
   
}

 

echo '<pre>' ;
 var_dump($result1[0][2]); 
echo '</pre>';
echo '<pre>' ;
 var_dump($result1[1][3]); 
echo '</pre>';
echo '<pre>' ;
 var_dump($result1[2][2]); 
echo '</pre>';

$starttimestamp = strtotime($result1[0][2]);
$endtimestamp = strtotime($result1[1][3]);
$difference = abs($endtimestamp - $starttimestamp)/3600;
echo $difference;

?>






