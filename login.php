<?php

	require_once("functions.inc");
	$user = new User;
	$user->logout();

?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="form.css">
		<title>
			Login
		</title>
	</head>
	<body>

		<form id="loginForm" method="POST" action="login-process.php">
			<div>
				<fieldset>
					<legend>
						Login
					</legend>

					<div id="errorDiv">
						<?php
							if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {

								unset($_SESSION['formAttempt']);

								echo "Errors encountered<br>";

								foreach ($_SESSION['error'] as $error) {
									
									echo $error."<br>";
								}//end foreach
							}//end if
						?>
					</div>
					<!--email input-->
					<label for="email">Email:*</label>
					<input type="email" id="email" name="email">
					<span class="errorFeedback errorSpan" id="emailError">Email is required!</span><br>
					<!--password input-->
					<label for="password">Password:*</label>
					<input type="password" id="password1" name="password1">
					<span class="errorFeedback errorSpan" id="passError1">Password is required!</span>
					<br>
					<br>
					<!--submit-->
					<input type="submit" name="Sbt" id="Sbt" value="SUBMIT">
					<br>
					<a href="emailpass.php">Forgot Your password?</a>
				</fieldset>
			</div>
		</form>


	<script type="text/javascript" src="login.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	</body>
</html>
