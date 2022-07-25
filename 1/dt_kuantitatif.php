
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
					  <input type="submit" name="pilih" placeholder="Pilih">
            <a href="./">Refresh</a>
        </form>
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

								$query = "CREATE TABLE temp1 SELECT nilai_ttf from kuantitatif WHERE kode_kuantitatif='$kode_kuantitatif' ORDER BY tanggal_selesai DESC";
								$execute = mysqli_query($konek, $query); // here execute your SQL QUERY.
								$query2 = "select nilai_ttf from temp1";
								$result = mysqli_query($konek, $query2);
								
							$command = escapeshellcmd('C:\xampp\htdocs\TA-MMS\coba.py'); 
                      		$output = shell_exec($command);
                      		echo $output;
                 		 
								while($row = mysqli_fetch_array($result)) {
									
									echo $row['nilai_ttf'];
									echo "</br>";
								}

								$no=0;
								while ($kuantitatif = mysqli_fetch_array($querykuantitatif)) {
									$result1[]=$kuantitatif;
									$no++;
									
									
									echo "
									<tr>
				
										<td>$kuantitatif[kode_kuantitatif]</td>
										<td>$kuantitatif[tanggal_rusak]</td>
										<td>$kuantitatif[tanggal_selesai]</td>
										<td>$kuantitatif[nilai_ttf]</td>
										<td>
										<a href='#' class='open_modal' id='$kuantitatif[Id_kuantitatif]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"kuantitatif_delete.php?Id_kuantitatif=$kuantitatif[Id_kuantitatif]\")'>Delete</a> 
										</td>
									</tr>";
								
								}
							}
							
								?>
								
							</tbody>
						