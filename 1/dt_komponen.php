				<thead>
					<tr>
						<th>Kode Komponen</th>
						<th>Komponen</th>
						<th>Fungsi</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querykomponen = mysqli_query ($konek, "SELECT * FROM komponen");
						if($querykomponen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($komponen = mysqli_fetch_array ($querykomponen)){
							
							echo "
								<tr>
									<td>$komponen[Kode_Komponen]</td>
									<td>$komponen[Nama_Komponen]</td>
									<td>$komponen[Fungsi_Komponen]</td>
									<td>$komponen[Status_Komponen]</td>
									<td>
										<a href='#' class='open_modal' id='$komponen[Kode_Komponen]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"Komponen_delete.php?Kode_Komponen=$komponen[Kode_Komponen]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>