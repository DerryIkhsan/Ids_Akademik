<?php

include "../koneksi.php";

$Kode_Matakuliah	= $_POST["Kode_Matakuliah"];
$Nama_Matakuliah	= $_POST["Nama_Matakuliah"];
$SKS				= $_POST["SKS"];

if($add = mysqli_query($konek,"INSERT INTO matakuliah (Kode_Matakuliah, Nama_Matakuliah, SKS) VALUES ('$Kode_Matakuliah', '$Nama_Matakuliah', '$SKS')")){
	header("Location: matakuliah.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>