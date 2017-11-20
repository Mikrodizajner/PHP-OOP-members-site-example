<?php
/*
*php member site example
*author: https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
*object oriented php5.6. plus procedural php
*
*logout
*
*/

require_once("functions.php");

$_SESSION["isLoggedIn"] = false;

if (isset($_COOKIE['kookie'])) {
	
	setcookie("kookie[".$user->firstName."]", null, time()-3600);
}

session_destroy();
header("Location:login.php");

?>