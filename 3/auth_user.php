<?php

if (!isset ($_SESSION["Login"]) || $_SESSION ["Login"] != true){
	header ("Location: ../pagenotfound.php");
}
else if ($_SESSION["Id_Usergroup"] = 3){
	$_SESSION ["Login"] = true;
}
else{
	header ("Location: ../pagenotfound.php");
}

?>