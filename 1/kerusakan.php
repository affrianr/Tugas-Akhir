<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Maintenance Management System | Admin</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li class="active"><a href="kerusakan.php"><i class="fa fa-gear"></i><span>Kerusakan</span></a></li>
					<li><a href="kuantitatif.php"><i class="fa fa-gear"></i><span>Data Kuantitatif</span></a></li>
			        <li><a href="komponen.php"><i class="fa fa-columns"></i><span>Komponen</span></a></li>
			        <li><a href="parameter1.php"><i class="fa fa-columns"></i><span>Severity</span></a></li>
					<li><a href="parameter2.php"><i class="fa fa-columns"></i><span>Occurance</span></a></li>
					<li><a href="parameter3.php"><i class="fa fa-columns"></i><span>Detection</span></a></li>
					<li><a href="pegawai.php"><i class="fa fa-user"></i><span>Pegawai</span></a></li>
					<li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kerusakan
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-calendar"></i>Kerusakan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
                  <br></br>
				  
				  <table id="data1" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_kerusakan.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup pegawai -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Kerusakan</h4>
					</div>
					<div class="modal-body">
						<form action="kerusakan_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_komponen_rusak" class="form-control">
										<?php
											
											$querykomponen = mysqli_query($konek, "SELECT * FROM komponen");
											if($querykomponen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($komponen = mysqli_fetch_array($querykomponen)){
												echo "<option value='$komponen[Kode_Komponen]'>$komponen[Nama_Komponen]</option>";
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
										<textarea id='"keterangan' row='3' name="keterangan_kerusakan" type="text" class="form-control" placeholder="Keterangan"></textarea>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal" name="tanggal_kerusakan" type="text" class="form-control">
									</div>
							</div>
							<div class="form-group">
							<label>Jam</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input id="Jam" name="jam" type="text" class="form-control" placeholder="Jam">
									</div>
							</div>
							
							<div class="form-group">
								<label>Teknisi</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="pegawai_bertugas" class="form-control">
											<?php
											$querypegawai = mysqli_query($konek, "SELECT * FROM pegawai");
											if ($querypegawai == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($pegawai = mysqli_fetch_array($querypegawai)){
												echo "<option value='$pegawai[NIP]'>$pegawai[Nama_Pegawai]</option>";
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
								$queryparameter1 = mysqli_query($konek, "SELECT * FROM parameter1");
												if($queryparameter1 == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($parameter1 = mysqli_fetch_array($queryparameter1)){
													echo "<option value='$parameter1[rating1]'>$parameter1[rating1]</option>";
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
								$queryparameter2 = mysqli_query($konek, "SELECT * FROM parameter2");
												if($queryparameter2 == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($parameter2 = mysqli_fetch_array($queryparameter2)){
													echo "<option value='$parameter2[rating2]'>$parameter2[rating2]</option>";
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
								$queryparameter3 = mysqli_query($konek, "SELECT * FROM parameter3");
												if($queryparameter3 == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($parameter3 = mysqli_fetch_array($queryparameter3)){
													echo "<option value='$parameter3[rating3]'>$parameter3[rating3]</option>";
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
		</div>
		
		<!-- Modal Popup pegawai Edit -->
		<div id="ModalEditKerusakan" class="modal fade" tabindex="-1" role="dialog"></div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
   
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
