<?php
		require_once('/include/config.php');
    	$reponse = array();

		function connect()
		{
			// Set DSN
	        $dsn = 'mysql:host=' . dbhost . ';dbname=' . dbname;
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    => true,
	            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
	        );
	        // Create a new PDO instanace
	        try{
	            $GLOBALS['db'] = new PDO($dsn, dbuser, dbpass, $options);
	        }
	        // Catch any errors
	        catch(PDOException $e){
	            $this->error = $e->getMessage();
	        }
	    }

		function query( $str )
		{
			connect();
	    	$temp = $GLOBALS['db']->query( $str );
	    	$reponse = $temp->fetchAll();
	    	return $reponse;
		}
		function insert( $str )
		{
			connect();
	    	$temp = $GLOBALS['db']->exec( $str );
	    	return $temp;
		}
?>