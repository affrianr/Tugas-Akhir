				<thead>
					<tr>
						<th>Rating</th>
						<th>Detection</th>
						<th>Criteria: Likelihood of Detection by Process Control</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryparameter3 = mysqli_query ($konek, "SELECT * FROM parameter3");
						if($queryparameter3 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($parameter3 = mysqli_fetch_array ($queryparameter3)){
							
							echo "
								<tr>
									<td>$parameter3[rating3]</td>
									<td>$parameter3[efek3]</td>
									<td>$parameter3[kriteria3]</td>
									<td>
										<a href='#' class='open_modal' id='$parameter3[rating3]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"parameter3_delete.php?rating3=$parameter3[rating3]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>