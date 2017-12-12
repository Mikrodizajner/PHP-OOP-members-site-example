<!--
*php member site example
*
*
*
*emailpass
*
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
		Forgotten Credentials		
		</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="email.js"></script>
		<link rel="stylesheet" type="text/css" href="form.css">
			<style type="text/css">
				body{
					font-family: tahoma, sans-serif;
					margin: 0px;
					padding: 0;
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

				/*
				p {
   					display: block;
   					-webkit-margin-before: 0px;
   					-webkit-margin-after: 0px;
   					-webkit-margin-start: 0px;
   					-webkit-margin-end: 0px;
				}
				*/

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
		<div id="formDiv">
			<form id="emailForm" method="POST" action="email-process.php">
				<fieldset>
					<legend>Password recovery</legend>
					<div id="errorDiv">
						<?php
							if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
								//unset($_SESSION['formAttempt']);
								echo "Errors encountered!<br>";
									foreach ($_SESSION['error'] as $error) {
										echo $error."<br>";
									}//end foreach
							}//end if isset
						?>
					</div>
					<p>
						<label for="email">Enter Your E-mail: <span class="redd">*</span></label>
					</p>
					<br>
					<input type="text" id="email" name="email"><br>
					<p>
						<label for="password">Enter Your new Password: <span class="redd">*</span></label>
					</p>
					<br>
					<input type="text" id="pswd2" name="pswd2"><br>
					<span class="errorFeedback errorSpan" id="emailError">E-mail is required!</span><br>
					<input type="submit" id="sbmt" name="sbmt" value="Submit"><br>
					<p id="formLinks">
						<a href="login.php">Login page</a><br>
						<a href="register.php">Register page</a>
					</p>
				</fieldset>
			</form>
		</div>
	</body>
</html>