<?php
/*
*php member site example
*
*
*
*home page
*
*/
	require_once("functions.php"); 

	if (isset($_COOKIE['kookie'])) {

		header("Location:authenticated.php");
		
	}else{

		die(header("Location:login.php"));
	}


?>