<?php 
	
	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 

	// placing user's input into local variables
	// hashing password
	$username = $_POST['username'];
	$email = $_POST['email'];
	$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	
	// printing hash in log file just for testing purpose
	file_put_contents('php://stderr', print_r($hash, TRUE));
	
	$connection = db_connect();
	
	// log to a file to for testing purpose
	file_put_contents('php://stderr', print_r($connection, TRUE));
	
	$new_user = db_query("INSERT INTO `users` (`username`, `email`, `password`) 
	VALUES ('{$username}', '{$email}', '{$hash}')");
	
	if($new_user === false) {
		$error = db_error();
	    file_put_contents('php://stderr', print_r($error, TRUE));
	} else {
    	$success = 'New user is inserted into database.';
		file_put_contents('php://stderr', print_r($success, TRUE));
		
		// new user is automaticaly logged in
		// remeber that user is logged by storing user's id in $_SESSION
		$res = db_query("SELECT LAST_INSERT_ID() AS id");
		$rows = mysqli_fetch_assoc($res);
		$id = $rows["id"];
		$_SESSION['id'] = $id;
		file_put_contents('php://stderr', print_r($_SESSION['id'], TRUE));
		
		file_put_contents('php://stderr', print_r("ja postojim", TRUE));
		
		// return answer to ajax function in signUp.js
		$result = array('status' => '1');
		echo json_encode($result);
		

	}
	
	

	
	/*if (password_verify($password, $hash)) {
    // Success!
	}
	else {
    // Invalid credentials
	}
	*/	
	
?>