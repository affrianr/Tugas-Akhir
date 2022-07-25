<?php
include "../koneksi.php";
?>
<html>
    <head>
        <title>Cara Menampilkan Data Berdasarkan Dropdown Select PHP MySQLi</title>
    </head>
    <body>
        <h3>Menampilkan Data Berdasarkan Dropdown Select Ke Daftar Tabel</h3>

	<form method="POST">
                    <select name="kode_kuantitatif" id="kode_kuantitatif">
                      <option disabled selected> Pilih Komponen </option>
                    <?php 
                      // $sql=mysqli_query("SELECT * FROM kuantitatif");
                      $query   = mysqli_query($konek, "SELECT * FROM kuantitatif GROUP BY kode_kuantitatif ORDER BY kode_kuantitatif");
                      while ($data=mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?=$data['kode_kuantitatif']?>"><?=$data['kode_kuantitatif']?></option> 
                    <?php
                      }
                    ?>
                      </select>
					  <input type="submit" name="submit" value="Pilih">
            <a href="./">Refresh</a>
        </form>
		<table border="1" cellpadding="2">
				<thead>
					<tr>
						<th>Komponen</th>
						<th>Tanggal Kerusakan Komponen</th>
						<th>Tanggal Komponen Telah Diperbaiki</th>
						<th>Nilai TTF</th>		
					</tr>
				</thead>
				<tbody>
				<?php
				            if (isset($_POST['kode_kuantitatif'])) {
								$kode_kuantitatif=trim($_POST['kode_kuantitatif']);
								
								//menampilkan pegawai berdasarkan unit kerja yang dipilih pada combobox
								$querykuantitatif=mysqli_query($konek, "SELECT * FROM kuantitatif WHERE kode_kuantitatif='$kode_kuantitatif' ORDER BY tanggal_selesai DESC");
							
								$no=0;
								while ($kuantitatif = mysqli_fetch_array($querykuantitatif)) {
								$no++;
								?>
								<tbody>
									<tr>
										
										<td><?php echo $kuantitatif['kode_kuantitatif'];?></td>
										<td><?php echo $kuantitatif['tanggal_rusak'];?></td>
										<td><?php echo $kuantitatif['tanggal_selesai'];?></td>
										<td><?php echo $kuantitatif['nilai_ttf'];?></td>
									</tr>
								</tbody>
								<?php
									}
								}
								?>
								</table>

</body>
</html>
