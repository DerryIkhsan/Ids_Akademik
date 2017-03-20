<?php
include "../koneksi.php";

$Kode_Ruangan	= $_POST["Kode_Ruangan"];
$Nama_Ruangan	= $_POST["Nama_Ruangan"];

if($add = mysqli_query($konek, "INSERT INTO ruangan (Kode_Ruangan, Nama_Ruangan) VALUES ('$Kode_Ruangan', '$Nama_Ruangan')")){
	header("Location: ruangan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>