<?php

include "../koneksi.php";

$Id_Nilai	= $_GET["Id_Nilai"];

if($delete = mysqli_query($konek, "DELETE FROM nilai WHERE Id_Nilai='$Id_Nilai'")){
	header("Location: nilai.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>