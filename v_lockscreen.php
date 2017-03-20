<?php
session_start();
include "koneksi.php";

$Username = $_SESSION["Username"];
$Password = $_POST["Password"];

$query = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");

// Validasi Login
if ($_POST){
	
	$queryuser = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username'");
		
	$user = mysqli_fetch_array ($queryuser);
	
	if($user){
			if (password_verify($Password, $user["Password"])){
				
				$_SESSION["Username"] 		= $user["Username"];
				$_SESSION["Password"] 		= $user["Password"];
				$_SESSION["Id_Usergroup"] 	= $user["Id_Usergroup"];
				$_SESSION["Id_User"] 		= $user["Id_User"];
				$_SESSION["Foto"]			= $user["Foto"];
				$_SESSION["Login"] 			= true;
				
				if ($_SESSION["Id_Usergroup"] == 1){
					header ("Location: 1/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup"] == 2){
					header ("Location: 2/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup"] == 3){
					header ("Location: 3/index.php");
					exit();
				}
				else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: lockscreen.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: lockscreen.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: lockscreen.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: lockscreen.php?Err=3");
		exit();
	}
	else{
		header ("Location: lockscreen.php?Err=5");
		exit();
	}
}
	
?>