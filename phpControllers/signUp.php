<?php 
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 

	
	
	// placing user's input into local variables
	// hashing password
	$username = $_POST['username'];
	$email = $_POST['email'];
	$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	
	file_put_contents('php://stderr', print_r($hash, TRUE)); 
	
	$result =array('status' => '1');
	
	echo json_encode($result);
	/*if (password_verify($password, $hash)) {
    // Success!
	}
	else {
    // Invalid credentials
	}
	*/	
	
?>