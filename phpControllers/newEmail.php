<?php 
	
	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');

	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 

	// placing user's input into local variables
	$old_email = $_POST["oldEmail"];
	$new_email = $_POST["newEmail"];
	$user_id = $_SESSION["id"];
	
	// get old email from database
	$rows = db_select("SELECT `email` FROM `users` WHERE id='{$user_id}'");
	
	// for testing purposes
	file_put_contents('php://stderr', print_r($_SESSION['id'], TRUE));
	file_put_contents('php://stderr', print_r($rows, TRUE));
	
	if (empty($old_email)) {
		$result = array("status" => "errorEmpty");
		echo json_encode($result);
	}
	// if there is no mach in database
	if ($rows[0]["email"] !== $old_email) {
		// send an error to js controller
		$result = array("status" => "errorOldEmail");
		echo json_encode($result);
	} else {
		// if there is a match in database
		// change old email with new one
		$done_item = db_query("UPDATE `users` SET email='{$new_email}' WHERE id='{$user_id}'");
		$result = array("status" => "1");
		echo json_encode($result);
	}
	
?>