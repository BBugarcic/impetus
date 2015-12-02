<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	$list_title = $_POST["ListTitle"];
	
	// insert new list into database
	$new_list = db_query("INSERT INTO `lists` (`title`, `userID`, `date`)
	VALUES ('{$list_title}', '{$_SESSION['id']}', now())");
	
	// store id of new/current list in session array
	$res = db_query("SELECT LAST_INSERT_ID() AS id");
	$rows = mysqli_fetch_assoc($res);
	$_SESSION["current_list_id"] = $rows["id"];

	file_put_contents('php://stderr', print_r($_SESSION, TRUE));

	// return answer via ajax
	$result = array('status' => '1');
	echo json_encode($result);
	
?>