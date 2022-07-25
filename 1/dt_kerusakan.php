				<thead>
					<tr>
						<th>Komponen</th>
						<th>Kerusakan</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Teknisi</th>
						<th>Severity</th>
						<th>Occurance</th>
						<th>Detection</th>
						<th>RPN</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<?php
                      $command = escapeshellcmd('C:\xampp\htdocs\TA-MMS\coba.py'); 
                      $output = shell_exec($command);
                      echo $output;
                  ?>
				<tbody>
					<?php
						$querykerusakan = mysqli_query ($konek, "SELECT Id_kerusakan, kode_komponen_rusak, keterangan_kerusakan, tanggal_kerusakan, pegawai_bertugas, jam, Nama_Pegawai, severity, occurance, detection, RPN
							FROM kerusakan 
							INNER JOIN komponen ON kode_komponen_rusak=Kode_Komponen
							INNER JOIN pegawai ON pegawai_bertugas=NIP
							INNER JOIN parameter1 ON severity=rating1
							INNER JOIN parameter2 ON occurance=rating2
							INNER JOIN parameter3 ON detection=rating3");
						if($querykerusakan == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($kerusakan = mysqli_fetch_array ($querykerusakan)){
							
							echo "
								<tr>
									<td>$kerusakan[kode_komponen_rusak]</td>
									<td>$kerusakan[keterangan_kerusakan]</td>
									<td>$kerusakan[tanggal_kerusakan]</td>
									<td>$kerusakan[jam]</td>
									<td>$kerusakan[Nama_Pegawai]</td>
									<td>$kerusakan[severity]</td>
									<td>$kerusakan[occurance]</td>
									<td>$kerusakan[detection]</td>
									<td>$kerusakan[RPN]</td>
									<td>
										<a href='#' class='open_modal' id='$kerusakan[Id_kerusakan]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"kerusakan_delete.php?Id_kerusakan=$kerusakan[Id_kerusakan]\")'>Delete</a> 
									</td>
								</tr>";
						}
					?>
					
				</tbody>
				