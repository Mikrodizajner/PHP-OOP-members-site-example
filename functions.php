<?php
	//generic file for generic functions and other includes
	session_start();
	ob_start();
	require_once("resources/dbstuff.inc");
	//automate register classes
	spl_autoload_register(function ($class) {
	    include 'classes/' . $class . '.php';
	});
?>