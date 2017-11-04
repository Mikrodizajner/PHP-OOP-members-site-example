<?php

require_once("functions.php");
require_once("ClassUser.php");

$user = new User;
$user->logout();
die(header("Location:login.php"));

?>