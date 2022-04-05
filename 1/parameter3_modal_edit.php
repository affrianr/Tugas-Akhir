<?php

include "../koneksi.php";

$rating3	= $_GET["rating3"];

$queryparameter3 = mysqli_query($konek, "SELECT * FROM parameter3 WHERE rating3='$rating3'");
if($queryparameter3 == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($parameter3 = mysqli_fetch_array($queryparameter3)){

?>
	
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lahir3').daterangepicker({
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
						<h4 class="modal-title">Edit parameter</h4>
					</div>
					<div class="modal-body">
						<form action="parameter3_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Rating</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="rating3" type="text" class="form-control" value="<?php echo $parameter3["rating3"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Effect</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="efek3" type="text" class="form-control" value="<?php echo $parameter3["efek3"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Criteria: Likelihood of Detection by Process Control</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<!-- <input name="kriteria3" type="text" class="form-control" value="<?php echo $parameter3["kriteria3"]; ?>"/> -->
										<textarea id='crt3' row='3' type="text" name="kriteria3" class="form-control"><?php echo $parameter3["kriteria3"]; ?></textarea>
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