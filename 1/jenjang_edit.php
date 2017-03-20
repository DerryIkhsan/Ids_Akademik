<?php

include "../koneksi.php";

$Kode_Jenjang	= $_POST["Kode_Jenjang"];
$Nama_Jenjang	= $_POST["Nama_Jenjang"];

if($edit = mysqli_query($konek, "UPDATE jenjang SET Nama_Jenjang='$Nama_Jenjang' WHERE Kode_Jenjang='$Kode_Jenjang'")){
	header("Location: jenjang.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>