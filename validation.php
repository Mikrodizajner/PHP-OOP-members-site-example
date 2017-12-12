<?php
/*
*php member site example
*
*
*
*validate input functions
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