				<thead>
					<tr>
						<th>Rating</th>
						<th>Probability of Failure</th>
						<th>Failure Rate</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryparameter2 = mysqli_query ($konek, "SELECT * FROM parameter2");
						if($queryparameter2 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($parameter2 = mysqli_fetch_array ($queryparameter2)){
							
							echo "
								<tr>
									<td>$parameter2[rating2]</td>
									<td>$parameter2[efek2]</td>
									<td>$parameter2[kriteria2]</td>
									<td>
										<a href='#' class='open_modal' id='$parameter2[rating2]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"parameter2_delete.php?rating2=$parameter2[rating2]\")'>Delete</a>
									</td>
								</tr>";
						}
					?>
				</tbody>