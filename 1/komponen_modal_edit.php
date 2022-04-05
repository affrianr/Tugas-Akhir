<?php

include "../koneksi.php";

$Kode_Komponen	= $_GET["Kode_Komponen"];

$querykomponen = mysqli_query($konek, "SELECT * FROM komponen WHERE Kode_Komponen='$Kode_Komponen'");
if($querykomponen == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($Komponen = mysqli_fetch_array($querykomponen)){

?>
	
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
    
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Komponen</h4>
					</div>
					<div class="modal-body">
						<form action="komponen_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Kode Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-columns"></i>
										</div>
										<input name="Kode_Komponen" type="text" class="form-control" value="<?php echo $Komponen["Kode_Komponen"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-columns"></i>
										</div>
										<input name="Nama_Komponen" type="text" class="form-control" value="<?php echo $Komponen["Nama_Komponen"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Status</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input name="Status_Komponen" type="text" class="form-control" value="<?php echo $Komponen["Status_Komponen"]; ?>"/>
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
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