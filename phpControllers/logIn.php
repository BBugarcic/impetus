<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 
	
	// taking passed values
	$username = $_POST["username"];
	$pass = $_POST["pass"];
	
	// select data from database
	$rows = db_select("SELECT * FROM `users` WHERE username='{$username}'");
	
	// handling case with no matching in database
	if(empty($rows)) {
		$result = array("status" => "error"); 
		echo json_encode($result);
	} else {
			// log in, return result via ajax
			if (password_verify($pass, $rows[0]["hash"])) {
				$id = $rows[0]["id"];
				$_SESSION["id"] = $id;
				$result = array('status' => '1');
				echo json_encode($result);
			} else {
				$resalt = array("error" => "error");
			}	
	}
?>