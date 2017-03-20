<?php
include "../koneksi.php";

$NIM 				= $_POST["NIM"];
$Nama_Mahasiswa		= $_POST["Nama_Mahasiswa"];
$Tanggal_Lahir 		= $_POST["Tanggal_Lahir"];
$JK 				= $_POST["JK"];
$Alamat 			= $_POST["Alamat"];
$No_Telp 			= $_POST["No_Telp"];
$Kode_Jurusan_Mhs 	= $_POST["Kode_Jurusan_Mhs"];

if ($add = mysqli_query($konek, "INSERT INTO mahasiswa (NIM, Nama_Mahasiswa, Tanggal_Lahir, JK, Alamat, No_Telp, Kode_Jurusan_Mhs) VALUES 
	('$NIM', '$Nama_Mahasiswa', '$Tanggal_Lahir', '$JK', '$Alamat', '$No_Telp', '$Kode_Jurusan_Mhs')")){
		header("Location: mahasiswa.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>