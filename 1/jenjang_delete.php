<?php

include "../koneksi.php";

$Kode_Jenjang	= $_GET["Kode_Jenjang"];

if($delete = mysqli_query($konek, "DELETE FROM jenjang WHERE Kode_Jenjang='$Kode_Jenjang'")){
	header("Location: jenjang.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>