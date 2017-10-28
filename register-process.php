<?php

	require_once("functions.inc");

	//prevent access if form is not submited
	if (!isset($_POST["Sbt"])) {
		die(header("Location:register.php"));
	}

		$_SESSION["formAttempt"] = true;

		//setting error session as an array an required fields as an array
		if (isset($_SESSION["error"])) {
			unset($_SESSION["error"]);
		}

		$_SESSION["error"] = array();
		$required =  array("fname", "lname", "email", "password1", "password2");

		//Check required fields and putting errors in session error array if required fields empty
		foreach ($required as $requiredField) {	
			if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
				$_SESSION["error"][] = $requiredField." is required!";
			}
		}

		//regex validation
		if (!preg_match('/^[\w .]+$/', $_POST["fname"])) {
			$_SESSION["error"][] = "First name can be letters and numbers only!";
		}//check fname

		if (!preg_match('/^[\w .]+$/', $_POST["lname"])) {
			$_SESSION["error"][] = "Last name can be letters and numbers only!";
		}//check lname

		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$_SESSION["error"][] = "Please enter a valid email address!";
		}//validate email

		if (strlen($_POST["password1"]) > 36) {
			$_SESSION["error"][] = "Passwords can have maximum 36 characters";
		}//check if password1 has more than 30 characters

		if ($_POST["password1"] != $_POST["password2"]) {
			$_SESSION["error"][] = "Passwords don't match!";
		}//check if passwords match

		
		if (isset($_POST["phone"]) && $_POST["phone"] != "") {


			if (!preg_match('/^[\d]+$/', $_POST["phone"])) {
				$_SESSION["error"][] = "Phone number can be digits only!";
			}

			elseif (strlen($_POST["phone"]) < 10) {
				$_SESSION["error"][] = "Phone number must be at least 10 digits long!";
			}

			else{
				if (!isset($_POST["phonetype"]) || $_POST["phonetype"] == "") {
					$_SESSION["error"][] = "Please choose a phone type!";
				}else{
					$validPhoneTypes = array("work", "home");
					if (!in_array($_POST["phonetype"], $validPhoneTypes)) {
					$_SESSION["error"][] = "Please choose a valid phone type!";
					}
				}
			}


		}//check phone and phonetype if phone number entered

		if (isset($_POST["state"]) && $_POST["state"] != "") {

				function is_valid_state($state){
					$validStates = array("AL", "CA", "CO", "NE", "FL", "IL", "NY", "WS", "IO");
					if (in_array($state, $validStates)) {
						return true;
					}else{
						return false;
					}
				}//end function is_valid_state

			if (!is_valid_state($_POST["state"])) {
				$_SESSION["error"][] = "Please choose a valid state!";
			}
		}//check state if entered

		if (isset($_POST["zip"]) && $_POST["zip"] != "") {

				function is_valid_zip($zip){
					if (preg_match('/^[\d]+$/', $zip)) {
						return true;
					}elseif (strlen($zip) == 5 || strlen($zip) == 9) {
						return true;
					}else{
						return false;
					}
				}//end function is_valid_zip

			if (!is_valid_zip($_POST["zip"])) {
				$_SESSION["error"][] = "ZIP is not valid!";
			}
		}//check zip number if entered	

		//final disposition
		if (count($_SESSION["error"]) > 0) {
			die(header("Location:register.php"));
		}

		//creating connection	
		$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DB);

		if (!$mysqli) {
			echo "Error!";
		}
		/*
		if ($mysqli->connect_errno()) {
			error_log("Can't connect to MySql:" . $mysqli->connect_error, 3, "errorlogs/errorLog.txt");
			return false;
		}
		*/
		$email = $mysqli->real_escape_string($_POST["email"]);

		/*
		//check for existing user
		$findUser = "SELECT id FROM customer WHERE email='{$email}'";

		$findResult = $mysqli->query($findUser);

		$findRow = $findResult->fetch_assoc();

		if (isset($findRow["id"]) && $findRow["id"] != "") {
			$_SESSION["error"][] = "A user with that email already exists!";
			return false;
		}
		*/

		$firstName = $mysqli->real_escape_string($_POST["fname"]);

		$lastName = $mysqli->real_escape_string($_POST["lname"]);

		$cryptedPassword = password_hash($_POST["password1"], PASSWORD_BCRYPT);

		$password = $mysqli->real_escape_string($cryptedPassword);

		if (isset($_POST["addr"])) {
			$street = $mysqli->real_escape_string($_POST["addr"]);
		}else{
			$street = "";
		}

		if (isset($_POST["city"])) {
			$city = $mysqli->real_escape_string($_POST["city"]);
		}else{
			$city = "";
		}

		if (isset($_POST["state"])) {
			$state = $mysqli->real_escape_string($_POST["state"]);
		}else{
			$state = "";
		}

		if (isset($_POST["zip"])) {
			$zip = $mysqli->real_escape_string($_POST["zip"]);
		}else{
			$zip = "";
		}

		if (isset($_POST["phone"])) {
			$phone = $mysqli->real_escape_string($_POST["phone"]);
		}else{
			$phone = "";
		}

		if (isset($_POST["phonetype"])) {
			$phoneType = $mysqli->real_escape_string($_POST["phonetype"]);
		}else{
			$phoneType = "";
		}

		$query = "INSERT INTO members (member_email, create_date, member_pass, member_las_name, member_fir_name, member_address, member_city, member_state, member_zip, member_phone, member_phone_type) VALUES ('{$email}', NOW(), '{$password}', '{$lastName}', '{$firstName}', '{$street}', '{$city}', '{$state}', '{$zip}', '{$phone}', '{$phoneType}')";

		if (!$query) {
			header("Location:404.php");
		}else{
			$result = $mysqli->query($query);
			header("Location:success.php");
		}

		/*
		if ($mysqli->query($query)) {
			$id = $mysqli->insert_id();
			error_log("Inserted {$email} as ID {$id}", 3, "errorlogs/errorLog.txt");
			return true;
		}else{
			error_log("Problem inserting {$query}", 3, "errorlogs/errorLog.txt");
			return false;
		}
		*/

?>