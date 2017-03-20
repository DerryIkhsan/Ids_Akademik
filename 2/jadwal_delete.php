<?php

include "../koneksi.php";

$Id_Jadwal	= $_GET["Id_Jadwal"];

if($delete = mysqli_query($konek, "DELETE FROM jadwal WHERE Id_Jadwal='$Id_Jadwal'")){
	header("Location: jadwal.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>