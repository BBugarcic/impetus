<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	// remeber item
	$item = $_POST["item"];
	
	// remember current list's id
	$user_id = $_SESSION['id'];
	$current_list_id = $_SESSION['current_list_id'];
	
	$new_item = db_query("INSERT INTO `items` (`item`, `listID`, `done`) 
	VALUES ('{$item}', '{$current_list_id}', '0')");
	
	$res = db_query("SELECT LAST_INSERT_ID() AS id");
	$rows = mysqli_fetch_assoc($res);
	$item_id = $rows["id"];

	
	$krik = "jeah";
	$error = "error";
	if($new_item) {
		$result = array('status' => '1', 'item_id' => $item_id);
			file_put_contents('php://stderr', print_r($result, TRUE));
		echo json_encode($result);
	}
	else {
		$result = array('status' => 'error');
		echo json_encode($result);
	}
		
?>