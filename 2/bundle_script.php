
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
	
		//Date Time Picker 
		$('#Jam_Mulai').datetimepicker({
			format: 'HH:mm'
		});

		$('#Jam_Selesai').datetimepicker({
			format: 'HH:mm'
		});
		
		//edit
		function edit_form(data, url, key, modal){
			var id = $(data).attr('id');
			var param = {};
			param[key] = id;

			$.ajax({
				url: url+".php",
				type: "GET",
				data: param,
				success: function(response){
					$(modal).html(response);
					$(modal).modal('show');
				}
			});
		} 

		//delete
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>