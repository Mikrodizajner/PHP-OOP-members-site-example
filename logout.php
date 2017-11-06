<?php

require_once("functions.php");
require_once("ClassUser.php");

$_SESSION["isLoggedIn"] = false;

session_destroy();
header("Location:login.php");

?>