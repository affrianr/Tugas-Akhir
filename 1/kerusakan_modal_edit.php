<?php

include "../koneksi.php";

$Id_kerusakan	= $_GET["Id_kerusakan"];


$querykerusakan = mysqli_query($konek, "SELECT * FROM kerusakan WHERE Id_kerusakan='$Id_kerusakan'");

	if($querykerusakan == false){
		die ("Terjadi Kesalahan : ". mysqli_error($konek));
	}
	while($kerusakan = mysqli_fetch_array($querykerusakan)){

?>
	<link rel="stylesheet" href="../aset/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#tanggal').daterangepicker({
			  singleDatePicker: true,
			  showDropdowns: true,
			  format: 'YYYY-MM-DD'
		  });
      });
    </script>
	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>
<!-- Modal Popup komponen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit kerusakan</h4>
					</div>
					<div class="modal-body">
						<form action="kerusakan_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="Id_kerusakan" type="hidden" value="<?php echo "$kerusakan[Id_kerusakan]"; ?>">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_komponen_rusak" class="form-control">
										<?php
											
											$querykrsk = mysqli_query($konek, "SELECT kode_komponen_rusak, Kode_Komponen, Nama_Komponen FROM kerusakan INNER JOIN komponen ON kode_komponen_rusak = Kode_Komponen WHERE Id_kerusakan='$Id_kerusakan'");
											if ($querykrsk == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($krsk = mysqli_fetch_array($querykrsk)){
												echo "<option value='$krsk[kode_komponen_rusak]' selected>$krsk[Nama_Komponen]</option>";
											}
											
											$querykomponen = mysqli_query($konek, "SELECT * FROM komponen");
											if($querykomponen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($komponen = mysqli_fetch_array($querykomponen)){
												if($komponen["Kode_Komponen"] != $kerusakan["kode_komponen_rusak"])
												{
													echo "<option value='$komponen[Kode_Komponen]'>$komponen[Nama_Komponen]</option>";
												}
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<!-- <input name="keterangan_kerusakan" type="text" class="form-control" value="<?php echo $kerusakan["keterangan_kerusakan"]; ?>"/> -->
										<textarea id='ktr' row='3' name="keterangan_kerusakan" type="text" class="form-control"><?php echo $kerusakan["keterangan_kerusakan"]; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-columns"></i>
										</div>
										<input name="tanggal_kerusakan" type="text" class="form-control" value="<?php echo $kerusakan["tanggal_kerusakan"]; ?>" />
									</div>
							</div>
							<div class="form-group">
								<label>Jam</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="jam" type="text" class="form-control" value="<?php echo $kerusakan["jam"]; ?>" />
									</div>
							</div>
							<div class="form-group">
								<label>Teknisi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="pegawai_bertugas" class="form-control">
										<?php
											
											$queryteknisi = mysqli_query($konek, "SELECT pegawai_bertugas, NIP, Nama_Pegawai FROM kerusakan INNER JOIN pegawai ON pegawai_bertugas=NIP WHERE Id_kerusakan='$Id_kerusakan'");
											if ($queryteknisi == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($teknisi = mysqli_fetch_array($queryteknisi)){
												echo "<option value='$teknisi[pegawai_bertugas]' selected>$teknisi[Nama_Pegawai]</option>";
											}
											$querypegawai = mysqli_query($konek, "SELECT * FROM pegawai");
											if($querypegawai == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($pegawai = mysqli_fetch_array($querypegawai)){
												if($pegawai["NIP"] != $kerusakan["pegawai_bertugas"])
												{
													echo "<option value='$pegawai[NIP]'>$pegawai[Nama_Pegawai]</option>";
												}
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Severity</label>
								<div class="input-group">
									<div class="input-group-addon">
									<i class="fa fa-book"></i>
									</div>
									
									
									<select name="severity" class="form-control">
									<?php
											$querysvrty = mysqli_query($konek, "SELECT severity, rating1 FROM kerusakan INNER JOIN parameter1 ON severity=rating1 WHERE Id_kerusakan='$Id_kerusakan'");
											if($querysvrty == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($svrty = mysqli_fetch_array($querysvrty)){
												echo "<option value='$svrty[severity]' selected>$svrty[rating1]</option>";
											}
											
											$queryparameter1 = mysqli_query ($konek, "SELECT * FROM parameter1");
											if ($queryparameter1 == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($parameter1 = mysqli_fetch_array($queryparameter1)){
												if($parameter1["rating1"] != $kerusakan["severity"]){
													echo "<option value='$parameter1[rating1]'>$parameter1[rating1]</option>";
												}
											}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label>Occurance</label>
								<div class="input-group">
									<div class="input-group-addon">
									<i class="fa fa-book"></i>
									</div>
									<select name="occurance" class="form-control">
									<?php
											$queryoccrnc = mysqli_query($konek, "SELECT occurance, rating2 FROM kerusakan INNER JOIN parameter2 ON occurance=rating2 WHERE Id_kerusakan='$Id_kerusakan'");
											if($queryoccrnc == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($occrnc = mysqli_fetch_array($queryoccrnc)){
												echo "<option value='$occrnc[occurance]' selected>$occrnc[rating2]</option>";
											}
											
											$queryparameter2 = mysqli_query ($konek, "SELECT * FROM parameter2");
											if ($queryparameter2 == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($parameter2 = mysqli_fetch_array($queryparameter2)){
												if($parameter2["rating2"] != $kerusakan["occurance"]){
													echo "<option value='$parameter2[rating2]'>$parameter2[rating2]</option>";
												}
											}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label>Detection</label>
								<div class="input-group">
									<div class="input-group-addon">
									<i class="fa fa-book"></i>
									</div>
									<select name="detection" class="form-control">
									<?php
											$querydtctn = mysqli_query($konek, "SELECT detection, rating3 FROM kerusakan INNER JOIN parameter3 ON detection=rating3 WHERE Id_kerusakan='$Id_kerusakan'");
											if($querydtctn == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($dtctn = mysqli_fetch_array($querydtctn)){
												echo "<option value='$dtctn[detection]' selected>$dtctn[rating3]</option>";
											}
											
											$queryparameter3 = mysqli_query ($konek, "SELECT * FROM parameter3");
											if ($queryparameter3 == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($parameter3 = mysqli_fetch_array($queryparameter2)){
												if($parameter3["rating3"] != $kerusakan["detection"]){
													echo "<option value='$parameter3[rating3]'>$parameter3[rating3]</option>";
												}
											}
									?>
									</select>
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