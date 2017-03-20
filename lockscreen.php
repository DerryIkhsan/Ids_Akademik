<?php
session_start();
include "koneksi.php";
if($_SESSION["Login"] != true)
{
	header("Location: pagenotfound.php");
	exit();
}

// Notif Error
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
	switch ($_GET ["Err"]){
		case 1:
			$Err = "Username dan Password Kosong";
		break;
		case 2:
			$Err = "Username Kosong";
		break;
		case 3:
			$Err = "Password Kosong";
		break;
		case 4:
			$Err = "Password salah";
		break;
		case 5:
			$Err = "Username atau Password salah";
		break;
		case 6:
			$Err = "Maaf, Terjadi Kesalahan";
		break;
	}
}

// Notif
$Notif = "";
if(isset ($_GET["Notif"]) && !empty ($_GET["Notif"])){
	switch($_GET["Notif"]){
		case 1:
			$Notif = "User berhasil dibuat, silahkan Login";
		break;
	}
}
// include "koneksi.php";
// include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>IDS Akademik</title>
	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="../favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="aset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="aset/fa/css/font-awesome.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="aset/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="aset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="aset/dist/css/skins/_all-skins.min.css">
  </head>
  <body class="hold-transition lockscreen">
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <b>IDS Akademik</b>
      </div>
      <!-- User name -->
      <div class="lockscreen-name" style="text-transform:uppercase;"><?php echo $_SESSION["Username"] ?></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="aset/foto/<?php echo $_SESSION["Foto"] ?>" alt="Foto">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="v_lockscreen.php" method="post">
          <div class="input-group">
            <input name="Password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-btn">
              <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Masukkan kembali Password Anda 
      </div>
      <div class="text-center">
        <a href="logout.php" id="logout">Login dengan user berbeda</a>
      </div>
		<center><font style="color:red;"><?php echo $Err ?></font></center>
		<center><font style="color:green;"><?php echo $Notif ?></font></center>
      <div class="lockscreen-footer text-center">
        <strong>Copyright &copy; <?php echo date("Y") ?> IDS Akademik</strong>
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="aset/dist/js/app.min.js"></script>
  </body>
</html>