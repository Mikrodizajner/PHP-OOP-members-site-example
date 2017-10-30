<?php

	class User{

		public $id;
		public $email;
		public $firstName;
		public $lastName;
		public $address;
		public $city;
		public $state;
		public $zip;
		public $phone;
		public $phoneType;
		public $isLoggedIn 	= false;
		public $errorType 	= "fatal";
		
		/*
		function __construct()
		{

			if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
				$this->_initUser();
			}

		}//end construct
		*/

		public function authenticate($email, $pass){

			$_SESSION['isLoggedIn'] = false;
			$this->isLoggedIn 		= false;

			$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DB);

			if ($mysqli->connect_errno) {
				error_log("Can't connect to MySQL:".$mysqli->connect_error);

				return false;
			}

			$incomingPassword 	= $mysqli->real_escape_string($pass);

			$query ="SELECT * FROM members WHERE member_email = '{$email}'";

			if (!$result = $mysqli->query($query)) {
				error_log("Can't retrieve account for {$email}");
			}
			//will be only one row so no while loop is needed
			$row 		= $result->fetch_assoc();
			$dbPassword = $row['member_pass'];

			if (crypt($incomingPassword, $dbPassword) != $dbPassword) {

				error_log("Passwords for {$email} don't match");
				return false;

			}else{

				$this->id 			= $row['member_id'];
				$this->email 		= $row['member_email'];
				$this->firstName 	= $row['member_fir_name'];
				$this->lastName		= $row['member_las_name'];
				$this->address 		= $row['member_address'];
				$this->city			= $row['member_city'];
				$this->zip 			= $row['member_zip'];
				$this->state 		= $row['member_state'];
				$this->phone 		= $row['member_phone'];
				$this->phoneType 	= $row['member_phone_type'];
				$this->isLoggedIn 	= true;

				$this->_initUser();

				return true;
			}

		}//end function authenticate

		/*
		private function _setSession(){

				$_SESSION['id']			= $this->id;
				$_SESSION['email']		= $this->email;
				$_SESSION['firstName']	= $this->firstName;
				$_SESSION['lastName']	= $this->lastName;
				$_SESSION['address']	= $this->address;
				$_SESSION['city']		= $this->city;
				$_SESSION['zip']		= $this->zip;
				$_SESSION['state']		= $this->state;
				$_SESSION['phone']		= $this->phone;
				$_SESSION['phoneType']	= $this->phoneType; 
				$_SESSION['isLoggedIn']	= $this->isLoggedIn;

		}//end function set session
		*/

		private function _initUser(){

			$this->id 			= $_SESSION['id'];
			$this->email 		= $_SESSION['email'];
			$this->firstName 	= $_SESSION['firstName'];
			$this->lastName 	= $_SESSION['lastName'];
			$this->address 		= $_SESSION['address'];
			$this->city 		= $_SESSION['city'];
			$this->zip 			= $_SESSION['zip'];
			$this->state 		= $_SESSION['state'];
			$this->phone 		= $_SESSION['phone'];
			$this->phoneType 	= $_SESSION['phoneType']; 
			$this->isLoggedIn 	= $_SESSION['isLoggedIn'];

		}//end function initUser

		public function logout(){

			$this->isLoggedIn = false;

			$_SESSION['isLoggedIn'] = false;

			foreach ($_SESSION as $key => $value) {
				$_SESSION[$key] = "";
				unset($_SESSION[$key]);
			}

			if (ini_get("session.use_cookies")) {
				
				$cookieParameters = session_get_cookie_params();

				setcookie(session_name(), "", time() - 28800, $cookieParameters['path'], $cookieParameters['domain'], $cookieParameters['secure'], $cookieParameters['httponly']);
			}

			session_destroy();

		}//end function logout


		public function emailPass($email){

			$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
			if ($mysqli->connect_errno) {
				error_log("Can't connect to MySQL:".$mysqli->connect_error);
				return false;
			}

			//first, lookup the user to see if they exist
			$query 		= "SELECT member_id, member_email FROM members WHERE member_email ='{$email}'";

			if (!$result = $mysqli->query($query)) {
				$_SESSION['error'][] = "Uknown error!";
				return false;
			}

			if (!$result->num_rows == 0) {
				$_SESSION['error'][] = "User not found!";
				return false;
			}

			$row 	= $result->fetch_assoc();
			$id 	= $row['id'];

			$hash 			= uniqid("", TRUE);
			$safeHash 		= $mysqli->real_escape_string($hash);
			$insertQuery 	= "INSERT INTO resetPassword (email_id, pass_key, date_created, status) VALUES ('{$id}', '{$safeHash}', NOW(), 'A')";

			if (!$mysqli->query($insertQuery)) {
				error_log("Problem inserting resetPassword row for ".$id);
				$_SESSION['error'][] = "Unknown problem";
				return false;
			}

			$urlHash 	= urlencode($hash);
			$site 		= "http://localhost";
			$resetPage 	= "/reset.php";
			$fullUrl 	= $site.$resetPage."?user=".$urlHash;

			//set up things related to the email
			$to 		= $row['email'];
			$subject 	= "Password reset";
			$message 	= "Please go to the link ".$fullUrl." to reset Your password!";
			$headers 	= "From: example@gmail.com";

			mail($to, $subject, $message, $headers);

			return true;

		}//end function emailPass

		public function validateReset($formInfo){

			$pass1 = $formInfo['password1'];
			$pass2 = $formInfo['password2'];

			if ($pass1 != $pass2) {
				$this->errorType 		= "nonfatal";
				$_SESSION['error'][] 	= "Passwords don't match";
				return false;
			}

			$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);

			if ($mysqli->connect_errno) {
				error_log("Can't connect to MySQL!:".$mysqli->connect_error);
				return false;
			}

			$decodedHash 	= urldecode($formInfo['hash']);
			$safeEmail 		= $mysqli->real_escape_string($decodedHash);
			$query 			= "SELECT c.id AS id, c.email AS email FROM Customer c, resetPassword r WHERE r.status = 'A' AND r.pass_key = '{$safeHash}' AND c.email = '{$safeEmail}' AND c.id = r.email_id";

			if (!$result = $mysqli->query($query)) {
				$_SESSION['error'] 	= "Unknown error!";
				$this->errorType 	= "fatal";
				error_log("Database error:".$formInfo['email']." - ".$formInfo['hash']);
				return false;
			}elseif ($result->num_rows == 0) {
				$_SESSION['error'][] 	= "Link not active or user not found!";
				$this->errorType 		= "fatal";
				error_log("Link not active:".$formInfo['email']." - ".$formInfo['hash']);
				return false;
			}else{
				$row = $result->fetch_assoc();
				$id = $row['id'];

				if ($this->_resetPass($id, $pass1)) {
					return true;
				}else{
					$this->errorType 		= "nonfatal";
					$_SESSION['error'][] 	= "Error reseting password!";
					error_log("Error reseting password:".$id);
					return false;
				}
			}
		}//end function validate reset


		private function _resetPass($id,$pass){

			$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);

			if ($mysqli->connect_errno) {
				error_log("Can't connect to MySQL!". $mysqli->connect_error);
					return false;
			}

			$safeUser 	= $mysqli->real_escape_string($id);
			$newPass 	= crypt($pass);
			$safePass 	= $mysqli->real_escape_string($newPass);
			$query 		= "UPDATE Customer SET password = '{$safePass}' WHERE id = '{$safeUser}'";

			if (!$mysqli->query($query)) {
				return false;
			}else{
				return true;
			}
		}//end function _resetPass

	}//end class User

?>