<?php
if(isset($_POST['kode_kuantitatif']) && isset($_POST['submit'])){
    $kuantitatifid= $_POST['kode_kuantitatif'];
    $query ="SELECT komponen,kode_kuantitatif,tanggal_rusak,tanggal_selesai,nilai_ttf FROM kuantitatif WHERE kode_kuantitatif='$kuantitatifid'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $kuantitatif= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $kuantitatif=[];
    }
}
?>