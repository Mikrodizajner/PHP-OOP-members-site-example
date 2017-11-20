<?php
/*
*php member site example
*author: https://www.linkedin.com/in/darko-borojevi%C4%87-54b03135/
*object oriented php5.6. plus procedural php
*
*validate inputs
*
*/

	function is_valid_state($state){

		$validStates = array("AL", "CA", "CO", "FL", "IL", "NJ", "NY", "WI");

		if (in_array($state, $validStates)) {
			
			return true;

		}else{

			return false;
		}

	}//end function is_valid_state


	function is_valid_zip($zip){

		if (preg_match('/^[\d]+$/', $zip)) {

			return true;

		}elseif (strlen($zip) == 5 || strlen($zip) == 9) {
			
			return true;
		}else{

			return false;

		}
	}//end function is_valid_zip

?>