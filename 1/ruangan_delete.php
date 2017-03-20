<?php

include "../koneksi.php";

$Kode_Ruangan	= $_GET["Kode_Ruangan"];

if($delete = mysqli_query($konek, "DELETE FROM ruangan WHERE Kode_Ruangan='$Kode_Ruangan'")){
	header("Location: ruangan.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>