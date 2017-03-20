<?php
include "../koneksi.php";

$Kode_Ruangan	= $_POST["Kode_Ruangan"];
$Nama_Ruangan	= $_POST["Nama_Ruangan"];

if ($edit = mysqli_query($konek, "UPDATE ruangan SET Nama_Ruangan='$Nama_Ruangan' WHERE Kode_Ruangan='$Kode_Ruangan'")){
	header("Location: ruangan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>