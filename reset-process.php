<?php

require_once("functions.inc");

//prevent access if form was not submitted
if (!isset($_POST['sbmt'])) {
	die(header("Location:login.php"));
}

$_SESSION['formAttempt'] = true;

if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
}

$_SESSION['error'] = array();

$required = array("email", "password1", "password2");

//check required fields
foreach ($required as $requiredField) {
	if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
		$_SESSION['error'][] = $requiredField ."is required!";
	}
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$_SESSION['error'][] = "Invalid e-mail address!";
}

if (count($_SESSION['error']) > 0) {
	die(header("Location:reset.php"));
}else{
	$user = new User;

	if ($user->validateReset($_POST)) {
		unset($_SESSION['formAttempt']);
		die(header("Location:reset-success.php"));
	}else{
		if ($user->errorType ="nonfatal") {
			$_SESSION['hash'] = $_POST['hash'];
			$_SESSION['error'][] = "There was a problem with the form!";
			die(header("Location:reset.php"));
		}else{
			$_SESSION['error'][] = "There was a problem with the form!";
			die(header("Location:emailpass.php"));
		}
	}
}

?>