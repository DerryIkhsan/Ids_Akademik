<?php

include "../koneksi.php";

$Id_Nilai				= $_POST["Id_Nilai"];
$NIM_Nilai				= $_POST["NIM_Nilai"];
$Kode_Matakuliah_Nilai	= $_POST["Kode_Matakuliah_Nilai"];
$Nilai					= $_POST["Nilai"];

if($edit = mysqli_query($konek, "UPDATE nilai SET NIM_Nilai='$NIM_Nilai', Kode_Matakuliah_Nilai='$Kode_Matakuliah_Nilai', Nilai='$Nilai' WHERE Id_Nilai='$Id_Nilai'")){
	header("Location: nilai.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>