<?php

include "../koneksi.php";

$Id_User	= $_GET["Id_User"];

if($delete = mysqli_query($konek, "DELETE FROM user WHERE Id_User='$Id_User'")){
	header("Location: user.php");
	exit();
}
die("Terapat Kesalahan :". mysqli_error($konek));

?>