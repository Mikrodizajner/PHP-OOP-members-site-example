<?php

require_once("functions.php");
require_once("ClassUser.php");

$_SESSION["isLoggedIn"] = false;

if (isset($_COOKIE['kookie'])) {
	
	setcookie("kookie[".$user->firstName."]", null, time()-3600);
}

session_destroy();
header("Location:login.php");

?>