<?php

include "../koneksi.php";

$NIM = $_GET["NIM"];

if($delete = mysqli_query($konek, "DELETE FROM mahasiswa WHERE NIM='$NIM'")){
	header("Location: mahasiswa.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>