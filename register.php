<?php 

	require_once("functions.inc"); 

?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="form.css">

		<title>Register</title>
	</head>
	<body>

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
					<hr>
					<!--first name input-->
					<label for="firstname">First name:<span class="redd">*</span></label>
					<input type="text" id="fname" name="fname">
					<span class="errorFeedback errorSpan" id="fnameError">First name is required!</span><br>
					<!--last name input-->
					<label for="lastname">Last name:<span class="redd">*</span></label>
					<input type="text" id="lname" name="lname">
					<span class="errorFeedback errorSpan" id="lnameError">Last name is required!</span><br>
					<!--email input-->
					<label for="email">Email:<span class="redd">*</span></label>
					<input type="email" id="email" name="email">
					<span class="errorFeedback errorSpan" id="emailError">Email is required!</span><br>
					<!--password input-->
					<label for="password">Password:<span class="redd">*</span></label>
					<input type="password" id="password1" name="password1">
					<span class="errorFeedback errorSpan" id="passError1">Password is required!</span><br>
					<!--password check-->
					<label for="passwordVerify">Verify Password:<span class="redd">*</span></label>
					<input type="password" id="password2" name="password2">
					<span class="errorFeedback errorSpan" id="passError2">Password's don't match!</span><br>
					<!--address input-->
					<label for="address">Address:</label>
					<input type="text" id="addr" name="addr"><br>
					<!--city input-->
					<label for="city">City:</label>
					<input type="text" id="city" name="city"><br><br>

					<!--state input-->
					<label for="state">State:</label>
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
					<label for="zip">ZIP:</label>
					<input type="text" id="zip" name="zip"><br>
					<!--phone number input-->
					<label for="phone">Phone number:</label>
					<input type="text" id="phone" name="phone">
					<span class="errorFeedback errorSpan" id="phoneError">Format must be xxx-xxx-xxxx!</span><br><br>
					<!--work phone input-->
					<label for="work">Number type:</label><br><br>
					<input class="radioBtn" type="radio" id="work" name="phonetype" value="work">
					<label class="radioBtn" for="work">Work</label><br>
					<input class="radioBtn" type="radio" id="home" name="phonetype" value="home">
					<label class="radioBtn" for="home">Home</label><br>
					<span class="errorFeedback errorSpan phoneTypeErr" id="phonetypeError">Please choose one option!</span><br>

					<!--submit-->
					<input type="submit" name="Sbt" id="Sbt" value="SUBMIT">

				</fieldset>
			</div>
		</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	</body>
</html>
