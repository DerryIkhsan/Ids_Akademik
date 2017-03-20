<?php

include "../koneksi.php";

$NIP	= $_GET["NIP"];

if($delete = mysqli_query ($konek, "DELETE FROM dosen WHERE NIP='$NIP'")){
	header("Location: dosen.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>