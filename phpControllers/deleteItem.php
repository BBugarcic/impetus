<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	// current item's id and current list's id
	$item_id = $_POST["item_id"];
	$list_id = $_SESSION["current_list_id"];
	
	// user's id
	$userID = $_SESSION['id'];
	
	// delete all current list's items
	$del_item = db_query("DELETE FROM `items` WHERE id='{$item_id}'");

	// successfuly deleted
	if($del_item) {
		$result = array('status' => '1');
		echo json_encode($result);
	} else {
		$result = array('status' => 'error');
	}
?>