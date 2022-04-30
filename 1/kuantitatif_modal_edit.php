<?php

include "../koneksi.php";

$Id_kuantitatif	= $_GET["Id_kuantitatif"];


$querykuantitatif = mysqli_query($konek, "SELECT * FROM kuantitatif WHERE Id_kuantitatif='$Id_kuantitatif'");

	if($querykuantitatif == false){
		die ("Terjadi Kesalahan : ". mysqli_error($konek));
	}
	while($kuantitatif = mysqli_fetch_array($querykuantitatif)){

?>

<!-- Modal Popup komponen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit kuantitatif</h4>
					</div>
					<div class="modal-body">
						<form action="kuantitatif_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="Id_kuantitatif" type="hidden" value="<?php echo "$kuantitatif[Id_kuantitatif]"; ?>">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_kuantitatif" class="form-control">
										<?php
											
											$querykntttf = mysqli_query($konek, "SELECT kode_kuantitatif, Kode_Komponen, Nama_Komponen FROM kuantitatif INNER JOIN komponen ON kode_kuantitatif = Kode_Komponen WHERE Id_kuantitatif = '$Id_kuantitatif'");
											if ($querykntttf == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($kntttf = mysqli_fetch_array($querykntttf)){
												echo "<option value='$kntttf[kode_kuantitatif]' selected>$kntttf[Nama_Komponen]</option>";
											}
											
											$querykomponen = mysqli_query($konek, "SELECT * FROM komponen");
											if($querykomponen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($komponen = mysqli_fetch_array($querykomponen)){
												if($komponen["Kode_Komponen"] != $kuantitatif["kode_kuantitatif"])
												{
													echo "<option value='$komponen[Kode_Komponen]'>$komponen[Nama_Komponen]</option>";
												}
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Shape</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										
										<textarea id='shp' row='1' name="shape" type="edit" class="form-control"><?php echo $kuantitatif["shape"]; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label>Scale</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
									
										<textarea id='scl' row='1' name="scale" type="float" class="form-control"><?php echo $kuantitatif["scale"]; ?></textarea>
									</div>
							</div>
							
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>