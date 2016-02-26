<?php 
	
	/**
	 *
	 * Establish connection with the database.
	 */
	include('../database.php');
	
	function db_connect() {
	
	// define connection as a static variable, to avoid connecting more then once
	static $connection;
	file_put_contents('php://stderr', print_r("DB CONNECT", TRUE));
	
	// try and connect to the database, if a connection has not been established yet
	if(!isset($connection)) {
		
		file_put_contents('php://stderr', print_r("NOT SET CONNECTION", TRUE));
		file_put_contents('php://stderr', print_r("SERVER IN FUNctions", TRUE));
		file_put_contents('php://stderr', print_r($server, TRUE));
		file_put_contents('php://stderr', print_r($username, TRUE));
		file_put_contents('php://stderr', print_r($password, TRUE));
		file_put_contents('php://stderr', print_r($db, TRUE));
		// load configuration as an array
		// $config = parse_ini_file('../config.ini'); // configuration for localhost
		$connection = mysqli_connect($server, $username, $password, $db);
		
	}
	
	// if connection was not successful, handle the error
	if($connection === false) {
		return mysqli_connect_error();
	}
	file_put_contents('php://stderr', print_r("CONN not false", TRUE));
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
		file_put_contents('php://stderr', print_r("CONNECTED", TRUE));
		file_put_contents('php://stderr', print_r($connection, TRUE));
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
	
		/**
		*
		* simple function to test password strength
		*
		* param string $password
		*
		* return int 
		*
		*/
		function testPassword($password)
		{
			if ( strlen( $password ) == 0 )
			{
				return 1;
			}
		
			$strength = 0;
		
			// get the length of the password
			$length = strlen($password);
		
			// check if password is not all lower case
			if(strtolower($password) != $password)
			{
				$strength += 1;
			}
			
			// check if password is not all upper case
			if(strtoupper($password) == $password)
			{
				$strength += 1;
			}
		
			// check string length is 8 - 15 chars
			if($length >= 8)
			{
				$strength += 1;
			}
		
			// get the numbers in the password
			preg_match_all('/[0-9]/', $password, $numbers);
			$strength += count($numbers[0]);
		
			// strength is a number 1-10
			return $strength;
		}
		
?>