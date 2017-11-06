<?php

	require_once("functions.php"); 

	if (isset($_COOKIE['kookie'])) {

		header("Location:authenticated.php");
		
	}else{

		die(header("Location:login.php"));
	}


?>