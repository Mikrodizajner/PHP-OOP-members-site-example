<?php
/*
*php member site example
*author: https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
*object oriented php5.6. plus procedural php
*
*index
*
*/
	require_once("functions.php"); 

	if (isset($_COOKIE['kookie'])) {

		header("Location:authenticated.php");
		
	}else{

		die(header("Location:login.php"));
	}


?>