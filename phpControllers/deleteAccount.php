<?php

	
	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
 file_put_contents('php://stderr', print_r("ovde php", TRUE)); 
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 

	// placing user's input into local variables
	$username = $_POST["delUsername"];
	$pass = $_POST["delPass"];
	
	$user_id = $_SESSION["id"];
	
	// for testing purposes
	file_put_contents('php://stderr', print_r($_SESSION['id'], TRUE));

	if (empty($username) || empty($pass)) {
		$result = array("status" => "errorEmpty");
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
		} else if (!password_verify($pass, $rows[0]["hash"])){
			// varify password
			$result = array("status" => "errorPass");
			echo json_encode($result);
		} else {
			// if there is a match with database
			// get user's lists
			// delete user's items
			// delete user's lists
			// delete user from users
			$rows_lists = db_select("SELECT * FROM `lists` WHERE userID='{$user_id}'");
			file_put_contents('php://stderr', print_r($rows_lists, TRUE));
			
			foreach ($rows_lists as $key => $val) {
				file_put_contents('php://stderr', print_r($val, TRUE));
				$list_id = $val["id"];
				// delete user's items
				$del_item = db_query("DELETE FROM `items` WHERE listID='{$list_id}'");
			}
			
			// delete user's lists
			$del_lists = db_query("DELETE FROM `lists` WHERE userID='{$user_id}'");
			
			if ($del_lists) {
				// delete user from user
				$del_user = db_query("DELETE FROM `users` WHERE id='{$user_id}'");
				if ($del_user) {
					// log out user
					logout();
					
					// send response to js controller
					$result = array("status" => "1");
					echo json_encode($result);
					
				} else {
					$result = array("status" => "error");
					echo json_encode($result);					
				}
			} else {
				$result = array("status" => "error");
				echo json_encode($result);
			}
		}
	}
?>
