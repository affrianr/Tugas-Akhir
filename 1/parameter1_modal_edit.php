<?php

include "../koneksi.php";

$rating1	= $_GET["rating1"];

$queryparameter1 = mysqli_query($konek, "SELECT * FROM parameter1 WHERE rating1='$rating1'");
if($queryparameter1 == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($parameter1 = mysqli_fetch_array($queryparameter1)){

?>
	
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lahir2').daterangepicker({
			  singleDatePicker: true,
			  showDropdowns: true,
			  format: 'YYYY-MM-DD'
		  });
      });
    </script>
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit parameter1</h4>
					</div>
					<div class="modal-body">
						<form action="parameter1_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Rating</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="rating1" type="text" class="form-control" value="<?php echo $parameter1["rating1"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Effect</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="efek1" type="text" class="form-control" value="<?php echo $parameter1["efek1"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label for="crt">Criteria: Severity of Effect</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<textarea id='crt' rows='3' type="text" name="kriteria1" class="form-control"> <?php echo $parameter1["kriteria1"]; ?></textarea>
										<!-- <input name="kriteria1" type="text" class="form-control" value="<?php echo $parameter1["kriteria1"]; ?>"/> -->
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