
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#data").dataTable({
			scrollX: true
		});		
      });
    </script>

	<script>
		$(function () {	
		// Daterange Picker
		$('#Tanggal').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#data1").dataTable({
			scrollX: true
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
	
	<!-- Javascript Edit--> 
	<script type="text/javascript">
		$(document).ready(function () {
		
		// Pegawai
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "pegawai_modal_edit.php",
					type: "GET",
					data : {NIP: m,},
					success: function (ajaxData){
					$("#ModalEditPegawai").html(ajaxData);
					$("#ModalEditPegawai").modal('show',{backdrop: 'true'});
					}
				});
			});
		
		// kerusakan
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "kerusakan_modal_edit.php",
					type: "GET",
					data : {Id_kerusakan: m,},
					success: function (ajaxData){
					$("#ModalEditKerusakan").html(ajaxData);
					$("#ModalEditKerusakan").modal('show',{backdrop: 'true'});
					}
				});
			});
		// kuantitatif
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "kuantitatif_modal_edit.php",
					type: "GET",
					data : {Id_kuantitatif: m,},
					success: function (ajaxData){
					$("#ModalEditKuantitati").html(ajaxData);
					$("#ModalEditKuantitati").modal('show',{backdrop: 'true'});
					}
				});
			});
				
		// Komponen
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "komponen_modal_edit.php",
					type: "GET",
					data : {Kode_Komponen: m,},
					success: function (ajaxData){
					$("#ModalEditKomponen").html(ajaxData);
					$("#ModalEditKomponen").modal('show',{backdrop: 'true'});
					}
				});
			});

		// Parameter Severity 1
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "parameter1_modal_edit.php",
					type: "GET",
					data : {rating1: m,},
					success: function (ajaxData){
					$("#ModalEditParameter1").html(ajaxData);
					$("#ModalEditParameter1").modal('show',{backdrop: 'true'});
					}
				});
			});
			
		// Parameter Occurance
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "parameter2_modal_edit.php",
					type: "GET",
					data : {rating2: m,},
					success: function (ajaxData){
					$("#ModalEditParameter2").html(ajaxData);
					$("#ModalEditParameter2").modal('show',{backdrop: 'true'});
					}
				});
			});
			
		// Parameter Detection
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "parameter3_modal_edit.php",
					type: "GET",
					data : {rating3: m,},
					success: function (ajaxData){
					$("#ModalEditParameter3").html(ajaxData);
					$("#ModalEditParameter3").modal('show',{backdrop: 'true'});
					}
				});
			});
			
		// Jadwal
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "jadwal_modal_edit.php",
					type: "GET",
					data : {Id_Jadwal: m,},
					success: function (ajaxData){
					$("#ModalEditJadwal").html(ajaxData);
					$("#ModalEditJadwal").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>