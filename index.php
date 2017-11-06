<?php

	require_once("functions.php"); 
	/*
	if(!isset($_COOKIE[$cookie_name])) {
    	echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
    	echo "Cookie '" . $cookie_name . "' is set!<br>";
    	echo "Value is: " . $_COOKIE[$cookie_name];
	}
	*/
	if ($cookie) {

		header("Location:authenticated.php");
		
	}else{

		header("Location:login.php");
	}


?>