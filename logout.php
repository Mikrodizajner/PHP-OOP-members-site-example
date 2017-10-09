<?php

require_once("functions.inc");
$user = new User;
$user->logout();
die(header("Location:login.php"));

?>