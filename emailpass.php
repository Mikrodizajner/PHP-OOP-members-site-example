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
	</head>
	<body>
		<div>
			<form id="emailForm" method="POST" action="email-process.php">
				<fieldset>
					<legend>Password recovery</legend>
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
					<label for="email">E-mail: *</label>
					<input type="text" id="email" name="email">
					<span class="errorFeedback errorSpan" id="emailError">E-mail is required!</span><br>
					<input type="submit" id="sbmt" name="sbmt" value="SUBMIT">
				</fieldset>
			</form>
		</div>
	</body>
</html>