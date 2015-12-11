<?php

	
	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
file_put_contents('php://stderr', print_r("ovde php", TRUE)); 
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 

	// placing user's input into local variables
	$username = $_POST["username"];
	$old_pass = $_POST["oldPass"];
	$new_pass = $_POST["newPass"];
	$conf = $_POST["conf"];
	
	$user_id = $_SESSION["id"];
	
	// for testing purposes
	file_put_contents('php://stderr', print_r($_SESSION['id'], TRUE));

	if (empty($username) || empty($old_pass) || empty($new_pass) || empty($conf)) {
		$result = array("status" => "errorEmpty");
		echo json_encode($result);
	} else if ($new_pass !== $conf) {
		$result = array("status" => "confError");
	  	echo json_encode($result);	
	} else if (testPassword($new_pass) < 3) {
		$result = array("status" => "weakPass");
	  	echo json_encode($result);
	} else {
		// get id, username, email, and password of currently logged user
		$rows = db_select("SELECT * FROM `users` WHERE id='{$user_id}'");
			file_put_contents('php://stderr', print_r($rows, TRUE));
		// if there is no mach in database
		if ($rows[0]["username"] !== $username) {
			// send an error to js controller
			$result = array("status" => "errorName");
			echo json_encode($result);
		} else if (!password_verify($old_pass, $rows[0]["hash"])){
			$result = array("status" => "errorOldPass");
			echo json_encode($result);
		} else {
			// if there is a match with database
			// hash new password
			// change old passsword with new one
			$new_hash = password_hash($new_pass, PASSWORD_DEFAULT);
			$done_item = db_query("UPDATE `users` SET hash='{$new_hash}' WHERE id='{$user_id}'");
			$result = array("status" => "1");
			echo json_encode($result);
		}
	}
?>
