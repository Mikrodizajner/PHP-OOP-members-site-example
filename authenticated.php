<?php

require_once("functions.php");
require_once("ClassUser.php");

/*
$user = new User;


if (!$user->isLoggedIn || $user->isLoggedIn == false) {
	
	die(header("Location:login.php"));

}
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Welcome <?php echo $_SESSION['firstName']; ?>
		</title>
	</head>
	<body>
		<div>
			<?php

			echo "Hello ".$_SESSION['firstName']."!<br>";
			echo "Your last Name is ".$_SESSION['lastName']."<br>";
			echo "Your address is ".$_SESSION['address']."<br>";
			echo "City where You live is ".$_SESSION['city']."<br>";
			echo "Your ZIP code is ".$_SESSION['zip']."<br>";
			echo "Your state is ".$_SESSION['state']."<br>";
			echo "Your phone number is ".$_SESSION['phone']."<br>";

			?>
		</div>
		<div>
			<a href="logout.php">Click here to logout!</a>
		</div>
	</body>
</html>
