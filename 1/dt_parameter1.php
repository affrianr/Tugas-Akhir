				<thead>
					<tr>
						<th>Rating</th>
						<th>Effect</th>
						<th>Criteria: Severity of Effect</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryparameter1 = mysqli_query ($konek, "SELECT * FROM parameter1");
						if($queryparameter1 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($parameter1 = mysqli_fetch_array ($queryparameter1)){
							
							echo "
								<tr>
									<td>$parameter1[rating1]</td>
									<td>$parameter1[efek1]</td>
									<td>$parameter1[kriteria1]</td>
									<td>
										<a href='#' class='open_modal' id='$parameter1[rating1]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"parameter1_delete.php?rating1=$parameter1[rating1]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>