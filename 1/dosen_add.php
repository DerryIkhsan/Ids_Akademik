<?php
include "../koneksi.php";

$NIP 			= $_POST["NIP"];
$Nama_Dosen 	= $_POST["Nama_Dosen"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$Alamat 		= $_POST["Alamat"];
$No_Telp 		= $_POST["No_Telp"];

if ($add = mysqli_query($konek, "INSERT INTO dosen (NIP, Nama_Dosen, Tanggal_Lahir, JK, Alamat, No_Telp) VALUES 
	('$NIP', '$Nama_Dosen', '$Tanggal_Lahir', '$JK', '$Alamat', '$No_Telp')")){
		header("Location: dosen.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>