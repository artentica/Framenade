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
	        try
	        {
	            $GLOBALS['db'] = new PDO($dsn, dbuser, dbpass, $options);
	        }
	        // Catch any errors
	        catch(PDOException $e)
	        {
	        	$log = fopen('../LOGFILE.txt', 'a+');

				ftruncate( $log, 0);

				fwrite( $log, $e->getMessage()  );

				fclose( $log);

				return false;
	        }
	        return true;
	    }

		function DBQuery( $str )
		{
			if (connect())
			{
	    		$temp 		= $GLOBALS['db']->query( $str );
	    		$reponse 	= $temp->fetchAll();
	    		return $reponse;
	    	}
	    	return false;
		}
		function DBInsert( $str )
		{
			if (connect())
			{
	    		$temp 		= $GLOBALS['db']->exec( $str );
	    		return $temp;
	    	}
	    	return false;
		}
?>