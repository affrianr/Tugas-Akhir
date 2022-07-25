<?php



session_start();
include "../koneksi.php";
include "auth_user.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


$ave = $_POST['ave'];
$stdev = $_POST['stdev'];
$x = $_POST['x'];
echo "<h3>Input:</h3>";

   echo "Shape parameter (β): ".$ave;
   echo "<br />";
   echo "Characteristic life (η, hours): ".$stdev;
   echo "<br />";
   echo "Time period of interest (t, hours): ".$x;
   echo "<br />";
//    $ave=$_POST['ave'];
//    $stdev=$_POST['stdev'];
//     $x=$_POST['x'];
echo "<h3>Solutions:</h3>";
    $reliabilityn = (1 - (round(stats_cdf_normal($x, $ave, $stdev, 1), 6)));
   $failureraten =  round(((stats_dens_normal($x, $ave, $stdev))/$reliabilityn), 6);
echo "The reliability at ".$x. " hours is ".$reliabilityn. " and The failure rate is ".$failureraten;


?>
 <table>
  <tr>
    <th>Jam</th>
    <th>Reliability</th>
    <th>Failure Rate</th>
  </tr>
<?php  
                
          $ave=$_POST['ave'];
          $stdev=$_POST['stdev'];
         for ($x=0; $x<=100; $x=+10){
            $reliabilityn = (1 - (round(stats_cdf_normal($x, $ave, $stdev, 1), 6)));
            echo "Result: ". $reliabilityn; 
$failureraten =  round(((stats_dens_normal($x, $ave, $stdev))/$reliabilityn), 6);
echo $failureraten;
         }
            

?>
 </table>
</body>
</html>