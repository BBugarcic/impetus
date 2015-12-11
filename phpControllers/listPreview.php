<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE)); 
	file_put_contents('php://stderr', print_r($_SESSION, TRUE)); 
	
	$user_id = $_SESSION["id"];
	$list_title = $_POST["title"];
	$date = $_POST["date"];
	
	// get list id from lists
	$list_id_array = db_select("SELECT `id` FROM `lists` WHERE userID='{$user_id}' AND title='{$list_title}' AND date='{$date}'");
	$list_id = $list_id_array[0];
	
	// for testing purposes
	file_put_contents('php://stderr', print_r($list_id, TRUE));
	
	// select list items from database
	$items_array = db_select ("SELECT * FROM `items` WHERE listID='{$list_id['id']}'");
	
	// save list id in session array as current list
	// this anables user to add edit content of this list
	$_SESSION["current_list_id"] = $list_id['id'];
	
	file_put_contents('php://stderr', print_r($items_array, TRUE));
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	$result = $items_array;
	echo json_encode($result);
?>