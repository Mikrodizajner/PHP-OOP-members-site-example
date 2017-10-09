<?php

require_once("functions.inc");

$user = new User;

if (!$user->isLoggedIn) {
	
	die(header("Location:login.php"));

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
		</title>
	</head>
	<body>
		<div>
			<?php

			echo "Welcome ". $user->firstName."<br>";

			?>
		</div>
		<div>
			<a href="logout.php">Click here to logout!</a>
		</div>
	</body>
</html>
