<?php

include "../koneksi.php";

$Id_Jadwal	= $_GET["Id_Jadwal"];

$daftarhari[] = "Senin";
$daftarhari[] = "Selasa";
$daftarhari[] = "Rabu";
$daftarhari[] = "Kamis";
$daftarhari[] = "Jumat";
$daftarhari[] = "Sabtu";
$daftarhari[] = "Minggu";

$queryjadwal = mysqli_query($konek, "SELECT * FROM jadwal WHERE Id_Jadwal='$Id_Jadwal'");
if($queryjadwal == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($jadwal = mysqli_fetch_array($queryjadwal)){

?>
	<link rel="stylesheet" href="../aset/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
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
	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai2').datetimepicker({
				format: 'HH:mm'
			});
			
			$('#Jam_Selesai2').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Jadwal</h4>
					</div>
					<div class="modal-body">
						<form action="jadwal_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="Id_Jadwal" type="hidden" value="<?php echo "$jadwal[Id_Jadwal]"; ?>">
							<div class="form-group">
								<label>Dosen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="NIP_Jadwal" class="form-control">
										<?php
											
											$queryjdwds = mysqli_query($konek, "SELECT NIP_Jadwal, NIP, Nama_Dosen FROM jadwal INNER JOIN dosen ON NIP_Jadwal=NIP WHERE Id_Jadwal='$Id_Jadwal'");
											if ($queryjdwds == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($jdwds = mysqli_fetch_array($queryjdwds)){
												echo "<option value='$jdwds[NIP_Jadwal]' selected>$jdwds[Nama_Dosen]</option>";
											}
											
											$querydosen = mysqli_query($konek, "SELECT * FROM dosen");
											if($querydosen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($dosen = mysqli_fetch_array($querydosen)){
												if($dosen["NIP"] != $jadwal["NIP_Jadwal"])
												{
													echo "<option value='$dosen[NIP]'>$dosen[Nama_Dosen]</option>";
												}
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Kode_Matakuliah_Jadwal" class="form-control">
											<?php
												
												$queryjdwmk = mysqli_query($konek, "SELECT Kode_Matakuliah_Jadwal, Kode_Matakuliah, Nama_Matakuliah FROM jadwal INNER JOIN matakuliah ON Kode_Matakuliah_Jadwal=Kode_Matakuliah WHERE Id_Jadwal='$Id_Jadwal'");
												if($queryjdwmk == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($jdwmk = mysqli_fetch_array($queryjdwmk)){
													echo "<option value='$jdwmk[Kode_Matakuliah_Jadwal]'>$jdwmk[Nama_Matakuliah]</option>";
												}
												
												$querymtk = mysqli_query ($konek, "SELECT * FROM matakuliah");
												if ($querymtk == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($mtk = mysqli_fetch_array($querymtk)){
													if($mtk["Kode_Matakuliah"] != $jadwal["Kode_Matakuliah_Jadwal"]){
														echo "<option value='$mtk[Kode_Matakuliah]'>$mtk[Nama_Matakuliah]</option>";
													}
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Ruangan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-columns"></i>
										</div>
										<select name="Kode_Ruangan_Jadwal" class="form-control">
											<?php
											
												$queryjdwru = mysqli_query($konek, "SELECT Kode_Ruangan_Jadwal, Kode_Ruangan, Nama_Ruangan FROM jadwal INNER JOIN ruangan ON Kode_Ruangan_Jadwal=Kode_Ruangan WHERE Id_Jadwal='$Id_Jadwal'");
												if($queryjdwru == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($jdwru = mysqli_fetch_array($queryjdwru))
												{
													echo "<option value='$jdwru[Kode_Ruangan_Jadwal]' selected>$jdwru[Nama_Ruangan]</option>";
												}
												
												$queryruang = mysqli_query($konek, "SELECT * FROM ruangan");
												if($queryruang == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($ruang = mysqli_fetch_array($queryruang)){
													if($ruang["Kode_Ruangan"] != $jadwal["Kode_Ruangan_Jadwal"]){
														echo "<option value='$ruang[Kode_Ruangan]'>$ruang[Nama_Ruangan]</option>";
													}
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Jurusan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<select name="Kode_Jurusan_Jadwal" class="form-control">
											<?php
											
												$queryjdwjrs = mysqli_query($konek, "SELECT Kode_Jurusan_Jadwal, Kode_Jurusan, Nama_Jurusan FROM jadwal INNER JOIN jurusan ON Kode_Jurusan_Jadwal=Kode_Jurusan WHERE Id_Jadwal='$Id_Jadwal'");
												if($queryjdwjrs == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($jdwjrs = mysqli_fetch_array($queryjdwjrs))
												{
													echo "<option value='$jdwjrs[Kode_Jurusan_Jadwal]' selected>$jdwjrs[Nama_Jurusan]</option>";
												}
												
												$queryjurusan = mysqli_query($konek, "SELECT * FROM jurusan");
												if($queryjurusan == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while ($jurusan = mysqli_fetch_array($queryjurusan)){
													if($jurusan["Kode_Jurusan"] != $jadwal["Kode_Jurusan_Jadwal"]){
														echo "<option value='$jurusan[Kode_Jurusan]'>$jurusan[Nama_Jurusan]</option>";
													}
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Hari</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Hari" class="form-control">
										<?php
											echo "<option value='$jadwal[Hari]' selected>$jadwal[Hari]</option>";
											for($hari=0; $hari<count($daftarhari); $hari++){
												if($jadwal["Hari"] != $daftarhari[$hari])
												{
													echo "<option value='$daftarhari[$hari]'>$daftarhari[$hari]</option>";
												}
												
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Jam Mulai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input id="Jam_Mulai2" name="Jam_Mulai" type="text" class="form-control" value="<?php echo substr($jadwal["Jam"],0,5); ?>">
									</div>
							</div>
							<div class="form-group">
								<label>Jam Selesai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input id="Jam_Selesai2" name="Jam_Selesai" type="text" class="form-control" value="<?php echo substr($jadwal["Jam"],-5); ?>">
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