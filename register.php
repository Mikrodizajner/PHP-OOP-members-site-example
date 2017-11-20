<?php 
/*
*php member site example
*author: https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
*object oriented php5.6. plus procedural php
*
*register
*
*/
	require_once("functions.php"); 

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">

		<title>Register form</title>
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

		<div id="errorDiv">
			<?php
				if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
					unset($_SESSION['formAttempt']);
						echo "Errors encountered:<br><br>";
					foreach ($_SESSION['error'] as $error) {
						echo $error."<br>";
					}//end foreach
				}//end if
			?>
		</div>

		<div id="formDiv">
		<form id="userForm" method="POST" action="register-process.php">
			<div>
				<fieldset>
					<legend>
						Register information
					</legend>

					<div id="errorDiv">
						<?php
							if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
								unset($_SESSION['formAttempt']);
									echo "Errors encountered:<br><br>";
								foreach ($_SESSION['error'] as $error) {
									echo $error."<br>";
								}//end foreach
							}//end if
						?>
					</div>
					
					<!--first name input-->
					<p><label for="firstname">First name:<span class="redd">*</span></label></p><br>
					<input type="text" id="fname" name="fname">
					<span class="errorFeedback errorSpan" id="fnameError">First name is required!</span><br>
					<!--last name input-->
					<p><label for="lastname">Last name:<span class="redd">*</span></label></p><br>
					<input type="text" id="lname" name="lname">
					<span class="errorFeedback errorSpan" id="lnameError">Last name is required!</span><br>
					<!--email input-->
					<p><label for="email">Email:<span class="redd">*</span></label></p><br>
					<input type="email" id="email" name="email">
					<span class="errorFeedback errorSpan" id="emailError">Email is required!</span><br>
					<!--password input-->
					<p><label for="password">Password:<span class="redd">*</span></label></p><br>
					<input type="password" id="password1" name="password1">
					<span class="errorFeedback errorSpan" id="passError1">Password is required!</span><br>
					<!--password check-->
					<p><label for="passwordVerify">Verify Password:<span class="redd">*</span></label></p><br>
					<input type="password" id="password2" name="password2">
					<span class="errorFeedback errorSpan" id="passError2">Password's don't match!</span><br>
					<!--address input-->
					<p><label for="address">Address:</label></p><br>
					<input type="text" id="addr" name="addr"><br>
					<!--city input-->
					<p><label for="city">City:</label></p><br>
					<input type="text" id="city" name="city"><br><br>

					<!--state input-->
					<p><label for="state">State:</label></p><br>
					<select id="state" name="state">
						<option></option>
						<option value="AL">Alabama</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="NE">Nebraska</option>
						<option value="FL">Florida</option>
						<option value="IL">Illinois</option>
						<option value="NY">New York</option>
						<option value="WS">Wisconsin</option>
						<option value="IO">Iowa</option>
					</select>
					<br><br>
					<!--zip number input-->
					<p><label for="zip">ZIP:</label></p><br>
					<input type="text" id="zip" name="zip"><br>
					<!--phone number input-->
					<p><label for="phone">Phone number:</label></p><br>
					<input type="text" id="phone" name="phone">
					<span class="errorFeedback errorSpan" id="phoneError">Format must be xxx-xxx-xxxx!</span><br><br>
					<!--work phone input-->
					<p><label for="work">Number type:</label></p><br><br>
					<input class="radioBtn" type="radio" id="work" name="phonetype" value="work">
					<label class="radioBtn" for="work">Work</label><br>
					<input class="radioBtn" type="radio" id="home" name="phonetype" value="home">
					<label class="radioBtn" for="home">Home</label><br>
					<span class="errorFeedback errorSpan phoneTypeErr" id="phonetypeError">Please choose one option!</span><br>
					<p id="formLinks">
						<a href="login.php">Login</a><br>
						<a href="emailpass.php">Forgot Your password?</a><br>
						<a href="authenticated.php">Profile</a>
					</p>
					<!--submit-->
					<input type="submit" name="Sbt" id="Sbt" value="Register">

				</fieldset>
			</div>
		</form>
		</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	</body>
</html>
