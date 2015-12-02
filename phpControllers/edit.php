<?php 

	// start session
	session_start();
	
	// including functions
	include('../phpFunctions/functions.php');
	
	
	$val = "dobro dosli u edit.php";
	file_put_contents('php://stderr', print_r($val, TRUE));
	// print $_POST array in log error file (for testing purposes)
	file_put_contents('php://stderr', print_r($_POST, TRUE));
	
	$new_value = $_POST["value"];
	$item_id = $_POST["id"];
	$edit_item = db_query("UPDATE `items` SET item='{$new_value}' WHERE id='{$item_id}'");
	
	echo $new_value;
?>