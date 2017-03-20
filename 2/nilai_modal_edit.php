<?php

include "../koneksi.php";

$Id_Nilai	= $_GET["Id_Nilai"];

$daftarnilai[] = "A";
$daftarnilai[] = "B";
$daftarnilai[] = "C";
$daftarnilai[] = "D";

$querynilai = mysqli_query($konek, "SELECT * FROM nilai WHERE Id_Nilai='$Id_Nilai'");
if($querynilai == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($nilai = mysqli_fetch_array($querynilai)){

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
						<h4 class="modal-title">Edit Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="nilai_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input type="hidden" name="Id_Nilai" value="<?php echo $nilai["Id_Nilai"]; ?>">
							<div class="form-group">
								<label>Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-users"></i>
										</div>
										<select name="NIM_Nilai" class="form-control">
										<?php
										
											$querynilaimhs = mysqli_query($konek, "SELECT NIM_Nilai, NIM, Nama_Mahasiswa FROM nilai INNER JOIN mahasiswa ON NIM_Nilai=NIM WHERE Id_Nilai='$Id_Nilai'");
											if($querynilaimhs == false){
												die("Terdapat Kesalahan : ". mysqli_query($konek));
											}
											while($nilaimhs = mysqli_fetch_array($querynilaimhs)){
												echo "<option value='$nilaimhs[NIM_Nilai]' selected>$nilaimhs[Nama_Mahasiswa]</option>";
											}
											
											$querymhs = mysqli_query($konek, "SELECT * FROM mahasiswa");
											if($querymhs == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mhs = mysqli_fetch_array($querymhs)){
												if($mhs["NIM"] != $nilai["NIM_Nilai"]){
													echo "<option value='$mhs[NIM]'>$mhs[Nama_Mahasiswa]</option>";
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
										<select name="Kode_Matakuliah_Nilai" class="form-control">
										<?php
										
											$querynilaimtk = mysqli_query($konek, "SELECT Kode_Matakuliah_Nilai, Kode_Matakuliah, Nama_Matakuliah FROM nilai INNER JOIN matakuliah ON Kode_Matakuliah_nilai=Kode_Matakuliah WHERE Id_Nilai='$Id_Nilai'");
											if($querynilaimtk == false){
												die("Terdapat Kesalahan : ". mysqli_query($konek));
											}
											while($nilaimtk = mysqli_fetch_array($querynilaimtk)){
												echo "<option value='$nilaimtk[Kode_Matakuliah_Nilai]' selected>$nilaimtk[Nama_Matakuliah]</option>";
											}
											
											$querymtk = mysqli_query($konek, "SELECT * FROM matakuliah");
											if($querymtk == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mtk = mysqli_fetch_array($querymtk)){
												if($mtk["Kode_Matakuliah"] != $nilai["Kode_Matakuliah_Nilai"]){
													echo "<option value='$mtk[Kode_Matakuliah]'>$mtk[Nama_Matakuliah]</option>";
												}
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Nilai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Nilai" class="form-control">
										<?php
										
										echo "<option value='$nilai[Nilai]' selected>$nilai[Nilai]</option>";
											for($nilai=0; $nilai<count($daftarnilai); $nilai++){
												if($nilai["Nilai"] != $daftarnilai[$nilai])
												{
													echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
												}
												
											}
										?>
										</select>
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