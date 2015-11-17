<?php 
	
	/**
	 *
	 * Establish connection with the database.
	 */
	
	function db_connect() {
	
	// define connection as a static variable, to avoid connecting more then once
	static $connection;
	
	// try and connect to the database, if a connection has not been established yet
	if(!isset($connection)) {
		
		// load configuration as an array
		$config = parse_ini_file('../../../configuration_Files/config.ini');
		$connection = mysqli_connect($config['servername'], $config['db_username'], $config['db_pass'], $config['db_name']);
	}
	
	// if connection was not successful, handle the error
	if($connection === false) {
		return mysqli_connect_error();
	}
	
	return $connection;
	
	 }
	 
	/**
	 *
	 * Quering the database.
	 *
	 */ 
	 function db_query($query) {
		
		// connect to the database
		$connection = db_connect();
		
		//query the database
		$result = mysqli_query($connection, $query);
		
		return $result;
	 }
	 
	 /**
	  * Throwing an error if user is not inserted in database
	  */
	  function db_error() {
    	$connection = db_connect();
    	return mysqli_error($connection);
	  }
	  
	/**
	 *
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];
        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
        // destroy session
        session_destroy();
    }

	/**
	 * 
     * Select quering.
     * 
     */
	function db_select($query) 
	{
		$rows = array();
		$result = db_query($query);
	
		// If query failed, return `false`
		if($result === false) {
			return false;
		}
	
		// If query was successful, retrieve all the rows into an array
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
?>