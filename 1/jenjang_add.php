<?php

include "../koneksi.php";

$Kode_Jenjang	= $_POST["Kode_Jenjang"];
$Nama_Jenjang	= $_POST["Nama_Jenjang"];

if($add = mysqli_query($konek, "INSERT INTO jenjang(Kode_Jenjang, Nama_Jenjang) VALUES ('$Kode_Jenjang', '$Nama_Jenjang')")){
	header("Location: jenjang.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
