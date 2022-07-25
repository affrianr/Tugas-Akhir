
<?php
use MathPHP\Functions\Special;

// use LDAP\Result;

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
					<li><a href="kerusakan.php"><i class="fa fa-gear"></i><span>Kerusakan</span>
					<li class="active"><a href="kuantitatif.php"><i class="fa fa-gear"></i><span>Data Kuantitatif</span>
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
            Data Kuantitatif
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-calendar"></i>Data Kuantitatif</li>
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
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalHitung" data-toggle="modal"><i class="fa fa-plus"></i> Calculate</button></a>
				<a href="webpage_weibull.php"><button class="btn btn-success" type="button" data-toggle="modal"><i class="fa fa-plus"></i> Visualization Tools</button></a>
                  <br></br>
                  
				  <table class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_kuantitatif.php";
						?>
            
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
        <section class="content">
          <div class="row">
            <div class="col-sm-3 py-5">
              <div class="box">
			  <form method='post'>
    <label>Normal</label>
      
     <input type='text' name='ave'class="form-control" placeholder="Location">
     <input type='text' name='stdev'class="form-control" placeholder="Shape">
     <input type='text' name='x' class="form-control" placeholder="Time">
     <input type='submit' name='calculate1' value="sub">
     
    

</form>
<?php
                                if(isset($_POST['calculate1'])){
                                  
                                    $ave=$_POST['ave'];
                                    $stdev=$_POST['stdev'];
                                 	$x=$_POST['x'];
                                {
                                     $reliabilityn = (1 - (round(stats_cdf_normal($x, $ave, $stdev, 1), 6)));
                                    /* echo "Result: ". $reliabilityw; */
									$failureraten =  round(((stats_dens_normal($x, $ave, $stdev))/$reliabilityn), 6);
                  $mttf1 =  $ave;
                                 }

                                   } 
                                ?>
                </br>
                Reliability<input type="text" value="<?php echo $reliabilityn; ?>" class="form-control"></br>
                Failure Rate<input type="text" value="<?php echo $failureraten; ?>" class="form-control"></br>
                MTTF<input type="text" value="<?php echo $mttf1; ?>" class="form-control">


                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

			<div class="col-sm-3 py-5">
              <div class="box">
			  <form method='post'>
          <label>Weibull 2 Parameter</label>
     <input type='text' name='shape'class="form-control" placeholder="Shape">
     <input type='text' name='scale'class="form-control" placeholder="Scale">
     <input type='text' name='time' class="form-control" placeholder="Time">
     <input type='submit' name='calculate'>
     
    

</form>

<?php
                                if(isset($_POST['calculate'])){
                                 
                                    $shape=$_POST['shape'];
                                    $scale=$_POST['scale'];
                                 	  $time=$_POST['time'];
                                    
                                 {
                                 
                                  $Γ = Special::gamma(1+(1/$shape));
                                     $reliabilityw = exp((-1*pow($time/$scale,$shape)));
                                    /* echo "Result: ". $reliabilityw; */
                                     $failureratew = ($shape/$scale)*pow(($time/$scale),($shape-1));
                                    
                                    $mttf2 =  ($scale*Special::gamma($Γ));
                                
                                                                 }

                                   } 
                                ?>
                                </br>
Reliability<input type="text" value="<?php echo $reliabilityw; ?>" class="form-control"></br>
Failure Rate<input type="text" value="<?php echo $failureratew; ?>" class="form-control"></br>
MTTF<input type="text" value="<?php echo $mttf2; ?>" class="form-control">

                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-sm-3 py-5">
              <div class="box">
			  <form method='post'>
    <label>Lognormal</label>
      
     <input type='text' name='ave2'class="form-control" placeholder="Location">
     <input type='text' name='stdev2'class="form-control" placeholder="Shape">
     <input type='text' name='x2' class="form-control" placeholder="Time">
     <input type='submit' name='calculate3'>
     
    

</form>
<?php
                                if(isset($_POST['calculate3'])){
                                
                                    $ave2=$_POST['ave2'];
                                    $stdev2=$_POST['stdev2'];
                                 	$x2=$_POST['x2'];
                                 {
                                     $reliabilityl = (1 - (round(stats_cdf_normal(log($x2), $ave2, $stdev2, 1), 6)));
                                    /* echo "Result: ". $reliabilityw; */
									$failureratel =  round(((stats_dens_normal(log($x2), $ave2, $stdev2))/$reliabilityl), 6);
                  $mttf3 = exp($ave2+($stdev2^2)/2);
                                 }

                                   } 
                                ?>
                                </br>
Reliability<input type="text" value="<?php echo $reliabilityl; ?>" class="form-control"></br>
Failure Rate<input type="text" value="<?php echo $failureratel; ?>" class="form-control"></br>
MTTF<input type="text" value="<?php echo $mttf3; ?>" class="form-control"></br>

                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-sm-3 py-5">
              <div class="box">
			  <form method='post'>
    <label>Eksponensial</label>
      
     <input type='text' name='lambda'class="form-control" placeholder="Rate">
     <input type='text' name='x3' class="form-control" placeholder="Time">
     <input type='submit' name='calculate4'>
     
    

</form>
<?php
                                if(isset($_POST['calculate4'])){
                                
                                  $lambda=$_POST['lambda'];
                                 	$x3=$_POST['x3'];
                                 {
                                     $reliabilitye = exp((-$lambda)*$x3);
                                    /* echo "Result: ". $reliabilityw; */
									$failureratel =  $lambda;
                  $mttf4 = 1/$lambda;
                                 }

                                   } 
                                ?>
                                </br>
Reliability<input type="text" value="<?php echo $reliabilityl; ?>" class="form-control"></br>
Failure Rate<input type="text" value="<?php echo $failureratel; ?>" class="form-control"></br>
MTTF<input type="text" value="<?php echo $mttf4; ?>" class="form-control"></br>

                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </section><!-- /.content -->
          </div><!-- /.row -->

        
        
    </div><!-- /.content-wrapper -->
		<!-- Modal Popup pegawai -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Kuantitatif</h4>
					</div>
					<div class="modal-body">
						<form action="kuantitatif_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_kuantitatif" class="form-control">
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
								<label>Tanggal Rusak</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input row='1' name="tanggal_rusak" type="datetime-local" class="form-control" placeholder="Tanggal Rusak"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Perbaikan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input row='1' name="tanggal_selesai" type="datetime-local" class="form-control" placeholder="Tanggal Selesai"></input>
									</div>
							</div>
							
							<div class="modal-footer">
							
							
								<button class="btn btn-success" type="submit" name="add">
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
		<div id="ModalEditKuantitatif" class="modal fade" tabindex="1" role="dialog"></div>
		
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