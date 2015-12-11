<?php 
	
	// start session
	session_start();
	
	// just for testing purposes
	$welcome = "welcome";
	file_put_contents('php://stderr', print_r($welcome, TRUE));	
	file_put_contents('php://stderr', print_r($_SESSION, TRUE));
	
	// DB table to use
	$table = 'lists';
	
	// Table's primary key
	$primaryKey = 'id';
	
	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case simple 
	// indexes
	$columns = array(
		array( 'db' => 'title', 'dt' => 0 ),
		array(
			'db'        => 'date',
			'dt'        => 1,
			'formatter' => function( $d, $row ) {
				return date( 'Y-m-d', strtotime($d));
			}
		)
	);
	
	// SQL server connection information
	$sql_details = array(
		'user' => 'root',
		'pass' => 'barabislav',
		'db'   => 'momentum',
		'host' => 'localhost'
	);
	
	// user id
	$id = $_SESSION['id'];
	
	// where conditioning for sql query
	// datatables will load data restrict by user id
	$whereAll = "id=$id";
	$whereResult = null;

	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	* If you just want to use the basic configuration for DataTables with PHP
	* server-side, there is no need to edit below this line.
	*/
	
	require( 'ssp.class.php' );
	
	echo json_encode(
		SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "userID=$id" )
	);
?>