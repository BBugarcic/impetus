<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	// current list's title and id
	$curr_title = $_POST["currTitle"];
	$list_id = $_SESSION["current_list_id"];
	
	// user's id
	$userID = $_SESSION['id'];
	
	// delete current list from database
	// delete all current list's items
	$del_list = db_query("DELETE FROM `lists` WHERE userID='{$userID}' AND title='{$curr_title}'");
	$del_items = db_query("DELETE FROM `items` WHERE listID='{$list_id}'");

	$result = array('status' => '1');
	echo json_encode($result);
	
?>