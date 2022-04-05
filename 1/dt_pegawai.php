				<thead>
					<tr>
						<th>NIP</th>
						<th>Nama</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Telpon</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr> 
				</thead>
				<tbody>
					<?php
						$querypegawai = mysqli_query ($konek, "SELECT NIP, Nama_Pegawai, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y') as Tanggal_Lahir, JK, No_Telp, Alamat FROM pegawai");
						if($querypegawai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($pegawai = mysqli_fetch_array ($querypegawai)){
							
							echo "
								<tr>
									<td>$pegawai[NIP]</td>
									<td>$pegawai[Nama_Pegawai]</td>
									<td>$pegawai[Tanggal_Lahir]</td>
									<td>
								";
									if($pegawai["JK"] == "L"){
										echo "Laki - laki";
									}
									else{
										echo "Perempuan";
									}
							echo "
									</td>
									<td>$pegawai[No_Telp]</td>
									<td>$pegawai[Alamat]</td>
									<td>
										<a href='#' class='open_modal' id='$pegawai[NIP]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"pegawai_delete.php?NIP=$pegawai[NIP]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>