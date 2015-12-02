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
	$current_done = db_query("SELECT `done` FROM `items` WHERE id='{$item_id}' ");
	
	file_put_contents('php://stderr', print_r($current_done, TRUE));
	
	$rows = mysqli_fetch_assoc($current_done);

	file_put_contents('php://stderr', print_r($rows, TRUE));
	
	// if not done
	if($rows['done'] == 0) {
		
		$done_item = db_query("UPDATE `items` SET done='1' WHERE id='{$item_id}'");
		if($done_item){
			$result = array('status' => '1');
			echo json_encode($result);
		} else{
			$result = array('status' => 'error');
		}
	// if already done
	} else {
		$done_item = db_query("UPDATE `items` SET done='0' WHERE id='{$item_id}'");
		$result = array('status' => '0');
		echo json_encode($result);	
	}
?>