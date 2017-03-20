<?php

include "../koneksi.php";

$Id_Jadwal				= $_POST["Id_Jadwal"];
$NIP_Jadwal				= $_POST["NIP_Jadwal"];
$Kode_Matakuliah_Jadwal	= $_POST["Kode_Matakuliah_Jadwal"];
$Kode_Ruangan_Jadwal	= $_POST["Kode_Ruangan_Jadwal"];
$Kode_Jurusan_Jadwal	= $_POST["Kode_Jurusan_Jadwal"];
$Hari					= $_POST["Hari"];
$Jam_Mulai				= $_POST["Jam_Mulai"];
$Jam_Selesai			= $_POST["Jam_Selesai"];
$Jam					= $Jam_Mulai."-".$Jam_Selesai;

if($edit = mysqli_query($konek, "UPDATE jadwal SET NIP_Jadwal='$NIP_Jadwal', Kode_Matakuliah_Jadwal='$Kode_Matakuliah_Jadwal', Kode_Ruangan_Jadwal='$Kode_Ruangan_Jadwal',
	Kode_Jurusan_Jadwal='$Kode_Jurusan_Jadwal', Hari='$Hari', Jam='$Jam' WHERE Id_Jadwal='$Id_Jadwal'")){
		header("Location: jadwal.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>