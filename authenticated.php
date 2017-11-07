<?php

require_once("functions.php");
require_once("ClassUser.php");			

if (isset($_COOKIE['kookie']) && $_SESSION['isLoggedIn'] == true) {
   	foreach ($_COOKIE['kookie'] as $name) {
      	$name 	= htmlspecialchars($name);
   	}
}else{

	die(header("Location:login.php"));

	if ($_SESSION['error']) {
		unset($_SESSION['error']);
	}
}

/*
if () {
	
	$_SESSION['error'] = "You have to login first!";

}
*/

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Welcome <?php echo $name; ?>
		</title>
	</head>
	<style type="text/css">
		body{
			font-family: tahoma, sans-serif;
		}

		#userDiv{
			padding: 12px;
			width: 400px;
			margin: 0px auto;
			border: 2px dotted #000;
			border-radius: 6px;
			-webkit-border-radius: 6px;
			clear: both;
		}

		#logoutDiv{
			padding: 12px;
			width: 400px;
			margin: 0px auto;
			clear: both;
		}

		#logoutDiv a{
			color: #ff0000;
			text-decoration: none;
		}

		#logoutDiv a:hover{
			text-decoration: underline;
		}

		h3{
			color: #009900;
		}

		#formLinks{
			margin: 0px auto;
			padding: 12px;
			width: 400px;
		}
				
		#formLinks a{
			text-decoration: none;
		}

		#formLinks a:hover{
			text-decoration: underline;
		}
	</style>
	<body>
		<div id="userDiv">
			<?php

			echo "<h2>Hello ".$name."!</h2> <br />\n";
			echo "<h3>Your last name is ".$_SESSION['lastName']."!</h3> <br />\n";
			echo "<h3>You live in ".$_SESSION['city']."!</h3> 	<br />\n";
			echo "<h3>Your phone number is ".$_SESSION['phone']."!</h3> <br />\n";
			echo "<h3>Your address is ".$_SESSION['address']."!</h3> <br />\n";			

			?>
		</div>
		<div id="logoutDiv">
			<a href="logout.php">
				<strong>Click here to logout!</strong>
			</a>
			<hr>
		</div>
		<div id="formLinks">
			<a href="login.php">Login page</a><br>
			<a href="register.php">Register page</a>
		</div>
	</body>
</html>
