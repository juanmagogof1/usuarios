<?php 
	
	session_destroy();
	header("location:login.php?loggout=1");
	die();

?>