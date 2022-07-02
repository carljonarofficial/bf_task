<?php
    /* BEGINNING OF THE CONNECTION PROCESS */
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
    define('DB_PASS', ''); //set DB_PASS as 'root' if you're using mac
    define('DB_DATABASE', 'bf_task'); //make sure to set your database
    //connect to database host
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    /* END OF CONNECTION PROCESS */

    // Check if connection is good or die
    if (mysqli_connect_errno()) {
    	die("Failed to connnect to MySQL: ".mysqli_connect_errno());
    }

    /* BELOW ARE THE CUSTOM FUNCTION YOU CAN USE IN QUERYING DATABASE */

    /**
     * Use to escape MySQL String Characters
     * 
     * Returns an escaped string
    */
    function escape_this_string($string) {
        global $connection;

        // Returns an escaped string
        return mysqli_escape_string($connection, $string);
    }

    /**
     * Use when expecting multiple records
     * 
     * Returns an array of rows
    */
    function fetch_all($query) {
    	global $connection;

    	$result = mysqli_query($connection, $query);
    	$rows = array();

    	// Fetching Result into Row Array
    	foreach ($result as $row) {
    		$rows[] = $row;
    	}

    	// Returns an array of rows
    	return $rows;
    }

    /**
     * Use when fetching a specific record based on the condition
     * 
     * Return an array of record
    */
    function fetch_record($query) {
        global $connection;

        // Fetching Result into Associative Array
        $result = mysqli_query($connection, $query);

        // Returns an array of single row
        return mysqli_fetch_assoc($result);
    }

    /**
     * Use when doing an INSERT/UPDATE/DELETE query 
     * 
     * Returns an int if insert, boolean if update/delete queries
     */
	function run_mysql_query($query) {
		global $connection;

		$result = mysqli_query($connection, $query);

		// Check if query is an 'insert' query
		if (preg_match("/insert/i", $query)) {
			// Returns an id (int)
            return mysqli_insert_id($connection);
		}

		// Returns boolean (true/false) if query is update or delete
        return $result;
	}
?>