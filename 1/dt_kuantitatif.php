				<thead>
					<tr>
						<th>Komponen</th>
						<th>Shape</th>
						<th>Scale</th>
						<th>Reliability</th>
						<th>Failure Rate</th>			
					</tr>
				</thead>
				<tbody>
					<?php
						$querykuantitatif = mysqli_query ($konek, "SELECT Id_kuantitatif, kode_kuantitatif, shape, scale, reliabilityw, failureratew
							FROM kuantitatif 
							INNER JOIN komponen ON kode_kuantitatif=Kode_Komponen");
						if($querykuantitatif == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($kuantitatif = mysqli_fetch_array ($querykuantitatif)){
							
							echo "
								<tr>
									<td>$kuantitatif[kode_kuantitatif]</td>
									<td>$kuantitatif[shape]</td>
									<td>$kuantitatif[scale]</td>
									<td>$kuantitatif[reliabilityw]</td>
									<td>$kuantitatif[failureratew]</td>
									<td>
										<a href='#' class='open_modal' id='$kuantitatif[Id_kuantitatif]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"kuantitatif_delete.php?Id_kuantitatif=$kuantitatif[Id_kuantitatif]\")'>Delete</a> 
									</td>
								</tr>";
						}
					?>
				</tbody>