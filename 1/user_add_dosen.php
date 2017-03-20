<?php

include "../koneksi.php";

$Id_Usergroup_User	= $_POST["Id_Usergroup_User"];
$Username			= $_POST["User_Dosen"];
$Password			= $_POST["User_Dosen"];
$Password_Hash		= password_hash($Password, PASSWORD_DEFAULT);

if($add = mysqli_query($konek, "INSERT INTO user (Id_Usergroup_User, Username, Password) VALUES ('$Id_Usergroup_User', '$Username', '$Password_Hash')")){
	header("Location: user.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>