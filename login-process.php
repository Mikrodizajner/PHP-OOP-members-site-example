<?php
/*
*php member site example
*
*
*
*login process
*
*/

require_once('functions.php');

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

		$_SESSION['id']			=$user->id;
		$_SESSION['email']		=$user->email;
		$_SESSION['firstName']	=$user->firstName;
		$_SESSION['lastName']	=$user->lastName;
		$_SESSION['address']	=$user->address;
		$_SESSION['city']		=$user->city;
		$_SESSION['zip']		=$user->zip;
		$_SESSION['state']		=$user->state;
		$_SESSION['phone']		=$user->phone;
		$_SESSION['phoneType']	=$user->phoneType; 
		$_SESSION['isLoggedIn']	=true;

		$cookie = setcookie("kookie[".$user->firstName."]", $user->firstName, time()+60*60*30); 

		header("Location:authenticated.php");

	}else{
		$_SESSION['error'][] = 'There was a problem with your username or password! 
		If You are not registered please <a href="register.php">register</a> ASAP!';
		die(header("Location:login.php"));
	}
}

?>