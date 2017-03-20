<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

$daftarnilai[] = "A";
$daftarnilai[] = "B";
$daftarnilai[] = "C";
$daftarnilai[] = "D";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>IDS Akademik</title>
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
					<li><a href="jadwal.php"><i class="fa fa-calendar"></i><span>Jadwal</span></a></li>
					<li class="active"><a href="nilai.php"><i class="fa fa-book"></i><span>Nilai</span></a></li>
					<li><a href="about.php"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Nilai
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-book"></i> Nilai</li>
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
				<table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_nilai.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Ruangan</h4>
					</div>
					<div class="modal-body">
						<form action="nilai_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-users"></i>
										</div>
										<select name="NIM_Nilai" class="form-control">
											<?php
												
												$querymhs = mysqli_query($konek, "SELECT * FROM mahasiswa");
												if($querymhs == false){
													die("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($mhs = mysqli_fetch_array($querymhs)){
													echo "<option value='$mhs[NIM]'>$mhs[Nama_Mahasiswa]</option>";
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
										
											$querymtk = mysqli_query($konek, "SELECT * FROM matakuliah");
											if($querymtk == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mtk = mysqli_fetch_array($querymtk)){
												echo "<option value='$mtk[Kode_Matakuliah]'>$mtk[Nama_Matakuliah]</option>";
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
											for($nilai=0; $nilai<count($daftarnilai); $nilai++)
											{
												echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
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
		
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditNilai" class="modal fade" tabindex="-1" role="dialog"></div>
		
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
		
    </div><!-- /.content-wrapper -->
	<?php
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
