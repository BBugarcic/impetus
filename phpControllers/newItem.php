<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	$item = $_POST["item"];
	$title = $_POST["listTitle"];
	
	$id = $_SESSION['id'];
	
	$res = db_query("SELECT `id` FROM `lists` WHERE title='{$title}' AND userID=$id");
	$rows = mysqli_fetch_assoc($res);
	$list_id = $rows['id'];
	$new_item = db_query("INSERT INTO `items` (`item`, `listID`) 
	VALUES ('{$item}', '{$list_id}')");

	
	$krik = "jeah";
	$error = "error";
	if($new_item) {
			file_put_contents('php://stderr', print_r($krik, TRUE));
			$result = array('status' => '1');
			echo json_encode($result);
	}
	else {
		file_put_contents('php://stderr', print_r($error, TRUE));
		
	}


	
?>