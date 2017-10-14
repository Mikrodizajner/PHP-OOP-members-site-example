<?php

	require_once("functions.inc"); 
	/*
	if(!isset($_COOKIE[$cookie_name])) {
    	echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
    	echo "Cookie '" . $cookie_name . "' is set!<br>";
    	echo "Value is: " . $_COOKIE[$cookie_name];
	}
	*/
	if ($_SESSION["log"] = true) {
		header("Location:authenticated.php");
	}else{
		header("Location:login.php");
	}

?>