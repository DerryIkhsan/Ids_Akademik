<?php

include "../koneksi.php";

$Kode_Jurusan		= $_POST["Kode_Jurusan"];
$Nama_Jurusan		= $_POST["Nama_Jurusan"];
$Kode_Jenjang_Jrs	= $_POST["Kode_Jenjang_Jrs"];

if($edit = mysqli_query($konek, "UPDATE jurusan SET Nama_Jurusan='$Nama_Jurusan', Kode_Jenjang_Jrs='$Kode_Jenjang_Jrs' WHERE Kode_Jurusan='$Kode_Jurusan'")){
	header("Location: jurusan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>