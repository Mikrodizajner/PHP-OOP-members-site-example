<?php

	require_once("functions.php");
	/*
	require_once("ClassUser.php");
	$user = new User;
	$user->logout();
	*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="form.css">
		<title>
			Login
		</title>
	</head>
	<body>
		<div id="errorDiv" class="redd">
			<?php
				if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {

					unset($_SESSION['formAttempt']);

					echo "Errors encountered!<br>";

					foreach ($_SESSION['error'] as $error) {
						
						echo $error."<br>";
					}//end foreach
				}//end if
			?>			
		</div>

		<div>
			<form id="loginForm" method="POST" action="login-process.php">
					<fieldset>
						<legend>
							Login
						</legend>
						<!--email input-->
						<label for="email">Email:*</label>
						<input type="email" id="Email" name="Email">
						<span class="errorFeedback errorSpan" id="emailError">Email is required!</span><br>
						<!--password input-->
						<label for="password">Password:*</label>
						<input type="password" id="Password" name="Password">
						<span class="errorFeedback errorSpan" id="passError">Password is required!</span>
						<br>
						<br>
						<!--submit-->
						<input type="submit" name="Sbt" id="Sbt" value="SUBMIT">
						<br>
						<a href="register.php">Register</a><br>
						<a href="emailpass.php">Forgot Your password?</a>
					</fieldset>
			</form>
		</div>


	<!--<script type="text/javascript" src="login.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	</body>
</html>
