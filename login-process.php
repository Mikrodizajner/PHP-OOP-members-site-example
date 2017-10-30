<?php

require_once('functions.php');
require_once('ClassUser.php');

//prevent access if if the form was not submitted
if (!isset($_POST['Sbt'])) {
	die(header("Loacation:login.php"));
}

$_SESSION['formAttempt'] = true;

if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
}

$_SESSION['error'] = array();

$required = array("Email", "Password");

//check required fields
foreach ($required as $requiredField) {
	if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
		
		$_SESSION['error'][] = $requiredField ." is required!";
	}
}

if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
	$_SESSION['error'][] = "Invalid e-mail address!";
}

if (count($_SESSION['error']) > 0) {
	die(header("Location:login.php"));
}else{

	$user = new User;

	if ($user->authenticate($_POST['Email'], $_POST['Password'])) {
		unset($_SESSION['formAttempt']);
		header("Location:authenticated.php");
	}else{
		$_SESSION['error'][] = 'There was a problem with your username or password! If You are not registered please <a href="register.php">register</a> ASAP!';
		die(header("Location:login.php"));
	}
}

?>