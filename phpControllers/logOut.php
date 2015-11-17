<?php 
	
	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// log out the user
	// delete everything from $_SESSION array
	// delete cookies
	logOut();
	
	// return to logOut.js 
	$response = array('status' => '1');
	echo json_encode($response);
?>