<?php

require_once("functions.php");
require_once("ClassUser.php");			

if (isset($_COOKIE['kookie']) && $_SESSION['isLoggedIn'] == true) {
   	foreach ($_COOKIE['kookie'] as $name) {
      	$name 	= htmlspecialchars($name);
   	}
}else{

	die(header("Location:login.php"));
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Welcome <?php echo $name; ?>
		</title>
	</head>
	<body>
		<div>
			<?php

			echo "<h2>Hello $name!</h2> <br />\n";

			?>
		</div>
		<div>
			<a href="logout.php">Click here to logout!</a>
		</div>
	</body>
</html>
