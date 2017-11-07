<?php

	require_once("functions.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Login form
		</title>
			<style type="text/css">
				body{
					font-family: tahoma, sans-serif;
				}

				.redd{
					color: #ff0000;
				}

				h3{
					color: #009900;
				}
				
				form label{
					margin-left: 10px;
					float: left;
					text-align: right;
					display: block;
					color: #009900;
				}
				
				form input{
					width: 60%;
					margin-left: 10px;
					border: 0;
					background-color:#ffd633; 
					color:#000;
					font-size: 16px;
					height: auto;
				}

				form input[type=submit]{
					width: 20%;
					margin-left: 10px;
					border-radius: 4px;
					-webkit-border-radius:4px;
					color: #fff;
					font-weight: bold;
					background-color: #3333cc;
					cursor: pointer;
					height: 34px;
					text-align: center;
				}

				form #formLinks{
					margin-left: 10px;
				}
				
				form #formLinks a{
					text-decoration: none;
				}

				#formLinks a:hover{
					text-decoration: underline;
				}

				form select option{
					width: 6em;
				}
				
				#submit{
					margin-top: 2em;
					float: right;
				}
				
				.errorClass{
					background-color: #CC6666;
				}

				#formDiv{
					margin: 24px;
					width: 60%;
					clear: both;
				}
				
				#errorDiv{
					padding: 12px;
					margin: 10px;
				}
				
				.errorFeedback{
					visibility: hidden;
				}
				
				.phoneTypeError{
					margin-left: 1.2em;
					padding: 0.1em;
					background-color: #CC6666;
				}
			</style>
	</head>
	<body>
		<div id="errorDiv" class="redd">
			<?php
				if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {

					unset($_SESSION['formAttempt']);

					echo "Errors have been encountered:<br>";

					foreach ($_SESSION['error'] as $error) {
						
						echo $error."<br>";
					}//end foreach
				}//end if
			?>			
		</div>

		<div id="formDiv">
			<form id="loginForm" method="POST" action="login-process.php">
				<fieldset>
					<legend>
						Login
					</legend>
					<!--email input-->
					<p><label for="email">Email:<span class="redd">*</span></label></p><br>
					<input type="email" id="Email" name="Email">
					<span class="errorFeedback errorSpan" id="emailError">Email is required!</span><br>
					<!--password input-->
					<p><label for="password">Password:<span class="redd">*</span></label></p><br>
					<input type="password" id="Password" name="Password">
					<span class="errorFeedback errorSpan" id="passError">Password is required!</span>
					<br>
					<br>
					<!--submit-->
					<input type="submit" name="Sbt" id="Sbt" value="Login">
					<br>
					<p id="formLinks">
						<a href="register.php">Register</a><br>
						<a href="emailpass.php">Forgot Your password?</a><br>
						<a href="authenticated.php" id="profileLink" name="profileLink">Profile</a>
					</p>
				</fieldset>
			</form>
		</div>


	<!--<script type="text/javascript" src="login.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	</body>
</html>
