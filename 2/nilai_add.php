<?php

include "../koneksi.php";

$NIM_Nilai				= $_POST["NIM_Nilai"];
$Kode_Matakuliah_Nilai	= $_POST["Kode_Matakuliah_Nilai"];
$Nilai					= $_POST["Nilai"];

if($add = mysqli_query($konek, "INSERT INTO nilai (NIM_Nilai, Kode_Matakuliah_Nilai, Nilai) VALUES ('$NIM_Nilai', '$Kode_Matakuliah_Nilai', '$Nilai')")){
	header("Location: nilai.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>