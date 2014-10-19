<?php
		//require_once('config.php');
    	$reponse = array();

		function connect()
		{
			// Set DSN
	        $dsn = 'mysql:host=' . dbhost . ';dbname=' . dbname;
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    		=> true,
	            PDO::ATTR_ERRMODE       		=> PDO::ERRMODE_EXCEPTION, 
	            PDO::MYSQL_ATTR_INIT_COMMAND 	=> 'SET NAMES UTF8'
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

		function DBQuery( $str )
		{
			connect();
	    	$temp = $GLOBALS['db']->query( $str );
	    	$reponse = $temp->fetchAll();
	    	return $reponse;
		}
		function DBInsert( $str )
		{
			connect();
	    	$temp = $GLOBALS['db']->exec( $str );
	    	return $temp;
		}
?>