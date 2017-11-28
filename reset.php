<?php
/*
*php member site example
*author: https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
*object oriented php5.6. plus procedural php
*
*reset password
*
**/
require_once("functions.php");

	$invalidAccess = true;

	if (isset($_GET['user']) && $_GET['user'] != "") {
		$invalidAccess = false;
		$hash = $_GET['user'];
	}

	//if they attempted form but had a problem we need to allow them in
	if (isset($_SESSION['formAttempt']) && $_SESSION['formAttempt'] == true) {
		$invalidAccess = true;
		$hash = $_SESSION['hash'];
	}

	if ($invalidAccess) {
		die(header("Location:login.php"));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Reset page
		</title>
		<link rel="stylesheet" type="text/css" href="form.css">
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		h3{
			color: #009900;
		}
	</style>
	</head>
	<body>
		<div>
			<form id="loginForm" method="POST" action="reset-process.php">
				<fieldset>
					<legend>
						Reset Password
					</legend>
					<div id="errorDiv">
						<?php
							if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
								unset($_SESSION['formAttempt']);
								echo "Errors encountered!<br>";
								foreach ($_SESSION['error'] as $error) {
									echo $error."<br>";
								}//end foreach

							}//end if isset
						?>
					</div>
					<label for="email">E-mail address: *</label>
					<input type="text" id="email" name="email">
					<span class="errorFeedback errorSpan" id="emailError">E-mail is required!</span><br>
					<label for="password1">Password: *</label>
					<input type="password" id="password1" name="password1">
					<span class="errorFeedback errorSpan" id="password1Error">Password is required!</span><br>
					<label for="password1">Repeat Password: *</label>
					<input type="password" id="password2" name="password2">
					<span class="errorFeedback errorSpan" id="password2Error">Passwords don't match!</span><br>
					<?php
						echo '<input type="hidden" name="hash" value="{$hash}"><br>';
					?>
					<input type="submit" id="sbmt" name="sbmt" value="SUBMIT">
				</fieldset>
			</form>
		</div>
	</body>
</html>
