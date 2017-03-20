<?php

include "../koneksi.php";

$Kode_Matakuliah	= $_POST["Kode_Matakuliah"];
$Nama_Matakuliah	= $_POST["Nama_Matakuliah"];
$SKS				= $_POST["SKS"];

if($edit = mysqli_query($konek,"UPDATE matakuliah SET Nama_Matakuliah='$Nama_Matakuliah', SKS='$SKS' WHERE Kode_Matakuliah='$Kode_Matakuliah'")){
	header("Location: matakuliah.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>