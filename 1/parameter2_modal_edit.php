<?php

include "../koneksi.php";

$rating2	= $_GET["rating2"];

$queryparameter2 = mysqli_query($konek, "SELECT * FROM parameter2 WHERE rating2='$rating2'");
if($queryparameter2 == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($parameter2 = mysqli_fetch_array($queryparameter2)){

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
						<h4 class="modal-title">Edit parameter2</h4>
					</div>
					<div class="modal-body">
						<form action="parameter2_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Rating</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="rating2" type="text" class="form-control" value="<?php echo $parameter2["rating2"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Probability of Failure</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<!-- <input name="efek2" type="text" class="form-control" value="<?php echo $parameter2["efek2"]; ?>"/> -->
										<textarea id='crt2' row='3' name="efek2" type="text" class="form-control"><?php echo $parameter2["efek2"] ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label>Failure Rate</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="kriteria2" type="text" class="form-control" value="<?php echo $parameter2["kriteria2"]; ?>"/>	
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