
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
	
	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai').datetimepicker({
				format: 'HH:mm'
			});
			
			$('#Jam_Selesai').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>
	
	<!-- Javascript Edit--> 
	<script type="text/javascript">
		$(document).ready(function () {
			
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
		
		// Nilai
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "nilai_modal_edit.php",
					type: "GET",
					data : {Id_Nilai: m,},
					success: function (ajaxData){
					$("#ModalEditNilai").html(ajaxData);
					$("#ModalEditNilai").modal('show',{backdrop: 'true'});
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