<?php

require_once("functions.php");
require_once("ClassUser.php");

$user = new User;

if (!$user->isLoggedIn || $user->isLoggedIn == false) {
	
	die(header("Location:login.php"));

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Welcome
		</title>
	</head>
	<body>
		<div>
			<?php

			echo "Welcome ". $user->firstName."<br>";
			echo "Your last Name is". $user->lastName."<br>";
			echo "Your address is". $user->address."<br>";
			echo "City where You live is". $user->city."<br>";
			echo "Your ZIP code is". $user->zip."<br>";
			echo "Your state is". $user->state."<br>";
			echo "Your phone number is". $user->phone."<br>";

			?>
		</div>
		<div>
			<a href="logout.php">Click here to logout!</a>
		</div>
	</body>
</html>
